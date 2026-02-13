<?php

namespace Skapelapp\IPStackLaravel;

use Illuminate\Support\Facades\Http;

class IPStack
{
    protected $apiKey;

    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    public function getInfo($ip)
    {
        $response = Http::get("http://api.ipstack.com/{$ip}?access_key={$this->apiKey}");
        return $response->json();
    }
}
