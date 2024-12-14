<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Http;

class ApodController extends Controller
{
    public function index(): JsonResponse
    {
        $apiKey = config('services.nasa.api_key');
        $response = Http::get('https://api.nasa.gov/planetary/apod', [
            'api_key' => $apiKey,
        ]);

        if ($response->successful()) {
            return response()->json($response->json());
        }

        return response()->json(['error' => 'Failed to fetch APOD data'], 500);
    }
}
