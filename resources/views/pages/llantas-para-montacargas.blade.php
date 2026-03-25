@extends('layouts.public')

@section('title', 'Llantas para montacargas sólidas, neumáticas | Trelleborg MX')
@section('meta_description', 'Cotiza llantas para montacargas neumáticas, sólidas, con arillo y de poliuretano,entrega inmediata, precios mayorista, envío GRATIS a toda la República mexicana')

@section('structured-data')
  <link rel="dns-prefetch" href="//js.hsforms.net">
  <link rel="preconnect" href="https://js.hsforms.net" crossorigin>

  <link
    rel="preload"
    as="image"
    imagesrcset="
      {{ asset('storage/variants/originals/heros/venta-de-llantas-para-montacargas-960.avif') }} 960w,
      {{ asset('storage/variants/originals/heros/venta-de-llantas-para-montacargas-1024.avif') }} 1024w,
      {{ asset('storage/variants/originals/heros/venta-de-llantas-para-montacargas-960.webp') }} 960w,
      {{ asset('storage/variants/originals/heros/venta-de-llantas-para-montacargas-1024.webp') }} 1024w,
      {{ asset('storage/originals/heros/venta-de-llantas-para-montacargas.jpg') }} 1600w
    "
    imagesizes="100vw">

  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@graph": [
      {
        "@type": "WebSite",
        "@id": "{{ url('/') }}#website",
        "url": "{{ url('/') }}",
        "name": "Llantas para Montacargas, Minicargadores y Telehandlers | RUGUEX",
        "inLanguage": "es-MX",
        "publisher": {
          "@id": "{{ url('/') }}#organization"
        }
      },
      {
        "@type": "Organization",
        "@id": "{{ url('/') }}#organization",
        "name": "Bombas Sellos y Hules Industriales S.A. de C.V.",
        "alternateName": [
          "BSH",
          "RUGUEX",
          "BSH | Llantas de Montacargas"
        ],
        "url": "{{ url('/') }}",
        "logo": {
          "@type": "ImageObject",
          "url": "{{ asset('storage/originals/ruguex-llantas-para-minicargadores-distrubuidor-trelleborg-1-1.png') }}"
        },
        "image": [
          "{{ asset('storage/originals/heros/venta-de-llantas-para-montacargas.jpg') }}"
        ],
        "description": "Distribuidor en México de llantas industriales Trelleborg para montacargas. Venta, asesoría técnica, entrega inmediata, precios mayorista, envío a toda la República mexicana y atención a proyectos de manejo de materiales.",
        "email": "ventas@llantasdemontacargas.com",
        "contactPoint": [
          {
            "@type": "ContactPoint",
            "telephone": "+52-55-5752-1715",
            "contactType": "sales",
            "areaServed": "MX",
            "availableLanguage": ["es-MX"]
          },
          {
            "@type": "ContactPoint",
            "telephone": "+52-83-3246-2205",
            "contactType": "sales",
            "areaServed": "MX",
            "availableLanguage": ["es-MX"]
          },
          {
            "@type": "ContactPoint",
            "telephone": "+52-83-3239-5885",
            "contactType": "sales",
            "areaServed": "MX",
            "availableLanguage": ["es-MX"]
          },
          {
            "@type": "ContactPoint",
            "telephone": "+52-22-2227-3866",
            "contactType": "sales",
            "areaServed": "MX",
            "availableLanguage": ["es-MX"]
          },
          {
            "@type": "ContactPoint",
            "telephone": "+52-59-5112-4238",
            "contactType": "sales",
            "areaServed": "MX",
            "availableLanguage": ["es-MX"]
          }
        ],
        "address": {
          "@type": "PostalAddress",
          "streetAddress": "Avenida 125 Oriente #224, Guadalupe Hidalgo",
          "addressLocality": "Puebla",
          "addressRegion": "PUE",
          "postalCode": "72494",
          "addressCountry": "MX"
        },
        "areaServed": {
          "@type": "Country",
          "name": "México"
        },
        "brand": [
          {
            "@type": "Brand",
            "name": "RUGUEX"
          },
          {
            "@type": "Brand",
            "name": "Trelleborg"
          }
        ],
        "knowsAbout": [
          "Llantas para montacargas",
          "Llantas sólidas para montacargas",
          "Llantas sólidas con arillo para montacargas",
          "Llantas neumáticas para montacargas",
          "Llantas de poliuretano para montacargas",
          "Bandajes Press On para montacargas",
          "Llantas industriales Trelleborg",
          "Asesoría técnica en selección de llantas para montacargas"
        ]
      },
      {
        "@type": "WebPage",
        "@id": "{{ url()->current() }}#webpage",
        "url": "{{ url()->current() }}",
        "name": "@yield('title')",
        "description": "@yield('meta_description')",
        "inLanguage": "es-MX",
        "isPartOf": {
          "@id": "{{ url('/') }}#website"
        },
        "about": [
          {
            "@id": "{{ url()->current() }}#catalog"
          },
          {
            "@id": "{{ url()->current() }}#service"
          }
        ],
        "primaryImageOfPage": {
          "@type": "ImageObject",
          "url": "{{ asset('storage/originals/venta-de-llantas-para-montagarcas-de-la-marca-trelleborg-1.jpg') }}"
        },
        "breadcrumb": {
          "@id": "{{ url()->current() }}#breadcrumb"
        },
        "mainEntity": {
          "@id": "{{ url()->current() }}#catalog"
        }
      },
      {
        "@type": "CollectionPage",
        "@id": "{{ url()->current() }}#catalog",
        "url": "{{ url()->current() }}",
        "name": "Catálogo de llantas para montacargas Trelleborg en México",
        "description": "Catálogo de llantas para montacargas Trelleborg en México con opciones sólidas, sólidas con arillo, neumáticas y de poliuretano. Incluye modelos para trabajo ligero, medio y pesado con entrega inmediata, precios mayorista y asesoría técnica.",
        "inLanguage": "es-MX",
        "isPartOf": {
          "@id": "{{ url('/') }}#website"
        },
        "about": [
          {
            "@type": "Thing",
            "name": "Llantas sólidas para montacargas"
          },
          {
            "@type": "Thing",
            "name": "Llantas sólidas con arillo para montacargas"
          },
          {
            "@type": "Thing",
            "name": "Llantas neumáticas para montacargas"
          },
          {
            "@type": "Thing",
            "name": "Llantas de poliuretano para montacargas"
          }
        ],
        "hasPart": [
          {
            "@id": "{{ url()->current() }}#solid-tires"
          },
          {
            "@id": "{{ url()->current() }}#press-on-tires"
          },
          {
            "@id": "{{ url()->current() }}#pneumatic-tires"
          },
          {
            "@id": "{{ url()->current() }}#polyurethane-tires"
          }
        ]
      },
      {
        "@type": "Service",
        "@id": "{{ url()->current() }}#service",
        "name": "Venta y asesoría de llantas para montacargas en México",
        "serviceType": "Venta y asesoría técnica de llantas para montacargas",
        "provider": {
          "@id": "{{ url('/') }}#organization"
        },
        "areaServed": {
          "@type": "Country",
          "name": "México"
        },
        "audience": {
          "@type": "Audience",
          "audienceType": "Empresas industriales, almacenes, centros logísticos, puertos, siderúrgicas, recicladoras y operaciones de manejo de materiales"
        },
        "description": "Servicio de cotización y asesoría para seleccionar llantas sólidas, neumáticas, con arillo y de poliuretano para montacargas según carga, superficie, velocidad, intensidad de uso y condiciones de operación."
      },
      {
        "@type": "ItemList",
        "@id": "{{ url()->current() }}#solid-tires",
        "name": "Llantas sólidas para montacargas",
        "itemListOrder": "https://schema.org/ItemListOrderAscending",
        "numberOfItems": 6,
        "itemListElement": [
          { "@type": "ListItem", "position": 1, "url": "{{ url('llantas-para-montacargas/trelleborg-elite-xp') }}", "name": "Trelleborg XP1000" },
          { "@type": "ListItem", "position": 2, "url": "{{ url('llantas-para-montacargas/trelleborg-xp800') }}", "name": "Trelleborg XP800" },
          { "@type": "ListItem", "position": 3, "url": "{{ url('llantas-para-montacargas/trelleborg-master-solid') }}", "name": "Trelleborg Master Solid" },
          { "@type": "ListItem", "position": 4, "url": "{{ url('llantas-para-montacargas/trelleborg-pro-hd') }}", "name": "Trelleborg PRO HD" },
          { "@type": "ListItem", "position": 5, "url": "{{ url('llantas-para-montacargas/trelleborg-m2') }}", "name": "Trelleborg M2" },
          { "@type": "ListItem", "position": 6, "url": "{{ url('llantas-para-montacargas/trelleborg-ecosolid') }}", "name": "Trelleborg ECOSOLID" }
        ]
      },
      {
        "@type": "ItemList",
        "@id": "{{ url()->current() }}#press-on-tires",
        "name": "Llantas sólidas con arillo para montacargas",
        "itemListOrder": "https://schema.org/ItemListOrderAscending",
        "numberOfItems": 6,
        "itemListElement": [
          { "@type": "ListItem", "position": 1, "url": "{{ url('llantas-para-montacargas/trelleborg-press-on') }}", "name": "Trelleborg Press On" },
          { "@type": "ListItem", "position": 2, "url": "{{ url('llantas-para-montacargas/trelleborg-ps1000') }}", "name": "Trelleborg PS1000" },
          { "@type": "ListItem", "position": 3, "url": "{{ url('llantas-para-montacargas/trelleborg-itl-maxmatic-press-on') }}", "name": "Trelleborg ITL Maxmatic Press On" },
          { "@type": "ListItem", "position": 4, "url": "{{ url('llantas-para-montacargas/trelleborg-mono-grip-bandaje-press-on') }}", "name": "Trelleborg Mono-Grip bandaje Press On" },
          { "@type": "ListItem", "position": 5, "url": "{{ url('llantas-para-montacargas/trelleborg-itl-press-on') }}", "name": "Trelleborg ITL Press On" },
          { "@type": "ListItem", "position": 6, "url": "{{ url('llantas-para-montacargas/trelleborg-ps800-con-arillo') }}", "name": "Trelleborg PS800" }
        ]
      },
      {
        "@type": "ItemList",
        "@id": "{{ url()->current() }}#pneumatic-tires",
        "name": "Llantas neumáticas para montacargas",
        "itemListOrder": "https://schema.org/ItemListOrderAscending",
        "numberOfItems": 3,
        "itemListElement": [
          { "@type": "ListItem", "position": 1, "url": "{{ url('llantas-para-montacargas/trelleborg-tr-900-neumatica-radial') }}", "name": "Trelleborg TR-900 Neumática Radial" },
          { "@type": "ListItem", "position": 2, "url": "{{ url('llantas-para-montacargas/trelleborg-t-800') }}", "name": "Trelleborg T-800" },
          { "@type": "ListItem", "position": 3, "url": "{{ url('llantas-para-montacargas/trelleborg-t-900-neumatica') }}", "name": "Trelleborg T-900 Neumático" }
        ]
      },
      {
        "@type": "ItemList",
        "@id": "{{ url()->current() }}#polyurethane-tires",
        "name": "Llantas de poliuretano para montacargas",
        "itemListOrder": "https://schema.org/ItemListOrderAscending",
        "numberOfItems": 2,
        "itemListElement": [
          { "@type": "ListItem", "position": 1, "url": "{{ url('llantas-para-montacargas/llanta-de-poliuretano-monothane') }}", "name": "Llanta de Poliuretano Monothane®" },
          { "@type": "ListItem", "position": 2, "url": "{{ url('llantas-para-montacargas/llanta-de-poliuretano-permathane') }}", "name": "Llanta de Poliuretano Permathane®" }
        ]
      },
      {
        "@type": "BreadcrumbList",
        "@id": "{{ url()->current() }}#breadcrumb",
        "itemListElement": [
          {
            "@type": "ListItem",
            "position": 1,
            "name": "Inicio",
            "item": "{{ url('/') }}"
          },
          {
            "@type": "ListItem",
            "position": 2,
            "name": "Llantas para montacargas",
            "item": "{{ url()->current() }}"
          }
        ]
      }
    ]
  }
  </script>
