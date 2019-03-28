<?php

use Illuminate\Database\Seeder;
use App\User;

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
        	'name' => 'jose',
        	'email' => 'admin@admin.com',
        	'password' => bcrypt('qweqwe'),
        ]);
        User::create([
            'name' => 'josias',
            'email' => 'josias@admin.com',
            'password' => bcrypt('qweqwe'),
        ]);
    }
}
