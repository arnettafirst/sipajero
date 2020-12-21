<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'role'              => 1,
            'firstname'         => 'Admin',
            'lastname'          => 'Sipajero',
            'username'          => 'admins',
            'email'             => 'admin@sipajero.com',
            'password'          => 'abcdefgh',
            'old_password'      => 'abcdefgh',
            'remember_token'    => null,
        ]);

        User::create([
            'role'              => 2,
            'firstname'         => 'Farmer',
            'lastname'          => 'Sipajero',
            'username'          => 'farmers',
            'email'             => 'farmer@sipajero.com',
            'password'          => 'abcdefgh',
            'old_password'      => 'abcdefgh',
            'remember_token'    => null,
        ]);
    }
}
