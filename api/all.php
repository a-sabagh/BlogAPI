<?php
//Header
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

require_once '../config/Database.php';
require_once '../Models/Post.php';

$posts = Post::all();

echo json_encode($posts);