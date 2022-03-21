<?php
//include_once 'alloycors.php';
include_once 'apinoticia.php';

$api = new ApiNoticias();

if(isset($_GET['sort'])){
    $orden = $_GET['sort'];
    $api->getSort($orden);
}else{
    $api->error('Se ordeno por fecha');
}
?>