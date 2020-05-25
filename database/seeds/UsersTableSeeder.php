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
            'name' => 'David Delgado',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('5207'), // secret
            'dni' => '5207368177',
            'address' => '',
            'phone' => '',
            'role' => 'admin',
        ]);
        User::create([
            'name' => 'Taquillero1',
            'email' => 'taquilla@gmail.com',
            'password' => bcrypt('5207'), // secret
            'dni' => '5207368177',
            'address' => '',
            'phone' => '',
            'role' => 'taquilla',
        ]);
        User::create([
            'name' => 'Dulceria1',
            'email' => 'dulceria@gmail.com',
            'password' => bcrypt('5207'), // secret
            'dni' => '5207368177',
            'address' => '',
            'phone' => '',
            'role' => 'dulceria',
        ]);
        factory(App\User::class, 50)->create();
    }
}
