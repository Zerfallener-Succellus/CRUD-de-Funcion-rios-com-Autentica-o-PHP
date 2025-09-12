@csrf
<div class="space-y-4">
    <div>
        <label for="nome" class="block text-sm font-medium text-gray-700">Nome</label>
        <input type="text" name="nome" id="nome" value="{{ old('nome', $funcionario->nome ?? '') }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
        @error('nome')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
    </div>
    <div>
        <label for="cpf" class="block text-sm font-medium text-gray-700">CPF</label>
        <input type="text" name="cpf" id="cpf" value="{{ old('cpf', $funcionario->cpf ?? '') }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
        @error('cpf')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
    </div>
    <div>
        <label for="data_nascimento" class="block text-sm font-medium text-gray-700">Data de Nascimento</label>
        <input type="date" name="data_nascimento" id="data_nascimento" value="{{ old('data_nascimento', $funcionario->data_nascimento ?? '') }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
        @error('data_nascimento')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
    </div>
    <div>
        <label for="telefone" class="block text-sm font-medium text-gray-700">Telefone</label>
        <input type="text" name="telefone" id="telefone" value="{{ old('telefone', $funcionario->telefone ?? '') }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
        @error('telefone')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
    </div>
    <div>
        <label for="genero" class="block text-sm font-medium text-gray-700">Gênero</label>
        <select name="genero" id="genero" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
            <option value="Masculino" @selected(old('genero', $funcionario->genero ?? '') == 'Masculino')>Masculino</option>
            <option value="Feminino" @selected(old('genero', $funcionario->genero ?? '') == 'Feminino')>Feminino</option>
            <option value="Outro" @selected(old('genero', $funcionario->genero ?? '') == 'Outro')>Outro</option>
        </select>
        @error('genero')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
    </div>
</div>
<div class="mt-6 flex items-center justify-end gap-x-6">
    <a href="{{ route('funcionarios.index') }}" class="text-sm font-semibold leading-6 text-gray-900">Cancelar</a>
    <button type="submit" class="rounded-md bg-orange-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-orange-500">Salvar</button>
</div>