<?php       
    require("menu.php");
    if(isset($_SESSION['sesion_usuario'])) {    
        header("Location: index.php");
       }        
?>

<div class="container cuerpo_pagina">
    <div class="panel panel-default">
        <div class="panel panel-heading col-center">        
            <div class="row">
                <div class="form-group col-sm-6 col-center">
                <h3>Login</h3>
                </div>
            </div>        
        </div>
        <div class="panel panel-body">    
            <form id="formulario_registro"  method="post">
                <div class="row">
                    <div class="form-group col-sm-6 col-center">
                        <label >Usuario</label>
                        <input type="text" class="form-control" id="usuario" name="usuario" onkeyup="valida_usuario(this,12)">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-6 col-center">
                        <label >Contraseña</label>
                        <input type="password" class="form-control" id="contrasenia" autocomplete="false"
                        name="contrasenia" onkeyup="valida_password()"/>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-6 col-center">
                        <input  class="btn btn-primary" value="Acceder" 
                        style="margin-left: auto;display:flex;margin-top:20px;" 
                        onclick="valida_acceso()" />
                    </div>
                </div>
            

            </form>
        </div>
    </div>
    
</div>
<?php        
    require("footer.php");
?>

 
  