<?php

namespace Skapelapp\IPStackLaravel\Facades;

use Illuminate\Support\Facades\Facade;

class IPStackFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'ipstack';
    }
}
