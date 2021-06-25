<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(array(
            'name' => "Admin",
            'email' => 'admin@hometrack.com',
            'password' => \Hash::make('Admin@123')
        ));
    }
}