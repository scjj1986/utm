<?
session_start();
require("conectar.php");

$idu=$_POST['idu'];
$nom=strtoupper($_POST['nombre']);
$ape=strtoupper($_POST['apellido']);
$pss=$_POST['pss'];
$act=$_POST['act'];
$lg=strtoupper($_POST['login']);


if ($idu=="")
	$consulta=mysql_query("SELECT * FROM usuario WHERE login='$lg'") or die(mysql_error());
else
	$consulta=mysql_query("SELECT * FROM usuario WHERE login='$lg' and id<>$idu") or die(mysql_error());

if (mysql_num_rows($consulta)>0)
	echo -1;
else {

	if ($idu=="")
		$consulta=mysql_query("INSERT INTO usuario (nombre,apellido,perfil,login,clave,activo) VALUES ('$nom','$ape','ADMINISTRADOR','$lg','$pss','$act')") or die(mysql_error());
	else {

		$consulta=mysql_query("UPDATE usuario SET nombre='$nom',apellido='$ape',login='$lg',clave='$pss',activo='$act' WHERE id=$idu") or die(mysql_error());
		$qr=mysql_query("SELECT * FROM usuario WHERE id=$idu AND activo='NO'") or die(mysql_error());

		if(mysql_num_rows($qr)>0){
				echo -2;
				exit;
		}
	}
	echo 1;
}
?>