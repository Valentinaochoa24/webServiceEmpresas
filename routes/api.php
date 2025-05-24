<?php

use App\Http\Controllers\EmpresaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('empresas')->group(function () {
    Route::post('/store', [EmpresaController::class, 'store']);
    Route::get('/', [EmpresaController::class, 'index']);
    Route::get('/{nit}', [EmpresaController::class, 'show']);
    Route::put('/{nit}', [EmpresaController::class, 'update']);
    Route::delete('/{nit}', [EmpresaController::class, 'destroy']);
});