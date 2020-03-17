<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Position;
use Faker\Generator as Faker;
use Illuminate\Support\Str;



$factory->define(Position::class, function (Faker $faker) {
    return [
        'position_name' => $faker->word,
        
    ];
});
