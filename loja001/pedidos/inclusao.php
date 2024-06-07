<?php
// Recebe o conteudo da variavel através do método POST
$descricao = $_POST["descricao"];
$datapedido = $_POST["datapedido"];
$entrega = $_POST["entrega"];
$pagamento = $_POST["pagamento"];
$status = $_POST["status"];
$cliente = $_POST["cliente"];
$idtabelaprecos = $_POST["idtabelaprecos"];//idTabelaprecos
// Inclui um arquivo PHP chamado "conexao.php" que contém as informações de conexão ao banco de dados MySQL
include ("conexao.php");
// Define a instrução SQL INSERT que insere os valores das variáveis $nome, $medico, $sus e $hora na tabela "paciente" do banco de dados
$sql = "INSERT INTO pedidos (descricaoPedido, dataPedido, dataEntrega, pagamentoPedido, statusPedido, idCliente, idTabelaprecos) VALUES('$descricao', '$datapedido', '$entrega', '$pagamento', '$status', '$cliente', '$idtabelaprecos')";
// Executa a instrução SQL INSERT e verifica se a operação foi bem-sucedida
if(mysqli_query($conn, $sql)){
  // Exibe a mensagem "Registro Gravado Com Sucesso!" e um botão para consultar os dados
} else {
  // Exibe a mensagem de erro "Error!" e detalhes do erro
  echo "<br>Error:!" . $sql . "<br>" . mysqli_error($conn);
}
// Fecha a conexão com o banco de dados MySQL

$sql1 = "SELECT * FROM pedidos order by idPedido desc limit 1";
// Executa a instrução SQL SELECT e armazena o resultado em uma variável
$resultado = mysqli_query($conn, $sql1) or die("erro");
// Percorre cada linha do resultado da consulta
while ($row = mysqli_fetch_array($resultado)) {
    // Extrai os valores das colunas da linha atual
    $idPedido = $row["idPedido"];
}

mysqli_close($conn);

echo"<form method='post' action='incluiritempedido.php'>
  <input type='hidden' value='$idtabelaprecos' name='idtabelaprecos'>
  <input type='hidden' value='$idPedido'name='idPedido'>
  <button>ver</button>
</form>";
