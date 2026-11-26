<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
//use Illuminate\Support\Facades\Schema;
use App\Http\Controllers\ArmadaController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('armada.index');
    }

    return redirect()->route('login');
})->name('armada.index');

Route::get('/tes-koneksi', function () {
    try {
        DB::connection()->getPdo();
        return "DB berhasil connect! Masih memperbaiki MVC nya";
    } catch (\Exception $e) {
        return "DB gagal connect:" . $e->getMessage();  
    }
})->withoutMiddleware('web');

Route::middleware('auth')->group(function () {
    Route::get('/', [ArmadaController::class, 'index'])->name('armada.index');
    Route::get('/inventaris', [ArmadaController::class, 'getVehicle'])->name('armada.table');
    Route::get('/form', [ArmadaController::class, 'formVehicle'])->name('armada.create');
    Route::post('/form', [ArmadaController::class, 'addVehicle'])->name('armada.store');
    Route::get('/form/{id}/edit', [ArmadaController::class, 'editVehicle'])->name('armada.edit');
    Route::put('/form/{id}', [ArmadaController::class, 'updateVehicle'])->name('armada.update');
    Route::get('/armada/{id}/delete', [ArmadaController::class, 'confirmDelete'])->name('armada.delete.confirm');
    Route::delete('/armada/{id}', [ArmadaController::class, 'deleteVehicle'])->name('armada.destroy');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.process');

    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.process');
});

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');