@endsection

@section('content')
@php
  $cardSizes = '(max-width: 768px) 92vw, (max-width: 1140px) 33vw, 380px';

  $makeImage = function (string $path) use ($cardSizes) {
      $variants = image_variants($path);

      $toSrcset = function ($arr) {
          return implode(', ', array_map(fn($v) => $v['url'].' '.$v['w'].'w', $arr));
      };

      return [
          'sizes'    => $cardSizes,
          'avif'     => !empty($variants['avif']) ? $toSrcset($variants['avif']) : null,
          'webp'     => !empty($variants['webp']) ? $toSrcset($variants['webp']) : null,
          'jpg'      => !empty($variants['jpg'])  ? $toSrcset($variants['jpg'])  : null,
          'fallback' => $variants['fallback']['url'] ?? '',
      ];
  };

  $solidCards = [
      [
          'url' => url('llantas-para-montacargas/trelleborg-elite-xp'),
          'title' => 'Trelleborg XP1000',
          'alt' => 'Trelleborg XP1000',
          'image' => $makeImage('originals/MOSAICO-XP1000.png'),
          'box' => 'p-4',
          'items' => [
              'Llanta maciza elástica <strong>SUPER PREMIUM</strong> para trabajo pesado en almacenes, chatarreras, reciclaje y siderúrgicas.',
              'Hasta 3 turnos de trabajo continuos.',
          ],
      ],
      [
          'url' => url('llantas-para-montacargas/trelleborg-xp800'),
          'title' => 'Trelleborg XP800',
          'alt' => 'Trelleborg XP800',
          'image' => $makeImage('originals/MOSAICO-XP800.png'),
          'box' => 'p-4',
          'items' => [
              'Llanta sólida de segmento <strong>ESTÁNDAR</strong>.',
              'Gran desempeño a precio bajo para transporte de cargas ligeras.',
              'Apta para montacargas <strong>eléctricos y de combustión.</strong>',
          ],
      ],
      [
          'url' => url('llantas-para-montacargas/trelleborg-master-solid'),
          'title' => 'Trelleborg Master Solid',
          'alt' => 'Trelleborg master solid',
          'image' => $makeImage('originals/master-solid.png'),
          'box' => 'p-4',
          'items' => [
              'Llanta sólida del segmento <strong>ESTÁNDAR</strong> a precio económico.',
              'Uso medio y ligero con tránsito principalmente en almacenes.',
              'Larga vida útil.',
          ],
      ],
      [
          'url' => url('llantas-para-montacargas/trelleborg-pro-hd'),
          'title' => 'Trelleborg PRO HD',
          'alt' => 'Trelleborg PRO HD',
          'image' => $makeImage('originals/Trelleborg-Pro-HD.png'),
          'box' => 'p-4',
          'items' => [
              'Las llantas macizas Ultra-Premium <strong>mas resistentes del mercado.</strong>',
              'Para montacargas de uso rudo, expuestos a sobrecargas y en procesos críticos en la industria.',
          ],
      ],
      [
          'url' => url('llantas-para-montacargas/trelleborg-m2'),
          'title' => 'Trelleborg M2',
          'alt' => 'Trelleborg M2',
          'image' => $makeImage('originals/M2.png'),
          'box' => 'p-4',
          'items' => [
              'Llanta SUPER PREMIUM para montacargas <strong>de uso rudo</strong> y aplicaciones muy demandantes.',
              'Ideal para la industria metal-mecánica, siderúrgica y chatarreras con elementos cortantes.',
          ],
      ],
      [
          'url' => url('llantas-para-montacargas/trelleborg-ecosolid'),
          'title' => 'Trelleborg ECOSOLID',
          'alt' => 'Trelleborg ECOSOLID',
          'image' => $makeImage('originals/llanta-solida-para-montacargas.jpg'),
          'box' => 'p-4',
          'items' => [
              'Llanta sólida muy económica para montacargas, apiladores y carretillas en aplicaciones ligeras.',
              'Diseño de huella agresivo brinda <strong>excelente tracción</strong> en pisos lisos.',
          ],
      ],
  ];

  $pressOnCards = [
      [
          'url' => url('llantas-para-montacargas/trelleborg-press-on'),
          'title' => 'Trelleborg Press On',
          'alt' => 'Trelleborg Press ON',
          'image' => $makeImage('originals/Una-llanta-tipo-cushion-llantas-treleborg.webp'),
          'box' => 'p-7',
          'items' => [
              'Una llanta tipo cushion SUPER PREMIUM para condiciones demandantes <strong>con vida útil extendida.</strong>',
              'Desarrollo exclusivo de la marca une permanentemente el hule con el aro metálico.',
          ],
      ],
      [
          'url' => url('llantas-para-montacargas/trelleborg-ps1000'),
          'title' => 'Trelleborg PS1000',
          'alt' => 'Trelleborg PS1000',
          'image' => $makeImage('originals/MOSAICO-PS-1000.png'),
          'box' => 'p-7',
          'items' => [
              'Llanta PREMIUM sólida con aro metálico <strong>rendimiento prolongado.</strong>',
              'El nuevo PS1000 <strong>dura hasta un 30% más que los neumáticos de la competencia disponibles en el mercado,</strong> lo que lleva a un costo por hora muy bajo, disminuye desgaste, mejora tracción y estabilidad.',
          ],
      ],
      [
          'url' => url('llantas-para-montacargas/trelleborg-itl-maxmatic-press-on'),
          'title' => 'Trelleborg ITL Maxmatic Press On',
          'alt' => 'Trelleborg ITL MAXMATIC',
          'image' => $makeImage('originals/Llantas-solidas-con-arillo-para-Montacargas.webp'),
          'box' => 'p-4',
          'items' => [
              'Es una llanta PREMIUM con aro Press On, capacidad de carga <strong>superior hasta en un 25%</strong> frente a la competencia gracias a su amplia banda de rodamiento de desarrollo exclusivo de la marca.',
          ],
      ],
      [
          'url' => url('llantas-para-montacargas/trelleborg-mono-grip-bandaje-press-on'),
          'title' => 'Trelleborg Mono-Grip bandaje Press On',
          'alt' => 'Trelleborg mono grip Press ON',
          'image' => $makeImage('originals/Llanta-solida-con-arillo.jpg'),
          'box' => 'p-4',
          'items' => [
              'Llanta PREMIUM sólida con arillo',
              '<strong>Mejor distribución</strong> de carga gracias a su perfil único de área de contacto.',
              'Compuesto Dual, desarrollo exclusivo de la marca con <strong>vida útil extendida</strong>',
          ],
      ],
      [
          'url' => url('llantas-para-montacargas/trelleborg-itl-press-on'),
          'title' => 'Trelleborg ITL Press On',
          'alt' => 'Trelleborg itl ps on',
          'image' => $makeImage('originals/Llanta-PREMIUM-solida-con-anillo-para-montacargas-de-uso-rudo.webp'),
          'box' => 'p-7',
          'items' => [
              'Llanta PREMIUM sólida con arillo para montacargas de <strong>uso rudo.</strong>',
              'Su proceso de fabricación y unión del hule con la banda logra <strong>más resistencia</strong> al desgaste y <strong>durabilidad</strong> sobre cualquier competidor.',
          ],
      ],
      [
          'url' => url('llantas-para-montacargas/trelleborg-ps800-con-arillo'),
          'title' => 'Trelleborg PS800',
          'alt' => 'Trelleborg PS800',
          'image' => $makeImage('originals/PS800.webp'),
          'box' => 'p-7',
          'items' => [
              'Nuevo bandaje para aplicaciones de intensidad media.',
              'Su gran versatilidad le permite operar en cualquier condición.',
              '<strong>Gran desempeño a precio bajo.</strong> Apta para montacargas eléctricos y de combustión.',
          ],
      ],
  ];

  $pneumaticCards = [
      [
          'url' => url('llantas-para-montacargas/trelleborg-tr-900-neumatica-radial'),
          'title' => 'Trelleborg TR-900 Neumática Radial',
          'alt' => 'Trelleborg TR-900',
          'image' => $makeImage('originals/Llanta-neumatica-reforzada.jpg'),
          'box' => 'p-4',
          'items' => [
              'Llanta neumática PREMIUM, <strong>reforzada,</strong> construcción radial para <strong>altas velocidades</strong> y trabajo pesado.',
              'Lados <strong>superreforzados </strong>para soportar cualquier impacto.',
          ],
      ],
      [
          'url' => url('llantas-para-montacargas/trelleborg-t-800'),
          'title' => 'Trelleborg T-800',
          'alt' => 'Trelleborg T800',
          'image' => $makeImage('originals/Neumatico-de-uso-medio-a-ligero.jpg'),
          'box' => 'p-7',
          'items' => [
              'Neumático <strong>redituable </strong>para aplicaciones de uso medio a ligero.',
              'Banda de rodamiento con <strong>excelente tracción.</strong>',
              'Llanta muy cómoda y de gran maniobrabilidad.',
          ],
      ],
      [
          'url' => url('llantas-para-montacargas/trelleborg-t-900-neumatica'),
          'title' => 'Trelleborg T-900 Neumático',
          'alt' => 'Trelleborg T-900',
          'image' => $makeImage('originals/Llanta-con-camara-del-segmento.jpg'),
          'box' => 'p-4',
          'items' => [
              'Llanta <strong>con cámara</strong> PREMIUM para <strong>trabajo pesado</strong> dentro y fuera de planta.',
              'Su gran versatilidad le permite operar en cualquier condición.',
              '<strong>Huella amplia </strong>de gran estabilidad y banda de rodamiento plana <strong> alargan la vida </strong>del neumático.',
          ],
      ],
  ];

  $polyurethaneCards = [
      [
          'url' => url('llantas-para-montacargas/llanta-de-poliuretano-monothane'),
          'title' => 'Llanta de Poliuretano Monothane®',
          'alt' => 'Trelleborg Llanta de Poliuretano Monothane®',
          'image' => $makeImage('originals/Llanta-de-poliuretano-de-alta-calidad-con-anillo-metalico.jpg'),
          'box' => 'p-4',
          'items' => [
              'Llanta de poliuretano de alta calidad con arillo metálico Press-On, <strong>para almacenes y suelos uniformes.</strong>',
              'Serie PREMIUM para gran carga disponibles dureza 83 Shore A y 92 Shore A; de <strong>materiales de primera y diseño exclusivo.</strong>',
          ],
      ],
      [
          'url' => url('llantas-para-montacargas/llanta-de-poliuretano-permathane'),
          'title' => 'Llanta de Poliuretano Permathane®',
          'alt' => 'Llanta de Poliuretano Permathane®',
          'image' => $makeImage('originals/Llanta-ultra-PREMIUM-para-carga-adicional-y-resistencia.jpg'),
          'box' => 'p-4',
          'items' => [
              'Llanta ultra PREMIUM para carga adicional y <strong>resistencia al frio extremo </strong>en almacenes refrigerados.',
              'Disponible en durezas 80 Shore A y 90 Shore A. Mayor capacidad de carga que las llantas de hule.',
          ],
      ],
  ];
