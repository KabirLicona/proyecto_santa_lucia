<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Datos Producto</title>
</head>
<body>
    <div class="header">
        <h3>Export Excel</h3>
        <h3>Datos Producto</h3>
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
                    <th>Nombre Producto</th>
                    <th>Categoria</th>
                    <th>Stok</th>
                    <th>Precio Compra</th>
                    <th>HaPrecio Venta</th>
                    <th>Descripcion</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($producto as $row)
                <tr >
                    <td style="text-align:center; border: 1px solid black">{{ $loop->iteration }}</td>
                    <td style="text-align:left; border: 1px solid black">{{ $row->nombre_producto }}</td>
                    <td style="text-align:left; border: 1px solid black">{{ $row->categoria->nombre_categoria }}</td>
                    <td style="text-align:center; border: 1px solid black">{{ $row->stok }}</td>
                    <td style="text-align:right; border: 1px solid black">Rp {{ number_format($row->precio_compra) }}</td>
                    <td style="text-align:right; border: 1px solid black">Rp {{ number_format($row->precio_venta) }}</td>
                    <td style="text-align:left; border: 1px solid black">{{ $row->descripcion }}</td>
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