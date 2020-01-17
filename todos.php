<?php
    require 'conexion.php';
    $viviendas = json_decode($data);
    echo json_encode($viviendas);
?>