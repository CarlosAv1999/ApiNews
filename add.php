<?php
    //include_once 'alloycors.php';
    //include('top-cache.php'); 
    include_once 'apipeliculas.php';
    
    $api = new ApiNoticias();
    $nombre = '';
    $error = '';
/*
    if(isset($_POST['nombre']) && isset($_FILES['imagen'])){

        if($api->subirImagen($_FILES['imagen'])){
            $item = array(
                'nombre' => $_POST['nombre'],
                'imagen' => $api->getImagen()
            );
            $api->add($item);
        }else{
            $api->error('Error con el archivo: ' . $api->getError());
        }
    }else{
        $api->error('Error al llamar a la API');
    }
*/
    if(isset($_POST['nombre']) && isset($_POST['descripcion'])){
        $item = array(
            'nombre' => $_POST['nombre'],
            'descripcion' => $_POST['descripcion']
        );
        //$api->add($item);
    }else{
        $api->error('Error al llamar a la API');
    }


    //include('bottom-cache.php');
?>