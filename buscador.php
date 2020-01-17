<?php
    require 'conexion.php';
    $ciudad_post = $_POST["ciudad"];
    $tipo_post = $_POST["tipo"];
    $rango_post = $_POST["precio"];
    $viviendas = json_decode($data);
    $pos = strpos($rango_post, ";");
    $precio1 = substr($rango_post, 0, $pos);
    $precio1 = number_format($precio1);
    $precio2 = substr($rango_post, $pos + 1);
    $precio2 = number_format($precio2);
    $longciudad_post = strlen($ciudad_post);
    $longtipo_post = strlen($tipo_post);
    $longitud_array = count($viviendas);
    $cuenta_casa = 0;
    $inmuebles1=array();
    $inmuebles=array();
    for ($x = 0; $x < $longitud_array; $x++){
        $id = $viviendas[$x]->Id;
        $direccion = $viviendas[$x]->Direccion;
        $ciudad = $viviendas[$x]->Ciudad;
        $telefono = $viviendas[$x]->Telefono;
        $cod_pos = $viviendas[$x]->Codigo_Postal;
        $tipo = $viviendas[$x]->Tipo;
        $precio = $viviendas[$x]->Precio;
        $precio_entero = substr($precio,1);
        if ($longciudad_post > 0){
            if($longtipo_post > 0){
                if($ciudad == $ciudad_post && $tipo == $tipo_post && (($precio_entero >= $precio1 && $precio_entero <= $precio2) || ($precio1 == $precio2))){                    
                    $inmuebles=array("Id"=>$id,"Direccion"=>$direccion,"Ciudad"=>$ciudad,"Telefono"=>$telefono,"Codigo_Postal"=>$cod_pos,"Tipo"=>$tipo,"Precio"=>$precio);
                    array_push($inmuebles1,$inmuebles);
                }
                }else{
                    if($ciudad == $ciudad_post && $precio >= $precio1 && $precio <= $precio2){
                        $inmuebles=array("Id"=>$id,"Direccion"=>$direccion,"Ciudad"=>$ciudad,"Telefono"=>$telefono,"Codigo_Postal"=>$cod_pos,"Tipo"=>$tipo,"Precio"=>$precio);
                        array_push($inmuebles1,$inmuebles);
                }
            }
        }else{
                if($longtipo_post > 0){
                    if($tipo == $tipo_post && (($precio_entero >= $precio1 && $precio_entero <= $precio2) || ($precio1 == $precio2))){
                        $inmuebles=array("Id"=>$id,"Direccion"=>$direccion,"Ciudad"=>$ciudad,"Telefono"=>$telefono,"Codigo_Postal"=>$cod_pos,"Tipo"=>$tipo,"Precio"=>$precio);
                        array_push($inmuebles1,$inmuebles);
                    }   
                }else{
                    if(($precio_entero >= $precio1 && $precio_entero <= $precio2) || ($precio1 == $precio2)){
                        $inmuebles=array("Id"=>$id,"Direccion"=>$direccion,"Ciudad"=>$ciudad,"Telefono"=>$telefono,"Codigo_Postal"=>$cod_pos,"Tipo"=>$tipo,"Precio"=>$precio);
                        array_push($inmuebles1,$inmuebles);
                    }
                }
            }   
    }
    echo json_encode($inmuebles1);
?>