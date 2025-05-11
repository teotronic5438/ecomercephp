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

        <main class="d-flex flex-column align-items-center">
            <h3 class="text-primary">¿Olvidaste tu contraseña?</h3>
            <p>Ingresa el correo registrado y te enviaremos un enlace para restablecer tu contraseña.</p>

            <form class="">
                <div class="mb-3">
                    <input type="email" class="form-control" id="correoRecuperar" placeholder="Correo de recuperacion">
                </div>
                <button type="submit" class="btn btn-primary">Solicitar restablecimiento</button>
            </form>
            
        </main>

        <?php include("../components/footer.php") ?>

    </div>
    <script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>