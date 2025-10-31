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
    Route::get('/newliquor', [SommelierController::class, 'oenophile'])->name('sommelier.create');
    Route::post('/donedeal', [SommelierController::class, 'regulation'])->name('wine.newest');
    Route::get('/newwine/{id}', [SommelierController::class, 'blend'])->name('wine.edit');
    Route::put('/changinge/{id}', [SommelierController::class, 'vintage'])->name('edited.wines');
});
//

Route::middleware(['auth', 'can:attendant'])->group(function(){
    Route::get('/door', [AttendantController::class, 'index'])->name('attendant.area');
    Route::get('/creating', [AttendantController::class, 'create'])->name('seller.creating');
    Route::post('/newstock', [AttendantController::class, 'store'])->name('sell.create');
    Route::get('/order/{id}', [AttendantController::class, 'asks'])->name('order.ongoing');
    Route::put('/changed/{id}', [AttendantController::class, 'orders'])->name('order.doneit');
    Route::get('/creating/{id}', [AttendantController::class, 'trash'])->name('sell.excluison');
    Route::post('/newstock/{id}', [AttendantController::class, 'exclusion'])->name('deleted');
    
});
    

require __DIR__.'/auth.php';
