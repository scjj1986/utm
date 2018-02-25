<?
session_start();
require("conectar.php");
$qr=mysql_query("SELECT * FROM usuario WHERE id=".$_GET["id"]);
$usu = mysql_fetch_array($qr);


?>

<script type='text/javascript' language='javascript' src='js/usuarios.js'></script>
<div class="panel panel-primary">
  <div class="panel-heading">
    <h2 class="panel-title"><span align="right" class="glyphicon glyphicon-pencil"></span><b>&nbsp;&nbsp;EDITAR USUARIO</b></h2>
  </div>
  <div class="panel-body">
    <div class="container">

                        <form role="form" id="frmusu" class="form-horizontal">
                            
                             
                            <div class="form-group">

                                <label for="nombre" class="col-sm-1 control-label">Nombre:</label>
                                <div class="col-sm-3">
                                <input type="text" maxlength="50" class="let form-control" name="nombre" id="nombre" value="<? echo $usu['nombre']; ?>" placeholder="" />
                                </div>
                                <label for="apellido" class="col-sm-2 control-label">Apellido:</label>
                                <div class="col-sm-3">
                                <input type="text" class="let form-control" maxlength="50" name="apellido" id="apellido" value="<? echo $usu['apellido']; ?>" placeholder="" />
                                </div>
                                <label for="apellido" class="col-sm-1 control-label">Login:</label>
                                <div class="col-sm-2">
                                <input type="text" class="form-control" maxlength="50" name="login" id="login" value="<? echo $usu['login']; ?>" placeholder="" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="pss" class="col-sm-1 control-label">Contraseña:</label>
                                <div class="col-sm-3">
                                    <input type="password" maxlength="20" class="form-control" name="pss" id="pss" value="<? echo $usu['clave']; ?>" placeholder="" />
                                 </div>
                                <label for="pss2" class="col-sm-2 control-label">Repetir Contraseña:</label>
                                <div class="col-sm-3">
                                    <input type="password" maxlength="20" class="form-control" name="pss2" id="pss2" value="<? echo $usu['clave']; ?>" placeholder="" />
                                 </div>
                                 <label class="col-sm-1 control-label">Activo:</label>
                                <div class="col-sm-1">
                                    <select name="act" id="act" class="form-control">
                                        <option value="<? echo $usu['activo']; ?>" ><? echo $usu['activo']; ?> </option> 
                                        <option value="SI">SÍ</option>
                                        <option value="NO">NO</option>
                                    </select>
                                 </div>
                            </div>

                            <div class="form-group">
                                &nbsp;
                            </div>

                            <input hidden name="idu" id="idu" value="<? echo $usu['id']; ?>" />

                            <div class="form-group" align="center">
                                <label><a id="guardar" class="btn btn-success">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Guardar&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></label>-<label><a id="volver" class="btn btn-danger">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Volver&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></label>
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


