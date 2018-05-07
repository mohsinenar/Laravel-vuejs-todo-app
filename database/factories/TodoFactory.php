<?php

use Faker\Generator as Faker;

$factory->define(App\todo::class, function (Faker $faker) {
    return [
        'title'=> $faker->name,
        'text'=> $faker->text,
        'category_id'=> $faker->numberBetween(1,12),
        'timetodo'=> $faker->dateTime('now',null),
        'isdone'=> $faker->boolean(50),

    ];
});
