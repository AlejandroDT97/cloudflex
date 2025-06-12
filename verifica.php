<?php
$contraseñaIngresada = 'admin1234';  // Simulación de contraseña ingresada
$hashEnBD = '$2y$10$CitqEtkkkhOkbZM9K8Tdr.lKdS9M6KTdxJqNnJu7qFi02sub5n3uu';

$mensaje = password_verify($contraseñaIngresada, $hashEnBD)
    ? "Contraseña válida. Puedes hacer login."
    : "Contraseña incorrecta.";
?>

<?php include 'header.php'; ?>
<?php include 'nav.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Verificación de Contraseña</title>
    <link rel="stylesheet" href="assets/css/estilos.css">
</head>
<body>
    <div class="login-container">
        <h2>Resultado de la verificación</h2>
        <p><?= htmlspecialchars($mensaje) ?></p>
    </div>
</body>
</html>
