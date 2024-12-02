<?php

require_once __DIR__ . '/../../../Model/Model.php';
require_once __DIR__ . '/../../../Model/Post.php';

$id = $_GET['id'];

if(!isset($id)) {
    header("Location: index-post.php");
}

$posts = new Post(); 
if (isset($id)) 
$posts->delete($_GET['id']);
header("Location: index-post.php")

?>