<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Faker\Generator as Faker;


class CashierTest extends TestCase
{

    public function setUp() : void {
        parent::setUp();
        Artisan::call("migrate"); // Migration de la base de donnees
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_a_user_can_see_all_cashier()
    {
        $user = factory(User::class)->create(['role' => 'admin']);
        $response = $this->actingAs($user)->get('cashiers');
        $response->assertStatus(200);
    }


    public function test_a_user_can_create_a_cashier()
    {
        $this->withoutMiddleware();
        $cashier = factory(User::class)->create(['role'=>'cashier']);
       $response = $this->post('cashiers', $cashier->toArray());
        $response->assertStatus(302);

    }

    public function test_a_user_can_update_a_cashier()
    {
        $this->withoutMiddleware();
        $cashier = array(
            'id' => 11,
            'name' => 'simon',
            'email' =>'daniel@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt("password"),
            'remember_token' => Str::random(10),
            'profile_image' => 'D:\Medias\Mes Logos\2.jpg',
            'role' => 'cashier',
        );

        $cashier['name'] = "daniel";

        $data = factory(\App\Models\User::class)->create([
            'role' => 'cashier',
        ])->toArray();

        $response =  $this->put('cashiers/'.$cashier['id'], $data); // your route to update article
        //The article should be updated in the database.
        $response->assertStatus(302);


    }

    public function test_a_user_can_delete_a_cashier()
    {
         $this->withoutMiddleware();

        $data = factory(\App\Models\User::class)->create([
            'role' => 'cashier',
        ])->toArray();

        $response =  $this->delete('cashiers/'.$data['id'], $data); // your route to update article
        //The article should be updated in the database.
        $response->assertStatus(302);
    }
}
