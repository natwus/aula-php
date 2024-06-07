<?php
$descricao = $_POST["descricao"];
$gradiente = $_POST["gradiente"];

$servername = "localhost";
$database = "veiculos";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die ("Falha na conexão: " . mysqli_connect_error());
}

$sql = "INSERT INTO cor (cor_descricao, cor_gradiente) VALUES('$descricao', '$gradiente')";
if (mysqli_query($conn, $sql)) {
    echo "<br>Registro Gravado Com Sucesso!";
} else {
    echo "<br>Error:!" . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
<form action="menu.php" method="post">
    <button>voltar</button>
</form>