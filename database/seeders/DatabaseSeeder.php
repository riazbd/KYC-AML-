<?php

namespace Database\Seeders;

use App\Models\Applicant;
use App\Models\KycLevel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

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
            'id_types' => ['National Id', 'Passport']
        ]);

        // Applicant::factory()->create([
        //     'user_id' => 1,
        //     'level_name' => 'basic-kyc',
        //     'id_types' => ['National Id, Passport']
        // ]);
    }
}
