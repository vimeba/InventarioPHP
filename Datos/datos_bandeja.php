<?php
require("Conexion.php");

$accion= $_POST["accion"];
switch($accion)
{
    case 'consulta':        
        $query = "SELECT producto.id_producto as ID, producto.nombre as Nombre, categoria.nombre as categoria,"
        ." sucursal.nombre as sucursal, "
        ."( SELECT CONCAT (\"<input type='button' value='Editar' onclick='edita_producto(\" ,"
        ." producto.id_producto ,\");'>\" ) ) as Editar, "
        ."( SELECT CONCAT (\"<input type='button' value='Eliminar' onclick='elimina_producto(\" ,"
        ." producto.id_producto ,\");'>\" ) ) as Eliminar "
        ." FROM `producto` INNER JOIN categoria ON categoria.id = producto.categoria INNER JOIN sucursal ON sucursal.id = producto.sucursal";

        $res = $conexion->prepare($query);
        $res->execute();
        $productos = array();
        while($row=$res->fetch(PDO::FETCH_ASSOC))
        { 
            $productos['data'][] = $row;      
        }        
        echo json_encode($productos);
    break;    
    case 'eliminar':
        try
        {                        
            $id= $_POST["id"];
            $query = "DELETE FROM `producto` WHERE `producto`.`id_producto` = $id";   
            $res = $conexion->prepare($query);
            $res->execute();
            echo "ok";
        }
        catch(Exception $ex)
        {
            echo "error : ".$ex;
        }
        break;    
    case 'consulta_producto':
        $query="SELECT producto.id_producto
        ,producto.nombre
        ,producto.descripcion
        ,categoria.nombre as categoria
        ,sucursal.nombre as sucursal
        ,producto.precio
        ,producto.fecha_compra
        ,estado.nombre as estado
        ,producto.comentarios
        ,producto.fecha_captura
        FROM producto 
        INNER JOIN categoria ON categoria.id = producto.categoria 
        INNER JOIN sucursal ON sucursal.id = producto.sucursal
        INNER JOIN estado ON estado.id = producto.estado
        WHERE producto.id_producto=".$id= $_POST["id"];
        $res = $conexion->prepare($query);
        $res->execute();
        $productos = array();
        while($row=$res->fetch(PDO::FETCH_ASSOC))
        { 
            $productos['data'][] = $row;      
        }        
        echo json_encode($productos);
        break;            
    case 'edita_estado':
        try
        {               
            $id= $_POST["id"];
            $estado= $_POST["estado"];            
            $comentarios= $_POST["comentarios"];        
            $query = "UPDATE producto SET estado =". $estado
            .", comentarios = '".$comentarios."' WHERE producto.id_producto = $id";               

            $res = $conexion->prepare($query);
            $res->execute();
            
            echo "ok";
        }
        catch(Exception $ex)
        {
            echo "error : ".$ex;
        }
        break;
    default:
        die();
    break;
}

?>