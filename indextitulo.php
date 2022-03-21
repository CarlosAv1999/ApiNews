<?php
//include_once 'alloycors.php';
include_once 'apinoticia.php';

$api = new ApiNoticias();

if(isset($_GET['title'])){
    $titulo = $_GET['title'];
    $api->getByTitulo($titulo);
}else{
    $api->error('No se encontro titulo que coincida con la busqueda');
}
?>