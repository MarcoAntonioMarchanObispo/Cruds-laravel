<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sistemas; // Asegúrate de importar el modelo correcto

class SistemasController extends Controller
{
    /**
     * Muestra una lista de estudiantes.
     */
    public function index()
    {
        // Cargar todos los estudiantes de la base de datos
        $students = Sistemas::all();
        
        // Pasar la lista de estudiantes a la vista 'Sistemas.index'
        return view('Sistemas.index', ['students' => $students]);
    }

    /**
     * Muestra el formulario para crear un nuevo estudiante.
     */
    public function create()
    {
        // Retornar la vista para crear un nuevo estudiante
        return view('Sistemas.create');
    }

    /**
     * Maneja el almacenamiento de un nuevo estudiante.
     */
    public function store(Request $request)
    {
        // Validar los datos de entrada
        $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer|min:1',
            'email' => 'required|email|max:255',
            'major' => 'required|string|max:255',
        ]);

        // Crear un nuevo estudiante
        Sistemas::create($request->all());

        // Redirigir a la lista de estudiantes con un mensaje de éxito
        return redirect()->route('Sistemas.index')->with('success', 'Estudiante creado con éxito');
    }

    /**
     * Muestra el formulario para editar un estudiante específico.
     */
    public function edit($id)
    {
        // Encontrar al estudiante por su ID
        $student = Sistemas::findOrFail($id);
        
        // Pasar el estudiante a la vista 'Sistemas.edit'
        return view('Sistemas.edit', ['student' => $student]);
    }

    /**
     * Maneja la actualización de un estudiante específico.
     */
    public function update(Request $request, $id)
    {
        // Validar los datos de entrada
        $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer|min:1',
            'email' => 'required|email|max:255',
            'major' => 'required|string|max:255',
        ]);

        // Encontrar al estudiante por su ID
        $student = Sistemas::findOrFail($id);
        
        // Actualizar los datos del estudiante
        $student->update($request->all());

        // Redirigir a la lista de estudiantes con un mensaje de éxito
        return redirect()->route('Sistemas.index')->with('success', 'Estudiante actualizado con éxito');
    }

    /**
     * Maneja la eliminación de un estudiante específico.
     */
    public function destroy($id)
    {
        // Encontrar al estudiante por su ID
        $student = Sistemas::findOrFail($id);
        
        // Eliminar al estudiante
        $student->delete();

        // Redirigir a la lista de estudiantes con un mensaje de éxito
        return redirect()->route('Sistemas.index')->with('success', 'Estudiante eliminado con éxito');
    }
}
