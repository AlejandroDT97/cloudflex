<?php
session_start();
require_once 'config/db.php';
require_once 'correo.php';

if (!isset($_SESSION['id_usu'])) {
    header('Location: login.php');
    exit();
}

$mensaje = '';

// Obtener datos actuales
$stmt = $pdo->prepare("SELECT nombre, correo FROM USUARIO WHERE id_usu = ?");
$stmt->execute([$_SESSION['id_usu']]);
$usuario = $stmt->fetch();

// Actualizar nombre si se envía el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nuevo_nombre = trim($_POST['nombre']);

    if (!empty($nuevo_nombre)) {
        if ($nuevo_nombre === $usuario['nombre']) {
            $mensaje = '<span class="text-danger">El nuevo nombre no puede ser igual al actual.</span>';
        } else {
            $stmt = $pdo->prepare("UPDATE USUARIO SET nombre = ? WHERE id_usu = ?");
            if ($stmt->execute([$nuevo_nombre, $_SESSION['id_usu']])) {
                $_SESSION['usuario_nombre'] = $nuevo_nombre;
                $usuario['nombre'] = $nuevo_nombre;
                
                // Enviar correo
                enviarCorreo($usuario['correo'], 'Actualizacion de nombre - CloudFlex',
                    "<h2>Nombre actualizado</h2>
                    <p>Hola <strong>{$nuevo_nombre}</strong>, tu nombre ha sido actualizado correctamente en CloudFlex.</p>");

                $mensaje = '<span class="text-success">Nombre actualizado correctamente.</span>';
            } else {
                $mensaje = '<span class="text-danger">Error al actualizar el nombre.</span>';
            }
        }
    } else {
        $mensaje = '<span class="text-danger">El campo nombre no puede estar vacío.</span>';
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Actualizar Perfil</title>
    <link rel="stylesheet" href="assets/css/estilos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include 'header.php'; ?>
<?php include 'nav.php'; ?>

<main class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="text-center mb-4">Actualizar Perfil</h2>

            <?php if (!empty($mensaje)): ?>
                <div class="text-center mb-3"><?= $mensaje ?></div>
            <?php endif; ?>

            <form method="POST">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre de usuario:</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" value="<?= htmlspecialchars($usuario['nombre']) ?>" required>
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-warning">Actualizar nombre</button>
                    <a href="dashboard.php" class="btn btn-secondary">Volver atrás</a>
                </div>
            </form>
        </div>
    </div>
</main>

<?php include 'footer.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
