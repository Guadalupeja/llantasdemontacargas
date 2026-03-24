@extends('layouts.public')

@section('title', 'Llantas sólidas cushion para Montacargas | Trelleborg ITL')
@section('meta_description', 'Cotiza llantas sólidas cushion ITL POS 2026, libres de mantenimiento, 25% mas vida GARANTIZADO por escrito. Precios Mayorista, Entrega inmediata y Crédito.')

@section('structured-data')
  @php
    $heroJpg = asset('storage/originals/heros/venta-de-llantas-para-montacargas.jpg');
    $heroAvif1024 = asset('storage/variants/originals/heros/venta-de-llantas-para-montacargas-1024.avif');
    $heroWebp1024 = asset('storage/variants/originals/heros/venta-de-llantas-para-montacargas-1024.webp');
    $heroAvif960 = asset('storage/variants/originals/heros/venta-de-llantas-para-montacargas-960.avif');
    $heroWebp960 = asset('storage/variants/originals/heros/venta-de-llantas-para-montacargas-960.webp');
    $productImage = asset('storage/originals/Trelleborg_POS_ITL-POS-660x660.webp');
    $logoImage = asset('storage/originals/ruguex-llantas-para-minicargadores-distrubuidor-trelleborg-1-1.png');
    $pdfSheet = asset('pdfs/ITL-SalesSheet-2018.pdf');
  @endphp

  <link rel="dns-prefetch" href="//js.hsforms.net">
  <link rel="preconnect" href="https://js.hsforms.net" crossorigin>

  <link
    rel="preload"
    as="image"
    href="{{ $heroJpg }}"
    imagesrcset="{{ $heroAvif1024 }}, {{ $heroWebp1024 }}, {{ $heroJpg }}"
    imagesizes="100vw"
    fetchpriority="high">

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
          "BSH | RUGUEX"
        ],
        "url": "{{ url('/') }}",
        "logo": {
          "@type": "ImageObject",
          "url": "{{ $logoImage }}"
        },
        "description": "RUGUEX es una marca registrada por Bombas Sellos y Hules Industriales S.A. de C.V. Distribuidor autorizado de llantas Trelleborg para montacargas, minicargadores, cargadores y manipuladores telescópicos en México, con entrega inmediata, asistencia técnica y precios competitivos.",
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
          "Bandajes para montacargas",
          "Llantas sólidas cushion para montacargas",
          "Llantas Press On para montacargas",
          "Llantas industriales Trelleborg",
          "Asesoría técnica en selección e instalación de llantas industriales"
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
        "about": {
          "@id": "{{ url()->current() }}#product"
        },
        "mainEntity": {
          "@id": "{{ url()->current() }}#product"
        },
        "primaryImageOfPage": {
          "@type": "ImageObject",
          "url": "{{ $productImage }}"
        },
        "breadcrumb": {
          "@id": "{{ url()->current() }}#breadcrumb"
        }
      },
      {
        "@type": "Product",
        "@id": "{{ url()->current() }}#product",
        "name": "Trelleborg ITL Press On",
        "alternateName": [
          "Trelleborg ITL POS",
          "Llanta sólida cushion Trelleborg ITL",
          "Bandaje Press On Trelleborg ITL para montacargas",
          "Llanta sólida con anillo Trelleborg ITL"
        ],
        "image": [
          "{{ $productImage }}"
        ],
        "brand": {
          "@type": "Brand",
          "name": "Trelleborg"
        },
        "manufacturer": {
          "@type": "Organization",
          "name": "Trelleborg"
        },
        "description": "Llanta sólida cushion tipo Press On para montacargas Trelleborg ITL. Bandaje premium libre de mantenimiento, imponchable y de fácil intercambiabilidad, diseñado para uso rudo con alta resistencia al desgaste, perfil de gran tracción y estabilidad, y 25% más vida llanta contra llanta garantizado por escrito.",
        "category": "Industrial Tire",
        "material": "Hule industrial premium",
        "audience": {
          "@type": "Audience",
          "audienceType": "Empresas industriales, almacenes, centros logísticos y operaciones de manejo de materiales"
        },
        "additionalProperty": [
          { "@type": "PropertyValue", "name": "Tipo", "value": "Llanta sólida cushion / Press On para montacargas" },
          { "@type": "PropertyValue", "name": "Modelo", "value": "ITL Press On" },
          { "@type": "PropertyValue", "name": "Configuración", "value": "Bandaje con anillo" },
          { "@type": "PropertyValue", "name": "Aplicación", "value": "Montacargas de uso rudo" },
          { "@type": "PropertyValue", "name": "Beneficio principal", "value": "25% más vida llanta contra llanta, garantizado por escrito" },
          { "@type": "PropertyValue", "name": "Ventaja", "value": "Libre de mantenimiento" },
          { "@type": "PropertyValue", "name": "Ventaja", "value": "Imponchable" },
          { "@type": "PropertyValue", "name": "Ventaja", "value": "Fácil intercambiabilidad" },
          { "@type": "PropertyValue", "name": "Ventaja", "value": "Gran tracción y estabilidad" },
          { "@type": "PropertyValue", "name": "Ventaja", "value": "Banda de rodamiento amplia para mejorar desempeño" },
          { "@type": "PropertyValue", "name": "Ventaja", "value": "No acumula calor incluso en ciclos extendidos" },
          { "@type": "PropertyValue", "name": "Ventaja", "value": "Conducción suave y precisa" },
          { "@type": "PropertyValue", "name": "Ventaja", "value": "Disponible en compuesto que no mancha para aplicaciones específicas" }
        ],
        "offers": {
          "@type": "Offer",
          "url": "{{ url()->current() }}",
          "priceCurrency": "MXN",
          "availability": "https://schema.org/InStock",
          "itemCondition": "https://schema.org/NewCondition",
          "seller": {
            "@id": "{{ url('/') }}#organization"
          },
          "eligibleRegion": {
            "@type": "Country",
            "name": "México"
          }
        },
        "subjectOf": [
          {
            "@type": "CreativeWork",
            "name": "Ficha técnica Trelleborg ITL Press On",
            "url": "{{ $pdfSheet }}"
          },
          {
            "@type": "Dataset",
            "name": "Tabla de medidas, patrón, capacidad de carga y peso de Trelleborg ITL Press On",
            "description": "Tabla técnica con medidas Tire Size, Pattern, Load Capacity y Weight para llantas sólidas cushion Trelleborg ITL Press On."
          }
        ],
        "isRelatedTo": {
          "@id": "{{ url()->current() }}#sizes"
        }
      },
      {
        "@type": "Service",
        "@id": "{{ url()->current() }}#service",
        "name": "Cotización y asesoría para llantas sólidas cushion Trelleborg ITL para montacargas",
        "serviceType": "Venta y asesoría técnica de bandajes y llantas sólidas cushion para montacargas",
        "provider": {
          "@id": "{{ url('/') }}#organization"
        },
        "areaServed": {
          "@type": "Country",
          "name": "México"
        },
        "relatedTo": {
          "@id": "{{ url()->current() }}#product"
        }
      },
      {
        "@type": "ItemList",
        "@id": "{{ url()->current() }}#sizes",
        "name": "Medidas disponibles Trelleborg ITL Press On",
        "itemListOrder": "https://schema.org/ItemListOrderAscending",
        "numberOfItems": 86,
        "itemListElement": [
          { "@type": "ListItem", "position": 1, "name": "8½x4x4*" },
          { "@type": "ListItem", "position": 2, "name": "9x5x5*" },
          { "@type": "ListItem", "position": 3, "name": "10x4x5*" },
          { "@type": "ListItem", "position": 4, "name": "10x3x6¼*" },
          { "@type": "ListItem", "position": 5, "name": "10x4x6¼*" },
          { "@type": "ListItem", "position": 6, "name": "10x5x6¼*" },
          { "@type": "ListItem", "position": 7, "name": "10x6x6¼*" },
          { "@type": "ListItem", "position": 8, "name": "10x7x6¼*" },
          { "@type": "ListItem", "position": 9, "name": "10x4x6½" },
          { "@type": "ListItem", "position": 10, "name": "10x4¾x6½" },
          { "@type": "ListItem", "position": 11, "name": "10x5x6½" },
          { "@type": "ListItem", "position": 12, "name": "10½x5x5" },
          { "@type": "ListItem", "position": 13, "name": "10½x5x6½*" },
          { "@type": "ListItem", "position": 14, "name": "10½x6x6½*" },
          { "@type": "ListItem", "position": 15, "name": "12x3½x8*" },
          { "@type": "ListItem", "position": 16, "name": "12x4x8*" },
          { "@type": "ListItem", "position": 17, "name": "12x4½x8*" },
          { "@type": "ListItem", "position": 18, "name": "12x5½x8*" },
          { "@type": "ListItem", "position": 19, "name": "12x6½x8*" },
          { "@type": "ListItem", "position": 20, "name": "13x4½x8*" },
          { "@type": "ListItem", "position": 21, "name": "13x5x10" },
          { "@type": "ListItem", "position": 22, "name": "13½x4½x8" },
          { "@type": "ListItem", "position": 23, "name": "13½x5½x8" },
          { "@type": "ListItem", "position": 24, "name": "13½x6½x8*" },
          { "@type": "ListItem", "position": 25, "name": "14x4½x8" },
          { "@type": "ListItem", "position": 26, "name": "14x5x10" },
          { "@type": "ListItem", "position": 27, "name": "15x5x11¼" },
          { "@type": "ListItem", "position": 28, "name": "15x6x11¼*" },
          { "@type": "ListItem", "position": 29, "name": "15x7x11¼*" },
          { "@type": "ListItem", "position": 30, "name": "15x8x11¼*" },
          { "@type": "ListItem", "position": 31, "name": "15x9x11¼*" },
          { "@type": "ListItem", "position": 32, "name": "15½x5x10*" },
          { "@type": "ListItem", "position": 33, "name": "15½x6x10*" },
          { "@type": "ListItem", "position": 34, "name": "16x5x10½" },
          { "@type": "ListItem", "position": 35, "name": "16x6x10½" },
          { "@type": "ListItem", "position": 36, "name": "16x7x10½" },
          { "@type": "ListItem", "position": 37, "name": "16x4x12⅛*" },
          { "@type": "ListItem", "position": 38, "name": "16¼x4x11¼*" },
          { "@type": "ListItem", "position": 39, "name": "16¼x5x11¼" },
          { "@type": "ListItem", "position": 40, "name": "16¼x6x11¼" },
          { "@type": "ListItem", "position": 41, "name": "16¼x7x11¼" },
          { "@type": "ListItem", "position": 42, "name": "17x4½x12⅛*" },
          { "@type": "ListItem", "position": 43, "name": "17x5x12⅛*" },
          { "@type": "ListItem", "position": 44, "name": "17x6x12⅛*" },
          { "@type": "ListItem", "position": 45, "name": "17x7x12⅛*" },
          { "@type": "ListItem", "position": 46, "name": "18x5x12⅛" },
          { "@type": "ListItem", "position": 47, "name": "18x6x12⅛" },
          { "@type": "ListItem", "position": 48, "name": "18x7x12⅛" },
          { "@type": "ListItem", "position": 49, "name": "18x8x12⅛" },
          { "@type": "ListItem", "position": 50, "name": "18x9x12⅛*" },
          { "@type": "ListItem", "position": 51, "name": "18x5x14*" },
          { "@type": "ListItem", "position": 52, "name": "18x6x14" },
          { "@type": "ListItem", "position": 53, "name": "18x7x14*" },
          { "@type": "ListItem", "position": 54, "name": "18x9x14" },
          { "@type": "ListItem", "position": 55, "name": "20x5x16" },
          { "@type": "ListItem", "position": 56, "name": "20x6x16" },
          { "@type": "ListItem", "position": 57, "name": "20x5x16*" },
          { "@type": "ListItem", "position": 58, "name": "20x6x16*" },
          { "@type": "ListItem", "position": 59, "name": "20x8x16*" },
          { "@type": "ListItem", "position": 60, "name": "20x9x16*" },
          { "@type": "ListItem", "position": 61, "name": "21x6x15*" },
          { "@type": "ListItem", "position": 62, "name": "21x7x15" },
          { "@type": "ListItem", "position": 63, "name": "21x8x15" },
          { "@type": "ListItem", "position": 64, "name": "21x9x15*" },
          { "@type": "ListItem", "position": 65, "name": "21x12x15" },
          { "@type": "ListItem", "position": 66, "name": "22x6x16*" },
          { "@type": "ListItem", "position": 67, "name": "22x7x16*" },
          { "@type": "ListItem", "position": 68, "name": "22x8x16" },
          { "@type": "ListItem", "position": 69, "name": "22x9x16" },
          { "@type": "ListItem", "position": 70, "name": "22x10x16" },
          { "@type": "ListItem", "position": 71, "name": "22x12x16" },
          { "@type": "ListItem", "position": 72, "name": "22x14x16" },
          { "@type": "ListItem", "position": 73, "name": "22x16x16" },
          { "@type": "ListItem", "position": 74, "name": "22x6x17¾*" },
          { "@type": "ListItem", "position": 75, "name": "22x7x17¾" },
          { "@type": "ListItem", "position": 76, "name": "22x8x17¾" },
          { "@type": "ListItem", "position": 77, "name": "22x10x17¾" },
          { "@type": "ListItem", "position": 78, "name": "22x14x17¾" },
          { "@type": "ListItem", "position": 79, "name": "26x7x20" },
          { "@type": "ListItem", "position": 80, "name": "28x10x22" },
          { "@type": "ListItem", "position": 81, "name": "28x12x22" },
          { "@type": "ListItem", "position": 82, "name": "28x14x22" },
          { "@type": "ListItem", "position": 83, "name": "28x16x22" },
          { "@type": "ListItem", "position": 84, "name": "36x10x30" },
          { "@type": "ListItem", "position": 85, "name": "36x12x30" },
          { "@type": "ListItem", "position": 86, "name": "36x16x30" }
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
            "name": "Llantas sólidas cushion para montacargas",
            "item": "{{ url()->current() }}"
          },
          {
            "@type": "ListItem",
            "position": 3,
            "name": "Trelleborg ITL Press On",
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
    $variants = image_variants('originals/Trelleborg_POS_ITL-POS-660x660.webp');
    $sizes = '(max-width: 768px) 92vw, (max-width: 1140px) 33vw, 380px';

    $srcsetAvif = !empty($variants['avif'])
      ? implode(', ', array_map(fn($v) => $v['url'].' '.$v['w'].'w', $variants['avif']))
      : null;

    $srcsetWebp = !empty($variants['webp'])
      ? implode(', ', array_map(fn($v) => $v['url'].' '.$v['w'].'w', $variants['webp']))
      : null;

    $srcsetJpg = !empty($variants['jpg'])
      ? implode(', ', array_map(fn($v) => $v['url'].' '.$v['w'].'w', $variants['jpg']))
      : null;

    $fallback = $variants['fallback']['url'] ?? $productImage;

    $table1Rows = [
      ['8½x4x4*', 'S', '1430', '11'],
      ['9x5x5*', 'S', '1960', '13'],
      ['10x4x5*', 'S', '1605', '13'],
      ['10x3x6¼*', 'S', '1100', '9'],
      ['10x4x6¼*', 'S', '1600', '12'],
      ['10x5x6¼*', 'S', '2100', '16'],
      ['10x6x6¼*', 'S', '2600', '19'],
      ['10x7x6¼*', 'S', '3100', '22'],
      ['10x4x6½', 'S', '1585', '13'],
      ['10x4¾x6½', 'S', '1950', '15'],
      ['10x5x6½', 'S', '2070', '16'],
      ['10½x5x5', 'S T', '2250', '15'],
      ['10½x5x6½*', 'S', '2200', '17'],
      ['10½x6x6½*', 'S', '2730', '20'],
      ['12x3½x8*', 'S', '1550', '15'],
      ['12x4x8*', 'S', '1840', '16'],
      ['12x4½x8*', 'S', '2140', '18'],
      ['12x5½x8*', 'S', '2730', '23'],
      ['12x6½x8*', 'S', '3320', '28'],
      ['13x4½x8*', 'S', '2350', '21'],
      ['13x5x10', 'S', '2440', '19'],
      ['13½x4½x8', 'S', '2350', '22'],
      ['13½x5½x8', 'S', '3080', '28'],
      ['13½x6½x8*', 'S', '3810', '33'],
      ['14x4½x8', 'S', '2390', '23'],
      ['14x5x10', 'S', '2730', '25'],
      ['15x5x11¼', 'S', '2850', '27'],
      ['15x6x11¼*', 'S', '3530', '32'],
      ['15x7x11¼*', 'S', '4210', '39'],
      ['15x8x11¼*', 'S', '4890', '45'],
      ['15x9x11¼*', 'S', '5560', '49'],
      ['15½x5x10*', 'S T', '3010', '30'],
      ['15½x6x10*', 'S T', '3820', '37'],
      ['16x5x10½', 'S T', '3090', '32'],
      ['16x6x10½', 'S T', '3920', '39'],
      ['16x7x10½', 'S T', '4750', '46'],
      ['16x4x12⅛*', 'S', '2280', '23'],
      ['16¼x4x11¼*', 'T', '2310', '25'],
      ['16¼x5x11¼', 'S T', '3120', '32'],
      ['16¼x6x11¼', 'S T', '3930', '39'],
      ['16¼x7x11¼', 'S T', '4740', '44'],
      ['17x4½x12⅛*', 'T', '2810', '29'],
      ['17x5x12⅛*', 'S', '3220', '26'],
    ];

    $table2Rows = [
      ['17x6x12⅛*', 'S', '4050', '40'],
      ['17x7x12⅛*', 'S', '4880', '52'],
      ['18x5x12⅛', 'S', '3360', '34'],
      ['18x6x12⅛', 'S', '4290', '46'],
      ['18x7x12⅛', 'S', '5220', '48'],
      ['18x8x12⅛', 'S', '6150', '63'],
      ['18x9x12⅛*', 'S', '7080', '70'],
      ['18x5x14*', 'S', '3300', '34'],
      ['18x6x14', 'S', '4100', '48'],
      ['18x7x14*', 'S', '4890', '49'],
      ['18x9x14', 'G', '6480', '69'],
      ['20x5x16', 'S', '7430', '38'],
      ['20x6x16', 'S', '3770', '47'],
      ['20x5x16*', 'T G', '3570', '38'],
      ['20x6x16*', 'T G', '4440', '47'],
      ['20x8x16*', 'T', '6170', '63'],
      ['20x9x16*', 'T', '7030', '71'],
      ['21x6x15*', 'T', '4820', '57'],
      ['21x7x15', 'T', '5870', '67'],
      ['21x8x15', 'T', '6930', '77'],
      ['21x9x15*', 'T', '7980', '87'],
      ['21x12x15', 'T', '11103', '118'],
      ['22x6x16*', 'T', '4990', '59'],
      ['22x7x16*', 'T', '6080', '69'],
      ['22x8x16', 'T', '7170', '82'],
      ['22x9x16', 'T', '8260', '90'],
      ['22x10x16', 'T G', '9350', '102'],
      ['22x12x16', 'T G', '11530', '129'],
      ['22x14x16', 'T', '13710', '138'],
      ['22x16x16', 'S', '15890', '168'],
      ['22x6x17¾*', 'S', '4820', '53'],
      ['22x7x17¾', 'S', '5770', '63'],
      ['22x8x17¾', 'S', '6725', '80'],
      ['22x10x17¾', 'S', '8630', '91'],
      ['22x14x17¾', 'T', '12440', '129'],
      ['26x7x20', 'T', '6890', '87'],
      ['28x10x22', 'S G', '11200', '140'],
      ['28x12x22', 'S T', '13820', '175'],
      ['28x14x22', 'S G', '16430', '210'],
      ['28x16x22', 'S G', '19040', '245'],
      ['36x10x30', 'S G', '13530', '197'],
      ['36x12x30', 'S G', '16680', '242'],
      ['36x16x30', 'S G', '22990', '300'],
    ];
  @endphp

<section class="relative" role="region" aria-label="Resumen PS800">
  <div class="mx-auto max-w-[1140px] relative">
    <div class="w-full relative min-h-px flex">
      <div class="w-full p-[10px] flex flex-wrap content-start">
        <div class="w-full h-[68px] mb-5" aria-hidden="true"></div>

        <div class="w-full text-center mb-5">
          <h1 class="m-0 font-sans font-semibold text-[22px] leading-[22px] lg:text-[32px] lg:leading-[32px] text-black">
            Llantas Sólidas Press On para Montacargas.
          </h1>
        </div>

        <div class="w-full h-[26px] mb-5" aria-hidden="true"></div>

        <div class="w-full text-center mb-5">
          <p class="m-0 text-[#7a7a7a]">
            Bandajes libres de mantenimiento, de materiales Premium, imponchables y de fácil intercambiabilidad.
          </p>
        </div>

        <div class="w-full h-[26px]" aria-hidden="true"></div>
      </div>
    </div>
  </div>
</section>

<section class="relative" role="region" aria-label="Detalle PS800">
  <div class="relative mx-auto flex max-w-[1140px] flex-wrap">
    <div class="w-full md:w-[32.708%] p-[10px]">
      <figure class="m-0 text-center">
        <picture>
          @if($srcsetAvif)
            <source type="image/avif" srcset="{{ $srcsetAvif }}" sizes="{{ $sizes }}">
          @endif
          @if($srcsetWebp)
            <source type="image/webp" srcset="{{ $srcsetWebp }}" sizes="{{ $sizes }}">
          @endif
          @if($srcsetJpg)
            <source type="image/jpeg" srcset="{{ $srcsetJpg }}" sizes="{{ $sizes }}">
          @endif

          <img
            fetchpriority="high"
            decoding="async"
            loading="eager"
            width="594"
            height="722"
            src="{{ $fallback }}"
            alt="Trelleborg ITL Press On"
            class="inline-block h-auto max-w-full align-middle border-0"
          />
        </picture>
      </figure>
    </div>

    <div class="w-full md:w-[67.292%] p-[10px]">
      <h2 class="m-0 font-sans text-[33px] leading-[33px] lg:text-[43px] lg:leading-[43px] font-semibold text-black">
        Trelleborg ITL Press On
      </h2>

      <div class="h-[20px]" aria-hidden="true"></div>

      <div>
        <a
          href="#contacto"
          class="mt-6 inline-block rounded-[3px] bg-[#e76a3e] px-6 py-3 text-[20px] leading-[30px] font-medium text-white no-underline transition hover:brightness-110 focus:outline-none focus:ring-2 focus:ring-[#ff6d00]/60 focus:ring-offset-2"
        >
          <span class="flex justify-center">
            <span class="block">25% mas vida llanta contra llanta, GARANTIZADO por escrito.</span>
          </span>
        </a>
      </div>

      <div class="h-[20px]" aria-hidden="true"></div>

      <div class="text-[#7a7a7a] leading-[29px]">
        <p class="mb-5 mt-6">
          Llanta PREMIUM sólida con anillo para montacargas de uso rudo. Su proceso de fabricación y unión del hule con la banda logra mas resistencia al desgaste y durabilidad sobre cualquier competidor.
        </p>

        <p class="mb-5 mt-6 font-bold">
          25% mas vida llanta contra llanta, GARANTIZADO por escrito.
        </p>

        <ul class="mb-2 list-disc pl-6">
          <li>Perfil de gran tracción y estabilidad.</li>
          <li>Banda de rodamiento muy amplia mejora el desempeño en cualquier superficie.</li>
          <li>No acumula calor incluso en ciclos extendidos.</li>
          <li>Conducción suave y precisa.</li>
          <li>Disponible en compuesto que no mancha entre otros para aplicaciones específicas.</li>
        </ul>
      </div>

      <div class="mt-6 grid grid-cols-1 gap-4 sm:grid-cols-2">
        <div>
          <a
            href="#contacto"
            class="inline-block rounded-[4px] bg-black px-[30px] py-[15px] text-[16px] font-medium leading-[16px] text-white no-underline transition hover:brightness-110 focus:outline-none focus:ring-2 focus:ring-white/40"
          >
            <span class="flex justify-center">
              <span class="block">Solicitar presupuesto ahora</span>
            </span>
          </a>
        </div>

        <div>
          <a
            href="{{ $pdfSheet }}"
            download="ITL-SalesSheet-2018.pdf"
            class="inline-block rounded-[4px] bg-[#e76a3e] px-[30px] py-[15px] text-[16px] font-medium leading-[16px] text-white no-underline transition hover:brightness-110 focus:outline-none focus:ring-2 focus:ring-white/40"
          >
            <span class="flex justify-center"><span class="block">Descargar Ficha</span></span>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<div class="lg:h-[45px] h-[10px]" aria-hidden="true"></div>

<section
  class="relative mt-6"
  role="region"
  aria-label="Tabla de medidas y capacidades cushion"
  style="content-visibility:auto; contain-intrinsic-size: 1600px;"
>
  <div class="relative mx-auto max-w-[1140px] px-2 sm:px-3">
    <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">

      <div class="overflow-hidden rounded-xl border border-neutral-200/70 bg-white shadow-md">
        <div class="overflow-x-auto">
          <table class="min-w-full w-full border-collapse text-sm">
            <thead class="sticky top-0 z-10 bg-[#e76a3e] text-white">
              <tr class="[&>th]:px-3 [&>th]:py-3 [&>th]:text-center [&>th]:align-middle">
                <th class="font-semibold uppercase tracking-wide text-[12px] first:rounded-tl-xl">Tire Size</th>
                <th class="font-semibold uppercase tracking-wide text-[12px]">Pattern</th>
                <th class="font-semibold uppercase tracking-wide text-[12px]">Load Capacity <br>(lbs)</th>
                <th class="font-semibold uppercase tracking-wide text-[12px] last:rounded-tr-xl">Weight <br>(lbs)</th>
              </tr>
            </thead>

            <tbody class="divide-y divide-neutral-200/70">
              @foreach($table1Rows as [$sizeValue, $pattern, $capacity, $weight])
                <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
                  <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700">
                    <h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">{{ $sizeValue }}</h2>
                  </th>
                  <td class="px-3 py-2 text-center text-neutral-700">{{ $pattern }}</td>
                  <td class="px-3 py-2 text-center text-neutral-700">{{ $capacity }}</td>
                  <td class="px-3 py-2 text-center text-neutral-700">{{ $weight }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>

      <div class="overflow-hidden rounded-xl border border-neutral-200/70 bg-white shadow-md">
        <div class="overflow-x-auto">
          <table class="min-w-full w-full border-collapse text-sm">
            <thead class="sticky top-0 z-10 bg-[#e76a3e] text-white">
              <tr class="[&>th]:px-3 [&>th]:py-3 [&>th]:text-center [&>th]:align-middle">
                <th class="font-semibold uppercase tracking-wide text-[12px] first:rounded-tl-xl">Tire Size</th>
                <th class="font-semibold uppercase tracking-wide text-[12px]">Pattern</th>
                <th class="font-semibold uppercase tracking-wide text-[12px]">Load Capacity <br>(lbs)</th>
                <th class="font-semibold uppercase tracking-wide text-[12px] last:rounded-tr-xl">Weight <br>(lbs)</th>
              </tr>
            </thead>

            <tbody class="divide-y divide-neutral-200/70">
              @foreach($table2Rows as [$sizeValue, $pattern, $capacity, $weight])
                <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
                  <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700">
                    <h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">{{ $sizeValue }}</h2>
                  </th>
                  <td class="px-3 py-2 text-center text-neutral-700">{{ $pattern }}</td>
                  <td class="px-3 py-2 text-center text-neutral-700">{{ $capacity }}</td>
                  <td class="px-3 py-2 text-center text-neutral-700">{{ $weight }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>

    </div>

    <div class="h-10" aria-hidden="true"></div>
  </div>
</section>

<section
  id="contacto"
  class="relative box-border block bg-black bg-no-repeat bg-center bg-cover transition-[background,border,border-radius,box-shadow] duration-300"
  style="
    background-image:url('{{ $heroJpg }}');
    background-image:image-set(
      url('{{ $heroAvif1024 }}') type('image/avif') 1x,
      url('{{ $heroWebp1024 }}') type('image/webp') 1x,
      url('{{ $heroJpg }}') type('image/jpeg') 1x
    );
    content-visibility:auto;
    contain-intrinsic-size: 900px;
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
          <div
            data-hs-forms-root="true"
            data-portal-id="7547674"
            data-form-id="26f426a7-e620-42df-98a3-43e10a899b6c"
          >
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
      background-image: url('{{ $heroJpg }}');
      background-image: image-set(
        url('{{ $heroAvif960 }}') type('image/avif') 1x,
        url('{{ $heroWebp960 }}') type('image/webp') 1x,
        url('{{ $heroJpg }}') type('image/jpeg') 1x
      );
    }
  }
</style>

<script>
  (function () {
    var section = document.getElementById('contacto');
    var formRoot = document.querySelector('[data-hs-forms-root="true"]');
    var loaded = false;
    var scriptLoading = false;

    if (!section || !formRoot) return;

    function createForm() {
      if (!window.hbspt || !window.hbspt.forms || !window.hbspt.forms.create) return;
      if (formRoot.dataset.formInitialized === 'true') return;

      window.hbspt.forms.create({
        portalId: formRoot.dataset.portalId,
        formId: formRoot.dataset.formId,
        target: '[data-hs-forms-root="true"]'
      });

      formRoot.dataset.formInitialized = 'true';
    }

    function loadHubspot() {
      if (loaded || scriptLoading) {
        createForm();
        return;
      }

      scriptLoading = true;

      var s = document.createElement('script');
      s.src = 'https://js.hsforms.net/forms/shell.js';
      s.async = true;
      s.defer = true;
      s.charset = 'utf-8';
      s.onload = function () {
        loaded = true;
        createForm();
      };

      document.head.appendChild(s);
    }

    if ('IntersectionObserver' in window) {
      var observer = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
          if (entry.isIntersecting) {
            loadHubspot();
            observer.disconnect();
          }
        });
      }, { rootMargin: '400px 0px' });

      observer.observe(section);
    } else {
      window.addEventListener('load', loadHubspot, { once: true });
    }

    ['pointerdown', 'touchstart', 'keydown'].forEach(function (eventName) {
      window.addEventListener(eventName, loadHubspot, { once: true, passive: true });
    });

    if ('requestIdleCallback' in window) {
      requestIdleCallback(loadHubspot, { timeout: 3500 });
    } else {
      setTimeout(loadHubspot, 2500);
    }
  })();
</script>
@endsection