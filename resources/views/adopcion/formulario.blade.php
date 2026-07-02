<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Solicitud de Adopción – Patitas Felices</title>
  <link rel="stylesheet" href="{{ asset('css/formularioMascota.css') }}" />
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400&family=Nunito:wght@300;400;600;700&display=swap" rel="stylesheet"/>
</head>
<body>

  <!-- Huellas flotantes -->
  <div class="paws-bg" aria-hidden="true">
    <span class="paw p1">🐾</span>
    <span class="paw p2">🐾</span>
    <span class="paw p3">🐾</span>
    <span class="paw p4">🐾</span>
    <span class="paw p5">🐾</span>
  </div>

  <!-- NAVBAR -->
  <nav class="navbar">
    <a href="{{ route('inicio') }}" class="logo">
      <span class="logo-icon">🐾</span>
      <span class="logo-text">Patitas Felices</span>
    </a>
  </nav>

  <main class="main-wrapper">
    <div class="page-layout">

      <!-- Tarjeta info de la mascota -->
      <aside class="mascota-aside">
        <div class="aside-card">

          @if($mascota->foto)
            <div class="mascota-img">
              <img src="{{ asset('storage/' . $mascota->foto) }}" alt="{{ $mascota->nombre }}" />
            </div>
          @else
            <div class="mascota-img mascota-img--empty">🐾</div>
          @endif

          <div class="mascota-info">
            <h2>{{ $mascota->nombre }}</h2>
            <p class="mascota-raza">{{ $mascota->raza }}</p>
            <div class="mascota-meta">
              <span class="meta-item">
                <strong>Categoría</strong>
                {{ $mascota->categoria->nombre ?? 'Sin categoría' }}
              </span>
            </div>
          </div>

        </div>

        <div class="aside-tip">
          <span class="tip-icon">💡</span>
          <p>Completa el formulario con honestidad. Queremos asegurarnos de que sea el hogar perfecto para <strong>{{ $mascota->nombre }}</strong>.</p>
        </div>
      </aside>

      <!-- Formulario -->
      <div class="form-card">
        <div class="form-card-header">
          <div class="form-card-icon">🐾</div>
          <div>
            <h1>Formulario de Adopción</h1>
            <p>Cuéntanos sobre ti y tu hogar</p>
          </div>
        </div>

        <form class="adopcion-form" action="{{ route('solicitud.store') }}" method="POST">
          @csrf

          <input type="hidden" name="mascota_id" value="{{ $mascota->id }}" />

          <div class="form-section">
            <h3 class="form-section-title">🏠 Tu hogar</h3>

            <div class="form-row">
              <div class="form-group">
                <label for="vivienda">Tipo de vivienda <span class="req">*</span></label>
                <div class="input-wrap">
                  <span class="input-icon">🏠</span>
                  <input type="text" id="vivienda" name="vivienda"
                         placeholder="Ej: Casa, Apartamento, Finca..." required />
                </div>
              </div>
              <div class="form-group">
                <label for="tiempo_disponible">Tiempo disponible al día <span class="req">*</span></label>
                <div class="input-wrap">
                  <span class="input-icon">🕐</span>
                  <input type="text" id="tiempo_disponible" name="tiempo_disponible"
                         placeholder="Ej: 4 horas, Todo el día..." required />
                </div>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group">
                <label for="tiene_patio">¿Tiene patio? <span class="req">*</span></label>
                <div class="input-wrap input-wrap--select">
                  <span class="input-icon">🌿</span>
                  <select id="tiene_patio" name="tiene_patio" required>
                    <option value="">Seleccione</option>
                    <option value="1">Sí</option>
                    <option value="0">No</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="tiene_otras_mascotas">¿Tiene otras mascotas? <span class="req">*</span></label>
                <div class="input-wrap input-wrap--select">
                  <span class="input-icon">🐾</span>
                  <select id="tiene_otras_mascotas" name="tiene_otras_mascotas" required>
                    <option value="">Seleccione</option>
                    <option value="1">Sí</option>
                    <option value="0">No</option>
                  </select>
                </div>
              </div>
            </div>
          </div>

          <div class="form-section">
            <h3 class="form-section-title">💬 Tu experiencia</h3>

            <div class="form-group">
              <label for="experiencia_mascotas">Experiencia con mascotas <span class="req">*</span></label>
              <textarea id="experiencia_mascotas" name="experiencia_mascotas" rows="4"
                placeholder="Cuéntanos si has tenido mascotas antes y cómo fue esa experiencia..." required></textarea>
            </div>

            <div class="form-group">
              <label for="motivo_adopcion">¿Por qué desea adoptar a {{ $mascota->nombre }}? <span class="req">*</span></label>
              <textarea id="motivo_adopcion" name="motivo_adopcion" rows="5"
                placeholder="Cuéntanos qué te motivó a querer adoptar a esta mascota..." required></textarea>
            </div>
          </div>

          <div class="form-actions">
            <a href="{{ url()->previous() }}" class="btn-cancel">Cancelar</a>
            <button type="submit" class="btn-save">Enviar Solicitud 🐾</button>
          </div>

        </form>
      </div>

    </div>
  </main>

  <!-- Footer -->
  <footer class="footer">
    <div class="footer-inner">
      <span class="footer-logo">🐾 Patitas Felices</span>
      <p>Hecho con ❤️ para cada patita que merece un hogar.</p>
    </div>
  </footer>

</body>
</html>