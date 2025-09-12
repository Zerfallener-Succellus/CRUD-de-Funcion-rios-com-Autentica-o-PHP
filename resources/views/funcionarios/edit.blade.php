@extends('layouts.app')

@section('header', 'Editar Funcionário')

@section('content')
    <div class="p-6 bg-white border-b border-gray-200 rounded-lg">
        <form action="{{ route('funcionarios.update', $funcionario) }}" method="POST">
            @method('PUT')
            @include('funcionarios._form', ['funcionario' => $funcionario])
        </form>
    </div>
@endsection