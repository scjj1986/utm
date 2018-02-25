jQuery(document).ready(function(){

	jQuery("#editar").click(function() {

		$("#capa").load('vision_interfaz_editar.php');

	});

	jQuery("#actualizar").click(function() {

		if ($("#max").val()=="0")
			swal("¡Error!", "Debe agregar al menos una visión", "error");
		else{

			$.post("vision_codigo_editar.php",$("#frmvis").serialize(),function(res){

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
                                        
                                        $("#capa").load('vision_interfaz.php');
                                });
                                
                }
                else {

                	swal("¡Error!", "No se pudo guardar el horario", "error");
                }

			});
		}

	});

	
	jQuery("#agr_vis").click(function() {

		if ($("#descr").val()=="")
			swal("¡Error!", "Campo descripción vacío", "error");
		else
			agregar_fila();

	});

	function agregar_fila(){
		var cont = parseInt($("#cont").val());
        var max = parseInt($("#max").val());
        cont++;
        max++;
        $("#cont").val(cont.toString());
        $("#max").val(max.toString());

        if ($("#tb-vis tr").length == 0)
            $("#tb-vis").append('<tr id="f'+max.toString()+'"><td><textarea rows="3" name="dsc'+max.toString()+'" id="dsc'+max.toString()+'" maxlength="500" class="form-control">'+$("#descr").val()+'</textarea></td><td><button title="Eliminar" data-id="f'+max.toString()+'" type="button" class="elm btn-danger"><span class="glyphicon glyphicon-remove"></span></button></td></tr>');
        else
        	$("#tb-vis tr:last").after('<tr id="f'+max.toString()+'"><td><textarea rows="3" name="dsc'+max.toString()+'" id="dsc'+max.toString()+'" maxlength="500" class="form-control">'+$("#descr").val()+'</textarea></td><td><button title="Eliminar" data-id="f'+max.toString()+'" type="button" class="elm btn-danger"><span class="glyphicon glyphicon-remove"></span></button></td></tr>');

        $("#descr").val("");

	}

	$(document).on('click','.elm',function (e){
        
        
        if ($("#evt").val()=="NO"){

            var cont = parseInt($("#cont").val());
            var max = parseInt($("#max").val());


            if (cont==1)
                max=0;
            
            cont--;
            $("#cont").val(cont.toString());
            $("#max").val(max.toString());

            var id=$(this).data("id");
            $("#"+id).remove();
            $("#evt").val("SI");
                
        }
        else {
            
            $("#evt").val("NO");
        } 

    });




});