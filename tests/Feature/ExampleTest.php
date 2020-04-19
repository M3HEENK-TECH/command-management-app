<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Session;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Str;

use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{

    public function setUp() : void {
        parent::setUp();
        Artisan::call("migrate"); // Migration de la base de donnees
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $user = factory(User::class)->create(['role' => 'admin']);
       // $cashier = factory(User::class)->create(['role'=>'cashier']);
        $response = $this->actingAs($user)->get('/cashiers');
        $response->assertStatus(200);
    }

}
