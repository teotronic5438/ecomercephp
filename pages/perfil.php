<?php
session_start();
require_once("../data/conexion.php");

if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../login.php");
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
</head>
<body class="layout">
    <div class="wrapper">

        <?php include("../components/header.php") ?>
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
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID Pedido</th>
                            <th>Fecha</th>
                            <th>Total</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($pedido = mysqli_fetch_assoc($resultado)): ?>
                            <tr>
                                <td>#<?= $pedido['id'] ?></td>
                                <td><?= $pedido['fecha_pedido'] ?></td>
                                <td>$<?= number_format($pedido['total'], 2) ?></td>
                                <td><?= $pedido['estado'] ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </main>
        <?php include("../components/footer.php") ?>

    </div>
    <script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>
