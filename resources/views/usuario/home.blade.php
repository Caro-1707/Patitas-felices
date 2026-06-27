<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Patitas Felices – Adopción</title>
  <link rel="stylesheet" href="{{ asset('css/home.css') }}" />
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
    <ul class="nav-links">
      <li><a href="{{ route('home') }}" class="active">Adoptar</a></li>
      <li><a href="#">Mis solicitudes</a></li>
      <li><a href="#">Favoritos ❤️</a></li>
    </ul>
    <div class="nav-user">
      <div class="user-avatar">👤</div>
      <div class="user-info">
        <span class="user-name">Hola, {{ Auth::user()->nombre ?? 'Usuario' }} 👋</span>
        <form action="{{ route('logout') }}" method="POST">
          @csrf
          <button type="submit" class="btn-logout">Cerrar sesión</button>
        </form>
      </div>
    </div>
  </nav>

  <!-- HERO -->
  <section class="hero">
    <div class="hero-content">
      <p class="hero-tag">🐾 Encuentra tu compañero ideal</p>
      <h1>Encuentra tu<br/><em>compañero ideal</em></h1>
      <p class="hero-desc">Adopta una mascota y cambia una vida para siempre.</p>
    </div>
  </section>

  <!-- CATEGORÍAS -->
  <section class="categorias">
    <div class="categorias-container">
     

    <a href="{{ route('home') }}" class="categoria-card">
        <span class="cat-icon">🐾</span>
        Todas
    </a>

    @forelse($categorias as $categoria)

        <a href="{{ route('categoria.filtrar', $categoria->id) }}"
           class="categoria-card">

            <span class="cat-icon">🏷️</span>
            {{ $categoria->nombre }}

        </a>

    @empty

        <p class="empty-msg">
            No hay categorías registradas.
        </p>

    @endforelse

</div>
  </section>

  <!-- MASCOTAS -->
  <section class="mascotas">
    <div class="section-header">
      <h2>Mascotas <em>Disponibles</em></h2>
    </div>

    <div class="mascotas-grid">
      @forelse($mascotas as $mascota)
        <div class="mascota-card">

          <div class="mascota-img">
            @if($mascota->foto)
              <img src="{{ asset('storage/'.$mascota->foto) }}" alt="{{ $mascota->nombre }}" />
            @else
              <div class="sin-foto">🐾</div>
            @endif
            <div class="mascota-estado badge-{{ Str::slug($mascota->estado) }}">
              {{ $mascota->estado }}
            </div>
          </div>

          <div class="mascota-info">
            <h3>{{ $mascota->nombre }}</h3>
            <p class="mascota-raza">{{ $mascota->raza }} · {{ $mascota->categoria->nombre ?? 'Sin categoría' }}</p>

            <div class="mascota-meta">
              <span>🎂 {{ $mascota->edad }}</span>
              <span>⚥ {{ $mascota->sexo }}</span>
            </div>

            <p class="mascota-desc">{{ $mascota->descripcion }}</p>

            <a href="{{ route('adopcion.create', $mascota->id) }}"
             class="btn-adoptar">
            Adoptar 🐾
            </a>

        </div>
      @empty
        <p class="empty-msg">No hay mascotas disponibles.</p>
      @endforelse
    </div>
  </section>

  <!-- FOOTER -->
  <footer class="footer">
    <div class="footer-inner">
      <span class="footer-logo">🐾 Patitas Felices</span>
      <p>Hecho con ❤️ para cada patita que merece un hogar.</p>
    </div>
  </footer>

</body>
</html>