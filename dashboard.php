<?php
session_start();
if (!isset($_SESSION['id_usu'])) {
    header("Location: login.php");
    exit();
}

require_once 'config/db.php';
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
        <a href="perfil.php" class="btn btn-warning btn-lg me-3">Actualizar nombre</a>
        <a href="logout.php" class="btn btn-danger btn-lg">Cerrar sesión</a>
    </div>

    <div class="mt-5">
        <h4>Tus CMS desplegados</h4>
        <div class="table-responsive">
            <table class="table table-striped table-bordered mt-3">
                <thead class="table-dark">
                    <tr>
                        <th>CMS</th>
                        <th>Fecha de despliegue</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $stmt = $pdo->prepare("SELECT CMS.nombre, DATE_FORMAT(R.fecha_alta, '%d/%m/%Y %H:%i') AS fecha 
                                       FROM REGISTRO R
                                       JOIN CMS ON R.id_cms = CMS.id_cms
                                       WHERE R.id_usu = ?
                                       ORDER BY R.fecha_alta DESC");
                $stmt->execute([$_SESSION['id_usu']]);
                $registros = $stmt->fetchAll();

                if ($registros) {
                    foreach ($registros as $registro) {
                        echo "<tr><td>" . htmlspecialchars($registro['nombre']) . "</td><td>" . htmlspecialchars($registro['fecha']) . "</td></tr>";
                    }
                } else {
                    echo "<tr><td colspan='2'>No has desplegado ningún CMS aún.</td></tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</main>

<?php include 'footer.php'; ?>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
