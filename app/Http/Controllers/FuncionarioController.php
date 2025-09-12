<?php

namespace App\Http\Controllers;

use App\Http\Requests\SalvarFuncionarioRequest; // Reutilizando a validação da API!
use App\Models\Funcionario;
use Illuminate\Http\Request;

class FuncionarioController extends Controller
{
    public function index()
    {
        $funcionarios = Funcionario::latest()->paginate(10);
        return view('funcionarios.index', compact('funcionarios'));
    }

    public function create()
    {
        return view('funcionarios.create');
    }

    public function store(SalvarFuncionarioRequest $request)
    {
        Funcionario::create($request->validated());
        return redirect()->route('funcionarios.index')->with('success', 'Funcionário cadastrado com sucesso!');
    }

    public function show(Funcionario $funcionario)
    {
        // Redireciona para a edição, pois a visualização não foi solicitada no desafio.
        return redirect()->route('funcionarios.edit', $funcionario);
    }

    public function edit(Funcionario $funcionario)
    {
        return view('funcionarios.edit', compact('funcionario'));
    }

    public function update(SalvarFuncionarioRequest $request, Funcionario $funcionario)
    {
        $funcionario->update($request->validated());
        return redirect()->route('funcionarios.index')->with('success', 'Funcionário atualizado com sucesso!');
    }

    public function destroy(Funcionario $funcionario)
    {
        $funcionario->delete();
        return redirect()->route('funcionarios.index')->with('success', 'Funcionário removido com sucesso!');
    }
}