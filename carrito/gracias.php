<?php
session_start();
$pedido_id = $_GET['pedido_id'] ?? null;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gracias por tu compra</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body class="layout">
    <div class="container mt-5">
        <h1>¡Gracias por tu compra!</h1>
        <?php if ($pedido_id): ?>
            <p>Tu número de pedido es <strong>#<?php echo htmlspecialchars($pedido_id); ?></strong>.</p>
        <?php else: ?>
            <p>Tu pedido fue procesado correctamente.</p>
        <?php endif; ?>
        <a href="../index.php" class="btn btn-primary">Volver al inicio</a>
    </div>
</body>
</html>
