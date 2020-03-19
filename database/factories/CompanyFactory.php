<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Company;
use App\Models\Employe;
use App\Models\Position;
use Faker\Generator as Faker;
use Illuminate\Support\Str;



$factory->define(Company::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'website' => $faker->email,
        'adress' => $faker->address,
        'password' => Hash::make('password'),
        
    ];
});

// $factory->defineAs(Employe::class, function (Faker $faker) {
//     return [
//     	'name' => $faker->name,
//         'email' => $faker->unique()->safeEmail,
//         'phone' => $faker->phoneNumber,
//         'salary' => $faker->randomNumber,
//         'company_id' => factory('App\Models\Company')->create()->id,
//         'position_id' => factory('App\Models\Position')->create()->id,
//     ]; 
// });

// $factory->defineAs(Position::class, function (Faker $faker) {
// 	return [
//         'position_name' => $faker->word,
//         'company_id' => factory('App\Models\Company')->create()->id,
//     ];

// });