@endphp

<section class="bg-black">
    <div class="mx-auto max-w-[1140px] px-4 py-3 text-center">
        <h1 class="m-0 text-4xl font-semibold leading-tight text-white md:text-[40px] md:leading-[40px]">
            Llantas para Montacargas
        </h1>
    </div>
</section>

<section
    class="relative overflow-hidden bg-cover bg-center bg-no-repeat"
    style="
      background-image: url('{{ asset('storage/originals/venta-de-llantas-para-montagarcas-de-la-marca-trelleborg-1.jpg') }}');
      background-image: image-set(
        url('{{ asset('storage/variants/originals/venta-de-llantas-para-montagarcas-de-la-marca-trelleborg-1-960.avif') }}') 1x,
        url('{{ asset('storage/variants/originals/venta-de-llantas-para-montagarcas-de-la-marca-trelleborg-1-960.webp') }}') 1x,
        url('{{ asset('storage/originals/venta-de-llantas-para-montagarcas-de-la-marca-trelleborg-1.jpg') }}') 1x
      );
    "
>
    <div class="absolute inset-0 bg-black/45"></div>

    <div class="relative mx-auto flex min-h-[160px] max-w-[1140px] items-center justify-center px-4 py-6 text-center">
        <a
            href="#contacto"
            class="inline-flex items-center justify-center rounded-md bg-[#e76a3e] px-8 py-4 text-base font-semibold text-white transition hover:bg-[#e14f32]"
        >
            ¡Cotiza ahora mismo!
        </a>
    </div>
