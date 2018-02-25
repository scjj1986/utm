
<?php
session_start();
require("conectar.php");
$cnslt=mysql_query("SELECT * FROM usuario");

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
<script type='text/javascript' language='javascript' src='js/usuarios.js'></script>
<div class="panel panel-primary">
  <div class="panel-heading">
    <h2 class="panel-title"><span align="right" class="glyphicon glyphicon-list"></span><b>&nbsp;&nbsp;USUARIOS</b></h2>
  </div>
  <div class="panel-body">
    <div class="container">

                        <form role="form" class="form-horizontal">
                            <div class="form-group">
                                <table id="example" class="table table-striped table-bordered" align="right" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Apellido</th>
                                            <th>Login</th>
                                            <th width="10%">Activo</th>
                                            <th width="10%">Opciones</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Apellido</th>
                                            <th>Login</th>
                                            <th>Activo</th>
                                            <th>Opciones</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php 
                                      
                                        while($usu=mysql_fetch_array($cnslt)){

                                      ?>
                                        <tr>
                                            <td><? echo $usu["nombre"];?></td>
                                            <td><? echo $usu["apellido"];?></td>
                                            <td><? echo $usu["login"];?></td>
                                            <td><? echo $usu["activo"];?></td>
                                            <td><button title="Editar" type="button" data-id="<? echo $usu["id"]; ?>" class="editar btn btn-warning"><span class="glyphicon glyphicon-pencil"></span></button></td>
                                        </tr>
                                        <?php 
                                      
                                        }

                                      ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                            <div class="form-group" align="center">
                                <label><a id="agregar" class=" btn btn-success">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Agregar&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></label>
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


