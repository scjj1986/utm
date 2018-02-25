<?

session_start();
require("conectar.php");

$max=$_POST["max"];

$qr=mysql_query("TRUNCATE TABLE vision") or die(mysql_error());

for ($i=1;$i<=$max;$i++){

	if (isset($_POST["dsc".(string)$i])){
		$descr=$_POST["dsc".(string)$i];
		$qr=mysql_query("INSERT INTO vision (descripcion) VALUES ('$descr')") or die(mysql_error());

	}
}





echo 1;

?>