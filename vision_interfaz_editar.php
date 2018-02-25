<?
session_start();
require("conectar.php");
$cnslt=mysql_query("SELECT * FROM vision");


?>

<script type='text/javascript' language='javascript' src='js/vision.js'></script>

<div class="panel panel-primary">
  <div class="panel-heading">
    <h2 class="panel-title"><span align="right" class="glyphicon glyphicon-pencil"></span><b>&nbsp;&nbsp;EDITAR VISIÓN</b></h2>
  </div>
  <div class="panel-body">
    <div class="container">

                        <form role="form" id="frmvis">
                            <div class="form-group">

                                <label for="nombre" class="col-sm-1 control-label">Descripción:</label>
                                  <div class="col-sm-3">
                                    <textarea rows="3" name="descr" id="descr" maxlength="500" class="form-control"><? echo $reg["descripcion"]; ?></textarea>
                                  </div>
                                
                                <div class="col-sm-1">
                                    <button title="Agregar" id="agr_vis" type="button" class="btn btn-primary"><span class="glyphicon glyphicon-plus-sign"></span></button>
                                </div>

                                <div class="col-sm-7">&nbsp;
                                </div>

                            </div>
                            <div class="form-group">
                                &nbsp;
                            </div>

                             <div class="form-group">
                                &nbsp;
                            </div>
                            
                            <div class="form-group">
                                <div class="col-sm-6">
                                                <input hidden id="cont" name="cont" value="<? echo mysql_num_rows($cnslt); ?>">
                                                <input hidden name="max" id="max"  value="<? echo mysql_num_rows($cnslt); ?>">
                                                 <input hidden id="evt"  value="NO"><!-- Campo oculto para evitar repeticiones de eventos-->
                                                <table class="table table-striped table-bordered" align="center" cellspacing="0">
                                                    <thead>
                                                        <tr>
                                                            <th>Descripción</th>
                                                            <th>Eliminar</th>
                                                            

                                                        </tr>
                                                    </thead>
                                                    <tbody id="tb-vis">
                                                        <? 
                                                        $i=0;
                                                        while ($reg=mysql_fetch_array($cnslt)) { 

                                                        $i++;
                                                        ?>
                                                        <tr id="f<? echo $i; ?>">
                                                            <td>
                                                                
                                                                    <textarea rows="3" name="dsc<? echo $i; ?>" id="dsc<? echo $i; ?>" maxlength="500" class="form-control"><? echo $reg["descripcion"]; ?></textarea>
                                                                
                                                                
                                                            </td>
                                                            <td>
                                                                <button title="Eliminar" data-id="f<? echo $i; ?>" type="button" class="elm btn-danger"><span class="glyphicon glyphicon-remove"></span></button>
                            
                                                            </td>

                                                        </tr>


                                                         <?}?>

                                                    </tbody>
                                                </table>

                                
                                  
                                  </div>
                            </div> 

                            <div class="form-group">&nbsp;</div>
                             <div class="form-group">&nbsp;</div>
                            <div class="form-group">&nbsp;</div>
                            <div class="form-group">&nbsp;</div>
                            <div class="form-group">&nbsp;</div>
                             <div class="form-group">&nbsp;</div>
                            <div class="form-group">&nbsp;</div>
                             <div class="form-group">&nbsp;</div>
                            <div class="form-group">&nbsp;</div>
                             <div class="form-group">&nbsp;</div>
                            <div class="form-group">&nbsp;</div>
                             <div class="form-group">&nbsp;</div>
                            <div class="form-group">&nbsp;</div>
                            

                            <div align="center" class="form-group">
                                <button title="Editar" id="actualizar" type="button" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span></button>
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


