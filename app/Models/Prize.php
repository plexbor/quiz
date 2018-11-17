<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prize extends Model
{
    protected $fillable = [
        'user_id',
        'prize_type_id',
        'value',
        'status',
    ];

    const STATUS_CREATED = 1;

    const STATUSES = [
        self::STATUS_CREATED => 'Создан',
    ];

    public function type()
    {
        return $this->belongsTo(PrizeType::class, 'prize_type_id', 'id');
    }

    public function getStatusAttribute($value)
    {
        return self::STATUSES[$value];
    }
}
