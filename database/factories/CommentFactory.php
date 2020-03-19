<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Company;
use App\Models\Comment;
use Faker\Generator as Faker;
use Illuminate\Support\Str;



$factory->define(Comment::class, function (Faker $faker) {
    return [
        'body' => $faker->text(),
        'company_id' => factory('App\Models\Company')->create()->id,
        'comment_company_id' => factory('App\Models\Company')->create()->id,
    ];
});
