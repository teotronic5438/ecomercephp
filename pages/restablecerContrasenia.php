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
            <h3 class="text-primary">Restablecer Contraseña</h3>
            <p>Hola $usuario, ingresa la nueva contraseña que usaras para ingresar.</p>

            <form class="text-center">
                <div class="mb-3">
                    <input type="password" class="form-control" placeholder="Ingrese nueva contraseña" name="claveRecuperada" id="claveRecuperada">
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control" placeholder="Comfirme su contraseña" name="claveRecuperadaConfirmacion" id="claveRecuperadaConfirmacion">
                    <div id="claveRecuperadaHelp" class="form-text text-secondary">Debe tener minimo 6 digitos y maximo 10.</div>
                </div>
                <button type="submit" class="btn btn-primary">Confirmar contraseña</button>
            </form>
            
        </main>

        <?php include("../components/footer.php") ?>

    </div>
    <script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>