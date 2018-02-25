jQuery(document).ready(function(){

	//jQuery(".ver-hor").click(function() {
	$(document).on('click','.ver-hor',function (e){
		
		$("#capa").load('rutas2_interfaz_verhorario.php?id='+$(this).data("id"));
	});

	//jQuery(".res-hsal").click(function() {
	$(document).on('click','.res-hsal',function (e){
		
		$("#capa").load('rutas2_interfaz_reservar.php?id='+$(this).data("id"));
	});

	jQuery("#volver").click(function() {

              $("#capa").load('rutas2_interfaz_listado.php');
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

	function numberFormat(numero){
        // Variable que contendra el resultado final
        var resultado = "";

        console.log(numero);

        if(numero.indexOf('.')>=0)
        	numero=numero.replace(".",",");
 
        // Si el numero empieza por el valor "-" (numero negativo)
        if(numero[0]=="-")
        {
            // Cogemos el numero eliminando los posibles puntos que tenga, y sin
            // el signo negativo
            nuevoNumero=numero.replace(/\./g,'').substring(1);
        }else{
            // Cogemos el numero eliminando los posibles puntos que tenga
            nuevoNumero=numero.replace(/\./g,'');
        }
 
        // Si tiene decimales, se los quitamos al numero
        if(numero.indexOf(",")>=0)
            nuevoNumero=nuevoNumero.substring(0,nuevoNumero.indexOf(","));
 
        // Ponemos un punto cada 3 caracteres
        for (var j, i = nuevoNumero.length - 1, j = 0; i >= 0; i--, j++)
            resultado = nuevoNumero.charAt(i) + ((j > 0) && (j % 3 == 0)? ".": "") + resultado;
 
        // Si tiene decimales, se lo añadimos al numero una vez forateado con 
        // los separadores de miles
        if(numero.indexOf(",")>=0)
            resultado+=numero.substring(numero.indexOf(","));
 
        if(numero[0]=="-")
        {
            // Devolvemos el valor añadiendo al inicio el signo negativo
            return "-"+resultado;
        }else{
            return resultado;
        }
    }

	function calcular_precio_total(tipopas){
		
		var monto = parseFloat($("#precio_standar").val());
		if (tipopas=="ESTUDIANTE")
			monto = parseFloat($("#precio_standar").val()) * 0.75;
		else if (tipopas=="TERCERA EDAD")
			monto = parseFloat($("#precio_standar").val()) * 0.5;

		$("#precio_final").val(monto.toString());
		$("#precio_show").val( numberFormat($("#precio_final").val()));


	}

	jQuery("#tpas").change(function() {

		calcular_precio_total($(this).val());

	});

	jQuery("#docide").change(function() {

		if($(this).val()=="SI"){
			$("#concedula").show();
			$("#sincedula").hide();
			console.log($("#tdpas").val());
			calcular_precio_total($("#tpas").val());
		}
		else {
			$("#sincedula").show();
			$("#concedula").hide();
			calcular_precio_total("NORMAL");
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

	jQuery(".ced").blur(function() {//Pérdida de foco código intermediario (búsqueda en base de datos)

        if ($(this).val()!=""){

        		var idnombre=($(this).attr("id")=="cedula"?"nombre":"nombrerep");

                //------  Consulta a la base de datos para buscar beneficiario
                $.ajax({
                    url: "rutas2_codigo_buscarcliente.php",
                    data: {ced:$(this).val()}, 
                    type: "POST",
                    contentType: "application/x-www-form-urlencoded",
                    dataType: "json",  
                    success: function(data){
                        if(data != null && $.isArray(data)){
                            $.each(data, function(index, value){

                                $("#"+idnombre).val(value.nom);

                            });
                        }
                    }
                });
            }
    });

	jQuery("#guardar").click(function() {
		if ($("#fres").val()=="")
			swal("¡Error!", "Campo Fecha de Reserva vacío", "error");
		else if ($("#docide").val()=="SI" && $("#cedula").val()=="")
			swal("¡Error!", "Campo Cédula vacío", "error");
		else if ($("#docide").val()=="SI" && $("#nombre").val()=="")
			swal("¡Error!", "Campo Nombre vacío", "error");
		else if ($("#docide").val()=="NO" && $("#nombre2").val()=="")
			swal("¡Error!", "Campo Nombre vacío", "error");
		else if ($("#docide").val()=="NO" && $("#cedularep").val()=="")
			swal("¡Error!", "Campo Cédula Representante vacío", "error");
		else if ($("#docide").val()=="NO" && $("#nombrerep").val()=="")
			swal("¡Error!", "Campo Nombre Representante vacío", "error");
		else if ($("#hsal").val()=="-1")
			swal("¡Error!", "Seleccione Hora Salida", "error");
		else if ($("#puesto").val()=="-1")
			swal("¡Error!", "Seleccione Puesto", "error");
		else {

			$.post("rutas2_codigo_guardarreserva.php",$("#frmres").serialize(),function(res){

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
                                        
                                        $("#capa").load('rutas2_interfaz_listado.php');
                                });
                                
                }
                else {

                	swal("¡Error!", "No se pudo guardar la reserva", "error");
                }

			});
		}

	});


});