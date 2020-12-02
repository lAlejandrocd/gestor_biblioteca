<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestor de biblioteca.</title>

    <link rel="stylesheet" href="style/style_index.css">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="plugins/Bootstrap/css/bootstrap.min.css">

    <!-- Llamamos a sweetalert2 mimificado -->
    <link rel="stylesheet" href="plugins/Sweetalert2/sweetalert2.min.css">

    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script> -->

    <!-- <script type="text/javascript" src="js/show_table.js"></script> -->

    <meta name="viewport" content="width=device-width, initial-scale=1.0">



</head>

<body>

    <br>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <table class="table table-light">
                    <tbody>
                        <tr>

                            <td>

                                <h5 class="card-title">Usuario</h5>

                                <a href="login_user.php"><img class="img-fluid" src="img/Admin.png" alt="" width="350" height="100"></a>

                            </td>

                            <td>

                                <h5 class="card-title">Administrador</h5>

                                <a href="login_admin.php"><img class="img-fluid" src="img/User.png" alt="" width="350" height="100"></a>

                            </td>


                        </tr>
                        <tr>
                        </tr>
                    </tbody>
                </table>


            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <a href="#" id="Admin"> <img src="img/Admin.png" alt="" width="30%" height="60%">
            </a>
            <a href="" id="User"><img src="img/User.png" alt="" width="30%" height="60%"></a>
        </div>
    </div>

    <!-- MODAL USUARIO ADMINISTRADOR -->
    <div id="modal_admin" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <p>Usuario Administrador</p>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL USUARIO ESTANDAR -->
    <div id="modal_user" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <p>Estandar</p>
                    <form action="" method="post">

                        <div class="form-group">
                            <button class="btn btn-success" type="button">Text</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="plugins/Sweetalert2/sweetalert2.all.min.js"></script>

    <script src="plugins/JQuery/jquery-3.5.1.min.js"></script>

    <script src="plugins/Bootstrap/js/bootstrap.min.js"></script>

    <script src="plugins/Popper/popper.min.js"></script>

    <script src="js/index.js"></script>
</body>

</html>