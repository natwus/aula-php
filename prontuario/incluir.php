<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prontúario</title>
</head>

<body>
    <center>
        <form method="post" action="inclusao.php" enctype="multipart/form-data">
            <h1>Prontuário</h1>
            <label>Nome:</label>
            <input type="text" name="nome">
            <label>Médico:</label>
            <select name="medico">
                <?php
                // PHP para conectar ao banco de dados e recuperar os médicos
                
                $servername = "localhost"; // Nome do servidor MySQL
                $database = "prontuario"; // Nome do banco de dados
                $username = "root"; // Nome de usuário do MySQL
                $password = ""; // Senha do MySQL
                
                $conn = mysqli_connect($servername, $username, $password, $database); // Conexão com o banco de dados
                
                $sql = "SELECT * FROM medicos order by medico_nome asc"; // Consulta SQL para recuperar os médicos, ordenados por nome
                
                $resultado = mysqli_query($conn, $sql) or die("erro"); // Execução da consulta SQL e verificação de erros
                
                while ($row = mysqli_fetch_array($resultado)) { // Iteração sobre os resultados da consulta
                    $medico_id = $row["medico_id"]; // ID do médico
                    $medico_nome = $row["medico_nome"]; // Nome do médico
                    $medico_CRM = $row["medico_CRM"]; // CRM do médico
                
                    echo "<option value='$medico_id'>" . $medico_nome . "</option>"; // Geração das opções do menu suspenso com os nomes dos médicos
                }
                ?>

            </select>
            <label>Número do cartão SUS:</label>
            <input type="number" name="sus">
            <label>Horário do atendimento:</label>
            <input type="time" name="hora">
            <button>Cadastrar</button>
        </form>
        <form method="post" action="consultar.php">
            <button>Consultar</button>
        </form>
    </center>
</body>

</html>