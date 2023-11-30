<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreNotaFiscalRequest extends FormRequest
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
            'numero'                => 'required|unique:notas|min:9|max:9',
            'valor'                 => 'required|numeric|min:0|not_in:0',
            'cnpj_remetente'        => 'required|string',//validar cnpj
            'nome_remetente'        => 'required|string|max:100',
            'cnpj_transportador'    => 'required|string',//validar cnpj
            'nome_transportador'    => 'required|string|max:100'
        ];
    }

    public function messages(): array
    {
        return [
            'numero.required'   => 'Informe um número para a nota',
            'numero.unique'     => 'O número de nota fiscal informado já consta no sistema',
            'numero.min'        => 'O número da nota deve conter 9 dígitos',
            'numero.max'        => 'O número da nota deve conter 9 dígitos',

            'valor.required'    => 'É necessário informar um valor para a nota fiscal',
            'valor.numeric'     => 'O valor da nota deve ser do tipo númerico',
            'valor.not_in'      => 'O valor da nota fiscal deve ser maior que zero.',

            'cnpj_remetente.required' => 'Informe o CNPJ do remetente',
            'nome_remetente.required' => 'Informe o nome do remetente',

            'cnpj_transportador.required' => 'Informe o CNPJ do transportador',
            'nome_transportador.required' => 'Informe o nome do transportador',
        ];
    }
}
