<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CurrencySetting;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class CurrencyController extends Controller
{
    public function index()
    {
        $settings = CurrencySetting::first();
        
        if (!$settings || !$settings->is_active) {
            return response()->json(['error' => 'Currency service is not available'], 503);
        }

        // Cache the response for 1 hour to reduce API calls
        $rates = Cache::remember('currency_rates', 3600, function () use ($settings) {
            $response = Http::get("https://v6.exchangerate-api.com/v6/{$settings->api_key}/latest/{$settings->base_currency}");
            
            if ($response->successful() && $response->json('result') === 'success') {
                return $response->json('conversion_rates');
            }
            
            return null;
        });

        if (!$rates) {
            return response()->json(['error' => 'Failed to fetch currency rates'], 500);
        }

        return response()->json([
            'base_currency' => $settings->base_currency,
            'rates' => $rates,
            'buy_adjustment' => $settings->buy_rate_adjustment,
            'sell_adjustment' => $settings->sell_rate_adjustment,
            'last_updated' => now()->toDateTimeString()
        ]);
    }

    /**
     * Get specific currency rates with calculated buy/sell values
     */
    public function getRates($currency)
    {
        $settings = CurrencySetting::first();
        
        if (!$settings || !$settings->is_active) {
            return response()->json(['error' => 'Currency service is not available'], 503);
        }

        $rates = Cache::remember("currency_rates_{$currency}", 3600, function () use ($settings, $currency) {
            $response = Http::get("https://v6.exchangerate-api.com/v6/{$settings->api_key}/pair/{$settings->base_currency}/{$currency}");
            
            if ($response->successful() && $response->json('result') === 'success') {
                return [
                    'rate' => $response->json('conversion_rate'),
                    'last_update' => $response->json('time_last_update_unix')
                ];
            }
            
            return null;
        });

        if (!$rates) {
            return response()->json(['error' => 'Failed to fetch currency rate'], 500);
        }

        return response()->json([
            'base_currency' => $settings->base_currency,
            'target_currency' => $currency,
            'rate' => $rates['rate'],
            'buy_rate' => $rates['rate'] * $settings->buy_rate_adjustment,
            'sell_rate' => $rates['rate'] * $settings->sell_rate_adjustment,
            'last_updated' => $rates['last_update']
        ]);
    }

    /**
     * Convert between currencies
     */
    public function convert($from, $to, $amount)
    {
        $settings = CurrencySetting::first();
        
        if (!$settings || !$settings->is_active) {
            return response()->json(['error' => 'Currency service is not available'], 503);
        }

        $cacheKey = "currency_conversion_{$from}_{$to}";
        $rate = Cache::remember($cacheKey, 3600, function () use ($settings, $from, $to) {
            $response = Http::get("https://v6.exchangerate-api.com/v6/{$settings->api_key}/pair/{$from}/{$to}");
            
            if ($response->successful() && $response->json('result') === 'success') {
                return $response->json('conversion_rate');
            }
            
            return null;
        });

        if (!$rate) {
            return response()->json(['error' => 'Failed to fetch conversion rate'], 500);
        }

        $convertedAmount = $amount * $rate;

        return response()->json([
            'from_currency' => $from,
            'to_currency' => $to,
            'amount' => $amount,
            'converted_amount' => $convertedAmount,
            'rate' => $rate,
            'last_updated' => now()->toDateTimeString()
        ]);
    }

    /**
     * Get list of supported currencies
     */
    public function currencies()
    {
        $settings = CurrencySetting::first();
        
        if (!$settings || !$settings->is_active) {
            return response()->json(['error' => 'Currency service is not available'], 503);
        }

        $currencies = Cache::remember('supported_currencies', 86400, function () use ($settings) {
            $response = Http::get("https://v6.exchangerate-api.com/v6/{$settings->api_key}/codes");
            
            if ($response->successful() && $response->json('result') === 'success') {
                return $response->json('supported_codes');
            }
            
            return null;
        });

        if (!$currencies) {
            return response()->json(['error' => 'Failed to fetch supported currencies'], 500);
        }

        return response()->json([
            'currencies' => $currencies,
            'last_updated' => now()->toDateTimeString()
        ]);
    }
}