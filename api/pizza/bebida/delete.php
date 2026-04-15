<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
 
include_once '../../../config/Database.php';
include_once '../../../models/Bebida.php';
 
$database = new Database();
$db = $database->getConnection();
 
$bebida = new Bebida($db);
 
 
if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    try {
        $data = json_decode(file_get_contents("php://input"));
        if (!empty($data->id)) {
            $bebida->idBebida = $data->id;
 
            if ($bebida->delete()) {
                http_response_code(200);
                // Resposta de sucesso
                echo json_encode(
                    array('Mensagem' => 'Bebida Deletada com Sucesso')
                );
            } else {
                http_response_code(500);
                // Resposta de erro
                echo json_encode(
                    array('Mensagem' => 'Nao foi possivel deletar a Bebida.')
                );
            }
        } else {
            http_response_code(400);
            echo json_encode(
                array('Mensagem' => 'ID inválido. Nao foi possivel deletar a Bebida.')
            );
        }
 
    } catch (Exception $e) {
        http_response_code(500);
        echo json_encode(array("erro" => $e->getMessage()));
    }
} else {
    http_response_code(405);
    echo json_encode(array("erro" => "Método não suportado!"));
}