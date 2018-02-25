<?
session_start();
require("conectar.php");
date_default_timezone_set("America/Caracas");

//var_dump($_POST);

$idr=$_POST["idr"];

if (isset($_POST["chact_lun"])){

	for ($i=1;$i<=(int)$_POST["max1"]; $i++){

		if (isset($_POST["hsal_lun".(string)$i])){

			$hsal=$_POST["hsal_lun".(string)$i];
			$hlle=$_POST["hlle_lun".(string)$i];
			$hsal2 = strtotime($hsal);
			$hsal24 = date("H:i", $hsal2);

			$consulta=mysql_query("INSERT INTO ruta_horario (id_ruta,dia,hora_salida,hora_llegada,hora_salida24,activo)  VALUES ($idr,'LUNES','$hsal','$hlle','$hsal24','SI')  ") or die(mysql_error());
		}

	}
}
if (isset($_POST["chact_mar"])){

	for ($i=1;$i<=(int)$_POST["max2"]; $i++){

		if (isset($_POST["hsal_mar".(string)$i])){

			$hsal=$_POST["hsal_mar".(string)$i];
			$hlle=$_POST["hlle_mar".(string)$i];
			$hsal2 = strtotime($hsal);
			$hsal24 = date("H:i", $hsal2);

			$consulta=mysql_query("INSERT INTO ruta_horario (id_ruta,dia,hora_salida,hora_llegada,hora_salida24,activo)  VALUES ($idr,'MARTES','$hsal','$hlle','$hsal24','SI')  ") or die(mysql_error());
		}

	}
}

if (isset($_POST["chact_mie"])){

	for ($i=1;$i<=(int)$_POST["max3"]; $i++){

		if (isset($_POST["hsal_mie".(string)$i])){

			$hsal=$_POST["hsal_mie".(string)$i];
			$hlle=$_POST["hlle_mie".(string)$i];
			$hsal2 = strtotime($hsal);
			$hsal24 = date("H:i", $hsal2);

			$consulta=mysql_query("INSERT INTO ruta_horario (id_ruta,dia,hora_salida,hora_llegada,hora_salida24,activo)  VALUES ($idr,'MIERCOLES','$hsal','$hlle','$hsal24','SI')  ") or die(mysql_error());
		}

	}
}

if (isset($_POST["chact_jue"])){

	for ($i=1;$i<=(int)$_POST["max4"]; $i++){

		if (isset($_POST["hsal_jue".(string)$i])){

			$hsal=$_POST["hsal_jue".(string)$i];
			$hlle=$_POST["hlle_jue".(string)$i];
			$hsal2 = strtotime($hsal);
			$hsal24 = date("H:i", $hsal2);

			$consulta=mysql_query("INSERT INTO ruta_horario (id_ruta,dia,hora_salida,hora_llegada,hora_salida24,activo)  VALUES ($idr,'JUEVES','$hsal','$hlle','$hsal24','SI')  ") or die(mysql_error());
		}

	}
}

if (isset($_POST["chact_vie"])){

	for ($i=1;$i<=(int)$_POST["max5"]; $i++){

		if (isset($_POST["hsal_vie".(string)$i])){

			$hsal=$_POST["hsal_vie".(string)$i];
			$hlle=$_POST["hlle_vie".(string)$i];
			$hsal2 = strtotime($hsal);
			$hsal24 = date("H:i", $hsal2);

			$consulta=mysql_query("INSERT INTO ruta_horario (id_ruta,dia,hora_salida,hora_llegada,hora_salida24,activo)  VALUES ($idr,'VIERNES','$hsal','$hlle','$hsal24','SI')  ") or die(mysql_error());
		}

	}
}

if (isset($_POST["chact_sab"])){

	for ($i=1;$i<=(int)$_POST["max6"]; $i++){

		if (isset($_POST["hsal_sab".(string)$i])){

			$hsal=$_POST["hsal_sab".(string)$i];
			$hlle=$_POST["hlle_sab".(string)$i];
			$hsal2 = strtotime($hsal);
			$hsal24 = date("H:i", $hsal2);

			$consulta=mysql_query("INSERT INTO ruta_horario (id_ruta,dia,hora_salida,hora_llegada,hora_salida24,activo)  VALUES ($idr,'SABADO','$hsal','$hlle','$hsal24','SI')  ") or die(mysql_error());
		}

	}
}

if (isset($_POST["chact_dom"])){

	for ($i=1;$i<=(int)$_POST["max7"]; $i++){

		if (isset($_POST["hsal_dom".(string)$i])){

			$hsal=$_POST["hsal_dom".(string)$i];
			$hlle=$_POST["hlle_dom".(string)$i];
			$hsal2 = strtotime($hsal);
			$hsal24 = date("H:i", $hsal2);

			$consulta=mysql_query("INSERT INTO ruta_horario (id_ruta,dia,hora_salida,hora_llegada,hora_salida24,activo)  VALUES ($idr,'DOMINGO','$hsal','$hlle','$hsal24','SI')  ") or die(mysql_error());
		}

	}
}


echo 1;

?>