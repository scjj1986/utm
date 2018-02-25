jQuery(document).ready(function(){

			 var Letras=' ABCDEFGHIJKLMNÑOPQRSTUVWXYZabcdefghijklmnñopqrstuvwxyzàáÀÁéèÈÉíìÍÌïÏóòÓÒúùÚÙüÜ,. ' 
			 var Numeros='1234567890.' 
			 var NumerosYLetras=' ABCÇDEFGHIJKLMNOPQRSTUVWXYZabcçdefghijklmnopqrstuvwxyz1234567890,.:;@-\''
			 var SimbolosEspeciales=',.:;@-\'' 
			 var SignosMatematicos='+-=()*/' 
			 var Otros='<>#$%&?¿' 
			 var Sexo='FMfm'
			 var NumeroYLetra=' NSns1234567890/ '
			 var Nick='ABCÇDEFGHIJKLMNOPQRSTUVWXYZabcçdefghijklmnopqrstuvwxyz1234567890'
			 //Validar La entrada de datos
			 function ValidarEntrada(e,allow) { 
			  var k; 
			  k=document.all?parseInt(e.keyCode): parseInt(e.which); 
			  return (allow.indexOf(String.fromCharCode(k))!=-1); 
			 }// JavaScript Document

			 $(document).on('keypress','.num',function (e){
					return ValidarEntrada(e, Numeros);
		        
		    });
		    
			$(document).on('keypress','.let',function (e){
					return ValidarEntrada(e, Letras);
			});



            $("#capa").load('home.php');

            

            jQuery("#inicio").click(function() {
              $("#capa").load('home.php');
            });

            jQuery("#org").click(function() {
              $("#capa").load('organigrama_interfaz.php');
            });

            jQuery("#mis").click(function() {
              $("#capa").load('mision_interfaz.php');
            });

            jQuery("#vis").click(function() {

              
              $("#capa").load('vision_interfaz.php');

            });

            jQuery("#ciu").click(function() {
              $("#capa").load('ciudades_interfaz_listado.php');
            });

            jQuery("#rut").click(function() {
              $("#capa").load('rutas_interfaz_listado.php');
            });

            jQuery("#rut2").click(function() {
              $("#capa").load('rutas2_interfaz_listado.php');
            });

            jQuery("#conres").click(function() {
              $("#capa").load('reservas_interfaz_consultar.php');
            });
            jQuery("#procesar").click(function() {
              $("#capa").load('reservas_interfaz_procesar.php');
            });
            jQuery("#busres").click(function() {
              $("#capa").load('reservas_interfaz_buscar.php');
            });

            jQuery("#usu").click(function() {
              $("#capa").load('usuarios_interfaz_listado.php');
            });

            
            //Levantamiento del modal para iniciar sesión
            jQuery("#login").click(function() {
              $("#lgn").val("");
              $("#clv").val("");
              $("#ModalLogin").modal('show');

            });


            //Enter en campos de iniciar sesión (Login y Clave)
            jQuery(".enter").keypress(function(e) {
              if(e.which == 13)
                loguear();

            });

            function loguear(){

              if ($("#lgn").val()=="" || $("#clv").val()=="")
                  swal("¡Error!", "No puede dejar campos vacíos", "error");
              else{

                  $.post("sesion_codigo_autenticar.php",$("#frmlgn").serialize(),function(res){

                      if (res==-1){
                                    
                                      swal("¡Error!", "Login y/o Clave incorrectos", "error"); 
                                  }
                                  else if (res==1) {
                                       $("#ModalLogin").modal('hide');               
                                      window.location.replace('index.php');
                                                
                                    }else {
                                    
                                        swal("¡Error!", "Error en acceso", "error");
                                    }

                  });

              }
            }


            jQuery("#acceder").click(function() {
              loguear();
             }); 

            
			
            



            jQuery("#logout").click(function() {

              	 $.post("sesion_codigo_logout.php", {}, function(resp){
												   
          				  if (resp==1){
          					  window.location.replace('index.php');
          					  
          					  }
        												
        				
        					}, "json");

            });



});