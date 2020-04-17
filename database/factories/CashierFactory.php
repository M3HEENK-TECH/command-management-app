<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->userName,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => bcrypt("password"),
        'remember_token' => Str::random(10),
        'profile_image' => 'D:\Medias\Mes Logos\2.jpg',
        'role' => 'cashier',
    ];
});
