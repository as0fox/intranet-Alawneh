@extends('admin.layouts.app')

@section('title', 'Site Settings')

@section('content')
<div class="bg-white rounded shadow p-6">
    <h2 class="text-xl font-semibold mb-6">Site Settings</h2>
    
    <form method="POST" action="{{ route('admin.settings.update') }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Company Info -->
            <div class="space-y-4">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Company Information</h3>
                
                <div>
                    <label for="company_name" class="block font-medium text-sm text-gray-700">Company Name</label>
                    <input id="company_name" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full" type="text" name="company_name" value="{{ old('company_name', $settings->company_name) }}" required />
                </div>
                
                <div>
                    <label for="company_address" class="block font-medium text-sm text-gray-700">Company Address</label>
                    <textarea id="company_address" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full" name="company_address">{{ old('company_address', $settings->company_address) }}</textarea>
                </div>
                
                <div>
                    <label for="company_phone" class="block font-medium text-sm text-gray-700">Company Phone</label>
                    <input id="company_phone" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full" type="text" name="company_phone" value="{{ old('company_phone', $settings->company_phone) }}" />
                </div>
                
                <div>
                    <label for="company_email" class="block font-medium text-sm text-gray-700">Company Email</label>
                    <input id="company_email" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full" type="email" name="company_email" value="{{ old('company_email', $settings->company_email) }}" />
                </div>
            </div>
            
            <!-- Colors -->
            <div class="space-y-4">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Color Scheme</h3>
                
                <div>
                    <label for="primary_color" class="block font-medium text-sm text-gray-700">Primary Color</label>
                    <div class="flex items-center mt-1">
                        <input id="primary_color" class="w-24 h-10" type="color" name="primary_color" value="{{ old('primary_color', $settings->primary_color) }}" required />
                        <span class="ml-2">{{ old('primary_color', $settings->primary_color) }}</span>
                    </div>
                </div>
                
                <div>
                    <label for="secondary_color" class="block font-medium text-sm text-gray-700">Secondary Color</label>
                    <div class="flex items-center mt-1">
                        <input id="secondary_color" class="w-24 h-10" type="color" name="secondary_color" value="{{ old('secondary_color', $settings->secondary_color) }}" required />
                        <span class="ml-2">{{ old('secondary_color', $settings->secondary_color) }}</span>
                    </div>
                </div>
                
                <div>
                    <label for="accent_color" class="block font-medium text-sm text-gray-700">Accent Color</label>
                    <div class="flex items-center mt-1">
                        <input id="accent_color" class="w-24 h-10" type="color" name="accent_color" value="{{ old('accent_color', $settings->accent_color) }}" required />
                        <span class="ml-2">{{ old('accent_color', $settings->accent_color) }}</span>
                    </div>
                </div>
                
                <div>
                    <label for="light_color" class="block font-medium text-sm text-gray-700">Light Color</label>
                    <div class="flex items-center mt-1">
                        <input id="light_color" class="w-24 h-10" type="color" name="light_color" value="{{ old('light_color', $settings->light_color) }}" required />
                        <span class="ml-2">{{ old('light_color', $settings->light_color) }}</span>
                    </div>
                </div>
            </div>
            
            <!-- Images -->
            <div class="space-y-4">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Images</h3>
                
                <div>
                    <label for="logo" class="block font-medium text-sm text-gray-700">Logo</label>
                    @if($settings->logo)
                        <div class="mt-2 mb-4">
                            <img src="{{ ('/'.$settings->logo) }}" alt="Current Logo" class="h-20">
                        </div>
                    @endif
                    <input id="logo" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full" type="file" name="logo" />
                </div>
                
                <div>
                    <label for="favicon" class="block font-medium text-sm text-gray-700">Favicon</label>
                    @if($settings->favicon)
                        <div class="mt-2 mb-4">
                            <img src="{{ ('/'.$settings->favicon) }}" alt="Current Favicon" class="h-10">
                        </div>
                    @endif
                    <input id="favicon" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full" type="file" name="favicon" />
                </div>
            </div>
        </div>
        
        <div class="flex justify-end mt-8">
            <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-700 focus:outline-none focus:border-indigo-700 focus:ring focus:ring-indigo-200 disabled:opacity-25 transition">
                Save Settings
            </button>
        </div>
    </form>
</div>
@endsection