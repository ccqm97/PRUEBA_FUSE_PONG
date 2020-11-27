$("#addTroncal").click(function(){
    $('#troncalModal').modal('show');
});

$("#formAddTroncal").on('submit', function(evt){
    evt.preventDefault();
    $.post(baseUrl+"index.php/Controller/guardarTroncal",
        {NOMBRE_TRONCAL:$("#nombre_troncal").val(),
         COLOR_TRONCAL:$("#color_troncal").val(),},			
            function(data){
                if (data=="ok") {
                    $('#troncalModal').modal('hide');
                    $("#troncal_ori").empty();
                    $("#troncal_ori").append('<option  value="">Escoga un tipo de estación</option>');
                    $("#troncal_fin").empty();
                    $("#troncal_fin").append('<option  value="">Escoga un tipo de estación</option>');
                    $.post(baseUrl+"index.php/Controller/getTroncales",
                        {},
                        function(data){
                            var tipo = JSON.parse(data);
                            $.each(tipo,function(i,item){
                                $('#troncal_ori').append('<option value="'+item.ID_TRONCAL+'">'+item.NOMBRE_TRONCAL+'</option>');
                                $('#troncal_fin').append('<option value="'+item.ID_TRONCAL+'">'+item.NOMBRE_TRONCAL+'</option>');
                            });
                        }
                    );
                    var oTable = $('#tableTroncales').DataTable( ); //actualizar datatable
                    oTable.ajax.reload();
                    new PNotify({
                        title: 'Guardó Exitosamente',
                        text: "La troncal ha sido guardada." ,
                        type: 'success',
                        styling: 'bootstrap3'
                    });
                } else {
                    alert("No Guardó")
                }
            }
    );
    $("#nombre_troncal").val("");
    $("#color_troncal").val("");
});
