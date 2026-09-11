<?php

namespace Tests\Unit;

use App\Mail\ChatbotSpecialistRequestMail;
use App\Services\AnthropicClient;
use App\Services\MontacargasProductSearchService;
use App\Services\RgxChatbotService;
use App\Services\RuguexFormalQuoteService;
use App\Services\TechnicalKnowledgeService;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Mockery;
use ReflectionMethod;
use Tests\TestCase;

class RgxChatbotAdvisorHandoffTest extends TestCase
{
    private function service(
        AnthropicClient $anthropic
    ): RgxChatbotService {
        return new RgxChatbotService(
            $anthropic,
            Mockery::mock(
                MontacargasProductSearchService::class
            ),
            Mockery::mock(
                RuguexFormalQuoteService::class
            ),
            Mockery::mock(
                TechnicalKnowledgeService::class
            )
        );
    }

    private function tool(
        string $name,
        array $input = [],
        string $id = 'tool-advisor'
    ): array {
        return [
            'content' => [[
                'type' => 'tool_use',
                'id' => $id,
                'name' => $name,
                'input' => $input,
            ]],
            'model' => 'test-model',
            'usage' => [],
        ];
    }

    private function text(
        string $text = 'Respuesta final.'
    ): array {
        return [
            'content' => [[
                'type' => 'text',
                'text' => $text,
            ]],
            'model' => 'test-model',
            'usage' => [],
        ];
    }

    public function test_advisor_tools_are_restricted(): void
    {
        $anthropic =
            Mockery::mock(AnthropicClient::class);

        $method = new ReflectionMethod(
            RgxChatbotService::class,
            'tools'
        );

        $method->setAccessible(true);

        $tools = collect(
            $method->invoke(
                $this->service($anthropic)
            )
        )->keyBy('name');

        $contact =
            $tools->get('mostrar_contacto_asesor');

        $request =
            $tools->get('solicitar_asesoria');

        $this->assertIsArray($contact);
        $this->assertIsArray($request);

        $this->assertFalse(
            $contact['input_schema']
                ['additionalProperties']
        );

        $this->assertStringContainsString(
            'cliente pidió explícitamente atención humana',
            $contact['description']
        );

        $this->assertStringContainsString(
            'not_found, unavailable, knowledge_unavailable o quote_error',
            $contact['description']
        );

        $this->assertSame(
            ['name', 'phone', 'email'],
            $request['input_schema']['required']
        );

        $this->assertFalse(
            $request['input_schema']
                ['additionalProperties']
        );
    }

    public function test_contact_tool_is_blocked_without_explicit_request(): void
    {
        $anthropic =
            Mockery::mock(AnthropicClient::class);

        $anthropic
            ->shouldReceive('messages')
            ->twice()
            ->andReturn(
                $this->tool(
                    'mostrar_contacto_asesor'
                ),
                $this->text()
            );

        $result = $this
            ->service($anthropic)
            ->reply(
                'Necesito información de una XP1000.'
            );

        $this->assertNull(
            $result['advisor_contact']
        );

        $this->assertNull(
            $result['advisor_context']
        );
    }

    public function test_explicit_request_returns_immediate_contact_during_business_hours(): void
    {
        config([
            'app.timezone' =>
                'America/Mexico_City',
            'whatsapp.phone' =>
                '528332395885',
            'whatsapp.message' =>
                'Hola RUGUEX',
            'whatsapp.schedule.days' =>
                [1, 2, 3, 4, 5],
            'whatsapp.schedule.start_hour' =>
                9,
            'whatsapp.schedule.end_hour' =>
                18,
        ]);

        Carbon::setTestNow(
            Carbon::parse(
                '2026-09-10 10:30:00',
                'America/Mexico_City'
            )
        );

        try {
            $anthropic =
                Mockery::mock(AnthropicClient::class);

            $anthropic
                ->shouldReceive('messages')
                ->twice()
                ->andReturn(
                    $this->tool(
                        'mostrar_contacto_asesor'
                    ),
                    $this->text()
                );

            $result = $this
                ->service($anthropic)
                ->reply(
                    'Quiero hablar con un asesor.'
                );

            $this->assertTrue(
                $result['advisor_contact']
                    ['business_hours']
            );

            $this->assertSame(
                '+528332395885',
                $result['advisor_contact']['phone']
            );

            $this->assertSame(
                '+52 833 239 5885',
                $result['advisor_contact']
                    ['phone_display']
            );

            $this->assertStringStartsWith(
                'https://wa.me/528332395885',
                $result['advisor_contact']
                    ['whatsapp_url']
            );

            $this->assertTrue(
                $result['advisor_contact']
                    ['callback_available']
            );
        } finally {
            Carbon::setTestNow();
        }
    }

