<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, HasMany};

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
    const STATUS_DECLINED = 3;
    const STATUS_CONVERTED = 4;

    const STATUSES = [
        self::STATUS_CREATED => 'Создан',
        self::STATUS_CONFIRMED => 'Подтверждён',
        self::STATUS_DECLINED => 'Отказан',
        self::STATUS_CONVERTED => 'Конвертирован',
    ];

    public function type(): BelongsTo
    {
        return $this->belongsTo(PrizeType::class, 'prize_type_id', 'id');
    }

    public function action(): HasMany
    {
        return $this->hasMany(PrizeAction::class);
    }

    public function getStatusAttribute(int $value): string
    {
        return self::STATUSES[$value];
    }

    public function scopeForUser(EloquentBuilder $query): void
    {
        $query->where('user_id', Auth::id());
    }

    public function confirmed(): void
    {
        $this->update(['status' => self::STATUS_CONFIRMED]);
    }

    public function declined(): void
    {
        $this->update(['status' => self::STATUS_DECLINED]);
    }
}
