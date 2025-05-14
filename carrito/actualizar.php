<?php
    session_start();

    if (!isset($_SESSION['carrito']) || !is_array($_SESSION['carrito'])) {
        $_SESSION['carrito'] = [];  // Se asegura que es un array
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id_producto'] ?? null;
        $cantidad = intval($_POST['cantidad'] ?? 1);

        if ($id !== null) {
            if ($cantidad >= 1) {
                $_SESSION['carrito'][$id] = $cantidad;
            } else {
                unset($_SESSION['carrito'][$id]); // Si ponen 0 o menos, lo quitamos
            }
        }
    }

    header("Location: ver.php");
    exit;
?>
