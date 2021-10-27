<?php

use App\Http\Controllers\EmdfhrController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

Route::get('/emdfhr', [EmdfhrController::class, 'index'])->name('emdfhr');
Route::get('/list', [EmdfhrController::class, 'list'])->name('list');
Route::post('/emdfhr', [EmdfhrController::class, 'create']);
Route::get('/emdfhr/show/{id}', [EmdfhrController::class, 'show'])->name('show');
Route::post('/emdfhr/edit/{id}', [EmdfhrController::class, 'edit']);
Route::delete('/emdfhr/{id}', [EmdfhrController::class, 'delete']);
Route::get('/emdfhr/editing/{id}', [EmdfhrController::class, 'redirectEdit'])->name('edit');
Route::post('/emdfhr/select', [EmdfhrController::class, 'sinchung']);
Route::post('/emdfhr/cls', [EmdfhrController::class, 'cls']);
Route::post('/emdfhr/state', [EmdfhrController::class, 'state']);
