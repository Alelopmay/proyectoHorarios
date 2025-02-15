<?php

// app/Http/Controllers/CheckInController.php

namespace App\Http\Controllers;

use App\Models\CheckIn;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CheckInController extends Controller
{
    // Mostrar el formulario de check-in (ya tienes esto en la vista)
    public function showForm()
    {
        return view('components.checkin');
    }

    // Guardar el check-in en la base de datos
    public function store(Request $request)
    {
        // Validación de los datos del formulario
        $request->validate([
            'teacher_name' => 'required|string',
            'password' => 'required|string',
            'date' => 'required|date',
        ]);

        // Buscar al profesor por nombre
        $teacher = Teacher::where('name', $request->teacher_name)->first();

        if (!$teacher || !Hash::check($request->password, $teacher->password)) {
            // Si no se encuentra al profesor o la contraseña es incorrecta
            return back()->withErrors(['error' => 'Nombre o contraseña incorrectos']);
        }

        // Crear el registro de check-in
        CheckIn::create([
            'entry_date' => now(), // La fecha de entrada es el momento actual
            'exit_date' => null,    // Suponemos que la salida es nula al principio
            'teacher_id' => $teacher->id, // El ID del profesor
        ]);

        // Redirigir a la misma página con un mensaje de éxito
        return back()->with('success', 'Asistencia registrada correctamente.');
    }
}
