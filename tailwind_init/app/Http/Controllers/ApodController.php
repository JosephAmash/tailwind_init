<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class ApodController extends Controller
{
    public function index(): JsonResponse
    {
        $apiKey = env('NASA_API_KEY');
        $endDate = now();
        $startData = now()->subDays(5);

        $response = Http::get('https://api.nasa.gov/planetary/apod', [
            'api_key'=> $apiKey,
            'start_date'=> $startData->format('Y-m-d'),
            'end_date'=> $endDate->format('Y-m-d'),
        ]);

        if ($response->successful()) {
            return response()->json($response->json());
        }

        return response()->json(['error' => 'Fehler beim Abrufen der APOD-Daten'],500);

   // Implementiere die Logik zum Abrufen der APOD-Daten
    }
}
