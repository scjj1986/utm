<?php
session_start();
require("conectar.php");
$cnslt=mysql_query("SELECT * FROM ciudad");

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

<script type='text/javascript' language='javascript' src='js/ciudades.js'></script>

<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title"><span align="right" class="glyphicon glyphicon-list"></span><b>&nbsp;&nbsp;CIUDADES</b></h3>
  </div>
  <div class="panel-body">
    <div class="container" align="center">

                        <form role="form" class="form-horizontal">
                            <div class="form-group" style="width:700px;"><p align="center">
                                <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            
                                            <th>Nombre</th>
                                            <th width="20">Opciones</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Opciones</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php 
                                      
                                        while($fl=mysql_fetch_array($cnslt)){

                                      ?>
                                        <tr>
                                            <td><? echo $fl["nombre"];?></td>
                                            <td><button title="Editar" type="button" data-id="<? echo $fl["id"]; ?>" data-nombre="<? echo $fl["nombre"]; ?>" class="editar btn btn-warning"><span class="glyphicon glyphicon-pencil"></span></button></td>
                                        </tr>
                                        <?php 
                                      
                                        }

                                      ?>
                                        
                                    </tbody>
                                </table> </p>
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

<!-- -----------------------------------------------------------Modal-------------------------------------------------------- -->
<div data-nmod="1" class="modal fade" id="ModalCiu" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Formulario de Ciudades</h4>
      </div>
      <div class="modal-body">
        <div class="container">

                        <form role="form" class="form-horizontal" id="frmciu">
                            <div class="form-group">

                                <label for="nombre" class="col-sm-2 control-label">Nombre</label>
                                  <div class="col-sm-3">
                                    <input type="text" class="form-control" value="" name="nombre" id="nombre" />
                                    
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

