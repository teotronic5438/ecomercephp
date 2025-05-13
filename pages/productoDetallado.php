<?php
    require_once(dirname(__DIR__) . '/data/productos/getProductoPorId.php');

    if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
        die("ID de producto no válido.");
    }

    $id = intval($_GET['id']);
    $producto = obtenerProductoPorId($id);

    if (!$producto) {
        die("Producto no encontrado.");
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="./image/svg+xml" href="../img/cubes-solid.svg" />
    <title><?php echo htmlspecialchars($producto['nombre']); ?></title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body class="layout">
    <div class="wrapper">

        <?php include("../components/header.php") ?>
        <?php include dirname(__DIR__) . '/components/nav.php'; ?>
            <!-- Comienza la grilla de televisores -->
            <div class="container my-5">
                <div class="row">
                    <div class="col-md-6 text-center">
                        <img src="<?php echo htmlspecialchars($producto['imagen_url']); ?>" class="img-fluid rounded" alt="<?php echo htmlspecialchars($producto['nombre']); ?>">
                    </div>
                    <div class="col-md-6">
                        <h2><?php echo htmlspecialchars($producto['nombre']); ?></h2>
                        <p class="lead"><?php echo nl2br(htmlspecialchars($producto['descripcion'])); ?></p>
                        <h4 class="text-primary">$<?php echo number_format($producto['precio'], 2); ?></h4>

                        <form method="post" action="../carrito/agregar.php" class="mt-3">
                            <input type="hidden" name="id_producto" value="<?php echo $producto['id']; ?>">

                            <label for="cantidad" class="form-label">Cantidad:</label>
                            <div class="input-group mb-3" style="max-width: 200px;">
                                <button type="button" class="btn btn-outline-secondary" onclick="cambiarCantidad(-1)">−</button>
                                <input type="number" name="cantidad" id="cantidad" class="form-control text-center" value="1" min="1">
                                <button type="button" class="btn btn-outline-secondary" onclick="cambiarCantidad(1)">+</button>
                            </div>

                            <button type="submit" class="btn btn-success">Agregar al carrito</button>
                            <a href="javascript:history.back()" class="btn btn-outline-secondary ms-2">Volver</a>
                        </form>
                    </div>
                </div>
            </div>

            <?php include("../components/footer.php") ?>
    </div>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script>
        function cambiarCantidad(valor) {
            const input = document.getElementById('cantidad');
            let actual = parseInt(input.value);
            if (!isNaN(actual)) {
                let nueva = actual + valor;
                if (nueva >= 1) input.value = nueva;
            }
        }
    </script>
</body>
</html>
