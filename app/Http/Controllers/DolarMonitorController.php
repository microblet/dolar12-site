<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Client\RequestException;

class DolarMonitorController extends Controller
{
    private string $apiUrl;
    private string $apiKey;

    public function __construct()
    {
        $this->apiUrl = env('EXTERNAL_API_URL', 'http://localhost:8000/api/dolar');
        $this->apiKey = env('EXTERNAL_API_KEY', 'abc123');
    }

    public function dashboard()
    {
        try {
            $data = $this->getDolarData();
            
            // Generar descripción dinámica con valores actuales
            $seoDescription = $this->generateSeoDescription($data);
            $seoKeywords = $this->generateSeoKeywords($data);
            
                    return view('monitor.dashboard', [
            'cotizaciones' => $data,
            'seoDescription' => $seoDescription,
            'seoKeywords' => $seoKeywords,
            'websiteJsonLd' => $this->generateWebsiteJsonLd(),
            'financialServiceJsonLd' => $this->generateFinancialServiceJsonLd()
        ]);
            
        } catch (\Exception $e) {
            // Si hay error, pasar datos vacíos
            return view('monitor.dashboard', [
                'cotizaciones' => $this->getFallbackResponse(),
                'seoDescription' => 'Cotización del dólar en tiempo real. Dólar oficial, blue, MEP, CCL, cripto y tarjeta. Actualización automática cada 2 minutos.',
                'seoKeywords' => 'dolar, cotizacion, dolar oficial, dolar blue, dolar mep, dolar ccl, dolar cripto, dolar tarjeta, argentina, tipo de cambio',
                'websiteJsonLd' => $this->generateWebsiteJsonLd(),
                'financialServiceJsonLd' => $this->generateFinancialServiceJsonLd()
            ]);
        }
    }

    public function cotizaciones(): JsonResponse
    {
        try {
            $data = $this->getDolarData();
            
            return response()->json([
                'success' => true,
                'data' => [
                    'cotizaciones' => $data,
                    'fuente' => 'API Externa',
                    'timestamp' => now()->format('Y-m-d H:i:s')
                ]
            ], 200);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => 'Error al obtener cotizaciones',
                'message' => $e->getMessage()
            ], 422);
        }
    }

    private function getDolarData(): array
    {
        try {
            $response = Http::timeout(10)
                ->withHeaders([
                    'X-API-KEY' => $this->apiKey,
                    'Accept' => 'application/json'
                ])
                ->get($this->apiUrl);

            if ($response->successful()) {
                $data = $response->json();
                
                if (isset($data['success']) && $data['success'] && isset($data['data']['cotizaciones'])) {
                    return $this->formatResponse($data['data']['cotizaciones']);
                }
            }

            Log::error('Error consuming external API', [
                'status' => $response->status(),
                'response' => $response->body()
            ]);

            return $this->getFallbackResponse();

        } catch (RequestException $e) {
            Log::error('RequestException consuming external API', [
                'message' => $e->getMessage(),
                'url' => $this->apiUrl
            ]);
            return $this->getFallbackResponse();
        } catch (\Exception $e) {
            Log::error('Exception consuming external API', [
                'message' => $e->getMessage(),
                'url' => $this->apiUrl
            ]);
            return $this->getFallbackResponse();
        }
    }

    private function formatResponse(array $cotizaciones): array
    {
        $formatted = [];
        
        foreach ($cotizaciones as $type => $data) {
            if ($type === 'tarjeta') {
                $formatted[$type] = [
                    'valor' => $data['valor'] ?? 0,
                    'impuestos' => $data['impuestos'] ?? '',
                    'descripcion' => $data['descripcion'] ?? ''
                ];
            } elseif ($type === 'freelance') {
                $formatted[$type] = [
                    'valor' => $data['valor'] ?? 0
                ];
            } else {
                $formatted[$type] = [
                    'compra' => $data['compra'] ?? 0,
                    'venta' => $data['venta'] ?? 0
                ];
            }
        }

        return $formatted;
    }

    private function getFallbackResponse(): array
    {
        return [
            'oficial' => [
                'compra' => 0,
                'venta' => 0
            ],
            'blue' => [
                'compra' => 0,
                'venta' => 0
            ],
            'mep' => [
                'compra' => 0,
                'venta' => 0
            ],
            'ccl' => [
                'compra' => 0,
                'venta' => 0
            ],
            'cripto' => [
                'compra' => 0,
                'venta' => 0
            ],
            'tarjeta' => [
                'valor' => 0,
                'impuestos' => '',
                'descripcion' => ''
            ],
            'freelance' => [
                'valor' => 0
            ]
        ];
    }
    
    private function generateSeoDescription(array $data): string
    {
        $oficial = $data['oficial']['venta'] ?? 0;
        $blue = $data['blue']['venta'] ?? 0;
        $mep = $data['mep']['venta'] ?? 0;
        
        return "Cotización del dólar en tiempo real: Oficial \${$oficial}, Blue \${$blue}, MEP \${$mep}. Dólar oficial, blue, MEP, CCL, cripto y tarjeta. Actualización automática cada 2 minutos. Monitoreo profesional de tipos de cambio en Argentina.";
    }

    private function generateSeoKeywords(array $data): string
    {
        $oficial = $data['oficial']['venta'] ?? 0;
        $blue = $data['blue']['venta'] ?? 0;
        
        return "dólar {$oficial}, dolar blue {$blue}, cotización dólar, dolar oficial, dolar mep, dolar ccl, dolar cripto, dolar tarjeta, argentina, tipo de cambio, cotizaciones, dolar hoy";
    }

    private function generateWebsiteJsonLd(): string
    {
        $data = [
            '@context' => 'https://schema.org',
            '@type' => 'WebSite',
            'name' => 'Dolar12.News',
            'url' => request()->getSchemeAndHttpHost(),
            'description' => 'Cotización del dólar en tiempo real. Monitoreo profesional de tipos de cambio en Argentina.',
            'potentialAction' => [
                '@type' => 'SearchAction',
                'target' => request()->getSchemeAndHttpHost() . '/search?q={search_term_string}',
                'query-input' => 'required name=search_term_string'
            ]
        ];
        
        return json_encode($data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    }

    private function generateFinancialServiceJsonLd(): string
    {
        $data = [
            '@context' => 'https://schema.org',
            '@type' => 'FinancialService',
            'name' => 'Dolar12.News - Cotización Dólar',
            'description' => 'Servicio de cotización del dólar en tiempo real',
            'url' => request()->getSchemeAndHttpHost(),
            'areaServed' => 'AR',
            'serviceType' => 'Cotización de divisas',
            'provider' => [
                '@type' => 'Organization',
                'name' => 'Dolar12.News'
            ]
        ];
        
        return json_encode($data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    }
}
