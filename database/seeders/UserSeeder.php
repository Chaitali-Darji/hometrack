<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Module;
use App\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create(array(
            'name' => "Admin",
            'email' => 'admin@hometrack.com',
            'password' => 'Admin@123'
        ));

        $user->roles()->sync([1]);

        $modules = Module::all();

        $role = Role::find(1);

        foreach ($modules as $key => $value) {
            $role->modules()->sync([$value->id]);
        }
    }
}