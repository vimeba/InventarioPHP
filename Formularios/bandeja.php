<?php
    require("menu.php");
    if(isset($_SESSION['sesion_usuario'])) {
        if($_SESSION['sesion_rol']!="Gestor")
            header("Location: index.php");
       }
       else
        header("Location: index.php");        
?>

<div class="container cuerpo_pagina">
    <div class="panel panel-default">
        <div class="panel panel-heading ">        
            <div class="row">
                <div class="form-group col-sm-10 col-center">
                <h3>Bandeja</h3>
                </div>                
            </div>        
        </div>
        <div class="panel panel-body">    
            <form id="formulario_registro"  method="post">
            <div class="row">
                <div class="form-group col-sm-10 col-center">
                    <table id="tabla_bandeja" class="display nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre del producto</th>
                                    <th>Categoria</th>
                                    <th>Sucursal</th>
                                    <th>Editar</th>
                                    <th>Eliminar</th>
                                </tr>
                            </thead>
                    </table>
                </div>
            </div>

            </form>
        </div>

<!-- Modal -->
<!-- <div class="modal fade" id="EliminaModal" tabindex="-1" aria-labelledby="EliminaModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="EliminaModalLabel">Alerta</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ¿Seguro que quiere eliminar este producto?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Si</button>
        <button type="button" onclick="elimina()" class="btn btn-secondary" data-bs-dismiss="modal">No</button>        
      </div>
    </div>
  </div>
</div> -->


    </div>
    <script>
        //$(document).ready(function() { 
          var _tabla;
        window.onload = function() {

//          console.log("get data --- "+obtener_datos_tabla());

      _tabla=$('#tabla_bandeja').DataTable( {
                data: obtener_datos_tabla(),//_json.data,
                "columns": 
                        [
                            { "data": "ID" },
                            { "data": "Nombre" },
                            { "data": "categoria" },
                            { "data": "sucursal" },
                            { "data": "Editar" },
                            { "data": "Eliminar" }
                        ]                        
            } );
         };
    </script>
<!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.24/datatables.min.css"/> 
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.24/datatables.min.js"></script> -->
</div>
<?php        
    require("footer.php");
?>
