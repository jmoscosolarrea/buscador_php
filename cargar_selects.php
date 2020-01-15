<?php
    const CIUDADES = array('New York','Orlando','Los Angeles','Houston','Washington','Miami');
    const TIPO = array('Casa','Casa de Campo','Apartamento');
    $tipo_post = $_POST["tipo_cargar"];
    if ($tipo_post == "ciudad"){
        //$arreglo_ciudad = ["New York","Orlando","Los Angeles","Houston","Washington","Miami"];
                //echo json_encode($arreglo_ciudad);
       // echo (CIUDADES);
        echo json_encode(CIUDADES);
    }else{
        if($tipo_post == "tipo"){
            //$arreglo_tipo = ["Casa","Casa de Campo","Apartamento"];
            
            //echo json_encode($arreglo_tipo);
            //echo (TIPO);
            echo json_encode(TIPO);
        };
    };
?>