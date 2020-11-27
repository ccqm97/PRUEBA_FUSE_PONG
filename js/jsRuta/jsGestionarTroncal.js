$("#gestTron").addClass("dropdown-item active");
$("#RouteDropdown").click();
$("#edit").hide();


$('#tableTroncales').DataTable({
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
        "url":baseUrl+"index.php/Controller/getTroncales",
        "type":"POST",
        dataSrc: ''
    },
    'columns':[
        {data: 'ID_TRONCAL'},
        {data: 'NOMBRE_TRONCAL'},
        {data: 'COLOR_TRONCAL'},
        {"orderable": true,
            render:function(data,type,row){
                return    '<div class="btn-group btn-group-xs">'+                            
                            '</button>'+ 
                                '<button type="button"  data-toggle="tooltip" data-placement="top" title="Editar Elemento" class="btn btn-success " onClick="modifyTroncal('+row.ID_TRONCAL+')" title="Modificar"><i class="fa fa-edit"></i>'+
                                ''+
                            '</button>'+
                            '<button type="button"  style="background-color:red" class="btn btn-success " data-toggle="tooltip" data-placement="top" title="Eliminar Elemento" onClick="borrarTroncal('+row.ID_TRONCAL+')" title="Eliminar"><i class="fa fa-trash"></i>'+
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

var idTroncalAux = 0;
function modifyTroncal(idTroncal) {
    idTroncalAux =idTroncal;
    $("#edit").show();
    $('html, body').animate({
        scrollTop: $("#bntSave").offset().top
    }, 1500);
    $.post(baseUrl+"index.php/Controller/getTroncalPorId",
        {ID_TRONCAL : idTroncal},
        function(data){
            var estacion = JSON.parse(data);
            $.each(estacion,
                function(i,item){
                    $("#NOMBRE_TRONCAL_ED").val(item.NOMBRE_TRONCAL);
                    $("#COLOR_TRONCAL_ED").val(item.COLOR_TRONCAL);
                }
            );

        }
    );
}

$("#formEditTroncal").on('submit', 
        function(evt){
            evt.preventDefault(); 
            $.post(baseUrl+"index.php/Controller/editTroncal",
                {   
                    ID_TRONCAL : idTroncalAux,
                    NOMBRE_TRONCAL : $("#NOMBRE_TRONCAL_ED").val(),
                    COLOR_TRONCAL : $("#COLOR_TRONCAL_ED").val()
                },
                function(data){
                    if (data==1) {
                        $("#edit").hide();
                        $("#NOMBRE_TRONCAL_ED").val("");
                        $("#COLOR_TRONCAL_ED").val("");
                        var oTable = $('#tableTroncales').DataTable( ); //actualizar datatable
                        oTable.ajax.reload();
                        new PNotify({
                            title: 'Se actualizó la troncal',
                            text: "Se ha modificado la informacón de la troncal." ,
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

function borrarTroncal(idTroncal) {
    $.post(baseUrl+"index.php/Controller/deleteTroncal",
        {ID_TRONCAL : idTroncal},
        function(data){
            if (data==1) {
                var oTable = $('#tableTroncales').DataTable( ); //actualizar datatable
                oTable.ajax.reload();
                new PNotify({
                    title: 'Se borró la troncal',
                    text: "Se ha borrado la troncal exitosamente." ,
                    type: 'success',
                    styling: 'bootstrap3'
                });
                
            }else{
                alert("error al borrar")
            }
           
        }
    );
}