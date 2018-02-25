<? 
session_start();
require("conectar.php");
date_default_timezone_set("America/Caracas");

$qr=mysql_query("SELECT rt.id, ori.nombre as origen, des.nombre as destino FROM ruta rt INNER JOIN ciudad ori ON rt.id_origen=ori.id INNER JOIN ciudad des ON rt.id_destino=des.id WHERE rt.ruta_larga='SI'");

?>

<script type='text/javascript' language='javascript' src='js/reservas.js'></script>

<div class="panel panel-primary">
  <div class="panel-heading">
    <h2 class="panel-title"><span align="right" class="glyphicon glyphicon-ok"></span><b>&nbsp;&nbsp;PROCESAR RESERVAS</b></h2>
  </div>
  <div class="panel-body">
    <div class="container">

                        <form role="form" id="frmres" class="form-horizontal">

                        <div class="form-group">
                                &nbsp;
                            </div>
                        
                            
                            <div class="form-group">
                                <label align="right" class="col-sm-1 control-label">Ruta:</label>
                                <div class="col-sm-4">
                                  <select class="form-control" name="idr" id="idr">
                                  <?
                                  while($rw=mysql_fetch_array($qr)){
                                  ?>

                                  <option value="<? echo $rw['id']; ?>"><? echo $rw['origen']."-".$rw['destino']; ?></option>
                                  <?

                                  }
                                  ?>
                                  </select>
                                </div>
                                <label class="col-sm-1 control-label">Fecha Reserva:</label>
                                <div class="col-sm-2">

                                <?
                                $fres = date_create(date("Y-m-d"));
                                date_add($fres, date_interval_create_from_date_string('3 days'));
                                ?>

                                <input readonly name="fres" id="fres" type="date" value="<?php echo date("Y-m-d");?>" class="form-control" />  
                                </div>
                                <label class="col-sm-1 control-label">Cédula:</label>
                                  <div class="col-sm-2">
                                  <input type="text" class="ced form-control" id="cedula" name="cedula" />
                                  </div>
                            </div>
                            
                            <div class="form-group">
                                &nbsp;
                            </div>
                            <div class="form-group" align="center">
                                
                                    <label><a id="buscar2" class="btn btn-primary">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Buscar&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></label>
                                
                            </div>
                            <div class="form-group">
                                &nbsp;
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                                <table id="tabla" class="table table-striped table-bordered" align="center" cellspacing="0" width="100%">
                                                    <thead>
                                                        <tr>
                                                            
                                                            
                                                            <th bgcolor="#D9D9D9" width="8%">Hra. Salida</th>
                                                            <th bgcolor="#D9D9D9" width="5%">Puesto</th>
                                                            <th bgcolor="#D9D9D9" width="11%">Céd Cli./Rep.</th>
                                                            <th bgcolor="#D9D9D9">Nom. Cli./Rep.</th>  
                                                            <th bgcolor="#D9D9D9">Nom. Niño</th>
                                                            <th bgcolor="#D9D9D9" width="15%">Tipo Pas.</th>
                                                            <th bgcolor="#D9D9D9" width="12%">Precio Bs.</th>
                                                            <th bgcolor="#D9D9D9" width="11%">Estat.</th>
                                                            <th bgcolor="#D9D9D9" width="5%">Procesar</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody id="tb-res">
                                                    
                                                    </tbody>
                                                </table>
                                                </div>
                            </div>
                            <div class="form-group">
                                &nbsp;
                            </div>
                            <div class="form-group">
                                &nbsp;
                            </div>
                            <div class="form-group">
                                &nbsp;
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

<!-- -----------------------------------------------------------Modal-------------------------------------------------------- -->
<div data-nmod="1" class="modal fade" id="ModalPro" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div style="width:800px;" class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Procesar Reserva</h4>
      </div>
      <div class="modal-body">
        <div class="container">

                        <form role="form" class="form-horizontal" id="frmpro">
                            <div class="form-group">
                                <label align="right" class="col-sm-1 control-label">Céd. Tit.:</label>
                                <div class="col-sm-2">
                                <input readonly class="form-control" name="mod-ced" id="mod-ced" />
                                </div>
                                <label align="right" class="col-sm-1 control-label">Nombre:</label>
                                <div class="col-sm-3">
                                <input class="form-control" name="mod-nom" id="mod-nom" />
                                </div>
                            </div>
                             <div class="form-group">
                                <label align="right" class="col-sm-1 control-label">Ruta:</label>
                                <div class="col-sm-3">
                                <input readonly class="form-control" name="mod-rut" id="mod-rut" />
                                </div>
                                <label align="right" class="col-sm-1 control-label">Salida:</label>
                                <div class="col-sm-2">
                                <input readonly class="form-control" name="mod-hsal" id="mod-hsal" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="nombre" class="col-sm-1 control-label">Puesto</label>
                                <div class="col-sm-1">
                                    <input readonly class="form-control" name="mod-pst" id="mod-pst" />
                                </div>
                                <label align="right" class="col-sm-2 control-label">Estatus:</label>
                                <div class="col-sm-2">
                                    <select class="form-control" name="mod-est" id="mod-est" >
                                        <option value="CONFIRMADA">CONFIRMADA</option>
                                        <option value="ANULADA">ANULADA</option>
                                    </select>
                                </div>
                            
                            </div>

                            <input hidden name="id" id="id" value="" />
                                      
                        </form>

                    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" id="proc-res">Guardar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<!-- -------------------------------------------------------------------------------------------------------------------------- -->


