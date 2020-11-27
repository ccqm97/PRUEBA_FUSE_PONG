$("#addBS").addClass("dropdown-item active");
$("#BSDropdown").click();
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
      $('#c_estacion').append('<option value="'+item.ID_ESTACION +'">'+item.NOMBRE_ESTACION+'</option>');
      $('#c_estacion_e').append('<option value="'+item.ID_ESTACION +'">'+item.NOMBRE_ESTACION+'</option>');
    });
  }
);

$.post(baseUrl+"index.php/Controller/getRutas",
  {},
  function(data){
    var tipo = JSON.parse(data);
    $.each(tipo,function(i,item){
      $('#c_ruta').append('<option value="'+item.ID_RUTA +'">'+item.NOMBRE_RUTA+'</option>');
      $('#c_ruta_e').append('<option value="'+item.ID_RUTA +'">'+item.NOMBRE_RUTA+'</option>');
    });
  }
);

$('#c_estacion').change(function(){
    $('#c_estacion option:selected').each(function(){
      var idEstacion = $('#c_estacion').val();
      $.post(baseUrl+"index.php/Controller/getVagonesEstacion",
        {ID_ESTACION:idEstacion},
        function(data){
          document.getElementById("c_vagon").options.length=1;
          var vagon = JSON.parse(data);
          $.each(vagon,function(i,item){
            $('#c_vagon').append('<option value="'+item.ID_VAGON+'">'+item.NUMERO_VAGON+'</option>');
          });
        }
        );
    });
  });

  $('#c_estacion_e').change(function(){
    $('#c_estacion_e option:selected').each(function(){
      var idEstacion = $('#c_estacion_e').val();
      $.post(baseUrl+"index.php/Controller/getVagonesEstacion",
        {ID_ESTACION:idEstacion},
        function(data){
          document.getElementById("c_vagon_e").options.length=1;
          var vagon = JSON.parse(data);
          $.each(vagon,function(i,item){
            $('#c_vagon_e').append('<option value="'+item.ID_VAGON+'">'+item.NUMERO_VAGON+'</option>');
          });
        }
        );
    });
  });

$("#formAddParadero").on('submit', function(evt){
    evt.preventDefault();  
    $.post(baseUrl+"index.php/Controller/guardarParadero",
        {   ID_RUTA  : $('#c_ruta').val(),
            ID_VAGON  :$('#c_vagon').val(),
        },
        function(data){
            if (data=="ok") {                
                var oTable = $('#tableParadero').DataTable( ); //actualizar datatable
                oTable.ajax.reload();
                new PNotify({
                    title: 'Guardó Exitosamente',
                    text: "El paradero ha sido guardado." ,
                    type: 'success',
                    styling: 'bootstrap3'
                });
            } else {
                alert("No Guardó")
            }
        }
    );
    $('#c_estacion').val("");
    $('#c_ruta').val("");
    $('#c_vagon').val("");
});


$('#tableTickets').DataTable({
    "language": {
        "emptyTable":     "No hay paraderos registrados.",
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
        "url":baseUrl+"index.php/Controller/getParaderos",
        "type":"POST",
        dataSrc: ''
    },
    'columns':[
        {data: 'NOMBRE_ESTACION'},
        {data: 'NUMERO_VAGON'},
        {data: 'NOMBRE_RUTA'},
        {"orderable": true,
            render:function(data,type,row){
                return    '<div class="btn-group btn-group-xs">'+                            
                            '</button>'+ 
                                '<button type="button"  data-toggle="tooltip" data-placement="top" title="Editar Elemento" class="btn btn-success " onClick="modifyVagon('+row.ID_VAGON +','+row.ID_RUTA +')" title="Modificar"><i class="fa fa-edit"></i>'+
                                ''+
                            '</button>'+
                            '<button type="button"  style="background-color:red" class="btn btn-success " data-toggle="tooltip" data-placement="top" title="Eliminar Elemento" onClick="borrarVagon('+row.ID_VAGON +','+row.ID_RUTA +')" title="Eliminar"><i class="fa fa-trash"></i>'+
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
var idRutaAux = 0;

function modifyVagon(idVagon,idRuta) {
    idVagonAux = idVagon;
    idRutaAux = idRuta;
    $("#edit").show();
    $("#add").hide();
    $('html, body').animate({
        scrollTop: $("#edit").offset().top
    }, 1500);
    $.post(baseUrl+"index.php/Controller/getParaderoPorId",
        {   ID_VAGON :  idVagon,
            ID_RUTA: idRuta},
        function(data){
            var estacion = JSON.parse(data);
            $.each(estacion,
                function(i,item){
                    $("#c_estacion_e").val(item.ID_ESTACION);
                    $.post(baseUrl+"index.php/Controller/getVagonesEstacion",
                        {ID_ESTACION:item.ID_ESTACION},
                        function(data){
                            document.getElementById("c_vagon_e").options.length=1;
                            var vagon = JSON.parse(data);
                            $.each(vagon,function(i,item){
                                $('#c_vagon_e').append('<option value="'+item.ID_VAGON+'">'+item.NUMERO_VAGON+'</option>');
                            });
                            $("#c_vagon_e").val(item.ID_VAGON);
                        }
                    );
                    
                    $("#c_ruta_e").val(item.ID_RUTA);
                }
            );

        }
    );
    
}

$("#formEditParadero").on('submit', 
        function(evt){
            evt.preventDefault(); 
            $.post(baseUrl+"index.php/Controller/editParadero",
                {   
                    ID_VAGON : idVagonAux,
                    ID_VAGON_N :  $("#c_vagon_e").val(),
                    ID_RUTA: idRutaAux,
                    ID_RUTA_N:  $("#c_ruta_e").val()
                },
                function(data){
                    if (data==1) {
                        $("#edit").hide();
                        $("#add").show();
                        $("#c_vagon_e").val("");
                        $("#c_ruta_e").val("");
                        $("#c_estacion_e").val("");
                        var oTable = $('#tableParadero').DataTable( ); //actualizar datatable
                        oTable.ajax.reload();
                        new PNotify({
                            title: 'Se actualizó el paradero',
                            text: "Se ha modificado la informacón del paradero correctamente" ,
                            type: 'success',
                            styling: 'bootstrap3'
                        });
                    } else{
                        alert("Error al modificar paradero")
                    }
                }
            );
        }
    );

function borrarVagon(idVagon,idRuta) {
    $.post(baseUrl+"index.php/Controller/deleteParadero",
        {   ID_VAGON : idVagon,
            ID_RUTA : idRuta},
        function(data){
            if (data==1) {
                var oTable = $('#tableParadero').DataTable( ); //actualizar datatable
                oTable.ajax.reload();
                new PNotify({
                    title: 'Se borró el paradero',
                    text: "Se ha borrado el paradero exitosamente." ,
                    type: 'success',
                    styling: 'bootstrap3'
                });
            }else{
                alert("error al borrar")
            }
           
        }
    );
}