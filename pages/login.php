<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    // manejo errores creacion usuarios
    $mensaje_error = '';

    if (isset($_SESSION['error'])) {
        $mensaje_error = $_SESSION['error'];
        unset($_SESSION['error']);
    }


    // manejo errores logeo usuarios
    $mensaje_error_logeo = '';

    if (isset($_SESSION['errorLogeo'])) {
        $mensaje_error_logeo = $_SESSION['errorLogeo'];
        unset($_SESSION['errorLogeo']);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="./image/svg+xml" href="../img/cubes-solid.svg" />
    <title>Aires</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/login.css">
</head>
<body class="layout">
    <div class="wrapper">

        <?php include("../components/header.php") ?>
        <?php include dirname(__DIR__) . '/components/nav.php'; ?>
        <main class="logeos">

            <article class="loginUser">
                <?php include("../components/loginUserForm.php") ?>
            </article>

            <article class="createUser">
                <?php include("../components/createUserForm.php") ?>
            </article>
        </main>

        <?php include("../components/footer.php") ?>

    </div>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/validacionFormularioLogin.js"></script>
</body>
</html>