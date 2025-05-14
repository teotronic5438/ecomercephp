<h3 class="text-primary">¿Tenés una cuenta?</h3>

<?php
    if (isset($_SESSION['errorLogueo'])) {
        echo '<div class="alert alert-danger text-center">' . $_SESSION['errorLogueo'] . '</div>';
        unset($_SESSION['errorLogueo']);
    }
?>

<form action="../components/procesar_login.php<?php echo isset($_GET['redirigir']) ? '?redirigir=' . urlencode($_GET['redirigir']) : ''; ?>" method="POST">
    <div class="mb-3 w-50">
        <label for="emailUsuario" class="form-label">Ingresa tu correo:</label>
        <input type="email" class="form-control" id="emailUsuario" name="emailUsuario" aria-describedby="emailHelp" required>
        <div id="emailHelp" class="form-text">Usá el correo que utilizaste para registrarte.</div>
    </div>

    <div class="mb-3 w-50">
        <label for="passwordUsuario" class="form-label">Ingrese su contraseña:</label>
        <input type="password" class="form-control" id="passwordUsuario" name="passwordUsuario" aria-describedby="passHelp" required>
        <div id="passHelp" class="form-text">Usá la contraseña que utilizaste para registrarte.</div>
    </div>

    <div class="mb-3 w-50">
        <a class="form-text text-primary" href="/ecomerce/pages/olvidarContrasenia.php">¿Olvidaste tu contraseña?</a>
    </div>

    <button type="submit" class="btn btn-primary">Ingresar</button>
</form>
