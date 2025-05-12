<h3 class="text-primary">Crea tu cuenta y compra donde estés</h3>

<?php if (!empty($mensaje_error)): ?>
    <div class="alert alert-danger text-center"><?= $mensaje_error ?></div>
<?php endif; ?>

<form action="../components/procesar_registro.php" method="POST" class="formularioRegistro">
    <div class="mb-3 d-flex align-items-center">
        <label for="nombreUsuario" class="me-2 w-25">Nombre:</label>
        <input type="text" class="form-control" id="nombreUsuario" name="nombreUsuario" placeholder="Tu nombre" required>
    </div>

    <div class="mb-3 d-flex align-items-center">
        <label for="apellidoUsuario" class="me-2 w-25">Apellido:</label>
        <input type="text" class="form-control" id="apellidoUsuario" name="apellidoUsuario" placeholder="Tu apellido" required>
    </div>

    <div class="mb-3 d-flex align-items-center">
        <label for="emailUsuario" class="me-2 w-25">Email:</label>
        <input type="email" class="form-control" id="emailUsuario" name="emailUsuario" placeholder="ejemplo@correo.com" required>
    </div>

    <div class="mb-3 d-flex align-items-center">
        <label for="passwordUsuario" class="me-2 w-25">Contraseña:</label>
        <input type="password" class="form-control" id="passwordUsuario" name="passwordUsuario" placeholder="Contraseña segura" required>
    </div>

    <div class="mb-3 d-flex align-items-center">
        <label for="repasswordUsuario" class="me-2 w-25">Repetir Contraseña:</label>
        <input type="password" class="form-control" id="repasswordUsuario" name="repasswordUsuario" placeholder="Repetir contraseña" required>
    </div>

    <div class="mb-3 d-flex align-items-center">
        <label for="direccionUsuario" class="me-2 w-25">Dirección:</label>
        <input type="text" class="form-control" id="direccionUsuario" name="direccionUsuario" placeholder="Dirección actual" required>
    </div>

    <div class="mb-3 d-flex align-items-center">
        <label for="telefonoUsuario" class="me-2 w-25">Teléfono:</label>
        <input type="tel" class="form-control" id="telefonoUsuario" name="telefonoUsuario" placeholder="Ej. 1123456789" required>
    </div>

    <button type="submit" class="btn btn-primary">Registrarse</button>
</form>
