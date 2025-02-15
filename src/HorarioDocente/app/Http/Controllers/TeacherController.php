<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    // Método para mostrar el formulario de creación de un profesor
    public function create()
    {
        return view('components.manage_teachers');
    }

    // Método para guardar un nuevo profesor
    public function store(Request $request)
    {
        // Validación de la entrada
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'age' => 'required|integer|min:18',
            'password' => 'required|string|min:6', // Validación de la contraseña
        ]);

        // Crear el nuevo profesor en la base de datos
        $teacher = Teacher::create([
            'name' => $request->name,
            'category' => $request->category,
            'age' => $request->age,
            'password' => bcrypt($request->password), // Asegurarse de cifrar la contraseña
        ]);

        // Verificación: Si el profesor se creó correctamente, respondemos con éxito
        if ($teacher) {
            return response()->json(['success' => 'Profesor creado exitosamente.']);
        } else {
            return response()->json(['error' => 'Hubo un problema al crear el profesor.'], 500);
        }
    }

    // Método para listar todos los profesores (puede ser reutilizado en otras vistas)
    public function index()
    {
        $teachers = Teacher::all(); // Obtiene todos los profesores de la base de datos
        return view('home', compact('teachers')); // Pasa los profesores a la vista home
    }

    // Método para obtener todos los profesores (función reutilizable)
    public function getAllTeachers()
    {
        $teachers = Teacher::all(); // Obtiene todos los profesores
        return response()->json($teachers); // Devuelve los profesores en formato JSON
    }
    // En TeacherController
    public function destroy($id)
    {
        $teacher = Teacher::findOrFail($id);
        $teacher->delete(); // Eliminar el profesor

        return redirect()->route('teachers.index')->with('success', 'Profesor eliminado correctamente.');
    }
    public function edit($id)
{
    $teacher = Teacher::findOrFail($id);
    return response()->json($teacher);
}

// Actualizar los datos del profesor
public function update(Request $request, $id)
{
    $teacher = Teacher::findOrFail($id);
    
    // Validar los datos
    $request->validate([
        'name' => 'required|string|max:255',
        'category' => 'required|string|max:255',
        'age' => 'required|integer|min:18',
        'password' => 'nullable|min:6',
    ]);

    // Actualizar los datos del profesor
    $teacher->update([
        'name' => $request->name,
        'category' => $request->category,
        'age' => $request->age,
        'password' => $request->password ? bcrypt($request->password) : $teacher->password,
    ]);

    return redirect()->route('teachers.index')->with('success', 'Profesor actualizado correctamente.');
}

}
