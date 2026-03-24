@php
    use Carbon\Carbon;

    $enabled = config('whatsapp.enabled', true);

    $now = Carbon::now(config('app.timezone'));
    $day = (int) $now->dayOfWeekIso; // 1 lunes - 7 domingo
    $hour = (int) $now->hour;

    $allowedDays = config('whatsapp.schedule.days', [1,2,3,4,5]);
    $startHour = (int) config('whatsapp.schedule.start_hour', 9);
    $endHour = (int) config('whatsapp.schedule.end_hour', 18);

    $isVisible = $enabled
        && in_array($day, $allowedDays, true)
        && $hour >= $startHour
        && $hour < $endHour;

    $phone = config('whatsapp.phone');
    $message = config('whatsapp.message');
    $encodedMessage = urlencode($message);

    $waMobile = "https://wa.me/{$phone}?text={$encodedMessage}";
    $waDesktop = "https://web.whatsapp.com/send?phone={$phone}&text={$encodedMessage}";

    $icon = config('whatsapp.icon');
    $privacyUrl = config('whatsapp.privacy_url', '/politica-de-privacidad');

    $texts = config('whatsapp.texts', []);
    $brand = config('whatsapp.brand', 'RUGUEX');

    $pushDataLayer = config('whatsapp.google_ads.push_datalayer', true);
    $useGtagDirect = config('whatsapp.google_ads.use_gtag_direct', false);
    $sendTo = config('whatsapp.google_ads.send_to');
@endphp

@if($isVisible)
    <div
        id="ruguex-whatsapp-widget"
        class="fixed z-[9999]"
        data-wa-mobile="{{ $waMobile }}"
        data-wa-desktop="{{ $waDesktop }}"
        data-push-datalayer="{{ $pushDataLayer ? '1' : '0' }}"
        data-use-gtag-direct="{{ $useGtagDirect ? '1' : '0' }}"
        data-gtag-send-to="{{ $sendTo }}"
    >
        {{-- Caja de chat --}}
        <div
            id="ruguex-chat-box"
            class="fixed z-[9999] bottom-24 left-1/2 w-[340px] -translate-x-1/2 overflow-hidden rounded-2xl border border-gray-200 bg-white font-sans shadow-[0_10px_30px_rgba(0,0,0,0.12)] md:left-auto md:right-6 md:translate-x-0"
        >
            {{-- Botón X --}}
            <button
                type="button"
                id="ruguex-chat-close"
                aria-label="Cerrar chat"
                class="absolute right-3 top-3 flex h-8 w-8 items-center justify-center rounded-full bg-white/20 text-lg text-white transition hover:bg-white/30"
            >
                ×
            </button>

            {{-- Header --}}
            <div class="bg-[#f97316] px-5 pb-1 pt-5 text-[1.05rem] font-semibold text-white">
                {{ $texts['header'] ?? $brand }}
            </div>

            {{-- Subheader --}}
            <div class="bg-orange-500 px-5 pb-4 pt-0 text-xs text-white/90">
                {{ $texts['subheader'] ?? 'Normalmente responde en cuestión de minutos.' }}
            </div>

            {{-- Mensaje --}}
            <div class="border-x border-gray-300 bg-white p-5">
                <div class="rounded-2xl border border-green-100 bg-green-50 px-4 py-3 text-[14px] leading-6 text-gray-700 shadow-sm">
                    {{ $texts['message_bubble'] ?? '¿Tienes alguna pregunta? Estoy encantado de poder ayudarte.' }}
                </div>
            </div>

            {{-- Botón WhatsApp --}}
            <div class="bg-white px-5 pb-4 pt-2 text-center">
                <a
                    href="{{ $waDesktop }}"
                    target="_blank"
                    rel="noopener noreferrer"
                    id="ruguex-whatsapp-link"
                    class="inline-flex items-center justify-center gap-2 rounded-full bg-[#25D366] px-6 py-3 text-sm font-semibold text-white shadow-sm transition hover:-translate-y-[1px] hover:shadow-md"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" class="h-4 w-4 fill-current">
                        <path d="M19.11 17.35c-.27-.13-1.58-.78-1.82-.87-.24-.09-.41-.13-.58.13-.17.27-.67.87-.82 1.05-.15.18-.31.2-.58.07-.27-.13-1.12-.41-2.14-1.31-.79-.7-1.33-1.56-1.49-1.82-.16-.27-.02-.41.12-.54.12-.12.27-.31.41-.47.13-.16.18-.27.27-.45.09-.18.04-.34-.02-.47-.07-.13-.58-1.4-.8-1.92-.21-.5-.43-.43-.58-.44h-.49c-.18 0-.47.07-.72.34-.24.27-.94.92-.94 2.23s.96 2.58 1.09 2.76c.13.18 1.88 2.87 4.56 4.03.64.28 1.14.44 1.53.56.64.2 1.22.17 1.68.1.51-.08 1.58-.65 1.8-1.28.22-.63.22-1.16.15-1.28-.07-.11-.24-.18-.51-.31z"/>
                        <path d="M16.03 3.2c-7.07 0-12.8 5.72-12.8 12.79 0 2.25.59 4.45 1.71 6.38L3.2 28.8l6.58-1.72a12.77 12.77 0 0 0 6.25 1.6h.01c7.06 0 12.79-5.73 12.79-12.79A12.8 12.8 0 0 0 16.03 3.2zm0 23.34h-.01a10.6 10.6 0 0 1-5.4-1.48l-.39-.23-3.9 1.02 1.04-3.8-.25-.39a10.57 10.57 0 1 1 8.91 4.88z"/>
                    </svg>
                    <span>Enviar WhatsApp</span>
                </a>
            </div>

            {{-- Footer --}}
            <div class="border-t border-gray-100 bg-white px-5 pb-5 pt-3 text-center text-sm text-gray-600">
                <span class="inline-flex items-center gap-2">
                    <span class="inline-block h-2.5 w-2.5 rounded-full bg-green-500"></span>
                    En línea
                </span>
                <span class="mx-2 text-gray-300">|</span>
                <a href="{{ $privacyUrl }}" class="text-gray-500 transition hover:text-gray-700 hover:underline">
                    Política de privacidad
                </a>
            </div>
        </div> {{-- AQUÍ se cierra ruguex-chat-box --}}

        {{-- Burbuja --}}
<button
    type="button"
    id="ruguex-chat-bubble"
    class="fixed z-[9990] bottom-5 left-1/2 flex h-12 -translate-x-1/2 items-center justify-center gap-2 rounded-full border border-gray-200 bg-white px-4 text-sm font-medium text-gray-700 shadow-[0_8px_24px_rgba(0,0,0,0.12)] transition hover:scale-[1.02] md:bottom-auto md:left-auto md:right-6 md:top-1/2 md:-translate-y-1/2 md:translate-x-0"
>
    <img src="{{ asset(ltrim($icon, '/')) }}" alt="WhatsApp" class="h-5 w-5" loading="lazy" decoding="async">
    {{ $texts['bubble'] ?? 'Cotiza por WhatsApp' }}
</button>
    </div>
@endif