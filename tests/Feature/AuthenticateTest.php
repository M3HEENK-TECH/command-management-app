<?php


namespace Tests\Feature;


use App\Models\User;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Session;
use Tests\TestCase;

class AuthenticateTest extends TestCase
{

    public function setUp() : void {
        parent::setUp();
        Artisan::call("migrate"); // Migration de la base de donnees
    }

    /**
     * Test de la connexion en tant qu'admin
     */
    public function testAdminLogin(){
        $user = factory(User::class)->create(['role' => "admin"]);
        $credentials = [
            'email' => $user->email,
            'password' => "password",
        ];
        $response = $this->post( route("login"), $credentials );
        $this->assertAuthenticated();
        $response->assertRedirect(route("home.admin"));
        $response->assertStatus(302);
    }

    /**
     * Test de la connexion en tant que caissier
     */
    public function testCashierLogin(){
        $user = factory(User::class)->create(['role' => "cashier"]);
        $credentials = [
            'email' => $user->email,
            'password' => "password",
        ];
        $response = $this->post( route("login"), $credentials );
        $this->assertAuthenticated();
        $response->assertRedirect(route("home.cashier"));
        $response->assertStatus(302);
    }



}
