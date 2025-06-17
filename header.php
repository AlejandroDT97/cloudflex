<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<header class="bg-dark text-white p-3">
    <div class="row align-items-center">
        <div class="col">
            </div>

        <div class="col text-center">
            <div class="logo fs-4 fw-bold">CloudFlex</div>
            <div class="banner d-none d-md-block">Despliega tus CMS</div>
        </div>

        <div class="col text-end">
            <div class="login-register">
                <?php if (!isset($_SESSION['usuario_id']) && !isset($_SESSION['id_usu'])): ?>
                    <a href="login.php" class="btn btn-outline-light btn-sm me-2">Iniciar Sesión</a>
                    <a href="register.php" class="btn btn-warning btn-sm">Registrarse</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</header>
