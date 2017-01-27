<?


    $target_dir = "docParticipantes/";
    print_r($_FILES);
    print_r($_GET);
    $participanteId = $_GET['id'];
    $nome =  'doc'.$_GET['cpf'].'.pdf';
    $target_file = $target_dir . 'doc'.$_GET['cpf'].'.pdf';

    move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);

    //write code for saving to database
    // include_once "config.php";

    $host     = "localhost";
    $dbname   = "bd_sisqrcode";
    $usuario  = "root";
    $password = "graomestre10";
    // Create connection
    $conn = new mysqli($host, $usuario, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    UPDATE nome_tabela
SET CAMPO = "novo_valor"
WHERE CONDIÇÃO


    $sql = "UPDATE categoria_almost_has_participante SET caminhoDoc = '{$nome}' WHERE participante_id = $participanteId)";

    if ($conn->query($sql) === TRUE) {
        echo json_encode($_FILES["file"]); // new file uploaded
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();


?>
