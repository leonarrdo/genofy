<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GetNotaByNumberRequest extends FormRequest
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
            'numero'                => 'required|min:9|max:9',
        ];
    }

    public function messages(): array
    {
        return [
            'numero.required'   => 'Informe um número para a nota',
            'numero.min'        => 'O número da nota deve conter 9 dígitos',
            'numero.max'        => 'O número da nota deve conter 9 dígitos',
        ];
    }
}
