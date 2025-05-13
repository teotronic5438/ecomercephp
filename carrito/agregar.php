<?php
    session_start();

    if (!isset($_POST['id_producto']) || !is_numeric($_POST['id_producto'])) {
        die("ID de producto inválido.");
    }

    $id = intval($_POST['id_producto']);
    $cantidad = isset($_POST['cantidad']) && is_numeric($_POST['cantidad']) ? intval($_POST['cantidad']) : 1;

    if ($cantidad < 1) $cantidad = 1;

    // Inicializar el carrito si no existe
    if (!isset($_SESSION['carrito'])) {
        $_SESSION['carrito'] = [];
    }

    // Si ya está en el carrito, sumamos la cantidad
    if (isset($_SESSION['carrito'][$id])) {
        $_SESSION['carrito'][$id] += $cantidad;
    } else {
        $_SESSION['carrito'][$id] = $cantidad;
    }

    // Redirigir al carrito (puede ser a carrito.php o donde prefieras)
    header("Location: ../pages/carrito.php");
exit;
