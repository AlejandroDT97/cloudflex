<?php
require_once 'config/db.php';
require 'correo.php';
session_start();

// No se necesita inicializar $mensaje aquí si vamos a redirigir siempre
// $mensaje = '';
// $tipo_mensaje = 'danger';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $correo = $_POST['correo'];
    $nombre_tarjeta = $_POST['nombre_tarjeta'];
    $numero_tarjeta = $_POST['numero_tarjeta'];
    $fecha_caducidad = $_POST['fecha_caducidad'];
    $cvv = $_POST['cvv'];

    if (empty($correo) || empty($nombre_tarjeta) || empty($numero_tarjeta) || empty($fecha_caducidad) || empty($cvv)) {
        $mensaje = "Por favor, complete todos los campos requeridos.";
    } elseif (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        $mensaje = "Por favor, introduzca un correo electrónico válido.";
    } elseif (!ctype_digit($numero_tarjeta) || strlen($numero_tarjeta) !== 16) {
        $mensaje = "El número de tarjeta debe contener exactamente 16 dígitos numéricos.";
    } elseif (!ctype_digit($cvv) || strlen($cvv) !== 3) {
        $mensaje = "El CVV debe contener exactamente 3 dígitos numéricos.";
    } else {
        $partes_fecha = explode('/', $fecha_caducidad);
        if (count($partes_fecha) === 2 && ctype_digit($partes_fecha[0]) && ctype_digit($partes_fecha[1])) {
            $mes_exp = $partes_fecha[0];
            $ano_exp = '20' . $partes_fecha[1];
            
            $fecha_exp_str = $ano_exp . '-' . $mes_exp . '-' . '01';
            $fecha_exp = new DateTime($fecha_exp_str);
            $fecha_exp->modify('last day of this month')->setTime(23, 59, 59);

            $fecha_actual = new DateTime('now');

            if ($fecha_exp < $fecha_actual) {
                $mensaje = "La fecha de caducidad de la tarjeta ha expirado.";
            } else {
                if (isset($_SESSION['id_usu'])) {
                    try {
                        $id_usuario = $_SESSION['id_usu'];
                        
                        $stmt = $pdo->prepare("UPDATE USUARIO SET pagado = 1 WHERE id_usu = ?");
                        $stmt->execute([$id_usuario]);

                        $_SESSION['pagado'] = 1;
			// Guardar mensaje de éxito en la sesión para mostrarlo en el dashboard
                        $_SESSION['mensaje_exito'] = "¡Pago completado! Su cuenta ha sido activada correctamente.";
                        enviarCorreo($correo, 'Confirmacion de Pago', "<p>Hola<strong>$usuario</strong>, su pago ha sido realizado correctamente, le llegará una factura en los siguientes días.</p>");
                        // Redirigir al dashboard
                        header("Location: dashboard.php");
                        exit(); // Importante: detener la ejecución del script después de redirigir

                    } catch (PDOException $e) {
                        $mensaje = "El pago fue validado, pero hubo un error al actualizar su estado. Por favor, contacte a soporte.";
                    }
                } else {
                    $mensaje = "Error de sesión. No se pudo identificar al usuario. Por favor, inicie sesión de nuevo.";
                }
            }
        } else {
            $mensaje = "El formato de la fecha de caducidad no es válido. Use MM/AA.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Plataforma de Pago</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        body { background-color: #f8f9fa; }
        .payment-container {
            background-color: #ffffff;
            padding: 2.5rem;
            border-radius: 0.5rem;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
<?php include 'header.php'; ?>
<?php include 'nav.php'; ?>
    <main class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6 payment-container">
                <h2 class="text-center mb-4">Plataforma de Pago</h2>
                
                <?php if (!empty($mensaje)): ?>
                    <div class="alert alert-danger">
                        <?= htmlspecialchars($mensaje) ?>
                    </div>
                <?php endif; ?>

                <form method="post">
                    <div class="mb-3">
                        <label for="correo" class="form-label">Correo Electrónico</label>
                        <input type="email" class="form-control" id="correo" name="correo" placeholder="su.correo@ejemplo.com" required>
                    </div>
                    <div class="mb-3">
                        <label for="nombre_tarjeta" class="form-label">Nombre del Titular</label>
                        <input type="text" class="form-control" id="nombre_tarjeta" name="nombre_tarjeta" placeholder="Nombre completo como aparece en la tarjeta" required>
                    </div>
                    <div class="mb-3">
                        <label for="numero_tarjeta" class="form-label">Número de Tarjeta</label>
                        <input type="text" class="form-control" id="numero_tarjeta" name="numero_tarjeta" placeholder="1234567812345678" pattern="\d{16}" title="Debe contener 16 dígitos sin espacios" maxlength="16" required>
                    </div>
                    <div class="row">
                        <div class="col-md-7 mb-3">
                            <label for="fecha_caducidad" class="form-label">Fecha de Caducidad</label>
                            <input type="text" class="form-control" id="fecha_caducidad" name="fecha_caducidad" placeholder="MM/AA" pattern="(0[1-9]|1[0-2])\/?([0-9]{2})" title="Formato MM/AA" required>
                        </div>
                        <div class="col-md-5 mb-3">
                            <label for="cvv" class="form-label">CVV</label>
                            <input type="text" class="form-control" id="cvv" name="cvv" placeholder="123" pattern="\d{3}" title="Debe contener 3 dígitos" maxlength="3" required>
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary w-100 mb-3">Realizar Pago</button>
                    <a href="dashboard.php" class="btn btn-secondary w-100">Volver atrás</a>
                </form>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
<?php include 'footer.php'; ?>
</html>
