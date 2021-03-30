<?php

session_start();
include("../../global/conexion.php");

$ID_Ad =  $_SESSION["ID_Ad"];
if (empty($_SESSION["ID_Ad"])) {
    echo "<script> alert('No es posible acceder a esta página');
 	window.location.href='../../index.php';</script>";
} else { ?>

    <?php include("templates/header_admin.php"); ?>

    <div class="" id="content">

        <section class="py-3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <h1 class="font-weight-bold mb-0">Gestor de carpetas - Devoluciones</h1>
                    </div>
                    <div class="col-lg-3 d-flex">
                        <button class="btn btn-primary" type="button" id="agregar_devolucion">Agregar devolución</button>

                    </div>
                </div>
        </section>

        <section class="py-3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <table class="display" id="devoluciones" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th escope="col">ID</th>
                                    <th escope="col">Nombre de usuario</th>
                                    <th escope="col">Código carpeta</th>
                                    <th escope="col">Nombre carpeta</th>
                                    <th escope="col">Fecha solicitud devolución</th>
                                    <th escope="col">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                // $sql = mysqli_query($con, "SELECT usu.usu_id, usu.usu_nombre_cmplt, dc.`dc_codigo_carpeta`, dc.`ID`, ca.`ca_nombre_carpeta`, dc.`dc_fecha_devolucion` FROM usuarios usu INNER JOIN devolucion_carpeta dc ON dc.`dc_usuario` = usu.`usu_id` INNER JOIN carpetas ca ON ca.`ca_numero_item` = dc.`dc_numero_item`");

                                $sql = mysqli_query($con, "SELECT dc.ID,dc.dc_numero_item,dc.dc_usuario,dc.dc_date,usu.usu_id ,usu.usu_nombre_cmplt, ca.`ca_numero_item`ca_numero_item, ca.`ca_nombre_carpeta` FROM devolucion_carpeta dc INNER JOIN usuarios usu ON usu.`usu_id` = dc.`dc_usuario` INNER JOIN carpetas ca ON ca.`ca_numero_item` = dc.`dc_numero_item`");

                                $row_f = mysqli_num_rows($sql);

                                while ($row = mysqli_fetch_assoc($sql)) { ?>

                                    <tr>
                                        <td><?php echo $row['ID']; ?></td>
                                        <td><?php echo $row['usu_nombre_cmplt']; ?></td>
                                        <td><?php echo $row['dc_numero_item']; ?></td>
                                        <td><?php echo $row['ca_nombre_carpeta']; ?></td>

                                        <td><?php echo $row['dc_date']; ?></td>
                                        <td></td>
                                    </tr>
                                <?php  } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>

        <!-- Modal agregar devolución. -->
        <div id="agregar_dev" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header" id="modalheaderDev">

                        <h5 class="modal-title" id="ModaltitleDev"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>

                    </div>
                    <form id="agregarDev">
                        <div class="modal-body">

                            <?php

                            $consulta2 = mysqli_query($con, "SELECT usu_id, usu_nombre_cmplt FROM usuarios");

                            ?>

                            <div class="form-group">
                                <label for=""></label>
                                <input type="text" class="form-control form-control-sm" name="ca_codigo_carpetadev" id="ca_codigo_carpetadev" aria-describedby="helpId" placeholder="">
                                <small id="helpId" class="form-text text-muted">Código de carpeta.</small>
                            </div>
                            <div class="form-group">
                                <label for="usu_nombre_cmplt">Usuario: </label>
                                <select id="usu_iddev" class="custom-select custom-select-lg mb-3" name="usu_id">
                                    <?php
                                    while ($option2 = mysqli_fetch_assoc($consulta2)) {
                                    ?>

                                        <option value="<?php echo $option2['usu_id']; ?>"><?php echo $option2['usu_nombre_cmplt']; ?></option>

                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="fecha">Fecha devolución: </label>
                                <input type="date" id="dc_date" name="dc_date" class="custom-select custom-select-lg mb-3">
                            </div>

                            <div class="form-group">
                                <button class="btn btn-primary" type="submit">Enviar devolución</button>
                            </div>

                        </div>
                    </form>

                </div>
            </div>
        </div>

        <!-- Modal editar devolución -->
        <div id="editar_dev" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header" id="Modal_headerDevEdit">

                        <h5 class="modal-title" id="ModalTitle_DevEdit"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>

                    </div>
                    <form id="EditarDev">
                        <div class="modal-body">

                            <?php

                            $consula = mysqli_query($con, "SELECT ca_codigo_carpeta FROM carpetas");

                            $consulta2 = mysqli_query($con, "SELECT usu_id, usu_nombre_cmplt FROM usuarios");


                            ?>
                            <div class="form-group">
                                <input id="IDEditDev" class="form-control" type="hidden" name="">
                            </div>

                            <div class="form-group">
                                <label for="">Número de item:</label>
                                <input type="text" class="form-control" name="dc_numero_item_Editdev" id="dc_numero_item_Editdev" aria-describedby="" placeholder="">
                                <small id="helpId" class="form-text text-muted">Help text</small>
                            </div>



                            <div class="form-group">
                                <label for="usu_nombre_cmplt">Usuario: </label>
                                <select id="usu_idEditdev" class="custom-select custom-select-lg mb-3" name="usu_id">
                                    <?php
                                    while ($option2 = mysqli_fetch_assoc($consulta2)) {
                                    ?>

                                        <option value="<?php echo $option2['usu_id']; ?>"><?php echo $option2['usu_nombre_cmplt']; ?></option>

                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="fecha">Fecha devolución: </label>
                                <input type="date" id="fechaEditdev" name="fechadev" class="custom-select custom-select-lg mb-3">
                            </div>

                            <div class="form-group">
                                <button class="btn btn-primary" type="submit" id="btnDevEdit"></button>
                            </div>

                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>


    </div>

    <?php include("templates/footer_admin.php"); ?>


<?php } ?>