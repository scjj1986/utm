<?
$exitoso = true;
$i=0;
require("conectar.php");
$qr=mysql_query("TRUNCATE TABLE organigrama") or die(mysql_error());
foreach ($_FILES as $key) //Iteramos el arreglo de archivos
{
    if($key['error'] == UPLOAD_ERR_OK )//Si el archivo se paso correctamente Ccontinuamos 
        {
            //$NombreOriginal = $key['name'];//Obtenemos el nombre original del archivo
            $i++;
            $NombreOriginal = $cod."_00".$i.".jpg";
            $temporal = $key['tmp_name']; //Obtenemos la ruta Original del archivo
            $Destino = $ruta.$NombreOriginal;   //Creamos una ruta de destino con la variable ruta y el nombre original del archivo 

            $imagen=addslashes(file_get_contents($key['tmp_name']));
            


            //move_uploaded_file($temporal, $Destino); //Movemos el archivo temporal a la ruta especificada       
        }
 
    if ($key['error']=='') //Si no existio ningun error, retornamos un mensaje por cada archivo subido
        {
            
            $consulta2=mysql_query("INSERT INTO organigrama (imagen) VALUES ('$imagen')") or die(mysql_error());

            //$mensage .= '-> Archivo <b>'.$NombreOriginal.'</b> Subido correctamente. <br>';
        }
    if ($key['error']!='')//Si existio algún error retornamos un el error por cada archivo.
        {
            //$mensage .= '-> No se pudo subir el archivo <b>'.$NombreOriginal.'</b> debido al siguiente Error: n'.$key['error'];
            $exitoso = false; 
        }
    
}

if (!$exitoso)
    echo -2;
else
    echo 1;


?>