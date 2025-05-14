<?php
session_start();
require_once("../data/conexion.php");

$carrito = $_SESSION['carrito'] ?? [];

if (empty($carrito)) {
    echo "Tu carrito está vacío.";
    exit;
}

if (!isset($_SESSION['usuario_id'])) {
    echo "Debe iniciar sesión para finalizar la compra.";
    exit;
}

$usuario_id = $_SESSION['usuario_id'];
$total = 0;

// Calcular total del carrito
require_once("../data/productos/getProductoPorId.php");
foreach ($carrito as $id => $cantidad) {
    $producto = obtenerProductoPorId($id);
    if (!$producto) continue;
    $total += $producto['precio'] * $cantidad;
}

// Insertar el pedido
$fecha_pedido = date('Y-m-d H:i:s');
$estado_id = 1; // 1 = Pendiente

$stmt = $conexion->prepare("INSERT INTO pedidos (usuario_id, fecha_pedido, total, estado_id) VALUES (?, ?, ?, ?)");
$stmt->bind_param("isdi", $usuario_id, $fecha_pedido, $total, $estado_id);
$stmt->execute();

if ($stmt->affected_rows === 0) {
    echo "Error al registrar el pedido.";
    exit;
}

$pedido_id = $stmt->insert_id;
$stmt->close();

// Insertar los detalles del pedido
$stmt_detalle = $conexion->prepare("INSERT INTO pedido_detalles (pedido_id, producto_id, cantidad, precio_unitario) VALUES (?, ?, ?, ?)");

foreach ($carrito as $id => $cantidad) {
    $producto = obtenerProductoPorId($id);
    if (!$producto) continue;
    $precio_unitario = $producto['precio'];

    $stmt_detalle->bind_param("iiid", $pedido_id, $id, $cantidad, $precio_unitario);
    $stmt_detalle->execute();
}

$stmt_detalle->close();

// Vaciar carrito
unset($_SESSION['carrito']);

// Redirigir o mostrar mensaje
header("Location: gracias.php?pedido_id=$pedido_id");
exit;
?>
