<?php
    session_start();

    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id = intval($_GET['id']);
        unset($_SESSION['carrito'][$id]);
    }

    header('Location: ver.php');
    exit;
?>