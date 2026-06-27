<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Crear Animal – Admin Patitas Felices</title>
  <link rel="stylesheet" href="{{ asset('css/crearMascota.css') }}" />
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

  <!-- CONTENIDO PRINCIPAL -->
  <div class="admin-wrapper">

    <!-- Topbar -->
    <header class="topbar">
      <div class="topbar-left">
        <h1>Registrar Animal</h1>
        <div class="breadcrumb">
          <a href="{{ route('admin.dashboard') }}">Inicio</a>
          <span>›</span>
          <a href="{{ route('admin.crear.mascota') }}">Animales</a>
          <span>›</span>
          <span>Nuevo animal</span>
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
      <div class="form-layout">

        <!-- Formulario -->
        <div class="form-card">
          <div class="form-card-header">
            <div class="form-card-icon">🐾</div>
            <div>
              <h2>Nuevo animal</h2>
              <p>Completa la información del animal para publicarlo en adopción</p>
            </div>
          </div>

          <form class="admin-form"
                action="{{ route('mascota.store') }}"
                method="POST"
                enctype="multipart/form-data">
            @csrf

            <!-- Información básica -->
            <div class="form-section">
              <h3 class="form-section-title">📋 Información básica</h3>

              <div class="form-row">
                <div class="form-group">
                  <label>Nombre <span class="req">*</span></label>
                  <div class="input-wrap">
                    <span class="input-icon">✏️</span>
                    <input type="text" name="nombre" placeholder="Ej: Coco, Luna..." required />
                  </div>
                </div>
                <div class="form-group">
                  <label>Categoría <span class="req">*</span></label>
                  <div class="input-wrap input-wrap--select">
                    <span class="input-icon">🏷️</span>
                    <select name="categoria_id" required>
                      <option value="">Seleccionar categoría</option>
                      @foreach($categorias as $categoria)
                        <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
              </div>

              <div class="form-row">
                <div class="form-group">
                  <label>Raza <span class="req">*</span></label>
                  <div class="input-wrap">
                    <span class="input-icon">🐾</span>
                    <input type="text" name="raza" placeholder="Ej: Golden Mix, Siamés..." required />
                  </div>
                </div>
                <div class="form-group">
                  <label>Edad <span class="req">*</span></label>
                  <div class="input-wrap">
                    <span class="input-icon">🎂</span>
                    <input type="number" name="edad" min="0" placeholder="Ej: 2" required />
                  </div>
                </div>
              </div>

              <div class="form-row">
                <div class="form-group">
                  <label>Sexo <span class="req">*</span></label>
                  <div class="input-wrap input-wrap--select">
                    <span class="input-icon">⚥</span>
                    <select name="sexo" required>
                      <option value="">Seleccionar</option>
                      <option value="Macho">Macho</option>
                      <option value="Hembra">Hembra</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label>Estado <span class="req">*</span></label>
                  <div class="input-wrap input-wrap--select">
                    <span class="input-icon">📌</span>
                    <select name="estado" required>
                      <option value="Disponible">Disponible</option>
                      <option value="En proceso">En proceso</option>
                      <option value="Adoptada">Adoptada</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>

            <!-- Descripción -->
            <div class="form-section">
              <h3 class="form-section-title">📝 Descripción</h3>
              <div class="form-group">
                <label>Descripción <span class="req">*</span></label>
                <textarea name="descripcion" rows="5"
                  placeholder="Describe la personalidad del animal, sus gustos, cómo se lleva con otros animales o niños..."
                  required></textarea>
              </div>
            </div>

            <!-- Foto -->
            <div class="form-section">
              <h3 class="form-section-title">📷 Foto</h3>
              <div class="form-group">
                <label>Foto del animal</label>
                <div class="file-drop" onclick="document.getElementById('foto-input').click()">
                  <span class="file-drop-icon">📷</span>
                  <p>Haz clic para seleccionar una imagen</p>
                  <small id="file-name">JPG, PNG o WEBP</small>
                  <input type="file" id="foto-input" name="foto" accept="image/*"
                    style="display:none" onchange="mostrarNombre(this)" />
                </div>
              </div>
            </div>

            <div class="form-actions">
              <a href="{{ route('admin.crear.mascota') }}" class="btn-cancel">Cancelar</a>
              <button type="submit" class="btn-save">Guardar Mascota 🐾</button>
            </div>

          </form>
        </div>

        <!-- Panel lateral -->
        <div class="form-aside">

          <div class="aside-card">
            <h3 class="aside-title">Vista previa de tarjeta</h3>
            <div class="animal-preview-card">
              <div class="prev-card-img" id="prev-card-img">
                <span id="prev-emoji">🐾</span>
                <div class="prev-card-badge" id="prev-cat-badge">Categoría</div>
                <div class="prev-card-estado estado-disponible" id="prev-estado-badge">Disponible</div>
              </div>
              <div class="prev-card-body">
                <h4 id="prev-animal-nombre">Nombre del animal</h4>
                <p class="prev-animal-raza" id="prev-animal-raza">Raza</p>
                <div class="prev-tags" id="prev-tags-container"></div>
              </div>
            </div>
          </div>

          <div class="aside-card aside-tip">
            <div class="tip-icon">💡</div>
            <p>Agrega al menos 2–3 etiquetas para que los usuarios encuentren más fácil al animal.</p>
          </div>

          <div class="aside-card aside-tip aside-tip--pink">
            <div class="tip-icon">🐾</div>
            <p>Los animales marcados como <strong>Disponible</strong> aparecen de inmediato en la vista de usuarios.</p>
          </div>

        </div>
      </div>
    </main>
  </div>

  <!-- Toast -->
  <div class="toast" id="toast">
    <span class="toast-icon">✅</span>
    <span id="toast-msg">¡Animal publicado!</span>
  </div>


</body>
</html>