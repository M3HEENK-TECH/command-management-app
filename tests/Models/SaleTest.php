<?php

namespace Tests\Models;

use App\Models\Product;
use App\Models\Sale;
use App\Models\User;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class SaleTest extends TestCase
{

    protected function setUp() : void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        Artisan::call("migrate:fresh");
        $user = factory(User::class)->create();
        \auth()->loginUsingId($user->id);
    }

    public function testInsertSaleFromSession()
    {

        $session_data = [];
        $product = factory(Product::class)->create([
            "quantity" => 30
        ]);
        for($i=0;$i<3;$i++){
            $session_data[] = [
                "product" => $product,
                "quantity" => 9,
                "product_id" => $product->id,
            ];
        }
        session()->put(Sale::CARD_SESSION_KEY,$session_data);
        Sale::insertSaleFromSession();
        $product = Product::query()->where("id",$product->id)->first();
        $this->assertEmpty(session()->get(Sale::CARD_SESSION_KEY));
        $this->assertEquals($product->quantity,3);
    }

    public function testInsertSaleFromSessionWhereQuantityInvalid()
    {

        $session_data = [];
        $product = factory(Product::class)->create([
            "quantity" => 30
        ]);
        for($i=0;$i<3;$i++){
            $session_data[] = [
                "product" => $product,
                "quantity" => 11,
                "product_id" => $product->id,
            ];
        }
        session()->put(Sale::CARD_SESSION_KEY,$session_data);
        Sale::insertSaleFromSession();
        $product = Product::query()->where("id",$product->id)->first();
        $this->assertEmpty(session()->get(Sale::CARD_SESSION_KEY));
        $this->assertEquals($product->quantity,30);
    }



}
