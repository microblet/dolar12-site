<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <!-- Página principal -->
    <url>
        <loc>{{ $baseUrl }}/</loc>
        <lastmod>{{ $lastModified }}</lastmod>
        <changefreq>always</changefreq>
        <priority>1.0</priority>
    </url>

    <!-- API endpoints -->
    <url>
        <loc>{{ $baseUrl }}/api/monitor/cotizaciones</loc>
        <lastmod>{{ $lastModified }}</lastmod>
        <changefreq>always</changefreq>
        <priority>0.8</priority>
    </url>

    @if($dolarData)
    <!-- Páginas dinámicas con datos del dólar -->
    <url>
        <loc>{{ $baseUrl }}/dolar/oficial</loc>
        <lastmod>{{ $lastModified }}</lastmod>
        <changefreq>always</changefreq>
        <priority>0.9</priority>
        <image:image>
            <image:loc>{{ $baseUrl }}/api/monitor/cotizaciones</image:loc>
            <image:title>Dólar Oficial - Compra: ${{ number_format($dolarData['oficial']['compra'] ?? 0, 0, ',', '.') }} | Venta: ${{ number_format($dolarData['oficial']['venta'] ?? 0, 0, ',', '.') }}</image:title>
        </image:image>
    </url>

    <url>
        <loc>{{ $baseUrl }}/dolar/blue</loc>
        <lastmod>{{ $lastModified }}</lastmod>
        <changefreq>always</changefreq>
        <priority>0.9</priority>
        <image:image>
            <image:loc>{{ $baseUrl }}/api/monitor/cotizaciones</image:loc>
            <image:title>Dólar Blue - Compra: ${{ number_format($dolarData['blue']['compra'] ?? 0, 0, ',', '.') }} | Venta: ${{ number_format($dolarData['blue']['venta'] ?? 0, 0, ',', '.') }}</image:title>
        </image:image>
    </url>

    <url>
        <loc>{{ $baseUrl }}/dolar/mep</loc>
        <lastmod>{{ $lastModified }}</lastmod>
        <changefreq>always</changefreq>
        <priority>0.9</priority>
        <image:image>
            <image:loc>{{ $baseUrl }}/api/monitor/cotizaciones</image:loc>
            <image:title>Dólar MEP - Compra: ${{ number_format($dolarData['mep']['compra'] ?? 0, 0, ',', '.') }} | Venta: ${{ number_format($dolarData['mep']['venta'] ?? 0, 0, ',', '.') }}</image:title>
        </image:image>
    </url>

    <url>
        <loc>{{ $baseUrl }}/dolar/ccl</loc>
        <lastmod>{{ $lastModified }}</lastmod>
        <changefreq>always</changefreq>
        <priority>0.9</priority>
        <image:image>
            <image:loc>{{ $baseUrl }}/api/monitor/cotizaciones</image:loc>
            <image:title>Dólar CCL - Compra: ${{ number_format($dolarData['ccl']['compra'] ?? 0, 0, ',', '.') }} | Venta: ${{ number_format($dolarData['ccl']['venta'] ?? 0, 0, ',', '.') }}</image:title>
        </image:image>
    </url>

    <url>
        <loc>{{ $baseUrl }}/dolar/cripto</loc>
        <lastmod>{{ $lastModified }}</lastmod>
        <changefreq>always</changefreq>
        <priority>0.9</priority>
        <image:image>
            <image:loc>{{ $baseUrl }}/api/monitor/cotizaciones</image:loc>
            <image:title>Dólar Cripto - Compra: ${{ number_format($dolarData['cripto']['compra'] ?? 0, 0, ',', '.') }} | Venta: ${{ number_format($dolarData['cripto']['venta'] ?? 0, 0, ',', '.') }}</image:title>
        </image:image>
    </url>

    <url>
        <loc>{{ $baseUrl }}/dolar/tarjeta</loc>
        <lastmod>{{ $lastModified }}</lastmod>
        <changefreq>always</changefreq>
        <priority>0.9</priority>
        <image:image>
            <image:loc>{{ $baseUrl }}/api/monitor/cotizaciones</image:loc>
            <image:title>Dólar Tarjeta - Valor: ${{ number_format($dolarData['tarjeta']['valor'] ?? 0, 0, ',', '.') }}</image:title>
        </image:image>
    </url>
    @endif

    <!-- Páginas informativas -->
    <url>
        <loc>{{ $baseUrl }}/cotizaciones</loc>
        <lastmod>{{ $lastModified }}</lastmod>
        <changefreq>always</changefreq>
        <priority>0.8</priority>
    </url>

    <url>
        <loc>{{ $baseUrl }}/monitor</loc>
        <lastmod>{{ $lastModified }}</lastmod>
        <changefreq>always</changefreq>
        <priority>0.8</priority>
    </url>
</urlset> 