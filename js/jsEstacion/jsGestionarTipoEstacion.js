$("#editTEst").addClass("dropdown-item active");
$("#EstationDropdown").click();
$("#edit").hide();

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



$('#TableTEstaciones').DataTable({
    "language": {
        "emptyTable":     "No hay tipos de estaciones registradas.",
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
        "url":baseUrl+"index.php/Controller/getTipoEstaciones",
        "type":"POST",
        dataSrc: ''
    },
    'columns':[
        {data: 'ID_TIPO_ESTACION'},
        {data: 'NOMBRE_TIPO_ESTACION'},
        {"orderable": true,
            render:function(data,type,row){
                return    '<div class="btn-group btn-group-xs">'+                            
                            '</button>'+ 
                                '<button type="button"  data-toggle="tooltip" data-placement="top" title="Editar Elemento" class="btn btn-success " onClick="modifyEstation('+row.ID_TIPO_ESTACION+')" title="Modificar"><i class="fa fa-edit"></i>'+
                                ''+
                            '</button>'+
                            '<button type="button"  style="background-color:red" class="btn btn-success " data-toggle="tooltip" data-placement="top" title="Eliminar Elemento" onClick="borrarEstacion('+row.ID_TIPO_ESTACION+')" title="Eliminar"><i class="fa fa-trash"></i>'+
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

var idTipoEstacionAux=0;
function modifyEstation(idTipoEstacion) {
    idTipoEstacionAux= idTipoEstacion;
    $("#edit").show();
    $('html, body').animate({
        scrollTop: $("#bntSave").offset().top
    }, 1500);
    $.post(baseUrl+"index.php/Controller/getTipoEstacionesPorId",
        {ID_TIPO_ESTACION : idTipoEstacion},
        function(data){
            var estacion = JSON.parse(data);
            $.each(estacion,
                function(i,item){
                    $("#NOMBRE_TIPO_ESTACION").val(item.NOMBRE_TIPO_ESTACION);
                   
                }
            );

        }
    );

    
}

$("#formEditEstacion").on('submit', 
        function(evt){
            evt.preventDefault(); 
            $.post(baseUrl+"index.php/Controller/editTipoEstaciones",
                {   
                    ID_TIPO_ESTACION : idTipoEstacionAux,
                    NOMBRE_TIPO_ESTACION : $("#NOMBRE_TIPO_ESTACION").val()
                },
                function(data){
                    if (data==1) {
                        $("#edit").hide();
                        $("#NOMBRE_TIPO_ESTACION").val("");
                        var oTable = $('#TableTEstaciones').DataTable( ); //actualizar datatable
                        oTable.ajax.reload();
                        new PNotify({
                            title: 'Se actualizó el Tipo de estación',
                            text: "Se ha modificado la informacón del tipo de estación." ,
                            type: 'success',
                            styling: 'bootstrap3'
                        });
                        
                    } else{
                        alert("Error al modificar estacion")
                    }
                }
            );
        }
    );

function borrarEstacion(idEstacion) {
    $.post(baseUrl+"index.php/Controller/deleteTipoEstacion",
        {ID_TIPO_ESTACION : idEstacion},
        function(data){
            if (data==1) {
                var oTable = $('#TableTEstaciones').DataTable( ); //actualizar datatable
                oTable.ajax.reload();
                new PNotify({
                    title: 'Se borró el tipo de estación',
                    text: "Se ha borrado el tipo de estación exitosamente." ,
                    type: 'success',
                    styling: 'bootstrap3'
                });
                
            }else{
                alert("error al borrar")
            }
           
        }
    );
}