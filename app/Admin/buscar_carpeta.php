<?php

session_start();

include("../../global/conexion.php");

$IDAd = $_SESSION['ID_Ad'];

if (empty($_SESSION['ID_Ad'])) {

    echo "<script> alert('No es posible acceder a esta página');
 	window.location.href='../../index.php';</script>";
} else {

?>


    <?php include("../../templates/header_admin.php"); ?>


    <div class="container">
        <div class="card">
            <div class="card card-body">
                <div class="table-responsive">
                    <table class="table table-striped">

                        <thead>
                            <tr>
                                <th scope="col">Codigo carpeta</th>
                                <th scope="col">Nombre carpeta</th>
                                <th scope="col">Cantidad de folios</th>
                                <th scope="col">Estado carpeta</th>
                                <th scope="col">Tipo carpeta</th>
                            </tr>

                        </thead>

                        <tbody>

                            <?php

                            $query = mysqli_query($con, "SELECT * FROM carpetas ");

                            while ($row = mysqli_fetch_assoc($query)) {  ?>

                                <tr>
                                    <th scope="col"><?php echo $row['ca_codigo_carpeta']; ?></th>
                                    <td><?php echo $row['ca_codigo_carpeta']; ?></td>                                   
                                    <td><?php echo $row['ca_numero_folios']; ?></td>
                                    <td><?php echo $row['ca_estado_carpeta']; ?></td>
                                    <td><?php echo $row['ca_tipo_carpeta']; ?></td>
                                </tr>
                        </tbody>

                    <?php } ?>

                    </table>

                </div>

            </div>

        </div>
    </div>




<?php } ?>