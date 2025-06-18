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

// Redirige rutas tipo index.php/loquesea a la ruta real
if (preg_match('#^(.+)_([a-f0-9]{12})/index\.php/(.+)$#', $path, $matches)) {
    $new_path = "{$matches[1]}_{$matches[2]}/{$matches[3]}";
    header("Location: cms_proxy.php?file=" . urlencode($new_path));
    exit;
}

$base_dir = realpath("/var/www/html/proyecto_web/userscms/$user_id/");
$real_path = realpath("$base_dir/$path");

if ($base_dir && $real_path && strpos($real_path, $base_dir) === 0 && file_exists($real_path)) {
    $ext = pathinfo($real_path, PATHINFO_EXTENSION);

	if ($ext === 'php') {
    		ob_start();
    		chdir(dirname($real_path));
    		include $real_path;
    		$output = ob_get_clean();

    // --- INICIO DE LA NUEVA LÓGICA ---

    // 1. Determinar el directorio base para las URLs relativas.
    // Esto será algo como "wordpress_68d05f0ef49a/wp-admin/"
    $base_dir_for_html = dirname($path);
    if ($base_dir_for_html === '.') {
        $base_dir_for_html = '';
    } else {
        $base_dir_for_html .= '/';
    }

    // 2. Construir la URL base completa que pasará por el proxy.
    // Formato: https://tu.dominio/cms_proxy.php?file=wordpress.../wp-admin/
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https" : "http";
    $host = $_SERVER['HTTP_HOST'];
    $base_href = $protocol . '://' . $host . '/cms_proxy.php?file=' . rawurlencode($base_dir_for_html);
    
    // 3. Crear la etiqueta <base>
    $base_tag = '<base href="' . htmlspecialchars($base_href) . '">';

    // 4. Inyectar la etiqueta <base> justo después de la etiqueta <head> del HTML.
    // Esto es mucho más robusto que usar preg_replace para cada atributo.
    // Buscamos <head> de forma insensible a mayúsculas y le añadimos nuestra etiqueta.
    $output = preg_replace('/(<head[^>]*>)/i', '$1' . $base_tag, $output, 1, $count);

    // Si no se encuentra la etiqueta <head>, no hacemos nada más con los enlaces.
    // Pero para WordPress, siempre existirá.

    // --- FIN DE LA NUEVA LÓGICA ---

    echo $output;
    exit;

} else { // El resto del código para imágenes, css, etc. sigue igual
    $mime = mime_content_type($real_path);
    header("Content-Type: $mime");
    readfile($real_path);
}

} else {
    http_response_code(404);
    echo "Archivo no encontrado.";
}
