@extends('admin.layouts.app')

@section('title', 'Edit Currency Settings')

@section('content')
<div class="bg-white rounded shadow p-6">
    <h2 class="text-xl font-semibold mb-6">Edit Currency Settings</h2>
    
    <form method="POST" action="{{ route('admin.currency-settings.update', $currencySetting) }}">
        @csrf
        @method('PUT')
        
        <div class="grid grid-cols-1 gap-6">
            <div>
                <label for="api_key" class="block text-sm font-medium text-gray-700 mb-1">API Key</label>
                <input type="text" id="api_key" name="api_key" value="{{ old('api_key', $currencySetting->api_key) }}"
                       class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                       required>
                <p class="mt-1 text-sm text-gray-500">Your ExchangeRate-API key</p>
            </div>
            
            <div>
                <label for="base_currency" class="block text-sm font-medium text-gray-700 mb-1">Base Currency</label>
                <input type="text" id="base_currency" name="base_currency" value="{{ old('base_currency', $currencySetting->base_currency) }}"
                       class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                       required maxlength="3">
                <p class="mt-1 text-sm text-gray-500">3-letter currency code (e.g. USD)</p>
            </div>
            
            <div>
                <label for="buy_rate_adjustment" class="block text-sm font-medium text-gray-700 mb-1">Buy Rate Adjustment</label>
                <input type="number" step="0.001" id="buy_rate_adjustment" name="buy_rate_adjustment" 
                       value="{{ old('buy_rate_adjustment', $currencySetting->buy_rate_adjustment) }}"
                       class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                       required>
                <p class="mt-1 text-sm text-gray-500">Multiplier for buy rates (e.g. 0.995 for 0.5% reduction)</p>
            </div>
            
            <div>
                <label for="sell_rate_adjustment" class="block text-sm font-medium text-gray-700 mb-1">Sell Rate Adjustment</label>
                <input type="number" step="0.001" id="sell_rate_adjustment" name="sell_rate_adjustment" 
                       value="{{ old('sell_rate_adjustment', $currencySetting->sell_rate_adjustment) }}"
                       class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                       required>
                <p class="mt-1 text-sm text-gray-500">Multiplier for sell rates (e.g. 1.005 for 0.5% increase)</p>
            </div>
            
            <div class="flex items-center">
                <input type="checkbox" id="is_active" name="is_active" 
                       class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                       {{ old('is_active', $currencySetting->is_active) ? 'checked' : '' }}>
                <label for="is_active" class="ml-2 text-sm text-gray-700">Enable Currency Service</label>
            </div>
        </div>
        
        <div class="flex justify-end mt-6">
            <a href="{{ route('admin.currency-settings.index') }}" 
               class="px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 mr-3">
                Cancel
            </a>
            <button type="submit" 
                    class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Save Settings
            </button>
        </div>
    </form>
</div>
@endsection