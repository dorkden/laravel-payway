<?php

namespace Dorkden\Payway;


use GuzzleHttp\Client;
use Illuminate\Support\Facades\Config;

class Payway
{
    /**
     * Instance of Client
     * @var Client
     */
    protected $client;

    /**
     *  Response from requests made to Payway
     * @var mixed
     */
    protected $response;

    /**
     * Payway API base Url
     * @var string
     */
    protected $baseUrl;

    /**
     * Payway Merchant ID
     */
    public $merchantId = '';

    /**
     * Payway API KEY
     */
    public $apiKey = '';


    public function __construct()
    {
        $this->setBaseUrl();
        $this->setApiKey();
        $this->setMerchantId();
    }


    public function setBaseUrl()
    {
        $sandbox = Config::get('payway.sandbox');

        if ($sandbox) {
            $this->baseUrl = 'https://checkout-sandbox.payway.com.kh/api';
        } else {
            $this->baseUrl = 'https://checkout.payway.com.kh/api';
        }
    }

    public function setApiKey()
    {
        $this->apiKey = Config::get('payway.api_key');
    }

    public function setMerchantId()
    {
        $this->merchantId = Config::get('payway.merchant_id');
    }

    /**
     * Returns the getHash
     * For PayWay security, you must follow the way of encryption for hash.
     *
     * @param $trxId
     * @param int $amount
     * @param string $items
     *
     * @return string getHash
     */
    public function getHash($trxId, $amount, $items = '')
    {

        $data = $this->merchantId . $trxId . $amount;

        if ($items) {
            $data = $data . $items;
        }

        return base64_encode(hash_hmac('sha512', $data, $this->apiKey, true));
    }

}