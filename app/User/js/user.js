$(document).ready(function (){

carpetas = $("#carpetas").DataTable({
  columnDefs: [
    {
      targets: -1,
      data: null,
      //COntenido del botón
      defaultContent:
        "<div class='text-center'><div class='btn-group' role='group' aria-label='Button group'><button id='btnSolicitar' class='btn btn-primary btnPrimary' type='button' ><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'><path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/><path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/></svg>Solicitar folder</button></div></div>",
    },
  ],
});

// var fila;

// $(document).on("click", "#btnSolicitar", function () {

//   $("#form_solicitar").trigger("reset");

//   $("#addFolder").modal("show");

//   fila = $(this).closest("tr");

//   pc_codigo_carpt = parseInt(fila.find("th:eq(0)").text());
//   console.log(pc_codigo_carpt);
//   $("#pc_codigo_carpt").val(pc_codigo_carpt);
//   $("#pc_fecha_final").val(pc_fecha_final);
// });


// $("#form_solicitar").submit(function (e) {
//   e.preventDefault();

//   pc_codigo_carpt = $.trim($("#pc_codigo_carpt").val());
//   pc_fecha_final = $.trim($("#pc_fecha_final").val());

//   console.log(pc_fecha_final);

//   if (pc_codigo_carpt.length == "" || pc_fecha_final.length == "") {
  
//     Swal.fire({
      
//       type: "error",
//       title : "Debes ingresar la fecha o el código de la carpeta"


//     });
  
//     return false
  
//   }else{

//     $.ajax({
//       url: "backend/enviar_solicitud_carpeta.php",
//       type: "POST",
//       datatype: "json",
//       data: { pc_codigo_carpt: pc_codigo_carpt , pc_fecha_final : pc_fecha_final},
//       success: function (data) {

//         var data = JSON.parse(data);
//         if (data == 'ocupado') {
//           Swal.fire({
//             type: "warning",
//             title: "el estado de la carpeta es ocupado"


//           });
          
//         }else{

//           Swal.fire({
//             type: "sucess",
//             title: "Se ha enviado la solicitud al X",
//             showConfirmButton: true,
//           });




//         }


//       },
//     });

//   }
// });

// $("#insertar").click(function (){

//   $("#form-addFolder").trigger("reset");

//   $("#addFolder").modal("show");

// });

// $("#form_addFolder").submit(function (e) {

//   e.preventDefault();

//   ca_codigo_carpeta = $.trim($("#ca_codigo_carpeta").val());
//   ca_nombre_carpeta = $.trim($("#ca_nombre_carpeta").val());
//   ca_numero_folios = $.trim($("#ca_numero_folios").val());
//   ca_estado_carpeta = $.trim($("#ca_estado_carpeta").val());
//   ca_tipo_carpeta = $.trim($("#ca_tipo_carpeta").val());
//   if (
//     ca_codigo_carpeta.length == "" ||
//     ca_nombre_carpeta.length == "" ||
//     ca_numero_folios.length == "" ||
//     ca_estado_carpeta.length == "" ||
//     ca_tipo_carpeta.length == ""
//   ) {
//     Swal.fire({
//       type: "warning",
//       title: "debes ingresar todos los datos",
//     });
//   } else {
//     $.ajax({
//       url: "backend/agregar_folder.php",
//       type: "POST",
//       datatype: "json",
//       data: {
//         ca_codigo_carpeta: ca_codigo_carpeta,
//         ca_nombre_carpeta: ca_nombre_carpeta,
//         ca_numero_folios: ca_numero_folios,
//         ca_estado_carpeta: ca_estado_carpeta,
//         ca_tipo_carpeta: ca_tipo_carpeta,
//       },
//       succes: function (data) {
//         add = JSON.parse(data);
//         if (add == null) {
//           Swal.fire({
//             type: "success",
//             title: "¡Dato agregado correctamente,!",
//           });
//           carpetas.row
//             .add([
//               ca_codigo_carpeta,
//               ca_nombre_carpeta,
//               ca_numero_folios,
//               ca_estado_carpeta,
//               ca_tipo_carpeta,
//             ])
//             .draw();
//         }
//       },
//     });
//   }
// });

});