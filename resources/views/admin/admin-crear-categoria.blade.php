<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Categorías – Admin Patitas Felices</title>
  <link rel="stylesheet" href="{{ asset('css/crearCategoria.css') }}" />
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
      <a href="{{ route('mascota.index') }}" class="sidebar-link">
        <span>🐾</span> Mascotas
      </a>
      <a href="{{ route('categoria.index') }}" class="sidebar-link active">
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
        <h1>Listado de Categorías</h1>
        <div class="breadcrumb">
          <a href="{{ route('admin.dashboard') }}">Inicio</a>
          <span>›</span>
          <span>Categorías</span>
        </div>
      </div>
      <div class="topbar-right">
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

      <div class="main-grid">

        <!-- Tabla -->
        <div class="table-card">
          <table class="admin-table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>

              @forelse($categorias as $categoria)
                <tr>
                  <td class="td-id">#{{ $categoria->id }}</td>
                  <td class="td-nombre">
                    <span class="cat-icon">🏷️</span>
                    {{ $categoria->nombre }}
                  </td>
                  <td class="td-acciones">
                    <a href="{{ route('categoria.edit', $categoria->id) }}" class="btn-editar">
                      ✏️ Editar
                    </a>
                    <form action="{{ route('categoria.destroy', $categoria->id) }}"
                          method="POST"
                          onsubmit="return confirm('¿Eliminar esta categoría?')">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn-eliminar">🗑️ Eliminar</button>
                    </form>
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="3" class="td-empty">
                    <span>🏷️</span>
                    <p>No hay categorías registradas</p>
                  </td>
                </tr>
              @endforelse

            </tbody>
          </table>
        </div>

        <!-- Formulario crear -->
        <div class="form-card">
          <div class="form-card-header">
            <div class="form-card-icon">🏷️</div>
            <div>
              <h2>Crear Categoría</h2>
              <p>Agrega una nueva categoría</p>
            </div>
          </div>

          <form class="admin-form" action="{{ route('categoria.store') }}" method="POST">
            @csrf

            <div class="form-group">
              <label for="nombre">Nombre de la categoría</label>
              <div class="input-wrap">
                <span class="input-icon">🏷️</span>
                <input type="text" id="nombre" name="nombre"
                       placeholder="Ej: Perros, Gatos..." required />
              </div>
            </div>

            <button type="submit" class="btn-save">Guardar categoría 🐾</button>

          </form>
        </div>

      </div>
    </main>
  </div>

</body>
</html>