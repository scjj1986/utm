<?

session_start();
require("conectar.php");
date_default_timezone_set("America/Caracas");

$idr=$_POST["idr"];
$fres=$_POST["fres"];
$ced=strtoupper($_POST["ced"]);


$qr=mysql_query("SELECT rrh.id,rrh.tipo_pasajero,rrh.precio,rrh.fecha_reserva,rh.hora_salida,rrh.puesto,cli.cedula,cli.nombre,rrh.estatus FROM reserva_ruta_horario rrh INNER JOIN ruta_horario rh ON rrh.id_ruta_horario=rh.id INNER JOIN ruta r ON rh.id_ruta=r.id INNER JOIN adulto cli ON rrh.id_cliente=cli.id WHERE r.id=$idr AND rrh.fecha_reserva='$fres' AND rrh.id_infante=-1 AND cli.cedula='$ced' ");

$lista= array();

while($rw=mysql_fetch_array($qr)){
	$lista[] = array('pre'=> number_format($rw["precio"], 2, ',', '.'),'tpas'=> $rw['tipo_pasajero'],'id'=> $rw['id'],'fres'=> date("d-m-Y", strtotime($rw["fecha_reserva"])), 'hsal'=> $rw["hora_salida"], 'puesto'=> $rw["puesto"], 'ced'=> $rw["cedula"], 'nom'=> $rw["nombre"], 'est'=> $rw["estatus"], 'nominf'=> 'N/A');
}

$qr=mysql_query("SELECT rrh.id,rrh.tipo_pasajero,rrh.precio,rrh.fecha_reserva,rh.hora_salida,rrh.puesto,cli.cedula,cli.nombre,rrh.estatus,inf.nombre as nominf FROM reserva_ruta_horario rrh INNER JOIN ruta_horario rh ON rrh.id_ruta_horario=rh.id INNER JOIN ruta r ON rh.id_ruta=r.id INNER JOIN adulto cli ON rrh.id_cliente=cli.id INNER JOIN infante inf ON rrh.id_infante=inf.id  WHERE r.id=$idr AND rrh.fecha_reserva='$fres' AND rrh.id_infante<>-1 AND cli.cedula='$ced' ");



while($rw=mysql_fetch_array($qr)){
	$lista[] = array('pre'=> number_format($rw["precio"], 2, ',', '.'),'tpas'=> $rw['tipo_pasajero'],'id'=> $rw['id'],'fres'=> date("d-m-Y", strtotime($rw["fecha_reserva"])), 'hsal'=> $rw["hora_salida"], 'puesto'=> $rw["puesto"], 'ced'=> $rw["cedula"], 'nom'=> $rw["nombre"], 'est'=> $rw["estatus"], 'nominf'=> $rw["nominf"]);
}

echo json_encode($lista);


?>