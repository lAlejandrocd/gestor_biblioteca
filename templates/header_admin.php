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
 
    <nav class="navbar navbar-expand-md navbar-dark bg-dark justify-content-between">

        <!-- <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Cuenta
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Datos e historial</a>
                        <a class="dropdown-item" href="#">Solicitar carpeta</a>

                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Modificar carpeta</a>
                    </div>
                </li>
            </ul>
        </div>  -->

        <!-- <a class="navbar-brand" href="cuenta.php">Mi Cuenta</a> -->
        <a class="navbar-brand" href="gestor.php">Gestor de busqueda.</a>

        <a class="navbar-brand" href="../../global/cerrar_sesion.php">Cerrar sesión.</a>

        <form class="form-inline" method="POST" action="gestor.php">
            <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search" name="buscar">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="btn-success">Buscar</button>
        </form>
    </nav> 

    <br>

    


</body>

</html>