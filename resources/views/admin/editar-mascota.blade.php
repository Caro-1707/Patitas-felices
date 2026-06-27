<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Mascota</title>
</head>
<body>

    <h1>Editar Mascota</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('mascota.update', $mascota->id) }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div>
            <label>Nombre</label>
            <input type="text"
                   name="nombre"
                   value="{{ old('nombre', $mascota->nombre) }}"
                   required>
        </div>

        <br>

        <div>
            <label>Categoría</label>

            <select name="categoria_id" required>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}"
                        {{ $categoria->id == $mascota->categoria_id ? 'selected' : '' }}>
                        {{ $categoria->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <br>

        <div>
            <label>Raza</label>
            <input type="text"
                   name="raza"
                   value="{{ old('raza', $mascota->raza) }}"
                   required>
        </div>

        <br>

        <div>
            <label>Edad</label>
            <input type="text"
                   name="edad"
                   value="{{ old('edad', $mascota->edad) }}"
                   required>
        </div>

        <br>

        <div>
            <label>Sexo</label>

            <select name="sexo" required>
                <option value="Macho"
                    {{ $mascota->sexo == 'Macho' ? 'selected' : '' }}>
                    Macho
                </option>

                <option value="Hembra"
                    {{ $mascota->sexo == 'Hembra' ? 'selected' : '' }}>
                    Hembra
                </option>
            </select>
        </div>

        <br>

        <div>
            <label>Descripción</label>

            <textarea name="descripcion" rows="5" required>{{ old('descripcion', $mascota->descripcion) }}</textarea>
        </div>

        <br>

        <div>
            <label>Estado</label>

            <select name="estado" required>
                <option value="Disponible"
                    {{ $mascota->estado == 'Disponible' ? 'selected' : '' }}>
                    Disponible
                </option>

                <option value="En proceso"
                    {{ $mascota->estado == 'En proceso' ? 'selected' : '' }}>
                    En proceso
                </option>

                <option value="Adoptado"
                    {{ $mascota->estado == 'Adoptado' ? 'selected' : '' }}>
                    Adoptado
                </option>
            </select>
        </div>

        <br>

        <div>
            <label>Foto actual</label>
            <br>

            @if($mascota->foto)
                <img src="{{ asset('storage/'.$mascota->foto) }}"
                     width="150">
            @else
                <p>No tiene foto</p>
            @endif
        </div>

        <br>

        <div>
            <label>Nueva Foto</label>
            <input type="file" name="foto">
        </div>

        <br><br>

        <button type="submit">
            Actualizar Mascota
        </button>

        <a href="{{ route('mascota.index') }}">
            Cancelar
        </a>

    </form>

</body>
</html>