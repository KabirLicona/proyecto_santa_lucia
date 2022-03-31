<?php

namespace App\Imports;

use App\Producto;
use App\Categoria;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
// use Maatwebsite\Excel\Concerns\WithBatchInserts;
// use Maatwebsite\Excel\Concerns\WithLimit;


class ProductoImport implements ToModel, WithHeadingRow
{
    // private $rows = 0;
    // public $limit = 12;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // ++$this->rows;
        // dd($row);
        // dd($row);
        $categoria = Categoria::where('nombre_categoria', '=', $row['categoria'])->get()->first();
        
        if(empty($categoria)){
            
            $categoria = Categoria::create([
                'nombre_categoria' => $row['categoria']
            ]);
            // dd($categotia);
        }        

        $producto = new Producto([
            'nombre_producto' => $row['nombre_producto'],
            'stok' => $row['stok'],
            'categoria_id' => $categoria->id,
            'precio_compra' => $row['precio_compra'],
            'precio_venta' => $row['precio_venta'],
            'descripcion' => $row['descripcion'],
            'imagen' => 'producto_default.jpg',
        ]);

        return $producto;
    }

    // public function limit(): int
    // {
    //     return $this->limit;
    // }

}
