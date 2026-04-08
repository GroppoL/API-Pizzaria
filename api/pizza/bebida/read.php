<?php
 
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
include_once '../../../config/Database.php';
include_once '../../../models/Bebida.php';
 
$database = new Database();
$db = $database->getConnection();
 
$bebida = new Bebida($db);

// try{ colocar para demonstrar erro com coluna errada mas lá no método read em pizza
    // Chamar o método read() para buscar as bebidas
    $stmt = $bebida->read();
    $num = $stmt->rowCount();


    if ($num > 0) {
        $bebidas_arr = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
 
            $bebida_item = array(
                "id" => $idBebida,
                "nome" => $nome,
                "tipo" => $tipo,
                "qtdLitros" => $qtdLitros,
                "valor" => $valor
            );
 
            array_push($bebidas_arr, $bebida_item);
        }
 
        http_response_code(200);
 
        echo json_encode($bebidas_arr);
    } else {
        http_response_code(404);
        echo json_encode(
            array("message" => "Nenhuma bebida encontrada.")
        );
    }
// }
// catch (Exception $e) {
//  echo json_encode(array("erro" => $e->getMessage()));
// }