<?php
require_once 'config/db.php';
session_start();

$mensaje = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];

    $stmt = $pdo->prepare("SELECT * FROM USUARIO WHERE correo = ?");
    $stmt->execute([$correo]);
    $lineausuario = $stmt->fetch();

    if ($lineausuario && password_verify($contrasena, $lineausuario['contrasena'])) {
        $_SESSION['id_usu'] = $lineausuario['id_usu'];
        $_SESSION['usuario'] = $lineausuario['usuario'];
header("Location: dashboard.php");
        exit();
    } else {
        $mensaje = "Usuario o contraseña incorrectos.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar sesión</title>
    <link rel="stylesheet" href="assets/css/estilos.css">
</head>
<body>
    <div class="login-container">
        <h2>Iniciar sesión</h2>
        <form method="POST">
            <label>Correo electrónico:</label><br>
            <input type="email" name="correo" required><br>
            <label>Contraseña:</label><br>
            <input type="password" name="contrasena" required><br>
            <input type="submit" value="Entrar">
        </form>
        <p><?php echo htmlspecialchars($mensaje); ?></p>
        <a href="recuperar.php">¿Olvidaste tu contraseña?</a>
    </div>
</body>
</html>
