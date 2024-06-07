<?php
// Variáveis de conexão ao banco de dados
$servername = "localhost";
$database = "prontuario";
$username = "root";
$password = "";
// Variáveis que recebem os dados do paciente do formulário
$paciente_id = $_POST["id"];
$paciente_nome = $_POST["nome"];
$paciente_medico = $_POST["medico"];
$paciente_numeroSUS = $_POST["sus"];
$paciente_horarioAtendimento = $_POST["hora"];
// Estabelece a conexão com o banco de dados MySQL usando as variáveis de conexão
$conn = mysqli_connect($servername, $username, $password, $database);
// Define a instrução SQL UPDATE que atualiza os dados do paciente na tabela "paciente"
$sql = "UPDATE paciente SET paciente_nome = '$paciente_nome', paciente_medico = '$paciente_medico', paciente_numeroSUS = '$paciente_numeroSUS', paciente_horarioAtendimento = '$paciente_horarioAtendimento' WHERE paciente_id = '$paciente_id'";
// Executa a instrução SQL UPDATE
if (mysqli_query($conn, $sql))
// Fecha a conexão com o banco de dados MySQL
mysqli_close($conn);
?>
<!-- Redireciona o usuário para a página "consultar.php" após 0 segundos -->
<meta http-equiv="refresh" content="0; URL='consultar.php'">