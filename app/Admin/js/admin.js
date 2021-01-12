$(document).ready(function (){
  carpetas = $("#carpetas").DataTable({
    columnDefs: [
      {
        targets: -1,
        data: null,
        //COntenido del botón
        defaultContent:
          "<div class='text-center'><div class='btn-group' role='group' aria-label='Button group'><button id='btnEditar' class='btn btn-primary btnEditar' type='button' ><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'><path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/><path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/></svg>Editar</button><button id='btnEliminar' class='btn btn-info btnEliminar ' type='button' ><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'><path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/></svg>Eliminar</button></div></div>",
      },
    ],
  });

  // Botón desplegar modal
  $("#agregar").click(function () {
    $(".modal-header").css("background-color", "orange");

    $("#Form_carpeta").trigger("reset");

    $(".modal-title").text("Agregar carpeta");

    $("#agregar_carpeta").modal("show");
  });

  // Agregar dato
  $("#Form_carpeta").submit(function (e) {
    e.preventDefault();

    ca_codigo_carpeta = $.trim($("#ca_codigo_carpeta").val());
    ca_nombre_carpeta = $.trim($("#ca_nombre_carpeta").val());
    ca_numero_folios = $.trim($("#ca_numero_folios").val());
    ca_estado_carpeta = $.trim($("#ca_estado_carpeta").val());
    ca_tipo_carpeta = $.trim($("#ca_tipo_carpeta").val());

    $.ajax({
      url: "backend/agregar_carpeta.php",
      type: "POST",
      datatype: "json",
      data: {
        ca_codigo_carpeta: ca_codigo_carpeta,
        ca_nombre_carpeta: ca_nombre_carpeta,
        ca_numero_folios: ca_numero_folios,
        ca_estado_carpeta: ca_estado_carpeta,
        ca_tipo_carpeta: ca_tipo_carpeta,
      },
      success: function (data) {
        carpetas.row
          .add([
            ca_codigo_carpeta,
            ca_nombre_carpeta,
            ca_numero_folios,
            ca_estado_carpeta,
            ca_tipo_carpeta,
          ])
          .draw();

        console.log(data);
      },
    });

    $("#agregar_carpeta").modal("hide");
  });

  var fila;

  // Editar
  $(document).on("click", ".btnEditar", function () {
    $(".modal-title").text("Editar carpeta");
    $(".modal-header").css("background-color", "orange");
    $("#ModalEdit").modal("show");
    
    fila = $(this).closest("tr");

    edit_ca_codigo_carpeta = parseInt(fila.find("td:eq(0)").text());
    edit_ca_nombre_carpeta = fila.find("td:eq(1)").text();
    edit_ca_numero_folios = parseInt(fila.find("td:eq(02)").text());
    edit_ca_estado_carpeta = fila.find("td:eq(3)").text();
    edit_ca_tipo_carpeta = fila.find("td:eq(4)").text();

    $("#edit_ca_codigo_carpeta").val(edit_ca_codigo_carpeta);
    $("#edit_ca_nombre_carpeta").val(edit_ca_nombre_carpeta);
    $("#edit_ca_numero_folios").val(edit_ca_numero_folios);
    $("#edit_ca_estado_carpeta").val(edit_ca_estado_carpeta);
    $("#edit_ca_tipo_carpeta").val(edit_ca_tipo_carpeta);

  });

  // Editar carpeta
  $("#FormCarpetaEdit").submit(function (f){

    f.preventDefault();
    edit_ca_codigo_carpeta = $.trim($("#edit_ca_codigo_carpeta").val());
    edit_ca_nombre_carpeta = $.trim($("#edit_ca_nombre_carpeta").val());
    edit_ca_numero_folios = $.trim($("#edit_ca_numero_folios").val());
    edit_ca_estado_carpeta = $.trim($("#edit_ca_estado_carpeta").val());
    edit_ca_tipo_carpeta = $.trim($("#edit_ca_tipo_carpeta").val());
     
    $.ajax({
      url: "backend/actualizar_carpeta.php",
      type: "POST",
      datatype: "json",
      data: {
        edit_ca_codigo_carpeta: edit_ca_codigo_carpeta,
        edit_ca_nombre_carpeta: edit_ca_nombre_carpeta,
        edit_ca_numero_folios: edit_ca_numero_folios,
        edit_ca_estado_carpeta: edit_ca_estado_carpeta,
        edit_ca_tipo_carpeta: edit_ca_tipo_carpeta,
      },
      success : function (data){

        carpetas
          .row(fila)
          .data([
            edit_ca_codigo_carpeta,
            edit_ca_nombre_carpeta,
            edit_ca_numero_folios,
            edit_ca_estado_carpeta,
            edit_ca_tipo_carpeta,
          ]);

          console.log(edit_ca_codigo_carpeta + edit_ca_nombre_carpeta + edit_ca_numero_folios + edit_ca_estado_carpeta + edit_ca_tipo_carpeta);
        


      }
    });

    $("#ModalEdit").modal("hide");


  });

  // Borrar carpeta
  $(document).on("click", ".btnEliminar", function (){

    fila = $(this);
    ca_codigo_carpeta = parseInt($(this).closest("tr").find("td:eq(0)").text());

    var respuesta = confirm("¿Estas seguro de borrar esta carpeta? " + ca_codigo_carpeta);

    if (respuesta) {
      $.ajax({

        url: "backend/eliminar_carpeta.php",
        type: "POST",
        datatype : "json",
        data: { ca_codigo_carpeta: ca_codigo_carpeta},
        success : function (data) {

          carpetas.row(fila.parents("tr")).remove().draw();

        }

      });
      
    }


  });

});