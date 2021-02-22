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
                        <h1 class="font-weight-bold mb-0">Gestor de carpetas - Modificaciones</h1>
                    </div>
                    <div class="col-lg-3">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary btn-lg" name="" id="ag_modificacion">Agregar modificación</button>
                    </div>
                </div>
        </section>

        <section class="py-3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <?php

                        $query = mysqli_query($con, "SELECT usu.*, cm.* FROM usuarios usu INNER JOIN carpetas_modificadas cm ON cm.`cm_id_usuario` = usu.`usu_id`;");

                        ?>
                        <table class="display" id="modificacion">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Código de carpeta </th>
                                    <th scope="col">Folios Agregados</th>
                                    <th scope="col">Fecha de modificación</th>
                                    <th scope="col">Id de usuario</th>
                                    <th scope="col">Nombre usuario</th>
                                    <th scope="col">Acción</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                while ($row = mysqli_fetch_assoc($query)) { ?>
                                    <tr>
                                        <td><?php echo $row['ID']; ?></td>
                                        <td><?php echo $row['cm_codigo_carpeta']; ?></td>
                                        <td><?php echo $row['cm_folios_agregados']; ?></td>
                                        <td><?php echo $row['cm_fecha']; ?></td>
                                        <td><?php echo $row['cm_id_usuario']; ?></td>
                                        <td><?php echo $row['usu_nombre_cmplt']; ?></td>
                                        <td>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>

        <!-- Modal agregar modificacion.-->
        <div class="modal fade" id="agregar-md" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header" id="modal-headermd">
                        <h5 class="modal-title" id="modal-titlemod">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="agregar_mod">
                        <div class="modal-body">
                            <?php

                            $consulta1 = mysqli_query($con, "SELECT ca_codigo_carpeta,ca_nombre_carpeta FROM carpetas");

                            $consulta2 = mysqli_query($con, "SELECT usu_id, usu_nombre_cmplt FROM usuarios");

                            ?>
                            <div class="form-group">
                                <label for="cm_codigo_carpeta">Código carpeta</label>
                                <select class="form-control" name="" id="cm_codigo_carpeta">
                                    <?php

                                    while ($row1 = mysqli_fetch_assoc($consulta1)) {

                                        $codigo = $row1['ca_codigo_carpeta'];
                                        $nombre = $row1['ca_nombre_carpeta'];


                                    ?>
                                        <option value="<?php echo $codigo; ?>"><?php echo $codigo . " - " . $nombre; ?></option>

                                    <?php }  ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="cm_id_usuario">Usuario: </label>
                                <select class="form-control" name="" id="cm_id_usuario">
                                    <?php

                                    while ($row2 = mysqli_fetch_assoc($consulta2)) {

                                        $codigo2 = $row2['usu_id'];
                                        $nombre2 = $row2['usu_nombre_cmplt'];


                                    ?>
                                        <option value="<?php echo $codigo2; ?>"><?php echo $codigo2 . " - " . $nombre2; ?></option>

                                    <?php }  ?>
                                </select>
                                <small id="" class="form-text text-muted">Este corresponde a la persona que realizó la modificación.</small>
                            </div>
                            <div class="form-group">
                                <label for="cm_folios_agregados">Folios agregados: </label>
                                <input type="number" class="form-control" name="" id="cm_folios_agregados" aria-describedby="helpId" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="cm_fecha">Fecha modificación: </label>
                                <input type="date" id="cm_fecha" name="" class="custom-select custom-select-lg mb-3">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit" id="btnMd">Agregar modificación</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal editar modificación-->
        <div class="modal fade" id="Modaledit-md" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header" id="Modal-headerMd">
                        <h5 class="modal-title" id="modal-titleMd"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="formEditMd">
                        <div class="modal-body">
                            <?php

                            $consula = mysqli_query($con, "SELECT ca_codigo_carpeta FROM carpetas");

                            $consulta2 = mysqli_query($con, "SELECT usu_id, usu_nombre_cmplt FROM usuarios");


                            ?>
                            <div class="form-group">
                                <input type="hidden" name="" id="ID" class="form-control" placeholder="" aria-describedby="helpId">
                            </div>
                            <div class="form-group">
                                <label for="ca_codigo_carpeta">Carpeta: </label>
                                <select id="ca_codigo_carpetaEditMd" class="custom-select custom-select-lg mb-3" name="">
                                    <?php
                                    while ($option = mysqli_fetch_assoc($consula)) {
                                    ?>
                                        <option value="<?php echo $option['ca_codigo_carpeta']; ?>"><?php echo $option['ca_codigo_carpeta']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="usu_nombre_cmplt">Usuario: </label>
                                <select id="usu_idEditMd" class="custom-select custom-select-lg mb-3" name="usu_id">
                                    <?php
                                    while ($option2 = mysqli_fetch_assoc($consulta2)) {
                                    ?>

                                        <option value="<?php echo $option2['usu_id']; ?>"><?php echo $option2['usu_nombre_cmplt'] . " - ". $option2['usu_id']; ?></option>

                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="fecha">Fecha modificación: </label>
                                <input type="date" id="fechaEditMd" name="" class="custom-select custom-select-lg mb-3">
                            </div>
                            <div class="form-group">
                                <button type="submit" name="" id="btnenviarmd" class="btn btn-primary" btn-lg btn-block"></button>

                            </div>


                        </div>
                    </form>

                </div>
            </div>
        </div>






    </div>
    <?php include("templates/footer_admin.php"); ?>


<?php } ?>