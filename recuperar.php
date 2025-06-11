<?php
require_once 'config/db.php';

$mensaje = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $correo = $_POST['correo'] ?? '';
    $nueva_contrasena = $_POST['nueva_contrasena'] ?? '';

    if (!empty($correo) && !empty($nueva_contrasena)) {
        $stmt = $pdo->prepare("SELECT * FROM USUARIOS WHERE correo = ?");
        $stmt->execute([$correo]);
        $usuario = $stmt->fetch();

        if ($usuario) {
            $hash = password_hash($nueva_contrasena, PASSWORD_DEFAULT);
            $stmt = $pdo->prepare("UPDATE USUARIOS SET contraseña = ? WHERE correo = ?");
            $stmt->execute([$hash, $correo]);
            $mensaje = 'Contraseña actualizada correctamente.';
        } else {
            $mensaje = 'No existe ninguna cuenta con ese correo.';
        }
    } else {
        $mensaje = 'Por favor, completa todos los campos.';
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Recuperar contraseña</title>
    <link rel="stylesheet" href="assets/css/estilos.css">
</head>
<body>
    <div class="login-container">
        <h2>Recuperar Contraseña</h2>
        <form method="POST">
            <label>Correo electrónico:</label><br>
            <input type="email" name="correo" required><br>
            <label>Nueva contraseña:</label><br>
            <input type="password" name="nueva_contrasena" required><br><br>
            <input type="submit" value="Actualizar contraseña">
        </form>
        <p><?php echo htmlspecialchars($mensaje); ?></p>
        <p><a href="login.php">Volver a iniciar sesión</a></p>
    </div>
</body>
</html>
