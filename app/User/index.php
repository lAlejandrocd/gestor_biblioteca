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
    <section class="">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <div class="row">

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">codigo carpeta</th>
                                    <th scope="col">nombre</th>
                                    <th scope="col">cantidad folios</th>
                                    <th scope="col">estado</th>
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
                                        <td><?php echo $show_info['ca_tipo_carpeta']; ?></td>
                                    </tr>

                                <?php } ?>



                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    
    <?php include("templates/footer_user.php") ?>

<?php } ?>