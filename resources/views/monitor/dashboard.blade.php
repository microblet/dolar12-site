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

    <!-- External CSS -->
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>
<body>
    <div class="dashboard">
        <div class="header">
            <h1>Dolar<span class="brand-number">12</span><span class="brand-domain">.com</span></h1>
            <p class="subtitle">Microdatos económicos en tiempo real</p>
            <p class="country">Argentina</p>
        </div>

        <div class="grid">
            <div class="dolar-card oficial">
                <div class="card-header">
                    <span class="card-title">DÓLAR OFICIAL</span>
                </div>
                <div class="price-container">
                    <div class="price-section">
                        <div class="price-label">Compra</div>
                        <div class="price-value">${{ number_format($cotizaciones['oficial']['compra'] ?? 0, 0, ',', '.') }}</div>
                    </div>
                    <div class="price-section">
                        <div class="price-label">Venta</div>
                        <div class="price-value">${{ number_format($cotizaciones['oficial']['venta'] ?? 0, 0, ',', '.') }}</div>
                    </div>
                </div>
            </div>

            <div class="dolar-card blue">
                <div class="card-header">
                    <span class="card-title">DÓLAR BLUE</span>
                </div>
                <div class="price-container">
                    <div class="price-section">
                        <div class="price-label">Compra</div>
                        <div class="price-value">${{ number_format($cotizaciones['blue']['compra'] ?? 0, 0, ',', '.') }}</div>
                    </div>
                    <div class="price-section">
                        <div class="price-label">Venta</div>
                        <div class="price-value">${{ number_format($cotizaciones['blue']['venta'] ?? 0, 0, ',', '.') }}</div>
                    </div>
                </div>
            </div>

            <div class="dolar-card mep">
                <div class="card-header">
                    <span class="card-title">DÓLAR MEP</span>
                </div>
                <div class="price-container">
                    <div class="price-section">
                        <div class="price-label">Compra</div>
                        <div class="price-value">${{ number_format($cotizaciones['mep']['compra'] ?? 0, 0, ',', '.') }}</div>
                    </div>
                    <div class="price-section">
                        <div class="price-label">Venta</div>
                        <div class="price-value">${{ number_format($cotizaciones['mep']['venta'] ?? 0, 0, ',', '.') }}</div>
                    </div>
                </div>
            </div>

            <div class="dolar-card ccl">
                <div class="card-header">
                    <span class="card-title">CONTADO CON LIQUIDACIÓN</span>
                </div>
                <div class="price-container">
                    <div class="price-section">
                        <div class="price-label">Compra</div>
                        <div class="price-value">${{ number_format($cotizaciones['ccl']['compra'] ?? 0, 0, ',', '.') }}</div>
                    </div>
                    <div class="price-section">
                        <div class="price-label">Venta</div>
                        <div class="price-value">${{ number_format($cotizaciones['ccl']['venta'] ?? 0, 0, ',', '.') }}</div>
                    </div>
                </div>
            </div>

            <div class="dolar-card cripto">
                <div class="card-header">
                    <span class="card-title">DÓLAR CRIPTO</span>
                </div>
                <div class="price-container">
                    <div class="price-section">
                        <div class="price-label">Compra</div>
                        <div class="price-value">${{ number_format($cotizaciones['cripto']['compra'] ?? 0, 0, ',', '.') }}</div>
                    </div>
                    <div class="price-section">
                        <div class="price-label">Venta</div>
                        <div class="price-value">${{ number_format($cotizaciones['cripto']['venta'] ?? 0, 0, ',', '.') }}</div>
                    </div>
                </div>
            </div>

            <div class="dolar-card tarjeta">
                <div class="card-header">
                    <span class="card-title">DÓLAR TARJETA</span>
                </div>
                <div class="price-container">
                    <div class="price-section">
                        <div class="price-label">Compra</div>
                        <div class="price-value">-</div>
                    </div>
                    <div class="price-section">
                        <div class="price-label">Venta</div>
                        <div class="price-value">${{ number_format($cotizaciones['tarjeta']['valor'] ?? 0, 0, ',', '.') }}</div>
                    </div>
                </div>
            </div>

            <div class="dolar-card freelance">
                <div class="card-header">
                    <span class="card-title">DÓLAR FREELANCE</span>
                </div>
                <div class="price-container">
                    <div class="price-section">
                        <div class="price-label">Compra</div>
                        <div class="price-value">-</div>
                    </div>
                    <div class="price-section">
                        <div class="price-label">Venta</div>
                        <div class="price-value">${{ number_format($cotizaciones['freelance']['valor'] ?? 0, 0, ',', '.') }}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="timestamp">
            <p>Última Actualización: <span id="timestamp">--:--</span></p>
            <div class="auto-update-indicator" id="autoUpdateIndicator">
                <div class="sync-icon"></div>
                <span>Actualización automática cada 2 min</span>
            </div>
        </div>

        <div class="footer">
            <p><a href="{{ route('terms') }}">Términos de Uso</a> | <span class="email"><a href="mailto:hola@dolar12.com">hola@dolar12.com</a></span></p>
        </div>
    </div>

    <!-- External JavaScript -->
    <script src="{{ asset('js/dashboard.js') }}"></script>
</body>
</html>