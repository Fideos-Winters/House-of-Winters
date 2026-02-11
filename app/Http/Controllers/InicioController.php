<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class InicioController extends Controller
{
    public function index(Request $request)
    {
        $ip = $request->ip();
        $apiKey = env('IPSTACK_KEY');

        // Llamada a ipstack
        $response = Http::get("http://api.ipstack.com/{$ip}?access_key={$apiKey}");
        $location = $response->json();

        // Si no hay datos poner valores por defecto
        $lat = isset($location['latitude']) ? $location['latitude'] : 0;
        $lon = isset($location['longitude']) ? $location['longitude'] : 0;

        return view('Inicio.Inicio', [
            'location' => $location,
            'lat' => $lat,
            'lon' => $lon,
        ]);
    }
}