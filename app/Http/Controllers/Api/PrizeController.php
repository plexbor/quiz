<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Models\Prize;

use Prize as PrizeService;

class PrizeController extends Controller
{
    public function list()
    {
        return PrizeService::list();
    }

    public function create()
    {
        return PrizeService::create();
    }

    public function confirm(Prize $prize)
    {
        return PrizeService::confirm($prize);
    }

    public function convert(Prize $prize)
    {
        return PrizeService::convert($prize);
    }

    public function decline(Prize $prize)
    {
        return PrizeService::decline($prize);
    }
}
