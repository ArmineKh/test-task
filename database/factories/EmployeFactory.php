<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Employe;
use App\Models\Company;
use App\Models\Position;
use Faker\Generator as Faker;
use Illuminate\Support\Str;



$factory->define(Employe::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'surname' => $faker->lastname,
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->phoneNumber,
        'salary' => $faker->randomNumber,
        'company_id' => factory('App\Models\Company')->create()->id,
        'position_id' => factory('App\Models\Position')->create()->id,

        
    ];
});
