<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::create([
            'web_name' => 'Starter Kit Laravel',
            'web_url' => 'https://starterkitlaravel.com',
            'web_email' => 'info@starterkitlaravel.com',
            'web_email_noreply' => 'noreply@starterkitlaravel.com',
            'web_telp' => '081234567890',
            'web_desc' => 'Starter Kit Laravel',
        ]);
    }
}
