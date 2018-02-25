jQuery(document).ready(function(){


	jQuery("#agregar").click(function() {
         $("#capa").load('usuarios_interfaz_agregar.php');
     });

	$(document).on('click','.editar',function (e){
		$("#capa").load('usuarios_interfaz_editar.php?id='+$(this).data("id"));
	});

	jQuery("#guardar").click(function() {

		if ($("#nombre").val()=="")
			swal("¡Error!", "Campo nombre vacío", "error");
		else if ($("#apellido").val()=="")
			swal("¡Error!", "Campo apellido vacío", "error");
		else if ($("#pss").val()=="")
			swal("¡Error!", "Campo contraseña vacío", "error");
		else if ($("#pss").val()!=$("#pss2").val())
			swal("¡Error!", "Las contraseñas no coinciden", "error");
		else {

			$.post("usuarios_codigo_agredi.php",$("#frmusu").serialize(),function(res){

				if (res==1) {
                                
                                
                                swal({   
                                    title: "Finalizado",   
                                    text: "Datos guardados satisfactoriamente",   
                                    type: "success",   
                                    showCancelButton: false,   
                                    confirmButtonColor: "#BBD7ED",   
                                    confirmButtonText: "Aceptar",   
                                    closeOnConfirm: true }, 

                                    function(){
                                        
                                        $("#capa").load('usuarios_interfaz_listado.php');
                                });
                                
                }
                else if (res==-1)//Login repetido
                	swal("¡Error!", "El login debe ser irrepetible", "error");
                else if (res==-2){//Desactivarse a sí mismo
                	$.post("sesion_codigo_logout.php", {}, function(resp){
												   
          				  if (resp==1){

          				  		swal({   
                                    title: "Finalizado",   
                                    text: "Datos guardados satisfactoriamente",   
                                    type: "success",   
                                    showCancelButton: false,   
                                    confirmButtonColor: "#BBD7ED",   
                                    confirmButtonText: "Aceptar",   
                                    closeOnConfirm: true }, 

                                    function(){
                                        
                                        window.location.replace('index.php');
                                });
          					  
          					  
          					  }
        												
        				
        					}, "json");
                }
                else 
                	swal("¡Error!", "No se pudo guardar el usuario", "error");
                

			});


		}

              });

	jQuery("#volver").click(function() {
         $("#capa").load('usuarios_interfaz_listado.php');
     });


});