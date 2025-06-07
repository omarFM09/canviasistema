<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\UserController; 
use App\Http\Controllers\DesktopController;

Route::get('/', function () {
    return redirect('/login');
});



Auth::routes();
// Rutas para el CRUD de usuarios

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', function () {
    return view('admin.home');
})->name('home')->middleware('auth');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', 'AdminController@index')->name('admin');
    // Otras rutas administrativas
});


Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

Route::middleware(['auth'])->get('/admin', function () {
    return view('admin.dashboard');
});



Route::prefix('user')->name('user.')->group(function() {
    Route::get('/', [UserController::class, 'index'])->name('index')->middleware('auth');
    Route::get('create', [UserController::class, 'create'])->name('create')->middleware('auth');
    Route::get('show/{id}', [UserController::class, 'show'])->name('show')->middleware('auth'); // Ruta ajustada
    Route::post('store', [UserController::class, 'store'])->name('store')->middleware('auth');
    Route::get('edit/{id}', [UserController::class, 'edit'])->name('edit')->middleware('auth');
    Route::put('update/{id}', [UserController::class, 'update'])->name('update')->middleware('auth');
    Route::delete('destroy/{id}', [UserController::class, 'destroy'])->name('destroy')->middleware('auth');
});

Route::middleware('auth')->group(function() {
    // desktop
    Route::prefix('desktops')->name('desktops.')->group(function() {
        Route::get('/', [DesktopController::class, 'index'])->name('index');
        Route::get('create', [DesktopController::class, 'create'])->name('create');
        Route::post('store', [DesktopController::class, 'store'])->name('store');
        Route::get('show/{desktop}', [DesktopController::class, 'show'])->name('show');
        Route::get('edit/{desktop}', [DesktopController::class, 'edit'])->name('edit');
        Route::put('update/{desktop}', [DesktopController::class, 'update'])->name('update');
        Route::delete('destroy/{desktop}', [DesktopController::class, 'destroy'])->name('destroy');
        
        // Ruta anidada correcta para membresías
     
    });
    
});