</section>

<section>
    <div class="mx-auto max-w-[1140px] px-[10px]">
        <div class="my-5 h-10"></div>

        <h2 class="m-0 p-0 text-center font-sans text-[38px] font-semibold leading-[38px] text-black">
            Catálogo de llantas para Montacargas
        </h2>
    </div>
</section>

<section>
    <div class="mx-auto my-5 max-w-[1140px]">
        <div class="flex flex-wrap">
            <div class="w-full p-[10px] md:w-1/4">
                <a
                    href="#solidas-montacargas"
                    class="flex justify-center rounded-[3px] bg-[#e76a3e] px-6 py-3 text-center text-[15px] font-medium leading-[15px] text-white transition duration-300 hover:bg-[#d94c2b]"
                >
                    Llantas Sólidas para Montacargas
                </a>
            </div>

            <div class="w-full p-[10px] md:w-1/4">
                <a
                    href="#solidas-con-arillo-para-montacargas"
                    class="flex justify-center rounded-[3px] bg-[#e76a3e] px-6 py-3 text-center text-[15px] font-medium leading-[15px] text-white transition duration-300 hover:bg-[#d94c2b]"
                >
                    Llantas sólidas con arillo para Montacargas
                </a>
            </div>

            <div class="w-full p-[10px] md:w-1/4">
                <a
                    href="#neumaticas-montacargas"
                    class="flex justify-center rounded-[3px] bg-[#e76a3e] px-6 py-3 text-center text-[15px] font-medium leading-[15px] text-white transition duration-300 hover:bg-[#d94c2b]"
                >
                    Llantas Neumáticas para Montacargas
                </a>
            </div>

            <div class="w-full p-[10px] md:w-1/4">
                <a
                    href="#llantas-poliuretano-montacargas"
                    class="flex justify-center rounded-[3px] bg-[#e76a3e] px-6 py-3 text-center text-[15px] font-medium leading-[15px] text-white transition duration-300 hover:bg-[#d94c2b]"
                >
                    Llantas de Poliuretano para Montacargas
                </a>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="mx-auto max-w-[1140px] px-[10px] pt-5 pb-10 text-center" id="solidas-montacargas">
        <h2 class="my-5 text-2xl font-semibold leading-tight text-black md:text-[33px] md:leading-[33px]">
            Llantas Sólidas/Rudomáticas para Montacargas
        </h2>

        <p class="my-[23px] text-base font-normal text-[#7a7a7a] md:text-[20px]">
            Llantas libres de mantenimiento, imponchables y óptimas para cualquier superficie y carga.
        </p>
    </div>
