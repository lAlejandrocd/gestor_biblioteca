$("#Admin").click(function (){
    
  $("#modal_admin").modal("show");

});

$("#User").click(function (){


  $("#modal_user").modal("show");
});

$("#form_admin").submit(function(e){

  e.preventDefault();

  var id_admin = $.trim($('#id_admin').val());
  var admin_password = $.trim($('#admin_password').val());

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
      success: function(data){
        if (data == "null") {
          console.log(data);
          alert("error");
        }else{
          console.log(data);
          alert("hola");
        }


      },
    });
  }
  

});