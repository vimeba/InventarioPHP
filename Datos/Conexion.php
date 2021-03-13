<?php
    $server='localhost';
    $usuario='root';
    $password='';
    $bd='bd_inventario_vmb';
    try {
        $conexion = null;
        $conexion = new PDO("mysql:host=$server;dbname=$bd", $usuario, $password);
//        foreach($mbd->query('SELECT * from perfil') as $fila) {
//            print_r($fila);
//        }
    } catch (PDOException $e) {
        print "¡Error!: " . $e->getMessage() . "<br/>";
        die();
    }
?>