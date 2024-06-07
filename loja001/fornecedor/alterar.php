<?php
// Variáveis de conexão ao banco de dados
include ("conexao.php");
// Variáveis que recebem os dados do paciente do formulário
$idFornecedor = $_POST["idFornecedor"];
$nomeFornecedor = $_POST["nomeFornecedor"];
$estadoFornecedor = $_POST["estadoFornecedor"];
$cidadeFornecedor = $_POST["cidadeFornecedor"];
$enderecoFornecedor = $_POST["enderecoFornecedor"];
$cnpjFornecedor = $_POST["cnpjFornecedor"];
$statusFornecedor = $_POST["statusFornecedor"];
$emailFornecedor = $_POST["emailFornecedor"];
$telFornecedor = $_POST["telFornecedor"];
$cepFornecedor = $_POST["cepFornecedor"];

if ($statusFornecedor == 1) {
  $status = 'Disponivel';
} else {
  $status = 'Indisponivel';
}

echo "
  <form  method='post' action='alteracao.php' enctype='multipart/form-data'>
    <h1>Alterar cadastro</h1>
    <label>ID:</label>
    <input type='number' readonly name='idFornecedor' value='$idFornecedor' readonly>
    <label>Nome Fornecedor:</label>
    <input type='text' name='nomeFornecedor' value='$nomeFornecedor'>
    <label>Estado:</label>
    <input type='text' name='estadoFornecedor' value='$estadoFornecedor'>
    <label>Cidade:</label>
    <input type='text' name='cidadeFornecedor' value='$cidadeFornecedor'>
    <label>Endereço:</label>
    <input type='text' name='enderecoFornecedor' value='$enderecoFornecedor'>
    <label>CNPJ:</label>
          <input type='number' name='cnpjFornecedor' value='$cnpjFornecedor'>
          <label>Status:</label>
          <select  name='statusFornecedor' required=''>
            <option value='' disabled selected>$status</option>
            <option value='1'>Disponível</option>
            <option value='0'>Indisponível</option>
          </select>
          <label>E-mail:</label>
          <input type='text' name='emailFornecedor' value='$emailFornecedor'>
          <label>Telefone:</label>
          <input type='number' name='telFornecedor' value='$telFornecedor'>
          <label>CEP:</label>
          <input type='number' name='cepFornecedor' value='$cepFornecedor'>
          <input type='submit' value='Alterar'>
  </form>";
// Conexão com o banco de dados
$conn = mysqli_connect($servername, $username, $password, $database);
// Verifica a conexão
if (!$conn) {
  die("Erro de conexão: " . mysqli_connect_error());
}
// Define a instrução SQL SELECT que seleciona todos os médicos ordenados por nome
$sql = "SELECT * FROM fornecedor ORDER BY nomeFornecedor ASC";
// Executa a instrução SQL SELECT e armazena o resultado em uma variável
$resultado = mysqli_query($conn, $sql) or die("Erro ao executar a consulta");
// Percorre cada linha do resultado da consulta
mysqli_close($conn);
?>
<form method="post" action="consultar.php">
  <button>Voltar</button>
</form>