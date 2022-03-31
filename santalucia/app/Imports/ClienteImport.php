<?php

namespace App\Imports;

use App\Cliente;
use App\Empresa;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
// use Maatwebsite\Excel\Concerns\WithBatchInserts;
// use Maatwebsite\Excel\Concerns\WithLimit;


class ClienteImport implements ToModel, WithHeadingRow
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
        $empresa = Empresa::where('nombre_empresa', '=', $row['empresa'])->get()->first();
        
        if(empty($empresa)){
            
            $empresa = Empresa::create([
                'nombre_empresa' => $row['empresa']
            ]);
            
        }        

        $cliente = new Cliente([
            'nombre_cliente' => $row['nombre_cliente'],
            'empresa_id' => $empresa->id,
            'telefono' => $row['telefono'],
            'celular' => $row['celular'],
            'correo' => $row['correo'],
            'direccion' => $row['direccion'],
            'imagen' => 'cliente_default.jpg',
        ]);

        return $cliente;
    }

    // public function limit(): int
    // {
    //     return $this->limit;
    // }

}
