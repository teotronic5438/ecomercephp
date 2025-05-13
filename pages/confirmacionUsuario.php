<?php
    session_start();
    session_destroy(); // cerramos la sesión para obligar al login
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="./image/svg+xml" href="../img/cubes-solid.svg" />
    <title>Confirmacion Usuario</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/login.css">
</head>
<body class="layout">
    <div class="wrapper">

        <?php include("../components/header.php"); ?>
        <?php include dirname(__DIR__) . '/components/nav.php'; ?>

        <main class="d-flex flex-column align-items-center">
            <h3 class="text-success">Usuario creado exitosamente!!</h3>
            <p>Ya puedes iniciar sesion con tu nuevo usuario.</p>
                <script>
                    setTimeout(() => {
                        window.location.href = "login.php";
                    }, 4000);
                </script>

            <?php include dirname(__DIR__) . '/components/spiner.php';?>
            
        </main>

        <?php include("../components/footer.php") ?>

    </div>
    <script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>