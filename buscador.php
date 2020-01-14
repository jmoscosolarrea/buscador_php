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
    $longitud_array = count($viviendas);
    $cuenta_casa = 0;
    echo "La longitud del arreglo es: $longitud_array";
    for ($x = 0; $x < $longitud_array; $x++){
        $id = $viviendas[$x]->Id;
        $direccion = $viviendas[$x]->Direccion;
        $ciudad = $viviendas[$x]->Ciudad;
        $telefono = $viviendas[$x]->Telefono;
        $cod_pos = $viviendas[$x]->Codigo_Postal;
        $tipo = $viviendas[$x]->Tipo;
        $precio = $viviendas[$x]->Precio;
        $precio_entero = substr($precio,1);
        if ($ciudad == "New York" && $tipo == "Casa" && $precio_entero >= 0 && $precio_entero <=100000){
            $cuenta_casa++;
            $inmuebles=array("Id"=>$id,"Direccion"=>$direccion,"Ciudad"=>$ciudad,"Telefono"=>$telefono,"Codi Postal"=>$cod_pos,"Tipo"=>$tipo,"Precio"=>$precio);
            array_push($inmuebles);

        }
    }
    echo "El numero de casas en New York es: $cuenta_casa";
    echo json_encode($inmuebles);

    /*foreach ($viviendas as $vivienda){
        $id = $vivienda->Id;
        $direccion = $vivienda->Direccion;
        $ciudad = $vivienda->Ciudad;
        $telefono = $vivienda->Telefono;
        $cod_pos = $vivienda->Codigo_Postal;
        $tipo = $vivienda->Tipo;
        $precio = $vivienda->Precio;
        $precio_entero = substr($precio,1);
       /* echo '<pre>';
        echo "Ciudad Post: $ciudad_post <br>";
        echo "Tipo_Post: $tipo_post <br>";
        echo "Rango_post: $rango_post <br>";
        echo "Pos: $pos <br>";
        echo "Precio1: $precio1 <br>";
        echo "Precio2: $precio2 <br>";
        echo "Longciudad_post: $longciudad_post<br>";
        echo "Longtipo_post: $longtipo_post <br>";
        echo "Ciudad: $ciudad <br>";
        echo "Tipo: $tipo<br>";
        echo "Precio: $precio <br>";
        echo '</pre>';*/
        //if ($id == 13 || $id == 39){
            //echo "estoy en id = 13 y el precio es: $precio_entero";
       /* if ($longciudad_post > 0){
            //echo "<pre>ciudad post es mayor que cero<br></pre>";
            if($longtipo_post > 0){
              //  echo "<pre>longitud post es mayor que cero<br></pre>";
                if($ciudad == $ciudad_post && $tipo == $tipo_post && $precio_entero >= $precio1 && $precio_entero <= $precio2){
                    //echo " estoy en la comparacion";
                    $inmuebles=array("Id"=>$id,"Direccion"=>$direccion,"Ciudad"=>$ciudad,"Telefono"=>$telefono,"Codi Postal"=>$cod_pos,"Tipo"=>$tipo,"Precio"=>$precio);
                    //echo "inmuebles: $inmuebles <br>";
                    array_push($inmuebles);
                }
                }else{
                    echo "longitud tipo es menor que cero";
                    if($ciudad == $ciudad_post && $precio >= $precio1 && $precio <= $precio2){
                      //  echo " estoy en la comparacion longitud tipo menor que cero";
                        $inmuebles=array("Id"=>$id,"Direccion"=>$direccion,"Ciudad"=>$ciudad,"Telefono"=>$telefono,"Codi Postal"=>$cod_pos,"Tipo"=>$tipo,"Precio"=>$precio);
                      //  echo "inmuebles longitud tipo menor que 0: $inmuebles <br>";
                        array_push($inmuebles);
                }
            }
        }else{
                if($longtipo_post > 0){
                    //echo "longitud ciudad menor que cero y longitud tipo mayor que cero";
                    if($tipo == $tipo_post && $precio >= $precio1 && $precio <= $precio2){
                    //    echo "estoy en la condicion longitud ciudad menor que cero y lontitud tipo mayor que 0";
                        $inmuebles=array("Id"=>$id,"Direccion"=>$direccion,"Ciudad"=>$ciudad,"Telefono"=>$telefono,"Codi Postal"=>$cod_pos,"Tipo"=>$tipo,"Precio"=>$precio);
                    //    echo "inmuebles longitud ciudad menor que 0 y longitud tipo mayor que 0: $longtipo_post <br>";
                        array_push($inmuebles);
                    }   
                }else{
                    //echo "no hay ciudad ni tipo";
                    if($precio >= $precio1 && $precio <= $precio2){
                        $inmuebles=array("Id"=>$id,"Direccion"=>$direccion,"Ciudad"=>$ciudad,"Telefono"=>$telefono,"Codi Postal"=>$cod_pos,"Tipo"=>$tipo,"Precio"=>$precio);
                    //    echo "inmuebles no existe ciudad ni tipo: $inmuebles <br>";
                        array_push($inmuebles);
                    }
                }
            }   
       // }        
    }*/
    //print_r(json_encode($inmuebles));
    //echo json_encode($inmuebles);
?>