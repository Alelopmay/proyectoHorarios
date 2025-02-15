<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\Teacher;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Crear un nuevo horario.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
   public function store(Request $request)
{
    // Validación de los datos
    $validated = $request->validate([
        'teacher_id' => 'required|exists:teachers,id',
        'day' => 'required|string|max:10',
        'start_time' => 'required|date_format:H:i',
        'end_time' => 'required|date_format:H:i|after:start_time',
    ]);

    try {
        // Crear el horario en la base de datos
        $schedule = Schedule::create($validated);

        // Confirmar que el horario se creó correctamente
        if ($schedule) {
            return back()->with('success', 'Horario añadido exitosamente.');
        } else {
            return back()->withErrors(['error' => 'No se pudo crear el horario. Por favor, intente de nuevo.']);
        }
    } catch (\Exception $e) {
        // Manejar cualquier error inesperado
        return back()->withErrors(['error' => 'Error al guardar el horario: ' . $e->getMessage()]);
    }
}

}
