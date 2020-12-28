<?php

session_start();

include("../../global/conexion.php");

$ID_Ad = $_SESSION["ID_Ad"];

if (empty($_SESSION["ID_Ad"])) {

    echo "<script> alert('No es posible acceder a esta página');
 	window.location.href='../../index.php';</script>";
} else { ?>

    <?php include("templates/header_admin.php"); ?>

    <div class="container">
        <div class="jumbotron text-center">
            <h1 class="display-8">Registrar usuario</h1>
            <form action="backend/registrar_usuario.php" method="POST">
                <div class="form-group row">
                    <label for="inputNumero_Cedula" class="col-sm-2 col-form-label">Cédula</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="" name="usu_id" REQUIRED>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputNombre" class="col-sm-2 col-form-label">Nombre Completo</label>
                    <div class="col-sm-10">
                        <input type="text" name="usu_nombre_cmplt" class="form-control" REQUIRED>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" name="usu_email" class="form-control" REQUIRED>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputClave" class="col-sm-2 col-form-label">Clave</label>
                    <div class="col-sm-10">
                        <input type="password" name="usu_clave" class="form-control" REQUIRED>
                    </div>
                </div>

                <button class="btn btn-success" type="submit" name="btn-register">Registrar</button>
            </form>

        </div>
    </div>

    

    <?php include("templates/footer_admin.php"); ?>

<?php } ?>