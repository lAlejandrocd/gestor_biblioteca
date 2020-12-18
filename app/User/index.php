<?php

session_start();
include('../../global/conexion.php');

$usu_id = $_SESSION["id"];

if (empty($_SESSION["id"])) {

    echo "<script> alert('No es posible acceder a esta página');
 	window.location.href='../index.php';</script>";
} else {
?>


    <?php

    include("templates/header_user.php");

    ?>
    <!-- Botón añadir carpeta -->
    <section class="py-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 d-flex">
                    <button class="btn btn-primary align-self-center" type="button" id="insertar"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmark-plus-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M4 0a2 2 0 0 0-2 2v13.5a.5.5 0 0 0 .74.439L8 13.069l5.26 2.87A.5.5 0 0 0 14 15.5V2a2 2 0 0 0-2-2H4zm4.5 4.5a.5.5 0 0 0-1 0V6H6a.5.5 0 0 0 0 1h1.5v1.5a.5.5 0 0 0 1 0V7H10a.5.5 0 0 0 0-1H8.5V4.5z" />
                        </svg>Añadir carpeta</button>
                </div>
            </div>
        </div>

    </section>

    <!-- Tabla de carpetas -->
    <section class="">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <table id="carpetas" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>codigo carpeta</th>
                                <th>nombre</th>
                                <th>cantidad folios</th>
                                <th>estado</th>
                                <th>tipo</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $query_select = mysqli_query($con, "SELECT * FROM carpetas");

                            while ($show_info = mysqli_fetch_array($query_select)) { ?>

                                <tr>
                                    <th scope="row"><?php echo $show_info['ca_codigo_carpeta']; ?></th>
                                    <td><?php echo $show_info['ca_nombre_carpeta']; ?></td>
                                    <td><?php echo $show_info['ca_numero_folios']; ?></td>
                                    <td><?php echo $show_info['ca_estado_carpeta']; ?></td>
                                    <td><?php echo $show_info['ca_tipo_carpeta']; ?></td>
                                    <td></td>
                                </tr>

                            <?php } ?>



                        </tbody>
                    </table>
                </div>

            </div>
        </div>

        <?php include("templates/footer_user.php") ?>

        <!-- Modal añadir carpeta -->
        <div id="addFolder" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="Modaltitle">Añadir carpeta</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                    </div>
                    <form id="form_addFolder">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="ca_codigo_carpeta" class="col-form-label">Código carpeta</label>
                                <input type="text" name="ca_codigo_carpeta" class="form-control" id="ca_codigo_carpeta">
                            </div>
                            <div class="form-group">
                                <label for="ca_nombre_carpeta" class="col-form-label">Nombre carpeta</label>
                                <input type="text" name="ca_nombre_carpeta" class="form-control" id="ca_nombre_carpeta">
                            </div>
                            <div class="form-group">
                                <label for="ca_numero_folios" class="col-form-label">Número de folios</label>
                                <input type="text" name="ca_numero_folios" class="form-control" id="ca_numero_folios">
                            </div>
                            <div class="form-group">
                                <label for="ca_estado_carpeta" class="col-form-label">Estado de carpeta</label>
                                <input type="text" name="ca_estado_carpeta" class="form-control" id="ca_estado_carpeta">
                            </div>
                            <div class="form-group">
                                <label for="ca_tipo_carpeta" class="col-form-label">Tipo de carpeta</label>
                                <input type="text" name="ca_tipo_carpeta" class="form-control" id="ca_tipo_carpeta">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit">Guardar folder</button>
                                <button class="btn btn-danger" data-dismiss="modal" type="button">Cancelar</button>
                            </div>
                        </div>
                        <!-- footer del modal. -->
                        <!-- <div class="modal-footer">
                         


                        </div> -->
                    </form>
                </div>
            </div>
        </div>
        </div>

        <!-- <div class='text-center'><div class='btn-group' role='group' aria-label='Button group'><button id='btnSolicitar' class='btn btn-primary btnPrimary' type='button' ><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'><path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/><path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/></svg>Solicitar folder</button></div></div>     -->


    <?php } ?>