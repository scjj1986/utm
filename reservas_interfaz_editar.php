<? 
session_start();
require("conectar.php");
date_default_timezone_set("America/Caracas");

$idr=$_GET["idr"];
$idrrh=$_GET["idrrh"];
$cnslt=mysql_query("SELECT rt.id, rt.id_origen as idori, rt.id_destino iddes, rt.duracion_hrs as hr, rt.duracion_min as min,  ori.nombre as origen, des.nombre as destino FROM ruta rt INNER JOIN ciudad ori ON rt.id_origen=ori.id INNER JOIN ciudad des ON rt.id_destino=des.id where rt.id=$idr");
$fl= mysql_fetch_array($cnslt);


$cnslt=mysql_query("SELECT rrh.id,rrh.id_infante,rrh.tipo_pasajero,rrh.precio,rrh.fecha_reserva,rh.hora_salida,rrh.puesto,cli.cedula,cli.nombre,rrh.estatus,rrh.id_ruta_horario FROM reserva_ruta_horario rrh INNER JOIN ruta_horario rh ON rrh.id_ruta_horario=rh.id INNER JOIN ruta r ON rh.id_ruta=r.id INNER JOIN adulto cli ON rrh.id_cliente=cli.id WHERE rrh.id=$idrrh");
$fl2= mysql_fetch_array($cnslt);

$idinf = $fl2["id_infante"];

$docide = ($idinf!=-1?"NO":"SI");

$cnslt= mysql_query("SELECT * from infante WHERE id=$idinf");

if (mysql_num_rows($cnslt)==0)
  $nominf = "N/A";
else {
  $inf=mysql_fetch_array($cnslt);
  $nominf=$inf["nombre"];

}




function saber_dia($fch) {
$dias = array('DOMINGO','LUNES','MARTES','MIERCOLES','JUEVES','VIERNES','SABADO');
$dia = $dias[date('N', strtotime($fch))];
return ($dia!=""?$dia:"DONIMGO");
}

function reservados($idrh,$fres){

  $qr=mysql_query("SELECT * FROM reserva_ruta_horario where id_ruta_horario=$idrh AND fecha_reserva='$fres' AND (estatus='RESERVADA' OR estatus='CONFIRMADA')");

  return mysql_num_rows($qr);

}



?>

<style>
.container2 {
  max-width: 660px;
}

