jQuery(document).ready(function(){



jQuery("#agregar").click(function() {
		
		$("#nombre").val("");
		$("#id").val("");
		$("#ModalCiu").modal('show');

});

//jQuery(".editar").click(function() {
$(document).on('click','.editar',function (e){
    $("#nombre").val($(this).data("nombre"));
		$("#id").val($(this).data("id"));
		$("#ModalCiu").modal('show');

});

jQuery("#agredi").click(function() {

	if ($("#nombre").val()=="")
		swal("¡Error!", "Campo Nombre vacío", "error");
	else {
		
		$.post("ciudades_codigo_agredi.php",$("#frmciu").serialize(),function(res){

						if (res==-1){
                          
                            swal("¡Error!", "El nombre de la ciudad debe ser irrepetible", "error");
                        }
                        else if (res==1) {
                             $("#ModalCiu").modal('hide');       
                                      
                            swal({   
                            title: "Finalizado",   
                            text: "Datos guardados satisfactoriamente",   
                            type: "success",   
                            showCancelButton: false,   
                            confirmButtonColor: "#BBD7ED",   
                            confirmButtonText: "Aceptar",   
                            closeOnConfirm: true }, 

                            function(){

                            
                              
                              $("#capa").load('ciudades_interfaz_listado.php');
                              });
                                      
                          }else {
                          
                              swal("¡Error!", "Error al guardar la ciudad", "error");
                          }

		});

		

	}

});


});