    public function test_explicit_request_outside_business_hours_only_allows_callback(): void
    {
        config([
            'app.timezone' =>
                'America/Mexico_City',
            'whatsapp.phone' =>
                '528332395885',
            'whatsapp.schedule.days' =>
                [1, 2, 3, 4, 5],
            'whatsapp.schedule.start_hour' =>
                9,
            'whatsapp.schedule.end_hour' =>
                18,
        ]);

        Carbon::setTestNow(
            Carbon::parse(
                '2026-09-10 19:00:00',
                'America/Mexico_City'
            )
        );

        try {
            $anthropic =
                Mockery::mock(AnthropicClient::class);

            $anthropic
                ->shouldReceive('messages')
                ->twice()
                ->andReturn(
                    $this->tool(
                        'mostrar_contacto_asesor'
                    ),
                    $this->text()
                );

            $result = $this
                ->service($anthropic)
                ->reply(
                    'Quiero hablar con un asesor.'
                );

            $this->assertFalse(
                $result['advisor_contact']
                    ['business_hours']
            );

            $this->assertNull(
                $result['advisor_contact']['phone']
            );

            $this->assertNull(
                $result['advisor_contact']
                    ['phone_display']
            );

            $this->assertNull(
                $result['advisor_contact']
                    ['whatsapp_url']
            );

            $this->assertTrue(
                $result['advisor_contact']
                    ['callback_available']
            );
        } finally {
            Carbon::setTestNow();
        }
    }

    public function test_callback_sends_once_and_session_has_no_pii(): void
    {
        Mail::fake();

        $input = [
            'name' => 'Cliente Prueba',
            'company' => 'Empresa Prueba',
            'phone' => '2221234567',
            'email' => 'prueba@example.com',
            'message' =>
                'Deseo que me contacten.',
        ];

        $anthropic =
            Mockery::mock(AnthropicClient::class);

        $anthropic
            ->shouldReceive('messages')
            ->once()
            ->andReturn(
                $this->tool(
                    'solicitar_asesoria',
                    $input
                )
            );

        $result = $this
            ->service($anthropic)
            ->reply(
                'Estos son mis datos.',
                [],
                null,
                null,
                [
                    'contact_requested' => true,
                    'submitted' => false,
                ]
            );

        Mail::assertSent(
            ChatbotSpecialistRequestMail::class,
            1
        );

        $this->assertSame(
            'submitted',
            $result['advisor_request']['status']
        );

        $this->assertSame(
            'Listo. Tu solicitud de contacto fue enviada correctamente al equipo de RUGUEX para seguimiento.',
            $result['answer']
        );

        $this->assertStringNotContainsString(
            '2221234567',
            $result['answer']
        );

        $this->assertStringNotContainsString(
            'prueba@example.com',
            $result['answer']
        );

        $this->assertStringNotContainsString(
            'pronto',
            mb_strtolower($result['answer'])
        );

        $context =
            json_encode($result['advisor_context']);

        $this->assertStringNotContainsString(
            'Cliente Prueba',
            $context
        );

        $this->assertStringNotContainsString(
            '2221234567',
            $context
        );

        $this->assertStringNotContainsString(
            'prueba@example.com',
            $context
        );

        $duplicateAnthropic =
            Mockery::mock(AnthropicClient::class);

        $duplicateAnthropic
            ->shouldReceive('messages')
            ->once()
            ->andReturn(
                $this->tool(
                    'solicitar_asesoria',
                    $input,
                    'tool-duplicate'
                )
            );

        $duplicate = $this
            ->service($duplicateAnthropic)
            ->reply(
                'Inténtalo otra vez.',
                [],
                null,
                null,
                $result['advisor_context']
            );

        Mail::assertSent(
            ChatbotSpecialistRequestMail::class,
            1
        );

        $this->assertSame(
            'already_submitted',
            $duplicate['advisor_request']
                ['status']
        );
    }

