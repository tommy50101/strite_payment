<?php

namespace App\Http\Controllers;

use Config;
use Illuminate\Http\Response;

trait ApiResponseTrait
{
    public function responseSuccessWithData(array $data)
    {
        return [
            'status' => 0,
            'data' => $data,
        ];
    }

    public function responseErrorWithMsg(string $msg)
    {
        return [
            'status' => 1,
            'msg' => $msg,
        ];
    }

    public function responseUnknownErrorWithData(array $data)
    {
        return [
            'status' => 9,
            'data' => $data,
        ];
    }
}
