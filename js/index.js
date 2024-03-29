$("#form_admin").submit(function (e) {
  e.preventDefault();

  var id_admin = $.trim($("#id_admin").val());
  var admin_password = $.trim($("#admin_password").val());

  console.log(id_admin.length);

  if (id_admin.length == "" || admin_password.length == "") {
    Swal.fire({
      type: "error",
      title: "Ingresa usuario o contraseña",
    });

    return false;
  } else {
    $.ajax({
      url: "app/Admin/validar_usuario.php",
      type: "POST",
      datatype: "json",
      data: {
        id_admin: id_admin,
        admin_password: admin_password,
      },
      success: function (data) {
        var data = JSON.parse(data);
        // ¿Que pasaría si en la consulta no existe los datos?
        // Si no hay nada, a "data" le asignamos null.
        if (data == null) {
          console.log(data);
          Swal.fire({
            type: "warning",
            title: "No existe el usuario...",
          });
        } else {
          console.log(data);
          Swal.fire({
            type: "success",
            title: "¡Conexión exitosa!",
            showConfirmButton: false, //Oculto el boton de OK
            timer: 1500,
            //Seteo un tiempo en pantalla antes de cerrar el alert
          }).then(function () {
            window.location.href = "app/Admin/index.php";
            //Redirecciono al Index
          });
        }
      },
    });
  }
});

