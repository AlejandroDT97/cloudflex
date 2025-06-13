<?php include 'header.php'; ?>
<?php include 'nav.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CMSFlex - Inicio</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- CSS personalizado -->
    <link rel="stylesheet" href="assets/css/estilos.css">
</head>
<body>


<main class="container my-5">

    <!-- Galería -->
    <section class="gallery text-center mb-5">
        <h2 class="mb-4">Galería de CMS desplegados</h2>
        <div class="row g-4 photo-container justify-content-center">
            <div class="col-md-4">
                <img src="imagenes/wordpress.png" alt="WordPress" class="img-fluid shadow-sm rounded" style="width: 150px; height: auto;">
                <p class="mt-2 fw-semibold">WordPress</p>
            </div>
            <div class="col-md-4">
                <img src="imagenes/joomla.png" alt="Joomla" class="img-fluid shadow-sm rounded" style="width: 150px; height: auto;">
                <p class="mt-2 fw-semibold">Joomla</p>
            </div>
            <div class="col-md-4">
                <img src="imagenes/drupal.png" alt="Drupal" class="img-fluid shadow-sm rounded" style="width: 150px; height: auto;">
                <p class="mt-2 fw-semibold">Drupal</p>
            </div>
        </div>
    </section>

    <!-- Descripción -->
    <section class="description">
        <h2 class="text-center mb-4">¿Qué es CloudFlex?</h2>
        <p class="lead text-center">
            CloudFlex es una plataforma desarrollada en PHP que permite a cualquier usuario desplegar sistemas CMS (como WordPress, Joomla, Drupal, etc.) con un solo clic, gracias a la integración con Ansible.
        </p>
        <div class="text-center mt-4">
            <a href="deploy.php" class="btn btn-primary btn-lg">Desplegar un CMS</a>
        </div>
    </section>

</main>

<?php include 'footer.php'; ?>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
