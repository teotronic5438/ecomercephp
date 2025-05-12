<?php
session_start();

// Redirigir si no hay sesión activa
if (!isset($_SESSION['usuario_id'])) {
    header('Location: login.php');
    exit;
}

$nombre = htmlspecialchars($_SESSION['usuario_nombre']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Bienvenido</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5 text-center">
        <h1 class="text-success">¡Bienvenido, <?= $nombre ?>!</h1>
        <p class="mt-3">Has iniciado sesión correctamente.</p>
        <a class="btn btn-primary mt-3" href="index.php">Ir al inicio</a>
    </div>
</body>
</html>
