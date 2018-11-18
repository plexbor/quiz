<?php

use Faker\Generator as Faker;

use App\Models\{User, Prize, PrizeType};

$factory->define(Prize::class, function (Faker $faker) {
    return [
        'user_id'       => factory(User::class)->create()->id,
        'prize_type_id' => PrizeType::getRandom()->id,
        'value'         => rand(100, 1000),
        'status'        => Prize::STATUS_CREATED,
    ];
});
