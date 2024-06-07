<?php

$idProduto = $_POST["idProduto"];
$nomeProduto = $_POST["nomeProduto"];
$avaliaçãoProduto = $_POST["avaliaçãoProduto"];
$statusProduto = $_POST["statusProduto"];
$anoFabricacao = $_POST["anoFabricacao"];
$dimensoesProduto = $_POST["dimensoesProduto"];
$pesoProduto = $_POST["pesoProduto"];
$idFornecedor = $_POST["idFornecedor"];
$idGrupo = $_POST["idGrupo"];

echo "
  <form method='post' action='alteracao.php' enctype='multipart/form-data'>
    <h1>Produto</h1>
    <label>ID:</label>
    <input type='number' name='idProduto' value='$idProduto' readonly>
    <label>Nome:</label>
    <input type='text' name='nomeProduto' value='$nomeProduto'>
    <label>Avaliação:</label>
    <select name='avaliaçãoProduto' value='$avaliaçãoProduto'>
        <option value='1'>1</option>
        <option value='2'>2</option>
        <option value='3'>3</option>
        <option value='4'>4</option>
        <option value='5'>5</option>
    </select>
    <label>Status:</label>
    <select name='statusProduto' value='$statusProduto'>
        <option value='1'>Disponível</option>
        <option value='0'>Indisponível</option>
    </select>
    <label>Ano de fabricação:</label>
    <input type='number' name='anoFabricacao' value='$anoFabricacao'>
    <label>Dimensões:</label>
    <input type='text' placeholder='nXn' name='dimensoesProduto' value='$dimensoesProduto'>
    <label>Peso:</label>
    <input type='float' name='pesoProduto' value='$pesoProduto'>
    <label>Fornecedor:</label>
    <select name='idFornecedor' value='$idFornecedor'>";
      $servername = "localhost";
      $database = "loja001";
      $username = "root";
      $password = "";

      // Conexão com o banco de dados
      $conn = mysqli_connect($servername, $username, $password, $database);
      // Verifica a conexão
      $sql = 'SELECT * FROM fornecedor order by nomeFornecedor asc';
      // Executa a instrução SQL SELECT e armazena o resultado em uma variável
      $resultado = mysqli_query($conn, $sql) or die("Erro ao executar a consulta");
      // Percorre cada linha do resultado da consulta
      while ($row = mysqli_fetch_array($resultado)) {
        // Extrai os valores das colunas da linha atual
        $idFornecedor = $row["idFornecedor"]; // ID do médico
        $nomeFornecedor = $row["nomeFornecedor"];
        // Verifica se o médico atual é o mesmo que o paciente já possui
        echo "<option value='$idFornecedor'>" . $nomeFornecedor . "</option>";
      }
    echo "
      </select>
      <label>Grupo:</label>
      <select name='idGrupo' value'$idGrupo'>";
        $servername = "localhost";
        $database = "loja001";
        $username = "root";
        $password = "";

        $conn1 = mysqli_connect($servername, $username, $password, $database); // Conexão com o banco de dados

        $sql1 = 'SELECT * FROM grupo order by nomeGrupo asc'; // Consulta SQL para recuperar os médicos, ordenados por nome

        $resultado1 = mysqli_query($conn1, $sql1) or die("erro"); // Execução da consulta SQL e verificação de erros

        while ($row1 = mysqli_fetch_array($resultado1)) { // Iteração sobre os resultados da consulta
          $idGrupo = $row1["idGrupo"]; // ID do médico
          $nomeGrupo = $row1["nomeGrupo"]; // Nome do médico

          echo "<option value='$idGrupo'>" . $nomeGrupo . "</option>"; // Geração das opções do menu suspenso com os nomes dos médicos
        }
      echo "
        </select>
            <button>Alterar</button>      
        </form>";
mysqli_close($conn);
?>
<form method="post" action="consultar.php">
  <button>Voltar</button>
</form>