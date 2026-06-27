<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Panel de Administración – Patitas Felices</title>
  <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}" />
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
      <a href="#" class="sidebar-link active">
        <span>📊</span> Dashboard
      </a>
      
      <a href="{{ route('admin.categorias') }}" class="sidebar-link">
        <span>🏷️</span> Categorías
      </a>

      <a href="{{ route('solicitudes.index') }}">
    Ver solicitudes
</a>
     
    
    </nav>
    <form action="{{ route('logout') }}" method="POST" class="sidebar-logout-form">
    @csrf
    <button type="submit" class="sidebar-logout">
        <span>🚪</span> Cerrar sesión
    </button>
</form>
  </aside>

  <!-- CONTENIDO -->
  <div class="admin-wrapper">

    <!-- Topbar -->
    <header class="topbar">
      <div class="topbar-left">
        <h1>Panel de Administración</h1>
        <p class="topbar-sub">Bienvenido de vuelta 🐾</p>
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

      <div class="acciones-grid">

        <a href="{{ route('admin.crear.mascota') }}" class="accion-card">
          <div class="accion-icon">🐾</div>
          <div class="accion-info">
            <h2>Crear Mascota</h2>
            <p>Registra un nuevo animal disponible para adopción</p>
          </div>
          <span class="accion-arrow">→</span>
        </a>

        <a href="{{ route('admin.crear.categoria') }}" class="accion-card">
          <div class="accion-icon">🏷️</div>
          <div class="accion-info">
            <h2>Crear Categoría</h2>
            <p>Agrega una nueva categoría de animales a la plataforma</p>
          </div>
          <span class="accion-arrow">→</span>
        </a>
      <a href="{{ route('mascotas.pdf') }}" class="accion-card">

    <div class="accion-icon">📄</div>

    <div class="accion-info">

        <h2>Reporte PDF</h2>

        <p>Descargar reporte de mascotas registradas</p>

    </div>

    
    

</a>
    <a href="{{ route('estadisticas.excel') }}" class="accion-card">

    <div class="accion-icon">
        📊
    </div>

    <div class="accion-info">

        <h2>Reporte Excel</h2>

        <p>Descargar estadísticas del sistema</p>

    </div>

    <span class="accion-arrow">
        ↓
    </span>

</a>
      </div>

    </main>
  </div>

</body>
</html>