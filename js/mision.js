jQuery(document).ready(function(){

jQuery("#editar").click(function() {

	$("#ModalMis").modal('show');

});

jQuery("#guardar").click(function() {

	if ( $("#descr").val()=="")
			swal("¡Error!", "Campo descripción vacío", "error");
	else{


		$.post("mision_codigo_editar.php",$("#frm-mis").serialize(),function(res){

			if (res==1) {
                                
                                $("#ModalMis").modal('hide');
                                swal({   
                                    title: "Finalizado",   
                                    text: "Datos guardados satisfactoriamente",   
                                    type: "success",   
                                    showCancelButton: false,   
                                    confirmButtonColor: "#BBD7ED",   
                                    confirmButtonText: "Aceptar",   
                                    closeOnConfirm: true }, 

                                    function(){
                                        
                                        
                                        $("#capa").load('mision_interfaz.php');
                                });
                                
                }
                else {

                	swal("¡Error!", "No se pudo guardar la misión", "error");
                }


		});
	}


});



});