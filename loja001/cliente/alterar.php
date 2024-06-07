<?php
// Variáveis de conexão ao banco de dados
include ("conexao.php");
// Variáveis que recebem os dados do paciente do formulário
$idCliente = $_POST["idCliente"];
$nomeCliente = $_POST["nomeCliente"];
$cpfCliente = $_POST["cpfCliente"];
$nascimentoCliente = $_POST["nascimentoCliente"];
$cepCliente = $_POST["cepCliente"];
$estadoCliente = $_POST["estadoCliente"];
$cidadeCliente = $_POST["cidadeCliente"];
$enderecoCliente = $_POST["enderecoCliente"];
$numeroCliente = $_POST["numeroCliente"];
$sexoCliente = $_POST["sexoCliente"];
$telCliente = $_POST["telCliente"];
$emailCliente = $_POST["emailCliente"];
echo "
  <head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Alterar</title>
  </head>";
echo "
  <form method='post' action='alteracao.php' enctype='multipart/form-data'>
    <h1>Cliente</h1>
    <label>ID:</label>
    <input type='number' name='id' value='$idCliente' readonly>
    <label>Nome:</label>
    <input type='text' name='nome' value='$nomeCliente'>
    <label>CPF:</label>
    <input type='number' name='cpf' value='$cpfCliente'>
    <label>Data de nascimento:</label>
    <input type='date' name='data' value='$nascimentoCliente'>
    <label>CEP:</label>
    <input type='number' name='cep' value='$cepCliente'>
    <label>Estado:</label>
    <input type='text' name='estado' value='$estadoCliente'>
    <label>Cidade:</label>
    <input type='text' name='cidade' value='$cidadeCliente'>
    <label>Rua:</label>
    <input type='text' name='rua' value='$enderecoCliente'>
    <label>Numero:</label>
    <input type='number' name='numero' value='$numeroCliente'>
    <label>Sexo:</label>
    <input type='text' name='sexo' value='$sexoCliente'>
    <label>Telefone:</label>
    <input type='number' name='tel' value='$telCliente'>
    <label>E-mail:</label>
    <input type='email' name='email' value='$emailCliente'>
    <button>Alterar</button>      
  </form>";
mysqli_close($conn);
?>
<form method="post" action="consultar.php">
  <button>Voltar</button>
</form>