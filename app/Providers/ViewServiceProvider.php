<?php
namespace App\Providers;

use App\Models\SiteSetting;
use App\Models\Navigation;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ViewServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer('*', function ($view) {
            $settings = SiteSetting::first();
          
            
            $view->with([
                'settings' => $settings,
                
            ]);
        });
    }
}