<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Solicitudes de Adopción – Admin Patitas Felices</title>
  <link rel="stylesheet" href="{{ asset('css/solicitudes.css') }}" />
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
      <a href="{{ route('admin.crear.categoria') }}" class="sidebar-link">
        <span>🏷️</span> Categorías
      </a>
      <a href="#" class="sidebar-link active">
        <span>📋</span> Solicitudes
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
        <h1>Solicitudes de Adopción</h1>
        <div class="breadcrumb">
          <a href="{{ route('admin.dashboard') }}">Inicio</a>
          <span>›</span>
          <span>Solicitudes</span>
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
      <div class="table-card">
        <table class="admin-table">
          <thead>
            <tr>
              <th>Usuario</th>
              <th>Mascota</th>
              <th>Vivienda</th>
              <th>Patio</th>
              <th>Otras mascotas</th>
              <th>Experiencia</th>
              <th>Motivo</th>
              <th>Tiempo disponible</th>
              <th>Estado</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>

            @foreach($solicitudes as $solicitud)
              <tr>

                <td class="td-usuario">
                  <div class="user-chip">
                    <span class="user-chip-avatar">👤</span>
                    {{ $solicitud->user->nombre }}
                  </div>
                </td>

                <td class="td-mascota">
                  <span class="mascota-chip">🐾 {{ $solicitud->mascota->nombre }}</span>
                </td>

                <td>{{ $solicitud->vivienda }}</td>

                <td>
                  <span class="bool-badge {{ $solicitud->tiene_patio ? 'bool-si' : 'bool-no' }}">
                    {{ $solicitud->tiene_patio ? 'Sí' : 'No' }}
                  </span>
                </td>

                <td>
                  <span class="bool-badge {{ $solicitud->tiene_otras_mascotas ? 'bool-si' : 'bool-no' }}">
                    {{ $solicitud->tiene_otras_mascotas ? 'Sí' : 'No' }}
                  </span>
                </td>

                <td class="td-texto">{{ $solicitud->experiencia_mascotas }}</td>

                <td class="td-texto">{{ $solicitud->motivo_adopcion }}</td>

                <td>{{ $solicitud->tiempo_disponible }}</td>

                <td>
                  <span class="estado-badge estado-{{ Str::slug($solicitud->estado) }}">
                    {{ $solicitud->estado }}
                  </span>
                </td>

                <td class="td-acciones">
                  @if($solicitud->estado == 'Pendiente')
                    <form action="{{ route('solicitudes.aprobar', $solicitud->id) }}"
                          method="POST">
                      @csrf
                      @method('PUT')
                      <button type="submit" class="btn-aprobar">✅ Aprobar</button>
                    </form>

                    <form action="{{ route('solicitudes.rechazar', $solicitud->id) }}"
                          method="POST">
                      @csrf
                      @method('PUT')
                      <button type="submit" class="btn-rechazar">❌ Rechazar</button>
                    </form>
                  @else
                  
            <form action="{{ route('solicitudes.destroy', $solicitud->id) }}"
                  method="POST"
                  onsubmit="return confirm('¿Seguro que deseas eliminar esta solicitud?')">
                  @csrf
                  @method('DELETE')
                <button type="submit" class="btn-eliminar">🗑️ Eliminar</button>
            </form>

                  </form>
                    <span class="sin-acciones">—</span>
                  @endif

                </td>

              </tr>
            @endforeach

          </tbody>
        </table>
      </div>
    </main>
  </div>

</body>
</html>