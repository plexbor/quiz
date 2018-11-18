<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Http\Resources\PrizeResource;

use App\Models\Prize;

use Prize as PrizeService;

class PrizeController extends Controller
{
    public function list()
    {
        $prizes = PrizeService::list();

        return PrizeResource::collection($prizes);
    }

    public function create()
    {
        $prize = PrizeService::create()->load('type', 'action');

        return new PrizeResource($prize);
    }

    public function confirm(Prize $prize)
    {
        $prize = PrizeService::confirm($prize);

        return new PrizeResource($prize);
    }

    public function convert(Prize $prize)
    {
        $prize = PrizeService::convert($prize);

        return new PrizeResource($prize);
    }

    public function decline(Prize $prize)
    {
        $prize = PrizeService::decline($prize);

        return new PrizeResource($prize);
    }
}
