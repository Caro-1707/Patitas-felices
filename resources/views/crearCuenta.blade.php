<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Cuenta – Patitas Felices</title>

    <link rel="stylesheet" href="{{ asset('css/crearCuenta.css') }}">

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

    <div class="auth-wrapper auth-wrapper--register">

        <!-- Formulario -->
        <div class="auth-form-side">
            <div class="auth-card auth-card--tall">

                <div class="auth-card-header">
                    <div class="auth-icon">🐾</div>
                    <h1>Crear cuenta</h1>
                    <p>Únete a la familia Patitas Felices</p>
                </div>

                <form class="auth-form" method="POST" action="{{ route('register') }}">
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

                    <div class="form-row">
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <div class="input-wrap">
                                <span class="input-icon">👤</span>
                                <input
                                    type="text"
                                    id="nombre"
                                    name="nombre"
                                    value="{{ old('nombre') }}"
                                    placeholder="Tu nombre"
                                    required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="apellido">Apellido</label>
                            <div class="input-wrap">
                                <span class="input-icon">👤</span>
                                <input
                                    type="text"
                                    id="apellido"
                                    name="apellido"
                                    value="{{ old('apellido') }}"
                                    placeholder="Tu apellido"
                                    required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="reg-email">Correo electrónico</label>
                        <div class="input-wrap">
                            <span class="input-icon">✉️</span>
                            <input
                                type="email"
                                id="reg-email"
                                name="email"
                                value="{{ old('email') }}"
                                placeholder="tu@correo.com"
                                required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="telefono">Teléfono</label>
                        <div class="input-wrap">
                            <span class="input-icon">📞</span>
                            <input
                                type="text"
                                id="telefono"
                                name="telefono"
                                value="{{ old('telefono') }}"
                                placeholder="3001234567"
                                required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="num-doc">Número de documento</label>
                        <div class="input-wrap">
                            <span class="input-icon">🪪</span>
                            <input
                                type="text"
                                id="num-doc"
                                name="numero_documento"
                                value="{{ old('numero_documento') }}"
                                placeholder="123456789"
                                required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="reg-pass">Contraseña</label>
                        <div class="input-wrap">
                            <span class="input-icon">🔒</span>
                            <input
                                type="password"
                                id="reg-pass"
                                name="password"
                                placeholder="Mínimo 8 caracteres"
                                required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="confirm-pass">Confirmar contraseña</label>
                        <div class="input-wrap">
                            <span class="input-icon">🔒</span>
                            <input
                                type="password"
                                id="confirm-pass"
                                name="password_confirmation"
                                placeholder="Repite tu contraseña"
                                required>
                        </div>
                    </div>

                    <label class="checkbox-label terms-label">
                        <input type="checkbox" required>
                        <span class="checkmark"></span>
                        Acepto los términos y condiciones y la política de privacidad
                    </label>

                    <button type="submit" class="btn-auth">
                        Crear mi cuenta 🐾
                    </button>

                </form>

            </div>
        </div>

        <!-- Panel derecho -->
        <div class="auth-panel auth-panel--right">

            <a href="{{ route('inicio') }}" class="panel-logo">
                <span>🐾</span> Patitas Felices
            </a>

            <div class="panel-content">

                <div class="panel-bubbles" aria-hidden="true">
                    <div class="pb pb1">🐱</div>
                    <div class="pb pb2">🐶</div>
                    <div class="pb pb3">🐾</div>
                </div>

                <h2>Empieza tu<br><em>aventura</em></h2>

                <p>
                    Al crear tu cuenta podrás guardar tus favoritos,
                    hacer seguimiento a tu proceso de adopción y recibir
                    notificaciones de nuevos peludos.
                </p>

                <ul class="panel-benefits">
                    <li>🐾 Accede a todos los perfiles</li>
                    <li>❤️ Guarda tus favoritos</li>
                    <li>📋 Sigue tu solicitud</li>
                    <li>🔔 Recibe alertas de nuevos animales</li>
                </ul>

            </div>

            <p class="panel-footer">
                ¿Ya tienes cuenta?
                <a href="{{ route('login') }}">Inicia sesión</a>
            </p>

        </div>

    </div>

</body>
</html>