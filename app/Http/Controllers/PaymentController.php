<?php

namespace App\Http\Controllers;

use App\Services\PaymentService;
use App\Http\Requests\SetSessionRequest;

class PaymentController extends Controller
{
    use ApiResponseTrait;
    protected $paymentService;

    public function __construct(PaymentService $paymentService)
    {
        $this->paymentService = $paymentService;
    }

    public function getPaymentUrl(SetSessionRequest $request)
    {
        try {
            $aInput = json_decode($request->getContent(), true);
            $currency = $aInput['currency'] ?? 'usd';
            $amount = $aInput['amount'] ?? 100;
            $priceId = $aInput['price_id'] ?? 'price_1Mzo4IBiXgImlwgFjHmE7TtJ';
            $quantity = $aInput['quantity'] ?? 1;
            
            $session = $this->paymentService->getSession($priceId, $quantity);
            if ($amount < $session->totalPrice / 100) {
                $formatRes = $this->responseErrorWithMsg("輸入金額不足");
                return response($formatRes, 400);
            }
            if ($currency !== $session->currency) {
                $formatRes = $this->responseErrorWithMsg("輸入幣種錯誤");
                return response($formatRes, 400);
            }

            $formatRes = $this->responseSuccessWithData(["url" => $session->paymentUrl]);
            return response($formatRes, 200);

        } catch (\Throwable $e) {
            $formatRes = $this->responseUnknownErrorWithData(['msg' => $e->getMessage()]);
            return response($formatRes, 500);
        }
    }
}