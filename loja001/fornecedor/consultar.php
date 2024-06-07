<body>
    <table border="1">
        <th>ID</th>
        <th>Nome Fornecedor</th>
        <th>Estado Fornecedor</th>
        <th>Cidade Fornecedor</th>
        <th>Endereço Fornecedor</th>
        <th>CNPJ Fornecedor</th>
        <th>Status Fornecedor </th>
        <th>Email Fornecedor</th>
        <th>Telefone Fornecedor</th>
        <th>CEP Fornecedor</th>
        <th>Função</th>
        <?php
        // Inclui o arquivo "conexao.php" que contém as informações de conexão ao banco de dados MySQL
        include ("conexao.php");
        // Define a instrução SQL SELECT que seleciona todos os campos da tabela "paciente"
        $sql = "SELECT * FROM fornecedor";
        // Executa a instrução SQL SELECT e armazena o resultado em uma variável
        $resultado = mysqli_query($conn, $sql) or die("erro");

        while ($row = mysqli_fetch_array($resultado)) {
            // Extrai os valores das colunas da linha atual
            $idFornecedor = $row["idFornecedor"];
            $nomeFornecedor = $row["nomeFornecedor"];
            $estadoFornecedor = $row["estadoFornecedor"];
            $cidadeFornecedor = $row["cidadeFornecedor"];
            $enderecoFornecedor = $row["enderecoFornecedor"];
            $cnpjFornecedor = $row["cnpjFornecedor"];
            $statusFornecedor = $row["statusFornecedor"];
            $emailFornecedor = $row["emailFornecedor"];
            $telFornecedor = $row["telFornecedor"];
            $cepFornecedor = $row["cepFornecedor"];


            if ($statusFornecedor == 1) {
                $status = 'Disponivel';
            } else {
                $status = 'Indisponivel';
            }

            echo "<tr>";
            echo "<td>" . $idFornecedor . "</td>";
            echo "<td>" . $nomeFornecedor . "</td>";
            echo "<td>" . $estadoFornecedor . "</td>";
            echo "<td>" . $cidadeFornecedor . "</td>";
            echo "<td>" . $enderecoFornecedor . "</td>";
            echo "<td>" . $cnpjFornecedor . "</td>";
            echo "<td>" . $status . "</td>";
            echo "<td>" . $emailFornecedor . "</td>";
            echo "<td>" . $telFornecedor . "</td>";
            echo "<td>" . $cepFornecedor . "</td>";

            echo "<td>
                        <form method='post' action='excluir.php'>
                            <input hidden type='number' value='$idFornecedor' name='idFornecedor'>
                            <button>Excluir</button>
                        </form>
                        <form method='post' action='alterar.php'>
                            <input hidden type='number' value='$idFornecedor' name='idFornecedor'>
                            <input hidden type='text' value='$nomeFornecedor' name='nomeFornecedor'>
                            <input hidden type='text' value='$estadoFornecedor' name='estadoFornecedor'>
                            <input hidden type='text' value='$cidadeFornecedor' name='cidadeFornecedor'>
                            <input hidden type='text' value='$enderecoFornecedor' name='enderecoFornecedor'>
                            <input hidden type='number' value='$cnpjFornecedor' name='cnpjFornecedor'>
                            <input hidden type='number' value='$statusFornecedor' name='statusFornecedor'>
                            <input hidden type='text' value='$emailFornecedor' name='emailFornecedor'>
                            <input hidden type='number' value='$telFornecedor' name='telFornecedor'>
                            <input hidden type='number' value='$cepFornecedor' name='cepFornecedor'>
                            <hr>
                            <button>Alterar</button>
                        </form>
                    </td>";
            echo "</tr>";
        }
        // Fecha a conexão com o banco de dados MySQL
        mysqli_close($conn);
        ?>
    </table>
    <br>
    <form method="post" action="menu.php">
        <button>Voltar</button>
    </form>
</body>