<?php
require_once 'config/db.php';
require 'correo.php';

$mensaje = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $correo = $_POST['correo'] ?? '';
    $nueva_contrasena = $_POST['nueva_contrasena'] ?? '';

    if (!empty($correo) && !empty($nueva_contrasena)) {
        $stmt = $pdo->prepare("SELECT * FROM USUARIO WHERE correo = ?");
        $stmt->execute([$correo]);
        $usuario = $stmt->fetch();

        if ($usuario) {
            $hash = password_hash($nueva_contrasena, PASSWORD_DEFAULT);
            $stmt = $pdo->prepare("UPDATE USUARIO SET contrasena = ? WHERE correo = ?");
            $stmt->execute([$hash, $correo]);

            // Enviar correo automático
            enviarCorreo($correo, 'Recuperacion de contraseña CMSFlex', "
                <h2>Contraseña actualizada</h2>
                <p>Hola <strong>{$usuario['usuario']}</strong>, tu contraseña ha sido restablecida correctamente.</p>
            ");

            $mensaje = '<span class="text-success">Contraseña actualizada correctamente.</span>';
        } else {
            $mensaje = '<span class="text-danger">No existe ninguna cuenta con ese correo.</span>';
        }
    } else {
        $mensaje = '<span class="text-danger">Por favor, completa todos los campos.</span>';
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Recuperar contraseña</title>
    <link rel="stylesheet" href="assets/css/estilos.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <?php include 'header.php'; ?>
    <?php include 'nav.php'; ?>

    <main class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6 login-container">
                <h2 class="text-center mb-4">Recuperar Contraseña</h2>

                <?php if (!empty($mensaje)): ?>
                    <div class="text-center mb-3"><?= $mensaje ?></div>
                <?php endif; ?>

                <form method="POST">
                    <div class="mb-3">
                        <label class="form-label">Correo electrónico:</label>
                        <input type="email" name="correo" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nueva contraseña:</label>
                        <input type="password" name="nueva_contrasena" class="form-control" required>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Actualizar contraseña</button>
                    </div>
                </form>

                <div class="text-center mt-3">
                    <a href="login.php">Volver a iniciar sesión</a>
                </div>
            </div>
        </div>
    </main>

    <?php include 'footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
