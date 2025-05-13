<?php
    session_start();

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_producto'], $_POST['cantidad'])) {
        $id = intval($_POST['id_producto']);
        $cantidad = max(1, intval($_POST['cantidad']));

        if (!isset($_SESSION['carrito'])) {
            $_SESSION['carrito'] = [];
        }

        // Si ya existe el producto, se suma la cantidad
        if (isset($_SESSION['carrito'][$id])) {
            $_SESSION['carrito'][$id] += $cantidad;
        } else {
            $_SESSION['carrito'][$id] = $cantidad;
        }

        header('Location: ../carrito/ver.php');
        exit;
    } else {
        die("Datos inválidos.");
    }
?>