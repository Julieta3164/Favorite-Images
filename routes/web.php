<?php

use App\Http\Controllers\Create;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Imagen;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['auth']], function (){

    Route::get('/image/create', [Imagen::class, 'create'])->name('imagen.create');
    Route::post('/image/create', [Imagen::class, 'save'])->name('imagen.save');
    
    Route::get('/image/edit/{id}', [Imagen::class, 'edit'])->name('imagen.edit');
    Route::get('/dashboard', [Imagen::class, 'dashboard'])->name('dashboard');

    Route::delete('/image', [Imagen::class, 'destroy'])->name('imagen.destroy');


});



require __DIR__.'/auth.php';

