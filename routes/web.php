<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('category/{category}', [PostController::class,'category'])->name('posts.category');

Route::resource('posts',PostController::class);   //esta linea de codigo tiene todos lo controladores que estan comentados a bajo. (son equivalentes). si se quisiese cambiar el nombre de la url : https://www.youtube.com/watch?v=PT6BoDQdkXk&list=PLZ2ovOgdI-kWWS9aq8mfUDkJRfYib-SvF&index=20

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {return redirect('posts');})->name('dashboard');

Route::get('posts/{post}/detalle_propuesta', [PostController::class,'detalle_propuesta'])->name('posts.detalle_propuesta');
Route::get('posts/{post}/createreserva', [PostController::class,'createreserva'])->name('posts.createreserva');










//Route::get('create', [PostController::class,'create'])->name('posts.create');

// Route::get('posts', [PostController::class ,'index'])->name('posts.index');

// Route::post('posts',  [PostController::class,'store'])->name('posts.store');

// Route::get('posts/{post}', [PostController::class,'show'])->name('posts.show');

// Route::get('posts/{post}/edit', [PostController::class,'edit'])->name('posts.edit');

// Route::put('posts/{post}', [PostController::class,'update'])->name('posts.update');

// Route::delete('posts/{post}', [PostController::class,'destroy'])->name('posts.destroy');