<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use DB;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            //Admin 
            [
                'name' => 'Admin',
                'username' => 'admin',
                'email' => 'asifjamal251@gmail.com',
                'password' => Hash::make('111'),
                'role' => 'admin',
                'status' => 'active',

            ],
              //Vendor 
            [
                'name' => 'Asif Jamal',
                'username' => 'asifjamal251',
                'email' => 'asif.sanix@gmail.com',
                'password' => Hash::make('111'),
                'role' => 'vendor',
                'status' => 'active',

            ],
              //User OR Customer  
            [
                'name' => 'Mamoon Nasar',
                'username' => 'mamoonnasar',
                'email' => 'mamoon.sanix@gmail.com',
                'password' => Hash::make('111'),
                'role' => 'user',
                'status' => 'active',

            ],


        ]);
    }
}
