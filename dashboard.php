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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php include 'header.php'; ?>
<?php include 'nav.php'; ?>

<main class="container my-5 text-center">
    <h2>¡Bienvenido <?= htmlspecialchars($_SESSION['usuario_nombre']) ?>!</h2>
    <p>Has iniciado sesión correctamente.</p>

    <div class="mt-4">
        <a href="deploy.php" class="btn btn-primary btn-lg me-3">Ir al despliegue de CMS</a>
        <a href="logout.php" class="btn btn-danger btn-lg">Cerrar sesión</a>
    </div>
</main>

<?php include 'footer.php'; ?>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
