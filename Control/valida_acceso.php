<?php
//error_reporting(0);
session_start();
require("../Datos/conexion.php");

    $mensaje="";
    if ($_POST["usuario"] == null || $_POST["password"] == null)
    {
        $mensaje="Es necesario llenar los campos de usuario y contraseña";
    }
    else
    {
        try
        {
                         
            $consulta='SELECT usuarios.password as password, usuarios.usuario as usuario, perfil.nombre as rol  FROM usuarios INNER JOIN perfil ON perfil.id_perfil = usuarios.perfil WHERE usuarios.usuario =:user ';
            $datos = $conexion->prepare($consulta);
            $datos->bindParam(':user', $_POST['usuario']);
            $datos->execute();
            $datos = $datos->fetch(PDO::FETCH_ASSOC);    

            if(isset($datos['password'])){
                if ($_POST['password'] == $datos['password']) 
                {
                    date_default_timezone_set('America/Mexico_City');
                    $dateTime= date('Y-m-d\TH:i:s');                                                        
                    $query2="INSERT INTO bitacora (usuario, fecha) VALUES (\"".$_POST['usuario']."\" , '".$dateTime."')";                             
                    $res2=$conexion->prepare($query2);
                    $res2->execute();                     
                    echo "ok";        
                    $_SESSION['sesion_usuario'] = $datos['usuario'];
                    $_SESSION['sesion_rol'] = $datos['rol'];
                    die();
                } 
                else 
                {
                    $mensaje = 'Usuario y/o contraseña incorrectos, revise sus credenciales';
                }            
            }
            else{
                $mensaje = 'Usuario y/o contraseña incorrectos, revise sus credenciales';
            }
        }
        catch(Exception $ex)
        {
            $mensaje="Ha ocurrido un error: ".$e->getMessage();
        }
    }
    echo $mensaje;

?>