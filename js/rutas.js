jQuery(document).ready(function(){

	$("#precio").numeric(".");

	$('.hra').timepicker({
		    showPeriod: true,
		    showLeadingZero: true
		});


	function cargar_select_ciudades(idnom,idval,nombre){
		$("#"+idnom).empty();
		if (idval==-1)
			$("#"+idnom).append('<option value="-1">Seleccione...</option>');
		else
			$("#"+idnom).append('<option value="'+idval+'">'+nombre+'</option>');
    	$.ajax({
				    url: "rutas_codigo_listarciudades.php", /* Llamamos a tu archivo */
				    data: {id:idval}, /* Ponemos los parametros de ser necesarios */
				    type: "POST",
				    contentType: "application/x-www-form-urlencoded",
				    dataType: "json",  /* Esto es lo que indica que la respuesta será un objeto JSon */
				    success: function(data){
				        if(data != null && $.isArray(data)){
				            /* Recorremos tu respuesta con each */
				            $.each(data, function(index, value){
								$("#"+idnom).append('<option value="'+value.id+'">'+value.nombre+'</option>');

				            });
				        }
				    }
				});
    }
    

	jQuery("#agregar").click(function() {
			cargar_select_ciudades("idori",-1,"");
			cargar_select_ciudades("iddes",-1,"");

			$("#hr").val("0");
			$("#min").val("0");
			$("#precio").val("");
			$("#act").val("SI");


			$("#ModalRut").modal('show');

	});

	jQuery("#volver").click(function() {

              $("#capa").load('rutas_interfaz_listado.php');
     });

	//jQuery(".editar").click(function() {
	$(document).on('click','.editar',function (e){

			cargar_select_ciudades("idori",$(this).data("idori"),$(this).data("ori"));
			cargar_select_ciudades("iddes",$(this).data("iddes"),$(this).data("des"));

			$("#hr").val($(this).data("hr"));
			$("#min").val($(this).data("min"));
			$("#precio").val($(this).data("precio"));
			$("#act").val($(this).data("activo"));
			$("#rl").val($(this).data("rl"));

			$("#id").val($(this).data("id"));


			$("#ModalRut").modal('show');
	});

	jQuery(".act-hor").click(function() {
		
		if ($(this).data("nreg")==0)
			$("#capa").load('rutas_interfaz_nuevohorario.php?id='+$(this).data("id"));
		else
			$("#capa").load('rutas_interfaz_actualizarhorario.php?id='+$(this).data("id"));
	});

	jQuery(".hra").change(function() {
		var idllegada="";
		idllegada=$(this).data("llegada");
		if (idllegada!="")
				$("#"+idllegada).val(hora_llegada_12($(this).val()));

	});

	jQuery(".chk").change(function() {

		var clase = $(this).data("clase");
		var chkd = $(this).is(":checked");
		$("."+clase).prop("checked",chkd);


	});

	jQuery("#agr_hsal_lun").click(function() {
		if ($("#hsal_lun").val()=="")
			swal("¡Error!", "Campo Hora de Salida vacío", "error");
		else if (hsal_repetida("hsal_lun","hsallun"))
			swal("¡Error!", "Esta hora de salida ya se encuentra registrada", "error");
		else if ($(this).data("opc")=="nuevo")
				agregar_fila("tb-hsal-lun","f-hsal-lun","hsallun","hsal_lun","hlle_lun","1");
		else
			agregar_fila2("tb-hsal-lun","f-hsal-lun","chkhsallun","chk_hsal_lun","hsallun","hsal_lun","hlle_lun","1");
			//agregar_fila2("tb-hsal-lun","f-hsal-lun","hsallun","hsal_lun","hlle_lun","1");
			

	});



	jQuery("#agr_hsal_mar").click(function() {
		if ($("#hsal_mar").val()=="")
			swal("¡Error!", "Campo Hora de Salida vacío", "error");
		else if (hsal_repetida("hsal_mar","hsalmar"))
			swal("¡Error!", "Esta hora de salida ya se encuentra registrada", "error");
		else if ($(this).data("opc")=="nuevo")
			agregar_fila("tb-hsal-mar","f-hsal-mar","hsalmar","hsal_mar","hlle_mar","2");
		else
			agregar_fila2("tb-hsal-mar","f-hsal-mar","chkhsalmar","chk_hsal_mar","hsalmar","hsal_mar","hlle_mar","2");
	});

	jQuery("#agr_hsal_mie").click(function() {
		if ($("#hsal_mie").val()=="")
			swal("¡Error!", "Campo Hora de Salida vacío", "error");
		else if (hsal_repetida("hsal_mie","hsalmie"))
			swal("¡Error!", "Esta hora de salida ya se encuentra registrada", "error");
		else if ($(this).data("opc")=="nuevo")
			agregar_fila("tb-hsal-mie","f-hsal-mie","hsalmie","hsal_mie","hlle_mie","3");
		else
			agregar_fila2("tb-hsal-mie","f-hsal-mie","chkhsalmie","chk_hsal_mie","hsalmie","hsal_mie","hlle_mie","3");
	});

	jQuery("#agr_hsal_jue").click(function() {
		if ($("#hsal_jue").val()=="")
			swal("¡Error!", "Campo Hora de Salida vacío", "error");
		else if (hsal_repetida("hsal_jue","hsaljue"))
			swal("¡Error!", "Esta hora de salida ya se encuentra registrada", "error");
		else if ($(this).data("opc")=="nuevo")
			agregar_fila("tb-hsal-jue","f-hsal-jue","hsaljue","hsal_jue","hlle_jue","4");
		else
			agregar_fila2("tb-hsal-jue","f-hsal-jue","chkhsaljue","chk_hsal_jue","hsaljue","hsal_jue","hlle_jue","4");
	});

	jQuery("#agr_hsal_vie").click(function() {
		if ($("#hsal_vie").val()=="")
			swal("¡Error!", "Campo Hora de Salida vacío", "error");
		else if (hsal_repetida("hsal_vie","hsalvie"))
			swal("¡Error!", "Esta hora de salida ya se encuentra registrada", "error");
		else if ($(this).data("opc")=="nuevo")
			agregar_fila("tb-hsal-vie","f-hsal-vie","hsalvie","hsal_vie","hlle_vie","5");
		else
			agregar_fila2("tb-hsal-vie","f-hsal-vie","chkhsalvie","chk_hsal_vie","hsalvie","hsal_vie","hlle_vie","5");
	});

	jQuery("#agr_hsal_sab").click(function() {
		if ($("#hsal_sab").val()=="")
			swal("¡Error!", "Campo Hora de Salida vacío", "error");
		else if (hsal_repetida("hsal_sab","hsalsab"))
			swal("¡Error!", "Esta hora de salida ya se encuentra registrada", "error");
		else if ($(this).data("opc")=="nuevo")
			agregar_fila("tb-hsal-sab","f-hsal-sab","hsalsab","hsal_sab","hlle_sab","6");
		else
			agregar_fila2("tb-hsal-sab","f-hsal-sab","chkhsalsab","chk_hsal_sab","hsalsab","hsal_sab","hlle_sab","6");
	});

	jQuery("#agr_hsal_dom").click(function() {
		if ($("#hsal_dom").val()=="")
			swal("¡Error!", "Campo Hora de Salida vacío", "error");
		else if (hsal_repetida("hsal_dom","hsaldom"))
			swal("¡Error!", "Esta hora de salida ya se encuentra registrada", "error");
		else if ($(this).data("opc")=="nuevo")
			agregar_fila("tb-hsal-dom","f-hsal-dom","hsaldom","hsal_dom","hlle_dom","7");
		else
			agregar_fila2("tb-hsal-dom","f-hsal-dom","chkhsaldom","chk_hsal_dom","hsaldom","hsal_dom","hlle_dom","7");
	});

	function hsal_repetida(idinput,clinput){

		var resp=false;
        $("."+clinput).each(function (index) 
        {
            
            if ($(this).val()==$("#"+idinput).val()) {

                resp = true;
            }
        })
        return resp;
	}

	function hora_llegada_12(hsal){

		var time = hsal;
		var hours = Number(time.match(/^(\d+)/)[1]);
		var minutes = Number(time.match(/:(\d+)/)[1]);
		var AMPM = time.match(/\s(.*)$/)[1];
		if(AMPM == "PM" && hours<12) hours = hours+12;
		if(AMPM == "AM" && hours==12) hours = hours-12;

		if (parseInt($("#durmin").val())+minutes>59){

			hours++;
			minutes = minutes+parseInt($("#durmin").val())-60;

		}
		else
			minutes = minutes+parseInt($("#durmin").val());


		hours = hours + parseInt($("#durhr").val());

		hours = hours % 24;

		AMPM="AM";
		if (hours==0){
			hours=12;
		}
		else if (hours<=12){
			if (hours==12)
				AMPM="PM";

		}
		else {
			hours=hours-12;
			AMPM="PM";
		}

		return ((hours<10)?"0"+hours.toString():hours.toString())+":"+ ((minutes<10)?"0"+minutes.toString():minutes.toString()) +" "+AMPM;


	}
	
	function agregar_fila(idtabla,idfila,clinput,idinput,idinput2,dia){

        var cont = parseInt($("#cont"+dia).val());
        var max = parseInt($("#max"+dia).val());
        cont++;
        max++;
        $("#cont"+dia).val(cont.toString());
        $("#max"+dia).val(max.toString());
        
        if ($("#"+idtabla+" tr").length == 0)
            $("#"+idtabla).append('<tr id="'+idfila+max.toString()+'"><td><input readonly class="form-control '+clinput+'" name="'+idinput+max.toString()+'" id="'+idinput+max.toString()+'" value="'+$("#"+idinput).val()+'" /></td><td><input class="form-control" readonly name="'+idinput2+max.toString()+'" value="'+hora_llegada_12($("#"+idinput).val())+'" /></td><td><button title="Eliminar" data-id="'+idfila+max.toString()+'" data-dia="'+dia+'" type="button" class="elm btn-danger"><span class="glyphicon glyphicon-remove"></span></button></td></tr>');
        else 
            $("#"+idtabla+" tr:last").after('<tr id="'+idfila+max.toString()+'"><td><input readonly class="form-control '+clinput+'" name="'+idinput+max.toString()+'" id="'+idinput+max.toString()+'" value="'+$("#"+idinput).val()+'" /></td><td><input readonly class="form-control" name="'+idinput2+max.toString()+'" value="'+hora_llegada_12($("#"+idinput).val())+'" /></td><td><button title="Eliminar" data-id="'+idfila+max.toString()+'" data-dia="'+dia+'" type="button" class="elm btn-danger"><span class="glyphicon glyphicon-remove"></span></button></td></tr>');
        
    }

    function agregar_fila2(idtabla,idfila,clcheck,idcheck,clinput,idinput,idinput2,dia){

        var cont = parseInt($("#cont"+dia).val());
        var max = parseInt($("#max"+dia).val());
        cont++;
        max++;
        $("#cont"+dia).val(cont.toString());
        $("#max"+dia).val(max.toString());


        
        if ($("#"+idtabla+" tr").length == 0)
            $("#"+idtabla).append('<tr><td><div class="checkbox"><label><input class="'+clcheck+'" type="checkbox" name="'+idcheck+max.toString()+'" id="'+idcheck+max.toString()+'" checked /></label></div></td><td><input style="cursor:pointer;" data-llegada="'+idinput2+max.toString()+'" readonly class="hra2 '+clinput+' form-control hasTimepicker" name="'+idinput+max.toString()+'" id="'+idinput+max.toString()+'" value="'+$("#"+idinput).val()+'" /></td><td><input readonly class="form-control" name="'+idinput2+max.toString()+'" id="'+idinput2+max.toString()+'" value="'+hora_llegada_12($("#"+idinput).val())+'" /></td></tr>');
        else 
            $("#"+idtabla+" tr:last").after('<tr><td><div class="checkbox"><label><input class="'+clcheck+'" type="checkbox" name="'+idcheck+max.toString()+'" id="'+idcheck+max.toString()+'" checked /></label></div></td><td><input style="cursor:pointer;" data-llegada="'+idinput2+max.toString()+'" readonly class="hra2 '+clinput+' form-control hasTimepicker" name="'+idinput+max.toString()+'" id="'+idinput+max.toString()+'" value="'+$("#"+idinput).val()+'" /></td><td><input readonly class="form-control" name="'+idinput2+max.toString()+'" id="'+idinput2+max.toString()+'" value="'+hora_llegada_12($("#"+idinput).val())+'" /></td></tr>');


        
    }  

    $(document).on('click','.elm',function (e){
        
        
        if ($("#evt").val()=="NO"){

            var cont = parseInt($("#cont"+$(this).data("dia")).val());
            var max = parseInt($("#max"+$(this).data("dia")).val());


            if (cont==1)
                max=0;
            
            cont--;
            $("#cont"+$(this).data("dia")).val(cont.toString());
            $("#max"+$(this).data("dia")).val(max.toString());

            var id=$(this).data("id");
            $("#"+id).remove();
            $("#evt").val("SI");
                
        }
        else {
            
            $("#evt").val("NO");
        } 

    });

	jQuery("#agr_hor").click(function() {

		if ( $("#chact_lun").is(":checked") && $("#max1").val()=="0")
			swal("¡Error!", "Día Lunes: Si está activo, debe ingresar al menos una hora de salida", "error");
		else if ( $("#chact_mar").is(":checked") && $("#max2").val()=="0")
			swal("¡Error!", "Día Martes: Si está activo, debe ingresar al menos una hora de salida", "error");
		else if ( $("#chact_mie").is(":checked") && $("#max3").val()=="0")
			swal("¡Error!", "Día Miércoles: Si está activo, debe ingresar al menos una hora de salida", "error");
		else if ( $("#chact_jue").is(":checked") && $("#max4").val()=="0")
			swal("¡Error!", "Día Jueves: Si está activo, debe ingresar al menos una hora de salida", "error");
		else if ( $("#chact_vie").is(":checked") && $("#max5").val()=="0")
			swal("¡Error!", "Día Viernes: Si está activo, debe ingresar al menos una hora de salida", "error");
		else if ( $("#chact_sab").is(":checked") && $("#max6").val()=="0")
			swal("¡Error!", "Día Sábado: Si está activo, debe ingresar al menos una hora de salida", "error");
		else if ( $("#chact_dom").is(":checked") && $("#max7").val()=="0")
			swal("¡Error!", "Día Domingo: Si está activo, debe ingresar al menos una hora de salida", "error");
		else if ( $("#max1").val()=="0" && $("#max2").val()=="0" && $("#max3").val()=="0" && $("#max4").val()=="0" && $("#max5").val()=="0" && $("#max6").val()=="0" && $("#max7").val()=="0")
			swal("¡Error!", "Debe estar tildado al menos un día de la semana", "error");
		else {


			$.post("rutas_codigo_nuevohorario.php",$("#frmhor").serialize(),function(res){

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
                                        
                                        $("#capa").load('rutas_interfaz_listado.php');
                                });
                                
                }
                else {

                	swal("¡Error!", "No se pudo guardar el horario", "error");
                }

			});

		}
	});

	jQuery("#act_hor").click(function() {


			$.post("rutas_codigo_actualizarhorario.php",$("#frmhor").serialize(),function(res){

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
                                        
                                        $("#capa").load('rutas_interfaz_listado.php');
                                });
                                
                }
                else {

                	swal("¡Error!", "No se pudo guardar el horario", "error");
                }

			});

	});

	

	jQuery("#agredi").click(function() {
		if ($("#idori").val()=="-1")
			swal("¡Error!", "Debe seleccionar una cuidad origen", "error");
		else if ($("#iddes").val()=="-1")
			swal("¡Error!", "Debe seleccionar una cuidad destino", "error");
		else if ($("#idori").val()==$("#iddes").val())
			swal("¡Error!", "Las cuidades de origen y destino deben ser distintas", "error");
		else if ($("#hr").val()=="0" && $("#min").val()=="0")
			swal("¡Error!", "Duración incorrecta", "error");
		else if ($("#precio").val()=="")
			swal("¡Error!", "Campo precio vacío", "error");
		else if (parseInt($("#precio").val())==0)
			swal("¡Error!", "El precio debe ser mayor que 0", "error");
		else if ($("#precio").val().substr(0,1)==".")
			swal("¡Error!", "Precio incorrecto", "error");
		else {

			$.post("rutas_codigo_agredi.php",$("#frmrut").serialize(),function(res){

				if (res==-1)
					swal("¡Error!", "Esta ruta se encuentra registrada en la base de datos", "error");
				else if (res==1) {
                             $("#ModalRut").modal('hide');       
                                      
                            swal({   
                            title: "Finalizado",   
                            text: "Datos guardados satisfactoriamente",   
                            type: "success",   
                            showCancelButton: false,   
                            confirmButtonColor: "#BBD7ED",   
                            confirmButtonText: "Aceptar",   
                            closeOnConfirm: true }, 

                            function(){
                              $("#capa").load('rutas_interfaz_listado.php');
                             });
                                      
                }else
                	swal("¡Error!", "Error al guardar la ruta", "error");



			});
		}


	});


});