</section>

<section class="py-8 [content-visibility:auto] [contain-intrinsic-size:1px_1400px]">
  <div class="max-w-[1140px] mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
    @foreach($solidCards as $card)
      <div class="text-center">
        <a href="{{ $card['url'] }}">
          <figure class="m-0 text-center">
            <picture>
              @if($card['image']['avif'])
                <source type="image/avif" srcset="{{ $card['image']['avif'] }}" sizes="{{ $card['image']['sizes'] }}">
              @endif
              @if($card['image']['webp'])
                <source type="image/webp" srcset="{{ $card['image']['webp'] }}" sizes="{{ $card['image']['sizes'] }}">
              @endif
              @if($card['image']['jpg'])
                <source type="image/jpeg" srcset="{{ $card['image']['jpg'] }}" sizes="{{ $card['image']['sizes'] }}">
              @endif

              <img
                src="{{ $card['image']['fallback'] }}"
                alt="{{ $card['alt'] }}"
                width="594"
                height="722"
                loading="lazy"
                decoding="async"
                class="inline-block h-auto max-w-full align-middle border-0"
              >
            </picture>
          </figure>
        </a>

        <div class="bg-[#00063a] {{ $card['box'] }} mb-4">
          <h2 class="text-white text-[26px] font-semibold leading-[26px]">
            <a href="{{ $card['url'] }}" class="text-white">
              {{ $card['title'] }}
            </a>
          </h2>
        </div>

        <ul class="text-[#7a7a7a] text-left leading-[32px] list-disc pl-6">
          @foreach($card['items'] as $item)
            <li>{!! $item !!}</li>
          @endforeach
        </ul>
      </div>
    @endforeach
  </div>
