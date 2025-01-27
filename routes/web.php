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

use App\Http\Controllers\EventController;

// Ruta para obtener los eventos en formato JSON
Route::get('/api/events', [EventController::class, 'getEvents'])->name('api.events');


// **Frontend Routes**
Route::get('/', function () {
    return view('welcome'); // Portada o página principal
});
//Probando probando
Route::get('/cursos', [CursoController::class, 'index'])->name('cursos.index'); // Listado de cursos
Route::get('/cursos/{id}', [CursoController::class, 'show'])->name('cursos.show'); // Detalle de curso

Route::get('/sobre-nosotros', [SobreNosotrosController::class, 'index'])->name('sobre-nosotros');


Route::get('/contacto', [ContactoController::class, 'index'])->name('contacto.index'); // Página de contacto
Route::post('/contacto', [ContactoController::class, 'store'])->name('contacto.store');



Route::get('/catas', [CataController::class, 'index'])->name('catas.index'); // Listado de catas
Route::get('/catas/{id}', [CataController::class, 'show'])->name('catas.show'); // Detalle de cata

Route::get('/politica-de-privacidad', function () {
    return view('politica-de-privacidad'); // Política de privacidad
})->name('politica-privacidad');

Route::get('/terminos-y-condiciones', function () {
    return view('terminos-y-condiciones'); // Términos y condiciones
})->name('terminos-condiciones');

Route::get('/cursos/{id}/reseñas', [ResenaController::class, 'index'])->name('cursos.reseñas'); // Reseñas de curso
Route::get('/inscribirse/{id}', [CursoController::class, 'inscribirse'])->name('inscribirse');

Route::get('/empresas', [EmpresaController::class, 'index'])->name('empresas.index');
Route::get('/empresas/{id}', [EmpresaController::class, 'show'])->name('empresas.evento');

Route::get('/calendar', function () {
    return view('components.calendar'); // Asegúrate de que la vista está en esta ubicación
})->name('calendar.index');




// **Admin Routes**
/*Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('admin'); // Panel de administración
    })->name('admin.dashboard');

    Route::get('/cursos', [AdminCursoController::class, 'index'])->name('admin.cursos.index'); // Listado de cursos (admin)
    Route::get('/cursos/{id}/editar', [AdminCursoController::class, 'edit'])->name('admin.cursos.edit'); // Editar curso (admin)

    Route::get('/contactos', [AdminContactoController::class, 'index'])->name('admin.contactos.index'); // Listado de contactos
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});*/

require __DIR__.'/auth.php';
