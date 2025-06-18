<?php
session_start();
if (!isset($_SESSION['id_usu'])) {
    header("Location: login.php");
    exit();
}

require_once 'config/db.php';

try {
    $stmt = $pdo->prepare("SELECT pagado FROM USUARIO WHERE id_usu = ?");
    $stmt->execute([$_SESSION['id_usu']]);
    $usuario_pago = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario_pago && $usuario_pago['pagado'] == 0) {
        header("Location: pago.php");
        exit();
    }
} catch (PDOException $e) {
    die("Error al verificar el estado del pago. Por favor, intente más tarde.");
}

$mensaje = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cms = $_POST['cms'];
    $usuario_id = $_SESSION['id_usu'];
    $usuario = $_SESSION['usuario'];
    $salt = bin2hex(random_bytes(6));

    // Define la ruta de despliegue del CMS
    $cms_dir = "/var/www/html/proyecto_web/userscms/{$usuario_id}/{$cms}_{$salt}";
    $destino = $cms_dir; // Para el playbook

    // Variables para la base de datos del CMS
    $db_nombre = "db_" . $usuario . "_" . $cms;
    $db_usuario = "user_" . $usuario . "_" . $cms;
    $db_pass = bin2hex(random_bytes(8));

    // Establecer variables de entorno
    putenv("ANSIBLE_CONFIG=/var/www/html/proyecto_web/ansible.cfg");
    putenv("ANSIBLE_LOCAL_TEMP=/tmp/ansible_tmp");
    putenv("HOME=/var/www");

    $playbook = "/var/www/html/proyecto_web/playbooks/$cms.yml";

    // Usuario y contraseña en texto plano (si la tienes)
    $cms_user = $usuario;
    $cms_pass = $_SESSION['password'] ?? ''; // Solo si tienes la contraseña en sesión

    $auth_key         = bin2hex(random_bytes(32));
    $secure_auth_key  = bin2hex(random_bytes(32));
    $logged_in_key    = bin2hex(random_bytes(32));
    $nonce_key        = bin2hex(random_bytes(32));
    $auth_salt        = bin2hex(random_bytes(32));
    $secure_auth_salt = bin2hex(random_bytes(32));
    $logged_in_salt   = bin2hex(random_bytes(32));
    $nonce_salt       = bin2hex(random_bytes(32));

    $command = sprintf(
        "/usr/bin/ansible-playbook -i /var/www/html/proyecto_web/inventario.ini %s " .
        "-e 'cms_user=%s cms_pass=%s destino=%s db_nombre=%s db_usuario=%s db_pass=%s usuario_id=%s cms=%s salt=%s auth_key=%s secure_auth_key=%s logged_in_key=%s nonce_key=%s auth_salt=%s secure_auth_salt=%s logged_in_salt=%s nonce_salt=%s'",
        escapeshellarg($playbook),
        escapeshellarg($cms_user),
        escapeshellarg($cms_pass),
        escapeshellarg($destino),
        escapeshellarg($db_nombre),
        escapeshellarg($db_usuario),
        escapeshellarg($db_pass),
        escapeshellarg($usuario_id),
        escapeshellarg($cms),
        escapeshellarg($salt),
        escapeshellarg($auth_key),
        escapeshellarg($secure_auth_key),
        escapeshellarg($logged_in_key),
        escapeshellarg($nonce_key),
        escapeshellarg($auth_salt),
        escapeshellarg($secure_auth_salt),
        escapeshellarg($logged_in_salt),
        escapeshellarg($nonce_salt)
    );

    exec($command . " 2>&1", $output, $status);

    if ($status === 0) {
        $stmt = $pdo->prepare("
            INSERT INTO REGISTRO (id_usu, id_cms, fecha_alta, codigo_directorio)
            VALUES (?, (SELECT id_cms FROM CMS WHERE nombre = ?), CONVERT_TZ(NOW(), '+00:00', '+02:00'), ?)
        ");
        $stmt->execute([$usuario_id, $cms, $salt]);

        // Ruta relativa para el proxy
        $cms_path = "{$cms}_{$salt}/index.php";
        $cms_proxy_url = "cms_proxy.php?file=" . urlencode($cms_path);

        $mensaje = "Despliegue de $cms realizado correctamente.";
        $mostrar_botones = true;
    } else {
        $mensaje = "Error al desplegar $cms:<br><pre>" . htmlspecialchars(implode("\n", $output)) . "</pre>";
        $mostrar_botones = false;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Desplegar CMS</title>
    <link rel="stylesheet" href="assets/css/estilos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"  rel="stylesheet">
</head>
<body>

<?php include 'header.php'; ?>
<?php include 'nav.php'; ?>
<main class="container my-5">
    <h2 class="text-center mb-4">Selecciona un CMS para desplegar</h2>

    <form method="post" class="text-center">
        <select name="cms" required class="form-select w-50 mx-auto mb-3">
            <option value="">Selecciona...</option>
            <option value="wordpress">WordPress</option>
            <option value="joomla">Joomla</option>
            <option value="drupal">Drupal</option>
            <option value="prestashop">PrestaShop</option>
        </select>
        <button type="submit" class="btn btn-success">Desplegar CMS</button>
    </form>

    <?php if (!empty($mensaje)): ?>
        <div class="mt-4 alert <?= strpos($mensaje, 'correctamente') !== false ? 'alert-success' : 'alert-danger' ?>">
            <?= $mensaje ?>
        </div>
    <?php endif; ?>

    <?php if (!empty($mostrar_botones) && $mostrar_botones): ?>
        <div class="text-center mt-4">
            <a href="<?= htmlspecialchars($cms_proxy_url) ?>" class="btn btn-primary" target="_blank">Ir a mi CMS</a>
            <a href="registro.php" class="btn btn-secondary">Ver mis CMS desplegados</a>
        </div>
    <?php endif; ?>

    <div class="text-center mt-4">
        <a href="dashboard.php" class="btn btn-secondary">Volver atrás</a>
    </div>
</main>

<?php include 'footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
