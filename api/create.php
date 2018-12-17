<?php
//Header
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Method: POST");
header("Access-Control-Allow-Headers: Access-Control-Allow-Origin,Access-Control-Allow-Method,Access-Control-Allow-Headers,Content-Type,Athorization,X-Requested-With");
header("Content-Type: application/json");

require_once '../config/Database.php';
require_once '../Models/Post.php';

$data = json_decode(file_get_contents('php://input'),true);

$id = Post::create($data);
if($id){
    echo json_encode(['id'=>$id,'message'=>'post created successfully']);
}else{
    echo json_encode(['message'=>'post creation was failed!']);
}
