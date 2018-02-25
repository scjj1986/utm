<? 
session_start();
require("conectar.php");


$id=$_GET["id"];
$cnslt=mysql_query("SELECT rt.id, rt.id_origen as idori, rt.id_destino iddes, rt.duracion_hrs as hr, rt.duracion_min as min,  ori.nombre as origen, des.nombre as destino, rt.precio, rt.activo FROM ruta rt INNER JOIN ciudad ori ON rt.id_origen=ori.id INNER JOIN ciudad des ON rt.id_destino=des.id where rt.id=$id");
$fl= mysql_fetch_array($cnslt);



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




<script type='text/javascript' language='javascript' src='js/rutas.js'>


</script>


<div class="panel panel-primary">
  <div class="panel-heading">
    <h2 class="panel-title"><span align="right" class="glyphicon glyphicon-time"></span><b>&nbsp;&nbsp;ACTUALIZAR HORARIO</b></h2>
  </div>
  <div class="panel-body">
    <div class="container">

                        <form role="form" id="frmhor" class="form-horizontal">
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
                                <input readonly value="<? echo number_format($fl["precio"], 2, ',', '.'); ?>" type="text" class="let form-control" />
                                    
                                </div>
                                
                            </div>

                            <div class="form-group">
                                <label align="center" class="col-sm-12 control-label"><p align="center">2) HORARIOS DE SALIDA</p></label>
                                <input hidden id="evt"  value="NO"><!-- Campo oculto para evitar repeticiones de eventos-->
                            </div>
                            
                             
                            <div class="form-group">

                                <div class="col-sm-8">
                                <div class="accordion-option">
                                        
                                      </div>

  
                                  <div class="clearfix"></div>
                                  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                  
                                    <div class="panel panel-default">
                                      <div class="panel-heading" role="tab" id="heading1">
                                        <h4 class="panel-title">
                                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse1" aria-expanded="true" aria-controls="collapse1">
                                          Lunes
                                        </a>
                                      </h4>
                                      </div>
                                      <div id="collapse1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading1">
                                        <div class="panel-body">

                                            <input hidden id="cont1" name="cont1" value="0">
                                            <input hidden name="max1" id="max1"  value="0">
                                            

                                              <div class="checkbox">
                                                  <label>
                                                    <input class="chk" type="checkbox" name="chact_lun" id="chact_lun" <? echo "checked"; ?>  >
                                                    Activo
                                                  </label>
                                              </div>
                                              <div class="form-group">
                                                  <label class="col-sm-3 control-label">Hora de Salida</label>
                                                    <div class="col-sm-2">
                                                        <input readonly style="cursor:pointer;" name="hsal_lun" id="hsal_lun" type="text" class="hra form-control" />
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <button title="Agregar" id="agr_hsal_lun" data-opc="nuevo" type="button" class="btn btn-primary"><span class="glyphicon glyphicon-plus-sign"></span></button>
                                                    </div>
                                              </div>
                                              <div class="form-group">
                                                <div class="col-sm-6">
                                                <table class="table table-striped table-bordered" align="center" cellspacing="0">
                                                    <thead>
                                                        <tr>
                                                            
                                                            <th>Hra. Salida</th>
                                                            <th>Hra. Llegada</th>
                                                            <th>Eliminar</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody id="tb-hsal-lun">

                                                    </tbody>
                                                </table>
                                                </div>
                                            </div>
                                              
                                        </div>
                                      </div>
                                    </div>
                                    
                                    <div class="panel panel-default">
                                      <div class="panel-heading" role="tab" id="heading2">
                                        <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse2" aria-expanded="true" aria-controls="collapse2">
                                          Martes
                                        </a>
                                      </h4>
                                      </div>
                                      <div id="collapse2" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading2">
                                        <div class="panel-body">

                                            <input hidden id="cont2" name="cont2" value="0">
                                            <input hidden name="max2" id="max2"  value="0">
                                            

                                              <div class="checkbox">
                                                  <label>
                                                    <input class="chk" type="checkbox" name="chact_mar" id="chact_mar" checked  >
                                                    Activo
                                                  </label>
                                              </div>
                                              <div class="form-group">
                                                  <label class="col-sm-3 control-label">Hora de Salida</label>
                                                    <div class="col-sm-2">
                                                        <input readonly style="cursor:pointer;" name="hsal_mar" id="hsal_mar" type="text" class="hra form-control" />
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <button title="Agregar" id="agr_hsal_mar" data-opc="nuevo" type="button" class="btn btn-primary"><span class="glyphicon glyphicon-plus-sign"></span></button>
                                                    </div>
                                              </div>
                                              <div class="form-group">
                                                <div class="col-sm-6">
                                                <table class="table table-striped table-bordered" align="center" cellspacing="0">
                                                    <thead>
                                                        <tr>
                                                            
                                                            <th>Hra. Salida</th>
                                                            <th>Hra. Llegada</th>
                                                            <th>Eliminar</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody id="tb-hsal-mar">

                                                    </tbody>
                                                </table>
                                                </div>
                                            </div>
                                              
                                        </div>
                                      </div>
                                    </div>
                                    
                                    
                                    <div class="panel panel-default">
                                      <div class="panel-heading" role="tab" id="heading3">
                                        <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse3" aria-expanded="true" aria-controls="collapse3">
                                          Miércoles
                                        </a>
                                      </h4>
                                      </div>
                                      <div id="collapse3" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading3">
                                        <div class="panel-body">

                                            <input hidden id="cont3" name="cont3" value="0">
                                            <input hidden name="max3" id="max3"  value="0">
                                            

                                              <div class="checkbox">
                                                  <label>
                                                    <input class="chk" type="checkbox" name="chact_mie" id="chact_mie" checked  >
                                                    Activo
                                                  </label>
                                              </div>
                                              <div class="form-group">
                                                  <label class="col-sm-3 control-label">Hora de Salida</label>
                                                    <div class="col-sm-2">
                                                        <input readonly style="cursor:pointer;" name="hsal_mie" id="hsal_mie" type="text" class="hra form-control" />
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <button title="Agregar"data-opc="nuevo" id="agr_hsal_mie" type="button" class="btn btn-primary"><span class="glyphicon glyphicon-plus-sign"></span></button>
                                                    </div>
                                              </div>
                                              <div class="form-group">
                                                <div class="col-sm-6">
                                                <table class="table table-striped table-bordered" align="center" cellspacing="0">
                                                    <thead>
                                                        <tr>
                                                            
                                                            <th>Hra. Salida</th>
                                                            <th>Hra. Llegada</th>
                                                            <th>Eliminar</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody id="tb-hsal-mie">

                                                    </tbody>
                                                </table>
                                                </div>
                                            </div>
                                              
                                        </div>
                                      </div>
                                    </div>
                                    
                                    <div class="panel panel-default">
                                      <div class="panel-heading" role="tab" id="heading4">
                                        <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse4" aria-expanded="true" aria-controls="collapse4">
                                          Jueves
                                        </a>
                                      </h4>
                                      </div>
                                      <div id="collapse4" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading4">
                                        <div class="panel-body">

                                            <input hidden id="cont4" name="cont4" value="0">
                                            <input hidden name="max4" id="max4"  value="0">
                                            

                                              <div class="checkbox">
                                                  <label>
                                                    <input class="chk" type="checkbox" name="chact_jue" id="chact_jue" checked  >
                                                    Activo
                                                  </label>
                                              </div>
                                              <div class="form-group">
                                                  <label class="col-sm-3 control-label">Hora de Salida</label>
                                                    <div class="col-sm-2">
                                                        <input readonly style="cursor:pointer;" name="hsal_jue" id="hsal_jue" type="text" class="hra form-control" />
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <button title="Agregar" data-opc="nuevo" id="agr_hsal_jue" type="button" class="btn btn-primary"><span class="glyphicon glyphicon-plus-sign"></span></button>
                                                    </div>
                                              </div>
                                              <div class="form-group">
                                                <div class="col-sm-6">
                                                <table class="table table-striped table-bordered" align="center" cellspacing="0">
                                                    <thead>
                                                        <tr>
                                                            
                                                            <th>Hra. Salida</th>
                                                            <th>Hra. Llegada</th>
                                                            <th>Eliminar</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody id="tb-hsal-jue">

                                                    </tbody>
                                                </table>
                                                </div>
                                            </div>
                                              
                                        </div>
                                      </div>
                                    </div>
                                    
                                    <div class="panel panel-default">
                                      <div class="panel-heading" role="tab" id="heading5">
                                        <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse5" aria-expanded="true" aria-controls="collapse5">
                                          Viernes
                                        </a>
                                      </h4>
                                      </div>
                                      <div id="collapse5" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading5">
                                        <div class="panel-body">

                                            <input hidden id="cont5" name="cont5" value="0">
                                            <input hidden name="max5" id="max5"  value="0">
                                            

                                              <div class="checkbox">
                                                  <label>
                                                    <input class="chk" type="checkbox" name="chact_vie" id="chact_vie" checked  >
                                                    Activo
                                                  </label>
                                              </div>
                                              <div class="form-group">
                                                  <label class="col-sm-3 control-label">Hora de Salida</label>
                                                    <div class="col-sm-2">
                                                        <input readonly style="cursor:pointer;" name="hsal_vie" id="hsal_vie" type="text" class="hra form-control" />
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <button title="Agregar" data-opc="nuevo" id="agr_hsal_vie" type="button" class="btn btn-primary"><span class="glyphicon glyphicon-plus-sign"></span></button>
                                                    </div>
                                              </div>
                                              <div class="form-group">
                                                <div class="col-sm-6">
                                                <table class="table table-striped table-bordered" align="center" cellspacing="0">
                                                    <thead>
                                                        <tr>
                                                            
                                                            <th>Hra. Salida</th>
                                                            <th>Hra. Llegada</th>
                                                            <th>Eliminar</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody id="tb-hsal-vie">

                                                    </tbody>
                                                </table>
                                                </div>
                                            </div>
                                              
                                        </div>
                                      </div>
                                    </div>
                                    
                                    <div class="panel panel-default">
                                      <div class="panel-heading" role="tab" id="heading6">
                                        <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse6" aria-expanded="true" aria-controls="collapse6">
                                          Sábado
                                        </a>
                                      </h4>
                                      </div>
                                      <div id="collapse6" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading6">
                                        <div class="panel-body">

                                            <input hidden id="cont6" name="cont6" value="0">
                                            <input hidden name="max6" id="max6"  value="0">
                                            

                                              <div class="checkbox">
                                                  <label>
                                                    <input class="chk" type="checkbox" name="chact_sab" id="chact_sab" checked  >
                                                    Activo
                                                  </label>
                                              </div>
                                              <div class="form-group">
                                                  <label class="col-sm-3 control-label">Hora de Salida</label>
                                                    <div class="col-sm-2">
                                                        <input readonly style="cursor:pointer;" name="hsal_sab" id="hsal_sab" type="text" class="hra form-control" />
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <button title="Agregar" data-opc="nuevo" id="agr_hsal_sab" type="button" class="btn btn-primary"><span class="glyphicon glyphicon-plus-sign"></span></button>
                                                    </div>
                                              </div>
                                              <div class="form-group">
                                                <div class="col-sm-6">
                                                <table class="table table-striped table-bordered" align="center" cellspacing="0">
                                                    <thead>
                                                        <tr>
                                                            
                                                            <th>Hra. Salida</th>
                                                            <th>Hra. Llegada</th>
                                                            <th>Eliminar</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody id="tb-hsal-sab">

                                                    </tbody>
                                                </table>
                                                </div>
                                            </div>
                                              
                                        </div>
                                      </div>
                                    </div>
                                    
                                    <div class="panel panel-default">
                                      <div class="panel-heading" role="tab" id="heading7">
                                        <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse7" aria-expanded="true" aria-controls="collapse7">
                                          Domingo
                                        </a>
                                      </h4>
                                      </div>
                                      <div id="collapse7" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading7">
                                        <div class="panel-body">

                                            <input hidden id="cont7" name="cont7" value="0">
                                            <input hidden name="max7" id="max7"  value="0">
                                            

                                              <div class="checkbox">
                                                  <label>
                                                    <input class="chk" type="checkbox" name="chact_dom" id="chact_dom" checked  >
                                                    Activo
                                                  </label>
                                              </div>
                                              <div class="form-group">
                                                  <label class="col-sm-3 control-label">Hora de Salida</label>
                                                    <div class="col-sm-2">
                                                        <input readonly style="cursor:pointer;" name="hsal_dom" id="hsal_dom" type="text" class="hra form-control" />
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <button title="Agregar" data-opc="nuevo" id="agr_hsal_dom" type="button" class="btn btn-primary"><span class="glyphicon glyphicon-plus-sign"></span></button>
                                                    </div>
                                              </div>
                                              <div class="form-group">
                                                <div class="col-sm-6">
                                                <table class="table table-striped table-bordered" align="center" cellspacing="0">
                                                    <thead>
                                                        <tr>
                                                            
                                                            <th>Hra. Salida</th>
                                                            <th>Hra. Llegada</th>
                                                            <th>Eliminar</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody id="tb-hsal-dom">

                                                    </tbody>
                                                </table>
                                                </div>
                                            </div>
                                              
                                        </div>
                                      </div>
                                    </div>
                                    
                                    
                                    
                                  </div>
  
  
                                </div>
                            </div>

                            
                            <div class="form-group">
                                &nbsp;
                            </div>

                            <div class="form-group" align="center">
                                <label><a id="agr_hor" class="btn btn-success">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Guardar&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></label>-<label><a id="volver" class="btn btn-danger">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Volver&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></label>
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


<script type="text/javascript">
    $(document).ready(function () {    
$("#collapse1").collapse('hide');
$("#collapse2").collapse('hide');
$("#collapse3").collapse('hide');
$("#collapse4").collapse('hide');
$("#collapse5").collapse('hide');
$("#collapse6").collapse('hide');
$("#collapse7").collapse('hide');
});



</script>

