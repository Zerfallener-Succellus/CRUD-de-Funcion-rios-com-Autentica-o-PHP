{{-- Similar à tela de login, mas com os campos de registro --}}
<!DOCTYPE html>
<html lang="pt-BR" class="h-full bg-white">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    @vite('resources/css/app.css')
</head>
<body class="h-full">
<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
  <div class="sm:mx-auto sm:w-full sm:max-w-sm">
    <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Crie sua conta</h2>
  </div>

  <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
    <form class="space-y-6" action="{{ route('register') }}" method="POST">
        @csrf
      <div>
        <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Nome</label>
        <div class="mt-2"><input id="name" name="name" type="text" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300"></div>
        @error('name')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
      </div>
      <div>
        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
        <div class="mt-2"><input id="email" name="email" type="email" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300"></div>
        @error('email')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
      </div>
      <div>
        <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Senha</label>
        <div class="mt-2"><input id="password" name="password" type="password" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300"></div>
        @error('password')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
      </div>
      <div>
        <label for="password_confirmation" class="block text-sm font-medium leading-6 text-gray-900">Confirme a Senha</label>
        <div class="mt-2"><input id="password_confirmation" name="password_confirmation" type="password" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300"></div>
      </div>
      <div>
        <button type="submit" class="flex w-full justify-center rounded-md bg-orange-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-orange-500">Cadastrar</button>
      </div>
    </form>
    <p class="mt-10 text-center text-sm text-gray-500">
      Já tem uma conta? <a href="{{ route('login') }}" class="font-semibold leading-6 text-orange-600 hover:text-orange-500">Faça o login</a>
    </p>
  </div>
</div>
</body>
</html>