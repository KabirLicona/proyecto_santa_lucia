<?php

namespace App\Http\Requests\Cliente;

use Illuminate\Foundation\Http\FormRequest;

class StoreClienteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nombre_cliente' => 'required|string|max:100',
            'direccion' => 'required|string|max:500',
            'telefono' => 'required|string|max:10',
            'celular' => 'required|string|max:10',
            'correo' => 'required|string|max:50',
            'empresa_id' => 'required|exists:empresa,id',
            'imagen' => 'nullable|image|mimes:jpg,png,jpeg|max:2000'
        ];
    }
}
