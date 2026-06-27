<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitud de Adopción</title>
</head>
<body>

    <h1>Formulario de Adopción 🐾</h1>

    <h2>Información de la mascota</h2>

    <p><strong>Nombre:</strong> {{ $mascota->nombre }}</p>

    <p><strong>Categoría:</strong>
        {{ $mascota->categoria->nombre ?? 'Sin categoría' }}
    </p>

    <p><strong>Raza:</strong>
        {{ $mascota->raza }}
    </p>

    @if($mascota->foto)
        <img
            src="{{ asset('storage/' . $mascota->foto) }}"
            alt="{{ $mascota->nombre }}"
            width="250"
        >
    @endif

    <hr>

    <form action="{{ route('solicitud.store') }}" method="POST">

        @csrf

        <input
            type="hidden"
            name="mascota_id"
            value="{{ $mascota->id }}"
        >

        <div>
            <label>Tipo de vivienda:</label>
            <br>
            <input
                type="text"
                name="vivienda"
                required
            >
        </div>

        <br>

        <div>
            <label>¿Tiene patio?</label>
            <br>

            <select name="tiene_patio" required>
                <option value="">Seleccione</option>
                <option value="1">Sí</option>
                <option value="0">No</option>
            </select>
        </div>

        <br>

        <div>
            <label>¿Tiene otras mascotas?</label>
            <br>

            <select name="tiene_otras_mascotas" required>
                <option value="">Seleccione</option>
                <option value="1">Sí</option>
                <option value="0">No</option>
            </select>
        </div>

        <br>

        <div>
            <label>Experiencia con mascotas:</label>
            <br>

            <textarea
                name="experiencia_mascotas"
                rows="4"
                cols="50"
                required
            ></textarea>
        </div>

        <br>

        <div>
            <label>¿Por qué desea adoptar esta mascota?</label>
            <br>

            <textarea
                name="motivo_adopcion"
                rows="5"
                cols="50"
                required
            ></textarea>
        </div>

        <br>

        <div>
            <label>¿Cuánto tiempo puede dedicarle al día?</label>
            <br>

            <input
                type="text"
                name="tiempo_disponible"
                required
            >
        </div>

        <br>

        <button type="submit">
            Enviar Solicitud 🐾
        </button>

    </form>

</body>
</html>