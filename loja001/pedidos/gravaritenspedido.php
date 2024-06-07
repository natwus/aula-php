<?php
// Recebe o conteudo da variavel através do método POST
$idPedido = $_POST["idPedido"];
$idtabelapreco = $_POST["idtabelaprecos"];
$produto = $_POST["produto"];
$qtd = $_POST["qtd"];

list ($valor1,$valor2) = explode (',',$produto);

$produto1 =$valor1;
$valorProduto = $valor2;

echo $valorProduto;

$valortotal = $qtd * $valorProduto;

include ("conexao.php");

$sql = "INSERT INTO itenspedido (idPedido, quantidadePedido, valorTotalPedido, idProduto) VALUES('$idPedido', '$qtd', '$valortotal', '$produto1')";

if (mysqli_query($conn, $sql)) {

} else {
    // Exibe a mensagem de erro "Error!" e detalhes do erro
    echo "<br>Error:!" . $sql . "<br>" . mysqli_error($conn);
}

echo "<form method='post' action='incluiritempedido.php'>
    <input hidden type='number' value='$idPedido' name='idPedido'>
    <input hidden type='number' value='$idtabelapreco' name='idtabelaprecos'>
    <button>ver</button>
    </form>";

mysqli_close($conn);
