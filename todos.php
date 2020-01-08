<?php
    require 'conexion.php';
    $viviendas = json_decode($data);
    foreach ($viviendas as $vivienda){
        $direccion = $vivienda->Direccion;
        $ciudad = $vivienda->Ciudad;
        $telefono = $vivienda->Telefono;
        $cod_pos = $vivienda->Codigo_Postal;
        $tipo = $vivienda->Tipo;
        $precio = $vivienda->Precio;
        echo '<pre>';
        echo $direccion;
        echo $ciudad;
        echo $telefono;
        echo $cod_pos;
        echo $tipo;
        echo $precio;
        echo '</pre>';
    }
?>