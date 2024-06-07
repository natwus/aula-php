<?php
// Recebe o conteudo da variavel através do método POST
$nome = $_POST["nome"];
$medico = $_POST["medico"];
$sus = $_POST["sus"];
$hora = $_POST["hora"];
// Inclui um arquivo PHP chamado "conexao.php" que contém as informações de conexão ao banco de dados MySQL
include ("conexao.php");
// Define a instrução SQL INSERT que insere os valores das variáveis $nome, $medico, $sus e $hora na tabela "paciente" do banco de dados
$sql = "INSERT INTO paciente (paciente_nome, paciente_medico, paciente_numeroSUS, paciente_horarioAtendimento) VALUES('$nome', '$medico', '$sus', '$hora')";
// Executa a instrução SQL INSERT e verifica se a operação foi bem-sucedida
if(mysqli_query($conn, $sql)){
  // Exibe a mensagem "Registro Gravado Com Sucesso!" e um botão para consultar os dados
  echo "<br>Registro Gravado Com Sucesso!<br>
  <form method='post' action='consultar.php'>
    <button>Consultar</button>
  </form>";
} else {
  // Exibe a mensagem de erro "Error!" e detalhes do erro
  echo "<br>Error:!" . $sql . "<br>" . mysqli_error($conn);
}
// Fecha a conexão com o banco de dados MySQL
mysqli_close($conn);