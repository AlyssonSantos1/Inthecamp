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
    return redirect()->route('login');
});

Route::get('/login', [AuthenticatedSessionController::class, 'create'])
    ->name('login')
    ->middleware('guest:owner');

Route::post('/login', [AuthenticatedSessionController::class, 'store'])
    ->middleware('guest:owner');

// Logout
Route::post('/logout', function () {
    Auth::guard('owner')->logout();
    session()->invalidate();
    session()->regenerateToken();
    return redirect('/login');
})->name('logout')->middleware('auth:owner');

Route::middleware(['auth', 'can:inventory'])->group(function(){
    Route::get('/open', [InventoryController::class, 'index'])->name('inventory.area');
    Route::get('/newstock', [InventoryController::class, 'newitem']);
    Route::post('/newwine', [InventoryController::class, 'store'])->named('created');
    Route::get('/changing/{id}', [InventoryController::class, 'deposit']);
    Route::put('/changed/{id}', [InventoryController::class, 'max'])->named('changed');
    Route::get('/changing/{id}', [InventoryController::class, 'garbage']);
    Route::post('/changed/{id}', [InventoryController::class, 'scrap'])->named('deleted');
});
//

Route::middleware(['auth', 'can:sommelier'])->group(function(){
    Route::get('/sommelier', [SommelierController::class, 'index'])->name('sommelier.area');
    Route::get('/creating', [SommelierController::class, 'oenophile']);
    Route::post('/newstock', [SommelierController::class, 'regulation']);
    Route::get('/newwine/{id}', [SommelierController::class, 'blend']);
    Route::put('/changinge/{id}', [SommelierController::class, 'vintage']);
});
//

Route::middleware(['auth', 'can:attendant'])->group(function(){
    Route::get('/door', [AttendantController::class, 'index'])->name('attendant.area');
    Route::get('/creating', [AttendantController::class, 'create']);
    Route::post('/newstock', [AttendantController::class, 'store']);
    Route::get('/order/{id}', [AttendantController::class, 'booking']);
    Route::put('/changed/{id}', [AttendantController::class, 'transaction']);
    Route::get('/creating/{id}', [AttendantController::class, 'trash']);
    Route::post('/newstock/{id}', [AttendantController::class, 'exclusion'])->name('deleted');
    
});
    

require __DIR__.'/auth.php';
