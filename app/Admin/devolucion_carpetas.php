<?php

session_start();
include("../../global/conexion.php");

$ID_Ad =  $_SESSION["ID_Ad"];
if (empty($_SESSION["ID_Ad"])) {
    echo "<script> alert('No es posible acceder a esta página');
 	window.location.href='../../index.php';</script>";
} else { ?>

    <?php include("../../templates/header_admin.php"); ?>


    <div class="jumbotron text-center">
        <div class="card">
            <div class="card card-body">
                <div class="tableresponsive">
                    <table class="table table-dark">
                        <thead>
                            <tr>
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

                            $sql = mysqli_query($con, "SELECT usu.usu_id, usu.usu_nombre_cmplt, dc.`dc_codigo_carpeta`, ca.`ca_nombre_carpeta` ,ca.`ca_tipo_carpeta`, dc.`dc_fecha_devolucion` FROM usuarios usu INNER JOIN devolucion_carpeta dc ON dc.`dc_id_usuario` = usu.`usu_id` INNER JOIN carpetas ca ON ca.`ca_codigo_carpeta` = dc.`dc_codigo_carpeta`");




                            while ($row = mysqli_fetch_assoc($sql)) {

                            ?>

                                <tr>
                                    <td><?php echo $row['usu_nombre_cmplt']; ?></td>
                                    <td><?php echo $row['dc_codigo_carpeta']; ?></td>
                                    <td><?php echo $row['ca_nombre_carpeta']; ?></td>
                                    <td><?php echo $row['ca_tipo_carpeta']; ?></td>
                                    <td><?php echo $row['dc_fecha_devolucion']; ?></td>
                                    <td>
                                        <form action="autorizar_devolucion.php" method="post">
                                            
                                            <input type="hidden" name="usu_id" value="<?php echo $row['usu_id']; ?>">

                                            <input type="hidden" name="dc_codigo_carpeta" value="<?php echo $row['dc_codigo_carpeta']; ?>">

                                            <button class="btn btn-success" type="submit" name="btn-aceptar">Aceptar </button>
                                            <br>


                                        </form>
                                    </td>
                                    <td>
                                        <form action="rechazar_devolucion.php" method="post">

                                            <input type="hidden" name="usu_id" value="<?php echo $row['usu_id']; ?>">

                                            <input type="hidden" name="dc_codigo_carpeta" value="<?php echo $row['dc_codigo_carpeta']; ?>">

                                            <button class="btn btn-danger" type="submit" name="btn-rechazar">Rechazar </button>
                                        </form>
                                    </td>

                                </tr>
                        </tbody>
                    <?php } ?>
                    </table>

                </div>
            </div>
        </div>
    </div>

<?php } ?>