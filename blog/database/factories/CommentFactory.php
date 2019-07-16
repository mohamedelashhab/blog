<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'body' => $faker->text(),
        'post_id' => rand(1, 25),
        'user_id' => rand(1, 5),
    ];
});
