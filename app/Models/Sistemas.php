<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sistemas extends Model
{
    protected $table = 'students'; // Nombre de la tabla en la base de datos

    // Lista de campos que pueden ser llenados de manera masiva
    protected $fillable = ['name', 'age', 'email', 'major'];

    // Aquí puedes definir relaciones, métodos, y otras configuraciones según tus necesidades
}
