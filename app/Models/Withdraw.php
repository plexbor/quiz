<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Withdraw extends Model
{
    protected $fillable = [
        'prize_id',
        'bank_account',
        'amount',
        'status',
    ];

    const STATUS_CREATED = 1;
    const STATUS_COMPLETED = 2;
    const STATUS_CANCELLED = 3;

    public function prize()
    {
        return $this->belongsTo(Prize::class);
    }

    public function completed()
    {
        $this->update(['status' => self::STATUS_COMPLETED]);
    }
}
