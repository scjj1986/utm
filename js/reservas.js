jQuery(document).ready(function(){

	jQuery("#buscar").click(function() {

		if ($("#fres").val()=="" || $("#cedula").val()=="")
			swal("¡Error!", "No pueden haber campos vacíos", "error");

		
		else {
			$(".fl").remove();
			$.ajax({
				    url: "reservas_codigo_buscarreservas.php", /* Llamamos a tu archivo */
				    type: "POST",
				    contentType: "application/x-www-form-urlencoded",
				    data: {idr:$("#idr").val(),fres:$("#fres").val(),ced:$("#cedula").val()},
				    dataType: "json",  /* Esto es lo que indica que la respuesta será un objeto JSon */
				    success: function(data){
				        
				        if(data != null && $.isArray(data)){
				            /* Recorremos tu respuesta con each */



				            $.each(data, function(index, value){



								if ($("#tabla tr").length == 0)
						            $("#"+idtabla).append('<tr class="fl"><td>'+ $("#idr option:selected").text()+'</td><td>'+$("#fres").val()+'</td><td>'+value.hsal+'</td><td>'+value.puesto+'</td><td>'+value.ced+'</td><td>'+value.nom+'</td><td>'+value.nominf+'</td><td>'+value.est+'</td></tr>');
						        else 
						            $("#tabla tr:last").after('<tr class="fl"><td>'+ $("#idr option:selected").text()+'</td><td>'+value.fres+'</td><td>'+value.hsal+'</td><td>'+value.puesto+'</td><td>'+value.ced+'</td><td>'+value.nom+'</td><td>'+value.nominf+'</td><td>'+value.est+'</td></tr>');
						        
				            });
				        }
				    }
				});

		}

	});

	jQuery("#volver").click(function() {
              $("#capa").load('reservas_interfaz_buscar.php');
     });

	function fact(){//Fecha actual en formato string
        
            var f = new Date();
            var mm;
            var dd;
            if(f.getMonth() +1<10){ mm="0"+(f.getMonth()+1);
                }else{mm=f.getMonth()+1}

            if(f.getDate()<10){ dd="0"+(f.getDate());
                }else{dd=f.getDate()}
            
            return f.getFullYear() + "-" + mm + "-" + dd;
        
        }

	jQuery("#guardar").click(function() {
		if ($("#fres").val()=="")
			swal("¡Error!", "Campo Fecha de Reserva vacío", "error");
		else if ($("#hsal").val()=="-1")
			swal("¡Error!", "Seleccione Hora Salida", "error");
		else if ($("#puesto").val()=="-1")
			swal("¡Error!", "Seleccione Puesto", "error");
         else if ($("#estatus").val()=="CONFIRMADA" && $("#fres").val()>fact())
			swal("¡Error!", "No se pueden confirmar reservaciones con fecha mayor a la actual", "error");
		 else {
		 	$.post("reservas_codigo_editareserva.php",$("#frmres").serialize(),function(res){

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
                                        
                                        $("#capa").load('reservas_interfaz_buscar.php');
                                });
                                
                }
                else {

                	swal("¡Error!", "No se pudo guardar la reserva", "error");
                }

			});
		 }

	});

	function cargar_tabla(){

		$(".fl").remove();
			var disabled="";
			var colorboton="";
			$.ajax({
				    url: "reservas_codigo_buscarreservas.php", /* Llamamos a tu archivo */
				    type: "POST",
				    contentType: "application/x-www-form-urlencoded",
				    data: {idr:$("#idr").val(),fres:$("#fres").val(),ced:$("#cedula").val()},
				    dataType: "json",  /* Esto es lo que indica que la respuesta será un objeto JSon */
				    success: function(data){
				        
				        if(data != null && $.isArray(data)){
				            /* Recorremos tu respuesta con each */



				            $.each(data, function(index, value){

				            	disabled = ( value.est!="RESERVADA" ? "disabled": "" );
				            	colorboton = ( value.est!="RESERVADA" ? "default": "success" );

								if ($("#tabla tr").length == 0)
						            $("#"+idtabla).append('<tr class="fl"><td>'+value.hsal+'</td><td>'+value.puesto+'</td><td>'+value.ced+'</td><td>'+value.nom+'</td><td>'+value.nominf+'</td><td>'+value.tpas+'</td><td>'+value.pre+'</td><td>'+value.est+'</td><td><button '+disabled+' title="Procesar" data-id="'+value.id+'" data-rut="'+ $("#idr option:selected").text()+'" data-ced="'+ value.ced +'" data-nom="'+ value.nom +'" data-nominf="'+ value.nominf +'" data-hsal="'+ value.hsal +'" data-pst="'+ value.puesto +'" type="button" class="pr btn-'+colorboton+'"><span class="glyphicon glyphicon-ok"></span></button></td></tr>');
						        else 
						            $("#tabla tr:last").after('<tr class="fl"><td>'+value.hsal+'</td><td>'+value.puesto+'</td><td>'+value.ced+'</td><td>'+value.nom+'</td><td>'+value.nominf+'</td><td>'+value.tpas+'</td><td>'+value.pre+'</td><td>'+value.est+'</td><td><button '+disabled+' title="Procesar" data-id="'+value.id+'" data-rut="'+ $("#idr option:selected").text()+'" data-ced="'+ value.ced +'" data-nom="'+ value.nom +'" data-nominf="'+ value.nominf +'" data-hsal="'+ value.hsal +'" data-pst="'+ value.puesto +'" type="button" class="pr btn-'+colorboton+'"><span class="glyphicon glyphicon-ok"></span></button></td></tr>');
						        
				            });
				        }
				    }
				});


	}

	jQuery("#buscar2").click(function() {

		if ($("#fres").val()=="" || $("#cedula").val()=="")
			swal("¡Error!", "No pueden haber campos vacíos", "error");
		else {
			cargar_tabla();

		}

	});

	jQuery("#buscar3").click(function() {

		if ($("#fres").val()=="" || $("#cedula").val()=="")
			swal("¡Error!", "No pueden haber campos vacíos", "error");

		
		else {
			$(".fl").remove();
			$.ajax({
				    url: "reservas_codigo_buscarreservas.php", /* Llamamos a tu archivo */
				    type: "POST",
				    contentType: "application/x-www-form-urlencoded",
				    data: {idr:$("#idr").val(),fres:$("#fres").val(),ced:$("#cedula").val()},
				    dataType: "json",  /* Esto es lo que indica que la respuesta será un objeto JSon */
				    success: function(data){
				        
				        if(data != null && $.isArray(data)){
				            /* Recorremos tu respuesta con each */



				            $.each(data, function(index, value){



								if ($("#tabla tr").length == 0)
						            $("#"+idtabla).append('<tr class="fl"><td>'+value.hsal+'</td><td>'+value.puesto+'</td><td>'+value.ced+'</td><td>'+value.nom+'</td><td>'+value.nominf+'</td><td>'+value.tpas+'</td><td>'+value.pre+'</td><td>'+value.est+'</td><td><button title="Editar" data-idrrh="'+value.id+'" data-idr="'+ $("#idr").val()+'" type="button" class="editar btn-warning"><span class="glyphicon glyphicon-pencil"></span></button></td></tr>');
						        else 
						            $("#tabla tr:last").after('<tr class="fl"><td>'+value.hsal+'</td><td>'+value.puesto+'</td><td>'+value.ced+'</td><td>'+value.nom+'</td><td>'+value.nominf+'</td><td>'+value.tpas+'</td><td>'+value.pre+'</td><td>'+value.est+'</td><td><button title="Editar" data-idrrh="'+value.id+'" data-idr="'+ $("#idr").val()+'" type="button" class="editar btn-warning"><span class="glyphicon glyphicon-pencil"></span></button></td></tr>');
						        
				            });
				        }
				    }
				});

		}

	});

	$(document).on('click','.pr',function (e){


		$("#mod-ced").val( $(this).data("ced"));

		var nombre = ( $(this).data("nominf")=="N/A" ? $(this).data("nom") :$(this).data("nominf") );
		$("#mod-nom").val(nombre);
		$("#mod-rut").val( $(this).data("rut"));
		$("#mod-hsal").val( $(this).data("hsal"));
		$("#mod-pst").val( $(this).data("pst"));
		$("#id").val( $(this).data("id"));

		$("#ModalPro").modal('show');
	});

	function dia_semana(fecha){ 
    fecha=fecha.split('-');
    if(fecha.length!=3){
            return null;
    }
    //Vector para calcular día de la semana de un año regular.
    var regular =[0,3,3,6,1,4,6,2,5,0,3,5]; 
    //Vector para calcular día de la semana de un año bisiesto.
    var bisiesto=[0,3,4,0,2,5,0,3,6,1,4,6]; 
    //Vector para hacer la traducción de resultado en día de la semana.
    var semana=['DOMINGO', 'LUNES', 'MARTES', 'MIERCOLES', 'JUEVES', 'VIERNES', 'SABADO'];
    //Día especificado en la fecha recibida por parametro.
    var dia=fecha[2];
    //Módulo acumulado del mes especificado en la fecha recibida por parametro.
    var mes=fecha[1]-1;
    //Año especificado por la fecha recibida por parametros.
    var anno=fecha[0];
    //Comparación para saber si el año recibido es bisiesto.
    if((anno % 4 == 0) && !(anno % 100 == 0 && anno % 400 != 0))
        mes=bisiesto[mes];
    else
        mes=regular[mes];
    //Se retorna el resultado del calculo del día de la semana.
    return semana[Math.ceil(Math.ceil(Math.ceil((anno-1)%7)+Math.ceil((Math.floor((anno-1)/4)-Math.floor((3*(Math.floor((anno-1)/100)+1))/4))%7)+mes+dia%7)%7)];
}



	jQuery("#fres").change(function() {

		$("#dia").val(dia_semana($(this).val()));
		resetear_select("hsal");
		resetear_select("puesto");
		cargar_select_hsal();


	});

	jQuery("#hsal").change(function() {
		resetear_select("puesto");

		if ($(this).val()!="-1"){

			$.ajax({
				    url: "rutas2_codigo_listarpuestos.php", /* Llamamos a tu archivo */
				    type: "POST",
				    contentType: "application/x-www-form-urlencoded",
				    data: {idrh:$(this).val(),fres:$("#fres").val()},
				    dataType: "json",  /* Esto es lo que indica que la respuesta será un objeto JSon */
				    success: function(data){
				        
				        if(data != null && $.isArray(data)){
				            /* Recorremos tu respuesta con each */



				            $.each(data, function(index, value){

								$("#puesto").append('<option value="'+value.puesto+'">'+value.puesto+'</option>');

				            });
				        }
				    }
				});

		}


	});

	function resetear_select(id){
    	
    	$("#"+id).empty();
        $("#"+id).append('<option value="-1">Seleccione...</option>');
    }

    function cargar_select_hsal(){

    	$.ajax({
				    url: "rutas2_codigo_listarhsal.php", /* Llamamos a tu archivo */
				    type: "POST",
				    contentType: "application/x-www-form-urlencoded",
				    data: {idr:$("#idr").val(),dia:$("#dia").val(),fres:$("#fres").val()},
				    dataType: "json",  /* Esto es lo que indica que la respuesta será un objeto JSon */
				    success: function(data){
				        
				        if(data != null && $.isArray(data)){
				            /* Recorremos tu respuesta con each */



				            $.each(data, function(index, value){

								$("#hsal").append('<option value="'+value.id+'">'+value.hsal+'</option>');

				            });
				        }
				    }
				});
    }

	$(document).on('click','.editar',function (e){

		if ($("#evt").val()=="NO"){
			$("#capa").load('reservas_interfaz_editar.php?idrrh='+$(this).data("idrrh")+'&idr='+$(this).data("idr"));
			$("#evt").val("SI");
		}
		else
			$("#evt").val("NO");

		

	});

	jQuery("#proc-res").click(function() {

		$.post("reservas_codigo_procesar.php",$("#frmpro").serialize(),function(res){

				if (res==1) {
                                
                                $("#ModalPro").modal('hide');
                                swal({   
                                    title: "Finalizado",   
                                    text: "Datos guardados satisfactoriamente",   
                                    type: "success",   
                                    showCancelButton: false,   
                                    confirmButtonColor: "#BBD7ED",   
                                    confirmButtonText: "Aceptar",   
                                    closeOnConfirm: true }, 

                                    function(){
                                        
                                        cargar_tabla();
                                });
                                
                }
                else {

                	swal("¡Error!", "No se pudo procesar la reserva", "error");
                }

			});

	});



});