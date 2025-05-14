<?php
    // Abrimos la conexión a la base de datos
    require_once(dirname(__DIR__, 2) . '/data/conexion.php');

    function obtenerNotebook() {
        global $conexion;
        
        // Cambiamos la categoría de 'Aires' a 'Notebook'
        $sql = "SELECT id, nombre, descripcion, precio, imagen_url 
                FROM productos 
                WHERE categoria_id = (
                    SELECT id FROM categorias WHERE nombre = 'Notebooks'
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
