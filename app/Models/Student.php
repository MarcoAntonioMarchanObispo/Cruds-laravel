<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    // Define el nombre de la tabla si es diferente a "students"
    protected $table = 'students';

    // Define los campos que pueden ser asignados en masa
    protected $fillable = ['name', 'age', 'email', 'major'];

    // Opcional: Si tienes relaciones con otros modelos, defínelas aquí
}
