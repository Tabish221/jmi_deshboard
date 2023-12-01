<?php

namespace App\Models;

use Omnipay\Omnipay;



/**
 * Class PayPal
 * @package App
 */
class PayPal
{
    /**
     * @return mixed
     */
    public function gateway()
    {
        $gateway = Omnipay::create('PayPal_Express');

        $gateway->setUsername(config('paypal.credentials.username'));
        $gateway->setPassword(config('paypal.credentials.password'));
        $gateway->setSignature(config('paypal.credentials.signature'));
        $gateway->setTestMode(config('paypal.credentials.sandbox'));
//$gateway->setClientId('AWJYFhYI2XVysbZgdtipprORz5MsaATFlqhRZ7I-nr9sr0wJXJax0qN7qKiOaTJG6WN3XxxSxSP3g-FS');
//$gateway->setSecret('ECXR6MXAUXjgJhKPP-AHZPCHLFKG9j0OjlJznrBPzm6K8wg5KSRZdRbQCSHkiqEqfcjRYW-kBPAgTAIS');
       // $gateway->setTestMode(true);

        return $gateway;
    }

    /**
     * @param array $parameters
     * @return mixed
     */
    public function purchase(array $parameters)
    {
        $response = $this->gateway()
            ->purchase($parameters)
            ->send();

        return $response;
    }

    /**
     * @param array $parameters
     */
    public function complete(array $parameters)
    {
        $response = $this->gateway()
            ->completePurchase($parameters)
            ->send();

        return $response;
    }

    /**
     * @param $amount
     */
    public function formatAmount($amount)
    {
        return number_format($amount, 2, '.', '');
    }

    /**
     * @param $order
     */
    public function getCancelUrl()
    {
        return route('paypal.checkout.cancelled');
    }

    /**
     * @param $order
     */
    public function getReturnUrl($amount,$jmiaccount)
    {
        return route('paypal.checkout.completed',array($amount,$jmiaccount));
    }

    /**
     * @param $order
     */
    public function getNotifyUrl()
    {
        $env = config('paypal.credentials.sandbox') ? "sandbox" : "live";

        return route('webhook.paypal.ipn', $env);
    }
}
