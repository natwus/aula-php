<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabela De Preços</title>
</head>
<body>
    <h1>Cadastrar</h1>
    <form action="inclusao.php" method="post">
        <label>ID tabela</label>
        <input type="number" name="idTabela">
        <input type="number" name="valorProduto" placeholder="Valor Produto" autocomplete="off" required="" />
        <?php
        echo " Produto: <select name= 'idProduto'>";
        include ("conexao.php");

        $sql = "SELECT * FROM produto";

        $resultado = mysqli_query($conn, $sql) or die("Erro ao retornar dados");
        // loop para ler todos os registros
        while ($registro = mysqli_fetch_array($resultado)) {
            $idProduto = $registro['idProduto'];
            $nomeProduto = $registro['nomeProduto'];

            echo "<option value='$idProduto'>$nomeProduto</option>";

        }
        echo "</select>";
        ?>
        <button>Enviar</button>
    </form>
    <form method="post" action="menu.php">
        <button>Voltar</button>
    </form>
</body>
</html>