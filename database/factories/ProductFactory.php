<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;
use Illuminate\Support\Arr;

$factory->define(Product::class, function (Faker $faker) {
    return [
        "name" => Arr::random([
            "Beaufort","Beaufort Light", "Beaufort tango",
            "33 Export", "Castele Beer", "Castle Milk Stout"
            ,"Amstel","Heineken"
        ]),
        "quantity" => $faker->numberBetween(20,80),
        "price" => $faker->numberBetween(50000,100000),
        "unity" => $faker->randomElement(["bouteille"]),
        "unity_price" =>  $faker->randomElement([
            "100","500","700","1000","1500"]),
        "description" => $faker->text(250),
    ];
});
