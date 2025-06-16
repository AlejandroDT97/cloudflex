<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!-- header.php -->
<header class="bg-dark text-white p-3 d-flex justify-content-between align-items-center">
    <div class="logo fs-4 fw-bold">CloudFlex</div>
    <div class="banner d-none d-md-block">Despliega tus CMS</div>
    <div class="login-register">
        <?php if (!isset($_SESSION['usuario_id']) && !isset($_SESSION['id_usu'])): ?>
            <a href="login.php" class="btn btn-outline-light btn-sm me-2">Iniciar Sesión</a>
            <a href="register.php" class="btn btn-warning btn-sm">Registrarse</a>
        <?php endif; ?>
    </div>
</header>
