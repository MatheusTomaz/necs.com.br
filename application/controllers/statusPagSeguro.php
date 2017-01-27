<?php

$dataObj = file_get_contents("php://input");
        // Cria um stdClass
$objData = json_decode($dataObj);

// TOKEN OFICIAL
// $data['token'] = '4307F43C05C44A4A88D8EB17FE1F269F';
// TOKEN SANDBOX VVVVVVVV
$data['token'] = '51C35CB3EA404411B00D63B8F54042A2';
$data['email'] = 'math.tomaz1@gmail.com';

$host     = "localhost";
$dbname   = "bd_sisqrcode";
$usuario  = "root";
$password = "graomestre10";


$conexao  = mysql_connect($host, $usuario, $password) or die("Não foi possível conectar-se com o banco de dados");
mysql_select_db($dbname) or die("Não foi possível conectar-se com o banco de dados");
mysql_query("SET NAMES utf8", $conexao);
$query = "SELECT * FROM pedido_nao_finalizado WHERE participante_id = '$objData->idParticipante'";
$row = mysql_query($query);
$pedido = mysql_fetch_array($row);

$data['reference'] = $pedido['codigoRef'];

$url = 'https://ws.sandbox.pagseguro.uol.com.br/v2/transactions?email='.$data['email'].'&token='.$data['token'].'&reference='.$pedido['codigoRef'];

// echo $url;

$curl = curl_init($url);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);

$xml = curl_exec($curl);

curl_close($curl);

$xml  = simplexml_load_string($xml);

$json[] = $xml->transactions->transaction;

// print_r ("opaaaaa");

$status = $xml->transactions->transaction->status;

if($status > 0){

    $query = "SELECT * FROM participante_has_evento WHERE evento_id = 101 AND participante_id = {$objData->idParticipante}";
    $row = mysql_query($query);
    if(mysql_num_rows($row) < 1){

        $query = mysql_query("SELECT * FROM categoria_almost_has_participante WHERE evento_id = 101 AND participante_id = {$objData->idParticipante} ORDER BY id DESC LIMIT 1");
        $queryAux = mysql_query("SELECT * FROM participante_almost_has_palestra WHERE transacaoPagSeguro = '{$pedido['codigoRef']}'");

        $categoria = mysql_fetch_array($query);

        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $usuario, $password);

        // $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if(!$pdo){
            die('Erro ao iniciar a conexão');
        }

        $pdo->beginTransaction();/* Inicia a transação */

        $query = $pdo->query("INSERT INTO participante_has_evento (evento_id, participante_id)
                          VALUES ('101',
                                 '{$objData->idParticipante}')");

        $query1 = $pdo->query("INSERT INTO categoria_has_participante (evento_id, participante_id, categoria, caminhoDoc)
                          VALUES ('101',
                                 '{$objData->idParticipante}',
                                 '{$categoria['categoria']}',
                                 '{$categoria['caminhoDoc']}')");

        while ($res = mysql_fetch_array($queryAux)) {
            $status2 = true;
            $codigoTransacao = "{$res['transacaoPagSeguro']}";
            $query2 = $pdo->query("INSERT INTO participante_has_palestra (participante_id, palestra_id, palestra_evento_id, presenca, situacaoPagamento, transacaoPagSeguro) VALUES ('{$objData->idParticipante}',
                                     '{$res['palestra_id']}',
                                     '{$res['palestra_evento_id']}',
                                     0,'$status',
                                     '{$codigoTransacao}')");


            if(!$query2){
                break;
            }
        }

        $query3 = $pdo->query("DELETE FROM pedido_nao_finalizado WHERE evento_id = '101' AND participante_id = '{$objData->idParticipante}'");

        if(!$query){echo ' ----- 1';}
        if(!$query1){echo ' ----- 2';}
        if(!$query2){echo ' ----- 3';}
        if(!$query3){echo ' ----- 4';}

        if(!$query || !$query1 || !$query2 || !$query3){
            $pdo->rollBack(); /* Desfaz a inserção na tabela de movimentos em caso de erro na query da tabela conta */
            $status = false;
        }else{
            $pdo->commit(); /* Se não houve erro nas querys, confirma os dados no banco */
            $status = true;
        }
    }
}

echo json_encode($json);
?>

