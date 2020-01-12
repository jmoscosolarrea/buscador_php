<?php
    require 'conexion.php';
    $viviendas = json_decode($data);
    echo json_encode($viviendas);
  /*  foreach ($viviendas as $vivienda){
        
        $direccion = $vivienda->Direccion;
        $ciudad = $vivienda->Ciudad;
        $telefono = $vivienda->Telefono;
        $cod_pos = $vivienda->Codigo_Postal;
        $tipo = $vivienda->Tipo;
        $precio = $vivienda->Precio;
        echo '<pre>';
        echo "Direccion: $direccion <br>";
        echo "Ciudad: $ciudad <br>";
        echo "Telefono: $telefono <br>";
        echo "Codigo postal: $cod_pos <br>";
        echo "Tipo: $tipo <br>";
        echo "Precio: $precio <br>";
        echo '</pre>';
    }*/
?>