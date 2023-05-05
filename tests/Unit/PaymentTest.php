<?php

namespace Tests\Unit;

use App\Repositories\PaymentRepository;
use Tests\TestCase;

class PaymentTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_setSession()
    {
        $userRepo = new PaymentRepository();
        $userRepo->setSession("price_1Mzo4IBiXgImlwgFjHmE7TtJ", 2);
        $this->assertEquals($userRepo->totalPrice, 20000);
        $this->assertEquals($userRepo->currency, "usd");
    }
}
