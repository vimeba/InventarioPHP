<?php       
    require("menu.php");
    if(isset($_SESSION['sesion_usuario'])) {    
        if($_SESSION['sesion_rol']!="Capturista")        
            header("Location: index.php");                
       }
       else
        header("Location: index.php");
       
?>

<div class="container cuerpo_pagina">
    <div class="panel panel-default">
        <div class="panel panel-heading col-center">        
            <div class="row">
                <div class="form-group col-sm-6 col-center">
                <h3>Registro de productos</h3>
                </div>
            </div>        
        </div>
        <div class="panel panel-body">    
            <form id="formulario_registro"  method="post">
                <div class="row">
                    <div class="form-group col-sm-6 col-center">
                        <label >Nombre de producto</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" onkeyup="valida_caja_texto(this,30);" />
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-sm-6 col-center">
                        <label >Descripción</label>
                        <textarea type="textArea" class="form-control" id="descripcion"
                        name="descripcion" onkeyup="valida_caja_texto(this,100)"></textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-sm-6 col-center">
                    <div class="form-group">
                        <label>Categoría</label>
                        <select id="categoria" name="categoria" class="form-control" onchange="valida_select(this);">
                            <option value="" selected>Seleccione una categoría</option>                            
                        </select>
                    </div> 
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-sm-6 col-center">
                    <div class="form-group">
                        <label>Sucursal</label>
                        <select id="sucursal" name="sucursal" class="form-control" onchange="valida_select(this);">
                            <option value="" selected>Seleccione una sucursal</option> 
                        </select>
                    </div> 
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-sm-6 col-center">
                        <label >Precio</label>
                        <input type="text" class="form-control" id="precio" name="precio" onkeyup="valida_solo_numeros(this,5)" />
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-sm-6 col-center">
                        <label >fecha de compra <span style="font-size:12px;">(aaaa/mm/dd)</span></label>
                        <input type="text" id="fecha_compra" name="fecha_compra" class="form-control" onkeyup="valida_fecha(this)" />
                    </div>
                </div>
                
                <div class="row">
                    <div class="form-group col-sm-6 col-center">
                        <input  class="btn btn-primary" value="Registrar" 
                        style="margin-left: auto;display:flex;margin-top:20px;" 
                        onclick="valida_registro();" />
                    </div>
                </div>
            
            </form>
        </div>    
    </div>
    <script>

        $( document ).ready(function() {                                    
            CargarCatalogos("categoria");
            CargarCatalogos("sucursal");                        
        });

        $("#fecha_compra").datepicker({
                dateFormat: 'yy-mm-dd', 
                onSelect: function() {
                    foco_validacion("fecha_compra","green");                    
                }
            });

    </script>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script>
</div>
<?php        
    require("footer.php");
?>