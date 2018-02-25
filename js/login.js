jQuery(document).ready(function(){


	jQuery(".enter").keypress(function(e) {
		if(e.which == 13)
			loguear();

	});

	function loguear (){

		if ($("#login").val()=="" || $("#clave").val()==""){
			
			swal("¡Error!", "No puede dejar campos vacíos", "error");
		}
		else{
			
			$.post("autenticar.php",$("#frmlogin").serialize(),function(res){
				
				if(res < 0){
                        swal("¡Error!", "Login y/o Clave incorrectos", "error");


                    }else if (res = 1){
                    	
                        window.location.replace('app/index.php');

                    }
					else{
						
						

						swal("¡Error!", "Error con la Base de Datos", "error");
					}
				
				
            });
		}
		

	}

	

	//Click acceder
	jQuery("#iniciar").click(function() {

		loguear();

	});


	

	

	








});