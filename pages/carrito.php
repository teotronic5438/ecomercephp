<?php
session_start();
require_once(dirname(__DIR__) . '/data/conexion.php');
require_once(dirname(__DIR__) . '/data/productos/getProductoPorId.php');

// Agregar producto al carrito
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['producto_id'], $_POST['cantidad'])) {
    $productoId = intval($_POST['producto_id']);
    $cantidad = intval($_POST['cantidad']);

    if ($cantidad > 0) {
        $producto = obtenerProductoPorId($productoId);

        if ($producto) {
            $item = [
                'id' => $producto['id'],
                'nombre' => $producto['nombre'],
                'precio' => $producto['precio'],
                'cantidad' => $cantidad,
                'imagen_url' => $producto['imagen_url']
            ];

            // Inicializar carrito si no existe
            if (!isset($_SESSION['carrito'])) {
                $_SESSION['carrito'] = [];
            }

            // Si ya está en el carrito, actualizar cantidad
            if (isset($_SESSION['carrito'][$productoId])) {
                $_SESSION['carrito'][$productoId]['cantidad'] += $cantidad;
            } else {
                $_SESSION['carrito'][$productoId] = $item;
            }
        }
    }

    // Redireccionar para evitar reenviar el formulario
    header("Location: carrito.php");
    exit;
}

// Eliminar producto del carrito
if (isset($_GET['eliminar'])) {
    $idEliminar = intval($_GET['eliminar']);
    unset($_SESSION['carrito'][$idEliminar]);
    header("Location: carrito.php");
    exit;
}

$carrito = $_SESSION['carrito'] ?? [];

include_once('../partials/header.php');
?>

<div class="container my-5">
    <h2 class="mb-4">Carrito de Compras</h2>

    <?php if (!empty($carrito)): ?>
        <table class="table table-bordered align-middle">
            <thead class="table-light">
                <tr>
                    <th>Producto</th>
                    <th>Imagen</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Total</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php $total = 0; ?>
                <?php foreach ($carrito as $item): ?>
                    <?php $subtotal = $item['precio'] * $item['cantidad']; ?>
                    <?php $total += $subtotal; ?>
                    <tr>
                        <td><?php echo htmlspecialchars($item['nombre']); ?></td>
                        <td><img src="<?php echo htmlspecialchars($item['imagen_url']); ?>" style="width: 60px;"></td>
                        <td>$<?php echo number_format($item['precio'], 2); ?></td>
                        <td><?php echo $item['cantidad']; ?></td>
                        <td>$<?php echo number_format($subtotal, 2); ?></td>
                        <td>
                            <a href="?eliminar=<?php echo $item['id']; ?>" class="btn btn-sm btn-danger">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td colspan="4" class="text-end fw-bold">Total:</td>
                    <td colspan="2" class="fw-bold">$<?php echo number_format($total, 2); ?></td>
                </tr>
            </tbody>
        </table>
        <div class="text-end">
            <a href="checkout.php" class="btn btn-success">Finalizar Compra</a>
        </div>
    <?php else: ?>
        <div class="alert alert-info">Tu carrito está vacío.</div>
    <?php endif; ?>
</div>

<?php include_once('../partials/footer.php'); ?>
