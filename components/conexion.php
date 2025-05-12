<?php
$host = "localhost";
$usuario = "root";
$contrasenia = ""; // la predeterminada en XAMPP
$base_datos = "enigma";

$conexion = new mysqli($host, $usuario, $contrasenia, $base_datos);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
?>
