<?php

namespace Tests\Feature;

use Tests\TestCase;

class PaymentTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_getPaymentUrl()
    {
        $data = [
            "currency" => "usd",
            "amount" => "200",
            "price_id" => "price_1Mzo4IBiXgImlwgFjHmE7TtJ",
            "quantity" => "2"
        ];
        $headers = [
            "Content-Type" =>  "application/json",
            "Accept" => "*/*",
            "Accept-Encoding" => "gzip, deflate, br",
            "Connection" => "keep-alive"
        ];
        $response = $this->post('/api/payment/get_payment_url', $data, $headers);
        $response->assertStatus(200);
    }
}
