<!DOCTYPE html>
<html lang="en">

<head>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    <!-- <script type="text/javascript" src="js/show_table.js"></script> -->

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
</head>

<body>

    <br>
    <br>
    <br>

    <div class="container">
        <h1>Inicio de sesión</h1>
        <form method="post" action="app/Admin/validar_usuario.php">
            <div class="row">
                <div class="form-group col">
                    <label for="my-input">Documento identidad</label>
                    <input class="form-control" type="text" name="id_admin" REQUIRED>
                </div>
                <div class="form-group col">
                    <label for="my-input">Contraseña</label>
                    <input class="form-control" type="password" name="admin_password" REQUIRED>
                </div>
            </div>
            <div class="form-group col">
                <center>
                    <button class="btn btn-success" type="submit" name="btn-login">Ingresar</button>
                </center>
            </div>
        </form>
    </div>

    <br><br>

    <br>
    <br>



</body>

</html>