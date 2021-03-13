<?php
    session_start();
?>
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

<!-- Bootstrap Date-Picker Plugin -->
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
<!-- <script src="http://code.jquery.com/jquery-1.9.1.js"></script> -->
<script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>

<script src="../scripts/scriptsAjax.js"></script>
<script src="../scripts/validaciones.js"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.24/datatables.min.css"/> 
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.24/datatables.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css"/> 
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>

<style>
    .col-center{
    float: none;
    margin: 0 auto;
  }

    .cuerpo_pagina{
        min-height:500px;
    }
</style>
<nav class="navbar navbar-expand-md navbar-dark bg-dark" style="background-color:#18165c !important">           
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">               
                <li class="nav-item">
                <a class="nav-link " aria-current="page" href="index.php">Home</a>
                </li>
                <?php 
                  if(isset($_SESSION['sesion_usuario'])) 
                  {   
                    if($_SESSION['sesion_rol']=="Capturista")
                      {
                ?>
                      <li class="nav-item">
                      <a class="nav-link " aria-current="page" href="registro.php">Registro</a>
                      </li>                          
                <?php 
                      }
                  }

                  if(isset($_SESSION['sesion_usuario'])) 
                  {   
                    if($_SESSION['sesion_rol']=="Gestor")
                      {
                ?>
                      <li class="nav-item">
                      <a class="nav-link " aria-current="page" href="bandeja.php">Bandeja</a>
                      </li>                          
                <?php 
                      }
                  }
                  
                  if(isset($_SESSION['sesion_usuario'])) 
                  {                       
                ?>
                      <li class="nav-item">
                      <a class="nav-link " aria-current="page" href="reportes.php">Reportes</a>
                      </li>                          
                <?php                     
                  }                
                ?>                
            </ul>
            <?php
                if(!isset($_SESSION['sesion_usuario'])) {     
                    echo '<a class="navbar-brand bi bi-person-fill" style="margin-left:auto;display:flex;" href="login.php">Login</a>';
                }else{
                    echo '<a class="navbar-brand" style="margin-left:auto;display:flex;" href="cerrar_sesion.php">Cerrar sesión</a>';
                }                
            ?>
            </div>  
</nav>
<?php
    if(isset($_SESSION['sesion_usuario'])) {  
         echo "<span > Bienvenido ".$_SESSION['sesion_usuario']."</span>";
    }
?>
<br/><br/>

<!-- Modal -->
<div class="modal fade" id="MensajesModal" tabindex="-1" aria-labelledby="MensajesModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="MensajesModalLabel">Mensaje</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="modal_datos">        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>        
      </div>
    </div>
  </div>
</div>
