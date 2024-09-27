<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReminderController;

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
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/home', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('home');
Route::get('/create', [HomeController::class, 'reminder'])->middleware(['auth', 'admin']);
Route::post('/create', [HomeController::class, 'create'])->middleware(['auth', 'admin']);
Route::get('/update/{id}', [HomeController::class, 'edit'])->middleware(['auth', 'admin']);
Route::post('/update', [HomeController::class, 'update'])->middleware(['auth', 'admin']);
Route::get('/delete/{id}', [HomeController::class, 'delete'])->middleware(['auth', 'admin']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/vaccency', [JobController::class, 'vaccency']);
    Route::post('/vaccency', [JobController::class, 'create_job']);

    Route::get('/destroy/{id}', [JobController::class, 'destroy']);
    Route::get('/edit/{id}', [JobController::class, 'edit']);
    Route::post('/edit', [JobController::class, 'update']);

    Route::get('/applications', [JobController::class, 'applications']);
    Route::get('/destroy_application/{id}', [JobController::class, 'delete']);
});

Route::get('/jobs', [JobController::class, 'display_job']);
Route::get('/job/{id}', [JobController::class, 'Learn']);

Route::get('/apply/{id}', [JobController::class, 'apply']);
Route::post('/application', [JobController::class, 'submit']);

require __DIR__.'/auth.php';
