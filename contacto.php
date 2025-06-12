<?php
$mensaje = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'] ?? '';
    $correo = $_POST['correo'] ?? '';
    $asunto = $_POST['asunto'] ?? '';
    $mensaje_usuario = $_POST['mensaje'] ?? '';

    if (!empty($nombre) && !empty($correo) && !empty($asunto) && !empty($mensaje_usuario)) {
        require 'correo.php';
        $mensaje = "Mensaje enviado correctamente.";
    } else {
        $mensaje = "Por favor, completa todos los campos.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Contacto</title>
    <link rel="stylesheet" href="assets/css/estilos.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
<?php include 'header.php'; ?>
<?php include 'nav.php'; ?>

<main class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="text-center mb-4">Formulario de Contacto</h2>
            <?php if (!empty($mensaje)): ?>
                <div class="alert alert-success text-center"><?= htmlspecialchars($mensaje) ?></div>
            <?php endif; ?>
            <form method="POST">
                <div class="mb-3">
                    <input type="text" name="nombre" class="form-control" placeholder="Tu nombre" required>
                </div>
                <div class="mb-3">
                    <input type="email" name="correo" class="form-control" placeholder="Tu correo electrónico" required>
                </div>
                <div class="mb-3">
                    <input type="text" name="asunto" class="form-control" placeholder="Asunto" required>
                </div>
                <div class="mb-4">
                    <textarea name="mensaje" class="form-control" placeholder="Escribe tu mensaje aquí" rows="6" required></textarea>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Enviar mensaje</button>
                </div>
            </form>
            <div class="text-center mt-4">
                <a href="index.php">Volver al inicio</a>
            </div>
        </div>
    </div>
</main>

<?php include 'footer.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
