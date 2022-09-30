<?php

namespace Dorkden\Payway\Facades;

use Illuminate\Support\Facades\Facade;

class Payway extends Facade
{
    /**
     * Get the registered name of the component
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravel-payway';
    }
}