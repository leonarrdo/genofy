<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|max:255'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Informe um nome para o usuário',
            'name.max' => 'O nome do usuário não deve possuir mais que 255 caracteres',
            'email.required' => 'Informe um email para o usuário',
            'email.email' => 'Informe um email válido',
            'email.unique' => 'O email já está em uso',
            'email.max' => 'O email não deve possuir mais que 255 caracteres',
            'password.required' => 'Informe uma senha para o usuário',
            'password.max' => 'A senha do usuário não deve possuir mais que 255 caracteres',
        ];
    }
}
