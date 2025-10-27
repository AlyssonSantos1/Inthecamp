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
    Route::get('/newstock', [InventoryController::class, 'newitem']);
    Route::post('/newwine', [InventoryController::class, 'store'])->named('created');
    Route::get('/changing/{id}', [InventoryController::class, 'deposit']);
    Route::put('/changed/{id}', [InventoryController::class, 'max'])->named('changed');
    Route::get('/changing/{id}', [InventoryController::class, 'garbage']);
    Route::post('/changed/{id}', [InventoryController::class, 'scrap'])->named('deleted');
});
//

Route::middleware(['auth', 'can:sommelier'])->group(function(){
    Route::get('/creating', [SommelierController::class, 'oenophile']);
    Route::post('/newstock', [SommelierController::class, 'regulation']);
    Route::get('/newwine/{id}', [SommelierController::class, 'blend']);
    Route::put('/changinge/{id}', [SommelierController::class, 'vintage']);
});
//

Route::middleware(['auth', 'can:attendant'])->group(function(){
    Route::get('/creating', [AttendantController::class, 'create']);
    Route::post('/newstock', [AttendantController::class, 'store']);
    Route::get('/order/{id}', [AttendantController::class, 'booking']);
    Route::put('/changed/{id}', [AttendantController::class, 'transaction']);
});
    

require __DIR__.'/auth.php';
