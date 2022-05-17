<?php
//include('top-cache.php'); 
include_once 'apinoticia.php';
//include_once 'alloycors.php';

$api = new ApiNoticias();
$api->refresh();
//include('bottom-cache.php');
?>