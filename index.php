<?php
session_start();
require("conectar.php");
//if ($_SESSION['perfil']=="ADMINISTRADOR"){

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SISTEMA DE SERVICIOS DE LA UNION DE TRANSPORTE MARVAL A.C. - MARACAY, EDO- ARAGUA.</title>
  <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link href="css/sweetalert.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="include/ui-1.10.0/ui-lightness/jquery-ui-1.10.0.custom.min.css" type="text/css" />
    <link rel="stylesheet" href="css/jquery.ui.timepicker.css?v=0.3.3" type="text/css" />

    <script src="js/jquery-3.1.1.min.js"></script>

    
    <!--------------------------------- TimePicker   ---------------------------------------->
    <script type="text/javascript" src="include/jquery-1.9.0.min.js"></script>
    <script type="text/javascript" src="include/ui-1.10.0/jquery.ui.core.min.js"></script>
    <script type="text/javascript" src="include/ui-1.10.0/jquery.ui.widget.min.js"></script>
    <script type="text/javascript" src="include/ui-1.10.0/jquery.ui.tabs.min.js"></script>
    <script type="text/javascript" src="include/ui-1.10.0/jquery.ui.position.min.js"></script>
    <!---------------------------------------------------------------------------------------->





    <script src="js/bootstrap.min.js"></script>


    <script src="js/sweetalert.min.js"></script>


    <script type="text/javascript" language="javascript" src="js/jquery.dataTables.min.js">
    </script>
    <script type="text/javascript" language="javascript" src="js/dataTables.bootstrap.min.js">
    </script>
    
    <script type="text/javascript" language="javascript" src="js/index.js"></script>

    <script type="text/javascript" src="js/jquery.numeric.js"></script>

    <script type="text/javascript" src="js/jquery.ui.timepicker.js?v=0.3.3"></script>
    <script type="text/javascript" src="js/jquery.ui.timepicker-es.js"></script>

    <script type="text/javascript" src="js/bootstrap-filestyle.js"></script>
    <script type="text/javascript" src="js/bootstrap-filestyle.min.js"></script>


</head>

<body style="padding-top: 1px; background-color:#A9D0F5;">


<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
<img width="100%" height="90px" src="img/banner.png"/>
  <ul class="nav nav-pills">
    <li class=""><a id="inicio" href="#"><b>Inicio</b></a></li>
    <li><a id="mis" href="#"><b>Misión</b></a></li>
    <li><a id="vis" href="#"><b>Visión</b></a></li>
    <li><a id="org" href="#"><b>Organigrama</b></a></li>
    <?
    if ($_SESSION['perfil']=="ADMINISTRADOR"){
    ?>

    <li><a id="ciu" href="#"><b>Cuidades</b></a></li>
    <li><a id="rut" href="#"><b>Rutas</b></a></li>
    <li class="dropdown">
        <a width="100px" href="#" data-toggle="dropdown" class="dropdown-toggle"><b>Reservas</b><b class="caret"></b></a>
        <ul class="dropdown-menu">
            
            <li><a id="procesar" href="#">Procesar</a></li>
            <li><a id="busres" href="#">Buscar</a></li>
        </ul>
    </li>
    <li><a id="usu" href="#"><b>Usuarios</b></a></li>


    <li class="dropdown pull-right">
        <a width="100px" href="#" data-toggle="dropdown" class="dropdown-toggle"><b><div id="nomusu"><? echo $_SESSION['nombrecompleto']; ?></div></b><b class="caret"></b></a>
        <ul class="dropdown-menu">
            
            <li><a id="logout" href="#">Cerrar Sesión</a></li>
        </ul>
    </li>


    <?
    } else {
    ?>

    <li><a id="rut2" href="#"><b>Rutas</b></a></li>
    <li><a id="conres" href="#"><b>Consultar Reservas</b></a></li>
    <li class="pull-right"><a style="cursor:pointer;" id="login" href="#"><b>Iniciar Sesión</b></a></li>
    <?
    }
    ?>
    

    <!--


    -->

    
    
</ul>

</nav>

<table align="center">

<tr><td>

<div class="modal-dialog" style="padding-top: 10em; width:1250px;">

    <div id="capa">
    </div>

            
</div>



</td></tr>


 </table>

 <div data-nmod="1" class="modal fade" id="ModalLogin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="panel panel-primary">
  <div class="panel-heading">
    <h2 class="panel-title"><span align="right" class="glyphicon glyphicon-user"></span> <b>INICIO DE SESIÓN</b></h2>
  </div>
  <div class="panel-body">
    <div class="container">

                        <form role="form" class="form-horizontal" id="frmlgn">
                            <div class="form-group">

                                <label for="lgn" class="col-sm-2 control-label">Login</label>
                                  <div class="col-sm-3">
                                    <input type="text" class="enter form-control" name="lgn" id="lgn" placeholder="" />
                                  </div>
                                
                            </div>
                            <div class="form-group">
                                <label for="clv" class="col-sm-2 control-label">Clave</label>
                                <div class="col-sm-3">
                                    <input type="password" class="enter form-control" name="clv" id="clv" placeholder="" />
                                </div>
                            </div>          
                        </form>

                    </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-success" id="acceder">Acceder</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
              </div>
          </div>

</div>
  </div>
</div>

  



</body>
</html>

<? 

/*
}else{
  

  print("<script>window.location.replace('../index.php');</script>");
}*/



?>