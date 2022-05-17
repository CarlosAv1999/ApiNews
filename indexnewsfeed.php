<?php
//include('top-cache.php'); 
include_once 'alloycors.php';
include_once 'apinoticia.php';

$api = new ApiNoticias();

if(isset($_GET['id'])){
    $id = $_GET['id'];

    if(is_numeric($id)){
        $api->getByIdFeed($id);
    }else{
        $api->error('El id es incorrecto');
    }
}else{
    $api->getAll();
}
//include('bottom-cache.php');
?>