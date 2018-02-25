
<?
session_start();
require("conectar.php");


?>

<script type='text/javascript' language='javascript' src='js/organigrama.js'></script>

<div class="panel panel-primary">
  <div class="panel-heading">
    <h2 class="panel-title"><span align="right" class="glyphicon glyphicon-object-align-vertical"></span><b>&nbsp;&nbsp;ORGANIGRAMA</b></h2>
  </div>
  <div class="panel-body">
    <div class="container">

                        <form role="form">
            
                            <div class="form-group">
                                <label align="center" class="col-sm-12 control-label"><p align="left"> ESTRUCTURA ORGANIZATIVA</p></label>
                            </div>
                            <? if ($_SESSION['perfil']!="") {?>
                            <div class="form-group">                          
                               
                               
                                <div class="col-sm-6" align="left">

                                        <input id="file" type="file" name="file[]" multiple="multiple"  class="filestyle" data-buttonName="btn-primary" accept="image/*">
                                   
                                </div> 

                                 
                            </div>

                            <? }?>
                            
                            <div class="form-group">                          
                               
                               
                                <div class="col-sm-12" align="center">
                                    <div id="vista-previa" >

                                        <?

                                        $cnslt=mysql_query("SELECT * FROM organigrama");
                                        while ($img= mysql_fetch_array($cnslt)){

                                        ?>
                                       <!-- <img src="<? //echo $dir.$img['img_nombre']; ?>" width="200" height="200"  />  -->
                                       
                                       <img src="data:image/jpg;base64,<? echo base64_encode($img['imagen']); ?>" width="300" height="300"  /> 

                                        <?
                                        }
                                        ?>
                                    </div>
                                    
                                </div>

                               
                            </div>

                            
                            
                            <div class="form-group">&nbsp;</div>
                             <div class="form-group">&nbsp;</div>
                            <div class="form-group">&nbsp;</div>

                            <? if ($_SESSION['perfil']!="") {?>
                            <div align="center" class="form-group">
                                <button title="Editar" id="actualizar" type="button" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span></button>
                            </div>
                            <? } ?>
                            

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


