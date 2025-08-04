<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dólar Hoy - Cotización en Tiempo Real | Dolar12.com</title>
    
    <!-- SEO Meta Tags -->
    <meta name="description" content="{{ $seoDescription ?? 'Cotización del dólar en tiempo real. Dólar oficial, blue, MEP, CCL, cripto y tarjeta. Actualización automática cada 2 minutos. Monitoreo profesional de tipos de cambio en Argentina.' }}">
    <meta name="keywords" content="{{ $seoKeywords ?? 'dolar, cotizacion, dolar oficial, dolar blue, dolar mep, dolar ccl, dolar cripto, dolar tarjeta, argentina, tipo de cambio, cotizaciones' }}">
    <meta name="author" content="Dolar12.com">
    <meta name="robots" content="index, follow">
    <meta name="language" content="es">
    <meta name="revisit-after" content="2 minutes">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ request()->url() }}">
    <meta property="og:title" content="Dólar Hoy - Cotización en Tiempo Real | Dolar12.com">
    <meta property="og:description" content="{{ $seoDescription ?? 'Cotización del dólar en tiempo real. Dólar oficial, blue, MEP, CCL, cripto y tarjeta. Actualización automática cada 2 minutos.' }}">
    <meta property="og:image" content="{{ request()->getSchemeAndHttpHost() }}/img/dolar-preview.jpg">
    <meta property="og:site_name" content="Dolar12.com">
    <meta property="og:locale" content="es_AR">
    
    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ request()->url() }}">
    <meta property="twitter:title" content="Dólar Hoy - Cotización en Tiempo Real | Dolar12.com">
    <meta property="twitter:description" content="{{ $seoDescription ?? 'Cotización del dólar en tiempo real. Dólar oficial, blue, MEP, CCL, cripto y tarjeta. Actualización automática cada 2 minutos.' }}">
    <meta property="twitter:image" content="{{ request()->getSchemeAndHttpHost() }}/img/dolar-preview.jpg">
    
    <!-- Canonical URL -->
    <link rel="canonical" href="{{ request()->url() }}">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    
    <!-- Structured Data / JSON-LD -->
    <script type="application/ld+json">
    {!! $websiteJsonLd !!}
    </script>
    
    <script type="application/ld+json">
    {!! $financialServiceJsonLd !!}
    </script>

    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-inter bg-dark-100 min-h-screen w-full flex flex-col p-0 m-0">
    <div class="bg-transparent rounded-none px-16 py-5 w-full h-screen flex flex-col">
        <div class="text-center mb-10 flex-shrink-0">
            <h1 class="text-gray-200 text-6xl font-light mb-2 tracking-tight">
                Dolar<span class="font-semibold text-red-400">12</span><span class="font-extralight text-gray-400 text-5xl">.com</span>
            </h1>
            <p class="text-gray-400 text-base font-light tracking-widest uppercase">Microdatos económicos en tiempo real</p>
            <p class="text-gray-500 text-sm font-normal tracking-wide mt-4 uppercase">Argentina</p>
        </div>

        <div class="grid grid-cols-4 responsive-3cols responsive-2cols responsive-1col gap-8 flex-1 content-start mb-0 xl:grid-cols-4 lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1">
            <div class="bg-neutral-800 bg-opacity-90 border border-neutral-900 border-opacity-25 rounded-lg p-8 transition-all duration-200 relative hover:border-neutral-500 hover:border-opacity-35 hover:bg-neutral-800 hover:bg-opacity-80">
                <div class="flex justify-between items-center mb-4">
                    <span class="text-lg font-normal text-gray-300 tracking-wide uppercase">DÓLAR OFICIAL</span>
                </div>
                <div class="flex justify-between items-center gap-10">
                    <div class="text-center flex-1">
                        <div class="text-xs text-gray-400 mb-2 uppercase tracking-widest font-light">Compra</div>
                        <div class="text-4xl font-extralight text-gray-50 tracking-tight price-pulse">${{ number_format($cotizaciones['oficial']['compra'] ?? 0, 0, ',', '.') }}</div>
                    </div>
                    <div class="text-center flex-1">
                        <div class="text-xs text-gray-400 mb-2 uppercase tracking-widest font-light">Venta</div>
                        <div class="text-4xl font-extralight text-gray-50 tracking-tight">${{ number_format($cotizaciones['oficial']['venta'] ?? 0, 0, ',', '.') }}</div>
                    </div>
                </div>
            </div>

            <div class="bg-neutral-800 bg-opacity-90 border border-neutral-900 border-opacity-25 rounded-lg p-8">
                <div class="flex justify-between items-center mb-4">
                    <span class="text-lg font-normal text-gray-300 tracking-wide uppercase">DÓLAR BLUE</span>
                </div>
                <div class="flex justify-between items-center gap-10">
                    <div class="text-center flex-1">
                        <div class="text-xs text-gray-400 mb-2 uppercase tracking-widest font-light">Compra</div>
                        <div class="text-4xl font-extralight text-gray-50 tracking-tight">${{ number_format($cotizaciones['blue']['compra'] ?? 0, 0, ',', '.') }}</div>
                    </div>
                    <div class="text-center flex-1">
                        <div class="text-xs text-gray-400 mb-2 uppercase tracking-widest font-light">Venta</div>
                        <div class="text-4xl font-extralight text-gray-50 tracking-tight">${{ number_format($cotizaciones['blue']['venta'] ?? 0, 0, ',', '.') }}</div>
                    </div>
                </div>
            </div>

            <div class="bg-neutral-800 bg-opacity-90 border border-neutral-900 border-opacity-25 rounded-lg p-8">
                <div class="flex justify-between items-center mb-4">
                    <span class="text-lg font-normal text-gray-300 tracking-wide uppercase">DÓLAR MEP</span>
                </div>
                <div class="flex justify-between items-center gap-10">
                    <div class="text-center flex-1">
                        <div class="text-xs text-gray-400 mb-2 uppercase tracking-widest font-light">Compra</div>
                        <div class="text-4xl font-extralight text-gray-50 tracking-tight">${{ number_format($cotizaciones['mep']['compra'] ?? 0, 0, ',', '.') }}</div>
                    </div>
                    <div class="text-center flex-1">
                        <div class="text-xs text-gray-400 mb-2 uppercase tracking-widest font-light">Venta</div>
                        <div class="text-4xl font-extralight text-gray-50 tracking-tight">${{ number_format($cotizaciones['mep']['venta'] ?? 0, 0, ',', '.') }}</div>
                    </div>
                </div>
            </div>

            <div class="bg-neutral-800 bg-opacity-90 border border-neutral-900 border-opacity-25 rounded-lg p-8">
                <div class="flex justify-between items-center mb-4">
                    <span class="text-lg font-normal text-gray-300 tracking-wide uppercase">CONTADO CON LIQUIDACIÓN</span>
                </div>
                <div class="flex justify-between items-center gap-10">
                    <div class="text-center flex-1">
                        <div class="text-xs text-gray-400 mb-2 uppercase tracking-widest font-light">Compra</div>
                        <div class="text-4xl font-extralight text-gray-50 tracking-tight">${{ number_format($cotizaciones['ccl']['compra'] ?? 0, 0, ',', '.') }}</div>
                    </div>
                    <div class="text-center flex-1">
                        <div class="text-xs text-gray-400 mb-2 uppercase tracking-widest font-light">Venta</div>
                        <div class="text-4xl font-extralight text-gray-50 tracking-tight">${{ number_format($cotizaciones['ccl']['venta'] ?? 0, 0, ',', '.') }}</div>
                    </div>
                </div>
            </div>

            <div class="bg-neutral-800 bg-opacity-90 border border-neutral-900 border-opacity-25 rounded-lg p-8">
                <div class="flex justify-between items-center mb-4">
                    <span class="text-lg font-normal text-gray-300 tracking-wide uppercase">DÓLAR CRIPTO</span>
                </div>
                <div class="flex justify-between items-center gap-10">
                    <div class="text-center flex-1">
                        <div class="text-xs text-gray-400 mb-2 uppercase tracking-widest font-light">Compra</div>
                        <div class="text-4xl font-extralight text-gray-50 tracking-tight">${{ number_format($cotizaciones['cripto']['compra'] ?? 0, 0, ',', '.') }}</div>
                    </div>
                    <div class="text-center flex-1">
                        <div class="text-xs text-gray-400 mb-2 uppercase tracking-widest font-light">Venta</div>
                        <div class="text-4xl font-extralight text-gray-50 tracking-tight">${{ number_format($cotizaciones['cripto']['venta'] ?? 0, 0, ',', '.') }}</div>
                    </div>
                </div>
            </div>

            <div class="bg-neutral-800 bg-opacity-90 border border-neutral-900 border-opacity-25 rounded-lg p-8">
                <div class="flex justify-between items-center mb-4">
                    <span class="text-lg font-normal text-gray-300 tracking-wide uppercase">DÓLAR TARJETA</span>
                </div>
                <div class="flex justify-between items-center gap-10">
                    <div class="text-center flex-1">
                        <div class="text-xs text-gray-400 mb-2 uppercase tracking-widest font-light">Compra</div>
                        <div class="text-4xl font-extralight text-gray-50 tracking-tight">-</div>
                    </div>
                    <div class="text-center flex-1">
                        <div class="text-xs text-gray-400 mb-2 uppercase tracking-widest font-light">Venta</div>
                        <div class="text-4xl font-extralight text-gray-50 tracking-tight">${{ number_format($cotizaciones['tarjeta']['valor'] ?? 0, 0, ',', '.') }}</div>
                    </div>
                </div>
            </div>

            <div class="bg-neutral-800 bg-opacity-90 border border-neutral-900 border-opacity-25 rounded-lg p-8">
                <div class="flex justify-between items-center mb-4">
                    <span class="text-lg font-normal text-gray-300 tracking-wide uppercase">DÓLAR FREELANCE</span>
                </div>
                <div class="flex justify-between items-center gap-10">
                    <div class="text-center flex-1">
                        <div class="text-xs text-gray-400 mb-2 uppercase tracking-widest font-light">Compra</div>
                        <div class="text-4xl font-extralight text-gray-50 tracking-tight">-</div>
                    </div>
                    <div class="text-center flex-1">
                        <div class="text-xs text-gray-400 mb-2 uppercase tracking-widest font-light">Venta</div>
                        <div class="text-4xl font-extralight text-gray-50 tracking-tight">${{ number_format($cotizaciones['freelance']['valor'] ?? 0, 0, ',', '.') }}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center py-5 px-0 text-gray-400 text-base font-light tracking-widest uppercase flex-shrink-0">
            <p>Última Actualización: <span id="timestamp">--:--</span></p>
            <div class="inline-flex items-center gap-2 bg-neutral-800 bg-opacity-80 border border-neutral-600 border-opacity-30 rounded-full px-3 py-1.5 text-xs text-gray-400 mt-2.5 mb-1.5" id="autoUpdateIndicator">
                <div class="w-3 h-3 border border-gray-500 rounded-full relative animate-spin">
                    <div class="absolute top-0.5 left-1/2 transform -translate-x-1/2 w-0 h-0 border-l-1.5 border-r-1.5 border-b-2 border-l-transparent border-r-transparent border-b-gray-500"></div>
                </div>
                <span>Actualización automática cada 2 min</span>
            </div>
        </div>

        <div class="text-center mt-auto py-2.5 border-t border-gray-600 border-opacity-20 text-gray-400 text-sm flex-shrink-0">
            <p><a href="{{ route('terms') }}" class="text-red-400 no-underline transition-colors duration-200 hover:text-red-300">Términos de Uso</a> | <span class="text-gray-500 text-xs"><a href="mailto:hola@dolar12.com" class="text-gray-500 no-underline text-xs transition-colors duration-200 hover:text-gray-300">hola@dolar12.com</a></span></p>
        </div>
    </div>

    <!-- External JavaScript -->
    <script src="{{ asset('js/dashboard.js') }}"></script>
</body>
</html>