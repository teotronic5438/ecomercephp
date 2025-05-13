<?php
    // Abrimos la conexión a la base de datos
    require_once(dirname(__DIR__, 2) . '/data/conexion.php');

    function obtenerTelevisores() {
        // global $conexion; te permite acceder a la conexión definida en conexion.php.
        global $conexion;
        
        $sql = "SELECT id, nombre, descripcion, precio, imagen_url 
                FROM productos 
                WHERE categoria_id = (
                    SELECT id FROM categorias WHERE nombre = 'TV'
                )";

        $resultado = mysqli_query($conexion, $sql);

        $productos = [];
        if ($resultado) {
            while ($fila = mysqli_fetch_assoc($resultado)) {
                $productos[] = $fila;
            }
        }

        return $productos;
    }
?>
