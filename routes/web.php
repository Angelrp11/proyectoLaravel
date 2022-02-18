<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\reservasController;
use App\Models\Reserva;
use App\Models\User;
use Illuminate\Support\Facades\DB;

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
})->name('principal');

Route::get('/dashboard', [reservasController::class, 'edit'])->middleware(['auth'])->name('dashboard');

Route::get('reservaConfirmada', [reservasController::class, 'create']);

// Route::get('Miperfil', function () {
//     return view('miperfil');
// })->name('Miperfil');




Route::get('Miperfil', function () {
    // Así uso la BD
    $data = App\Models\User::all();
    return view('miperfil', compact('data'));
})->name('Miperfil');

require __DIR__ . '/auth.php';
