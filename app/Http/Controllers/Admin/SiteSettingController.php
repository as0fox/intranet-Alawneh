<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SiteSettingController extends Controller
{
    public function edit()
    {
        $settings = SiteSetting::first();
        return view('admin.settings.edit', compact('settings'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'company_name' => 'required|string|max:255',
            'primary_color' => 'required|string|max:255',
            'secondary_color' => 'required|string|max:255',
            'accent_color' => 'required|string|max:255',
            'light_color' => 'required|string|max:255',
            'company_address' => 'nullable|string',
            'company_phone' => 'nullable|string',
            'company_email' => 'nullable|email',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'favicon' => 'nullable|image|mimes:jpeg,png,jpg,gif,ico|max:1024',
        ]);

        $settings = SiteSetting::firstOrNew();

        // Ensure the directory exists
        if (!File::exists(public_path('assets/settings'))) {
            File::makeDirectory(public_path('assets/settings'), 0755, true);
        }

        // Handle logo upload
        if ($request->hasFile('logo')) {
            // Delete old logo if exists
            if ($settings->logo && file_exists(public_path($settings->logo))) {
                unlink(public_path($settings->logo));
            }
            
            $logoName = 'logo-'.time().'.'.$request->logo->extension();
            $request->logo->move(public_path('assets/settings'), $logoName);
            $settings->logo = 'assets/settings/'.$logoName;
        }

        // Handle favicon upload
        if ($request->hasFile('favicon')) {
            // Delete old favicon if exists
            if ($settings->favicon && file_exists(public_path($settings->favicon))) {
                unlink(public_path($settings->favicon));
            }
            
            $faviconName = 'favicon-'.time().'.'.$request->favicon->extension();
            $request->favicon->move(public_path('assets/settings'), $faviconName);
            $settings->favicon = 'assets/settings/'.$faviconName;
        }

        $settings->company_name = $request->company_name;
        $settings->primary_color = $request->primary_color;
        $settings->secondary_color = $request->secondary_color;
        $settings->accent_color = $request->accent_color;
        $settings->light_color = $request->light_color;
        $settings->company_address = $request->company_address;
        $settings->company_phone = $request->company_phone;
        $settings->company_email = $request->company_email;
        $settings->save();

        return redirect()->route('admin.settings.edit')->with('success', 'Settings updated successfully.');
    }
}   