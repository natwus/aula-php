<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar</title>
</head>
<body>
    <h1>Alterar Preço</h1>
    <?php

    include ("conexao.php");

    $idTabelaprecos = $_POST['idTabelaprecos'];
    $valorProduto = $_POST['valorProduto'];
    $idProduto = $_POST['idProduto'];
    $idPoduto = $_POST['idProduto'];

    echo "<form action=alteracao.php method=post>";
    echo "<input name=idTabelaprecos value=$idTabelaprecos>";
    echo "Valor Produto";
    echo "<input type=number name=valorProduto  value=$valorProduto>";
    echo " Produto: <select name= 'idProduto'>";
    $sql = "SELECT * FROM produto";

    $resultado = mysqli_query($conn, $sql) or die("Erro ao retornar dados");
    // loop para ler todos os registros
    while ($registro = mysqli_fetch_array($resultado)) {
        $idProduto = $registro['idProduto'];
        $nomeProduto = $registro['nomeProduto'];
        if ($idProduto == $idPoduto) {
            echo "<option value='$idProduto' selected>$nomeProduto</option>";
        } else {
            echo "<option value='$idProduto'>$nomeProduto</option>";
        }
    }
    echo "</select>";
    echo "<input class='butao' type=submit value=Alterar>";
    echo "</form>";
    mysqli_close($conn);
    echo "</table>";
    ?>
    <form method="post" action="consultar.php">
        <button class="butao">Voltar</button>
    </form>
</body>
</html>