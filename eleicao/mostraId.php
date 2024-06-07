<?php
$id_candidato = $_POST["id"];

echo $id_candidato;

$servername = "localhost";
$database = "eleicoes";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn){
    die("falha na conexão". mysqli_connect_error());
}

if(isset($_POST["id"])){
    $sql = "DELETE from candidato WHERE candidato_ID = $id_candidato";
    $resultado = mysqli_query($conn,$sql) or die ("erro");
}

mysqli_close($conn);
?>

<meta http-equiv="refresh" content="0; URL='mostraDado.php'">
