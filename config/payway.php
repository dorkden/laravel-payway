<?php

return [
    "merchant_id" => env("PAYWAY_MERCHANT_ID"),
    "api_key" => env("PAYWAY_API_KEY"),
    "sandbox" => env("PAYWAY_SANDBOX", true)
];