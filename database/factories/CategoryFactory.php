<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(App\Models\Category::class, function (Faker $faker) {
    return [
        'title'       => $faker->name,
        'parent_id'   => null,
        'sort'        => rand(1, 10),
        'active'      => rand(1, 3),
    ];
});
