<?php

session_start();
include("../../global/conexion.php");

$IDAd = $_SESSION['ID_Ad'];

if (empty($_SESSION['ID_Ad'])) {

    echo "<script> alert('No es posible acceder a esta página');
 	window.location.href='../../index.php';</script>";
} else { ?>

    <?php

    if (isset($_POST['btn-rechazar'])) {

        $ID = $_POST['ID'];
        $pc_id_usuario = $_POST['pc_id_usuario'];
        $pc_codigo_carpt = $_POST['pc_codigo_carpt'];
        $pc_fecha_final = $_POST['pc_fecha_final'];

        $query = mysqli_query($con, "SELECT * FROM usuarios WHERE usu_id = '$pc_id_usuario'");

        $row = mysqli_fetch_assoc($query);

        $usu_email = $row['usu_email'];
    }

    ?>

    <?php include("../../templates/admin/header_admin.php"); ?>

    <div class="container">
        <div class="jumbotron text-center">
            <h1 class="display-8">Rechazo prestamo de carpeta.</h1>
            <form action="envio_rechazar_carpeta.php" method="post">
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
                    <input type="hidden" REQUIRED class="form-control" id="" name="ID" value="<?php echo $ID; ?>">
                </div>
                <div class="col-sm-10">
                    <input type="hidden" REQUIRED class="form-control" id="" name="pc_codigo_carpt" value="<?php echo $pc_codigo_carpt; ?>">
                </div>
                <div class="col-sm-10">
                    <input type="hidden" REQUIRED class="form-control" id="" name="pc_id_usuario" value="<?php echo $pc_id_usuario; ?>">
                </div>
                <div class="col-sm-10">
                    <input type="hidden" REQUIRED class="form-control" id="" name="pc_fecha_final" value="<?php echo $pc_fecha_final; ?>">
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary" name="btn-submit">Enviar.</button>
                    </div>
                </div>



            </form>
        </div>
    </div>

    <?php include("../../templates/admin/footer_admin.php"); ?>





<?php } ?>