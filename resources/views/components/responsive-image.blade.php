@props([
  'variants'      => [],            // array con ['avif'=>[], 'webp'=>[], 'fallback'=>['url','w']]
  'alt'           => '',
  'sizes'         => '100vw',
  'class'         => '',
  'width'         => null,
  'height'        => null,
  'loading'       => 'lazy',
  'fetchpriority' => null,
])

@php
  // Asegura arrays puros (por si vienen como Collection/InvokableComponentVariable)
  $variants = is_array($variants) ? $variants : (method_exists($variants,'toArray') ? $variants->toArray() : []);
  $avif = isset($variants['avif']) && is_array($variants['avif']) ? $variants['avif'] : [];
  $webp = isset($variants['webp']) && is_array($variants['webp']) ? $variants['webp'] : [];
  $fallbackUrl = $variants['fallback']['url'] ?? '';
@endphp

<picture>
  @if(!empty($avif))
    <source type="image/avif"
            srcset="{{ collect($avif)->map(fn($v) => ($v['url'] ?? '').' '.($v['w'] ?? '').'w')->join(', ') }}"
            sizes="{{ $sizes }}">
  @endif

  @if(!empty($webp))
    <source type="image/webp"
            srcset="{{ collect($webp)->map(fn($v) => ($v['url'] ?? '').' '.($v['w'] ?? '').'w')->join(', ') }}"
            sizes="{{ $sizes }}">
  @endif

  <img
    src="{{ $fallbackUrl }}"
    alt="{{ $alt }}"
    class="{{ $class }}"
    @if($width)  width="{{ $width }}"   @endif
    @if($height) height="{{ $height }}" @endif
    @if($loading) loading="{{ $loading }}" @endif
    @if($fetchpriority) fetchpriority="{{ $fetchpriority }}" @endif
    decoding="async"
    style="aspect-ratio: {{ ($width && $height) ? ($width.'/'.$height) : 'auto' }}; object-fit: cover;">
</picture>
