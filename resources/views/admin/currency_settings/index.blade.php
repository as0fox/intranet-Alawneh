@extends('admin.layouts.app')

@section('title', 'Currency Settings')

@section('content')
<div class="bg-white rounded shadow p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-semibold">Currency Exchange Settings</h2>
        <a href="{{ route('admin.currency-settings.edit', $setting) }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-700 focus:outline-none focus:border-indigo-700 focus:ring focus:ring-indigo-200 disabled:opacity-25 transition">
            <i class="fas fa-edit mr-2"></i> Edit Settings
        </a>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="bg-gray-50 p-6 rounded-lg">
            <h3 class="text-lg font-medium text-gray-900 mb-4">API Configuration</h3>
            
            <div class="space-y-4">
                <div>
                    <span class="block text-sm font-medium text-gray-500">API Status</span>
                    <span class="mt-1 font-medium {{ $setting->is_active ? 'text-green-600' : 'text-red-600' }}">
                        {{ $setting->is_active ? 'Active' : 'Inactive' }}
                    </span>
                </div>
                
                <div>
                    <span class="block text-sm font-medium text-gray-500">Base Currency</span>
                    <span class="mt-1 font-medium">{{ $setting->base_currency }}</span>
                </div>
                
                <div>
                    <span class="block text-sm font-medium text-gray-500">API Key</span>
                    <span class="mt-1 font-mono">{{ Str::mask($setting->api_key, '*', 4) }}</span>
                </div>
            </div>
        </div>
        
        <div class="bg-gray-50 p-6 rounded-lg">
            <h3 class="text-lg font-medium text-gray-900 mb-4">Rate Adjustments</h3>
            
            <div class="space-y-4">
                <div>
                    <span class="block text-sm font-medium text-gray-500">Buy Rate Adjustment</span>
                    <span class="mt-1 font-medium">{{ $setting->buy_rate_adjustment }}</span>
                </div>
                
                <div>
                    <span class="block text-sm font-medium text-gray-500">Sell Rate Adjustment</span>
                    <span class="mt-1 font-medium">{{ $setting->sell_rate_adjustment }}</span>
                </div>
                
                <div>
                    <span class="block text-sm font-medium text-gray-500">Last Updated</span>
                    <span class="mt-1 font-medium">{{ $setting->updated_at->format('M d, Y H:i') }}</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection