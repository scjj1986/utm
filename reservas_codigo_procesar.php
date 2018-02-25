<?
session_start();
require("conectar.php");
$id=$_POST["id"];
$est=$_POST["mod-est"];
$qr2= mysql_query("UPDATE reserva_ruta_horario SET estatus='$est' WHERE id=$id");
echo 1;
?>