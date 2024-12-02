<?php

require_once __DIR__ . '/../../../Model/Model.php';
require_once __DIR__ . '/../../../Model/Tags.php';

$id = $_GET['id'];

if(!isset($id)) {
    header("Location: index-tags.php");
}

$tags = new Tags(); 
if (isset($id)) 
$tags->delete($_GET['id']);
header("Location: index-tags.php")

?>