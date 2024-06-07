<body>
    <table border="1">
        <th>ID</th>
        <th>Pedido</th>
        <th>Produto</th>
        <th>Quantidade</th>
        <th>Valor total</th>
        <?php
        $idtabelapreco = $_POST["idtabelaprecos"];
        $idpedido = $_POST["idPedido"];
        // Inclui o arquivo "conexao.php" que contém as informações de conexão ao banco de dados MySQL
        include ("conexao.php");
        // Define a instrução SQL SELECT que seleciona todos os campos da tabela "paciente"
        $sql = "SELECT * FROM itenspedido where idPedido='$idpedido'";
        // Executa a instrução SQL SELECT e armazena o resultado em uma variável
        $resultado = mysqli_query($conn, $sql) or die("erro");
        // Percorre cada linha do resultado da consulta
        while ($row = mysqli_fetch_array($resultado)) {
            // Extrai os valores das colunas da linha atual
            $idItensPedido = $row["idItensPedido"];
            $idPedido = $row["idPedido"];
            $quantidadePedido = $row["quantidadePedido"];
            $valorTotalPedido = $row["valorTotalPedido"];
            $idProduto = $row["idProduto"];

            $sql1 = "SELECT * FROM produto where idProduto='$idProduto'";
            // Executa a instrução SQL SELECT e armazena o resultado em uma variável
            $resultado1 = mysqli_query($conn, $sql1) or die("erro");
            // Percorre cada linha do resultado da consulta
            while ($row1 = mysqli_fetch_array($resultado1)) {
                $nomeProduto = $row1["nomeProduto"];
            }
            echo "<tr>";
            echo "<td>" . $idItensPedido . "</td>";
            echo "<td>" . $idPedido . "</td>";
            echo "<td>" . $nomeProduto . "</td>";
            echo "<td>" . $quantidadePedido . "</td>";
            echo "<td>" . $valorTotalPedido . "</td>";
            echo "</tr>";
        }

        echo "</table>";
        echo "
                    <form method='post' action='gravaritenspedido.php' style='display: flex; flex-direction: column; align-items: center;'>
                        <input hidden type='number' value='$idpedido' name='idPedido'>
                        <input hidden type='number' value='$idtabelapreco' name='idtabelaprecos'>
                        <label>Selecione o produto</label>
                        <select name='produto'>";

        include ("conexao.php");

        $sql = "SELECT a.idTabelaprecos, a.valorProduto, a.idProduto, b.nomeProduto FrOM tabelaprecos a, produto b where a.idTabelaprecos='$idtabelapreco' and a.idProduto=b.idProduto";

        $resultado = mysqli_query($conn, $sql) or die("Erro ao executar a consulta");

        while ($row = mysqli_fetch_array($resultado)) {
            $idTabelaprecos = $row["idTabelaprecos"];
            $valorProduto = $row["valorProduto"];
            $idProduto = $row["idProduto"];
            $idNome = $row["nomeProduto"];

            echo "<option value='$idProduto,$valorProduto'> $idProduto-$idNome-$valorProduto</option>";
        }

        echo " </select>
                           <label>Quantidade</label>
                           <input type='number' name='qtd'> <button>Incluir item</button>
                    </form>";
        // Fecha a conexão com o banco de dados MySQL
        mysqli_close($conn);
        ?>
        <form method="post" action="menu.php">
            <button>Voltar</button>
        </form>
</body>