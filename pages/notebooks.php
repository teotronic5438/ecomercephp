<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    
    // Obtengo listado de productos de la categoría "Notebook"
    require_once('../data/productos/getNotebook.php');

    $productos = obtenerNotebook();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="./image/svg+xml" href="../img/cubes-solid.svg" />
    <title>Notebooks</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body class="layout">
    <div class="wrapper">

        <?php include("../components/header.php") ?>
        <?php include dirname(__DIR__) . '/components/nav.php'; ?>

        <main>
            <h2 class="my-4 text-center">Notebooks</h2>
            <?php include("../components/grillaNotebook.php"); ?>
        </main>

        <?php include("../components/footer.php") ?>

    </div>
    <script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>
