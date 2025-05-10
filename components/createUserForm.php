<h3 class="text-primary">Crea tu cuenta y compra donde estes</h3>
<form>
    <h4 class="text-danger">Datos personales</h4>
    <div class="mb-3 w-50">
        <!-- <label for="nombreUsuario" class="form-label">Ingrese su nombre:</label> -->
        <input type="text" name="nombreUsuario" placeholder="Ingrese su nombre" class="form-control" id="nombreUsuario">
    </div>
    <div class="mb-3 w-50">
        <!-- <label for="apellidoUsuario" class="form-label">Ingrese su apellido:</label> -->
        <input type="text" name="apellidoUsuario" placeholder="Ingrese su apellido" class="form-control" id="apellidoUsuario">
    </div>
    <div class="mb-3 w-50">
        <!-- <label for="codigoPostalUsuario" class="form-label">Ingrese su codigo postal:</label> -->
        <!-- <input type="text" class="form-control" id="codigoPostalUsuario"> -->
        <input type="text" name="codigoPostalUsuario" placeholder="Ingrese su codigo postal" class="form-control" id="codigoPostalUsuario" pattern="[0-9]{4}" inputmode="numeric" title="Ingrese 4 dígitos numéricos" required>

    </div>

    <h4 class="text-danger">Usuario y contraseña</h4>
    <div class="mb-3 w-50">
        <!-- <label for="exampleInputEmail1" class="form-label">Ingrese su correo:</label> -->
        <input type="email" class="form-control" placeholder="Ingrese su correo" id="correoUsuario" aria-describedby="correolHelp">
        <!-- <div id="correolHelp" class="form-text text-secondary">Con este correo podra autenticarse.</div> -->
    </div>
    <div class="mb-3 w-50">
        <!-- <label for="exampleInputPassword1" class="form-label">Ingrese su contraseña:</label> -->
        <input type="password" class="form-control" placeholder="Ingrese su contraseña" id="passwordUsuario" aria-describedby="passwordHelp">
        <!-- <div id="passwordHelp" class="form-text text-secondary">Use esta contraseña para autenticarse.</div> -->
    </div>
    <div class="mb-3 w-50">
        <!-- <label for="exampleInputPassword1" class="form-label">Confirme contraseña:</label> -->
        <input type="password" class="form-control" placeholder="Comfirme su contraseña" id="exampleInputPassword1">
        <!-- <div id="passwordHelp" class="form-text text-secondary">Use esta contraseña para autenticarse.</div> -->
    </div>
    <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Aceptar terminos y condiciones.</label>
    </div>
    <button type="submit" class="btn btn-primary">Registrar Usuario</button>
</form>