<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Listado de Mascotas – Admin Patitas Felices</title>
  <link rel="stylesheet" href="{{ asset('css/registroMascota.css') }}" />
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400&family=Nunito:wght@300;400;600;700&display=swap" rel="stylesheet"/>
</head>
<body>

  <!-- SIDEBAR -->
  <aside class="sidebar">
    <div class="sidebar-logo">
      <span>🐾</span>
      <span>Patitas Felices</span>
    </div>
    <nav class="sidebar-nav">
      <a href="{{ route('admin.crear.mascota') }}" class="sidebar-link">
        <span>📊</span> Dashboard
      </a>
      <a href="{{ route('mascota.index') }}" class="sidebar-link active">
        <span>🐾</span> Mascotas
      </a>
      <a href="{{ route('admin.crear.categoria') }}" class="sidebar-link">
        <span>🏷️</span> Categorías
      </a>
    </nav>
    <a href="{{ route('logout') }}" class="sidebar-logout">
      <span>🚪</span> Cerrar sesión
    </a>
  </aside>

  <!-- CONTENIDO -->
  <div class="admin-wrapper">

    <!-- Topbar -->
    <header class="topbar">
      <div class="topbar-left">
        <h1>Mascotas Registradas</h1>
        <div class="breadcrumb">
          <a href="{{ route('admin.dashboard') }}">Inicio</a>
          <span>›</span>
          <span>Mascotas</span>
        </div>
      </div>
      <div class="topbar-right">
        <a href="{{ route('admin.crear.mascota') }}" class="btn-nueva">
          + Crear nueva mascota
        </a>
        <div class="admin-avatar">👤</div>
        <div>
          <p class="admin-name">Administrador</p>
          <p class="admin-role">Admin</p>
        </div>
      </div>
    </header>

    <main class="admin-main">

      @if(session('success'))
        <div class="alert alert-success">
          <span>✅</span> {{ session('success') }}
        </div>
      @endif

      <div class="table-card">
        <table class="admin-table">
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
              <th>Descripción</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>

            @forelse($mascotas as $mascota)
              <tr>

                <td class="td-id">#{{ $mascota->id }}</td>

                <td class="td-foto">
                  @if($mascota->foto)
                    <img src="{{ asset('storage/' . $mascota->foto) }}" alt="{{ $mascota->nombre }}" />
                  @else
                    <div class="sin-foto">🐾</div>
                  @endif
                </td>

                <td class="td-nombre">{{ $mascota->nombre }}</td>

                <td>
                  <span class="badge-categoria">
                    {{ $mascota->categoria->nombre ?? 'Sin categoría' }}
                  </span>
                </td>

                <td>{{ $mascota->raza }}</td>

                <td>{{ $mascota->edad }} años</td>

                <td>{{ $mascota->sexo }}</td>

                <td>
                  <span class="badge-estado badge-{{ Str::slug($mascota->estado) }}">
                    {{ $mascota->estado }}
                  </span>
                </td>

                <td class="td-desc">{{ $mascota->descripcion }}</td>

                <td class="td-acciones">
                  <a href="{{ route('mascota.edit', $mascota->id) }}" class="btn-editar">
                    ✏️ Editar
                  </a>
                  <form action="{{ route('mascota.destroy', $mascota->id) }}"
                        method="POST"
                        onsubmit="return confirm('¿Eliminar esta mascota?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-eliminar">🗑️ Eliminar</button>
                  </form>
                </td>

              </tr>
            @empty
              <tr>
                <td colspan="10" class="td-empty">
                  <span>🐾</span>
                  <p>No hay mascotas registradas</p>
                </td>
              </tr>
            @endforelse

          </tbody>
        </table>
      </div>

    </main>
  </div>

</body>
</html>