</section>

<section>
    <div class="mx-auto max-w-[1140px] px-[10px] pt-5 pb-10 text-center" id="solidas-con-arillo-para-montacargas">
        <h2 class="my-5 text-2xl font-semibold leading-tight text-black md:text-[33px] md:leading-[33px]">
            Llantas sólidas con arillo para Montacargas
        </h2>

        <p class="my-[23px] text-base font-normal text-[#7a7a7a] md:text-[20px]">
            Bandajes libres de mantenimiento.
       </p>
    </div>
</section>

<section class="py-8 [content-visibility:auto] [contain-intrinsic-size:1px_1400px]">
  <div class="max-w-[1140px] mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
    @foreach($pressOnCards as $card)
      <div class="text-center">
        <a href="{{ $card['url'] }}">
          <figure class="m-0 text-center">
            <picture>
              @if($card['image']['avif'])
                <source type="image/avif" srcset="{{ $card['image']['avif'] }}" sizes="{{ $card['image']['sizes'] }}">
              @endif
              @if($card['image']['webp'])
                <source type="image/webp" srcset="{{ $card['image']['webp'] }}" sizes="{{ $card['image']['sizes'] }}">
              @endif
              @if($card['image']['jpg'])
                <source type="image/jpeg" srcset="{{ $card['image']['jpg'] }}" sizes="{{ $card['image']['sizes'] }}">
              @endif

              <img
                src="{{ $card['image']['fallback'] }}"
                alt="{{ $card['alt'] }}"
                width="594"
                height="722"
                loading="lazy"
                decoding="async"
                class="inline-block h-auto max-w-full align-middle border-0"
              >
            </picture>
          </figure>
        </a>

        <div class="bg-[#00063a] {{ $card['box'] }} mb-4">
          <h2 class="text-white text-[26px] font-semibold leading-[26px]">
            <a href="{{ $card['url'] }}" class="text-white">
              {{ $card['title'] }}
            </a>
          </h2>
        </div>

        <ul class="text-[#7a7a7a] text-left leading-[32px] list-disc pl-6">
          @foreach($card['items'] as $item)
            <li>{!! $item !!}</li>
          @endforeach
        </ul>
      </div>
    @endforeach
  </div>
