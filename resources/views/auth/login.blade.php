<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login - Cafetería Victoriana</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <div class="login-bar">
        <h2>☕ Ingreso al sistema de la Cafetería ❄️</h2>

        @if ($errors->any())
            <div class="error">{{ $errors->first() }}</div>
        @endif

        <form method="POST" action="{{ route('login.post') }}">
            @csrf
            <input type="email" name="Correo" placeholder="Correo electrónico" required>
            <input type="password" name="Contrasena" placeholder="Contraseña" required>
            <button type="submit">Entrar</button>
        </form>

        <div class="divider">o</div>

        <a href="/auth/google" class="google-btn">Ingresar con Google</a>
    </div>
</body>
</html>