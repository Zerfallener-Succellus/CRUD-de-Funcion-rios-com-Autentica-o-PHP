<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SalvarFuncionarioRequest;
use App\Models\Funcionario;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class FuncionarioController extends Controller
{
    
    public function listarTodos(): JsonResponse
    {
        $funcionarios = Funcionario::all();
        return response()->json($funcionarios);
    }

    
    public function cadastrar(SalvarFuncionarioRequest $request): JsonResponse
    {
        $funcionario = Funcionario::create($request->validated());
        return response()->json($funcionario, Response::HTTP_CREATED);
    }

    
    public function detalhar(Funcionario $funcionario): JsonResponse
    {
        return response()->json($funcionario);
    }

    public function atualizar(SalvarFuncionarioRequest $request, Funcionario $funcionario): JsonResponse
    {
        $funcionario->update($request->validated());
        return response()->json($funcionario);
    }

    
    public function remover(Funcionario $funcionario): Response
    {
        $funcionario->delete();
        return response()->noContent();
    }
}