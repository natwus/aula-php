<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Alterar</title>
</head>
<?php
// Variáveis de conexão ao banco de dados
include ("conexao.php");
// Variáveis que recebem os dados do paciente do formulário
$idCategoria = $_POST["idCategoria"];
$nomeCategoria = $_POST["nomeCategoria"];
$descricaoCategoria = $_POST["descricaoCategoria"];
echo "
  <form method='post' action='alteracao.php' enctype='multipart/form-data'>
    <h1>Categoria</h1> 
    <label>ID:</label>
    <input type='number' name='id' value='$idCategoria' readonly>
    <label>Nome:</label>
    <input type='text' name='nome' value='$nomeCategoria'>
    <label>Descrição:</label>
    <input type='text' name='descricao' value='$descricaoCategoria'>
    <button>Alterar</button>      
  </form>";
mysqli_close($conn);
?>
<form method="post" action="consultar.php">
  <button>Voltar</button>
</form>