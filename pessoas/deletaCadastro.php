<?php
$pessoa_id = $_POST["pessoa_id"];

$servername = "localhost";
$database = "pessoas";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die ("falha na conexão" . mysqli_connect_error());
}

if (isset ($_POST["pessoa_id"])) {
    $sql = "DELETE from dados_pessoais WHERE pessoa_id = $pessoa_id";
    $resultado = mysqli_query($conn, $sql) or die ("erro");
}

mysqli_close($conn);
?>

<meta http-equiv="refresh" content="0; URL='tabelaCadastro.php'">