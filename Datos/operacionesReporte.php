<?php
require("Conexion.php");

$accion= $_POST["accion"];
switch($accion)
{
    case 'consulta':        
        $query = "SELECT 
        producto.id_producto as ID
        ,producto.nombre as Nombre
        ,categoria.nombre as Categoria
        ,sucursal.nombre as Sucursal
        ,estado.nombre as Estado
        ,producto.fecha_compra as Fecha
        FROM producto
        INNER JOIN categoria ON categoria.id = producto.categoria 
        INNER JOIN sucursal ON sucursal.id = producto.sucursal
        INNER JOIN estado ON estado.id = producto.estado";

        $res = $conexion->prepare($query);
        $res->execute();
        $productos = array();
        while($row=$res->fetch(PDO::FETCH_ASSOC))
        { 
            $productos['data'][] = $row;      
        }        
        echo json_encode($productos);
    break;        
    default:
        die();
    break;
}

?>