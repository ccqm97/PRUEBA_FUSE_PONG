$.post(baseUrl+"index.php/Controller/getCompanys",
  {},
  function(data){
    var tipo = JSON.parse(data);
    $.each(tipo,function(i,item){
      $('#r_company').append('<option value="'+item.COMPANY_ID  +'">'+item.COMPANY_NAME+'</option>');      
    });
  }
);

$("#formRegister").on('submit', function(evt){
    evt.preventDefault();  
    
    $.post(baseUrl+"index.php/Controller/registerUser",
    {   USER_NAME  : $('#r_email').val(),
        USER_PASSWORD  :$('#r_pass').val(),
        COMPANY_ID  :$('#r_company').val(),
    },
    function(data){
        if (data) {                
            alert("Usted ha sido registrado exitosamente")
            $('#r_email').val("");
            $('#r_pass').val("");
            $('#r_company').val("");
            $('#exampleModal').modal('hide');
        } else {
            alert("No pudo ser registrado, por favor intente de nuevo")
        }
    }
    );
    
});

$("#formLogin").on('submit', function(evt){
    evt.preventDefault();  
    
    $.post(baseUrl+"index.php/Controller/loginUser",
    {   USER_NAME  : $('#email').val(),
        USER_PASSWORD  :$('#pass').val(),
    },
    function(data){
        if (data) {                
            window.location.replace(baseUrl+"index.php/Controller/home");
        } else {
            alert("Datos Incorrectos")
        }
    }
    );
    
});