</section>

<section>
    <div class="mx-auto max-w-[1140px] px-[10px] pt-5 pb-10 text-center" id="neumaticas-montacargas">
        <h2 class="my-5 text-2xl font-semibold leading-tight text-black md:text-[33px] md:leading-[33px]">
            Llantas Neumáticas para Montacargas
        </h2>

        <p class="my-[23px] text-base font-normal text-[#7a7a7a] md:text-[20px]">
            Con gran capacidad de carga y el mejor desempeño a altas velocidades, trayectos largos y en terracería.
        </p>
    </div>
</section>

<section class="py-8 [content-visibility:auto] [contain-intrinsic-size:1px_1000px]">
  <div class="max-w-[1140px] mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
    @foreach($pneumaticCards as $card)
      <div class="text-center">
        <a href="{{ $card['url'] }}">
          <figure class="m-0 text-center">
            <picture>
              @if($card['image']['avif'])
                <source type="image/avif" srcset="{{ $card['image']['avif'] }}" sizes="{{ $card['image']['sizes'] }}">
              @endif
              @if($card['image']['webp'])
                <source type="image/webp" srcset="{{ $card['image']['webp'] }}" sizes="{{ $card['image']['sizes'] }}">
              @endif
              @if($card['image']['jpg'])
                <source type="image/jpeg" srcset="{{ $card['image']['jpg'] }}" sizes="{{ $card['image']['sizes'] }}">
              @endif

              <img
                src="{{ $card['image']['fallback'] }}"
                alt="{{ $card['alt'] }}"
                width="594"
                height="722"
                loading="lazy"
                decoding="async"
                class="inline-block h-auto max-w-full align-middle border-0"
              >
            </picture>
          </figure>
        </a>

        <div class="bg-[#00063a] {{ $card['box'] }} mb-4">
          <h2 class="text-white text-[26px] font-semibold leading-[26px]">
            <a href="{{ $card['url'] }}" class="text-white">
              {{ $card['title'] }}
            </a>
          </h2>
        </div>

        <ul class="text-[#7a7a7a] text-left leading-[32px] list-disc pl-6">
          @foreach($card['items'] as $item)
            <li>{!! $item !!}</li>
          @endforeach
        </ul>
      </div>
    @endforeach
  </div>
</section>

<section>
    <div class="mx-auto max-w-[1140px] px-[10px] pt-5 pb-10 text-center" id="llantas-poliuretano-montacargas">
        <h2 class="my-5 text-2xl font-semibold leading-tight text-black md:text-[33px] md:leading-[33px]">
            Llantas de Poliuretano para Montacargas.
        </h2>

        <p class="my-[23px] text-base font-normal text-[#7a7a7a] md:text-[20px]">
           Ruedas que soportan grandes cargas, en almacenes, pasillos, congeladores y suelos en buen estado.
        </p>
    </div>
</section>

