<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'logo',
        'favicon',
        'primary_color',
        'secondary_color',
        'accent_color',
        'light_color',
        'company_name',
        'company_address',
        'company_phone',
        'company_email'
    ];

    // Accessor for full logo URL
    public function getLogoUrlAttribute()
    {
        return $this->logo ? asset('storage/' . $this->logo) : asset('images/logo.jpg');
    }

    // Accessor for full favicon URL
    public function getFaviconUrlAttribute()
    {
        return $this->favicon ? asset('storage/' . $this->favicon) : null;
    }

    // Get or create singleton instance
    public static function getSettings()
    {
        return self::firstOrCreate([]);
    }
}