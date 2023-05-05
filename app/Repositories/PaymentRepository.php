<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Http;

class PaymentRepository
{
    public $totalPrice;
    public $currency;
    public $paymentUrl;

    public function __construct(){ }

    function setSession($priceId, $quantity) {
        $url = "https://api.stripe.com/v1/checkout/sessions";
        $headers = [
            "Content-Type" => "application/x-www-form-urlencoded",
            "Authorization" => "Bearer sk_test_51Mzn0JBiXgImlwgFBOrI1z9pi0W4kViN6XMRawTfU5rdpbHlfCYzklbis8TazW4TMxum7g9WR947bew7g3AkMQ0o00R9hyuBbG"
        ];
        $body = [
            "success_url" => "https://www.googlc.com",
            "mode" => "payment",
            "line_items[0][price]" => $priceId,
            "line_items[0][quantity]" => $quantity
        ];
        $httpRes = Http::withHeaders($headers)->asForm()->post($url, $body);
        if ($httpRes->failed()) {
            $httpRes->throw();
        }

        $this->totalPrice = $httpRes->json("amount_total");
        $this->currency =  $httpRes->json("currency");
        $this->paymentUrl =  $httpRes->json("url");
    }

    function getSession() {
        return $this;
    }
}