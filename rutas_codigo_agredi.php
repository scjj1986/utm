<?

session_start();
require("conectar.php");

$id=$_POST['id'];

$idori=$_POST['idori'];
$iddes=$_POST['iddes'];

$hr=$_POST['hr'];
$min=$_POST['min'];
$precio=$_POST['precio'];
$act=$_POST['act'];
$rl=$_POST['rl'];

if ($id=="")
	$consulta=mysql_query("SELECT * FROM ruta WHERE id_origen=$idori AND id_destino=$iddes") or die(mysql_error());
else 
	$consulta=mysql_query("SELECT * FROM ruta WHERE id_origen=$idori AND id_destino=$iddes AND id<>$id") or die(mysql_error());

if (mysql_num_rows($consulta)>0){
	echo -1;
	exit;
}

if ($id=="")
	$consulta3=mysql_query("INSERT INTO ruta (id_origen,id_destino,duracion_hrs,duracion_min,precio,activo,ruta_larga) VALUES ($idori,$iddes,$hr,$min,$precio,'$act','$rl')") or die(mysql_error());
else {
	
	$consulta3=mysql_query("UPDATE ruta SET id_origen=$idori,id_destino=$iddes,duracion_hrs=$hr,duracion_min=$min,precio=$precio,activo='$act',ruta_larga='$rl' WHERE id=$id") or die(mysql_error());


	$consulta=mysql_query("SELECT * FROM ruta_horario WHERE id_ruta=$id ") or die(mysql_error());
	if (mysql_num_rows($consulta)>0){

		while ($row=mysql_fetch_array($consulta)){

			$idrh=$row["id"];
			$hrll=$minll=0;
			$hrmin=explode(":",$row["hora_salida24"]);
			$hrll = $hr + (int)$hrmin[0];
			$minll = $min + (int)$hrmin[1];
			$hrll=($minll>59?$hrll+1:$hrll);
			$hrll = $hrll % 24;
			$minll = $minll % 60;
			$ampm=($hrll<12?"AM":"PM");
			if ($hrll==0) $shr="12";
			else if ($hrll<10) $shr="0".(string)$hrll;
			else if ($hrll<12) $shr=(string)$hrll;
			else {
				$hrll=($hrll>12?$hrll-12:12);
				$shr = ($hrll<10?"0".(string)$hrll:(string)$hrll);
			}
			$smin = ($minll<10?"0".(string)$minll:(string)$minll);
			$hlle=$shr.":".$smin." ".$ampm;

			if ($act=="NO")
				$qr=mysql_query("UPDATE ruta_horario SET hora_llegada='$hlle',activo='$act' WHERE id=$idrh ") or die(mysql_error());
			else
				$qr=mysql_query("UPDATE ruta_horario SET hora_llegada='$hlle' WHERE id=$idrh ") or die(mysql_error());
		}
	}

}

echo 1;


?>