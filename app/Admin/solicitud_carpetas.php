<?php

session_start();
include("../../global/conexion.php");

$IDAd = $_SESSION['ID_Ad'];

if (empty($_SESSION['ID_Ad'])) {

    echo "<script> alert('No es posible acceder a esta página');
 	window.location.href='../../index.php';</script>";
} else { ?>

    <?php include("templates/header_admin.php"); ?>



    <div class="" id="content">
        <section class="py-3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <h1 class="font-weight-bold mb-0">Gestor de carpetas.</h1>
                    </div>

                </div>
        </section>


        <!-- Section de tabla  -->
        <section class="py-3">

            <!-- INICIO DE TABLA  -->
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="jumbotron">
                            <div class="card">
                                <div class="card card-body">
                                    <div class="table responsive">

                                        <?php

                                        $query = mysqli_query($con, "SELECT * FROM solicitud_prestamo");

                                        $row_f = mysqli_num_rows($query);

                                        if ($row_f >= 1) {



                                            while ($row = mysqli_fetch_array($query)) {

                                                $query_email = mysqli_query($con, "SELECT usu_id,usu_email FROM usuarios usu INNER JOIN solicitud_prestamo cs ON usu.`usu_id` = cs.`pc_id_usuario`");

                                                $query_array_email = mysqli_fetch_array($query_email);

                                                $usu_email = $query_array_email['usu_email'];

                                                $datos_sc = $row[0] . "||" . $row[1] . "||" . $row[2] . "||" . $row[3] . "||" . $row[4] . "||" . $usu_email;

                                                $ID = $row[0];

                                                $pc_id_usuario = $row[1];

                                                $pc_codigo_carpt = $row[2];

                                                $pc_fecha_final = $row[4];

                                        ?>

                                                <table class="table table-dark">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Persona solicitante</th>
                                                            <th scope="col">Codigo carpeta</th>
                                                            <th scope="col">Fecha de inicio</th>
                                                            <th scope="col">Fecha final</th>
                                                            <th scope="col">Opciones</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td><?php echo $row[1]; ?></td>
                                                            <td><?php echo $row[2]; ?></td>
                                                            <td><?php echo $row[3]; ?></td>
                                                            <td><?php echo $row[4]; ?></td>
                                                            <td>
                                                                <div class='text-center'>
                                                                    <div class='btn-group' role='group' aria-label='Button group'>
                                                                        <button class="btn btn-primary btn-autorizar" type="button" name="btn-autorizar" edit="btn-autorizar" onclick="llenar_modal_sc('<?php echo $datos_sc; ?>');">Autorizar</button>
                                                                        <button class="btn btn-warning" type="button" name="UsubtnEliminar" id="UsubtnEliminar" onclick="eliminar_datos('<?php echo $ID; ?>');">eliminar</button>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>

                                                </table>

                                            <?php  } ?>

                                        <?php } else { ?>

                                            <div class="alert alert-primary" role="alert">
                                                <h3 class="alert-link">No hay solicitudes de carpetas.</h3>
                                            </div>
                                        <?php  }  ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div id="autorizar_carpeta" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header_sc">
                        <h5 class="modal-title_sc" id="modal-title_sc"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                    </div>
                    <form id="autorizar_carpeta">
                        <div class="modal-body">
                            <div class="form-group row">
                                <label for="inputCodigocarpeta" class="col-sm-2 col-form-label">Destino</label>
                                <div class="col-sm-10">
                                    <input type="email" REQUIRED class="form-control" id="usu_email" name="usu_email" value="<?php echo $usu_email; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputCodigocarpeta" class="col-sm-2 col-form-label">Asunto</label>
                                <div class="col-sm-10">
                                    <input type="text" REQUIRED class="form-control" id="asunto" name="asunto" value="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputCodigocarpeta" class="col-sm-2 col-form-label">Contenido</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" aria-label="With textarea" name="mensaje" id="mensaje" placeholder="..."></textarea>
                                </div>
                            </div>
                            <div class="col-sm-10">
                                <input type="hidden" REQUIRED class="form-control" id="ID" name="ID" value="<?php echo $ID; ?>">
                            </div>
                            <div class="col-sm-10">
                                <input type="hidden" REQUIRED class="form-control" id="pc_codigo_carpt" name="pc_codigo_carpt" value="<?php echo $pc_codigo_carpt; ?>">
                            </div>
                            <div class="col-sm-10">
                                <input type="hidden" REQUIRED class="form-control" id="pc_id_usuario" name="pc_id_usuario" value="<?php echo $pc_id_usuario; ?>">
                            </div>
                            <div class="form-group row">
                                <label for="pc_fecha_final" class="col-sm-2 col-form-label">Fecha final</label>
                                <div class="col-sm-10">
                                    <input type="date" REQUIRED class="form-control" id="pc_fecha_final" name="pc_fecha_final" value="<?php echo $pc_fecha_final; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary" name="btn-submit">Enviar.</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <!-- MODAL -->
    <?php

    //  $ID = $_POST['ID'];
    //  $pc_id_usuario = $_POST['pc_id_usuario'];
    //  $pc_codigo_carpt = $_POST['pc_codigo_carpt'];
    //  $pc_fecha_final = $_POST['pc_fecha_final'];

    //  $query = mysqli_query($con, "SELECT * FROM usuarios WHERE usu_id = '$pc_id_usuario'");

    //  $row = mysqli_fetch_assoc($query);

    //  $usu_email = $row['usu_email'];

    ?>

    <!-- MODAL Rechazar PRESTAMO -->







    </div>
    <?php include("templates/footer_admin.php"); ?>

<?php } ?>


<!-- FORMULARIO RECHAZAR CARPETA -->
<!-- <form action="rechazar_carpeta.php" method="post">
    <input type="hidden" name="ID" value="<?php echo $row['ID']; ?>">
    <input type="hidden" name="pc_id_usuario" value="<?php echo $row['pc_id_usuario']; ?>">
    <input type="hidden" name="pc_codigo_carpt" value="<?php echo $row['pc_codigo_carpt']; ?>">
    <input type="hidden" name="pc_fecha_final" value="<?php echo $row['pc_fecha_final']; ?>">

    <button class="btn btn-danger" type="submit" name="btn-rechazar">Rechazar Prestamo</button>

</form> -->


<!-- FORMULARIO AUTORIZAR CARPETA -->
<!-- <form action="solicitud_carpetas.php" method="post">
    <input type="hidden" name="ID" value="<?php echo $row['ID']; ?>">
    <input type="hidden" name="pc_id_usuario" value="<?php echo $row['pc_id_usuario']; ?>">
    <input type="hidden" name="pc_codigo_carpt" value="<?php echo $row['pc_codigo_carpt']; ?>">
    <input type="hidden" name="pc_fecha_final" value="<?php echo $row['pc_fecha_final']; ?>">
    <button class="btn btn-success btn-autorizar" name="btn-autorizar" type="submit">Autorizar Prestamo</button>
</form> -->