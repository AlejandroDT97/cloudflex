<?php
require_once 'correo.php';

$mensaje = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim($_POST['nombre'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $asunto = trim($_POST['asunto'] ?? '');
    $mensaje_form = trim($_POST['mensaje'] ?? '');

    if (!empty($nombre) && !empty($email) && !empty($asunto) && !empty($mensaje_form)) {

        $cuerpo = "
            <h2>Nuevo mensaje de contacto</h2>
            <p><strong>Nombre:</strong> {$nombre}</p>
            <p><strong>Email:</strong> {$email}</p>
            <p><strong>Asunto:</strong> {$asunto}</p>
            <p><strong>Mensaje:</strong><br>" . nl2br(htmlspecialchars($mensaje_form)) . "</p>
        ";

        if (enviarCorreo('cmsflex2025@gmail.com', "Formulario de contacto - $asunto", $cuerpo)) {
            $mensaje = '<div class="alert alert-success text-center">Mensaje enviado correctamente.</div>';
        } else {
            $mensaje = '<div class="alert alert-danger text-center">Error al enviar el mensaje.</div>';
        }

    } else {
        $mensaje = '<div class="alert alert-danger text-center">Por favor, completa todos los campos.</div>';
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario de Contacto</title>
    <link rel="stylesheet" href="assets/css/estilos.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <?php include 'header.php'; ?>
    <?php include 'nav.php'; ?>

    <main class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6 login-container">
                <h2 class="text-center mb-4">Formulario de Contacto</h2>

                <?= $mensaje ?>

                <form method="POST">
                    <div class="mb-3">
                        <label class="form-label">Tu nombre</label>
                        <input type="text" name="nombre" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tu correo electrónico</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Asunto</label>
                        <input type="text" name="asunto" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Escribe tu mensaje aquí</label>
                        <textarea name="mensaje" class="form-control" rows="6" required></textarea>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Enviar mensaje</button>
                    </div>
                </form>

                <div class="text-center mt-3">
                    <a href="index.php">Volver al inicio</a>
                </div>
            </div>
        </div>
    </main>

    <?php include 'footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
