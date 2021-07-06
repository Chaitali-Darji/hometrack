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
                'name' => "Billing",
                'controller' => 'BillingController'
            )
        );

        Module::create(
            array(
                'name' => "Pricing"
            )
        );

        Module::create(
            array(
                'name' => "Clients",
                'controller' => 'ClientController'
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
                'name' => "Settings",
                'controller' => 'SettingController'
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

        Module::create(
            array(
                'name' => "User",
                'controller' => 'UserController'
            )
        );


        Module::create(
            array(
                'name' => "Role",
                'controller' => 'RoleController'
            )
        );


         Module::create(
            array(
                'name' => "Email Template",
                'controller' => 'EmailTemplateController'
            )
        );


          Module::create(
            array(
                'name' => "SMS Template",
                'controller' => 'SMSTemplateController'
            )
        );
    }
}
