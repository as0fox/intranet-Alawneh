<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leaderboard extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'department',
        'score',
        'photo',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    // Accessor for full photo URL
    public function getPhotoUrlAttribute()
    {
        return $this->photo ? asset('storage/' . $this->photo) : asset('images/pr.jpeg');
    }

    // Scope for active leaderboard entries
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Scope for top performers
    public function scopeTop($query, $limit = 3)
    {
        return $query->active()->orderByDesc('score')->limit($limit);
    }
}