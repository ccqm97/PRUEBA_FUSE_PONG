$("#addVagon").addClass("dropdown-item active");
$("#WagonDropdown").click();
$("#edit").hide();

$("#cancelEdit").click(function (){
    $("#add").show();
    $("#edit").hide();
});

$.post(baseUrl+"index.php/Controller/getEstaciones",
  {},
  function(data){
    var tipo = JSON.parse(data);
    $.each(tipo,function(i,item){
      $('#estacion').append('<option value="'+item.ID_ESTACION +'">'+item.NOMBRE_ESTACION+'</option>');
      $('#estacionEdit').append('<option value="'+item.ID_ESTACION +'">'+item.NOMBRE_ESTACION+'</option>');
    });
  }
);

$("#formAddVagon").on('submit', function(evt){
    evt.preventDefault();  
    $.post(baseUrl+"index.php/Controller/guardarVagon",
        {   ID_ESTACION : $('#estacion').val(),
            NUMERO_VAGON :$('#numero_vagon').val(),
        },
        function(data){
            if (data=="ok") {                
                var oTable = $('#tableVagon').DataTable( ); //actualizar datatable
                oTable.ajax.reload();
                new PNotify({
                    title: 'Guardó Exitosamente',
                    text: "El vagón ha sido guardado." ,
                    type: 'success',
                    styling: 'bootstrap3'
                });
            } else {
                alert("No Guardó")
            }
        }
    );
    $('#estacion').val("");
    $('#numero_vagon').val("");
});


$('#tableVagon').DataTable({
    "language": {
        "emptyTable":     "No hay vagones registrados.",
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
        "url":baseUrl+"index.php/Controller/getVagones",
        "type":"POST",
        dataSrc: ''
    },
    'columns':[
        {data: 'ID_VAGON'},
        {data: 'NOMBRE_ESTACION'},
        {data: 'NUMERO_VAGON'},
        {"orderable": true,
            render:function(data,type,row){
                return    '<div class="btn-group btn-group-xs">'+                            
                            '</button>'+ 
                                '<button type="button"  data-toggle="tooltip" data-placement="top" title="Editar Elemento" class="btn btn-success " onClick="modifyVagon('+row.ID_VAGON +')" title="Modificar"><i class="fa fa-edit"></i>'+
                                ''+
                            '</button>'+
                            '<button type="button"  style="background-color:red" class="btn btn-success " data-toggle="tooltip" data-placement="top" title="Eliminar Elemento" onClick="borrarVagon('+row.ID_VAGON +')" title="Eliminar"><i class="fa fa-trash"></i>'+
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

var idVagonAux = 0;
function modifyVagon(idVagon) {
    idVagonAux = idVagon;
    $("#edit").show();
    $("#add").hide();
    $('html, body').animate({
        scrollTop: $("#edit").offset().top
    }, 1500);
    $.post(baseUrl+"index.php/Controller/getvagonPorId",
        {ID_VAGON : idVagon},
        function(data){
            var estacion = JSON.parse(data);
            $.each(estacion,
                function(i,item){
                    $("#estacionEdit").val(item.ID_ESTACION);
                    $("#numero_vagon_e").val(item.NUMERO_VAGON);
                }
            );

        }
    );
    
}

$("#formEditVagon").on('submit', 
        function(evt){
            evt.preventDefault(); 
            $.post(baseUrl+"index.php/Controller/editVagon",
                {   
                    ID_VAGON : idVagonAux,
                    ID_ESTACION : $("#estacionEdit").val(),
                    NUMERO_VAGON : $("#numero_vagon_e").val()
                },
                function(data){
                    if (data==1) {
                        $("#edit").hide();
                        $("#add").show();
                        $("#estacionEdit").val("");
                        $("#numero_vagon_e").val("");
                        var oTable = $('#tableVagon').DataTable( ); //actualizar datatable
                        oTable.ajax.reload();
                        new PNotify({
                            title: 'Se actualizó el vagón',
                            text: "Se ha modificado la informacón del vagón" ,
                            type: 'success',
                            styling: 'bootstrap3'
                        });
                    } else{
                        alert("Error al modificar vagon")
                    }
                }
            );
        }
    );

function borrarVagon(idVagon) {
    $.post(baseUrl+"index.php/Controller/deleteVagon",
        {ID_VAGON : idVagon},
        function(data){
            if (data==1) {
                var oTable = $('#tableVagon').DataTable( ); //actualizar datatable
                oTable.ajax.reload();
                new PNotify({
                    title: 'Se borró el vagón',
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