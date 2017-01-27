<?php

$dataObj = file_get_contents("php://input");
        // Cria um stdClass
$objData = json_decode($dataObj);

// TOKEN OFICIAL
// $data['token'] = '4307F43C05C44A4A88D8EB17FE1F269F';
// TOKEN SANDBOX VVVVVVVV
$data['token'] = '51C35CB3EA404411B00D63B8F54042A2';
$data['email'] = 'math.tomaz1@gmail.com';
$data['currency'] = 'BRL';
$data['reference'] = $objData->cpfParticipante.round(microtime(true) * 1000);
$codRef = $data['reference'];
$data['itemId1'] = $objData->cpfParticipante;
$data['itemQuantity1'] = '1';
if($objData->qtdMinicursos < 1){
    $data['itemDescription1'] = utf8_decode('Inscrição NECS - '.$objData->tipoInscricao);
}else{
    $data['itemDescription1'] = utf8_decode('Inscrição NECS - '.$objData->tipoInscricao.' e '.$objData->qtdMinicursos.' Minicurso(s)');
}
$data['itemAmount1'] = $objData->valor.'.00';

$url = 'https://ws.sandbox.pagseguro.uol.com.br/v2/checkout';


$dataIns = $data;

$data = http_build_query($data);

$curl = curl_init($url);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);

$xml = curl_exec($curl);

curl_close($curl);

$xml  = simplexml_load_string($xml);

$json[] = array('code' => $xml->code, 'codeRef' => $codRef);

$host     = "localhost";
$dbname   = "bd_sisqrcode";
$usuario  = "root";
$password = "graomestre10";

$pdo = new PDO("mysql:host=$host;dbname=$dbname", $usuario, $password);

if(!$pdo){
    die('Erro ao iniciar a conexão');
}

$pdo->beginTransaction();/* Inicia a transação */

$query = $pdo->query("INSERT INTO pedido_nao_finalizado (participante_id, descricao, valor, codigoRef, codigo, evento_id, status)
                  VALUES ('{$objData->idParticipante}',
                          '{$dataIns['itemDescription1']}',
                          '{$dataIns['itemAmount1']}',
                          '{$dataIns['reference']}',
                          '{$xml->code}',
                          '101',
                          '0')");

if(!$query){
    $pdo->rollBack(); /* Desfaz a inserção na tabela de movimentos em caso de erro na query da tabela conta */
    $status = false;
}else{
    $pdo->commit(); /* Se não houve erro nas querys, confirma os dados no banco */
    $status = true;
}


echo json_encode($json);
?>
