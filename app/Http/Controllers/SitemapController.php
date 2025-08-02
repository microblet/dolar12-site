<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Client\RequestException;

class SitemapController extends Controller
{
    private string $apiUrl;
    private string $apiKey;

    public function __construct()
    {
        $this->apiUrl = env('EXTERNAL_API_URL', 'http://localhost:8000/api/dolar');
        $this->apiKey = env('EXTERNAL_API_KEY', 'abc123');
    }

    public function index(): Response
    {
        try {
            $dolarData = $this->getDolarData();
            $baseUrl = request()->getSchemeAndHttpHost();
            
            $xml = view('sitemap.index', [
                'baseUrl' => $baseUrl,
                'dolarData' => $dolarData,
                'lastModified' => now()->toISOString()
            ])->render();

            return response($xml, 200, [
                'Content-Type' => 'application/xml; charset=utf-8'
            ]);

        } catch (\Exception $e) {
            Log::error('Error generating sitemap: ' . $e->getMessage());
            
            // Fallback sitemap without dollar data
            $xml = view('sitemap.index', [
                'baseUrl' => request()->getSchemeAndHttpHost(),
                'dolarData' => null,
                'lastModified' => now()->toISOString()
            ])->render();

            return response($xml, 200, [
                'Content-Type' => 'application/xml; charset=utf-8'
            ]);
        }
    }

    private function getDolarData(): ?array
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
                    return $data['data']['cotizaciones'];
                }
            }

            return null;

        } catch (\Exception $e) {
            Log::error('Error fetching dollar data for sitemap: ' . $e->getMessage());
            return null;
        }
    }
} 