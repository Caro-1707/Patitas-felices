<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Patitas Felices – Adopción de Animales</title>
  <link rel="stylesheet" href="{{ asset('css/inicio.css') }}" />
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400&family=Nunito:wght@300;400;600;700&display=swap" rel="stylesheet"/>
</head>
<body>

  <!-- Huellas flotantes de fondo -->
  <div class="paws-bg" aria-hidden="true">
    <span class="paw p1">🐾</span>
    <span class="paw p2">🐾</span>
    <span class="paw p3">🐾</span>
    <span class="paw p4">🐾</span>
    <span class="paw p5">🐾</span>
    <span class="paw p6">🐾</span>
    <span class="paw p7">🐾</span>
    <span class="paw p8">🐾</span>
  </div>

  <!-- HEADER / HERO -->
  <header class="hero">
    <nav class="navbar">
      <div class="logo">
        <span class="logo-icon">🐾</span>
        <span class="logo-text">Patitas Felices</span>
      </div>
      <ul class="nav-links">
        <li><a href="#como">¿Cómo funciona?</a></li>
        <li><a href="#ofrecemos">Lo que ofrecemos</a></li>
        <li><a href="#contacto">Contacto</a></li>
      </ul>
      
    </nav>

    <div class="hero-content">
      <p class="hero-tag">🐾 Encuentra tu compañero ideal</p>
      <h1 class="hero-title">
        Cada patita<br/>
        <em>merece un hogar</em>
      </h1>
      <p class="hero-desc">
        Cientos de gatos y perros esperan una familia amorosa.<br/>
        Adoptar cambia dos vidas: la de ellos y la tuya.
      </p>
      <div class="hero-btns">
        <a href="{{ route('crearCuenta') }}" class="btn-primary">Crear cuenta 🐾</a>
        <a href="{{ route('login') }}" class="btn-secondary">Iniciar sesión</a>
      </div>
      <div class="hero-stats">
        <div class="stat"><strong>+320</strong><span>adoptados</span></div>
        <div class="stat-divider"></div>
        <div class="stat"><strong>48</strong><span>en espera</span></div>
        <div class="stat-divider"></div>
        <div class="stat"><strong>100%</strong><span>amor garantizado</span></div>
      </div>
    </div>

    <div class="hero-art">
      <div class="hero-bubble bubble1">🐶</div>
      <div class="hero-bubble bubble2">🐱</div>
      <div class="hero-bubble bubble3">🐾</div>
    </div>
  </header>

  <!-- CÓMO FUNCIONA -->
  <section id="como" class="section-como">
    <div class="section-header">
      <span class="section-tag">Proceso fácil</span>
      <h2>¿Cómo <em>adoptar</em>?</h2>
      <p>Te acompañamos en cada paso del proceso</p>
    </div>
    <div class="pasos-grid">
      <div class="paso">
        <div class="paso-icon">🔍</div>
        <div class="paso-num">01</div>
        <h3>Elige tu compañero</h3>
        <p>Explora nuestros perfiles y encuentra al animal que conecte con tu estilo de vida.</p>
      </div>
      <div class="paso-arrow">🐾</div>
      <div class="paso">
        <div class="paso-icon">📋</div>
        <div class="paso-num">02</div>
        <h3>Llena el formulario</h3>
        <p>Completa nuestra solicitud de adopción. Es sencilla y rápida, ¡promesa!</p>
      </div>
      <div class="paso-arrow">🐾</div>
      <div class="paso">
        <div class="paso-icon">🤝</div>
        <div class="paso-num">03</div>
        <h3>Conoce al animal</h3>
        <p>Agenda una visita o videollamada para que se conozcan antes de la adopción.</p>
      </div>
      <div class="paso-arrow">🐾</div>
      <div class="paso">
        <div class="paso-icon">🏠</div>
        <div class="paso-num">04</div>
        <h3>¡Bienvenido a casa!</h3>
        <p>Una vez aprobado, tu nuevo amigo llega a casa. ¡Comienza la aventura juntos!</p>
      </div>
    </div>
  </section>

  <!-- BANNER CTA -->
  <section class="banner-cta">
    <div class="banner-inner">
      <div class="banner-paws" aria-hidden="true">🐾🐾🐾🐾🐾</div>
      <h2>¿Listo para cambiar una vida?</h2>
      <p>Adoptar es el acto más hermoso de amor. Hoy puedes ser el hogar que alguien espera.</p>
      <a href="#contacto" class="btn-primary">Iniciar mi adopción 🐾</a>
    </div>
  </section>

  <!-- LO QUE OFRECEMOS -->
  <section id="ofrecemos" class="section-ofrecemos">
    <div class="section-header">
      <span class="section-tag">Nuestros servicios</span>
      <h2>Lo que <em>ofrecemos</em></h2>
      <p>Todo lo que necesitas para una adopción segura, amorosa y responsable</p>
    </div>
    <div class="ofrecemos-grid">

      <div class="ofrecemos-card">
        <div class="ofrecemos-icon">💉</div>
        <h3>Vacunación completa</h3>
        <p>Todos nuestros animales salen con su esquema de vacunación al día, garantizando su salud y la de tu familia.</p>
      </div>

      <div class="ofrecemos-card">
        <div class="ofrecemos-icon">✂️</div>
        <h3>Esterilización</h3>
        <p>Entregamos cada mascota esterilizada o con turno programado, contribuyendo al control responsable de la población animal.</p>
      </div>

      <div class="ofrecemos-card">
        <div class="ofrecemos-icon">🩺</div>
        <h3>Revisión veterinaria</h3>
        <p>Cada animal pasa por una revisión médica completa antes de ser dado en adopción. Conocerás su estado de salud al detalle.</p>
      </div>

      <div class="ofrecemos-card">
        <div class="ofrecemos-icon">🪪</div>
        <h3>Microchip y registro</h3>
        <p>Colocamos microchip de identificación y registramos a tu nueva mascota para que siempre puedas encontrarla.</p>
      </div>

      <div class="ofrecemos-card">
        <div class="ofrecemos-icon">📚</div>
        <h3>Guía de bienvenida</h3>
        <p>Te entregamos una guía personalizada con consejos de alimentación, cuidados y adaptación para los primeros días en casa.</p>
      </div>

      <div class="ofrecemos-card">
        <div class="ofrecemos-icon">🤝</div>
        <h3>Seguimiento post-adopción</h3>
        <p>Te acompañamos durante el período de adaptación con asesoría gratuita para que la convivencia sea perfecta.</p>
      </div>

      <div class="ofrecemos-card">
        <div class="ofrecemos-icon">🐾</div>
        <h3>Desparasitación</h3>
        <p>Entregamos cada mascota desparasitada interna y externamente, lista para convivir contigo y con tu hogar.</p>
      </div>

      <div class="ofrecemos-card">
        <div class="ofrecemos-icon">❤️</div>
        <h3>Adopción responsable</h3>
        <p>Realizamos una entrevista de compatibilidad para asegurarnos de que el animal y tu familia sean el match perfecto.</p>
      </div>

    </div>
  </section>

  <!-- CONTACTO -->
  <section id="contacto" class="section-contacto">
    <div class="section-header">
      <span class="section-tag">Escríbenos</span>
      <h2>¿Quieres <em>adoptar</em>?</h2>
      <p>Nuestro equipo está listo para acompañarte en el proceso</p>
    </div>
    <div class="contacto-info contacto-info--centered">
        <div class="info-item">
          <span class="info-icon">📍</span>
          <div>
            <strong>Dirección</strong>
            <p>Calle de las Patitas 123, Bogotá, Colombia</p>
          </div>
        </div>
        <div class="info-item">
          <span class="info-icon">📞</span>
          <div>
            <strong>Teléfono</strong>
            <p>+57 300 123 4567</p>
          </div>
        </div>
        <div class="info-item">
          <span class="info-icon">✉️</span>
          <div>
            <strong>Email</strong>
            <p>hola@patitasfelices.co</p>
          </div>
        </div>
        <div class="info-item">
          <span class="info-icon">🕐</span>
          <div>
            <strong>Horario</strong>
            <p>Lun – Sáb: 8am – 6pm</p>
          </div>
        </div>
    </div>
  </section>

  <!-- FOOTER -->
  <footer class="footer">
    <div class="footer-inner">
      <div class="footer-logo">
        <span>🐾</span> Patitas Felices
      </div>
      <p>Hecho con ❤️ para cada patita que merece un hogar.</p>
      <div class="footer-paws" aria-hidden="true">🐾 🐾 🐾 🐾 🐾</div>
    </div>
  </footer>

  <!-- Modal de adopción -->
  <div class="modal-overlay" id="modal" onclick="closeModal()">
    <div class="modal-box" onclick="event.stopPropagation()">
      <button class="modal-close" onclick="closeModal()">✕</button>
      <div class="modal-icon">🐾</div>
      <h3 id="modal-title">¡Genial!</h3>
      <p id="modal-msg">Gracias por querer adoptar. Nos pondremos en contacto contigo pronto.</p>
      <button class="btn-primary" onclick="closeModal()">¡Perfecto!</button>
    </div>
  </div>

 
</body>
</html>