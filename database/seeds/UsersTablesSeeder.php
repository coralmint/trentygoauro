<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;

class UsersTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'    => 'Admin',
            'email'    => 'admin@coralmint.in',
            'password'   =>  Hash::make('654321'),
            'remember_token' =>  str_random(10),
        ]);
    }
}
