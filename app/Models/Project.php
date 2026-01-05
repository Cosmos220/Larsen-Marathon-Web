<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'category', 'desc_en', 'desc_fr', 'link', 'tags','image'];

    // Convertit automatiquement le JSON de la BD en tableau PHP utilisable
    protected $casts = [
        'tags' => 'array',
    ];
}
