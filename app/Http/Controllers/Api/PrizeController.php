<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Http\Resources\PrizeResource;

use Prize;

class PrizeController extends Controller
{
    public function create()
    {
        $prize = Prize::create()->load('type');

        return new PrizeResource($prize);
    }
}
