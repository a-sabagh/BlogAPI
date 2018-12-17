<?php
//Header
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Method: DELETE");
header("Access-Control-Allow-Headers: Access-Control-Allow-Origin,Access-Control-Allow-Method,Access-Control-Allow-Headers,Content-Type,Athorization,X-Requested-With");
header("Content-Type: application/json");

require_once '../config/Database.php';
require_once '../Models/Post.php';

$data = json_decode(file_get_contents('php://input'),true);
$post = Post::find($data['id']);

$result = $post->delete();

if($result){
    echo json_encode(['message' => 'post deleted']);
}else{
    echo json_encode(['message' => 'Opration fail']);
}