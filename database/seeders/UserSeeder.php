<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin Socatoles',
            'email' => 'nphisco@gmail.com',
            'usertype'=>'admin',
            'slug'=>'Admin Socatoles',
            'password' =>Hash::make('pass1234567890'),
        ]);

    }
}
