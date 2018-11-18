<?php

namespace App\Services\Prize;

use Illuminate\Support\Collection;

use App\Models\Prize;

class Repository
{
    public function getAll(): Collection
    {
        return Prize::forUser()->with('type', 'action')->orderBy('id', 'desc')->get();
    }
}
