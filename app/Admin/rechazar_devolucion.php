<?php

session_start();
include("../../global/conexion.php");
$ID_Ad = $_SESSION["ID_Ad"];
if (empty($_SESSION["ID_Ad"])) {
    echo "<script> alert('No es posible acceder a esta página');
 	window.location.href='../../index.php';</script>";
} else { ?>

    <?php include("templates/header_admin.php"); ?>

    <?php

    if (isset($_POST['btn-rechazar'])) {

        $usu_id = $_POST['usu_id'];
        $dc_codigo_carpeta = $_POST['dc_codigo_carpeta'];

        $sql = mysqli_query($con, "SELECT * FROM usuarios WHERE usu_id = '$usu_id'");

        $row = mysqli_fetch_array($sql);

        $usu_email = $row['usu_email'];
    }

    ?>


    <div class="container">
        <div class="jumbotron text-center">
            <h1 class="display-8">Rechazar devolución</h1>
            <form action="envio_rechazar_devolucion.php" method="post">
                <div class="form-group row">
                    <label for="inputCodigocarpeta" class="col-sm-2 col-form-label">Destino</label>
                    <div class="col-sm-10">
                        <input type="email" REQUIRED class="form-control" id="" name="usu_email" value="<?php echo $usu_email; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputCodigocarpeta" class="col-sm-2 col-form-label">Asunto</label>
                    <div class="col-sm-10">
                        <input type="text" REQUIRED class="form-control" id="" name="asunto" value="">
                    </div>
                </div>


                <div class="form-group row">
                    <label for="inputCodigocarpeta" class="col-sm-2 col-form-label">Contenido</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" aria-label="With textarea" name="mensaje" placeholder="..."></textarea>

                    </div>
                </div>
                <div class="col-sm-10">
                    <input type="text" REQUIRED class="form-control" id="" name="usu_id" value="<?php echo $usu_id; ?>">
                </div>
                <div class="col-sm-10">
                    <input type="text" REQUIRED class="form-control" id="" name="dc_codigo_carpeta" value="<?php echo $dc_codigo_carpeta; ?>">
                </div>

                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary" name="btn-submit">Enviar.</button>
                    </div>
                </div>



            </form>


        </div>
    </div>

    <?php include("templates/footer_admin.php"); ?>


<?php } ?>