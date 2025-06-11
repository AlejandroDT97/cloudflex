<?php
session_start();
if (!isset($_SESSION['id_usu'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Usuario</title>
    <link rel="stylesheet" href="assets/css/estilos.css">
</head>
<body>
    <div class="login-container">
        <h2>¡Bienvenido <?= htmlspecialchars($_SESSION['usuario_nombre']) ?>!</h2>
        <p>Has iniciado sesión correctamente.</p>

        <a href="deploy.php" class="button-link">Ir al despliegue de CMS</a>
        <a href="logout.php" class="button-link logout">Cerrar sesión</a>
    </div>
</body>
</html>
