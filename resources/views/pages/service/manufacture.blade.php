@extends('layouts.app')

@section('title', 'service · manufacture | RUGUEX')
@section('meta_description', 'Página informativa: service/manufacture. Contáctanos para asesoría y cotizaciones.')

@section('structured-data')
<script type="application/ld+json">
{
  "@context":"https://schema.org",
  "@type":"WebPage",
  "url":"{{ url()->current() }}",
  "name":"@yield('title')",
  "inLanguage":"es-MX",
  "isPartOf":{"@id":"{{ url('/') }}#website"}
}
</script>
@endsection

@section('content')
<section class="mx-auto max-w-[1140px] px-4 py-10">
  <h1 class="text-3xl font-semibold text-white bg-black inline-block px-3 py-2">{{ Str::of('service/manufacture')->replace('-', ' ')->title() }}</h1>
  <p class="mt-6 text-slate-600">Contenido próximamente. Si necesitas soporte inmediato, <a href="mailto:bsh@bombasellos.com.mx" class="text-[#e76a3e] underline">escríbenos</a>.</p>
  <div class="mt-8">
    <a href="{{ url('/#T7') }}" class="inline-block rounded bg-[#e76a3e] px-6 py-3 text-white">Cotizar ahora</a>
  </div>
</section>
@endsection
