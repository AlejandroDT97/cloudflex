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
//start
// Recibes los datos del formulario (ej: vía POST)
$username = $_SESSION['usuario'];

// Sanea los argumentos para la línea de comandos
$safe_user = escapeshellarg($username);

// Define la ruta a tu playbook y el inventario
$playbook_path = "/var/www/html/proyecto_web/playbook/$cms.yml";
$inventory_path = "/var/www/html/proyecto_web/inventario.ini";

// Construye y ejecuta el comando de Ansible
$command = "ansible-playbook -i {$inventory_path} {$playbook_path} --extra-vars 'db_user={$safe_user} db_password={$safe_user}'";

// shell_exec ejecuta el comando y devuelve la salida
$output = shell_exec($command);

// Puedes mostrar la salida para depuración
echo "<pre>$output</pre>";

//end
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
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

    <div class="text-center mt-4">
        <a href="dashboard.php" class="btn btn-secondary">Volver atrás</a>
    </div>
</main>

<?php include 'footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
