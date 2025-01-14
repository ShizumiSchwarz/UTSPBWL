<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    protected $fillable = [
        'name', 'species', 'primary_type', 'weight', 'height',
        'hp', 'attack', 'defense', 'is_legendary', 'photo'
    ];

    protected $casts = [
        'type' => 'array',
        'abilities' => 'array',
    ];

}