<section class="py-8 [content-visibility:auto] [contain-intrinsic-size:1px_800px]">
  <div class="max-w-[1140px] mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
    @foreach($polyurethaneCards as $card)
      <div class="text-center">
        <a href="{{ $card['url'] }}">
          <figure class="m-0 text-center">
            <picture>
              @if($card['image']['avif'])
                <source type="image/avif" srcset="{{ $card['image']['avif'] }}" sizes="{{ $card['image']['sizes'] }}">
              @endif
              @if($card['image']['webp'])
                <source type="image/webp" srcset="{{ $card['image']['webp'] }}" sizes="{{ $card['image']['sizes'] }}">
              @endif
              @if($card['image']['jpg'])
                <source type="image/jpeg" srcset="{{ $card['image']['jpg'] }}" sizes="{{ $card['image']['sizes'] }}">
              @endif

              <img
                src="{{ $card['image']['fallback'] }}"
                alt="{{ $card['alt'] }}"
                width="594"
                height="722"
                loading="lazy"
                decoding="async"
                class="inline-block h-auto max-w-full align-middle border-0"
              >
            </picture>
          </figure>
        </a>

        <div class="bg-[#00063a] {{ $card['box'] }} mb-4">
          <h2 class="text-white text-[26px] font-semibold leading-[26px]">
            <a href="{{ $card['url'] }}" class="text-white">
              {{ $card['title'] }}
            </a>
          </h2>
        </div>

        <ul class="text-[#7a7a7a] text-left leading-[32px] list-disc pl-6">
          @foreach($card['items'] as $item)
            <li>{!! $item !!}</li>
          @endforeach
        </ul>
      </div>
    @endforeach
  </div>
</section>

<section
  id="contacto"
  class="relative box-border block bg-black bg-no-repeat bg-center bg-cover transition-[background,border,border-radius,box-shadow] duration-300"
  style="
    background-image:url('{{ asset('storage/originals/heros/venta-de-llantas-para-montacargas.jpg') }}');
    background-image:image-set(
      url('{{ asset('storage/variants/originals/heros/venta-de-llantas-para-montacargas-1024.avif') }}') type('image/avif') 1x,
      url('{{ asset('storage/variants/originals/heros/venta-de-llantas-para-montacargas-1024.webp') }}') type('image/webp') 1x,
      url('{{ asset('storage/originals/heros/venta-de-llantas-para-montacargas.jpg') }}') type('image/jpeg') 1x
    );
  "
  role="region"
  aria-label="Formulario de cotización"
>
  <div class="relative mx-auto flex max-w-[1140px]">
    <div class="relative box-border flex min-h-px w-full">
      <div class="relative box-border flex w-full flex-wrap content-start p-2.5">
        <div class="pointer-events-none absolute inset-0 bg-black/35" aria-hidden="true"></div>

        <div class="w-full"><div class="h-[104px]"></div></div>

        <div class="z-10 w-full text-center mb-5">
          <div class="m-0 p-0 font-['Roboto',sans-serif] text-white lg:text-[42px] text-[22px] leading-[42px] font-semibold">
            COTIZA EN LINEA O SOLICITA UNA ASESORIA:
          </div>
        </div>

        <div class="z-10 w-full mb-5">
          <div id="hs-form-container" data-hs-forms-root="true">
            <noscript>
              <p style="color:#fff;">Activa JavaScript para ver el formulario de cotización.</p>
            </noscript>
          </div>
        </div>

        <div class="w-full"><div class="h-[104px]"></div></div>
      </div>
    </div>
  </div>
</section>

<style>
  @media (max-width: 768px) {
    #contacto {
      background-image: url('{{ asset('storage/originals/heros/venta-de-llantas-para-montacargas.jpg') }}');
      background-image: image-set(
        url('{{ asset('storage/variants/originals/heros/venta-de-llantas-para-montacargas-960.avif') }}') type('image/avif') 1x,
        url('{{ asset('storage/variants/originals/heros/venta-de-llantas-para-montacargas-960.webp') }}') type('image/webp') 1x,
        url('{{ asset('storage/originals/heros/venta-de-llantas-para-montacargas.jpg') }}') type('image/jpeg') 1x
      );
    }
  }
</style>

<script>
  (() => {
    let hubspotLoaded = false;

    const loadHubspotForm = () => {
      if (hubspotLoaded) return;
      hubspotLoaded = true;

      const script = document.createElement('script');
      script.src = 'https://js.hsforms.net/forms/shell.js';
      script.async = true;
      script.defer = true;
      script.charset = 'utf-8';

      script.onload = function () {
        if (window.hbspt?.forms?.create) {
          window.hbspt.forms.create({
            portalId: '7547674',
            formId: '26f426a7-e620-42df-98a3-43e10a899b6c',
            target: '#hs-form-container'
          });
        }
      };

      document.head.appendChild(script);
    };

    const contacto = document.getElementById('contacto');

    if ('IntersectionObserver' in window && contacto) {
      const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            loadHubspotForm();
            observer.disconnect();
          }
        });
      }, { rootMargin: '300px 0px' });

      observer.observe(contacto);
    } else {
      window.addEventListener('load', loadHubspotForm, { once: true });
    }
  })();
</script>
@endsection