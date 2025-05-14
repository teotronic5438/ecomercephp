<?php
session_start();
$pedido_id = $_GET['pedido'] ?? null;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Compra Finalizada</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body class="layout">
    <div class="container my-5 text-center">
        <h2>¡Gracias por tu compra!</h2>
        <?php if ($pedido_id): ?>
            <p>Tu número de pedido es: <strong>#<?= htmlspecialchars($pedido_id) ?></strong></p>
        <?php endif; ?>
        <a href="../index.php" class="btn btn-primary">Volver al Inicio</a>
    </div>
</body>
</html>