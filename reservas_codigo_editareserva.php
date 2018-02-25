<?
session_start();
require("conectar.php");
$idrrh = $_POST["idrrh"];
$hsal=$_POST["hsal"];
$fres = $_POST["fres"];
$puesto = $_POST["puesto"];
$estatus = $_POST["estatus"];
$qr2=mysql_query("UPDATE reserva_ruta_horario SET id_ruta_horario=$hsal,fecha_reserva='$fres',puesto='$puesto',estatus='$estatus' WHERE id=$idrrh");
echo 1;
?>