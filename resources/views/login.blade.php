<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión – Patitas Felices</title>

    <link rel="stylesheet" href="{{ asset('css/login.css') }}">

    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400&family=Nunito:wght@300;400;600;700&display=swap" rel="stylesheet">
</head>
<body>

    <!-- Huellas flotantes -->
    <div class="paws-bg" aria-hidden="true">
        <span class="paw p1">🐾</span>
        <span class="paw p2">🐾</span>
        <span class="paw p3">🐾</span>
        <span class="paw p4">🐾</span>
        <span class="paw p5">🐾</span>
        <span class="paw p6">🐾</span>
    </div>

    <div class="auth-wrapper">

        <!-- Panel izquierdo -->
        <div class="auth-panel">

            <a href="{{ route('inicio') }}" class="panel-logo">
                <span>🐾</span> Patitas Felices
            </a>

            <div class="panel-content">

                <div class="panel-bubbles" aria-hidden="true">
                    <div class="pb pb1">🐶</div>
                    <div class="pb pb2">🐱</div>
                    <div class="pb pb3">🐾</div>
                </div>

                <h2>¡Bienvenido<br><em>de vuelta!</em></h2>

                <p>
                    Inicia sesión para ver los animales disponibles,
                    dar seguimiento a tu proceso y conectarte con tu
                    nuevo compañero.
                </p>

                <div class="panel-stats">
                    <div class="ps">
                        <strong>+320</strong>
                        <span>adoptados</span>
                    </div>

                    <div class="ps">
                        <strong>100%</strong>
                        <span>amor</span>
                    </div>
                </div>

            </div>

            <p class="panel-footer">
                ¿Aún no tienes cuenta?
                <a href="{{ route('crearCuenta') }}">Regístrate aquí</a>
            </p>

        </div>

        <!-- Formulario -->
        <div class="auth-form-side">

            <div class="auth-card">

                <div class="auth-card-header">
                    <div class="auth-icon">🐾</div>
                    <h1>Iniciar sesión</h1>
                    <p>Accede a tu cuenta de Patitas Felices</p>
                </div>

                <form class="auth-form" method="POST" action="{{ route('login.post') }}">
                    @csrf

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="email">Correo electrónico</label>

                        <div class="input-wrap">
                            <span class="input-icon">✉️</span>

                            <input
                                type="email"
                                id="email"
                                name="email"
                                value="{{ old('email') }}"
                                placeholder="tu@correo.com"
                                required
                            >
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password">Contraseña</label>

                        <div class="input-wrap">
                            <span class="input-icon">🔒</span>

                            <input
                                type="password"
                                id="password"
                                name="password"
                                placeholder="Ingresa tu contraseña"
                                required
                            >

                            <button
                                type="button"
                                class="toggle-pass"
                                onclick="togglePass('password', this)">
                                👁️
                            </button>
                        </div>
                    </div>

                    <button type="submit" class="btn-auth">
                        Entrar 🐾
                    </button>

                </form>

            </div>

        </div>

    </div>

</body>
</html>