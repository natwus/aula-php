<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Computador</title>
</head>
<body>
    <h1>Cadastrar</h1>
    <form action="inclusao.php" method="post">
        <input type="text" name="nomeGrupo" placeholder="Nome Grupo" autocomplete="off" required="" />
        <input type="text" name="descricaoGrupo" placeholder="Descrição Grupo" autocomplete="off" required="" />
        <?php
        echo " Categoria: 
                        <select name= 'idCategoria'>";
        include ("conexao.php");

        $sql = "SELECT * FROM categoria";

        $resultado = mysqli_query($conn, $sql) or die("Erro ao retornar dados");

        while ($registro = mysqli_fetch_array($resultado)) {
            $idCategoria = $registro['idCategoria'];
            $nomeCategoria = $registro['nomeCategoria'];

            echo "<option value='$idCategoria'>$nomeCategoria</option>";

        }
        echo "</select>";
        ?>
        <button>
            Enviar</i>
        </button>
    </form>
    <form method="post" action="menu.php">
        <button>Voltar</button>
    </form>
</body>
</html>