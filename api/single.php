<?php
//Header
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

require_once '../config/Database.php';
require_once '../Models/Post.php';

$id = (isset($_GET['id']))? $_GET['id'] : '';
$post = Post::find($id);

echo json_encode($post);