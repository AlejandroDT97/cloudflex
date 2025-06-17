<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

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

    // Si el usuario existe y el campo 'pagado' es 0, redirigir a la página de pago
    if ($usuario_pago && $usuario_pago['pagado'] == 0) {
        header("Location: pago.php");
        exit();
    }
} catch (PDOException $e) {
    // Manejar errores de base de datos de forma segura
    die("Error al verificar el estado del pago. Por favor, intente más tarde.");
}

$mensaje = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cms = $_POST['cms'];
    $usuario_id = $_SESSION['id_usu'];
    $usuario = $_SESSION['usuario'];
    $salt = bin2hex(random_bytes(6));

    // Establecer variables de entorno
    putenv("ANSIBLE_CONFIG=/var/www/html/proyecto_web/ansible.cfg");
    putenv("ANSIBLE_LOCAL_TEMP=/tmp/ansible_tmp");
    putenv("HOME=/var/www");

    $playbook = "/var/www/html/proyecto_web/playbooks/$cms.yml";

     $command = sprintf(
        "/usr/bin/ansible-playbook -i /var/www/html/proyecto_web/inventario.ini %s " .
        "-e 'destino=%s db_nombre=%s db_usuario=%s db_password=%s usuario_id=%s cms=%s salt=%s'",
        escapeshellarg($playbook),
        escapeshellarg($destino),
        escapeshellarg($db_nombre),
        escapeshellarg($db_usuario),
        escapeshellarg($db_password),
        escapeshellarg($usuario_id),
        escapeshellarg($cms),
        escapeshellarg($salt)
    );

    // Ejecutar comando
    exec($command . " 2>&1", $output, $status);

    if ($status === 0) {
        $stmt = $pdo->prepare("
            INSERT INTO REGISTRO (id_usu, id_cms, fecha_alta, codigo_directorio)
            VALUES (?, (SELECT id_cms FROM CMS WHERE nombre = ?), CONVERT_TZ(NOW(), '+00:00', '+02:00'), ?)
        ");
        $stmt->execute([$usuario_id, $cms, $salt]);

        // Ruta del CMS desplegado
        $cms_dir = "/var/www/html/proyecto_web/userscms/{$usuario_id}/{$cms}_{$salt}";
        $htpasswd_path = $cms_dir . '/.htpasswd';
        $htaccess_path = $cms_dir . '/.htaccess';

        // Usuario y contraseña en texto plano (debes tener la contraseña original)
        $cms_user = $_SESSION['usuario'];
        $cms_pass = $_SESSION['password']; // Debes guardar la contraseña en sesión al iniciar

        // Genera el hash Apache MD5 para .htpasswd
        $encrypted_pass = crypt($cms_pass, '$apr1$' . substr(md5(uniqid()), 0, 8));

        // Crea el archivo .htpasswd
        file_put_contents($htpasswd_path, "$cms_user:$encrypted_pass\n");

        // Crea el archivo .htaccess
        file_put_contents($htaccess_path, <<<HTA
AuthType Basic
AuthName "Zona protegida"
AuthUserFile $htpasswd_path
Require valid-user
HTA
        );

        // Construye la URL del CMS desplegado
        $cms_url = "userscms/{$usuario_id}/{$cms}_{$salt}/";
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
            <option value="moodle">Moodle</option>
            <option value="octobercms">OctoberCMS</option>
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
            <a href="<?= htmlspecialchars($cms_url) ?>" class="btn btn-primary" target="_blank">Ir a mi CMS</a>
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
