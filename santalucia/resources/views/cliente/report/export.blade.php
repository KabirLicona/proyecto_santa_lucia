<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Datos Clientes</title>
</head>
<body>
    <div class="header">
        <h3>Export Excel</h3>
        <h3>Datos Clientes</h3>
        {{-- <h4 style="line-height: 0px;">Invoice: #{{ $penjualan->invoice }}</h4>
        <p><small style="opacity: 0.5;">{{ $penjualan->created_at->format('d-m-Y H:i:s') }}</small></p> --}}
    </div>
    @if (!empty($start_date))
        <div class="customer">
            <table>
                <tr>
                    <th>Partir de la fecha</th>
                    <td></td>
                    <td>{{ $start_date }}</td>
                </tr>
                <tr>
                    <th>Hasta la fecha</th>
                    <td></td>
                    <td>{{ $end_date }}</td>
                </tr>
            </table>
        </div>
    @else 
        <p>Fecha impresa : {{ date("d-m-Y") }}</p>
        <p></p>       
        <p></p>       
    @endif
    <div class="page">
        <table>
            <thead>
                <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Telefono</th>
                <th>Celular</th>
                <th>Correo</th>
                <th>Empresa</th>
                <th>Direccion</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($cliente as $row)
                <tr >
                    <td style="text-align:center; border: 1px solid black">{{ $loop->iteration }}</td>
                    <td style="text-align:left; border: 1px solid black">{{ $row->nombre_cliente }}</td>
                    <td style="text-align:left; border: 1px solid black">{{ $row->telefono }}</td>
                    <td style="text-align:left; border: 1px solid black">{{ $row->celular }}</td>
                    <td style="text-align:left; border: 1px solid black">{{ $row->correo }}</td>
                    <td style="text-align:left; border: 1px solid black">{{ $row->empresa->nombre_empresa }}</td>
                    <td style="text-align:left; border: 1px solid black">{{ $row->direccion }}</td>
                    {{-- <td style="text-align:left; border: 1px solid black">{{ date_format(date_create($row->created_at), "d/m/Y") }}</td> --}}
                </tr>

                @empty
                <tr>
                    <td colspan="5" class="text-center">Sin Datos</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>