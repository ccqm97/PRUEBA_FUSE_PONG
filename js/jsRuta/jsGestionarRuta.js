$("#editRuta").addClass("dropdown-item active");
$("#RouteDropdown").click();
$("#B_editRuta").hide();

$.post(baseUrl+"index.php/Controller/getEstaciones",
  {},
  function(data){
    var tipo = JSON.parse(data);
    $.each(tipo,function(i,item){
      $('#estacion_origen_e').append('<option value="'+item.ID_ESTACION +'">'+item.NOMBRE_ESTACION+'</option>');
      $('#estacion_fin_e').append('<option value="'+item.ID_ESTACION +'">'+item.NOMBRE_ESTACION+'</option>');
    });
  }
);

$.post(baseUrl+"index.php/Controller/getTroncales",
  {},
  function(data){
    var tipo = JSON.parse(data);
    $.each(tipo,function(i,item){
      $('#troncal_ori_e').append('<option value="'+item.ID_TRONCAL +'">'+item.NOMBRE_TRONCAL+'</option>');
      $('#troncal_fin_e').append('<option value="'+item.ID_TRONCAL +'">'+item.NOMBRE_TRONCAL+'</option>');
    });
  }
);

$('#tableRutasG').DataTable({
    "language": {
        "emptyTable":     "No hay rutas registradas.",
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
        {"orderable": true,
            render:function(data,type,row){
                return    '<div class="btn-group btn-group-xs">'+                            
                            '</button>'+ 
                                '<button type="button" class="btn btn-success " data-toggle="tooltip" data-placement="top" title="Editar Elemento" onClick="modifyEstation('+row.ID_RUTA+')" title="Modificar"><i class="fa fa-edit"></i>'+
                                ''+
                            '</button>'+
                            '<button type="button"  style="background-color:red" data-toggle="tooltip" data-placement="top" title="Eliminar Elemento" class="btn btn-success " onClick="borrarEstacion('+row.ID_RUTA+')" title="Eliminar"><i class="fa fa-trash"></i>'+
                                ''+
                            '</button>'+
                        '</div>';
            }        
        }
    
    ],
    'dom': 'Bfrtip',
        'buttons': [
           'pdf', 'print'
        ],
    
});

var idRutaAux = 0;
$("#horaIniE").timepicker({
    timeFormat: "%g:%i %A"
  });
  $("#horaIniE").val("");
  $("#horaFinE").timepicker({
    timeFormat: "%g:%i %A"
  });
  $("#horaFinE").val("");

function modifyEstation(idRuta) {
    idRutaAux = idRuta;
    $("#B_editRuta").show();
    $('html, body').animate({
        scrollTop: $("#bntSave").offset().top
    }, 1500);
    $.post(baseUrl+"index.php/Controller/getRutaPorId",
        {ID_RUTA : idRuta},
        function(data){
            var estacion = JSON.parse(data);
            $.each(estacion,
                function(i,item){
                    $("#nombre_ruta_e").val(item.NOMBRE_RUTA);
                    $("#troncal_ori_e").val(item.ID_TRONCAL_INICIO);
                    $("#troncal_fin_e").val(item.ID_TRONCAL_FIN);
                    $("#estacion_origen_e").val(item.ID_ESTACION_INICIO);
                    $("#estacion_fin_e").val(item.ID_ESTACION_FIN);
                    $("#horaIniE").val(item.HORA_INICIO);
                    $("#horaFinE").val(item.HORA_FIN);
                }
            );

        }
    );

   
}

$("#formEditRuta").on('submit', 
    function(evt){
        evt.preventDefault(); 
        $.post(baseUrl+"index.php/Controller/editRuta",
            {   
                ID_RUTA : idRutaAux,
                ID_TRONCAL_INICIO : $("#troncal_ori_e").val(),
                ID_TRONCAL_FIN : $("#troncal_fin_e").val(),
                ID_ESTACION_INICIO : $("#estacion_origen_e").val(),
                ID_ESTACION_FIN : $("#estacion_fin_e").val(),
                HORA_INICIO:$("#horaIniE").val(),
                HORA_FIN:$("#horaFinE").val(),
                NOMBRE_RUTA : $("#nombre_ruta_e").val()
            },
            function(data){
                if (data==1) {
                    $("#B_editRuta").hide();
                    var oTable = $('#tableRutasG').DataTable( ); //actualizar datatable
                    oTable.ajax.reload();
                    $("#troncal_ori_e").val("");
                    $("#troncal_fin_e").val("");
                    $("#estacion_origen_e").val("");
                    $("#estacion_fin_e").val("");
                    $("#nombre_ruta_e").val("");

                    new PNotify({
                        title: 'Se actualizó la ruta',
                        text: "Se ha modificado la informacón de la ruta." ,
                        type: 'success',
                        styling: 'bootstrap3'
                    });
                    //location.reload();
                } else{
                    alert("Error al modificar la ruta")
                }
            }
        );
    }
);

function borrarEstacion(idRuta) {
    $.post(baseUrl+"index.php/Controller/deleteRuta",
        { ID_RUTA:idRuta},
        function(data){
            if (data==1) {
                var oTable = $('#tableRutasG').DataTable( ); //actualizar datatable
                oTable.ajax.reload();
                new PNotify({
                    title: 'Se borró la ruta',
                    text: "Se ha borrado la ruta correctamente." ,
                    type: 'success',
                    styling: 'bootstrap3'
                });
            }else{
                alert("error al borrar")
            }
           
        }
    );
}