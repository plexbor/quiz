<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use Prize;

class PrizeController extends Controller
{
    public function create()
    {
        $prize = Prize::create();
    }
}
