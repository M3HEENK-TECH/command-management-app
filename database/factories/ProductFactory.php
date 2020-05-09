<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\product;
use Faker\Generator as Faker;

$factory->define(product::class, function (Faker $faker) {
    return [
        "name" => $faker->name,
        "quantity" => $faker->numberBetween(20,80),
        "price" => $faker->numberBetween(50000,100000),
        "unity" => $faker->randomElement(["bouteille","sac","casier"]),
        "unity_price" =>  $faker->randomElement([
            "100","500","700","1000","1500"]),
        "description" => $faker->text(250),
    ];
});
