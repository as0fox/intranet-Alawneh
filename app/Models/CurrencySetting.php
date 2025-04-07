<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurrencySetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'api_key',
        'base_currency',
        'buy_rate_adjustment',
        'sell_rate_adjustment',
        'is_active'
    ];

    protected $casts = [
        'buy_rate_adjustment' => 'float',
        'sell_rate_adjustment' => 'float',
        'is_active' => 'boolean'
    ];

    // Mutator to ensure base currency is uppercase
    public function setBaseCurrencyAttribute($value)
    {
        $this->attributes['base_currency'] = strtoupper($value);
    }

    // Scope for active currency settings
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}