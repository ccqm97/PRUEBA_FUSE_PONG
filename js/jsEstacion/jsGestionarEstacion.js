$("#editEst").addClass("dropdown-item active");
$("#EstationDropdown").click();
$("#editEstacion").hide();

$.post(baseUrl+"index.php/Controller/getTipoEstaciones",
  {},
  function(data){
    var tipo = JSON.parse(data);
    $.each(tipo,function(i,item){
      $('#tipo_est_e').append('<option value="'+item.ID_TIPO_ESTACION+'">'+item.NOMBRE_TIPO_ESTACION+'</option>');
    });
  }
);

$.post(baseUrl+"index.php/Controller/getEstaciones2",
  {},
  function(data){
    var tipo = JSON.parse(data);
    $.each(tipo,function(i,item){
      $('#est_ini_e').append('<option value="'+item.ID_ESTACION +'">'+item.NOMBRE_ESTACION+'</option>');
      $('#est_fin_e').append('<option value="'+item.ID_ESTACION +'">'+item.NOMBRE_ESTACION+'</option>');
    });
  }
);

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
        {"orderable": true,
            render:function(data,type,row){
                return    '<div class="btn-group btn-group-xs">'+                            
                            '</button>'+ 
                                '<button type="button" class="btn btn-success " data-toggle="tooltip" data-placement="top" title="Editar Elemento" onClick="modifyEstation('+row.ID_ESTACION+')" title="Modificar"><i class="fa fa-edit"></i>'+
                                ''+
                            '</button>'+
                            '<button type="button"  style="background-color:red" data-toggle="tooltip" data-placement="top" title="Eliminar Elemento" class="btn btn-success " onClick="borrarEstacion('+row.ID_ESTACION+')" title="Eliminar"><i class="fa fa-trash"></i>'+
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

var idEstacionAux =0;

function modifyEstation(idEstacion) {
    idEstacionAux = idEstacion;
    $("#editEstacion").show();
    $('html, body').animate({
        scrollTop: $("#bntSave").offset().top
    }, 1500);
    $.post(baseUrl+"index.php/Controller/getEstacionesPorId",
        {id_est : idEstacion},
        function(data){
            var estacion = JSON.parse(data);
            $.each(estacion,
                function(i,item){
                    $("#NOMBRE_ESTACION").val(item.NOMBRE_ESTACION);
                    $("#tipo_est_e").val(item.ID_TIPO_ESTACION);
                    $("#est_ini_e").val(item.ID_ESTACION_VECINA_1);
                    $("#est_fin_e").val(item.ID_ESTACION_VECINA_2);
                }
            );

        }
    );
}

$("#formEditEstacion").on('submit', 
        function(evt){
            evt.preventDefault(); 
            $.post(baseUrl+"index.php/Controller/editEstaciones",
                {   ID_ESTACION:idEstacionAux,
                    ID_TIPO_ESTACION:$("#tipo_est_e").val(),
                    NOMBRE_ESTACION: $("#NOMBRE_ESTACION").val(),
                    ID_ESTACION_VECINA_1:  $("#est_ini_e").val(),
                    ID_ESTACION_VECINA_2:  $("#est_fin_e").val()
                },
                function(data){
                    if (data==1) {
                        var oTable = $('#TableEstaciones').DataTable( ); //actualizar datatable
                        oTable.ajax.reload();
                        $("#editEstacion").hide();
                        $("#NOMBRE_ESTACION").val("");
                        $("#tipo_est_e").val("");
                        $("#est_ini_e").val("");
                        $("#est_fin_e").val("");
                        $('html, body').animate({
                            scrollTop: $("#divTable").offset().top
                        }, 1500);
                        new PNotify({
                            title: 'Se actualizó la estación',
                            text: "Se ha modificado la informacón de la estación." ,
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
    $.post(baseUrl+"index.php/Controller/deleteEstacion",
        { ID_ESTACION:idEstacion},
        function(data){
            if (data==1) {
                var oTable = $('#TableEstaciones').DataTable( ); //actualizar datatable
                oTable.ajax.reload();
                new PNotify({
                    title: 'Se borró la estación',
                    text: "Se ha borrado la estación." ,
                    type: 'success',
                    styling: 'bootstrap3'
                });
            }else{
                alert("error al borrar")
            }
           
        }
    );
}