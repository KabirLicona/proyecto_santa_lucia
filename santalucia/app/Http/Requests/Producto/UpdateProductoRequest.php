<?php

namespace App\Http\Requests\Producto;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductoRequest extends FormRequest
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
            'nombre_producto' => 'required|string|max:100',
            'categoria_id' => 'required|exists:categoria,id',
            'precio_compra' => 'required|integer|min:1',
            'precio_venta' => 'required|integer|min:1',
            'stok' => 'required|integer|min:0',
            'descripcion' => 'nullable',
            'imagen' => 'nullable|image|mimes:jpg,png,jpeg|max:2000'
        ];
    }
}
