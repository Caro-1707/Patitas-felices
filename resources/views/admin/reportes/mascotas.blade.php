<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Reporte de Mascotas</title>

    <style>

        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            color: #3D2B1F;
            margin: 0;
            padding: 30px 35px;
        }

        /* ===== Encabezado ===== */
        .header {
            text-align: center;
            margin-bottom: 20px;
            padding-bottom: 16px;
            border-bottom: 2px solid #F4AEBB;
        }

        .header .logo {
            font-size: 26px;
            font-weight: bold;
            color: #C0546A;
            margin-bottom: 4px;
        }

        .header h3 {
            margin: 4px 0 10px;
            font-size: 13px;
            font-weight: normal;
            color: #6B4C38;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .header .fecha {
            display: inline-block;
            background-color: #FADADD;
            color: #C0546A;
            font-size: 11px;
            font-weight: bold;
            padding: 4px 14px;
            border-radius: 12px;
        }

        /* ===== Tabla ===== */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        table th {
            background-color: #C0546A;
            color: #FFFFFF;
            padding: 8px 6px;
            border: 1px solid #C0546A;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        table td {
            border: 1px solid #EAE0D0;
            padding: 7px 6px;
            text-align: center;
            font-size: 11px;
        }

        table tbody tr:nth-child(even) {
            background-color: #FDF8F3;
        }

        img {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 6px;
            border: 1px solid #EAE0D0;
        }

        .sin-foto {
            display: inline-block;
            width: 60px;
            height: 60px;
            line-height: 60px;
            background-color: #FADADD;
            border-radius: 6px;
            color: #C0546A;
            font-size: 10px;
        }

        .badge {
            display: inline-block;
            padding: 3px 10px;
            border-radius: 10px;
            font-size: 10px;
            font-weight: bold;
        }

        .badge-disponible { background-color: #E8F7EE; color: #2E8050; }
        .badge-en-proceso  { background-color: #FFF3E0; color: #C96B2E; }
        .badge-adoptado    { background-color: #FADADD; color: #C0546A; }

        /* ===== Footer ===== */
        .footer {
            margin-top: 22px;
            padding-top: 14px;
            border-top: 2px solid #F4AEBB;
            text-align: center;
            font-size: 11px;
            color: #6B4C38;
        }

        .footer .total {
            display: inline-block;
            background-color: #F5EFE6;
            padding: 5px 16px;
            border-radius: 10px;
            font-weight: bold;
            color: #3D2B1F;
            margin-bottom: 6px;
        }

        .footer .sistema {
            font-size: 10px;
            color: #A07860;
        }

    </style>
</head>
<body>

    <div class="header">
        <div class="logo">🐾 Patitas Felices</div>
        <h3>Reporte General de Mascotas</h3>
        <span class="fecha">📅 {{ date('d/m/Y') }}</span>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Foto</th>
                <th>Nombre</th>
                <th>Categoría</th>
                <th>Raza</th>
                <th>Edad</th>
                <th>Sexo</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach($mascotas as $mascota)
                <tr>
                    <td>#{{ $mascota->id }}</td>

                    <td>
                        @if($mascota->foto)
                            <img src="{{ public_path('storage/'.$mascota->foto) }}">
                        @else
                            <span class="sin-foto">🐾</span>
                        @endif
                    </td>

                    <td><strong>{{ $mascota->nombre }}</strong></td>
                    <td>{{ $mascota->categoria->nombre ?? 'Sin categoría' }}</td>
                    <td>{{ $mascota->raza }}</td>
                    <td>{{ $mascota->edad }}</td>
                    <td>{{ $mascota->sexo }}</td>

                    <td>
                        <span class="badge badge-{{ Str::slug($mascota->estado) }}">
                            {{ $mascota->estado }}
                        </span>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        <div class="total">Total de mascotas: {{ $mascotas->count() }}</div>
        <br>
        <div class="sistema">Sistema de Gestión de Adopciones · Patitas Felices</div>
    </div>

</body>
</html>