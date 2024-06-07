<body>
   
        <table border="1">
            <th>ID</th>
            <th>Valor Produto</th>
            <th>Produto</th>
            <th>Função</th>
            <?php
           
            // Inclui o arquivo "conexao.php" que contém as informações de conexão ao banco de dados MySQL
            include ("conexao.php");
            // Define a instrução SQL SELECT que seleciona todos os campos da tabela "paciente"
            $sql = "SELECT * FROM tabelaprecos";
            // Executa a instrução SQL SELECT e armazena o resultado em uma variável
            $resultado = mysqli_query($conn, $sql) or die("erro");

            while ($registro = mysqli_fetch_array($resultado))
            {
            $idPoduto = $registro['idProduto'];
            $slq2 = "SELECT * FROM produto WHERE idProduto = $idPoduto";
            $resultado2 = mysqli_query($conn, $slq2) or die("Erro ao retornar dado");

            while ($registro2 = mysqli_fetch_array($resultado2)) {
                $nomeProduto = $registro2['nomeProduto'];
            }

           
                // Extrai os valores das colunas da linha atual
                $idTabelaprecos = $registro["idTabelaprecos"];
                $valorProduto = $registro["valorProduto"];
                // Define a instrução SQL SELECT que seleciona os dados do médico associado ao paciente
                // Executa a instrução SQL SELECT e armazena o resultado em uma variável
                // Percorre a linha do resultado da consulta
            
                echo "<tr>";
                echo "<td>" . $idTabelaprecos . "</td>";
                echo "<td>" . $valorProduto . "</td>";
                echo "<td>" . $nomeProduto . "</td>";
                echo "<td>
                    <form method='post' action='excluir.php'>
                    <input hidden type='number' value='$idTabelaprecos' name='idTabelaprecos'>
                    
                    <button>Excluir</button>
                    </form>
                    <form method='post' action='alterar.php' enctype='multipart/form-data'>
                    <input hidden type='number' value='$idTabelaprecos' name='idTabelaprecos'>
                    <input hidden type='number' value='$valorProduto' name='valorProduto'>
                    <input hidden type='text' value='$idPoduto' name='idProduto'>
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
        <form method="post" action="menu.php">
           
            <button>Voltar</button>
        </form>
    
</body>