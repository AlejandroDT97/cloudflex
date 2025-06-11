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

$mensaje = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cms = $_POST['cms'];
    $usuario_id = $_SESSION['id_usu'];

    // Establecer variables de entorno
    putenv("ANSIBLE_CONFIG=/var/www/html/proyecto_web/ansible.cfg");
    putenv("ANSIBLE_LOCAL_TEMP=/tmp/ansible_tmp");
    putenv("HOME=/var/www");

    // Ejecutar el playbook
    $playbookPath = escapeshellcmd("/usr/bin/ansible-playbook -i /var/www/html/proyecto_web/inventario.ini /var/www/html/proyecto_web/playbooks/$cms.yml");
    exec($playbookPath . " 2>&1", $output, $status);

    if ($status === 0) {
        $stmt = $pdo->prepare("
            INSERT INTO REGISTRO (id_usu, id_cms, fecha_alta)
            VALUES (?, (SELECT id_cms FROM CMS WHERE nombre = ?), CONVERT_TZ(NOW(), '+00:00', '+02:00'))
        ");
        $stmt->execute([$usuario_id, $cms]);
        $mensaje = "Despliegue de $cms realizado correctamente.";
    } else {
        $mensaje = "Error al desplegar $cms:<br><pre>" . htmlspecialchars(implode("\n", $output)) . "</pre>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Desplegar CMS</title>
    <link rel="stylesheet" href="assets/css/estilos.css">
</head>
<body>
    <div class="login-container">
        <h2>Selecciona un CMS para desplegar</h2>
        <form method="post">
            <select name="cms" required>
                <option value="">Selecciona...</option>
                <option value="wordpress">WordPress</option>
                <option value="joomla">Joomla</option>
                <option value="drupal">Drupal</option>
                <option value="prestashop">PrestaShop</option>
                <option value="moodle">Moodle</option>
                <option value="octobercms">OctoberCMS</option>
            </select>
            <br><br>
            <button type="submit">Desplegar CMS</button>
        </form>

        <?php if (!empty($mensaje)): ?>
            <p class="<?= strpos($mensaje, 'correctamente') !== false ? 'success-message' : 'error-message' ?>">
                <?= $mensaje ?>
            </p>
        <?php endif; ?>
    </div>
</body>
</html>
