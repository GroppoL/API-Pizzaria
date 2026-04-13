<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
 
include_once '../../../config/Database.php';
include_once '../../../models/Bebida.php';
 
$database = new Database();
$db = $database->getConnection();
 
$bebida = new bebida($db);
 
if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
    try {
        $data = json_decode(file_get_contents("php://input"));
 
        if (
            !empty($data->id) &&
            !empty($data->nome) &&
            !empty($data->tipo) &&
            !empty($data->qtdLitros) &&
            !empty($data->valor)
        ) {

            $bebida->idBebida = $data->id;
 
            // Atribuir os demais valores
            $bebida->nome = $data->nome;
            $bebida->tipo = $data->tipo;
            $bebida->qtdLitros = $data->qtdLitros;
            $bebida->valor = $data->valor;
 
            if ($bebida->update()) {
                http_response_code(200);
                echo json_encode(
                    array('Mensagem' => 'Bebida Atualizada com Sucesso')
                );
            } else {
                http_response_code(500);
                echo json_encode(
                    array('Mensagem' => 'Nao foi possivel atualizar a Bebida')
                );
            }
        } else {
            http_response_code(400);
            echo json_encode(
                array('Mensagem' => 'Dados Incompletos. Nao foi possivel atualizar a Bebida.')
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