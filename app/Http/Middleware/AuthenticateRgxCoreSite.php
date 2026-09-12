<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class AuthenticateRgxCoreSite
{
    public function handle(
        Request $request,
        Closure $next
    ): Response {
        $incomingToken = trim(
            (string) $request->bearerToken()
        );

        if ($incomingToken === '') {
            return $this->unauthorized();
        }

        $matches = [];

        $sites = config(
            'rgx-chatbot.core_sites',
            []
        );

        if (! is_array($sites)) {
            $sites = [];
        }

        foreach ($sites as $siteId => $site) {
            if (
                ! is_string($siteId)
                || ! is_array($site)
            ) {
                continue;
            }

            $siteId = strtolower(
                trim($siteId)
            );

            if (
                preg_match(
                    '/^[a-z0-9_-]{1,40}$/',
                    $siteId
                ) !== 1
            ) {
                continue;
            }

            $configuredToken = trim(
                (string) (
                    $site['token']
                    ?? ''
                )
            );

            /*
             * Un token vacío, corto o de ejemplo
             * nunca habilita un sitio.
             */
            if (strlen($configuredToken) < 32) {
                continue;
            }

            if (! hash_equals(
                $configuredToken,
                $incomingToken
            )) {
                continue;
            }

            $origin = trim(
                (string) (
                    $site['origin']
                    ?? ''
                )
            );

            $defaultVertical = strtolower(
                trim(
                    (string) (
                        $site[
                            'default_vertical'
                        ]
                        ?? ''
                    )
                )
            );

            if (
                $origin === ''
                || ! in_array(
                    $defaultVertical,
                    [
                        'montacargas',
                        'minicargadores',
                    ],
                    true
                )
            ) {
                continue;
            }

            $matches[] = [
                'site_id' => $siteId,
                'site_origin' => $origin,

                'default_vertical' =>
                    $defaultVertical,
            ];
        }

        /*
         * Debe existir una sola identidad.
         * También falla cerrado si dos sitios
         * fueron configurados accidentalmente
         * con el mismo token.
         */
        if (count($matches) !== 1) {
            return $this->unauthorized();
        }

        $scope = trim(
            (string) $request->input(
                'scope',
                ''
            )
        );

        if (! Str::isUuid($scope)) {
            return response()->json([
                'error' => 'Solicitud inválida.',

                'errors' => [
                    'scope' => [
                        'El scope debe ser un UUID válido.',
                    ],
                ],
            ], 422);
        }

        /*
         * Estos atributos no proceden del body.
         * Sólo existen después de autenticar
         * el servidor adaptador.
         */
        $request->attributes->set(
            'rgx_site',
            $matches[0]
        );

        $request->attributes->set(
            'rgx_scope',
            $scope
        );

        return $next($request);
    }

    private function unauthorized(): Response
    {
        return response()->json([
            'error' => 'No autorizado.',
        ], 401);
    }
}
