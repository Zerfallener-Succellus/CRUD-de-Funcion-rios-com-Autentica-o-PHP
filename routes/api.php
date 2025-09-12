<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\FuncionarioController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/registrar', [AuthController::class, 'registrar']); 
Route::post('/login', [AuthController::class, 'autenticar']);   


Route::middleware('auth:sanctum')->group(function () {
    
    Route::controller(FuncionarioController::class)->group(function () {
        Route::get('/funcionarios', 'listarTodos');
        Route::post('/funcionarios', 'cadastrar');
        Route::get('/funcionarios/{funcionario}', 'detalhar');
        Route::put('/funcionarios/{funcionario}', 'atualizar');
        Route::delete('/funcionarios/{funcionario}', 'remover');
    });
});
