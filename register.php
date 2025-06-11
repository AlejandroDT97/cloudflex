<?php
require_once 'config/db.php';
session_start();

$mensaje = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $usuario = $_POST['usuario'];
    $correo = $_POST['correo'];
    $contrasena = password_hash($_POST['contrasena'], PASSWORD_DEFAULT);

    try {
        $stmt = $pdo->prepare("INSERT INTO USUARIO (nombre, usuario, correo, contrasena) VALUES (?, ?, ?, ?)");
        $stmt->execute([$nombre, $usuario, $correo, $contrasena]);

        $stmt = $pdo->prepare("SELECT id_usu, usuario FROM USUARIO WHERE correo = ?");
        $stmt->execute([$correo]);
        $lineausuario = $stmt->fetch();

        $_SESSION['id_usu'] = $lineausuario['id_usu'];
        $_SESSION['usuario'] = $lineausuario['usuario'];

        header("Location: dashboard.php");
        exit();
    } catch (PDOException $e) {
        $mensaje = "Error al registrar usuario: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <link rel="stylesheet" href="assets/css/estilos.css">
</head>
<body>
    <div class="login-container">
        <h2>Registro de Usuario</h2>
        <form method="post">
            <input type="text" name="nombre" placeholder="Nombre" required><br>
	    <input type="text" name="usuario" placeholder="Nombre de usuario" required><br>
            <input type="email" name="correo" placeholder="Correo electrónico" required><br>
            <input type="password" name="contrasena" placeholder="Contraseña" required><br>
            <input type="submit" value="Registrar">
        </form>
        <p><a href="login.php">¿Ya tienes cuenta? Inicia sesión</a></p>
        <p style="color:red"><?= htmlspecialchars($mensaje) ?></p>
    </div>
</body>
</html>
