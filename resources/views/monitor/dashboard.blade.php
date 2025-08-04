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
    <div class="bg-transparent rounded-none px-8 py-5 w-full h-screen flex flex-col max-w-7xl mx-auto">
        <div class="text-center mb-10 flex-shrink-0">
            <h1 class="text-gray-200 text-6xl font-light mb-2 tracking-tight">
                Dolar<span class="font-semibold text-red-400">12</span><span class="font-extralight text-gray-400 text-5xl">.com</span>
            </h1>
            <p class="text-gray-400 text-base font-light tracking-widest uppercase">Economía Argentina en tiempo real</p>
        </div>

        <!-- Layout de 2 columnas -->
        <div class="flex gap-8 flex-1">
            <!-- Columna izquierda: Noticias -->
            <div class="flex-1">
                <div class="mb-6">
                    <h2 class="text-xl text-red-400 font-medium tracking-wide mb-3">Últimas Noticias</h2>
                    <div class="flex gap-2 flex-wrap" id="news-filters">
                        <button class="news-filter-btn active" data-source="todos">Todos</button>
                        <button class="news-filter-btn" data-source="ambito">Ámbito</button>
                        <button class="news-filter-btn" data-source="clarin">Clarín</button>
                        <button class="news-filter-btn" data-source="infobae">Infobae</button>
                        <button class="news-filter-btn" data-source="lanacion">La Nación</button>
                        <button class="news-filter-btn" data-source="lapoliticaonline">La Política Online</button>
                        <button class="news-filter-btn" data-source="pagina12">Página12</button>
                        <button class="news-filter-btn" data-source="perfil">Perfil</button>
                        <button class="news-filter-btn" data-source="tn">TN</button>
                    </div>
                </div>
                <div class="space-y-4">
                    <!-- Noticia 1 -->
                    <article class="flex gap-4 border-b border-neutral-700 border-opacity-20 pb-4 hover:border-opacity-40 transition-colors duration-200">
                        <div class="w-3 h-3 bg-gray-600 rounded-full flex-shrink-0 mt-2"></div>
                        <div class="flex-1">
                            <p class="text-gray-400 text-base leading-relaxed font-normal mb-2">
                                BCRA subió tasa de interés 25 puntos básicos en decisión sorpresiva tras reunión extraordinaria. El dólar blue reaccionó al alza y cerró en $1250, mientras que los dólares financieros mostraron volatilidad en la jornada.
                            </p>
                            <time class="text-sm text-gray-500">hace 15 min</time>
                        </div>
                    </article>

                    <!-- Noticia 2 -->
                    <article class="flex gap-4 border-b border-neutral-700 border-opacity-20 pb-4 hover:border-opacity-40 transition-colors duration-200">
                        <div class="w-3 h-3 bg-gray-600 rounded-full flex-shrink-0 mt-2"></div>
                        <div class="flex-1">
                            <p class="text-gray-400 text-base leading-relaxed font-normal mb-2">
                                La inflación de diciembre se ubicó en 2.5%, por debajo de las expectativas del mercado que proyectaban 2.8%. El dato consolida la tendencia bajista iniciada en octubre y refuerza las expectativas de moderación inflacionaria para 2024.
                            </p>
                            <time class="text-sm text-gray-500">hace 1 hora</time>
                        </div>
                    </article>

                    <!-- Noticia 3 -->
                    <article class="flex gap-4 border-b border-neutral-700 border-opacity-20 pb-4 hover:border-opacity-40 transition-colors duration-200">
                        <div class="w-3 h-3 bg-gray-600 rounded-full flex-shrink-0 mt-2"></div>
                        <div class="flex-1">
                            <p class="text-gray-400 text-base leading-relaxed font-normal mb-2">
                                El FMI aprobó el desembolso de USD 800 millones correspondiente a la séptima revisión del programa. Los dólares financieros MEP y CCL bajaron 2% en respuesta positiva a la noticia, aliviando la presión cambiaria de corto plazo.
                            </p>
                            <time class="text-sm text-gray-500">hace 2 horas</time>
                        </div>
                    </article>

                    <!-- Noticia 4 -->
                    <article class="flex gap-4 border-b border-neutral-700 border-opacity-20 pb-4 hover:border-opacity-40 transition-colors duration-200">
                        <div class="w-3 h-3 bg-gray-600 rounded-full flex-shrink-0 mt-2"></div>
                        <div class="flex-1">
                            <p class="text-gray-400 text-base leading-relaxed font-normal mb-2">
                                Las reservas del BCRA aumentaron USD 200 millones impulsadas por la liquidación de divisas del sector agrícola. El ingreso de dólares por exportaciones de soja y maíz fortalece la posición externa del país en el inicio del año.
                            </p>
                            <time class="text-sm text-gray-500">hace 3 horas</time>
                        </div>
                    </article>

                    <!-- Noticia 5 -->
                    <article class="flex gap-4 border-b border-neutral-700 border-opacity-20 pb-4 hover:border-opacity-40 transition-colors duration-200">
                        <div class="w-3 h-3 bg-gray-600 rounded-full flex-shrink-0 mt-2"></div>
                        <div class="flex-1">
                            <p class="text-gray-400 text-base leading-relaxed font-normal mb-2">
                                Blanqueo de capitales: ingresaron USD 18.000 millones desde el inicio del régimen especial de exteriorización. La medida superó las expectativas oficiales y representa el 15% del total de reservas brutas del sistema financiero.
                            </p>
                            <time class="text-sm text-gray-500">hace 4 horas</time>
                        </div>
                    </article>

                    <!-- Noticia 6 -->
                    <article class="flex gap-4 border-b border-neutral-700 border-opacity-20 pb-4 hover:border-opacity-40 transition-colors duration-200">
                        <div class="w-3 h-3 bg-gray-600 rounded-full flex-shrink-0 mt-2"></div>
                        <div class="flex-1">
                            <p class="text-gray-400 text-base leading-relaxed font-normal mb-2">
                                El Ministerio de Economía anunció nuevas medidas para incentivar la inversión productiva en sectores estratégicos. Los beneficios fiscales incluyen deducción del 200% en gastos de I+D y reducción de retenciones para exportaciones industriales.
                            </p>
                            <time class="text-sm text-gray-500">hace 5 horas</time>
                        </div>
                    </article>

                    <!-- Noticia 7 -->
                    <article class="flex gap-4 pb-4">
                        <div class="w-3 h-3 bg-gray-600 rounded-full flex-shrink-0 mt-2"></div>
                        <div class="flex-1">
                            <p class="text-gray-400 text-base leading-relaxed font-normal mb-2">
                                La Bolsa de Cereales proyecta una cosecha récord de soja de 52 millones de toneladas para la campaña 2023/24. Las condiciones climáticas favorables en enero impulsan las expectativas de ingreso de divisas por exportaciones agrícolas.
                            </p>
                            <time class="text-sm text-gray-500">hace 6 horas</time>
                        </div>
                    </article>
                </div>
            </div>

            <!-- Columna derecha: Cotizaciones -->
            <div class="w-80">
                <div class="flex items-center justify-between mb-3">
                    <h2 class="text-xl text-red-400 font-medium tracking-wide">Dolar Hoy</h2>
                    <div class="inline-flex items-center gap-2 bg-neutral-800 bg-opacity-80 border border-neutral-600 border-opacity-30 rounded-full px-3 py-1.5 text-xs text-gray-400" id="autoUpdateIndicator">
                        <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
                        <span>En vivo</span>
                    </div>
                </div>
                <p class="text-xs text-gray-500 mb-4">Última actualización: <span id="timestamp">--:--</span></p>
                
                <!-- Header -->
                <div class="grid grid-cols-3 gap-3 mb-3 pb-2 border-b border-neutral-700 border-opacity-20">
                    <div class="text-xs text-gray-400 font-light uppercase tracking-wider"></div>
                    <div class="text-sm text-gray-400 font-light uppercase tracking-wider text-center">Compra</div>
                    <div class="text-sm text-gray-400 font-light uppercase tracking-wider text-center">Venta</div>
                </div>

                <div class="space-y-1">
                    <!-- Dólar Oficial -->
                    <div class="grid grid-cols-3 gap-3 py-2 border-b border-neutral-700 border-opacity-10">
                        <span class="text-base text-gray-400 font-normal">Oficial</span>
                        <div class="text-base text-gray-400 text-center">${{ number_format($cotizaciones['oficial']['compra'] ?? 0, 2, ',', '.') }}</div>
                        <div class="text-base text-gray-400 text-center">${{ number_format($cotizaciones['oficial']['venta'] ?? 0, 2, ',', '.') }}</div>
                    </div>

                    <!-- Dólar Blue -->
                    <div class="grid grid-cols-3 gap-3 py-2 border-b border-neutral-700 border-opacity-10">
                        <span class="text-base text-gray-400 font-normal">Blue</span>
                        <div class="text-base text-gray-400 text-center">${{ number_format($cotizaciones['blue']['compra'] ?? 0, 2, ',', '.') }}</div>
                        <div class="text-base text-gray-400 text-center">${{ number_format($cotizaciones['blue']['venta'] ?? 0, 2, ',', '.') }}</div>
                    </div>

                    <!-- Dólar MEP -->
                    <div class="grid grid-cols-3 gap-3 py-2 border-b border-neutral-700 border-opacity-10">
                        <span class="text-base text-gray-400 font-normal">MEP</span>
                        <div class="text-base text-gray-400 text-center">${{ number_format($cotizaciones['mep']['compra'] ?? 0, 2, ',', '.') }}</div>
                        <div class="text-base text-gray-400 text-center">${{ number_format($cotizaciones['mep']['venta'] ?? 0, 2, ',', '.') }}</div>
                    </div>

                    <!-- CCL -->
                    <div class="grid grid-cols-3 gap-3 py-2 border-b border-neutral-700 border-opacity-10">
                        <span class="text-base text-gray-400 font-normal">CCL</span>
                        <div class="text-base text-gray-400 text-center">${{ number_format($cotizaciones['ccl']['compra'] ?? 0, 2, ',', '.') }}</div>
                        <div class="text-base text-gray-400 text-center">${{ number_format($cotizaciones['ccl']['venta'] ?? 0, 2, ',', '.') }}</div>
                    </div>

                    <!-- Dólar Cripto -->
                    <div class="grid grid-cols-3 gap-3 py-2 border-b border-neutral-700 border-opacity-10">
                        <span class="text-base text-gray-400 font-normal">Cripto</span>
                        <div class="text-base text-gray-400 text-center">${{ number_format($cotizaciones['cripto']['compra'] ?? 0, 2, ',', '.') }}</div>
                        <div class="text-base text-gray-400 text-center">${{ number_format($cotizaciones['cripto']['venta'] ?? 0, 2, ',', '.') }}</div>
                    </div>

                    <!-- Dólar Freelance -->
                    <div class="grid grid-cols-3 gap-3 py-2 border-b border-neutral-700 border-opacity-10">
                        <span class="text-base text-gray-400 font-normal">Freelance</span>
                        <div class="text-base text-gray-500 text-center">-</div>
                        <div class="text-base text-gray-400 text-center">${{ number_format($cotizaciones['freelance']['valor'] ?? 0, 2, ',', '.') }}</div>
                    </div>

                    <!-- Dólar Tarjeta -->
                    <div class="grid grid-cols-3 gap-3 py-2">
                        <span class="text-base text-gray-400 font-normal">Tarjeta</span>
                        <div class="text-base text-gray-500 text-center">-</div>
                        <div class="text-base text-gray-400 text-center">${{ number_format($cotizaciones['tarjeta']['valor'] ?? 0, 2, ',', '.') }}</div>
                    </div>
                </div>
            </div>
        </div>



        <!-- Footer -->
        <footer class="mt-auto pt-8 pb-4 border-t border-gray-600 border-opacity-20 flex-shrink-0">
            <!-- Logo del footer -->
            <div class="text-center mb-4">
                <h3 class="text-gray-300 text-2xl font-light tracking-tight">
                    Dolar<span class="font-semibold text-red-400">12</span><span class="font-extralight text-gray-500 text-xl">.com</span>
                </h3>
            </div>
            
            <!-- Enlaces y contacto -->
            <div class="text-center mb-4">
                <div class="flex justify-center items-center gap-4 text-sm">
                    <a href="{{ route('terms') }}" class="text-red-400 no-underline transition-colors duration-200 hover:text-red-300">
                        Términos de Uso
                    </a>
                    <span class="text-gray-600">|</span>
                    <a href="mailto:hola@dolar12.com" class="text-gray-400 no-underline transition-colors duration-200 hover:text-gray-300">
                        Contacto
                    </a>
                </div>
            </div>
            
            <!-- Copyright -->
            <div class="text-center text-xs text-gray-500">
                <p>© 2025 Dolar12.com - Todos los derechos reservados</p>
            </div>
        </footer>
    </div>

    <!-- External JavaScript -->
    <script src="{{ asset('js/dashboard.js') }}"></script>
</body>
</html>