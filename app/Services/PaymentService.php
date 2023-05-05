<?php

namespace App\Services;

use App\Repositories\PaymentRepository;

class PaymentService
{
    public $paymentRepository;

    public function __construct(PaymentRepository $repo) {
        $this->paymentRepository = $repo;
    }

    function getSession($priceId, $quantity) {
        $this->paymentRepository->setSession($priceId, $quantity);
        return $this->paymentRepository->getSession();
    }
}