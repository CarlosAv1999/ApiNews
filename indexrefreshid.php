<?php
//include_once 'alloycors.php';
//include('top-cache.php'); 
include_once 'apinoticia.php';

$api = new ApiNoticias();

if(isset($_GET['id'])){
    $id = $_GET['id'];

    if(is_numeric($id)){
        $api->refreshOneFeed($id);
    }else{
        $api->error('El id es incorrecto');
    }
}else{
    $api->refresh();
}
//include('bottom-cache.php');
?>