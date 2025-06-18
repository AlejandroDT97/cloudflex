<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
$user_id = $_SESSION['id_usu'] ?? null;
if (!$user_id) {
    http_response_code(403);
    exit('No autorizado');
}

$path = $_GET['file'] ?? 'index.php';
$base_dir = realpath("/var/www/html/proyecto_web/userscms/$user_id/");
$real_path = realpath("$base_dir/$path");

// Seguridad: solo permite acceder a archivos dentro del CMS del usuario
if ($base_dir && $real_path && strpos($real_path, $base_dir) === 0 && file_exists($real_path)) {
    $ext = pathinfo($real_path, PATHINFO_EXTENSION);

    if ($ext === 'php') {
        // Ejecuta archivos PHP
        ob_start();
        chdir(dirname($real_path));
        include $real_path;
        $output = ob_get_clean();

        // Opcional: reescribe enlaces absolutos para que pasen por el proxy
        $output = preg_replace_callback(
            '#(href|src|action)="(/[^"]+)"#',
            function ($matches) use ($path) {
                // Extrae el CMS y salt de la ruta actual
                if (preg_match('#^([^/]+_[a-f0-9]+)/#', $path, $cms_match)) {
                    $cms_folder = $cms_match[1];
                    $new_url = '/cms_proxy.php?file=' . $cms_folder . $matches[2];
                    return $matches[1] . '="' . $new_url . '"';
                }
                return $matches[0];
            },
            $output
        );

        echo $output;
    } else {
        // Sirve archivos estáticos
        $mime = mime_content_type($real_path);
        header("Content-Type: $mime");
        readfile($real_path);
    }
} else {
    http_response_code(404);
    echo "Archivo no encontrado.";
}
// Intercepta cabeceras Location y las reescribe para pasar por el proxy
ob_start(function($buffer) use ($path) {
    foreach (headers_list() as $header) {
        if (stripos($header, 'Location: /') === 0) {
            if (preg_match('#^([^/]+_[a-f0-9]+)/#', $path, $cms_match)) {
                $cms_folder = $cms_match[1];
                $new_location = '/cms_proxy.php?file=' . $cms_folder . substr($header, 10);
                header('Location: ' . $new_location, true, 302);
                header_remove('Location');
            }
        }
    }
    return $buffer;
});
