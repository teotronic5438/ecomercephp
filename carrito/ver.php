<?php
    session_start();
    require_once(dirname(__DIR__) . '/data/productos/getProductoPorId.php');

    $carrito = $_SESSION['carrito'] ?? [];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mi Carrito</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
    <link rel="stylesheet" href="../css/styles.css">
    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body class="layout">
    <div class="wrapper">
        <?php include("../components/header.php"); ?>
        <?php include("../components/nav.php"); ?>

        <div class="container my-5">
            <h2>Mi Carrito</h2>

            <?php if (empty($carrito)): ?>
                <p>Tu carrito está vacío.</p>
            <?php else: ?>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio Unitario</th>
                            <th>Total</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $total = 0;
                        foreach ($carrito as $id => $cantidad):
                            $producto = obtenerProductoPorId($id);
                            if (!$producto) continue;

                            $subtotal = $producto['precio'] * $cantidad;
                            $total += $subtotal;
                        ?>
                            <tr>
                                <td><?php echo htmlspecialchars($producto['nombre']); ?></td>
                                <td>
                                    <form action="actualizar.php" method="post" class="d-flex">
                                        <input type="hidden" name="id_producto" value="<?= $id ?>">
                                        <input type="number" name="cantidad" value="<?= $cantidad ?>" min="1" class="form-control form-control-sm me-2" style="max-width: 80px;">
                                        <button type="submit" class="btn btn-sm btn-outline-primary">Actualizar</button>
                                    </form>
                                </td>
                                <td>$<?php echo number_format($producto['precio'], 2); ?></td>
                                <td>$<?php echo number_format($subtotal, 2); ?></td>
                                <td><a href="eliminar.php?id=<?php echo $id; ?>" class="btn btn-danger btn-sm">Eliminar</a></td>
                            </tr>
                        <?php endforeach; ?>
                        <tr>
                            <td colspan="3" class="text-end"><strong>Total:</strong></td>
                            <td><strong>$<?php echo number_format($total, 2); ?></strong></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
                <div class="row">
                    <div class="col align-self-start">
                        <a href="vaciar.php" class="btn btn-outline-danger">Vaciar Carrito</a>
                        <a href="../index.php" class="btn btn-secondary">Seguir Comprando</a>
                    </div>
                    <div class="col align-self-end text-end">
                        <?php if (isset($_SESSION['usuario_id'])): ?>
                            <button class="btn btn-success text-center" onclick="confirmarFinalizarCompra()">Finalizar Compra</button>
                        <?php else: ?>
                            <button class="btn btn-success text-center" onclick="mostrarAlertaLogin()">Finalizar Compra</button>
                        <?php endif; ?>
                    </div>
                </div>


            <?php endif; ?>
        </div>

        <?php include("../components/footer.php"); ?>
    </div>
    <script>
        function mostrarAlertaLogin() {
            Swal.fire({
                icon: 'warning',
                title: 'Debes iniciar sesión',
                text: 'Para finalizar la compra, primero debes iniciar sesión.',
                confirmButtonText: 'Iniciar sesión',
                showCancelButton: true,
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '../pages/login.php?redirigir=ver.php';
                }
            });
        }

        function confirmarFinalizarCompra() {
            Swal.fire({
                title: '¿Estás seguro?',
                text: "¿Querés finalizar la compra?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#28a745',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, finalizar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'finalizar.php';
                }
            });
        }
    </script>

</body>
</html>
