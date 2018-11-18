<?php

namespace App\Services\Prize;

use App\Models\Prize;

class Repository
{
    public function getAll()
    {
        return Prize::forUser()->with('type', 'action')->orderBy('id', 'desc')->get();
    }
}
