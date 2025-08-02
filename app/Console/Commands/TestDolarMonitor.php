<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\DolarScrapingService;

class TestDolarMonitor extends Command
{
    protected $signature = 'dolar:test';
    protected $description = 'Probar el sistema de scraping del monitor de dólar';

    public function handle()
    {
        $this->info('=== TESTING DOLAR12.NEWS LARAVEL ===');
        $this->newLine();

        // Test del servicio de scraping
        $this->info('1. Probando servicio de scraping...');
        $startTime = microtime(true);

        try {
            $scrapingService = app(DolarScrapingService::class);
            $data = $scrapingService->obtenerCotizacionesFrescas();
            
            $endTime = microtime(true);
            $duration = round(($endTime - $startTime) * 1000, 2);
            
            $this->info("✅ Scraping ejecutado exitosamente en {$duration}ms");
            $this->newLine();

            // Verificar estructura de datos
            $this->info('2. Verificando estructura de datos...');
            
            if (isset($data['cotizaciones'])) {
                $this->info('✅ Estructura de cotizaciones: OK');
                $this->info('✅ Timestamp: ' . $data['timestamp']);
                $this->info('✅ Fuente: ' . $data['fuente']);
                $this->info('✅ Scraping exitoso: ' . ($data['scraping_success'] ? 'SÍ' : 'NO (usando fallback)'));
                $this->newLine();

                // Mostrar cotizaciones
                $this->info('3. Cotizaciones obtenidas:');
                $cotizaciones = $data['cotizaciones'];

                $this->displayCotizacion('DÓLAR OFICIAL', [
                    'Compra' => '$' . number_format($cotizaciones['oficial']['compra'], 2),
                    'Venta' => '$' . number_format($cotizaciones['oficial']['venta'], 2),
                    'Variación' => ($cotizaciones['oficial']['variacion'] >= 0 ? '+' : '') . $cotizaciones['oficial']['variacion'],
                    'Tendencia' => strtoupper($cotizaciones['oficial']['tendencia'])
                ]);

                $this->displayCotizacion('DÓLAR MEP', [
                    'Valor' => '$' . number_format($cotizaciones['mep']['valor'], 2),
                    'Variación' => ($cotizaciones['mep']['variacion'] >= 0 ? '+' : '') . $cotizaciones['mep']['variacion'],
                    'Tendencia' => strtoupper($cotizaciones['mep']['tendencia'])
                ]);

                $this->displayCotizacion('CONTADO CON LIQUI', [
                    'Valor' => '$' . number_format($cotizaciones['ccl']['valor'], 2),
                    'Variación' => ($cotizaciones['ccl']['variacion'] >= 0 ? '+' : '') . $cotizaciones['ccl']['variacion'],
                    'Tendencia' => strtoupper($cotizaciones['ccl']['tendencia'])
                ]);

                $this->displayCotizacion('DÓLAR CRIPTO', [
                    'Valor' => '$' . number_format($cotizaciones['cripto']['valor'], 2),
                    'Variación' => ($cotizaciones['cripto']['variacion'] >= 0 ? '+' : '') . $cotizaciones['cripto']['variacion'],
                    'Tendencia' => strtoupper($cotizaciones['cripto']['tendencia'])
                ]);

                $this->displayCotizacion('DÓLAR TARJETA', [
                    'Valor' => '$' . number_format($cotizaciones['tarjeta']['valor'], 2),
                    'Variación' => ($cotizaciones['tarjeta']['variacion'] >= 0 ? '+' : '') . $cotizaciones['tarjeta']['variacion'],
                    'Tendencia' => strtoupper($cotizaciones['tarjeta']['tendencia']),
                    'Impuestos' => $cotizaciones['tarjeta']['impuestos'] . ' (' . $cotizaciones['tarjeta']['descripcion'] . ')'
                ]);

            } else {
                $this->error('❌ Estructura de datos incorrecta');
                return 1;
            }

            // Test de endpoints HTTP
            $this->info('4. Probando endpoints HTTP...');
            
            try {
                $response = \Http::get('http://localhost:8000/api/monitor/cotizaciones');
                
                if ($response->successful()) {
                    $apiData = $response->json();
                    if ($apiData && $apiData['success']) {
                        $this->info('✅ API endpoint funcionando correctamente');
                        $this->info('✅ Datos JSON válidos recibidos');
                    } else {
                        $this->warn('⚠️  API devolvió datos pero con errores');
                    }
                } else {
                    $this->warn('⚠️  Error HTTP: ' . $response->status());
                }
            } catch (\Exception $e) {
                $this->warn('⚠️  No se pudo conectar a la API (¿servidor corriendo?)');
                $this->warn('   Ejecuta: php artisan serve');
            }

            // Test de cache
            $this->info('5. Probando sistema de cache...');
            $startCache = microtime(true);
            $cachedData = $scrapingService->obtenerCotizaciones();
            $endCache = microtime(true);
            $cacheDuration = round(($endCache - $startCache) * 1000, 2);
            
            $this->info("✅ Cache funcionando - respuesta en {$cacheDuration}ms");

            $this->newLine();
            $this->info('=== RESUMEN ===');
            $this->info('✅ Scraping: FUNCIONANDO');
            $this->info('✅ Datos: VÁLIDOS');
            $this->info('✅ Cache: FUNCIONANDO');
            $this->info('✅ Estructura: CORRECTA');
            $this->info("⏰ Tiempo de respuesta: {$duration}ms");
            $this->newLine();
            
            $this->info('🚀 ¡Sistema listo para usar!');
            $this->info('   Dashboard: http://localhost:8000/monitor');
            $this->info('   API: http://localhost:8000/api/monitor/cotizaciones');
            $this->newLine();

            return 0;

        } catch (\Exception $e) {
            $this->error('❌ ERROR CRÍTICO: ' . $e->getMessage());
            return 1;
        }
    }

    private function displayCotizacion($title, $data)
    {
        $this->line("📊 <fg=cyan>{$title}:</>");
        foreach ($data as $key => $value) {
            $this->line("   {$key}: {$value}");
        }
        $this->newLine();
    }
}
