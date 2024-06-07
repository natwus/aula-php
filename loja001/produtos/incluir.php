<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produto</title>
</head>
<body>
    <form method="post" action="inclusao.php" enctype="multipart/form-data">
        <h1>Produto</h1>
        <label>Nome:</label>
        <input type="text" name="nome">
        <label>Avaliação:</label>
        <select name="avaliacao">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
        <label>Status:</label>
        <select name="status">
            <option value="1">Disponível</option>
            <option value="0">Indisponível</option>
        </select>
        <label>Ano de fabricação:</label>
        <input type="number" name="anoFabricacao">
        <label>Dimensões:</label>
        <input type="text" placeholder="nXn" name="dimensoes">
        <label>Peso:</label>
        <input type="float" name="peso">
        <label>Fornecedor:</label>
        <select name="fornecedor">
            <?php
            // PHP para conectar ao banco de dados e recuperar os médicos
            
            $servername = "localhost"; // Nome do servidor MySQL
            $database = "loja001"; // Nome do banco de dados
            $username = "root"; // Nome de usuário do MySQL
            $password = ""; // Senha do MySQL
            
            $conn = mysqli_connect($servername, $username, $password, $database); // Conexão com o banco de dados
            
            $sql = "SELECT * FROM fornecedor order by nomeFornecedor asc"; // Consulta SQL para recuperar os médicos, ordenados por nome
            
            $resultado = mysqli_query($conn, $sql) or die("erro"); // Execução da consulta SQL e verificação de erros
            
            while ($row = mysqli_fetch_array($resultado)) { // Iteração sobre os resultados da consulta
                $idFornecedor = $row["idFornecedor"]; // ID do médico
                $nomeFornecedor = $row["nomeFornecedor"]; // Nome do médico
            
                echo "<option value='$idFornecedor'>" . $nomeFornecedor . "</option>"; // Geração das opções do menu suspenso com os nomes dos médicos
            }
            ?>
        </select>
        <label>Grupo:</label>
        <select name="grupo">
            <?php
            // PHP para conectar ao banco de dados e recuperar os médicos
            
            $servername = "localhost"; // Nome do servidor MySQL
            $database = "loja001"; // Nome do banco de dados
            $username = "root"; // Nome de usuário do MySQL
            $password = ""; // Senha do MySQL
            
            $conn = mysqli_connect($servername, $username, $password, $database); // Conexão com o banco de dados
            
            $sql = "SELECT * FROM grupo order by nomeGrupo asc"; // Consulta SQL para recuperar os médicos, ordenados por nome
            
            $resultado = mysqli_query($conn, $sql) or die("erro"); // Execução da consulta SQL e verificação de erros
            
            while ($row = mysqli_fetch_array($resultado)) { // Iteração sobre os resultados da consulta
                $idGrupo = $row["idGrupo"]; // ID do médico
                $nomeGrupo = $row["nomeGrupo"]; // Nome do médico
            
                echo "<option value='$idGrupo'>" . $nomeGrupo . "</option>"; // Geração das opções do menu suspenso com os nomes dos médicos
            }
            ?>
        </select>
        <button>Cadastrar</button>
    </form>
    <form method="post" action="menu.php">
        <button>Voltar</button>
    </form>
</body>
</html>