<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActivationController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\TemplateController;


Route::get('/', function () { return redirect('/login'); });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/activate/{token}', [ActivationController::class, 'activate'])->name('activation');

Route::get('/template/create', function () {
    return view('template.create');
})->name('template.create');


Route::post('/template/store', function () {
    // Lógica para salvar os dados do formulário
})->name('template.store');

Route::get('/teste', function () {
    return view('teste');
});

Route::get('/edit-template/{id}', [TemplateController::class, 'edit'])->name('edit.template');

Route::post('/save-template', [TemplateController::class, 'saveTemplate']);



//Route::get('password/reset/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
//Route::post('password/reset', [NewPasswordController::class, 'store'])->name('password.update');


Route::get('/register', [RegisteredUserController::class, 'create'])
     ->name('register');


require __DIR__.'/auth.php';