    public function test_interface_has_no_proactive_human_cta(): void
    {
        $blade = file_get_contents(
            resource_path(
                'views/components/chatbot-montacargas.blade.php'
            )
        );

        $this->assertStringNotContainsString(
            'Hablar con un asesor',
            $blade
        );

        $this->assertStringNotContainsString(
            'Pregúntanos por WhatsApp',
            $blade
        );

        $this->assertStringNotContainsString(
            'Si prefieres atención humana',
            $blade
        );
    }

    public function test_prompt_prioritizes_chatbot_resolution(): void
    {
        $service = file_get_contents(
            app_path(
                'Services/RgxChatbotService.php'
            )
        );

        $this->assertStringContainsString(
            'No ofrezcas contacto humano prematuramente.',
            $service
        );

        $this->assertStringContainsString(
            'una herramienta autorizada devuelve not_found, unavailable, knowledge_unavailable o quote_error',
            $service
        );

        $this->assertStringContainsString(
            'Siempre usa mostrar_contacto_asesor antes de solicitar_asesoria.',
            $service
        );

        $this->assertStringContainsString(
            'Nunca afirmes que registraste o enviaste una solicitud antes de recibir advisor_submitted',
            $service
        );
    }
    public function test_only_terminal_failures_enable_automatic_handoff(): void
    {
        $service = file_get_contents(
            app_path(
                'Services/RgxChatbotService.php'
            )
        );

        $this->assertStringContainsString(
            "'not_found',",
            $service
        );

        $this->assertStringContainsString(
            "'unavailable',",
            $service
        );

        $this->assertStringContainsString(
            "'knowledge_unavailable',",
            $service
        );

        $this->assertStringContainsString(
            "'quote_error',",
            $service
        );

        $this->assertStringContainsString(
            'needs_clarification, missing_required, no_selected_product',
            $service
        );

        $this->assertStringContainsString(
            'NO son motivo para escalar',
            $service
        );
    }

    public function test_frontend_uses_server_authorized_advisor_contact_and_tracks_real_submission(): void
    {
        $api = file_get_contents(
            resource_path(
                'js/services/rgx-chatbot-api.js'
            )
        );

        $javascript = file_get_contents(
            resource_path(
                'js/components/chatbot-montacargas.js'
            )
        );

        $blade = file_get_contents(
            resource_path(
                'views/components/chatbot-montacargas.blade.php'
            )
        );

        $whatsappWidget = file_get_contents(
            resource_path(
                'views/components/whatsapp-widget.blade.php'
            )
        );

        $controller = file_get_contents(
            app_path(
                'Http/Controllers/RgxChatbotController.php'
            )
        );

        $this->assertStringContainsString(
            'advisorContact: data.advisor_contact ?? null',
            $api
        );

        $this->assertStringContainsString(
            'advisorRequest: data.advisor_request ?? null',
            $api
        );

        $this->assertStringContainsString(
            "advisorRequest?.status !== 'submitted'",
            $javascript
        );

        $this->assertStringContainsString(
            "'rgx_chatbot_specialist_submitted'",
            $javascript
        );

        $this->assertStringContainsString(
            'requestAdvisorCallback()',
            $javascript
        );

        $this->assertStringContainsString(
            'message.advisorContact.business_hours',
            $blade
        );

        $this->assertStringContainsString(
            'message.advisorContact.whatsapp_url',
            $blade
        );

        $this->assertStringContainsString(
            'message.advisorContact.tel_url',
            $blade
        );

        $this->assertStringContainsString(
            'Que me contacten',
            $blade
        );

        $this->assertStringContainsString(
            "'tel_url' =>",
            $controller
        );

        $this->assertStringContainsString(
            "config('whatsapp.schedule.days'",
            $whatsappWidget
        );

        $this->assertStringContainsString(
            'Cotiza por WhatsApp',
            $whatsappWidget
        );

        $this->assertStringNotContainsString(
            '/chatbot/specialist-request',
            $javascript
        );

        $this->assertStringNotContainsString(
            'getWhatsAppUrl',
            $javascript
        );

        $this->assertStringNotContainsString(
            'isBusinessHours',
            $javascript
        );

        $this->assertStringNotContainsString(
            'submitSpecialistForm',
            $javascript
        );

        $this->assertStringNotContainsString(
            'showSpecialistForm',
            $blade
        );
    }

}
