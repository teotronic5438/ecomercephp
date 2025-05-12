<?php
    session_start();
    session_unset();
    session_destroy();

    // Redirige a la página anterior si existe, si no, al login
    $anterior = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'login.php';
    header("Location: $anterior");
    exit;
?>