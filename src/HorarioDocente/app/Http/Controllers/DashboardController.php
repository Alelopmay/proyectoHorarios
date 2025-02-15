<?php

namespace App\Http\Controllers;

use App\Models\Teacher;

class DashboardController extends Controller
{
    public function index()
    {
        // Obtener todos los profesores
        $teachers = Teacher::all();

        // Pasar los profesores a la vista
        return view('home', compact('teachers'));
    }
}
