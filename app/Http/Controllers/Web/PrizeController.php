<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

class PrizeController extends Controller
{
    public function index()
    {
        return view('prize.index');
    }
}
