<?php
    require("menu.php");
    if(!isset($_SESSION['sesion_usuario'])) 
            header("Location: index.php");               
?>

<div class="container cuerpo_pagina">
    <div class="panel panel-default">
        <div class="panel panel-heading ">        
            <div class="row">
                <div class="form-group col-sm-12 col-center">
                <h3>Reportes</h3>
                </div>                
            </div>        
        </div>
        <div class="panel panel-body">    
            <form id="formulario_registro"  method="post">
            <div class="row">
                <div class="form-group col-sm-12 col-center">
                    <table id="tabla_reportes" class="display nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre del producto</th>
                                    <th>Categoria</th>
                                    <th>Sucursal</th>
                                    <th>Estado</th>
                                    <th>Fecha de compra</th>
                                </tr>
                            </thead>
                    </table>
                </div>
            </div>

            </form>
        </div>


    </div>
    <script>

          var _tablaReportes;
        window.onload = function() {

            _tablaReportes=$('#tabla_reportes').DataTable( {
                data: obtener_datos_reporte(),                                
                "columns": 
                        [
                            { "data": "ID" },
                            { "data": "Nombre" },
                            { "data": "Categoria" },
                            { "data": "Sucursal" },
                            { "data": "Estado" },
                            { "data": "Fecha" }
                        ],                      
            } );                        

            
            // _tablaReportes.DataTable({


            //     $('#myTable').DataTable( {
            //         buttons: [
            //             'copy', 'excel', 'pdf'
            //         ]
            //         } );

            // });

         };
    </script>

</div>
<?php        
    require("footer.php");
?>
