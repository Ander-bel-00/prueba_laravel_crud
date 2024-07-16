<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelicula extends Model
{
    use HasFactory;

    protected $table = 'peliculas';

    protected function casts(): array
    {
        return [
            'fecha_publicacion' => 'datetime', 
        ];
    }

    protected function titulo(): Attribute
    {
        return Attribute::make(
            set: function($value)
            {
                return strtolower($value);
            }, 
            get: function($value)
            {
                return ucfirst($value);
            }
        );
    }
}
