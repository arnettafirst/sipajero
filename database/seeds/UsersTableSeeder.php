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
            'id'                => 1,
            'photo'             => 'https://via.placeholder.com/150',
            'firstname'         => 'Admin',
            'lastname'          => 'Sipajero',
            'username'          => 'admins',
            'email'             => 'admin@sipajero.com',
            'password'          => 'a',
            'old_password'      => 'a',
            'is_admin'          => true,
            'remember_token'    => null,
        ]);

        User::create([
            'id'                => 2,
            'photo'             => 'https://via.placeholder.com/150',
            'firstname'         => 'Farmer',
            'lastname'          => 'Sipajero',
            'username'          => 'farmers',
            'email'             => 'farmer@sipajero.com',
            'password'          => 'a',
            'old_password'      => 'a',
            'is_admin'          => false,
            'remember_token'    => null,
        ]);
    }
}
