<?php
session_start();
require_once("../data/conexion.php");

// Base de datos por defecto
mysqli_query($conexion, "USE enigma");

// Obtener datos del formulario
$nombre = trim($_POST['nombreUsuario'] ?? '');
$apellido = trim($_POST['apellidoUsuario'] ?? '');
$email = trim($_POST['emailUsuario'] ?? '');
$password = trim($_POST['passwordUsuario'] ?? '');
$repassword = trim($_POST['repasswordUsuario'] ?? '');
$direccion = trim($_POST['direccionUsuario'] ?? '');
$telefono = trim($_POST['telefonoUsuario'] ?? '');

// Validación
$errores = [];

if (empty($nombre)) $errores[] = "El nombre es obligatorio.";
if (empty($apellido)) $errores[] = "El apellido es obligatorio.";
if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errores[] = "Email inválido.";
if (empty($password)) $errores[] = "La contraseña es obligatoria.";
if ($password !== $repassword) $errores[] = "Las contraseñas no coinciden.";
if (empty($direccion)) $errores[] = "La dirección es obligatoria.";
if (empty($telefono) || !preg_match('/^\d{8,15}$/', $telefono)) $errores[] = "Teléfono inválido.";

// Redirigir si hay errores
if (!empty($errores)) {
    $_SESSION['error'] = implode("<br>", $errores);
    header("Location: ../pages/login.php");
    exit;
}

// Verificar si el email ya existe
$query_check = "SELECT id FROM usuarios WHERE email = ?";
$stmt = mysqli_prepare($conexion, $query_check);
mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_execute($stmt);
mysqli_stmt_store_result($stmt);

if (mysqli_stmt_num_rows($stmt) > 0) {
    $_SESSION['error'] = "El correo ya está registrado. Inicie sesión.";
    header("Location: ../pages/login.php");
    exit;
}
mysqli_stmt_close($stmt);

// Encriptar la contraseña
$hash = password_hash($password, PASSWORD_DEFAULT);

// Insertar usuario
$query_insert = "INSERT INTO usuarios (nombre, apellido, email, contrasenia_hash, direccion, telefono) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($conexion, $query_insert);
mysqli_stmt_bind_param($stmt, "ssssss", $nombre, $apellido, $email, $hash, $direccion, $telefono);

if (mysqli_stmt_execute($stmt)) {
    $_SESSION['registro_exitoso'] = true;
    $_SESSION['nombre'] = $nombre;
    header("Location: ../pages/confirmacionUsuario.php");
    exit;
} else {
    $_SESSION['error'] = "Error al registrar el usuario.";
    header("Location: ../pages/login.php");
    exit;
}
