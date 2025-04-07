<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CurrencySetting;
use Illuminate\Http\Request;

class CurrencySettingController extends Controller
{
    public function index()
    {
        $setting = CurrencySetting::first();
        return view('admin.currency_settings.index', compact('setting'));
    }

    public function edit(CurrencySetting $currencySetting)
    {
        return view('admin.currency_settings.edit', compact('currencySetting'));
    }

    public function update(Request $request, CurrencySetting $currencySetting)
    {
        $request->validate([
            'api_key' => 'required|string',
            'base_currency' => 'required|string|size:3',
            'buy_rate_adjustment' => 'required|numeric|min:0.9|max:1.1',
            'sell_rate_adjustment' => 'required|numeric|min:0.9|max:1.1',
        ]);

        $currencySetting->update([
            'api_key' => $request->api_key,
            'base_currency' => strtoupper($request->base_currency),
            'buy_rate_adjustment' => $request->buy_rate_adjustment,
            'sell_rate_adjustment' => $request->sell_rate_adjustment,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('admin.currency-settings.index')->with('success', 'Currency settings updated successfully.');
    }
}