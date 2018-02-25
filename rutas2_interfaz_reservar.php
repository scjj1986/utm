<? 
session_start();
require("conectar.php");
date_default_timezone_set("America/Caracas");

$id=$_GET["id"];
$cnslt=mysql_query("SELECT rt.id, rt.id_origen as idori, rt.id_destino iddes, rt.duracion_hrs as hr, rt.duracion_min as min,  ori.nombre as origen, des.nombre as destino, rt.precio, rt.activo FROM ruta rt INNER JOIN ciudad ori ON rt.id_origen=ori.id INNER JOIN ciudad des ON rt.id_destino=des.id where rt.id=$id");
$fl= mysql_fetch_array($cnslt);


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




<script type='text/javascript' language='javascript' src='js/rutas2.js'></script>


<div class="panel panel-primary">
  <div class="panel-heading">
    <h2 class="panel-title"><span align="right" class="glyphicon glyphicon-file"></span><b>&nbsp;&nbsp;RESERVAR PASAJE</b></h2>
  </div>
  <div class="panel-body">
    <div class="container">

                        <form role="form" id="frmres" class="form-horizontal">
                        <input hidden name="idr" id="idr" value="<? echo $id; ?>" />

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
                                <input readonly id="precio_show" value="<? echo number_format($fl["precio"], 2, ',', '.'); ?>" type="text" class="let form-control" />
                                <input hidden id="precio_standar" value="<? echo $fl["precio"]; ?>" />
                                <input hidden name="precio_final" id="precio_final" value="<? echo $fl["precio"]; ?>" />
                                    
                                </div>
                                
                            </div>

                            <div class="form-group">
                                <label align="center" class="col-sm-12 control-label"><p align="center">2) DATOS DEL PASAJERO </p></label>
                            </div>

                            
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Fecha Actual:</label>
                                <div class="col-sm-2">
                                <input readonly name="fcre" id="fcre" type="date" value="<?php echo date("Y-m-d");?>" class="form-control" />  
                                </div>

                                <label class="col-sm-2 control-label">Fecha Reserva:</label>
                                <div class="col-sm-2">

                                <?
                                $fres = date_create(date("Y-m-d"));
                                date_add($fres, date_interval_create_from_date_string('3 days'));
                                ?>

                                <input name="fres" id="fres" type="date" value="<?php echo date("Y-m-d");?>" min="<?php echo date("Y-m-d");?>" max="<?php echo date_format($fres, 'Y-m-d'); ?>" class="form-control" />  
                                </div>
                                <label class="col-sm-1 control-label">Día:</label>
                                <div class="col-sm-3">
                                  
                                  <input readonly class="form-control" id="dia" name="dia" value="<? echo saber_dia(date('Y-m-d')); ?>" />
                                </div>

                            </div>
                            
                            <div class="form-group">
                                <label class="col-sm-2 control-label">¿Doc. de Identidad?:</label>
                                <div class="col-sm-2">
                                  <select class="form-control" name="docide" id="docide">
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>
                                  
                                  </select>
                                </div>
                            </div>

                            <div id="concedula" class="form-group">
                                <label class="col-sm-2 control-label">Tipo Pasajero:</label>
                                <div class="col-sm-2">
                                  <select class="form-control" name="tpas" id="tpas">
                                    <option value="NORMAL">NORMAL</option>
                                    <option value="ESTUDIANTE">ESTUDIANTE</option>
                                    <option value="TERCERA EDAD">TERCERA EDAD</option>
                                  </select>
                                </div>
                                  <label class="col-sm-2 control-label">Cédula:</label>
                                  <div class="col-sm-2">
                                  <input type="text" class="ced form-control" id="cedula" name="cedula" />
                                  </div>
                                  <label class="col-sm-1 control-label">Nombre:</label>
                                  <div class="col-sm-3">
                                  <input type="text" class="form-control" id="nombre" name="nombre" />
                                  </div>
                                  
                                
                            </div>
                            <div id="sincedula" style="display:none;" class="form-group">
                                
                                  
                                  <label class="col-sm-1 control-label">Nombre:</label>
                                  <div class="col-sm-3">
                                  <input type="text" class="form-control" id="nombre2" name="nombre2" />
                                  </div>

                                  <label class="col-sm-2 control-label">Céd. Rep.:</label>
                                  <div class="col-sm-2">
                                  <input type="text" class="ced form-control" id="cedularep" name="cedularep" />
                                  </div>
                                  <label class="col-sm-2 control-label">Nom. Rep:</label>
                                  <div class="col-sm-2">
                                  <input type="text" class="form-control" id="nombrerep" name="nombrerep" />
                                  </div>
                                  
                                
                            </div>

                            <?

                                  $dia= saber_dia(date('Y-m-d'));
                                  $fres=date('Y-m-d');
                                  $consulta=mysql_query("SELECT * FROM ruta_horario where id_ruta=$id AND dia='$dia' AND activo='SI' ORDER BY hora_salida24");
                                  //echo "SELECT * FROM ruta_horario where id_ruta=$id AND dia='$dia' AND activo='SI'";
                            ?>


                            <div class="form-group">
                                <label class="col-sm-2 control-label">Hora Salida:</label>
                                <div class="col-sm-2">
                                  <select class="form-control" name="hsal" id="hsal">
                                  <option value="-1">Seleccione...</option>
                                  <?
                                  while($rw=mysql_fetch_array($consulta)){
                                  $idrh=$rw["id"];
                                  if (reservados($idrh,$fres)<32){

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

