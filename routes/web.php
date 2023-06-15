<?php

use App\Http\Controllers\ArchivoController;
use App\Http\Controllers\NoticiaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TipoController;
use App\Models\Archivo;
use App\Models\Noticia;
use App\Models\Tipo;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $primeraNoticia=Noticia::latest()->first();
    $obtenerDosNoticias=Noticia::where('id','!=',$primeraNoticia->id)->get();
    $slider=Noticia::get()->take(3);
    $data = array(
        'pn'=>$primeraNoticia,
        'dosn'=>$obtenerDosNoticias,
        'slider'=>$slider
    );
    
    
    return view('inicio',$data);
});

Route::get('/dashboard', function () {

    $tipos=Tipo::get();
    $noticias=Noticia::get();
    $archivos=Archivo::get();

    $data = array(
        'tipos'=>$tipos,
        'noticias'=>$noticias,
        'archivos'=>$archivos
    );

    return view('dashboard',$data);


})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ruta para tipos
Route::resource('tipos', TipoController::class);
Route::resource('noticias-admin', NoticiaController::class);
Route::resource('archivos-admin', ArchivoController::class);



// paso1
// 1 crear proyecto laravel
// 2 intalar brezze
// 3 migrate todas , php artisan make:model Animal -mcr
// 4 descargr templade
// 5 paras subir los archivos storage de laravel 
// 6 rutas->resources 
// 7 maqueta con datos ficticios, verificar que funciona
// 6 conultas y pasar en un array a la vista
// 9 foreach 



require __DIR__.'/auth.php';
