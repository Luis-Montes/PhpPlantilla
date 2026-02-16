

<div class="auth-wrapper">
    <div class="auth-container">
        <h2>Iniciar sesión</h2>

        <?php if (!empty($message)): ?>
            <p class="error-message">Correo o contraseña incorrectos</p>
        <?php endif; ?>

        <form method="POST">
            <input name="email_user" type="email" placeholder="Correo electrónico">
            <input name="password_user" type="password" placeholder="Contraseña">
            <button type="submit">Entrar</button>
        </form>

        <p>¿No tienes cuenta? <a href="register.html">Regístrate</a></p>
    </div>
</div>