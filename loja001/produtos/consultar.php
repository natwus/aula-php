<body>
        <table border="1">
            <th>ID</th>
            <th>Nome</th>
            <th>Avaliação</th>
            <th>Status</th>
            <th>Ano de fabricação</th>
            <th>Dimensões</th>
            <th>Peso</th>
            <th>Fornecedor</th>
            <th>Grupo</th>
            <th>Ação</th>
            <?php
            // Inclui o arquivo "conexao.php" que contém as informações de conexão ao banco de dados MySQL
            include ("conexao.php");
            // Define a instrução SQL SELECT que seleciona todos os campos da tabela "paciente"
            $sql = "SELECT * FROM produto";
            // Executa a instrução SQL SELECT e armazena o resultado em uma variável
            $resultado = mysqli_query($conn, $sql) or die("erro");
            // Percorre cada linha do resultado da consulta
            while ($row = mysqli_fetch_array($resultado)) {
                // Extrai os valores das colunas da linha atual
                $idProduto = $row["idProduto"];
                $nomeProduto = $row["nomeProduto"];
                $avaliaçãoProduto = $row["avaliaçãoProduto"];
                $statusProduto = $row["statusProduto"];
                $anoFabricacao = $row["anoFabricacao"];
                $dimensoesProduto = $row["dimensoesProduto"];
                $pesoProduto = $row["pesoProduto"];
                $idFornecedor = $row["idFornecedor"];
                $idGrupo = $row["idGrupo"];

                ($statusProduto == 1 ? $status = 'Disponivel' : $status = 'Indisponivel');

                $sql1 = "SELECT * FROM grupo where idGrupo='$idGrupo'";
                // Executa a instrução SQL SELECT e armazena o resultado em uma variável
                $resultado1 = mysqli_query($conn, $sql1) or die("erro");
                // Percorre cada linha do resultado da consulta
                while ($row1 = mysqli_fetch_array($resultado1)) {

                    $nomeGrupo = $row1["nomeGrupo"];

                    $sql2 = "SELECT * FROM fornecedor where idFornecedor='$idFornecedor'";
                    // Executa a instrução SQL SELECT e armazena o resultado em uma variável
                    $resultado2 = mysqli_query($conn, $sql2) or die("erro");
                    // Percorre cada linha do resultado da consulta
                    while ($row2 = mysqli_fetch_array($resultado2)) {

                        $nomeFornecedor = $row2["nomeFornecedor"];

                        echo "<tr>";
                        echo "<td>" . $idProduto . "</td>";
                        echo "<td>" . $nomeProduto . "</td>";
                        echo "<td>" . $avaliaçãoProduto . "</td>";
                        echo "<td>" . $status . "</td>";
                        echo "<td>" . $anoFabricacao . "</td>";
                        echo "<td>" . $dimensoesProduto . "</td>";
                        echo "<td>" . $pesoProduto . "</td>";
                        echo "<td>" . $nomeFornecedor . "</td>";
                        echo "<td>" . $nomeGrupo . "</td>";

                        echo "
                    <td>
                        <form method='post' action='excluir.php'>
                            <input hidden type='number' value='$idProduto' name='idProduto'>
                            <button>Excluir</button>
                            </form>
                            <form method='post' action='alterar.php'>
                            <input hidden type='number' value='$idProduto' name='idProduto'>
                            <input hidden type='text' value='$nomeProduto' name='nomeProduto'>
                            <input hidden type='number' value='$avaliaçãoProduto' name='avaliaçãoProduto'>
                            <input hidden type='text' value='$statusProduto' name='statusProduto'>
                            <input hidden type='number' value='$anoFabricacao' name='anoFabricacao'>
                            <input hidden type='text' value='$dimensoesProduto' name='dimensoesProduto'>
                            <input hidden type='float' value='$pesoProduto' name='pesoProduto'>
                            <input hidden type='number' value='$idFornecedor' name='idFornecedor'>
                            <input hidden type='number' value='$idGrupo' name='idGrupo'>
                            <button>Alterar</button>
                        </form>
                    </td>";
                        echo "</tr>";
                    }
                }
            }
            // Fecha a conexão com o banco de dados MySQL
            mysqli_close($conn);
            echo "";
            ?>
        </table>
        <form method='post' action='menu.php'>
            <button>Voltar</button>
        </form>
</body>