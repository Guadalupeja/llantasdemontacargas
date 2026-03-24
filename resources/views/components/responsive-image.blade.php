@props([
  'variants'      => [],            // array con ['avif'=>[], 'webp'=>[], 'jpg'=>[], 'fallback'=>['url','w'=>int|null], 'original_dimensions'=>['w','h']]
  'alt'           => '',
  'sizes'         => '100vw',
  'class'         => '',
  'width'         => null,
  'height'        => null,
  'loading'       => 'lazy',
  'fetchpriority' => null,

  // extras útiles
  'decoding'      => 'async',
  'referrerpolicy'=> null,
  'objectFit'     => 'cover',        // cover | contain | fill | none | scale-down
  'style'         => '',             // estilos extra si quieres
])
@php
  // 1) Normaliza $variants para evitar errores cuando venga como Collection o componente invokable
  $variants = is_array($variants) ? $variants : (method_exists($variants,'toArray') ? $variants->toArray() : []);

  // 2) Fallback
  $fallbackUrl = $variants['fallback']['url'] ?? '';
  $fallbackW   = $variants['fallback']['w'] ?? null;

  // 3) Dimensiones: si no vienen por props, intenta sacarlas del array original_dimensions
  $origW = $variants['original_dimensions']['w'] ?? null;
  $origH = $variants['original_dimensions']['h'] ?? null;

  $imgW = $width  ?: ($origW ?: $fallbackW);
  $imgH = $height ?: ($origH ?: null);

  // 4) Orden preferido de formatos. (Si existe en variants, se renderiza)
  $formatOrder = ['avif', 'webp', 'jpg', 'jpeg', 'png'];

  /**
   * 5) Normaliza srcset:
   * - Quita entradas incompletas
   * - Convierte w a int
   * - Elimina duplicados por width
   * - Ordena por width ascendente
   * - Devuelve string "url 320w, url 640w"
   */
  $buildSrcset = function(array $arr): string {
      $byW = [];
      foreach ($arr as $v) {
          $url = $v['url'] ?? null;
          $w   = isset($v['w']) ? (int) $v['w'] : 0;

          if (!$url || $w <= 0) continue;
          $byW[$w] = $url; // dedupe por width
      }
      if (!$byW) return '';

      ksort($byW);
      return collect($byW)->map(fn($url, $w) => "{$url} {$w}w")->implode(', ');
  };

  // 6) Construye las sources existentes respetando orden
  $sources = [];
  foreach ($formatOrder as $fmt) {
      if (!empty($variants[$fmt]) && is_array($variants[$fmt])) {
          $srcset = $buildSrcset($variants[$fmt]);
          if ($srcset) {
              $sources[] = [
                  'type'   => match($fmt) {
                      'jpg', 'jpeg' => 'image/jpeg',
                      'png'         => 'image/png',
                      default       => "image/{$fmt}",
                  },
                  'srcset' => $srcset,
              ];
          }
      }
  }

  // 7) Decide cuál será el src del <img>:
  //    - Usa fallback si existe
  //    - Si no existe fallback, intenta agarrar la "mejor" primera variante disponible
  if (!$fallbackUrl) {
      foreach ($sources as $s) {
          // Toma el primer URL del srcset
          $first = trim(explode(',', $s['srcset'])[0] ?? '');
          $fallbackUrl = trim(explode(' ', $first)[0] ?? '');
          if ($fallbackUrl) break;
      }
  }

  // 8) Aspect-ratio para evitar CLS
  $aspect = ($imgW && $imgH) ? "{$imgW}/{$imgH}" : 'auto';

  // 9) loading/fetchpriority: (opcional) si fetchpriority=high conviene loading=eager (pero tú decides)
  //    No lo forzamos, solo lo dejamos controlable.
  $loadingAttr = $loading ?: 'lazy';

  // 10) Estilo final
  $finalStyle = trim("aspect-ratio: {$aspect}; object-fit: {$objectFit}; {$style}");
@endphp

<picture>
  @foreach($sources as $s)
    <source
      type="{{ $s['type'] }}"
      srcset="{{ $s['srcset'] }}"
      sizes="{{ $sizes }}"
    >
  @endforeach

  <img
    src="{{ $fallbackUrl }}"
    alt="{{ $alt }}"
    class="{{ $class }}"
    @if($imgW) width="{{ $imgW }}" @endif
    @if($imgH) height="{{ $imgH }}" @endif
    @if($loadingAttr) loading="{{ $loadingAttr }}" @endif
    @if($fetchpriority) fetchpriority="{{ $fetchpriority }}" @endif
    @if($referrerpolicy) referrerpolicy="{{ $referrerpolicy }}" @endif
    decoding="{{ $decoding }}"
    style="{{ $finalStyle }}"
  >
</picture>