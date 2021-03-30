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

    <meta name="viewport" content="width=device-width, initial-scale=1.0">



</head>

<body>

    <div class="" id="login">
        <h3 class="text-center display-4">Gestor biblioteca</h3>
        <div class="container">
            <div class="row justify-content-center align-items-center" id="login-row">
                <div class="col-md-6" id="login-column">
                    <div class="col-md-12 bg-light text-dark" id="login-box">
                        <form id="form_admin" class="form" action="#" method="POST">
                            <div class="row">
                                <div class="form-group col">
                                    <label for="id_admin">Documento identidad</label>
                                    <input class="form-control" type="text" name="id_admin" id="id_admin">
                                </div>
                                <div class="form-group col">
                                    <label for="admin_password">Contraseña</label>
                                    <input class="form-control" type="password" name="admin_password" id="admin_password">
                                </div>
                            </div>

                            <button class="form-group text-center btn btn-success" type="submit" name="btn-login">Ingresar</button>

                        </form>
                    </div>
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