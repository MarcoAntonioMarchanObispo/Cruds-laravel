<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Campo para el nombre del alumno
            $table->integer('age'); // Campo para la edad del alumno
            $table->string('email')->unique(); // Campo para el correo electrónico, único
            $table->string('major'); // Campo para la carrera o especialización
            $table->timestamps(); // Campos de marca de tiempo (created_at, updated_at)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};