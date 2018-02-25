jQuery(document).ready(function(){

	//Preparación del campo tipo archivo (file)
            $(":file").filestyle( {
              buttonName: "btn-primary",
               buttonText: "Buscar Archivo",
               uploadAsync: false,
                minFileCount: 1,
                maxFileCount: 5,
              showUpload: false, 
              showRemove: false,

             });

            jQuery("#actualizar").click(function() {
        editar();

      });

      function editar(){



              var archivos = document.getElementById("file").files;//Creamos un objeto con el elemento que contiene los archivos
              //Creamos una instancia del Objeto FormDara.
              var frmdat = new FormData();
              
              for(i=0; i<archivos.length; i++){
              frmdat.append('img'+i,archivos[i]); //Añadimos cada archivo a el arreglo con un indice direfente
              }

              /*Ejecutamos la función ajax de jQuery*/    
              $.ajax({
                url:'home_codigo_editar.php', //Url a donde la enviaremos
                type:'POST', //Metodo que usaremos
                contentType:false, //Debe estar en false para que pase el objeto sin procesar
                data:frmdat, //Le pasamos el objeto que creamos con los archivos
                processData:false, //Debe estar en false para que JQuery no procese los datos a enviar
                cache:false //Para que el formulario no guarde cache
              }).done(function(res){//Escuchamos la respuesta y capturamos el mensaje msg
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
                              
                              $("#capa").load('home.php');
                              });
                                      
                          }else if (res==-2) {
                          
                              swal("¡Error!", "No se pudo guardar la imagen", "error");
                          }
              });
            }





      jQuery("#file").change(function(){
           /* Limpiar vista previa */
           $("#vista-previa").html('');
           var archivos = document.getElementById('file').files;

           var navegador = window.URL || window.webkitURL;
           /* Recorrer los archivos */
           for(x=0; x<archivos.length; x++)
           {
               /* Validar tamaño y tipo de archivo */
               var size = archivos[x].size;
               var type = archivos[x].type;
               var name = archivos[x].name;
               if (size > 3024*3024)
               {
                   $("#vista-previa").append("<p style='color: red'>El archivo "+name+" supera el máximo permitido 3MB</p>");
               }
               else if(type != 'image/jpeg' && type != 'image/jpg' && type != 'image/png' && type != 'image/gif')
               {
                   $("#vista-previa").append("<p style='color: red'>El archivo "+name+" no es del tipo de imagen permitida.</p>");
               }
               else
               {
                 var objeto_url = navegador.createObjectURL(archivos[x]);
                 $("#vista-previa").append("<img src="+objeto_url+" width='1000' height='300'>&nbsp;");
               }
           }
       });
});