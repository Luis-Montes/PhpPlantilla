<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once __DIR__ . "/../../../Controllers/AuthController.php";
    $result = AuthController::register();

    if ($result == "success") {
        $message = "Usuario registrado exitosamente.";
    } elseif ($result == "duplicate") {
        $message = "El correo electrónico ya está registrado.";
    } else {
        $message = "Ocurrió un error al registrar el usuario.";
    }
}

?>

<!DOCTYPE html>

<div class="auth-wrapper">
    <div class="auth-container">
        <h2>Crear cuenta</h2>

        <?php if (isset($message)): ?>
            <div class="alert"><?= $message ?></div>
        <?php endif; ?>

        <form method="POST">
            <input name="name_user" type="text" placeholder="Nombre">
            <input name="email_user" type="email" placeholder="Correo electrónico">
            <input name="password_user" type="password" placeholder="Contraseña" autocomplete="false">
            <button type="submit">Registrarse</button>
        </form>

        <p>¿Ya tienes cuenta? <a href="login.html">Inicia sesión</a></p>
    </div>
</div>