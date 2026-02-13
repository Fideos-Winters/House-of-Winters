<?php

namespace Tests;

use Illuminate\Support\Facades\Config;
use Orchestra\Testbench\TestCase;
use Skapelapp\IPStackLaravel\Facades\IPStackLaravelServiceProvider;

class IPStackLaravelTest extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [IPStackLaravelServiceProvider::class];
    }

    protected function getPackageAliases($app)
    {
        return [
            'IPStack' => \Skapelapp\IPStackLaravel\Facades\IPStackFacade::class,
        ];
    }

    public function testGetInfoWithValidIP()
    {
        Config::set('ipstack.api_key', NULL);

        $ipInfo = \IPStack::getInfo('8.8.8.8');

        $this->assertArrayHasKey('ip', $ipInfo);
        $this->assertArrayHasKey('city', $ipInfo);
        $this->assertArrayHasKey('region', $ipInfo);
        $this->assertArrayHasKey('country', $ipInfo);
        $this->assertArrayHasKey('latitude', $ipInfo);
        $this->assertArrayHasKey('longitude', $ipInfo);
    }
}
