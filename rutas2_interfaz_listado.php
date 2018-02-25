<?php
session_start();
require("conectar.php");
$cnslt=mysql_query("SELECT rt.id, rt.id_origen as idori, rt.id_destino iddes, rt.duracion_hrs as hr, rt.duracion_min as min, ori.nombre as origen, des.nombre as destino, rt.precio, rt.activo, rt.ruta_larga as rl FROM ruta rt INNER JOIN ciudad ori ON rt.id_origen=ori.id INNER JOIN ciudad des ON rt.id_destino=des.id INNER JOIN ruta_horario rh ON rt.id=rh.id_ruta WHERE rh.activo='SI' group by id,idori,iddes,hr,min,origen,destino,precio,activo,rl ");

?>

<script type="text/javascript">
       // $(document).ready(function () {
            $('#example').DataTable({
                "oLanguage": {
                    "sLengthMenu": "Mostrar _MENU_ registros por pág.",
                    "sZeroRecords": "No hubo coincidencias",
                    "sInfo": "Mostrando _START_ hasta _END_ de _TOTAL_ páginas",
                    "sInfoEmpty": "0 Registros",
                    "sInfoFiltered": "(Filtrando de _MAX_ registros)"
                }
            });

            


        //});
    </script>

<script type='text/javascript' language='javascript' src='js/rutas2.js'></script>

<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title"><span align="right" class="glyphicon glyphicon-list"></span><b>&nbsp;&nbsp;RUTAS</b></h3>
  </div>
  <div class="panel-body">
    <div class="container">

                        <form role="form" class="form-horizontal">
                            <div class="form-group">
                                <table id="example" class="table table-striped table-bordered" align="right" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            
                                            <th width="40%">Origen-Destino</th>
                                            <th>Duración (Hrs.:Min.)</th>
                                            <th>Precio (Bs.)</th>
                                            <th>Opciones</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Origen-Destino</th>
                                            <th>Duración (Hrs.:Min.)</th>
                                            <th>Precio (Bs.)</th>
                                            <th>Opciones</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php 
                                      
                                        while($fl=mysql_fetch_array($cnslt)){

                                      ?>
                                        <tr>
                                            <td><? echo $fl["origen"]."-".$fl["destino"];?></td>
                                            <td><? echo $fl["hr"]."Hrs.:".$fl["min"]."Min.";?></td>
                                            <td><? echo number_format($fl["precio"], 2, ',', '.');?></td>
                                            <td><button title="Ver Horario" type="button" data-id="<? echo $fl["id"]; ?>" class="ver-hor btn btn-danger"><span class="glyphicon glyphicon-time"></span></button>

                                            <? if ($fl["rl"]=="SI") { ?>

                                            - <button title="Reservar" type="button" data-id="<? echo $fl["id"]; ?>" class="res-hsal btn btn-primary"><span class="glyphicon glyphicon-file"></span></button>

                                            <? } ?>


                                            </td>
                                        </tr>
                                        <?php 
                                      
                                        }

                                      ?>
                                        
                                    </tbody>
                                </table>
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
<div data-nmod="1" class="modal fade" id="ModalRut" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div style="width:800px;" class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Formulario de Rutas</h4>
      </div>
      <div class="modal-body">
        <div class="container">

                        <form role="form" class="form-horizontal" id="frmrut">
                            <div class="form-group">

                                <label for="nombre" class="col-sm-2 control-label">Ciudad Origen</label>
                                  <div class="col-sm-2">
                                    <select class="form-control" name="idori" id="idori" />
                                    </select>
                                  </div>
                                <label for="nombre" class="col-sm-2 control-label">Ciudad Destino</label>
                                  <div class="col-sm-2">
                                    <select class="form-control" name="iddes" id="iddes" />
                                    </select>
                                  </div>
                                
                            </div>

                            <div class="form-group">
                                <label for="nombre" class="col-sm-2 control-label">Duración (Hr:Min)</label>
                                <div class="col-sm-1">
                                    <select class="form-control" name="hr" id="hr" >
                                        <option value="0">00</option>
                                        <option value="1">01</option>
                                        <option value="2">02</option>
                                        <option value="3">03</option>
                                        <option value="4">04</option>
                                        <option value="5">05</option>
                                        <option value="6">06</option>
                                        <option value="7">07</option>
                                        <option value="8">08</option>
                                        <option value="9">09</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                        <option value="13">13</option>
                                        <option value="14">14</option>
                                        <option value="15">15</option>
                                        <option value="16">16</option>
                                        <option value="17">17</option>
                                        <option value="18">18</option>
                                        <option value="19">19</option>
                                        <option value="20">20</option>
                                        <option value="21">21</option>
                                        <option value="22">22</option>
                                        <option value="23">23</option>
                                    </select>
                                </div>
                                <div class="col-sm-1">
                                    <select class="form-control" name="min" id="min" >
                                        <option value="0">00</option>
                                        <option value="15">15</option>
                                        <option value="30">30</option>
                                        <option value="45">45</option>
                                    </select>
                                </div>

                                <label for="" class="col-sm-2 control-label">Precio (Bs.)</label>
                                <div class="col-sm-2">
                                <input class="form-control" name="precio" id="precio" />

                                </div>
                            
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">Ruta Larga</label>
                                  <div class="col-sm-1">
                                    <select class="form-control" name="rl" id="rl">
                                        <option value="SI">SI</option>
                                        <option value="NO">NO</option>
                                    </select>
                                  </div>
                                  <label for="" class="col-sm-2 control-label">Activo</label>
                                  <div class="col-sm-1">
                                    <select class="form-control" name="act" id="act">
                                        <option value="SI">SI</option>
                                        <option value="NO">NO</option>
                                    </select>
                                  </div>
                            </div>

                            <input hidden name="id" id="id" value="" />
                                      
                        </form>

                    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" id="agredi">Guardar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<!-- -------------------------------------------------------------------------------------------------------------------------- -->

