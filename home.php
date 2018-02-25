<?
session_start();
require("conectar.php");

?>

<script type='text/javascript' language='javascript' src='js/home.js'></script>

<div class="panel panel-primary">
  <div class="panel-heading">
    <h2 class="panel-title"><span align="right" class="glyphicon glyphicon-home"></span><b>&nbsp;&nbsp;INICIO</b></h2>
  </div>
  <div class="panel-body">
    <div class="container">

                        <form role="form">
                        <?
                            session_start();
                            if ($_SESSION['perfil']=="ADMINISTRADOR"){
                         ?>
                            <div class="form-group">
                             <div class="col-sm-1">
                                <img src="img/usuario.png" height="50" width="50" />
                              </div>
                                <div class="col-sm-3">
                                <p  ><b>NOMBRE:</b> <? echo $_SESSION['nombrecompleto']; ?></p>
                                  
                                <p ><b>PERFIL:</b> <? echo $_SESSION['perfil']; ?></p>
                                </div>
                            </div>
                            <div class="form-group">                          
                               
                               
                                <div class="col-sm-6" align="left">

                                        <input id="file" type="file" name="file[]" multiple="multiple"  class="filestyle" data-buttonName="btn-primary" accept="image/*">
                                   
                                </div> 

                                 
                            </div>
                            <? }?>
                            <div class="form-group">
                                
                            </div>
                            <div class="form-group">
                                &nbsp;
                            </div>
                            <div class="form-group">                          
                               
                               
                                <div class="col-sm-12" align="center">
                                    <div id="vista-previa" >

                                        <?

                                        $cnslt=mysql_query("SELECT * FROM inicio");
                                        while ($img= mysql_fetch_array($cnslt)){

                                        ?>
                                       <!-- <img src="<? //echo $dir.$img['img_nombre']; ?>" width="200" height="200"  />  -->
                                       
                                       <img src="data:image/jpg;base64,<? echo base64_encode($img['imagen']); ?>" width="1000" height="300"  /> 

                                        <?
                                        }
                                        ?>
                                    </div>
                                    
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
                            <? if ($_SESSION['perfil']!="") {?>
                            <div align="center" class="form-group">
                                <button title="Editar" id="actualizar" type="button" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span></button>
                            </div>
                            <? } ?>
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


