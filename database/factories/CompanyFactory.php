<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Company;
use Faker\Generator as Faker;
use Illuminate\Support\Str;



$factory->define(Company::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'website' => $faker->email,
        'adress' => $faker->address,
        
    ];
});
