$("#addTipoEst").click(function(){
    $('#tipoModal').modal('show');
});


$("#formAddTipoEstacion").on('submit', function(evt){
        evt.preventDefault();
    $.post(baseUrl+"index.php/Controller/guardarTipoEstacion",
        {NOMBRE_TIPO_ESTACION:$("#NOMBRE_TIPO_ESTACION_M").val()},			
            function(data){
                if (data=="ok") {
                    $('#tipoModal').modal('hide');
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
                    var oTable = $('#TableTEstaciones').DataTable( ); //actualizar datatable
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
    $("#NOMBRE_TIPO_ESTACION_M").val("");
});

