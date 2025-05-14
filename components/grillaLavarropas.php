<?php if (!empty($productos)): ?>
    <div class="container my-4">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
            <?php foreach ($productos as $producto): ?>
                <div class="col">
                    <div class="card h-100">
                        <img src="<?php echo htmlspecialchars($producto['imagen_url']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($producto['nombre']); ?>" style="height:200px; object-fit:cover;">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($producto['nombre']); ?></h5>
                            <p class="card-text"><?php echo htmlspecialchars($producto['descripcion']); ?></p>
                            <p class="fw-bold text-primary">$<?php echo number_format($producto['precio'], 2); ?></p>
                            <a href="productoDetallado.php?id=<?php echo $producto['id']; ?>" class="btn btn-outline-primary w-100">
                                Ver más
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php else: ?>
    <div class="alert alert-warning text-center my-4">No hay productos disponibles en esta categoría.</div>
<?php endif; ?>