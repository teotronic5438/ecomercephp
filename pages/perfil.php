<?php
session_start();
require_once("../data/conexion.php");

if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../pages/login.php");
    exit;
}

$usuario_id = $_SESSION['usuario_id'];
$ultimo_pedido_id = isset($_GET['pedido_id']) ? intval($_GET['pedido_id']) : null;

// Consultar historial de pedidos
$sql = "SELECT p.id, p.fecha_pedido, p.total, e.nombre AS estado
        FROM pedidos p
        JOIN estados e ON p.estado_id = e.id
        WHERE p.usuario_id = $usuario_id
        ORDER BY p.fecha_pedido DESC";

$resultado = mysqli_query($conexion, $sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="./image/svg+xml" href="../img/cubes-solid.svg" />
    <title>Mi Perfil - Historial de Pedidos</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/styles.css">
    <style>

    </style>
</head>
<body class="layout">
    <div class="wrapper">
        <?php include dirname(__DIR__) . '/components/header.php'; ?>
        <?php include dirname(__DIR__) . '/components/nav.php'; ?>

        <main class="container mt-5">
            <h2>Mi Perfil - Bienvenido <?= htmlspecialchars($_SESSION['usuario_nombre']) ?>!</h2>

            <?php if ($ultimo_pedido_id): ?>
                <div class="alert alert-success">
                    ¡Gracias por tu compra! Tu número de pedido es <strong>#<?= htmlspecialchars($ultimo_pedido_id) ?></strong>.
                </div>
            <?php endif; ?>

            <h3>Historial de pedidos</h3>

            <?php if (mysqli_num_rows($resultado) === 0): ?>
                <p>No has realizado pedidos aún.</p>
            <?php else: ?>
                <div class="accordion" id="historialPedidos">
                    <?php while ($pedido = mysqli_fetch_assoc($resultado)): 
                        $pedido_id = $pedido['id'];

                        // Obtener detalles del pedido
                        $sql_detalles = "SELECT pd.cantidad, pd.precio_unitario, pr.nombre
                                         FROM pedido_detalles pd
                                         JOIN productos pr ON pd.producto_id = pr.id
                                         WHERE pd.pedido_id = $pedido_id";
                        $detalles_resultado = mysqli_query($conexion, $sql_detalles);

                        // Color del estado
                        $estado = strtolower($pedido['estado']);
                        $badge_class = match ($estado) {
                            'pendiente' => 'bg-warning text-dark',
                            'pagado' => 'bg-info text-dark',
                            'enviado' => 'bg-primary',
                            'entregado' => 'bg-success',
                            'eliminado' => 'bg-danger',
                            default => 'bg-secondary'
                        };
                    ?>
                        <div class="card mb-3">
                            <div class="card-header">
                                <strong>Pedido #<?= $pedido_id ?></strong> - <?= $pedido['fecha_pedido'] ?> -
                                <span class="badge <?= $badge_class ?>"><?= $pedido['estado'] ?></span> -
                                Total: $<?= number_format($pedido['total'], 2) ?>
                                <button class="btn btn-sm btn-outline-secondary float-end" onclick="toggleDetalle('detalle<?= $pedido_id ?>')">Ver Detalles</button>
                            </div>
                            <div class="card-body detalle-pedido" id="detalle<?= $pedido_id ?>">
                                <?php if (mysqli_num_rows($detalles_resultado) > 0): ?>
                                    <table class="table table-sm">
                                        <thead>
                                            <tr>
                                                <th>Producto</th>
                                                <th>Cantidad</th>
                                                <th>Precio Unitario</th>
                                                <th>Subtotal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php while ($detalle = mysqli_fetch_assoc($detalles_resultado)): ?>
                                                <tr>
                                                    <td><?= htmlspecialchars($detalle['nombre']) ?></td>
                                                    <td><?= $detalle['cantidad'] ?></td>
                                                    <td>$<?= number_format($detalle['precio_unitario'], 2) ?></td>
                                                    <td>$<?= number_format($detalle['cantidad'] * $detalle['precio_unitario'], 2) ?></td>
                                                </tr>
                                            <?php endwhile; ?>
                                        </tbody>
                                    </table>
                                <?php else: ?>
                                    <p>No hay detalles para este pedido.</p>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </main>

        <?php include("../components/footer.php") ?>
    </div>

    <script src="../js/bootstrap.bundle.min.js"></script>
    <script>
        function toggleDetalle(id) {
            const detalle = document.getElementById(id);
            detalle.classList.toggle('detalle-activo');
        }
    </script>
</body>
</html>
