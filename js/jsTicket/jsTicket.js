
$.post(baseUrl+"index.php/Controller/getProjects",
  {},
  function(data){
    var tipo = JSON.parse(data);
    $.each(tipo,function(i,item){
      $('#c_proyecto').append('<option value="'+item.PROJECT_ID  +'">'+item.PROJECT_NAME+'</option>');      
    });
  }
);


$('#TableTickets').DataTable({
    "language": {
        "emptyTable":     "No hay tickets registrados.",
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
        "url":baseUrl+"index.php/Controller/getTickets",
        "type":"POST",
        dataSrc: ''
    },
    'columns':[
        {data: 'TICKET_ID'},
        {data: 'COMPANY_NAME'},
        {data: 'PROJECT_NAME'},
        {data: 'USER_HISTORY_DESCRIPTION'},
        {data: 'TICKET_STATE'},
        {"orderable": true,
            render:function(data,type,row){
                if(row.TICKET_STATE==0){
                    return    '<div class="btn-group btn-group-xs">'+                                                        
                            '<button type="button"  style="background-color:red" data-toggle="tooltip" data-placement="top" class="btn btn-success " onClick="changeState('+row.TICKET_ID +','+row.TICKET_STATE +')" title="Desactivar Ticket">Desactivar Ticket <i class="fa fa-ban"></i>'+
                                ''+
                            '</button>'+
                        '</div>';
                }
                return    '<div class="btn-group btn-group-xs">'+                                                        
                            '<button type="button"  style="background-color:green" data-toggle="tooltip" data-placement="top" class="btn btn-success " onClick="changeState('+row.TICKET_ID +','+row.TICKET_STATE +')" title="Activar Ticket">Activar Ticket <i class="fa fa-check-circle"></i>'+
                                ''+
                            '</button>'+
                        '</div>';
            }        
        }
    
    ],
    "columnDefs":[
        {
            "targets":[4],
             "data":"TICKET_STATE",
             "render": function(data, type, row){
                 if (data == 0){
                     return "<span class='label label-success' style='background: Green; color:white;'>Activo</span>";
                 }else{
                     return "<span class='label label-danger' style='background: Red; color:white;' >Inactivo</span>";
                 }
             } 
         }        
         ],
    
});

$("#formCreateTicket").on('submit', 
        function(evt){
            evt.preventDefault(); 
            $.post(baseUrl+"index.php/Controller/saveUserHistory",
                {   USER_HISTORY_DESCRIPTION:$("#desc_UH").val(),
                    PROJECT_ID :$("#c_proyecto").val(),                   
                },
                function(data){
                    if (data!=0) {
                        $.post(baseUrl+"index.php/Controller/saveTicket",
                            {USER_HISTORY_ID:data,
                            },
                            function(data){
                               if (data) {
                                    var oTable = $('#TableTickets').DataTable( ); //actualizar datatable
                                    oTable.ajax.reload();                       
                                    $("#desc_UH").val("");
                                    $("#c_proyecto").val("");
                                    new PNotify({
                                        title: 'Se ha levantado un nuevo ticket',
                                        text: "Se ha creado el ticket con la nueva historia de usuario." ,
                                        type: 'success',
                                        styling: 'bootstrap3'
                                    });
                               }
                            }
                        );                       
                        
                    } else{
                        alert("Error al crear el ticket")
                    }
                }
            );
        }
    );

function changeState(ticketId, state) {
    $.post(baseUrl+"index.php/Controller/changeTicketState",
        { TICKET_ID:ticketId,
            TICKET_STATE:state},
        function(data){
            if (data) {
                var oTable = $('#TableTickets').DataTable( ); //actualizar datatable
                oTable.ajax.reload();
                new PNotify({
                    title: 'Actualizando ticket',
                    text: "Se ha cambiado el estado del ticket a Inactivo" ,
                    type: 'success',
                    styling: 'bootstrap3'
                });
            }else{
                alert("error al cambair el estado del ticket")
            }
           
        }
    );
}