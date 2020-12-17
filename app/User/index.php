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
                    <button class="btn btn-primary align-self-center" type="button"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmark-plus-fill" viewBox="0 0 16 16">
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

        <?php include("templates/footer_user.php") ?>

    <?php } ?>