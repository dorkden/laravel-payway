<?php

if (! function_exists("payway"))
{
    function paystack() {

        return app()->make('laravel-payway');
    }
}