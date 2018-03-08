<?php
session_start();
require("conectar.php");
$login=strtoupper($_POST['lgn']);
$clave=$_POST['clv'];
$consulta=mysql_query("SELECT * FROM usuario WHERE  login='$login' and clave='$clave'") or die(mysql_error());

if(!$resultado=mysql_fetch_array($consulta))
	echo -1;
else{
	$qr=mysql_query("SELECT * FROM usuario WHERE login='$login'") or die(mysql_error());
	$rs=mysql_fetch_array($qr);
	if ($rs["activo"]=="NO")
		echo -2;
	else{
		$_SESSION['nombrecompleto']=$nombrecompleto=$rs['nombre']." ".$rs['apellido'];
		$_SESSION['perfil']=$perfil=$rs['perfil'];
		$_SESSION['idu']=$idus=$rs['id'];
		if($resultado['perfil']=="ADMINISTRADOR"){
			echo 1;
		}
	}
}
?>
