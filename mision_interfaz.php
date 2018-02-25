<?
session_start();
require("conectar.php");
$cnslt=mysql_query("SELECT * FROM mision");
$reg=mysql_fetch_array($cnslt);


?>

<script type='text/javascript' language='javascript' src='js/mision.js'></script>

<div class="panel panel-primary">
  <div class="panel-heading">
    <h2 class="panel-title"><span align="right" class="glyphicon glyphicon-thumbs-up"></span><b>&nbsp;&nbsp;MISIÓN</b></h2>
  </div>
  <div class="panel-body">
    <div class="container">

                        <form role="form">
                        
                            <div align="center" class="form-group">
                                <img width="157px" src="img/mision.png"/>
                            </div>
                            <div class="form-group">
                                <b><h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<? echo $reg["descripcion"]; ?></h4></b>
                            </div>
                            <? if ($_SESSION['perfil']!="") {?>

                            <div align="center" class="form-group">
                                <button title="Editar" id="editar" type="button" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span></button>
                            </div>

                            <?}?>
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
<div data-nmod="1" class="modal fade" id="ModalMis" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div style="width:800px;" class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modificar Misión</h4>
      </div>
      <div class="modal-body">
        <div class="container">

                        <form role="form" class="form-horizontal" id="frm-mis">
                            <div class="form-group">

                                <label for="nombre" class="col-sm-2 control-label">Descripción:</label>
                                  <div class="col-sm-6">
                                    <textarea rows="5" name="descr" id="descr" maxlength="500" class="form-control"><? echo $reg["descripcion"]; ?></textarea>
                                  </div>
                                
                                
                            </div>

                                      
                        </form>

                    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" id="guardar">Guardar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<!-- -------------------------------------------------------------------------------------------------------------------------- -->


