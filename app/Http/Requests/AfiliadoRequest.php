<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AfiliadoRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {

        $afiliado = $this->route('afiliado');

        return [
            'nombre' => [
                'required', 
                'string', 
                'max:100'
            ], 
            'apellido' => [
                'required', 
                'string', 
                'max:100'
            ], 
            'numero_documento' => [
                'required', 
                'max:12',
                Rule::unique('afiliados', 'numero_documento')->ignore($afiliado->id)
            ], 
            'numero_celular' => [
                'required', 
                'max:10'
            ],
            'email' => [
                'required', 
                'email', 
                'max:50'
            ]
            
        ];
    }
}
