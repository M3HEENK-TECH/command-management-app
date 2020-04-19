<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table("users")->insert([
            'name'=>"admin",
            'email'=>"admin@gmail.com",
            'password' => bcrypt("password"),
            "profile_image" => null,
            "role" => "admin",
            "created_at" => now()
        ]);

        \Illuminate\Support\Facades\DB::table("users")->insert([
            'name'=> "stevy",
            'email'=> "stevy@gmail.com",
            'password' => bcrypt("password"),
            "profile_image" => null,
            "role" => "cashier",
            "created_at" => now()
        ]);
    }
}
