<?php
require_once 'config/db.php';
require_once 'correo.php';
session_start();

$mensaje = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $usuario = $_POST['usuario'];
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];
    $confirmar_contrasena = $_POST['confirmar_contrasena'];

    if ($contrasena !== $confirmar_contrasena) {
        $mensaje = "Las contraseñas no coinciden.";
    } else {
        $hash = password_hash($contrasena, PASSWORD_DEFAULT);

        try {
            $stmt = $pdo->prepare("INSERT INTO USUARIO (nombre, usuario, correo, contrasena) VALUES (?, ?, ?, ?)");
            $stmt->execute([$nombre, $usuario, $correo, $hash]);

            // Enviar correo al usuario
            enviarCorreo($correo, "Registro en CMSFlex", "
                <h2>Bienvenido a CMSFlex</h2>
                <p>Hola <strong>$usuario</strong>, te has registrado correctamente en nuestra plataforma.</p>
            ");

            // Obtener el id del usuario recién creado
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
            <input type="password" name="confirmar_contrasena" placeholder="Confirmar contraseña" required><br><br>
            <input type="submit" value="Registrar">
        </form>
        <p><a href="login.php">¿Ya tienes cuenta? Inicia sesión</a></p>
        <p style="color:red"><?= htmlspecialchars($mensaje) ?></p>
    </div>
</body>
</html>
