
<?php




$con = mysqli_connect(
			'localhost', //** donde esta la base de datos */
			'root', //** El usuario */
			'', //** la contraseña */
			'gestor_biblioteca'//** a que base de datos quiero ingresar. */

		);

		//Definimos acotejamiento a la base de datos y la página web.
		mysqli_set_charset($con,"utf8");

?>