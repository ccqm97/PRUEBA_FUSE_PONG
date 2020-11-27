$("#addRuta").addClass("dropdown-item active");
$("#RouteDropdown").click();

$.post(baseUrl+"index.php/Controller/getEstaciones",
  {},
  function(data){
    var tipo = JSON.parse(data);
    $.each(tipo,function(i,item){
      $('#estacion_origen').append('<option value="'+item.ID_ESTACION +'">'+item.NOMBRE_ESTACION+'</option>');
      $('#estacion_fin').append('<option value="'+item.ID_ESTACION +'">'+item.NOMBRE_ESTACION+'</option>');
    });
  }
);

$.post(baseUrl+"index.php/Controller/getTroncales",
  {},
  function(data){
    var tipo = JSON.parse(data);
    $.each(tipo,function(i,item){
      $('#troncal_ori').append('<option value="'+item.ID_TRONCAL +'">'+item.NOMBRE_TRONCAL+'</option>');
      $('#troncal_fin').append('<option value="'+item.ID_TRONCAL +'">'+item.NOMBRE_TRONCAL+'</option>');
    });
  }
);


$("#horaIni").timepicker({
  timeFormat: "%g:%i %A"
});
$("#horaIni").val("");
$("#horaFin").timepicker({
  timeFormat: "%g:%i %A"
});
$("#horaFin").val("");

$("#FormAddRuta").on('submit', function(evt){
  evt.preventDefault();  
  $.post(baseUrl+"index.php/Controller/guardarRuta",
      {ID_TRONCAL_INICIO:$("#troncal_ori").val(),
      ID_TRONCAL_FIN:$("#troncal_fin").val(),
      ID_ESTACION_INICIO:$("#estacion_origen").val(),
      ID_ESTACION_FIN:$("#estacion_fin").val(),
      HORA_INICIO:$("#horaIni").val(),
      HORA_FIN:$("#horaFin").val(),
      NOMBRE_RUTA:$("#nombre_ruta").val(),},			
          function(data){
              if (data=="ok") {
                  var oTable = $('#tableRutas').DataTable( ); //actualizar datatable
                  oTable.ajax.reload();
                  $("#troncal_ori").val("");
                  $("#troncal_fin").val("");
                  $("#estacion_origen").val("");
                  $("#estacion_fin").val(""); 
                  $("#nombre_ruta").val(""); 
                  $("#horaIni").val(""); 
                  $("#horaFin").val(""); 
                  new PNotify({
                      title: 'Guardó Exitosamente',
                      text: "La ruta ha sido guardada." ,
                      type: 'success',
                      styling: 'bootstrap3'
                  });
              } else {
                  alert("No Guardó")
              }
          }
  );
        
});

$('#tableRutas').DataTable({
  "language": {
      "emptyTable":     "No hay estaciones registradas.",
      "info":         "Mostrando del _START_ al _END_ de _TOTAL_ resultados ",
      "infoEmpty":      "Mostrando 0 registros de un total de 0.",
      "infoFiltered":     "(filtrados de un total de _MAX_ registros)",
      "infoPostFix":      "(actualizados)",
      "lengthMenu":     "Mostrar _MENU_ registros",
      "loadingRecords":   "Cargando...",
      "processing":     "Procesando...",
      "search":     "Buscar",
      "searchPlaceholder":    "Dato para buscar",
      "zeroRecords":      "No se han encontrado coincidencias.",
      "paginate": {
      "first":      "Primera",
      "last":       "Última",
      "next":       "Siguiente",
      "previous":     "Anterior",
      "print": "Imprimir"
      },
      "aria": {
      "sortAscending":  "Ordenación ascendente",
      "sortDescending": "Ordenación descendente"
      }
  },
  'destroy': true,
  "processing": true,
  'paging'   : true,
  'info' : true,
  'lengthChange': false,
  'filter' : true,
  'responsive' : true,
  'search' : true,
  'stateSave' : false,
  'ajax' : {
      "url":baseUrl+"index.php/Controller/getRutas",
      "type":"POST",
      dataSrc: ''
  },
  'columns':[
      {data: 'ID_RUTA'},
      {data: 'NOMBRE_RUTA'},
      {data: 'TroncalIni'},
      {data: 'TroncalFin'},
      {data: 'EstacionIni'},
      {data: 'EstacionFin'},
      {data: 'HORA_INICIO'},
      {data: 'HORA_FIN'},
  ]
});