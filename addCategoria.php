<?php
    //include_once 'alloycors.php';
    include_once 'apinoticia.php';
    
    $api = new ApiNoticias();
    $name = '';
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
    if(isset($_POST['name'])){
        $item = array(
            'name' => $_POST['name'],
        );
        $api->addCategoria($item);
    }else{
        $api->error('Error al llamar a la API');
    } 
?>