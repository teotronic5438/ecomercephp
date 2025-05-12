<?php
session_start();
require_once("conexion.php");

mysqli_query($conexion, "USE enigma");


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['emailUsuario'] ?? '');
    $clave = $_POST['passwordUsuario'] ?? '';

    // Validar campos vacíos
    if (empty($email) || empty($clave)) {
        $_SESSION['errorLogueo'] = "Debe completar todos los campos.";
        header('Location: ../pages/login.php');
        exit;
    }

    $query = "SELECT id, nombre, contrasenia_hash FROM usuarios WHERE email = ?";
    $stmt = mysqli_prepare($conexion, $query);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);

    // Verifico que el usuario este registrado o que la contraseña coincida
    if ($usuario = mysqli_fetch_assoc($resultado)) {
        if (password_verify($clave, $usuario['contrasenia_hash'])) {
            // Login exitoso
            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['usuario_nombre'] = $usuario['nombre'];
            // header('Location: ../pages/confirmacionLogeoUsuario.php');
            header('Location: ../pages/login.php');
            exit;
        } else {
            // contraseña incorrecta
            $_SESSION['errorLogueo'] = "Contraseña incorrecta.";
        }
    } else {
        // correo no encontrado
        $_SESSION['errorLogueo'] = "Usuario no encontrado.";
    }

    header('Location: ../pages/login.php');
    exit;
}

