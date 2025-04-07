<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'file',
        'type',
        'updated_date',
        'is_active'
    ];

    protected $casts = [
        'updated_date' => 'date',
        'is_active' => 'boolean'
    ];

    // Accessor for full file URL
    public function getFileUrlAttribute()
    {
        return $this->file ? asset('storage/' . $this->file) : null;
    }

    // Determine document type based on extension
    public static function getTypeFromExtension($filename)
    {
        $extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
        
        if (in_array($extension, ['pdf'])) {
            return 'pdf';
        } elseif (in_array($extension, ['xls', 'xlsx', 'csv'])) {
            return 'excel';
        } elseif (in_array($extension, ['doc', 'docx'])) {
            return 'word';
        }
        
        return 'other';
    }
}