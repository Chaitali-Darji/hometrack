<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SMSTemplate;

class SMSTemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SMSTemplate::create(array(
            'template_type' => 'GALLERY-INVITE',
            'body' => "Hi there .Your media for {address} is ready to view! Click here to access"
        ));
    }
}
