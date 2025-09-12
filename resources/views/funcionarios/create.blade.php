@extends('layouts.app')

@section('header', 'Novo Funcionário')

@section('content')
    <div class="p-6 bg-white border-b border-gray-200 rounded-lg">
        <form action="{{ route('funcionarios.store') }}" method="POST">
            @include('funcionarios._form')
        </form>
    </div>
@endsection