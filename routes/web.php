<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AttendantController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\SommelierController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Middleware\Authenticate;

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

Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'create'])->name('login');

Route::middleware(['auth', 'can:inventory'])->group(function(){
    Route::get('/', [InventoryController::class, 'dashboard']);
    Route::post('/', [InventoryController::class, 'dashboard']);
});
//

Route::middleware(['auth', 'can:sommelier'])->group(function(){
    Route::get('/', [SommelierController::class, 'dashboard']);
});
//

Route::middleware(['auth', 'can:attendant'])->group(function(){
    Route::get('/', [AttendantController::class, 'dashboard']);
});
    






require __DIR__.'/auth.php';
