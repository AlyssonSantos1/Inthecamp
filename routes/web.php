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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
// Route::post('/login', [AuthenticatedSessionController::class, 'create'])->name('login');

// Route::middleware(['auth'])->group(function () {

//     Route::middleware(function ($request, $next) {
//         if (Gate::denies('inventory')) {
//             return redirect('/');
//         }
//         return $next($request);
//     })->group(function () {
//         Route::get('/inventory', [InventoryController::class, 'index'])->name('inventory.index');
   
//     });
//     //
    
//     Route::middleware(function ($request, $next) {
//         if (Gate::denies('sommelier')) {
//             return redirect('/');
//         }
//         return $next($request);
//     })->group(function () {
//         Route::get('/sommelier', [SommelierController::class, 'index'])->name('sommelier.index');
    
//     });
//     //

//     Route::middleware(function ($request, $next) {
//         if (Gate::denies('attendant')) {
//             return redirect('/');
//         }
//         return $next($request);
//     })->group(function () {
//         Route::get('/attendant', [AttendantController::class, 'index'])->name('attendant.index');
        
//     });

// });
//



require __DIR__.'/auth.php';
