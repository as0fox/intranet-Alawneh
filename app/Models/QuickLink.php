<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuickLink extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'icon',
        'url',
        'color1',
        'color2',
        'order',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    // Scope for active quick links
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Scope for ordered quick links
    public function scopeOrdered($query)
    {
        return $query->orderBy('order');
    }
}