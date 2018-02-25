<?

session_start();
require("conectar.php");


function reservados($idrh,$fres){

	$qr=mysql_query("SELECT * FROM reserva_ruta_horario where id_ruta_horario=$idrh AND fecha_reserva='$fres' AND (estatus='RESERVADA' OR estatus='CONFIRMADA')");

	return mysql_num_rows($qr);

}

$idr=$_POST["idr"];
$dia=$_POST["dia"];
$fres = $_POST["fres"];


$consulta=mysql_query("SELECT * FROM ruta_horario where id_ruta=$idr AND dia='$dia' AND activo='SI' ORDER BY hora_salida24");

$lista= array();

while($rw=mysql_fetch_array($consulta)){

	$hs=$rw["hora_salida"];
	$idrh=$rw["id"];
	if (reservados($idrh,$fres)<32)
		$lista[] = array('hsal'=> $hs, 'id'=> $idrh);


}
echo json_encode($lista);


?>