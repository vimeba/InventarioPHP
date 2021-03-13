<?php
    require("menu.php");
    if(isset($_SESSION['sesion_usuario'])) {
        if($_SESSION['sesion_rol']!="Gestor")
            header("Location: index.php");
       }
       else
        header("Location: index.php");
        echo "<script> var _id=".$_GET["id"].";</script>";
?>

<style>
    .form-control:disabled{
        background-color: white !important;
    }
</style>

<div class="container cuerpo_pagina">
    <div class="panel panel-default">
        <div class="panel panel-heading col-center">
            <div class="row">
                <div class="form-group col-sm-6 col-center">
                <h3>Editar Estado</h3>
                </div>
            </div>
        </div>
        <div class="panel panel-body">
            <form id="formulario_registro"  method="post">
                <div class="row">
                    <div class="form-group col-sm-6 col-center">
                        <label >Nombre de producto</label>
                        <input type="text" class="form-control" id="campo_1" name="campo_1" disabled="disabled" />
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-sm-6 col-center">
                        <label >Descripción</label>
                        <textarea type="textArea" class="form-control" id="campo_2" name="campo_2" disabled="disabled" > </textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-sm-6 col-center">
                    <div class="form-group">
                        <label>Categoría</label>
                        <input type="text" class="form-control" id="campo_3" name="campo_3" disabled="disabled" />
                    </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-sm-6 col-center">
                    <div class="form-group">
                        <label>Sucursal</label>
                        <input type="text" class="form-control" id="campo_4" name="campo_4" disabled="disabled" />
                    </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-sm-6 col-center">
                        <label >Precio</label>
                        <input type="text" class="form-control" id="campo_5" name="campo_5" disabled="disabled" />
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-sm-6 col-center">
                        <label >fecha de compra <span style="font-size:12px;">(aaaa/mm/dd)</span></label>
                        <input type="text" class="form-control" id="campo_6" name="campo_6" disabled="disabled" />
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-sm-6 col-center">
                    <div class="form-group">
                        <label>Categoría</label>
                        <select id="estado" name="estado" class="form-control" onchange="valida_select(this);">
                            <option value="" selected>Seleccione un estado</option>                            
                        </select>
                    </div> 
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-sm-6 col-center">
                        <label >fecha de compra <span style="font-size:12px;">(aaaa/mm/dd)</span></label>
                        <input type="text" class="form-control" id="campo_8" name="campo_8"  onkeyup="valida_caja_texto(this,100)" />
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-sm-6 col-center">
                        <input  class="btn btn-primary" value="Guardar"
                        style="margin-left: auto;display:flex;margin-top:20px;"
                        onclick="guardar_estado( <?php echo $_GET['id']; ?> );" />
                    </div>
                </div>

            </form>
        </div>
    </div>
    <script>

        $( document ).ready(function() {
            //console.log(_id);
            CargarCatalogos("estado");
            obtener_datos_producto(_id);            
        });

    </script>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script>
</div>
<?php        
    require("footer.php");
?>