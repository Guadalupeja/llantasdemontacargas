@extends('layouts.public')

@section('title', 'gracias | RUGUEX')
@section('meta_description', 'Página informativa: gracias. Contáctanos para asesoría y cotizaciones.')

@section('structured-data')
<meta name="robots" content="noindex, nofollow">

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "ThankYouPage",
  "@id": "https://llantasdemontacargas.com/gracias/#webpage",
  "url": "https://llantasdemontacargas.com/gracias/",
  "name": "gracias | RUGUEX",
  "description": "Página informativa: gracias. Contáctanos para asesoría y cotizaciones.",
  "inLanguage": "es-MX",
  "isPartOf": { "@id": "https://llantasdemontacargas.com/#website" }
}
</script>
@endsection


@section('content')



<section
  class="relative block box-border bg-center bg-no-repeat bg-cover transition-[background,border,border-radius,box-shadow] duration-300"
    style="
    /* Fallback universal */
    background-image:url('{{ asset('storage/originals/heros/venta-de-llantas-para-montacargas.jpg') }}');

    /* Navegadores con image-set escogerán el mejor formato */
    background-image: image-set(
      url('{{ asset('storage/variants/originals/heros/venta-de-llantas-para-montacargas-1024.avif') }}') type('image/avif') 1x,
      url('{{ asset('storage/variants/originals/heros/venta-de-llantas-para-montacargas-1024.webp') }}') type('image/webp') 1x,
      url('{{ asset('storage/originals/heros/venta-de-llantas-para-montacargas.jpg') }}') type('image/jpeg') 1x
    );
  "
>
  <div class="relative mx-auto flex max-w-[1140px] items-center box-border min-h-[400px]">
    <div class="relative flex w-full min-h-px box-border">
      <div class="relative flex w-full flex-wrap content-start p-[10px] box-border">
        <!-- Spacer 138 -->
        <div class="w-full mb-5">
          <div class="h-[138px]"></div>
        </div>

        <!-- Heading -->
        <div class="w-full text-center mb-5">
          <div class="m-0 p-0 font-['Roboto',sans-serif] lg:text-[36px] lg:leading-[36px] text-[26px] leading-[26px] font-semibold text-white">
            Muchas gracias por tu interés en breve un asesor se pondra en contacto contigo.<br />
            <br />
            Te invitamos a conocer nuestra tienda en linea.
          </div>
        </div>

        <!-- Spacer 50 -->
        <div class="w-full mb-5">
          <div class="h-[50px]"></div>
        </div>

<!-- Buttons row -->
<section class="relative w-full block box-border">
  <div class="relative mx-auto flex lg:flex-row flex-col max-w-[1140px] box-border">
    <!-- Col 1 -->
    <div class="relative flex w-full lg:w-1/2 min-h-px box-border">
      <div class="relative flex w-full flex-wrap content-start p-[10px] box-border">
        <div class="w-full text-center">
          <a
            href="https://llantasdemontacargas.com/tienda-en-linea/"
            class="inline-flex w-full items-center justify-center rounded-[3px] bg-[#ff6400] px-6 py-3 text-center font-['Roboto',sans-serif] text-[15px] leading-[15px] font-medium text-white no-underline shadow-none transition duration-300"
          >
            <span class="flex justify-center w-full">
              <span class="block">IR A LA TIENDA EN LINEA</span>
            </span>
          </a>
        </div>
      </div>
    </div>

    <!-- Col 2 -->
    <div class="relative flex w-full lg:w-1/2 min-h-px box-border">
      <div class="relative flex w-full flex-wrap content-start p-[10px] box-border">
        <div class="w-full text-center">
          <a
            href="https://wa.me/525951124238"
            target="_blank"
            rel="noopener"
            class="inline-flex w-full items-center justify-center rounded-[3px] bg-[#009c05] px-6 py-3 text-center font-['Roboto',sans-serif] text-[15px] leading-[15px] font-medium text-white no-underline shadow-none transition duration-300"
          >
            <span class="flex items-center justify-center gap-[5px] w-full">
              <i aria-hidden="true" class="fa-brands fa-whatsapp leading-[15px]"></i>
              <span class="block">COTIZA POR WHATSAPP</span>
            </span>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>


        <!-- Spacer 74 -->
        <div class="w-full">
          <div class="h-[74px]"></div>
        </div>
      </div>
    </div>
  </div>
</section>



@endsection
