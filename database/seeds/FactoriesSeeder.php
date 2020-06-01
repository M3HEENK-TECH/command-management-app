<?php

use App\Models\Product;
use App\Models\provider;
use App\Models\Sale;
use App\Models\Supply;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class FactoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        //Seeding des produits avec les item liés
        factory(Product::class, 80)
            ->create([
                "quantity" => 60
            ])
            ->each(function (Product $product) {
                //Seeding des Tables dependant des produits
                factory(Supply::class, 4)->create([
                    "provider_id" => factory(provider::class)->create()->id,
                    'product_id' => $product->id,
                ]);
                $product->update(['quantity' => $product->quantity + 10]);
                factory(Sale::class, Arr::random([1,10,40]) )->create([
                    'user_id' => factory(User::class)->create(["role" => "cashier"])->id,
                    'product_id' => $product->id,
                    "quantity" => 10,
                    "created_at" => now()
                ]);
            });
    }
}
