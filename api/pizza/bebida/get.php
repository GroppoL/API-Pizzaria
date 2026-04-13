<?php

// Headers obrigatórios
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
include_once '../../../config/Database.php';
include_once '../../../models/Bebida.php';
 
// Instanciar o objeto Database e obter a conexão
$database = new Database();
$db = $database->getConnection();
 
$bebida = new Bebida($db);
 
$bebida->idBebida = isset($_GET['id']) ? $_GET['id'] : null;
 
if ($bebida->idBebida) {
    if ($bebida->read_single()) {
 
        http_response_code(200);
        echo json_encode($bebida);
 
    } else {
 
        http_response_code(404);
        echo json_encode(["mensage" => "Bebida não encontrada"]);
 
    }
} else {
 http_response_code(400);
 echo json_encode(["mensage" => "Parametro id não fornecido"]);
}