.panel-default>.panel-heading {
  color: #333;
  background-color: #fff;
  border-color: #e4e5e7;
  padding: 0;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

.panel-default>.panel-heading a {
  display: block;
  padding: 10px 15px;
}

.panel-default>.panel-heading a:after {
 
  content: "";
  position: relative;
  top: 1px;
  display: inline-block;
  font-family: 'Glyphicons Halflings';
  font-style: normal;
  font-weight: 400;
  line-height: 1;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  float: right;
  transition: transform .25s linear;
  -webkit-transition: -webkit-transform .25s linear;
}

.panel-default>.panel-heading a[aria-expanded="true"] {
  background-color: #eee;
}

.panel-default>.panel-heading a[aria-expanded="true"]:after {
  content: "\2212";
  -webkit-transform: rotate(180deg);
  transform: rotate(180deg);
}

.panel-default>.panel-heading a[aria-expanded="false"]:after {
  content: "\002b";
  -webkit-transform: rotate(90deg);
  transform: rotate(90deg);
}

.accordion-option {
  width: 100%;
  float: left;
  clear: both;
  margin: 15px 0;
}

.accordion-option .title {
  font-size: 20px;
  font-weight: bold;
  float: left;
  padding: 0;
  margin: 0;
}

.accordion-option .toggle-accordion {
  float: right;
  font-size: 16px;
  color: #6a6c6f;
}
</style>




<script type='text/javascript' language='javascript' src='js/reservas.js'></script>


<div class="panel panel-primary">
  <div class="panel-heading">
    <h2 class="panel-title"><span align="right" class="glyphicon glyphicon-file"></span><b>&nbsp;&nbsp;RESERVAR PASAJE</b></h2>
  </div>
  <div class="panel-body">
    <div class="container">

                        <form role="form" id="frmres" class="form-horizontal">
                        <input hidden name="idr" id="idr" value="<? echo $idr; ?>" />
                        <input hidden name="idrrh" id="idrrh" value="<? echo $idrrh; ?>" />

                        <div class="form-group">
                                <label align="center" class="col-sm-12 control-label"><p align="center">1) DATOS DE LA RUTA</p></label>
                            </div>
                            
                             
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Origen-Destino:</label>
                                <div class="col-sm-4">
                                <input readonly value="<? echo $fl["origen"]."-".$fl["destino"]; ?>" type="text" class="let form-control" />
                                    
                                </div>

                                
                                <label class="col-sm-2 control-label">Duración (Hrs.:Min.)</label>
                                <div class="col-sm-2">
	                                <input readonly value="<? echo $fl["hr"]."Hrs.:".$fl["min"]."Min."; ?>" type="text" class="let form-control" />
                                    <input hidden id="durhr" value="<? echo $fl["hr"]; ?>" />
                                    <input hidden id="durmin" value="<? echo $fl["min"]; ?>" />
                                </div>


                                
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Precio(Bs.):</label>
                                <div class="col-sm-2">
                                <input readonly id="precio_show" value="<? echo number_format($fl2["precio"], 2, ',', '.'); ?>" type="text" class="form-control" />
                                    
                                </div>
                                
                            </div>

                            <div class="form-group">
                                <label align="center" class="col-sm-12 control-label"><p align="center">2) DATOS DEL PASAJERO </p></label>
                            </div>

                            
                            <div class="form-group">

                                <label class="col-sm-2 control-label">Fecha Reserva:</label>
                                <div class="col-sm-2">

                                <?
                                $fres = date_create($fl2["fecha_reserva"]);
                                date_add($fres, date_interval_create_from_date_string('3 days'));
                                ?>

                                <input name="fres" id="fres" type="date" value="<?php echo $fl2["fecha_reserva"]; ?>" min="<?php echo date("Y-m-d");?>" max="<?php echo date_format($fres, 'Y-m-d'); ?>" class="form-control" />  
                                </div>
                                <label class="col-sm-1 control-label">Día:</label>
                                <div class="col-sm-3">
                                  
                                  <input readonly class="form-control" id="dia" name="dia" value="<? echo saber_dia($fl2["fecha_reserva"]); ?>" />
                                </div>

                            </div>
                            
                            <div class="form-group">
                                <label class="col-sm-2 control-label">¿Doc. de Identidad?:</label>
                                <div class="col-sm-2">
                                  <input readonly class="form-control" value="<? echo $docide; ?>" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Tipo Pasajero:</label>
                                <div class="col-sm-2">
                                  <input readonly class="form-control" value="<? echo $fl2["tipo_pasajero"]; ?>" />
                                </div>
                                  <label class="col-sm-2 control-label">Céd. Tit.:</label>
                                  <div class="col-sm-2">
                                  <input readonly class="ced form-control" id="cedula" name="cedula" value="<? echo $fl2["cedula"]; ?>" />
                                  </div>
                                  <label class="col-sm-1 control-label">Nom. Tit.:</label>
                                  <div class="col-sm-3">
                                  <input readonly class="form-control" id="nombre" name="nombre" value="<? echo $fl2["nombre"]; ?>" />
                                  </div>
                                  
                                
                            </div>
                            <div class="form-group">
                                
                                  
                                  <label class="col-sm-2 control-label">Nombre Niño:</label>
                                  <div class="col-sm-3">
                                  <input readonly type="text" class="form-control" value="<? echo $nominf; ?>" />
                                  </div>

                                  
                                  
                                
                            </div>

                            <?

                                  $dia= saber_dia($fl2["fecha_reserva"]);
                                  $fres=$fl2["fecha_reserva"];
                                  $idrh=$fl2["id_ruta_horario"];
                                  $consulta=mysql_query("SELECT * FROM ruta_horario where id=$idrh");
                                  $fl3 = mysql_fetch_array($consulta);
                            ?>


                            <div class="form-group">
                                <label class="col-sm-2 control-label">Hora Salida:</label>
                                <div class="col-sm-2">
                                  <select class="form-control" name="hsal" id="hsal">
                                  <option value="<? echo $idrh; ?>"><? echo $fl3["hora_salida"]?></option>
                                  <?
                                  $consulta=mysql_query("SELECT * FROM ruta_horario where id_ruta=$idr AND dia='$dia' AND activo='SI' and id<>$idrh ORDER BY hora_salida24");
                                  while($rw=mysql_fetch_array($consulta)){
                                  $idrh2=$rw["id"];
                                  if (reservados($idrh2,$fres)<32){

                                  ?>

                                  <option value="<? echo $rw['id']; ?>"><? echo $rw['hora_salida']; ?></option>
                                  <?

                                  }}
                                  ?>
                                  </select>
                                </div>

                                <label class="col-sm-2 control-label">Puesto:</label>
                                <div class="col-sm-2">
                                  <select class="form-control" name="puesto" id="puesto">
                                    <option value="<? echo $fl2["puesto"]; ?>"><? echo $fl2["puesto"]; ?></option>
                                    <?
                                    $puesto=$fl2["puesto"];
                                    for ($i=1; $i<=32; $i++){

                                      $puesto2=($i<10?"0".(string)$i:(string)$i);
                                      //echo "SELECT * FROM reserva_ruta_horario where id_ruta_horario=$idrh AND fres='$fres' AND puesto='$puesto' AND (estatus='RESERVADA' OR estatus='CONFIRMADA')";

                                      $consulta=mysql_query("SELECT * FROM reserva_ruta_horario where id_ruta_horario=$idrh AND fecha_reserva='$fres' AND puesto='$puesto2' AND (estatus='RESERVADA' OR estatus='CONFIRMADA')");

                                      if (mysql_num_rows($consulta)==0 && $puesto2!=$puesto){

                                    ?>

                                     <option value="<? echo $puesto2; ?>"><? echo $puesto2; ?></option>

                                  <?
                                    }

                                  }

                                  ?>
                                  </select>
                                </div>
                                <label class="col-sm-2 control-label">Estatus:</label>
                                  <div class="col-sm-2">
                                    <select class="form-control" name="estatus" id="estatus">
                                      <option value="<? echo $fl2["estatus"]; ?>"><? echo $fl2["estatus"]; ?></option>
                                      <?
                                        $array = array("RESERVADA", "CONFIRMADA", "ANULADA");
                                        foreach ($array as &$valor) {
                                            if ($fl2["estatus"]!=$valor){
                                      ?>
                                      <option value="<? echo $valor; ?>"><? echo $valor; ?></option>
                                      <?
                                              }
                                        }
                                      ?>
                                    </select>
                                  </div>

                                  
                            </div>
                            <div class="form-group">
                                &nbsp;
                            </div>

                            <div class="form-group" align="center">
                                <label><a id="guardar" class="btn btn-success">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Guardar&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></label> - <label><a id="volver" class="btn btn-danger">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Volver&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></label>
                            </div>
                            <div class="form-group">
                                &nbsp;
                            </div>
                                     
                        </form>

                    </div>
  </div>
  <div class="panel-heading">
    <h3 class="panel-title"><b>SISTEMA DE SERVICIOS DE LA UNION DE TRANSPORTE MARVAL A.C. - MARACAY, EDO- ARAGUA.</b></h3>
  </div>
</div>