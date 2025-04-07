<?php
namespace Database\Seeders;

use App\Models\CurrencySetting;
use Illuminate\Database\Seeder;

class CurrencySettingsSeeder extends Seeder
{
    public function run()
    {
        CurrencySetting::create([
            'api_key' => '7a14454193fbecdcd4abc6d6', // This is a sample key, replace with your actual key
            'base_currency' => 'USD',
            'buy_rate_adjustment' => 0.995,
            'sell_rate_adjustment' => 1.005,
            'is_active' => true,
        ]);
    }
}