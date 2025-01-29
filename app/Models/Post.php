<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts'; // Especifica la tabla si el nombre no es el estándar
    protected $fillable = ['content', 'image']; // Asegúrate de que los campos sean correctos
}
