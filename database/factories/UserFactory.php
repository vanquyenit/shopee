<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Models\User::class, function (Faker $faker) {
    static $password;
    return [
        'username'       => $faker->name,
        'first_name'     => $faker->name,
        'last_name'      => $faker->name,
        'email'          => $faker->unique()->safeEmail,
        'password'       => $password ?: $password = bcrypt('123qweasd'),
        'avatar'         => 'default.jpg',
        'birthday'       => date('Y-m-d'),
        'gender'         => $faker->boolean,
        'address'        => $faker->address,
        'phone'          => $faker->phoneNumber,
        'provice_id'     => '',
        'active'         => rand(1, 10),
        'role'           => config('setting.role.member'),
        'bio'            => '01263751380',
        'remember_token' => str_random(10),
    ];
});
