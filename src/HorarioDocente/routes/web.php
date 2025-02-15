<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InstituteController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ScheduleController;
/*
|--------------------------------------------------------------------------
| Página de Bienvenida
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome'); // Vista de bienvenida
})->name('welcome');  // Ruta nombrada 'welcome'

/*
|--------------------------------------------------------------------------
| Página Principal (Home)
|--------------------------------------------------------------------------
*/

Route::get('/home', function () {
    return view('home'); // Vista de la página principal
})->name('home');  // Ruta nombrada 'home'

/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| Rutas para Institutos
|--------------------------------------------------------------------------
*/
Route::resource('institutes', InstituteController::class)->except(['show', 'edit']);
//revisar este código(recordar que no se puede editar)
Route::get('/home', [InstituteController::class, 'index'])->name('home'); // Página principal

Route::resource('institutes', InstituteController::class)->except(['show', 'edit', 'update']);
Route::prefix('institutes')->name('institutes.')->group(function () {
    Route::post('/store', [InstituteController::class, 'store'])->name('store'); // Guardar instituto
    Route::delete('/{id}', [InstituteController::class, 'destroy'])->name('destroy'); // Eliminar instituto
});
/*
|--------------------------------------------------------------------------
| Rutas para Profesores
|--------------------------------------------------------------------------
*/
//revisar este código(recordar que no se puede editar)
//Route::get('/home', [TeacherController::class, 'index'])->name('home'); // Página principal

Route::get('/teachers', [TeacherController::class, 'index'])->name('teachers.index');
Route::post('/teachers', [TeacherController::class, 'store'])->name('teachers.store');
Route::delete('/teachers/{id}', [TeacherController::class, 'destroy'])->name('teachers.destroy');
// Ruta para mostrar el formulario de edición (GET)
// Ruta para mostrar el formulario de edición (GET)
Route::get('/teachers/{id}/edit', [TeacherController::class, 'edit'])->name('teachers.edit');

// Ruta para actualizar los datos del profesor (PUT)
Route::get('/teachers/{id}', [TeacherController::class, 'update'])->name('teachers.update');

Route::prefix('teachers')->name('teachers.')->group(function () {
    Route::get('/', [TeacherController::class, 'index'])->name('index'); // Ver lista de profesores
    Route::get('/create', [TeacherController::class, 'create'])->name('create'); // Formulario para crear nuevo profesor
    Route::post('/', [TeacherController::class, 'store'])->name('store'); // Guardar profesor
});

/*
|--------------------------------------------------------------------------
| rutas para asistencias
|--------------------------------------------------------------------------
*/
Route::get('/checkin', [CheckinController::class, 'showCheckinForm'])->name('checkin.show');
Route::post('/checkin', [CheckinController::class, 'storeCheckin'])->name('checkin.store');
Route::get('/checkin', [CheckInController::class, 'showForm'])->name('checkin.show');
Route::post('/checkin', [CheckInController::class, 'store'])->name('checkin.store');
/*
|--------------------------------------------------------------------------
| rutas para horarios
|--------------------------------------------------------------------------
*/
Route::get('/schedule', [ScheduleController::class, 'show'])->name('schedule.show');
// Aquí puedes agregar rutas adicionales para otras funcionalidades.
Route::post('/schedule', [ScheduleController::class, 'store'])->name('schedule.store');

// Ruta para obtener todos los profesores en formato JSON
Route::get('/teachers/all', [TeacherController::class, 'getAllTeachers'])->name('teachers.all');

// Obtener todos los profesores
Route::get('/teachers/all', [TeacherController::class, 'getAllTeachers'])->name('teachers.all');

// Obtener el horario de un profesor
Route::get('/teachers/{teacherId}/schedule', [ScheduleController::class, 'getScheduleForTeacher'])->name('teachers.schedule');

// Añadir un nuevo horario para un profesor
Route::post('/teachers/{teacherId}/schedule', [ScheduleController::class, 'addSchedule'])->name('teachers.addSchedule');

// Eliminar un horario de un profesor
Route::delete('/teachers/{teacherId}/schedule/{scheduleId}', [ScheduleController::class, 'deleteSchedule'])->name('teachers.deleteSchedule');
