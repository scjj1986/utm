<?
session_start();
require("conectar.php");
date_default_timezone_set("America/Caracas");

//var_dump($_POST);

function nreg($dia,$id,$hsal){

  $qr=mysql_query("SELECT * FROM ruta_horario where id_ruta=$id AND dia='$dia' AND hora_salida='$hsal'");
  return mysql_num_rows($qr);

}

$idr=$_POST["idr"];



	for ($i=1;$i<=(int)$_POST["max1"]; $i++){

		if (isset($_POST["hsal_lun".(string)$i])){

			$hsal=$_POST["hsal_lun".(string)$i];
			$hlle=$_POST["hlle_lun".(string)$i];
			$hsal2 = strtotime($hsal);
			$hsal24 = date("H:i", $hsal2);

			$act=(isset($_POST["chk_hsal_lun".(string)$i])?"SI":"NO");

			//if (nreg("LUNES",$idr,$hsal)>0)
			if(isset($_POST["rh_lun".(string)$i])){
				$idrh=$_POST["rh_lun".(string)$i];
				$consulta=mysql_query("UPDATE ruta_horario SET hora_salida='$hsal',hora_llegada='$hlle',hora_salida24='$hsal24',activo='$act'  WHERE id=$idrh") or die(mysql_error());
			}
			else{
				$consulta=mysql_query("INSERT INTO ruta_horario (id_ruta,dia,hora_salida,hora_llegada,hora_salida24,activo)  VALUES ($idr,'LUNES','$hsal','$hlle','$hsal24','$act')  ") or die(mysql_error());
			}
		}

	}

	for ($i=1;$i<=(int)$_POST["max2"]; $i++){

		if (isset($_POST["hsal_mar".(string)$i])){

			$hsal=$_POST["hsal_mar".(string)$i];
			$hlle=$_POST["hlle_mar".(string)$i];
			$hsal2 = strtotime($hsal);
			$hsal24 = date("H:i", $hsal2);

			$act=(isset($_POST["chk_hsal_mar".(string)$i])?"SI":"NO");

			if(isset($_POST["rh_mar".(string)$i])){
				$idrh=$_POST["rh_mar".(string)$i];
				$consulta=mysql_query("UPDATE ruta_horario SET hora_salida='$hsal',hora_llegada='$hlle',hora_salida24='$hsal24',activo='$act'  WHERE id=$idrh") or die(mysql_error());
			}else
				$consulta=mysql_query("INSERT INTO ruta_horario (id_ruta,dia,hora_salida,hora_llegada,hora_salida24,activo)  VALUES ($idr,'MARTES','$hsal','$hlle','$hsal24','$act')  ") or die(mysql_error());
		}

	}

	for ($i=1;$i<=(int)$_POST["max3"]; $i++){

		if (isset($_POST["hsal_mie".(string)$i])){

			$hsal=$_POST["hsal_mie".(string)$i];
			$hlle=$_POST["hlle_mie".(string)$i];
			$hsal2 = strtotime($hsal);
			$hsal24 = date("H:i", $hsal2);

			$act=(isset($_POST["chk_hsal_mie".(string)$i])?"SI":"NO");

			if(isset($_POST["rh_mie".(string)$i])){
				$idrh=$_POST["rh_mie".(string)$i];
				$consulta=mysql_query("UPDATE ruta_horario SET hora_salida='$hsal',hora_llegada='$hlle',hora_salida24='$hsal24',activo='$act'  WHERE id=$idrh") or die(mysql_error());
			}else
				$consulta=mysql_query("INSERT INTO ruta_horario (id_ruta,dia,hora_salida,hora_llegada,hora_salida24,activo)  VALUES ($idr,'MIERCOLES','$hsal','$hlle','$hsal24','$act')  ") or die(mysql_error());
		}

	}

	for ($i=1;$i<=(int)$_POST["max4"]; $i++){

		if (isset($_POST["hsal_jue".(string)$i])){

			$hsal=$_POST["hsal_jue".(string)$i];
			$hlle=$_POST["hlle_jue".(string)$i];
			$hsal2 = strtotime($hsal);
			$hsal24 = date("H:i", $hsal2);

			$act=(isset($_POST["chk_hsal_jue".(string)$i])?"SI":"NO");

			if(isset($_POST["rh_jue".(string)$i])){
				$idrh=$_POST["rh_jue".(string)$i];
				$consulta=mysql_query("UPDATE ruta_horario SET hora_salida='$hsal',hora_llegada='$hlle',hora_salida24='$hsal24',activo='$act'  WHERE id=$idrh") or die(mysql_error());
			}else
				$consulta=mysql_query("INSERT INTO ruta_horario (id_ruta,dia,hora_salida,hora_llegada,hora_salida24,activo)  VALUES ($idr,'JUEVES','$hsal','$hlle','$hsal24','$act')  ") or die(mysql_error());
		}

	}

	for ($i=1;$i<=(int)$_POST["max5"]; $i++){

		if (isset($_POST["hsal_vie".(string)$i])){

			$hsal=$_POST["hsal_vie".(string)$i];
			$hlle=$_POST["hlle_vie".(string)$i];
			$hsal2 = strtotime($hsal);
			$hsal24 = date("H:i", $hsal2);

			$act=(isset($_POST["chk_hsal_vie".(string)$i])?"SI":"NO");

			if(isset($_POST["rh_vie".(string)$i])){
				$idrh=$_POST["rh_vie".(string)$i];
				$consulta=mysql_query("UPDATE ruta_horario SET hora_salida='$hsal',hora_llegada='$hlle',hora_salida24='$hsal24',activo='$act'  WHERE id=$idrh") or die(mysql_error());
			}else
				$consulta=mysql_query("INSERT INTO ruta_horario (id_ruta,dia,hora_salida,hora_llegada,hora_salida24,activo)  VALUES ($idr,'VIERNES','$hsal','$hlle','$hsal24','$act')  ") or die(mysql_error());
		}

	}

	for ($i=1;$i<=(int)$_POST["max6"]; $i++){

		if (isset($_POST["hsal_sab".(string)$i])){

			$hsal=$_POST["hsal_sab".(string)$i];
			$hlle=$_POST["hlle_sab".(string)$i];
			$hsal2 = strtotime($hsal);
			$hsal24 = date("H:i", $hsal2);

			$act=(isset($_POST["chk_hsal_sab".(string)$i])?"SI":"NO");

			if(isset($_POST["rh_sab".(string)$i])){
				$idrh=$_POST["rh_sab".(string)$i];
				$consulta=mysql_query("UPDATE ruta_horario SET hora_salida='$hsal',hora_llegada='$hlle',hora_salida24='$hsal24',activo='$act'  WHERE id=$idrh") or die(mysql_error());
			}else
				$consulta=mysql_query("INSERT INTO ruta_horario (id_ruta,dia,hora_salida,hora_llegada,hora_salida24,activo)  VALUES ($idr,'SABADO','$hsal','$hlle','$hsal24','$act')  ") or die(mysql_error());
		}

	}

	for ($i=1;$i<=(int)$_POST["max7"]; $i++){

		if (isset($_POST["hsal_dom".(string)$i])){

			$hsal=$_POST["hsal_dom".(string)$i];
			$hlle=$_POST["hlle_dom".(string)$i];
			$hsal2 = strtotime($hsal);
			$hsal24 = date("H:i", $hsal2);

			$act=(isset($_POST["chk_hsal_dom".(string)$i])?"SI":"NO");

			if(isset($_POST["rh_dom".(string)$i])){
				$idrh=$_POST["rh_dom".(string)$i];
				$consulta=mysql_query("UPDATE ruta_horario SET hora_salida='$hsal',hora_llegada='$hlle',hora_salida24='$hsal24',activo='$act'  WHERE id=$idrh") or die(mysql_error());
			}else
				$consulta=mysql_query("INSERT INTO ruta_horario (id_ruta,dia,hora_salida,hora_llegada,hora_salida24,activo)  VALUES ($idr,'DOMINGO','$hsal','$hlle','$hsal24','$act')  ") or die(mysql_error());
		}

	}



echo 1;

?>