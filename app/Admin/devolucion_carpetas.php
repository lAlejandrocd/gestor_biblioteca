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
                                    <th escope="col">Tipo carpeta</th>
                                    <th escope="col">Fecha solicitud devolución</th>
                                    <th escope="col">Acción</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $sql = mysqli_query($con, "SELECT usu.usu_id, usu.usu_nombre_cmplt, dc.`dc_codigo_carpeta`, dc.`ID`, ca.`ca_nombre_carpeta` ,ca.`ca_tipo_carpeta`, dc.`dc_fecha_devolucion` FROM usuarios usu INNER JOIN devolucion_carpeta dc ON dc.`dc_id_usuario` = usu.`usu_id` INNER JOIN carpetas ca ON ca.`ca_codigo_carpeta` = dc.`dc_codigo_carpeta`");

                                $row_f = mysqli_num_rows($sql);

                                while ($row = mysqli_fetch_assoc($sql)) { ?>

                                    <tr>
                                        <td><?php echo $row['ID']; ?></td>
                                        <td><?php echo $row['usu_nombre_cmplt']; ?></td>
                                        <td><?php echo $row['dc_codigo_carpeta']; ?></td>
                                        <td><?php echo $row['ca_nombre_carpeta']; ?></td>
                                        <td><?php echo $row['ca_tipo_carpeta']; ?></td>
                                        <td><?php echo $row['dc_fecha_devolucion']; ?></td>
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

                            $consula = mysqli_query($con, "SELECT ca_codigo_carpeta FROM carpetas");

                            $consulta2 = mysqli_query($con, "SELECT usu_id, usu_nombre_cmplt FROM usuarios");


                            ?>
                            <div class="form-group">
                                <label for="ca_codigo_carpeta">Carpeta: </label>
                                <select id="ca_codigo_carpetadev" class="custom-select custom-select-lg mb-3" name="">
                                    <?php
                                    while ($option = mysqli_fetch_assoc($consula)) {
                                    ?>
                                        <option value="<?php echo $option['ca_codigo_carpeta']; ?>"><?php echo $option['ca_codigo_carpeta']; ?></option>
                                    <?php } ?>
                                </select>
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
                                <input type="date" id="fechadev" name="fechadev" class="custom-select custom-select-lg mb-3">
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
                                <label for="ca_codigo_carpeta">Carpeta: </label>
                                <select id="ca_codigo_carpetaEditdev" class="custom-select custom-select-lg mb-3" name="">
                                    <?php
                                    while ($option = mysqli_fetch_assoc($consula)) {
                                    ?>
                                        <option value="<?php echo $option['ca_codigo_carpeta']; ?>"><?php echo $option['ca_codigo_carpeta']; ?></option>
                                    <?php } ?>
                                </select>
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