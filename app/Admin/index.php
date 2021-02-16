<?php

session_start();
include('../../global/conexion.php');

$ID_Ad = $_SESSION["ID_Ad"];

if (empty($_SESSION["ID_Ad"])) {

    echo "<script> alert('No es posible acceder a esta página');
 	window.location.href='../../index.php';</script>";
} else {
?>


    <?php include("templates/header_admin.php"); ?>

    <div class="" id="content">

        <section class="py-3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <h1 class="font-weight-bold mb-0">Gestor de carpetas.</h1>
                    </div>
                    <div class="col-lg-3 d-flex">
                        <button class="btn btn-primary  align-self-center" type="button" name="agregar" id="agregar"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="16" fill="currentColor" class="bi bi-folder-plus" viewBox="0 0 16 16">
                                <path d="M.5 3l.04.87a1.99 1.99 0 0 0-.342 1.311l.637 7A2 2 0 0 0 2.826 14H9v-1H2.826a1 1 0 0 1-.995-.91l-.637-7A1 1 0 0 1 2.19 4h11.62a1 1 0 0 1 .996 1.09L14.54 8h1.005l.256-2.819A2 2 0 0 0 13.81 3H9.828a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 6.172 1H2.5a2 2 0 0 0-2 2zm5.672-1a1 1 0 0 1 .707.293L7.586 3H2.19c-.24 0-.47.042-.684.12L1.5 2.98a1 1 0 0 1 1-.98h3.672z" />
                                <path d="M13.5 10a.5.5 0 0 1 .5.5V12h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V13h-1.5a.5.5 0 0 1 0-1H13v-1.5a.5.5 0 0 1 .5-.5z" />
                            </svg>Agregar carpeta</button>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <table class="display" id="carpetas" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>Código carpeta</th>
                                    <th>Nombre de carpeta</th>
                                    <th>Número de folios </th>
                                    <th>Estado carpeta</th>
                                    <th>Tipo de carpeta</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php

                                $sql = mysqli_query($con, "SELECT * FROM carpetas");

                                while ($row = mysqli_fetch_assoc($sql)) { ?>

                                    <tr>
                                        <td><?php echo $row['ca_codigo_carpeta']; ?></td>
                                        <td><?php echo $row['ca_nombre_carpeta']; ?></td>
                                        <td><?php echo $row['ca_numero_folios']; ?></td>
                                        <td><?php echo $row['ca_estado_carpeta']; ?></td>
                                        <td><?php echo $row['ca_tipo_carpeta']; ?></td>
                                        <td></td>
                                    </tr>

                                <?php } ?>


                            </tbody>

                        </table>
                    </div>
                </div>
            </div>


    </div>

    <!-- Modal editar carpeta -->
    <div id="ModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="Modaltitle"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                </div>
                <form id="FormCarpetaEdit">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="edit_ca_codigo_carpeta">Código de carpeta :</label>
                            <input class="form-control" type="number" name="edit_ca_codigo_carpeta" id="edit_ca_codigo_carpeta">
                        </div>
                        <div class="form-group">
                            <label for="edit_ca_nombre_carpeta">Nombre de carpeta</label>
                            <input class="form-control" type="text" name="edit_ca_nombre_carpeta" id="edit_ca_nombre_carpeta" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_ca_numero_folios">Número de folios</label>
                            <input class="form-control" type="number" name="edit_ca_numero_folios" id="edit_ca_numero_folios" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_ca_estado_carpeta">Estado de carpeta</label>
                            <input class="form-control" type="text" name="edit_ca_estado_carpeta" id="edit_ca_estado_carpeta" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_ca_tipo_carpeta">Tipo de carpeta</label>
                            <input class="form-control" type="text" name="edit_ca_tipo_carpeta" id="edit_ca_tipo_carpeta" required>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit" name="btnEditar">Editar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </section>



    <!-- Modal agregar carpeta -->
    <div id="agregar_carpeta" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="Modaltitle"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                </div>
                <form id="Form_carpeta">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="ca_codigo_carpeta">Código carpeta</label>
                            <input class="form-control" type="number" name="ca_codigo_carpeta" id="ca_codigo_carpeta" required>
                        </div>
                        <div class="form-group">
                            <label for="ca_nombre_carpeta">Nombre carpeta</label>
                            <input class="form-control" type="text" name="ca_nombre_carpeta" id="ca_nombre_carpeta" required>
                        </div>
                        <div class="form-group">
                            <label for="ca_numero_folios">Número folios</label>
                            <input class="form-control" type="number" name="ca_numero_folios" id="ca_numero_folios" required>
                        </div>
                        <div class="form-group">
                            <label for="ca_estado_carpeta">Estado carpeta</label>
                            <input class="form-control" type="text" name="ca_estado_carpeta" id="ca_estado_carpeta" required>
                        </div>
                        <div class="form-group">
                            <label for="ca_tipo_carpeta">Tipo carpeta</label>
                            <input class="form-control" type="text" name="ca_tipo_carpeta" id="ca_tipo_carpeta" required>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit" name="" id=""><svg xmlns="http://www.w3.org/2000/svg" width="20" height="16" fill="currentColor" class="bi bi-folder-symlink" viewBox="0 0 16 16">
                                    <path d="M11.798 8.271l-3.182 1.97c-.27.166-.616-.036-.616-.372V9.1s-2.571-.3-4 2.4c.571-4.8 3.143-4.8 4-4.8v-.769c0-.336.346-.538.616-.371l3.182 1.969c.27.166.27.576 0 .742z" />
                                    <path d="M.5 3l.04.87a1.99 1.99 0 0 0-.342 1.311l.637 7A2 2 0 0 0 2.826 14h10.348a2 2 0 0 0 1.991-1.819l.637-7A2 2 0 0 0 13.81 3H9.828a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 6.172 1H2.5a2 2 0 0 0-2 2zm.694 2.09A1 1 0 0 1 2.19 4h11.62a1 1 0 0 1 .996 1.09l-.636 7a1 1 0 0 1-.996.91H2.826a1 1 0 0 1-.995-.91l-.637-7zM6.172 2a1 1 0 0 1 .707.293L7.586 3H2.19c-.24 0-.47.042-.684.12L1.5 2.98a1 1 0 0 1 1-.98h3.672z" />
                                </svg>Guardar carpeta</button>
                        </div>
                </form>
            </div>
        </div>
    </div>







    </div>

    <?php include("templates/footer_admin.php"); ?>

<?php } ?>