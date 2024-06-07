<?php
$id = $_POST["id"];
$nome = $_POST["nome"];
$cidade = $_POST["cidade"];
$foto = $_FILES["foto"];
$votos = $_POST["votos"];
$teste1 = $foto["tmp_name"];

if(move_uploaded_file($foto["tmp_name"],$foto["name"])){
    echo"Arquivo enviado com sucesso!";
}else{
    echo "Erro, o arquivo nao pode ser enviado";
}

$servername = "localhost";
$database = "eleicoes";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password, $database);

if(!$conn){
    die("Falha na conexão: ". mysqli_connect_error());
}

echo "Conectado com sucesso";

echo "$id";
echo "$nome";
echo "$cidade";
echo "$foto";
echo "$votos";

$sql = "INSERT INTO candidato (candidato_ID, nome_candidato, cidade_candidato, foto_candidato, votos_candidato) VALUES('$id', '$nome', '$cidade', '$teste1', '$votos')";
if(mysqli_query($conn, $sql)){
    echo "<br>Registro Gravado Com Sucesso!";
} else {
    echo "<br>Error:!" . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
