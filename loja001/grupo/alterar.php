<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar</title>
</head>
<body>
    <h1>Alterar Grupo</h1>
    <?php

    include ("conexao.php");

    $idGrupo = $_POST['idGrupo'];
    $nomeGrupo = $_POST['nomeGrupo'];
    $descricaoGrupo = $_POST['descricaoGrupo'];
    $idCategoria = $_POST['idCategoria'];
    $idCateguria = $_POST['idCategoria'];

    echo "<form action=alteracao.php method=post>";
    echo "<input type=hidden name=idGrupo value=$idGrupo>";
    echo "Nome do Grupo";
    echo "<input type=text name=nomeGrupo  value=$nomeGrupo>";
    echo "Descrição Grupo";
    echo "<input type=text name=descricaoGrupo  value=$descricaoGrupo>";

    echo " Categoria: <select name= 'idCategoria'>";
    $sql = "SELECT * FROM categoria";

    $resultado = mysqli_query($conn, $sql) or die("Erro ao retornar dados");

    // loop para ler todos os registros
    while ($registro = mysqli_fetch_array($resultado)) {
        $idCategoria = $registro['idCategoria'];
        $nomeCategoria = $registro['nomeCategoria'];

        if ($idCategoria == $idCateguria) {
            echo "<option value='$idCategoria' selected>$nomeCategoria</option>";
        } else {
            echo "<option value='$idCategoria'>$nomeCategoria</option>";
        }
    }
    echo "</select>";
    echo "<input type=submit value=Alterar>";
    echo "</form>";

    mysqli_close($conn);
    echo "</table>";
    ?>
    <form method="post" action="consultar.php">
        <button class="butao">Voltar</button>
    </form>
</body>
</html>