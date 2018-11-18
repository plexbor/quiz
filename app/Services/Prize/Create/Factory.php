<?php

namespace App\Services\Prize\Create;

use App\Models\Prize;

use Auth;

class Factory
{
    public function create(array $data): Prize
    {
        return Prize::create([
            'user_id'       => Auth::id(),
            'prize_type_id' => $data['prizeType']->id,
            'value'         => $data['value'],
            'status'        => Prize::STATUS_CREATED,
        ]);
    }
}
