<?php

namespace App\Services\Prize;

use App\Models\Prize;

class Repository
{
    public function getAll()
    {
        return Prize::forUser()->orderBy('id', 'desc')->get();
    }
}
