<?php
// Importiere die benötigten Klassen
use Illuminate\Support\Facades\Route; // Laravel's Route-Klasse
use App\Http\Controllers\SimpleController;
use App\Http\Controllers\UserController;
use App\Models\User;

// Homepage Route
Route::get('/', [SimpleController::class,'index']);

Route::post('/submit', [SimpleController::class,'submit']);

Route::get('/debug', [SimpleController::class, "debug"]);

Route::get('/register', [UserController::class,'showRegistrationForm'])->name('register');


Route::post('/register', [UserController::class, 'register']);

Route::get('/login', [UserController::class,'showLoginForm'])->name('login');

Route::post('/login', [UserController::class,'login']);

Route::post('/logout', [UserController::class,'logout'])->name('logout');

Route::get('/messages/search', [SimpleController::class, 'search'])->name('messages.search');


Route::get('/messages/{message}/edit', [SimpleController::class, 'edit'])->name('messages.edit');
Route::put('/messages/{message}', [SimpleController::class, 'update'])->name('messages.update');
Route::delete('/messages/{message}', [SimpleController::class, 'destroy'])->name('messages.destroy');
