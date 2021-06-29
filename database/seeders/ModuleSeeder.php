<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Module;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Module::create(
            array(
                'name' => "Billing"
            )
        );

        Module::create(
            array(
                'name' => "Pricing"
            )
        );

        Module::create(
            array(
                'name' => "Clients"
            )
        );

        Module::create(
            array(
                'name' => "Properties"
            )
        );

        Module::create(
            array(
                'name' => "Service Requests"
            )
        );

        Module::create(
            array(
                'name' => "Photos"
            )
        );

        Module::create(
            array(
                'name' => "Products"
            )
        );

        Module::create(
            array(
                'name' => "Settings"
            )
        );

        Module::create(
            array(
                'name' => "Sales"
            )
        );

        Module::create(
            array(
                'name' => "Reports"
            )
        );
    }
}
