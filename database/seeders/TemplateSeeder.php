<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Template;

class TemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Template::create(array(
            'name' => "Reset Password",
            'subject' => 'Reset Password',
            'description' => 'Reset Password for Admin',
            'body' => "Hi [user-name],

            You are receiving this email because we received a password reset request for your account.

            [reset-password-link]
            This password reset link will expire in 60 minutes.

            If you did not request a password reset, no further action is required."
        ));
    }
}
