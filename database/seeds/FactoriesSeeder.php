<?php

use Illuminate\Database\Seeder;

class FactoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //Seeding des caissiers
        $cashiers = factory(\App\Models\User::class,4)->create();

        //Seeding des produits
        factory(\App\Models\Product::class,4)
            ->create()
            ->each(function (\App\Models\Product $product){
            //Seeding des Tables dependant des produits
            $product->supplies()
                ->saveMany(
                        factory(\App\Models\Supply::class,4)->make([
                            "provider_id" => factory(\App\Models\provider::class)
                                            ->create()
                                            ->id
                         ])
            );

            $product->sales()->saveMany(
                factory(\App\Models\Sale::class,4)->make()
            );
        });
    }
}
