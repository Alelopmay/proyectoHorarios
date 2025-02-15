<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Institute;

class InstituteController extends Controller
{
    public function store(Request $request)
    {
        // Validación de los datos
        $request->validate([
            'name' => 'required|string|max:100',
            'address' => 'required|string|max:255',
        ]);

        // Crear el nuevo instituto
        Institute::create([
            'name' => $request->name,
            'address' => $request->address,
        ]);

        // Redireccionar o devolver una respuesta
        return redirect()->route('home')->with('success', 'Instituto creado con éxito.');
    }
        public function index()
        {
            $institutes = Institute::all(); // Obtén todos los institutos
            return view('home', compact('institutes')); // Pásalos a la vista
        }

    public function destroy($id)
    {
        $institute = Institute::find($id); // Encuentra el instituto por ID

        if ($institute) {
            $institute->delete(); // Elimina el instituto de la base de datos

            return redirect()->route('home')->with('success', 'Instituto eliminado exitosamente.');
        } else {
            return redirect()->route('home')->with('error', 'Instituto no encontrado.');
        }
    }
    // Método para actualizar un instituto
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ]);

        $institute = Institute::find($id);
        
        if ($institute) {
            $institute->name = $request->name;
            $institute->address = $request->address;
            $institute->save();

            return redirect()->route('home')->with('success', 'Instituto actualizado exitosamente');
        } else {
            return redirect()->route('home')->with('error', 'Instituto no encontrado');
        }
    }

}
