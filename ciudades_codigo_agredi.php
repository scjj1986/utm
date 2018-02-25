<?
session_start();
require("conectar.php");

$id=$_POST['id'];
$nom=strtoupper($_POST['nombre']);

if ($id=="")
	$consulta=mysql_query("SELECT * FROM ciudad WHERE nombre='$nom'") or die(mysql_error());
else 
	$consulta=mysql_query("SELECT * FROM ciudad WHERE nombre='$nom' AND id<>$id") or die(mysql_error());

if (mysql_num_rows($consulta)>0){
	echo -1;
	exit;
}

if ($id=="")
	$consulta3=mysql_query("INSERT INTO ciudad (nombre) VALUES ('$nom')") or die(mysql_error());
else 
	$consulta3=mysql_query("UPDATE ciudad SET nombre='$nom' WHERE id=$id") or die(mysql_error());


echo 1;	
?>