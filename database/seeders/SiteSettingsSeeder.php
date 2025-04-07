<?php
namespace Database\Seeders;

use App\Models\SiteSetting;
use Illuminate\Database\Seeder;

class SiteSettingsSeeder extends Seeder
{
    public function run()
    {
        SiteSetting::create([
            'company_name' => 'Alawneh Exchange',
            'primary_color' => '#0D2F5F',
            'secondary_color' => '#14A0E9',
            'accent_color' => '#FFA8A8',
            'light_color' => '#F5F5F5',
            'company_address' => 'Amman Down Town, Next to Al-Husseini Mosque, Alhashimi St, عمّان، Jordan',
            'company_phone' => '+962 6 123 4567',
            'company_email' => 'info@alawnehex.com',
        ]);
    }
}