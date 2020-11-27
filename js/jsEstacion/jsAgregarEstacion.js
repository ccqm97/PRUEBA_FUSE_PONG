$("#addEst").addClass("dropdown-item active");
$("#EstationDropdown").click();
$("#tipo_est").empty();
$("#tipo_est").append('<option  value="">Escoga un tipo de estación</option>');
$.post(baseUrl+"index.php/Controller/getTipoEstaciones",
  {},
  function(data){
    var tipo = JSON.parse(data);
    $.each(tipo,function(i,item){
      $('#tipo_est').append('<option value="'+item.ID_TIPO_ESTACION+'">'+item.NOMBRE_TIPO_ESTACION+'</option>');
    });
  }
);

$.post(baseUrl+"index.php/Controller/getEstaciones2",
  {},
  function(data){
    var tipo = JSON.parse(data);
    $.each(tipo,function(i,item){
      $('#est_ini').append('<option value="'+item.ID_ESTACION +'">'+item.NOMBRE_ESTACION+'</option>');
      $('#est_fin').append('<option value="'+item.ID_ESTACION +'">'+item.NOMBRE_ESTACION+'</option>');
    });
  }
);



$(document).ready(function (){
    $.post(baseUrl+"index.php/Controller/getNumeroTipoEstacion",{},			
    function(data){
        if (data == 0) {
            $("#bntSave").prop('disabled', true);
            new PNotify({
                title: 'No existen tipos de estación',
                text: "Por favor agregue al menos una para poder crear una estación." ,
                type: 'error',
                styling: 'bootstrap3'
            });
        }else{
            $("#bntSave").prop('disabled', false);
        }
    }
);
});

$("#formAddEstacion").on('submit', function(evt){
    evt.preventDefault();  

    $.post(baseUrl+"index.php/Controller/guardarEstacion",
        {ID_TIPO_ESTACION:$("#tipo_est").val(),
        NOMBRE_ESTACION:$("#NOMBRE_ESTACION").val(),
        ID_ESTACION_VECINA_1:$("#est_ini").val(),
        ID_ESTACION_VECINA_2:$("#est_fin").val(),},			
            function(data){
                if (data=="ok") {
                    $("#est_ini").empty();
                    $("#est_ini").append('<option  value="">Elija la ciudad vecina</option>');
                    $("#est_fin").empty();
                    $("#est_fin").append('<option  value="">Elija la ciudad vecina</option>');
                    $.post(baseUrl+"index.php/Controller/getEstaciones2",
                        {},
                        function(data){
                            var tipo = JSON.parse(data);
                            $.each(tipo,function(i,item){
                                $('#est_ini').append('<option value="'+item.ID_ESTACION +'">'+item.NOMBRE_ESTACION+'</option>');
                                $('#est_fin').append('<option value="'+item.ID_ESTACION +'">'+item.NOMBRE_ESTACION+'</option>');
                            });
                        }
                    );
                    var oTable = $('#TableEstaciones').DataTable( ); //actualizar datatable
                    oTable.ajax.reload();
                    new PNotify({
                        title: 'Guardó Exitosamente',
                        text: "El tipo de estación ha sido guardada." ,
                        type: 'success',
                        styling: 'bootstrap3'
                    });
                } else {
                    alert("No Guardó")
                }
            }
    );
    var oTable = $('#TableEstaciones').DataTable( ); //actualizar datatable
    oTable.ajax.reload();
    $("#tipo_est").val("");
    $("#NOMBRE_ESTACION").val("")
    $("#est_ini").val("")
    $("#est_fin").val("")        
});

$('#TableEstaciones').DataTable({
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
        "url":baseUrl+"index.php/Controller/getEstaciones",
        "type":"POST",
        dataSrc: ''
    },
    'columns':[
        {data: 'ID_ESTACION'},
        {data: 'NOMBRE_ESTACION'},
        {data: 'NOMBRE_TIPO_ESTACION'},
        {data: 'NombreVeci1'},
        {data: 'NombreVeci2'},
    
    ],
    'dom': 'Bfrtip',
        'buttons': [
           'pdf', 'print'
        ],
    
});