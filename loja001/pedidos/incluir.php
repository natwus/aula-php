<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Incluir</title>
</head>
<body>
    <form method="post" action="inclusao.php" enctype="multipart/form-data">
        <h1>Pedido</h1>
        <label>Descrição:</label>
        <input type="text" name="descricao">
        <label>Data do pedido:</label>
        <input type="date" name="datapedido">
        <label>Data prevista de entrega:</label>
        <input type="date" name="entrega">
        <label>Data de pagamento:</label>
        <input type="date" name="pagamento">
        <label>Status do pedido:</label>
        <select name="status">
            <option value="0">Em preparação</option>
            <option value="1">Em rota de entrega</option>
            <option value="2">Concluido</option>
        </select>
        <label>Cliente:</label>
        <option value=""></option>
        <select name="cliente">
            <?php
            $servername = "localhost"; // Nome do servidor MySQL
            $database = "loja001"; // Nome do banco de dados
            $username = "root"; // Nome de usuário do MySQL
            $password = "";

            $conn = mysqli_connect($servername, $username, $password, $database); // Conexão com o banco de dados
            
            $sql = "SELECT * FROM cliente order by nomeCliente asc"; // Consulta SQL para recuperar os médicos, ordenados por nome
            
            $resultado = mysqli_query($conn, $sql) or die("erro");

            while ($row = mysqli_fetch_array($resultado)) { // Iteração sobre os resultados da consulta
                $idCliente = $row["idCliente"]; // ID do médico
                $nomeCliente = $row["nomeCliente"];

                echo "<option value='$idCliente'>" . $nomeCliente . "</option>"; // Geração das opções do menu suspenso com os nomes dos médicos
            }
            ?>
        </select>
        <label>ID Tabela de Preços:</label>
        <select name="idtabelaprecos" id="">
            <?php
            $servername = "localhost";
            $database = "loja001";
            $username = "root";
            $password = "";

            $conn = mysqli_connect($servername, $username, $password, $database);

            $sql = "SELECT distinct idTabelaprecos FROM tabelaprecos order by idTabelaprecos";

            $resultado = mysqli_query($conn, $sql) or die("Erro ao executar a consulta");


            while ($row = mysqli_fetch_array($resultado)) {
                $idTabelaprecos = $row["idTabelaprecos"];

                echo "<option value='$idTabelaprecos'>$idTabelaprecos</option>";
            }
            ;
            ?>
        </select>
        <button>Cadastrar</button>
    </form>
    <form method="post" action="menu.php">
        <button>Voltar</button>
    </form>
</body>
</html>