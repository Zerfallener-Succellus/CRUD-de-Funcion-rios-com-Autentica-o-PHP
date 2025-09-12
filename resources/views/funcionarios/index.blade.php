@extends('layouts.app')

@section('header', 'Funcionários')

@section('content')
<div class="mb-6">
    <a href="{{ route('funcionarios.create') }}" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500">
        Adicionar Novo Funcionário
    </a>
</div>

<div class="overflow-x-auto bg-white rounded-lg shadow">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nome</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">CPF</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Telefone</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Gênero</th>
                <th scope="col" class="relative px-6 py-3"><span class="sr-only">Ações</span></th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @forelse ($funcionarios as $funcionario)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $funcionario->nome }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $funcionario->cpf }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $funcionario->telefone }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $funcionario->genero }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                        <a href="{{ route('funcionarios.edit', $funcionario) }}" class="text-indigo-600 hover:text-indigo-900">Editar</a>
                        <form action="{{ route('funcionarios.destroy', $funcionario) }}" method="POST" class="inline-block" onsubmit="return confirm('Tem certeza que deseja excluir este funcionário?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900">Excluir</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">Nenhum funcionário cadastrado.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
<div class="mt-4">
    {{ $funcionarios->links() }}
</div>
@endsection