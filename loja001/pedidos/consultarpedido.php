<body>
    <table border="5">
        <tr>
            <th>ID</th>
            <th>Descrição</th>
            <th>Data do pedido</th>
            <th>Previsão de entrega</th>
            <th>Data do pagamento</th>
            <th>Status</th>
            <th>Cliente</th>
            <th>Ação</th>
        </tr>
        <?php
        include ("conexao.php");
        // Inicia a soma dos valores de todos os pedidos
        $somaValorTodosPedidos = 0;

        $sql = "SELECT * FROM pedidos";
        $resultado = mysqli_query($conn, $sql) or die("Erro ao retornar dados dos pedidos");

        while ($row = mysqli_fetch_array($resultado)) {
            $idPedido = $row["idPedido"];
            $descricaoPedido = $row["descricaoPedido"];
            $dataPedido = $row["dataPedido"];
            $dataEntrega = $row["dataEntrega"];
            $pagamentoPedido = $row["pagamentoPedido"];
            $statusPedido = $row["statusPedido"];
            $idCliente = $row["idCliente"];

            if ($statusPedido == 0) {
                $status = 'Em preparação';
            } elseif ($statusPedido == 1) {
                $status = 'A caminho';
            } else {
                $status = 'Concluído';
            }

            $sqlCliente = "SELECT nomeCliente FROM cliente WHERE idCliente = '$idCliente'";
            $resultadoCliente = mysqli_query($conn, $sqlCliente) or die("Erro ao retornar dados do cliente");
            $rowCliente = mysqli_fetch_array($resultadoCliente);
            $nomeCliente = $rowCliente["nomeCliente"];

            // Inicia a soma dos valores dos itens para este pedido
            $somaValorItens = 0;

            echo "<tr>";
            echo "<td>" . $idPedido . "</td>";
            echo "<td>" . $descricaoPedido . "</td>";
            echo "<td>" . $dataPedido . "</td>";
            echo "<td>" . $dataEntrega . "</td>";
            echo "<td>" . $pagamentoPedido . "</td>";
            echo "<td>" . $status . "</td>";
            echo "<td>" . $nomeCliente . "</td>";
            echo "
                    <td>
                        <form method='post' action='excluir.php'>
                            <input hidden type='number' value='$idPedido' name='idPedido'>
                            <button>Excluir</button>
                        </form>
                    </td>";
            echo "</tr>
                    <tr>
                        <td colspan='8'><br>
                        <table border='5'>
                            <tr>
                                <th>ID Item</th>
                                <th>Quantidade</th>
                                <th>Valor Pedido</th>
                                <th>Produto</th>
                                <th>Ação</th>
                            </tr>";

            $sqlItens = "SELECT * FROM itenspedido WHERE idPedido = '$idPedido'";
            $resultadoItens = mysqli_query($conn, $sqlItens) or die("Erro ao retornar dados dos itens do pedido");

            while ($item = mysqli_fetch_array($resultadoItens)) {
                $idItensPedido = $item["idItensPedido"];
                $quantidadePedido = $item["quantidadePedido"];
                $valorTotalPedido = $item["valorTotalPedido"];
                $idProduto = $item["idProduto"];
                // Acumula o valor total dos itens
                $somaValorItens += $valorTotalPedido;

                $sqlProduto = "SELECT nomeProduto FROM produto WHERE idProduto = '$idProduto'";
                $resultadoProdutos = mysqli_query($conn, $sqlProduto) or die("Erro ao retornar dados do produto");
                $produto = mysqli_fetch_array($resultadoProdutos);
                $nomeProduto = $produto["nomeProduto"];

                echo "<tr>";
                echo "<td>" . $idItensPedido . "</td>";
                echo "<td>" . $quantidadePedido . "</td>";
                echo "<td>" . $valorTotalPedido . "</td>";
                echo "<td>" . $nomeProduto . "</td>";
                echo "
                    <td>
                        <form method='post' action='excluirItem.php'>
                            <input hidden type='number' value='$idItensPedido' name='idItensPedido'>
                            <button>Excluir</button>
                        </form>
                    </td>";
                echo "</tr>";
            }

            echo "<tr>";
            echo "<td colspan='4'>Valor Total do Pedido</td>";
            echo "<td>R$" . $somaValorItens . "</td>";
            echo "</tr>";
            echo "</table></center><br><br>";
            echo "</td></tr>";
            // Acumula o valor total dos itens no valor total de todos os pedidos
            $somaValorTodosPedidos += $somaValorItens;
        }
        // Fecha a conexão com o banco de dados MySQL
        mysqli_close($conn);
        ?>
    </table>
    <h1>Valor total dos pedidos: R$<?php echo $somaValorTodosPedidos; ?></h1>
    <form method="post" action="menu.php">
        <button>Voltar</button>
    </form>
</body>