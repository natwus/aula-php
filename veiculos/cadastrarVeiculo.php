<?php
$nome = $_POST["nome"];
$marca = $_POST["marca"];
$anoModelo = $_POST["anoModelo"];
$anoFabricacao = $_POST["anoFabricacao"];
$veiculo_foto1 = $_FILES["veiculo_foto1"];
$veiculo_foto2 = $_FILES["veiculo_foto2"];
$veiculo_foto3 = $_FILES["veiculo_foto3"];
$cor = $_POST["cor_id"];

$foto11 = $veiculo_foto1["name"];
$foto22 = $veiculo_foto2["name"];
$foto33 = $veiculo_foto3["name"];

$servername = "localhost";
$database = "veiculos";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die ("Falha na conexão: " . mysqli_connect_error());
}

$sql = "INSERT INTO veiculo (veiculo_nome, veiculo_marca, veiculo_ano, veiculo_anoFabricacao, veiculo_foto1, veiculo_foto2, veiculo_foto3, veiculo_corId) VALUES ('$nome', '$marca', '$anoModelo', '$anoFabricacao', '$foto11', '$foto22', '$foto33', '$cor')";
if (mysqli_query($conn, $sql)) {
    echo "<br>Registro Gravado Com Sucesso!";
} else {
    echo "<br>Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
<form action="menu.php" method="post">
    <button>voltar</button>
</form>