@props([
  'variants'      => [],
  'alt'           => '',
  'sizes'         => '100vw',
  'class'         => '',
  'width'         => null,
  'height'        => null,
  'loading'       => 'lazy',
  'fetchpriority' => null,
  'decoding'      => 'async',
  'referrerpolicy'=> null,
  'objectFit'     => 'cover',
  'style'         => '',
])

@php
  $variants = is_array($variants) ? $variants : (method_exists($variants,'toArray') ? $variants->toArray() : []);

  $fallbackUrl = $variants['fallback']['url'] ?? '';
  $fallbackW   = $variants['fallback']['w'] ?? null;

  $origW = $variants['original_dimensions']['w'] ?? null;
  $origH = $variants['original_dimensions']['h'] ?? null;

  $imgW = $width  ?: ($origW ?: $fallbackW);
  $imgH = $height ?: ($origH ?: null);

  $formatOrder = ['avif', 'webp', 'jpg', 'jpeg', 'png'];

  $buildSrcset = function(array $arr): string {
      $byW = [];
      foreach ($arr as $v) {
          $url = $v['url'] ?? null;
          $w   = isset($v['w']) ? (int) $v['w'] : 0;

          if (!$url || $w <= 0) continue;
          $byW[$w] = $url;
      }

      if (!$byW) return '';

      ksort($byW);

      return collect($byW)
          ->map(fn($url, $w) => "{$url} {$w}w")
          ->implode(', ');
  };

  $sources = [];
  foreach ($formatOrder as $fmt) {
      if (!empty($variants[$fmt]) && is_array($variants[$fmt])) {
          $srcset = $buildSrcset($variants[$fmt]);
          if ($srcset) {
              $sources[] = [
                  'format' => $fmt,
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

  /**
   * IMPORTANTE:
   * Si no hay fallback explícito, el src del <img> debe salir
   * primero de jpg/jpeg/png, NO de avif/webp.
   */
  if (!$fallbackUrl) {
      $safeFormats = ['jpg', 'jpeg', 'png'];

      foreach ($safeFormats as $safeFmt) {
          if (!empty($variants[$safeFmt]) && is_array($variants[$safeFmt])) {
              $srcset = $buildSrcset($variants[$safeFmt]);
              if ($srcset) {
                  $first = trim(explode(',', $srcset)[0] ?? '');
                  $fallbackUrl = trim(explode(' ', $first)[0] ?? '');
                  if ($fallbackUrl) break;
              }
          }
      }
  }

  /**
   * Último recurso:
   * si no hubo jpg/png, entonces sí toma la primera variante disponible.
   */
  if (!$fallbackUrl) {
      foreach ($sources as $s) {
          $first = trim(explode(',', $s['srcset'])[0] ?? '');
          $fallbackUrl = trim(explode(' ', $first)[0] ?? '');
          if ($fallbackUrl) break;
      }
  }

  $aspect = ($imgW && $imgH) ? "{$imgW}/{$imgH}" : 'auto';
  $loadingAttr = $loading ?: 'lazy';
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