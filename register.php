<?php
require_once 'config/db.php';
require 'correo.php';
session_start();

$mensaje = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $usuario = $_POST['usuario'];
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];
    $confirmar = $_POST['confirmar'];

    if ($contrasena === $confirmar) {
        $hash = password_hash($contrasena, PASSWORD_DEFAULT);

        try {
            $stmt = $pdo->prepare("INSERT INTO USUARIO (nombre, usuario, correo, contrasena) VALUES (?, ?, ?, ?)");
            $stmt->execute([$nombre, $usuario, $correo, $hash]);

            // Enviar correo de bienvenida
            enviarCorreo($correo, 'Registro en CMSFlex', "
                <h2>Bienvenido a CMSFlex</h2>
                <p>Hola <strong>$usuario</strong>, te has registrado correctamente en nuestra plataforma.</p>
            ");

            $stmt = $pdo->prepare("SELECT id_usu, usuario FROM USUARIO WHERE correo = ?");
            $stmt->execute([$correo]);
            $linea = $stmt->fetch();

            $_SESSION['id_usu'] = $linea['id_usu'];
            $_SESSION['usuario'] = $linea['usuario'];

            header("Location: dashboard.php");
            exit();
        } catch (PDOException $e) {
            $mensaje = "Error al registrar usuario: " . $e->getMessage();
        }
    } else {
        $mensaje = "Las contraseñas no coinciden.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <link rel="stylesheet" href="assets/css/estilos.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <?php include 'header.php'; ?>
    <?php include 'nav.php'; ?>

    <main class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6 login-container">
                <h2 class="text-center mb-4">Registro de Usuario</h2>
                <?php if (!empty($mensaje)): ?>
                    <div class="alert alert-danger"><?= htmlspecialchars($mensaje) ?></div>
                <?php endif; ?>

                <form method="post">
                    <input type="text" name="nombre" placeholder="Nombre" required><br>
                    <input type="text" name="usuario" placeholder="Nombre de usuario" required><br>
                    <input type="email" name="correo" placeholder="Correo electrónico" required><br>
                    <input type="password" name="contrasena" placeholder="Contraseña" required><br>
                    <input type="password" name="confirmar" placeholder="Confirmar contraseña" required><br>
                    <input type="submit" value="Registrar">
                </form>
                <p><a href="login.php">¿Ya tienes cuenta? Inicia sesión</a></p>
            </div>
        </div>
    </main>

    <?php include 'footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
