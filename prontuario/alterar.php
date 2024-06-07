<center>
  <?php
  // Variáveis de conexão ao banco de dados
  $servername = "localhost";
  $database = "prontuario";
  $username = "root";
  $password = "";
  // Variáveis que recebem os dados do paciente do formulário
  $paciente_id = $_POST["paciente_id"];
  $paciente_nome = $_POST["paciente_nome"];
  $paciente_medico = $_POST["paciente_medico"];
  $paciente_numeroSUS = $_POST["paciente_numeroSUS"];
  $paciente_horarioAtendimento = $_POST["paciente_horarioAtendimento"];
  echo "
  <form method='post' action='alteracao.php' enctype='multipart/form-data'>
    <h1>Alterar cadastro</h1>
    <label>ID:</label>
    <input type='number' name='id' value='$paciente_id' readonly>
    <label>Nome:</label>
    <input type='text' name='nome' value='$paciente_nome'>
    <label>Médico:</label>
    <select name='medico'>";
  // Conexão com o banco de dados
  $conn = mysqli_connect($servername, $username, $password, $database);
  // Verifica a conexão
  if (!$conn) {
    die("Erro de conexão: " . mysqli_connect_error());
  }
  // Define a instrução SQL SELECT que seleciona todos os médicos ordenados por nome
  $sql = "SELECT * FROM medicos ORDER BY medico_nome ASC";
  // Executa a instrução SQL SELECT e armazena o resultado em uma variável
  $resultado = mysqli_query($conn, $sql) or die("Erro ao executar a consulta");
  // Percorre cada linha do resultado da consulta
  while ($row = mysqli_fetch_array($resultado)) {
    // Extrai os valores das colunas da linha atual
    $medico_id = $row["medico_id"];
    $medico_nome = $row["medico_nome"];
    // Verifica se o médico atual é o mesmo que o paciente já possui
    $selected = ($medico_id == $paciente_medico) ? "selected" : "";//expressao para encurtar if/else. "?" verifica a condição, se verdadeira atribui o proximo valor à variavel, else, atribui o valor após os dois pontos
    // Cria uma opção no select para cada médico
    echo "<option value='$medico_id' $selected>" . $medico_nome . "</option>";
  }
  echo "</select>
    <label>Número do cartão SUS:</label>
    <input type='number' name='sus' value='$paciente_numeroSUS'>
    <label>Horário do atendimento:</label>
    <input type='time' name='hora' value='$paciente_horarioAtendimento'>
    <button>Alterar</button>
  </form>";
  mysqli_close($conn);
  ?>
</center>