<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SalvarFuncionarioRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; 
    }

    public function rules(): array
    {
       
        $funcionarioId = $this->route('funcionario') ? $this->route('funcionario')->id : null;

        return [
            'nome' => 'required|string|max:255', 
            'cpf' => [
                'required',
                'string',
                'digits:11', 
                Rule::unique('funcionarios')->ignore($funcionarioId), 
            ],
            'data_nascimento' => 'required|date_format:Y-m-d',
            'telefone' => 'required|string|regex:/^[0-9]+$/', 
            'genero' => ['required', Rule::in(['Masculino', 'Feminino', 'Outro'])], 
        ];
    }
}