<?php
session_start();
if (!isset($_SESSION['id_usu'])) {
    header("Location: login.php");
    exit();
}

// Recibes los datos del formulario (ej: vía POST)
$username = $_SESSION['usuario'];

// Sanea los argumentos para la línea de comandos
$safe_user = escapeshellarg($username);

// Define la ruta a tu playbook y el inventario
$playbook_path = "/var/www/html/proyecto_web/playbook/despliegue.yml";
$inventory_path = "/ruta/a/tu/proyecto/inventory";

// Construye y ejecuta el comando de Ansible
$command = "ansible-playbook -i {$inventory_path} {$playbook_path} --extra-vars 'db_user={$safe_user} db_password={$safe_user}'";

// shell_exec ejecuta el comando y devuelve la salida
$output = shell_exec($command);

// Puedes mostrar la salida para depuración
echo "<pre>$output</pre>";
?>
