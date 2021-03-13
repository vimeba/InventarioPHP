<?php
require("Conexion.php");

try{
    $prod= $_POST["producto"];    
    $datos_producto = json_decode($prod);     
    //echo $datos_producto->nombre;    
    $fecha_actual=  date("y-m-d"); //"2021-03-11";
    $query = "INSERT INTO `producto` (`id_producto`, `nombre`, `descripcion`, `categoria`, `sucursal`, 
    `precio`, `fecha_compra`, `estado`, `comentarios`, `fecha_captura`) 
    VALUES (NULL, '".$datos_producto->nombre."', '".$datos_producto->descripcion."',
    '".$datos_producto->categoria."', '".$datos_producto->sucursal."', 
    '".$datos_producto->precio."','".$datos_producto->fecha_compra."', 
    '".$datos_producto->estado."', '', '". $fecha_actual ."');"; 
    $res = $conexion->prepare($query);
    $res->execute();    
    echo "ok";
}
catch(Exception $ex){
   echo  $e->getMessage();
}

?>