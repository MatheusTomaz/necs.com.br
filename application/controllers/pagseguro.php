<?php

$dataObj = file_get_contents("php://input");
        // Cria um stdClass
$objData = json_decode($dataObj);

$data['token'] = '08F541D8D282499D8384D538377B6916';
$data['email'] = 'math.tomaz1@gmail.com';
$data['currency'] = 'BRL';
$data['itemId1'] = $objData->cpfParticipante;
$data['itemQuantity1'] = '1';
if($objData->qtdMinicursos < 1){
    $data['itemDescription1'] = utf8_decode('Inscrição NECS - '.$objData->tipoInscricao);
}else{
    $data['itemDescription1'] = utf8_decode('Inscrição NECS - '.$objData->tipoInscricao.' e '.$objData->qtdMinicursos.' Minicurso(s)');
}
$data['itemAmount1'] = $objData->valor.'.00';

$url = 'https://ws.pagseguro.uol.com.br/v2/checkout';

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

$json[] = array('code' => $xml->code);

echo json_encode($json);
?>
