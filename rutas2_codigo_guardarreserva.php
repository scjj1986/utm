<?
session_start();
require("conectar.php");

$hsal=$_POST["hsal"];

$precio =$_POST["precio_final"];
$fcre = $_POST["fcre"];
$fres = $_POST["fres"];
$dia = $_POST["dia"];
$docide = $_POST["docide"];
$tpas = $_POST["tpas"];
$cedula = strtoupper($_POST["cedula"]);
$nombre = strtoupper($_POST["nombre"]);

$nombre2 = strtoupper($_POST["nombre2"]);
$cedularep = strtoupper($_POST["cedularep"]);
$nombrerep = strtoupper($_POST["nombrerep"]);

$puesto = $_POST["puesto"];


function retornar_idcli($cedula,$nombre){
	$qr2=mysql_query("SELECT * FROM adulto WHERE cedula='$cedula'");
	if (mysql_num_rows($qr2)==0)
		$qr3=mysql_query("INSERT INTO adulto (cedula,nombre)  VALUES ('$cedula','$nombre')");
	else
		$qr3=mysql_query("UPDATE adulto SET nombre='$nombre' WHERE cedula='$cedula'");
	$qr2=mysql_query("SELECT * FROM adulto WHERE cedula='$cedula'");
	$cli=mysql_fetch_array($qr2);
	return $cli["id"];

}

function retornar_idinf($nombre2,$idcli){
	$qr2=mysql_query("INSERT INTO infante (id_adulto,nombre)  VALUES ($idcli,'$nombre2')");
	$qr2=mysql_query("SELECT * FROM infante ORDER BY id DESC LIMIT 1");
	$inf=mysql_fetch_array($qr2);
	return $inf["id"];

}

$qr=mysql_query("SELECT ad.id FROM adulto ad INNER JOIN reserva_ruta_horario rrh ON ad.id=rrh.id_cliente where rrh.id_infante=-1 AND rrh.id_ruta_horario=$hsal  AND rrh.fecha_reserva='$fres' AND ad.cedula='$cedula'");

if (mysql_num_rows($qr)>0)
	echo -1;
else {

	if ($docide=="SI"){//Adulto con documento de identidad
		$idinf=-1;
		$idcli = retornar_idcli($cedula,$nombre);
	}
	else {
		$idcli = retornar_idcli($cedularep,$nombrerep);
		$idinf =retornar_idinf($nombre2,$idcli);

	}


	$qr2=mysql_query("INSERT INTO reserva_ruta_horario (id_ruta_horario,id_cliente,id_infante,fecha_creacion,fecha_reserva,puesto,estatus,tipo_pasajero,precio)  VALUES ($hsal,$idcli,$idinf,'$fcre','$fres','$puesto','RESERVADA','$tpas','$precio')");
	echo 1;
}


?>