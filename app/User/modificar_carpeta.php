<?php

session_start();
include('../../global/conexion.php');

$usu_id = $_SESSION["id"];

if (empty($_SESSION["id"])) {

    echo "<script> alert('No es posible acceder a esta página');
 	window.location.href='../index.php';</script>";
} else {
?>

    <?php include("../../templates/header.php"); ?>

    <div class="container">
        <div class="jumbotron text-center">
            <h1 class="display-8">Agregar modificaciones.</h1>
            <br>
            <form method="POST" action="enviar_modificar_carpeta.php">
                <div class="form-group row">
                    <label for="inputCodigocarpeta" class="col-sm-2 col-form-label">Codigo carpeta</label>
                    <div class="col-sm-10">
                        <input type="number" REQUIRED class="form-control" id="inputEmail3" name="cm_codigo_carpeta" value="">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Folios agregados.</label>
                    <div class="col-sm-10">
                        <input type="number" REQUIRED class="form-control" name="cm_folios_agregados" value="">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary" name="btn-submit">Enviar Modificación.</button>
                    </div>
                </div>
            </form>


        </div>
    </div>

    </body>

    </html>


<?php } ?>