<?php
//include_once 'alloycors.php';
//include('top-cache.php'); 
include_once 'apinoticia.php';

$api = new ApiNoticias();
$api->getAllCategories();
//include('bottom-cache.php');
?>