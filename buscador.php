<?php
    require 'conexion.php';
    $ciudad_post = $_POST["ciudad"];
    $tipo_post = $_POST["tipo"];
    $rango_post = $_POST["precio"];
    $pos = strpos($rango_post,";");
    $precio1 = substr($rango_post, 0, $pos);
    $precio2 = substr($rango_post, $pos + 1);
    $inmuebles[]="";
    $viviendas = json_decode($data);
    $longciudad_post = strlen($ciudad_post);
    $longtipo_post = strlen($tipo_post);
    foreach ($viviendas as $vivienda){
        $direccion = $vivienda->Direccion;
        $ciudad = $vivienda->Ciudad;
        $telefono = $vivienda->Telefono;
        $cod_pos = $vivienda->Codigo_Postal;
        $tipo = $vivienda->Tipo;
        $precio = $vivienda->Precio;
        if ($longciudad_post > 0){
            if($longtipo_post > 0){
                if($ciudad == $ciudad_post && $tipo == $tipo_post && $precio >= $precio1 && $precio <= $precio2){
                    $inmuebles=array("Direccion"=>$direccion,"Ciudad"=>$ciudad,"Telefono"=>$telefono,"Codi Postal"=>$cod_pos,"Tipo"=>$tipo,"Precio"=>$precio);
                    array_push($inmuebles,$inmuebles);
                }
            }else{
                if($ciudad == $ciudad_post && $precio >= $precio1 && $precio <= $precio2){
                    $inmuebles=array("Direccion"=>$direccion,"Ciudad"=>$ciudad,"Telefono"=>$telefono,"Codi Postal"=>$cod_pos,"Tipo"=>$tipo,"Precio"=>$precio);
                    array_push($inmuebles,$inmuebles);
                }
            }
        }else{
            if($longtipo_post > 0){
                if($tipo == $tipo_post && $precio >= $precio1 && $precio <= $precio2){
                    $inmuebles=array("Direccion"=>$direccion,"Ciudad"=>$ciudad,"Telefono"=>$telefono,"Codi Postal"=>$cod_pos,"Tipo"=>$tipo,"Precio"=>$precio);
                    array_push($inmuebles,$inmuebles);
                }
            }else{
                if($precio >= $precio1 && $precio <= $precio2){
                    $inmuebles=array("Direccion"=>$direccion,"Ciudad"=>$ciudad,"Telefono"=>$telefono,"Codi Postal"=>$cod_pos,"Tipo"=>$tipo,"Precio"=>$precio);
                    array_push($inmuebles,$inmuebles);
                }
            }
        }
        
    }
    print_r(json_encode($inmuebles));
    echo json_encode($inmuebles);
?>