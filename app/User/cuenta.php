<?php

session_start();
include('../../global/conexion.php');
$user_id = $_SESSION["id"];

if (empty($_SESSION["id"])) {


    echo "<script> alert('No es posible acceder a esta página');
 		window.location.href='../index.php';</script>";
} else {
?>


    <?php


    include("../../templates/header.php");

    ?>



    <!-- Motor de busqueda  -->
    <?php

    //var_dump($user_id);

    //print_r($user_id);


    $query = mysqli_query($con, "SELECT * FROM usuarios WHERE usu_id = '$user_id'");

    while ($datos = mysqli_fetch_assoc($query)) { ?>

        <div class="container">
            <div class="jumbotron text-center">
                <h1 class="display-8">Datos.</h1>
                <div class="card">
                    <div class="card-body">
                        <table class="table table-dark">
                            <thead>
                                <tr>
                                    <th scope="col">usuario</th>
                                    <th scope="col">nombre completo</th>
                                    <th scope="col">email</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>

                                    <td scope="row"><?php echo $datos['usu_id']; ?></td>
                                    <td><?php echo $datos['usu_nombre_cmplt']; ?></td>
                                    <td><?php echo $datos['usu_email']; ?></td>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        <?php } ?>

        <br>
        <br>
        <br>


        <div class="container">
            <div class="jumbotron text-center">
                <h1 class="display-8">Carpetas Modificadas</h1>
                <div class="card">
                    <div class="card card-body">
                        <table class="table table-dark">
                            <thead>
                                <tr>
                                    <th scope="col">Codigo carpeta</th>
                                    <th scope="col">Folios agregados</th>
                                    <th scope="col">Fecha de solicitud</th>


                                </tr>
                            </thead>
                            <tbody>

                                <?php

                                $query_ps_carpt = mysqli_query($con, "SELECT * FROM carpetas_modificadas WHERE cm_id_usuario = '$user_id'");

                                while ($prestamo = mysqli_fetch_assoc($query_ps_carpt)) {  ?>
                                    <tr>
                                        <td><?php echo $prestamo['cm_codigo_carpeta']; ?></td>
                                        <td><?php echo $prestamo['cm_folios_agregados']; ?></td>
                                        <td><?php echo $prestamo['cm_fecha']; ?></td>

                                        <td></td>
                                    </tr>

                                <?php  } ?>

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>


        <!-- Vista de carpetas en pocesión.  -->

        <div class="container">
            <div class="jumbotron text-center">
                <h1 class="display-8">Carpetas en pocesión.</h1>
                <div class="card">
                    <div class="card card-body">
                        <table class="table table-dark">
                            <thead>
                                <tr>
                                    <th scope="col">Codigo carpeta</th>
                                    <th scope="col">Nombre carpeta</th>
                                    <th scope="col">Tipo carpeta</th>
                                    <th scope="col">Fecha final prestamo</th>
                                </tr>
                            </thead>

                            <tbody>

                                <?php

                                $crpt_pcs = mysqli_query($con, "SELECT ca.ca_codigo_carpeta, ca.ca_nombre_carpeta, ca.ca_tipo_carpeta, cp.fecha_final FROM carpetas ca INNER JOIN carpetas_prestadas cp ON ca.`ca_codigo_carpeta` = cp.`codigo_carpeta` INNER JOIN usuarios us ON cp.`id_usuario` = '$user_id'");

                                while ($query_cp = mysqli_fetch_assoc($crpt_pcs)) {



                                ?>
                                    <tr>
                                        <td><?php echo $query_cp['ca_codigo_carpeta']; ?></td>
                                        <td><?php echo $query_cp['ca_nombre_carpeta']; ?></td>
                                        <td><?php echo $query_cp['ca_tipo_carpeta']; ?></td>
                                        <td><?php echo $query_cp['fecha_final']; ?></td>
                                    </tr>


                                <?php } ?>

                            </tbody>
                        </table>

                    </div>
                </div>

            </div>
        </div>

        </body>

        </html>

    <?php } ?>