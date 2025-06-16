<?php
session_start();
if (!isset($_SESSION['id_usuario'])) {
    die("Acceso no autorizado");
}

$path = $_GET['path'] ?? '';
list($dir_id_usuario, $cms_dir) = explode('/', $path, 2);

if ((int)$dir_id_usuario !== (int)$_SESSION['id_usuario']) {
    die("No puedes acceder al CMS de otro usuario");
}

header("Location: /proyecto_web/cms/$path/");
exit();
