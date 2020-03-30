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
            "role" => "admin"
        ]);
    }
}
