<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar</title>
</head>
<body>
    <table border="1">
        <th>ID</th>
        <th>Nome</th>
        <th>Descrição</th>
        <th>Ação</th>
        <?php
        // Inclui o arquivo "conexao.php" que contém as informações de conexão ao banco de dados MySQL
        include ("conexao.php");
        // Define a instrução SQL SELECT que seleciona todos os campos da tabela "paciente"
        $sql = "SELECT * FROM categoria";
        // Executa a instrução SQL SELECT e armazena o resultado em uma variável
        $resultado = mysqli_query($conn, $sql) or die("erro");
        // Percorre cada linha do resultado da consulta
        while ($row = mysqli_fetch_array($resultado)) {
            // Extrai os valores das colunas da linha atual
            $idCategoria = $row["idCategoria"];
            $nomeCategoria = $row["nomeCategoria"];
            $descricaoCategoria = $row["descricaoCategoria"];
            echo "<tr>";
            echo "<td>" . $idCategoria . "</td>";
            echo "<td>" . $nomeCategoria . "</td>";
            echo "<td>" . $descricaoCategoria . "</td>";
            echo "<td>
                            <form method='post' action='excluir.php'>
                                <input hidden type='number' value='$idCategoria' name='idCategoria'>
                                <button>Excluir</button>
                            </form>
                            <form method='post' action='alterar.php'>
                                <input hidden type='number' value='$idCategoria' name='idCategoria'>
                                <input hidden type='text' value='$nomeCategoria' name='nomeCategoria'>
                                <input hidden type='text' value='$descricaoCategoria' name='descricaoCategoria'>
                                <button>Alterar</button>
                            </form>
                        </td>";
            echo "</tr>";
        }
        // Fecha a conexão com o banco de dados MySQL
        mysqli_close($conn);
        ?>
    </table>
    <form method='post' action='menu.php'>
        <button>Voltar</button>
    </form>
</body>