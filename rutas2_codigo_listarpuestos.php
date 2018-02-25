<?

session_start();
require("conectar.php");

//var_dump($_POST);
//exit();

$idrh=$_POST["idrh"];
$fres = $_POST["fres"];
$lista= array();

for ($i=1; $i<=32; $i++){

	$puesto=($i<10?"0".(string)$i:(string)$i);
	//echo "SELECT * FROM reserva_ruta_horario where id_ruta_horario=$idrh AND fres='$fres' AND puesto='$puesto' AND (estatus='RESERVADA' OR estatus='CONFIRMADA')";

	$consulta=mysql_query("SELECT * FROM reserva_ruta_horario where id_ruta_horario=$idrh AND fecha_reserva='$fres' AND puesto='$puesto' AND (estatus='RESERVADA' OR estatus='CONFIRMADA')");

	if (mysql_num_rows($consulta)==0)
		$lista[] = array('puesto'=> $puesto);

	

}

echo json_encode($lista);


?>