<?php
    require_once(dirname(__DIR__) . '/conexion.php');

    function obtenerProductoPorId($id) {
        global $conexion;

        $id = intval($id);
        $sql = "SELECT id, nombre, descripcion, precio, imagen_url FROM productos WHERE id = $id";
        $resultado = $conexion->query($sql);

        return ($resultado && $resultado->num_rows > 0) ? $resultado->fetch_assoc() : null;
    }
?>
