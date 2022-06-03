<?php

namespace Database\Seeders;

use App\Models\AccountDetail;
use App\Models\Applicant;
use App\Models\KycLevel;
use App\Models\TwilioIntegration;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\UserProfile;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@mail.com',
            'password' => Hash::make('123456')
        ]);

        KycLevel::factory()->create([
            'user_id' => 1,
            'level_name' => 'basic-kyc',
            'id_types' => ['NID', 'Passport']
        ]);

        UserProfile::factory()->create([
            'user_id' => 1,
        ]);

        AccountDetail::factory()->create([
            'user_id' => 1,
            'legal_mail' => 'admin@mail.com',
        ]);

        TwilioIntegration::factory()->create([
            'user_id' => 1,
            'sid' => '',
            'auth_token' => '',
            'from_number' => '',
        ]);

        // Applicant::factory()->create([
        //     'user_id' => 1,
        //     'level_name' => 'basic-kyc',
        //     'id_types' => ['National Id, Passport']
        // ]);
    }
}
