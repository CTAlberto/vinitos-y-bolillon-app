<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\CataController;
use App\Http\Controllers\ResenaController;
use App\Http\Controllers\AdminCursoController;
use App\Http\Controllers\AdminContactoController;
use App\Http\Controllers\SobreNosotrosController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\RegalaExperienciaController;
use App\Http\Controllers\EventController;

// Ruta para obtener los eventos en formato JSON
Route::get('/api/events', [EventController::class, 'getEvents'])->name('api.events');

// **Frontend Routes**
Route::get('/', function () {
    return view('welcome'); // Portada o página principal
})->name('welcome'); // Página principal o portada

// **Cursos Routes**
Route::get('/cursos', [CursoController::class, 'index'])->name('cursos.index'); // Listado de cursos
Route::get('/cursos/{id}', [CursoController::class, 'show'])->name('cursos.show'); // Detalle de curso

Route::get('/inscribirse/{id}', [CursoController::class, 'inscribirse'])->name('inscribirse'); // Inscripción a un curso
Route::post('/inscribirse', [CursoController::class, 'store'])->name('procesar.inscripcion'); // Procesar inscripción de curso

// **Sobre Nosotros**
Route::get('/sobre-nosotros', [SobreNosotrosController::class, 'index'])->name('sobre-nosotros');

// **Contacto Routes**
Route::get('/contacto', [ContactoController::class, 'index'])->name('contacto.index'); // Página de contacto
Route::post('/contacto', [ContactoController::class, 'store'])->name('contacto.store'); // Enviar formulario de contacto

// **Catas Routes**
Route::get('/catas', [CataController::class, 'index'])->name('catas.index'); // Listado de catas
Route::get('/catas/{id}', [CataController::class, 'show'])->name('catas.show'); // Detalle de cata

// **Política de privacidad y Términos y Condiciones**
Route::get('/politica-de-privacidad', function () {
    return view('politica-de-privacidad'); // Política de privacidad
})->name('politica-privacidad');

Route::get('/terminos-y-condiciones', function () {
    return view('terminos-y-condiciones'); // Términos y condiciones
})->name('terminos-condiciones');

// **Reseñas del curso**
Route::get('/cursos/{id}/reseñas', [ResenaController::class, 'index'])->name('cursos.reseñas'); // Reseñas de curso

// **Empresas Routes**
Route::get('/empresas', [EmpresaController::class, 'index'])->name('empresas.index'); // Listado de empresas
Route::get('/empresas/{id}', [EmpresaController::class, 'show'])->name('empresas.evento'); // Detalle de empresa

// Elimina la ruta actual del calendario y agrega estas:
Route::get('/calendar/courses', function () {
    return view('components.calendar', ['category' => 3]);
})->name('calendar.courses');

Route::get('/calendar/tastings', function () {
    return view('components.calendar', ['category' => 1]);
})->name('calendar.tastings');

// **Regala Experiencia Routes**
Route::get('/regala-experiencia', [RegalaExperienciaController::class, 'index'])->name('regala-experiencia.index'); // Página de regala experiencia
Route::post('/regala-experiencia', [RegalaExperienciaController::class, 'submit'])->name('regala-experiencia.submit'); // Enviar regalo experiencia

// **Admin Routes (Comentadas para acceso solo autenticado)**
/*
Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('admin'); // Panel de administración
    })->name('admin.dashboard');

    Route::get('/cursos', [AdminCursoController::class, 'index'])->name('admin.cursos.index'); // Listado de cursos (admin)
    Route::get('/cursos/{id}/editar', [AdminCursoController::class, 'edit'])->name('admin.cursos.edit'); // Editar curso (admin)

    Route::get('/contactos', [AdminContactoController::class, 'index'])->name('admin.contactos.index'); // Listado de contactos
});
*/

// **Dashboard Routes (Si usas autenticación)**
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// **Rutas de perfil de usuario**
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

