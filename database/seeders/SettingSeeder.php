<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::create(['key' => 'app_name', 'value' => 'CRM Application']);
        Setting::create(['key' => 'support_email', 'value' => 'support@crmapp.com']);
        Setting::create(['key' => 'default_language', 'value' => 'en']);
        Setting::create(['key' => 'timezone', 'value' => 'UTC']);
    }
}
