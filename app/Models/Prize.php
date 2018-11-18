<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Auth;

class Prize extends Model
{
    protected $fillable = [
        'user_id',
        'prize_type_id',
        'value',
        'status',
    ];

    const STATUS_CREATED = 1;
    const STATUS_CONFIRMED = 2;

    const STATUSES = [
        self::STATUS_CREATED => 'Создан',
        self::STATUS_CONFIRMED => 'Подтверждён',
    ];

    public function type()
    {
        return $this->belongsTo(PrizeType::class, 'prize_type_id', 'id');
    }

    public function action()
    {
        return $this->hasMany(PrizeAction::class);
    }

    public function getStatusAttribute($value)
    {
        return self::STATUSES[$value];
    }

    public function scopeForUser($query)
    {
        $query->where('user_id', Auth::id());
    }

    public function confirmed()
    {
        $this->update(['status' => self::STATUS_CONFIRMED]);
    }
}
