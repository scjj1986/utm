<?
session_start();
require("conectar.php");
$cnslt=mysql_query("SELECT * FROM vision");


?>

<script type='text/javascript' language='javascript' src='js/vision.js'></script>

<div class="panel panel-primary">
  <div class="panel-heading">
    <h2 class="panel-title"><span align="right" class="glyphicon glyphicon-eye-open"></span><b>&nbsp;&nbsp;VISIÓN</b></h2>
  </div>
  <div class="panel-body">
    <div class="container">

                        <form role="form">
                        
                            <div align="center" class="form-group">
                                <img src="img/vision.png"/>
                            </div>

                            <? while ($reg=mysql_fetch_array($cnslt)) { ?>
                            <div class="form-group">
                                <b><h4>• <? echo $reg["descripcion"]; ?></h4></b>
                            </div>
                            
                            <?}

                             if ($_SESSION['perfil']!="") {?>

                            <div align="center" class="form-group">
                                <button title="Editar" id="editar" type="button" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span></button>
                            </div>

                            <?}?>

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


