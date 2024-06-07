<body>
    <table border="1">
        <th>ID</th>
        <th>Nome</th>
        <th>CPF</th>
        <th>Data de nascimento</th>
        <th>CEP</th>
        <th>Estado</th>
        <th>Cidade</th>
        <th>Endereço</th>
        <th>Número</th>
        <th>Sexo</th>
        <th>Telefone</th>
        <th>E-mail</th>
        <th>Ação</th>
        <?php
        // Inclui o arquivo "conexao.php" que contém as informações de conexão ao banco de dados MySQL
        include ("conexao.php");
        // Define a instrução SQL SELECT que seleciona todos os campos da tabela "paciente"
        $sql = "SELECT * FROM cliente";
        // Executa a instrução SQL SELECT e armazena o resultado em uma variável
        $resultado = mysqli_query($conn, $sql) or die("erro");
        // Percorre cada linha do resultado da consulta
        while ($row = mysqli_fetch_array($resultado)) {
            // Extrai os valores das colunas da linha atual
            $idCliente = $row["idCliente"];
            $nomeCliente = $row["nomeCliente"];
            $cpfCliente = $row["cpfCliente"];
            $nascimentoCliente = $row["nascimentoCliente"];
            $estadoCliente = $row["estadoCliente"];
            $cidadeCliente = $row["cidadeCliente"];
            $enderecoCliente = $row["enderecoCliente"];
            $sexoCliente = $row["sexoCliente"];
            $telCliente = $row["telCliente"];
            $emailCliente = $row["emailCliente"];
            $cepCliente = $row["cepCliente"];
            $numeroCliente = $row["numeroCliente"];

            echo "<tr>";
            echo "<td>" . $idCliente . "</td>";
            echo "<td>" . $nomeCliente . "</td>";
            echo "<td>" . $cpfCliente . "</td>";
            echo "<td>" . $nascimentoCliente . "</td>";
            echo "<td>" . $cepCliente . "</td>";
            echo "<td>" . $estadoCliente . "</td>";
            echo "<td>" . $cidadeCliente . "</td>";
            echo "<td>" . $enderecoCliente . "</td>";
            echo "<td>" . $numeroCliente . "</td>";
            echo "<td>" . $sexoCliente . "</td>";
            echo "<td>" . $telCliente . "</td>";
            echo "<td>" . $emailCliente . "</td>";
            echo "<td>
                            <form method='post' action='excluir.php'>
                                <input hidden type='number' value='$idCliente' name='idCliente'>
                                <button>Excluir</button>
                            </form>
                            <form method='post' action='alterar.php'>
                                <input hidden type='number' value='$idCliente' name='idCliente'>
                                <input hidden type='text' value='$nomeCliente' name='nomeCliente'>
                                <input hidden type='text' value='$cpfCliente' name='cpfCliente'>
                                <input hidden type='date' value='$nascimentoCliente' name='nascimentoCliente'>
                                <input hidden type='number' value='$cepCliente' name='cepCliente'>
                                <input hidden type='text' value='$estadoCliente' name='estadoCliente'>
                                <input hidden type='text' value='$cidadeCliente' name='cidadeCliente'>
                                <input hidden type='text' value='$enderecoCliente' name='enderecoCliente'>
                                <input hidden type='number' value='$numeroCliente' name='numeroCliente'>
                                <input hidden type='text' value='$sexoCliente' name='sexoCliente'>
                                <input hidden type='number' value='$telCliente' name='telCliente'>
                                <input hidden type='email' value='$emailCliente' name='emailCliente'>
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