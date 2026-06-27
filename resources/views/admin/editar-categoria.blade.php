<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Editar Categoría – Admin Patitas Felices</title>
  <link rel="stylesheet" href="{{ asset('css/editarCategoria.css') }}" />
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
      <a href="{{ route('admin.dashboard') }}" class="sidebar-link">
        <span>📊</span> Dashboard
      </a>
     
      <a href="{{ route('categoria.index') }}" class="sidebar-link active">
        <span>🏷️</span> Categorías
      </a>
      
    </nav>
    <a href="{{ route('logout') }}" class="sidebar-logout">
      <span>🚪</span> Cerrar sesión
    </a>
  </aside>

  <!-- CONTENIDO PRINCIPAL -->
  <div class="admin-wrapper">

    <!-- Topbar -->
    <header class="topbar">
      <div class="topbar-left">
        <h1>Editar Categoría</h1>
        <div class="breadcrumb">
          <a href="{{ route('admin.dashboard') }}">Inicio</a>
          <span>›</span>
          <a href="{{ route('categoria.index') }}">Categorías</a>
          <span>›</span>
          <span>Editar: {{ $categoria->nombre }}</span>
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

      <div class="form-card">
        <div class="form-card-header">
          <div class="form-card-icon">✏️</div>
          <div>
            <h2>Editar categoría</h2>
            <p>Modifica los datos de <strong>{{ $categoria->nombre }}</strong></p>
          </div>
        </div>

        <form class="admin-form" action="{{ route('categoria.update', $categoria->id) }}" method="POST">
          @csrf
          @method('PUT')

          <div class="form-group">
            <label for="nombre">Nombre <span class="req">*</span></label>
            <div class="input-wrap">
              <span class="input-icon">🏷️</span>
              <input
                type="text"
                id="nombre"
                name="nombre"
                value="{{ old('nombre', $categoria->nombre) }}"
                placeholder="Ej: Perros, Gatos..."
                required
              />
            </div>
            @error('nombre')
              <span class="input-error">⚠️ {{ $message }}</span>
            @enderror
          </div>

          <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea
              id="descripcion"
              name="descripcion"
              rows="4"
              placeholder="Describe brevemente esta categoría..."
            >{{ old('descripcion', $categoria->descripcion ?? '') }}</textarea>
            @error('descripcion')
              <span class="input-error">⚠️ {{ $message }}</span>
            @enderror
          </div>

          <div class="form-group">
            <label>Estado <span class="req">*</span></label>
            <div class="radio-group">
              <label class="radio-label">
                <input type="radio" name="estado" value="activa"
                  {{ old('estado', $categoria->estado ?? 'activa') === 'activa' ? 'checked' : '' }} />
                <span class="radio-custom"></span>
                <span class="radio-text">
                  <strong>✅ Activa</strong>
                  <small>Visible para los usuarios</small>
                </span>
              </label>
              <label class="radio-label">
                <input type="radio" name="estado" value="inactiva"
                  {{ old('estado', $categoria->estado ?? '') === 'inactiva' ? 'checked' : '' }} />
                <span class="radio-custom"></span>
                <span class="radio-text">
                  <strong>🚫 Inactiva</strong>
                  <small>Oculta para los usuarios</small>
                </span>
              </label>
            </div>
          </div>

          <div class="form-actions">
            <a href="{{ route('categoria.index') }}" class="btn-cancel">Cancelar</a>
            <button type="submit" class="btn-save">Guardar cambios 🐾</button>
          </div>

        </form>
      </div>

    </main>
  </div>

</body>
</html>