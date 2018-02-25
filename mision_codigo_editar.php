<?

session_start();
require("conectar.php");
$descr=$_POST["descr"];
$qr=mysql_query("UPDATE mision SET descripcion='$descr' ") or die(mysql_error());
echo 1;

?>