<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

Route::get('/', function () {
    $apiKey = 'zZX3lCSmeyb0JN45fcMazf6Oq6mja6WXRwbwaQ9W';
    $response = Http::withoutVerifying()->get('https://api.nasa.gov/planetary/apod', [
        'api_key' => $apiKey,
    ]);

    if ($response->successful()) {
        $data = $response->json();
        return view('welcome', ['apod' => $data]);
    }

    return view('welcome', ['error' => 'Failed to fetch APOD data: ' . $response->status()]);
});

Route::get('/api/apod', function () {
    $apiKey = 'zZX3lCSmeyb0JN45fcMazf6Oq6mja6WXRwbwaQ9W';
    $response = Http::withoutVerifying()->get('https://api.nasa.gov/planetary/apod', [
        'api_key' => $apiKey,
    ]);

    if ($response->successful()) {
        return response()->json($response->json());
    }

    return response()->json(['error' => 'Failed to fetch APOD data'], $response->status());
});
