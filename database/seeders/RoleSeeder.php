<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(
            array(
                'name' => "Admin"
            )
        );

        Role::create(
            array(
                'name' => "Editor"
            )
        );

        Role::create(
            array(
                'name' => "Photographer"
            )
        );

        Role::create(
            array(
                'name' => "Sales Representative"
            )
        );

        Role::create(
            array(
                'name' => "Lead Photographer"
            )
        );

        Role::create(
            array(
                'name' => "Editing"
            )
        );

    }
}
