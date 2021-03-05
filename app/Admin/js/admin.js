// DataTables Index.php
$(document).ready(function () {
  carpetas = $("#carpetas").DataTable({
    processing: true,
    serverSide: true,
    ajax: {
      url: "backend/serverside_vista_carpeta.php",
      type: "post",
    },

    columnDefs: [
      {
        targets: -1,
        data: null,
        // contenido del botón
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
    ca_fecha_inicial = $.trim($("#ca_fecha_inicial").val());
    ca_fecha_final = $.trim($("#ca_fecha_final").val());
    ca_caja = $.trim($("#ca_caja").val());
    ca_carpeta = $.trim($("#ca_carpeta").val());
    ca_tomo = $.trim($("#ca_tomo").val());
    ca_otro = $.trim($("#ca_otro").val());
    ca_numero_folios = $.trim($("#ca_numero_folios").val());
    ca_soporte = $.trim($("#ca_soporte").val());
    ca_frecuencia_consulta = $.trim($("#ca_frecuencia_consulta").val());
    ca_notas = $.trim($("#ca_notas").val());

    $.ajax({
      url: "backend/agregar_carpeta.php",
      type: "POST",
      datatype: "json",
      data: {
        ca_codigo_carpeta: ca_codigo_carpeta,
        ca_nombre_carpeta: ca_nombre_carpeta,
        ca_fecha_inicial: ca_fecha_inicial,
        ca_fecha_final: ca_fecha_final,
        ca_caja: ca_caja,
        ca_carpeta: ca_carpeta,
        ca_tomo: ca_tomo,
        ca_otro: ca_otro,
        ca_numero_folios: ca_numero_folios,
        ca_soporte: ca_soporte,
        ca_frecuencia_consulta: ca_frecuencia_consulta,
        ca_notas: ca_notas,
      },
      success: function (data) {
          carpetas.row
            .add([
              "",
              ca_nombre_carpeta,
              ca_fecha_final,
              ca_numero_folios,
            ])
            .draw();        
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

    $("#ModalEdit").trigger("reset");

    fila = $(this).closest("tr");

    edit_ca_numero_item = parseInt(fila.find("td:eq(0)").text());
    edit_ca_nombre_carpeta = fila.find("td:eq(1)").text();
    edit_ca_fecha_final = fila.find("td:eq(2)").text();
    edit_ca_numero_folios = fila.find("td:eq(3)").text();

    $("#edit_ca_numero_item").val(edit_ca_numero_item);
    $("#edit_ca_nombre_carpeta").val(edit_ca_nombre_carpeta);
    $("#edit_ca_fecha_final").val(edit_ca_fecha_final);
    $("#edit_ca_numero_folios").val(edit_ca_numero_folios);
  });

  // Editar carpeta
  $("#FormCarpetaEdit").submit(function (f) {
    f.preventDefault();
    edit_ca_numero_item = $.trim($("#edit_ca_numero_item").val());
    edit_ca_nombre_carpeta = $.trim($("#edit_ca_nombre_carpeta").val());
    edit_ca_fecha_final = $.trim($("#edit_ca_fecha_final").val());
    edit_ca_numero_folios = $.trim($("#edit_ca_numero_folios").val());

    $.ajax({
      url: "backend/actualizar_carpeta.php",
      type: "POST",
      datatype: "json",
      data: {
        edit_ca_numero_item: edit_ca_numero_item,
        edit_ca_nombre_carpeta: edit_ca_nombre_carpeta,
        edit_ca_fecha_final: edit_ca_fecha_final,
        edit_ca_numero_folios: edit_ca_numero_folios,
      },
      success: function (data) {
        console.log(data);
          carpetas
            .row(fila)
            .data([
              edit_ca_numero_item,
              edit_ca_nombre_carpeta,
              edit_ca_fecha_final,
              edit_ca_numero_folios,
            ]);
        
      },
    });

    $("#ModalEdit").modal("hide");
  });

  // Borrar carpeta
  $(document).on("click", ".btnEliminar", function () {
    fila = $(this);
    ca_numero_item = parseInt($(this).closest("tr").find("td:eq(0)").text());

    var respuesta = confirm(
      "¿Estas seguro de borrar esta carpeta? " + ca_numero_item
    );

    if (respuesta) {
      $.ajax({
        url: "backend/eliminar_carpeta.php",
        type: "POST",
        datatype: "json",
        data: { ca_numero_item: ca_numero_item },
        success: function (data) {
          carpetas.row(fila.parents("tr")).remove().draw();
        },
      });
    }
  });
});

//DataTables vista_ usuarios.php
$(document).ready(function () {
  usuarios = $("#users").DataTable({
    columnDefs: [
      {
        targets: -1,
        data: null,
        defaultContent:
          "<div class='text-center'><div class='btn-group' role='group' aria-label='Button group'><button id='btnEditarUsu' class='btn btn-primary btnEditarUsu' type='button'>Editar usuario</button><button id='btnEliminarUsu' class='btn btn-info btnEliminarUsu' type='button'>Eliminar Usuario</button></div></div>",
      },
    ],
  });

  // Modal agregar usuario, archivo vista_usuarios.php
  $(document).on("click", "#UsuAgregar", function () {
    $("#Modaltitle_E").text("Agregar usuario");
    $(".modal-header").css("background-color", "orange");
    $("#agregar_usuario").modal("show");

    $("#FormUsuarios").trigger("reset");
  });

  //Formulario agregar  usuario, archivo vista_usuarios.php
  $("#FormUsuarios").submit(function (d) {
    d.preventDefault();

    usu_id = $.trim($("#usu_id").val());
    usu_nombre_cmplt = $.trim($("#usu_nombre_cmplt").val());
    usu_email = $.trim($("#usu_email").val());
    usu_clave = $.trim($("#usu_clave").val());

    $.ajax({
      url: "backend/agregar_usuario.php",
      method: "POST",
      datatype: "json",
      data: {
        usu_id: usu_id,
        usu_nombre_cmplt: usu_nombre_cmplt,
        usu_email: usu_email,
        usu_clave: usu_clave,
      },
      success: function (data) {
        console.log(data);
        if (data == 1) {
          alert("Ya hay un usuario registrado.");
        } else {
          Swal.fire({
            type: "info",
            title: "Registro Exitoso.",
          });

          usuarios.row
            .add([usu_id, usu_nombre_cmplt, usu_email, usu_clave])
            .draw();
        }
      },
    });

    $("#agregar_usuario").modal("hide");
  });

  var fila2;

  // Editar usuario archivo vista_usuarios.php
  $(document).on("click", ".btnEditarUsu", function () {
    $(".modal-title").text("Editar datos de usuario");
    $(".modal-header").css("background-color", "orange");
    $("#editar_usuario").modal("show");

    $("#editar_usuario").trigger("reset");

    fila2 = $(this).closest("tr");

    edusu_id = parseInt(fila2.find("td:eq(0)").text());
    edusu_nombre_cmplt = fila2.find("td:eq(1)").text();
    edusu_email = fila2.find("td:eq(2)").text();
    edusu_clave = parseInt(fila2.find("td:eq(3)").text());

    $("#edusu_id").val(edusu_id);
    $("#edusu_nombre_cmplt").val(edusu_nombre_cmplt);
    $("#edusu_email").val(edusu_email);
    $("#edusu_clave").val(edusu_clave);
  });

  // Editar usuarios archivo vista_usuarios.php
  $("#FormEditUsuarios").submit(function (f) {
    f.preventDefault();
    edusu_id = $.trim($("#edusu_id").val());
    edusu_nombre_cmplt = $.trim($("#edusu_nombre_cmplt").val());
    edusu_email = $.trim($("#edusu_email").val());
    edusu_clave = $.trim($("#edusu_clave").val());

    $.ajax({
      url: "backend/actualizar_usuarios.php",
      type: "POST",
      datatype: "json",
      data: {
        edusu_id: edusu_id,
        edusu_nombre_cmplt: edusu_nombre_cmplt,
        edusu_email: edusu_email,
        edusu_clave: edusu_clave,
      },
      success: function (data) {
        if (data == 1) {
          Swal.fire({
            type: "info",
            title: "Registro actualizado",
          });

          usuarios
            .row(fila2)
            .data([edusu_id, edusu_nombre_cmplt, edusu_email, edusu_clave]);
        } else {
          alert("error");
        }
      },
    });

    $("#editar_usuario").modal("hide");
  });

  // Botón eliminar datos archivo vista_usuarios.php
  $(document).on("click", ".btnEliminarUsu", function () {
    fila2 = $(this);
    usu_id = parseInt($(this).closest("tr").find("td:eq(0)").text());

    var respuesta = confirm("¿Estas seguro de borrar esta carpeta? " + usu_id);

    if (respuesta) {
      $.ajax({
        url: "backend/eliminar_usuario.php",
        type: "POST",
        datatype: "json",
        data: { usu_id: usu_id },
        success: function (data) {
          var data = JSON.parse(data);
          if (data == true) {
            Swal.fire({
              type: "info",
              title: "Se ha borrado el registro.",
            });

            console.log(data);

            usuarios.row(fila2.parents("tr")).remove().draw();
          } else {
            alert("error");
          }
        },
      });
    }
  });
});

//DataTables devolucion_carpetas.php
$(document).ready(function (){

  devoluciones = $("#devoluciones").DataTable({
    columnDefs: [
      {
        targets: -1,
        data: null,
        defaultContent:
          "<div class='text-center'><div class='btn-group' role='group' aria-label='Button group'><button id='btnEditarDev' class='btn btn-primary btnEditarDev' type='button'>Editar</button><button id='btnEliminardev' class='btn btn-info btnEliminardev' type='button'>Eliminar</button></div></div>",
      },
    ],
  });

  // Botón agregar devolución archivo Devolucion_carpetas.php
  $("#agregar_devolucion").click(function (){

    $("#ModaltitleDev").text("Agregar devoluciones");

    $("#modalheaderDev").css("background-color", "orange");

    $("#agregar_dev").modal("show");

    $("#agregarDev").trigger("reset");

  });

  //Registrar devolución.
  $("#agregarDev").submit(function (j){

    j.preventDefault();


    var ca_codigo_carpetadev = $.trim($("#ca_codigo_carpetadev").val());
    var usu_iddev = $.trim($("#usu_iddev").val());
    var fechadev = $.trim($("#fechadev").val());

    $.ajax({
      url: "backend/agregar_devolucion.php",
      method: "POST",
      datatype: "json",
      data: {
        ca_codigo_carpetadev: ca_codigo_carpetadev,
        usu_iddev: usu_iddev,
        fechadev: fechadev,
      },
      success: function (data) {
        if (data = "") {

          Swal.fire({
            type: "info",
            title: "Error al registrar la devolución.",
          });
          
        }else{

          Swal.fire({
            type: "info",
            title: "Se ha agregado la devolución.",
          });

          devoluciones.row
            .add(["", ca_codigo_carpetadev, "", "", fechadev])
            .draw();
          
        }

        
      },
    });

    $("#agregar_dev").modal("hide");


  });

  var fila3;
  // Botón editar archivo devolucion_carpetas.php
  $(document).on("click", "#btnEditarDev", function () {

    $("#btnDevEdit").text("Guardar cambios.");
    $("#ModalTitle_DevEdit").text("Editar datos de devolución");
    $("#Modal_headerDevEdit").css("background-color", "orange");
    $("#editar_dev").modal("show");

    $("#EditarDev").trigger("reset");

    fila3 = $(this).closest("tr");

    IDEditDev = parseInt(fila3.find("td:eq(0)").text());
    usu_idEditdev = fila3.find("td:eq(1)").text();
    ca_codigo_carpetaEditdev = parseInt(fila3.find("td:eq(2)").text());
    fechaEditdev = fila3.find("td:eq(5)").text();
    
    $("#IDEditDev").val(IDEditDev);
    $("#ca_codigo_carpetaEditdev").val(ca_codigo_carpetaEditdev);
    $("#usu_idEditdev").val(usu_idEditdev);
    $("#fechaEditdev").val(fechaEditdev);

  });

  // Formulario editar devoluciones, archivo devolucion_carpetas.php
  $("#EditarDev").submit(function (k){

    k.preventDefault();

    var IDEditDev = $.trim($("#IDEditDev").val());
    var ca_codigo_carpetaEditdev = $.trim($("#ca_codigo_carpetaEditdev").val());
    var usu_idEditdev = $.trim($("#usu_idEditdev").val());
    var fechaEditdev = $.trim($("#fechaEditdev").val());

    $.ajax({
      url: "backend/actualizar_devolucion.php",
      method: "POST",
      datatype: "json",
      data: {
        IDEditDev: IDEditDev, ca_codigo_carpetaEditdev: ca_codigo_carpetaEditdev,
        usu_idEditdev: usu_idEditdev,
        fechaEditdev: fechaEditdev,
      },
      success: function (data) {
        var data = JSON.parse(data);
        console.log(data);
        if (data == 1) {
          Swal.fire({
            type: "info",
            title: "Registro actualizado",
          });

          devoluciones
            .row(fila3)
            .data([IDEditDev,"", ca_codigo_carpetadev,"", "", fechadev]);
        } else {
          alert("error");
        }
      },
    });

    $("#editar_dev").modal("hide");

  });
  
  //Botón eliminar.
  $(document).on("click", "#btnEliminardev", function (){

    fila3 = $(this);
    IDDev = parseInt($(this).closest("tr").find("td:eq(0)").text());
    console.log(IDDev);

    var respuesta = confirm("¿Estas seguro de borrar esta devolución? : " + IDDev);

    if (respuesta) {

      $.ajax({
        url: "backend/eliminar_devolucion.php",
        method: "POST",
        datatype: "json",
        data: { IDDev: IDDev },
        success: function (data) {
          devoluciones.row(fila3.parents("tr")).remove().draw();
        },
      });
      
    }


    


  });






});

//DataTables modificacion carpetas.php
$(document).ready(function (){

  modificacion = $("#modificacion").DataTable({
    columnDefs: [
      {
        targets: -1,
        data: null,
        defaultContent:
          "<div class='text-center'><div class='btn-group' role='group' aria-label='Button group'><button id='btnEditarMd' class='btn btn-primary btnEditarMd' type='button'>Editar Modificación</button><button id='btnEliminarMd' class='btn btn-info btnEliminarMd' type='button'>Eliminar Modificación</button></div></div>",
      },
    ],
  });

  // Botón desplegar modal, archivo modificacion_carpetas.php
  $(document).on("click", "#ag_modificacion", function (){

    $("#modal-titlemod").text("Agregar modificación");

    $("#modal-headermd").css("background-color", "orange");

    $("#agregar-md").modal("show");

    $("#agregar_mod").trigger("reset");

  });

  // Formulario agregar modificaciones archivo modificacion_carpetas.php
  $("#agregar_mod").submit(function (l){

    l.preventDefault();

    cm_codigo_carpeta = $.trim($("#cm_codigo_carpeta").val());
    cm_id_usuario = $.trim($("#cm_id_usuario").val());
    cm_folios_agregados = $.trim($("#cm_folios_agregados").val());
    cm_fecha = $.trim($("#cm_fecha").val());

    $.ajax({
      url: "backend/agregar_modificacion.php",
      method: "POST",
      datatype: "json",
      data: {
        cm_codigo_carpeta: cm_codigo_carpeta,
        cm_id_usuario: cm_id_usuario,
        cm_folios_agregados: cm_folios_agregados,
        cm_fecha: cm_fecha,
      },
      success: function (data) {
        console.log(data);

        if (data == "") {
          alert("error");
        }else{

          modificacion.row
            .add([
              cm_codigo_carpeta,
              cm_folios_agregados,
              cm_fecha,
              cm_id_usuario,
              "",
            ])
            .draw();
        }
      },
    });

    $("#agregar-md").modal("hide");

  
  });

  var fila4;

  // Desplegar modal editar modificaciones.
  $(document).on("click", "#btnEditarMd", function () {

    $("#btnenviarmd").text("Guardar cambios.");
    $("#modal-titleMd").text("Editar modificaciones.");
    $("#Modal-headerMd").css("background-color", "orange");
    $("#Modaledit-md").modal("show");

    $("#formEditMd").trigger("reset");

    fila4 = $(this).closest("tr");

    var ID = parseInt(fila4.find("td:eq(0)").text());
    var ca_codigo_carpetaEditMd = parseInt(fila4.find("td:eq(1)").text());
    var usu_idEditMd = fila4.find("td:eq(4)").text();
    var fechaEditMd = fila4.find("td:eq(3)").text();

    $("#ID").val(ID);
    $("#ca_codigo_carpetaEditMd").val(ca_codigo_carpetaEditMd);
    $("#usu_idEditMd").val(usu_idEditMd);
    $("#fechaEditMd").val(fechaEditMd);

  });

  $("#formEditMd").submit(function (n){
    n.preventDefault();

    var ID = $.trim($("#ID").val());
    var ca_codigo_carpetaEditMd = $.trim($("#ca_codigo_carpetaEditMd").val());
    var usu_idEditMd = $.trim($("#usu_idEditMd").val());
    var fechaEditMd = $.trim($("#fechaEditMd").val());

  
    $.ajax({
      url: "backend/actualizar_modificacion.php",
      method: "POST",
      datatype: "json",
      data: {
        ID: ID,
        ca_codigo_carpetaEditMd: ca_codigo_carpetaEditMd,
        usu_idEditMd: usu_idEditMd,
        fechaEditMd: fechaEditMd,
      },
      success: function (data) {
        var data = JSON.parse(data);
        console.log(data);
        if (data == 1) {
          Swal.fire({
            type: "info",
            title: "Registro actualizado",
          });

          modificacion
            .row(fila4)
            .data([ID, ca_codigo_carpetaEditMd, "", fechaEditMd, usu_idEditMd, ""]);
        } else {
          alert("error");
        }
      }

    });

    $("#Modaledit-md").modal("hide");

  });

  // Eliminar modificación
  $(document).on("click", "#btnEliminarMd", function () {

    fila4 = $(this);
    IDmdeliminar = parseInt($(this).closest("tr").find("td:eq(0)").text());
    codigomdeliminar = parseInt($(this).closest("tr").find("td:eq(1)").text());
    foliosmdeliminar = parseInt($(this).closest("tr").find("td:eq(2)").text());
   

    var respuesta = confirm("¿Estas seguro de borrar esta devolución? : " + IDmdeliminar);

    if (respuesta) {
      $.ajax({
        url: "backend/eliminar_modificacion.php",
        method: "POST",
        datatype: "json",
        data: {IDmdeliminar: IDmdeliminar, codigomdeliminar: codigomdeliminar, foliosmdeliminar: foliosmdeliminar},
        success: function (data) {
          console.log(data);
          modificacion.row(fila4.parents("tr")).remove().draw();
        },
      });
    }

     
        
      
    


  });





});

//DataTables Solicitud_carpetas.php
$(document).ready(function (){
  solicitudes = $("#solicitudes").DataTable({
    columnDefs: [
      {
        targets: -1,
        data: null,
        defaultContent:
          "<div class='text-center'><div class='btn-group' role='group' aria-label='Button group'><button class='btn btn-primary btn-autorizar' type='button' id='btnEditsol'>Editar</button><button class='btnRechazar btn btn-warning' type='button' id='btnElmsol'>Eliminar</button></div></div>",
      },
    ],
  });

  // Botón agregar prestamo, archivo solicitud_carpetas.php
  $("#btnaddPrestamo").on("click", function () {
    $("#modal-header_prs").css("background-color", "orange");
    $("#modal-title_prs").text("registrar prestamo");
    $("#btnPrestamo").text("Registrar prestamo");
    $("#addPrestamo").modal("show");

    $("#FormAddPrestamo").trigger("reset");
  });

  $("#FormAddPrestamo").submit(function (n) {
    n.preventDefault();

    id_usuario = $.trim($("#id_usuario").val());
    codigo_carpeta = $.trim($("#codigo_carpeta").val());
    fecha_inicio = $.trim($("#fecha_inicio").val());
    fecha_final = $.trim($("#fecha_final").val());

    $.ajax({
      url: "backend/agregar_prestamo.php",
      method: "POST",
      datatype: "json",
      data: {
        id_usuario: id_usuario,
        codigo_carpeta: codigo_carpeta,
        fecha_inicio: fecha_inicio,
        fecha_final: fecha_final,
      },
      success: function (data) {
        if (data == "") {
          alert("Error al agregar el prestamo");
        } else {
          alert(data);

          solicitudes.row
            .add([, id_usuario, codigo_carpeta, fecha_inicio, fecha_final])
            .draw();
        }
      },
    });

    $("#addPrestamo").modal("hide");
  });

  var fila5;
  // Editar prestamo.
  $(document).on("click", "#btnEditsol", function () {
    $("#modal-title_Prstm").text("Editar registros de prestamo");
    $("#modalheader-EditPrstm").css("background-color", "orange");
    $("#btnEditPrestamo").text("Actualizar registros");

    $("#EditPrestamo").modal("show");

    $("#FormEditPrestamo").trigger("reset");

    fila5 = $(this).closest("tr");

    var IDEdit = parseInt(fila5.find("td:eq(0)").text());
    var id_usuarioEdit = parseInt(fila5.find("td:eq(1)").text());
    var codigo_carpetaEdit = parseInt(fila5.find("td:eq(2)").text());
    var fecha_inicioEdit = fila5.find("td:eq(3)").text();
    var fecha_finalEdit = fila5.find("td:eq(4)").text();

    $("#IDEdit").val(IDEdit);
    $("#id_usuarioEdit").val(id_usuarioEdit);
    $("#codigo_carpetaEdit").val(codigo_carpetaEdit);
    $("#fecha_finalEdit").val(fecha_finalEdit);
    $("#fecha_inicioEdit").val(fecha_inicioEdit);
  });

  // Formulario guardar cambios, archivo solicitud_carpetas.php
  $("#FormEditPrestamo").submit(function (m){

    m.preventDefault();

    var IDEdit = $.trim($("#IDEdit").val());
    var id_usuarioEdit = $.trim($("#id_usuarioEdit").val());
    var codigo_carpetaEdit = $.trim($("#codigo_carpetaEdit").val());
    var fecha_inicioEdit = $.trim($("#fecha_inicioEdit").val());
    var fecha_finalEdit = $.trim($("#fecha_finalEdit").val());

    $.ajax({
      url: "backend/actualizar_prestamo.php",
      method: "POST",
      datatype: "json",
      data: {
        IDEdit:IDEdit,
        id_usuarioEdit: id_usuarioEdit,
        codigo_carpetaEdit: codigo_carpetaEdit,
        fecha_inicioEdit: fecha_inicioEdit,
        fecha_finalEdit: fecha_finalEdit,
      },
      success: function (data) {
        var data = JSON.parse(data);
        console.log(data);
        if (data == 1) {
          Swal.fire({
            type: "info",
            title: "Registro actualizado",
          });

          solicitudes
            .row(fila5)
            .data([
              IDEdit,
              id_usuarioEdit,
              codigo_carpetaEdit,
              fecha_inicioEdit,
              fecha_finalEdit,
            ]);
        } else {
          alert("error");
        }

      },
    });

    $("#EditPrestamo").modal("hide");

  });

  $(document).on("click", "#btnElmsol", function () {

    fila5 = $(this);
    IDeliminar = parseInt($(this).closest("tr").find("td:eq(0)").text());
    Codigoeliminar = parseInt($(this).closest("tr").find("td:eq(2)").text());
    
    console.log(IDeliminar);
    console.log(Codigoeliminar);

    var respuesta = confirm("¿Estas seguro que deseas eliminar este prestamo?. Si se elimina el prestamo, el estado de la carpeta pasa estar DISPONIBLE");

    if (respuesta) {
      
      $.ajax({
        url: "backend/eliminar_prestamo.php",
        method: "POST",
        datatype: "json",
        data: { IDeliminar: IDeliminar, Codigoeliminar: Codigoeliminar },
        success: function (data) {
           console.log(data);
           solicitudes.row(fila5.parents("tr")).remove().draw();
        },
      });

    }

  });



});



 

