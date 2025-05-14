<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    require_once('../data/productos/getCelulares.php');
    $productos = obtenerCelulares();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Celulares</title>
    <link rel="icon" type="image/svg+xml" href="../img/cubes-solid.svg" />
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body class="layout">
    <div class="wrapper">
        <?php include("../components/header.php") ?>
        <?php include dirname(__DIR__) . '/components/nav.php'; ?>

        <main>
            <h2 class="my-4 text-center">Celulares</h2>
            <?php include("../components/grillaCelulares.php"); ?>
        </main>

        <?php include("../components/footer.php") ?>
    </div>
    <script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>
