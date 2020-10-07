<div class="container">
    <h1>Inicio de sesión</h1>
    <form method="post" action="app/Admin/validar_usuario.php">
        <div class="row">
            <div class="form-group col">
                <label for="my-input">Documento identidad</label>
                <input class="form-control" type="text" name="id_admin" REQUIRED>
            </div>
            <div class="form-group col">
                <label for="my-input">Contraseña</label>
                <input class="form-control" type="password" name="admin_password" REQUIRED>
            </div>
        </div>
        <button class="btn btn-success" type="submit" name="btn-login">Ingresar</button>
    </form>
</div>

<br><br>



<div class="container">
    <h1>Registro</h1>
    <form method="post" action="#">
        <div class="row">
            <div class="form-group col">
                <label for="my-input">Documento identidad</label>
                <input class="form-control" type="text" name="usu_id" REQUIRED>
            </div>
            <div class="form-group col">
                <label for="my-input">Nombre completo</label>
                <input class="form-control" type="text" name="usu_nombre_cmplt" REQUIRED>
            </div>
            <div class="form-group col">
                <label for="my-input">Correo electrónico</label>
                <input class="form-control" type="text" name="usu_email" REQUIRED>
            </div>
            <div class="form-group col">
                <label for="my-input">Contraseña</label>
                <input class="form-control" type="password" name="usu_clave" REQUIRED>
            </div>
        </div>
        <input class="btn btn-success" type="submit" name="btn-register">
    </form>
</div>

<br>
<br>