<body>
    <table border="1">
        <th>ID</th>
        <th>Nome Grupo</th>
        <th>Descrição Grupo</th>
        <th>Categoria</th>
        <th>Função</th>
        <?php
        // Inclui o arquivo "conexao.php" que contém as informações de conexão ao banco de dados MySQL
        include ("conexao.php");
        // Define a instrução SQL SELECT que seleciona todos os campos da tabela "paciente"
        $sql = "SELECT * FROM grupo";
        // Executa a instrução SQL SELECT e armazena o resultado em uma variável
        $resultado = mysqli_query($conn, $sql) or die("erro");

        while ($registro = mysqli_fetch_array($resultado)) {
            $idCateguria = $registro['idCategoria'];
            $slq2 = "SELECT * FROM categoria WHERE idCategoria = $idCateguria";
            $resultado2 = mysqli_query($conn, $slq2) or die("Erro ao retornar dado");

            while ($registro2 = mysqli_fetch_array($resultado2)) {
                $nomeCategoria = $registro2['nomeCategoria'];
            }
            // Extrai os valores das colunas da linha atual
            $idGrupo = $registro["idGrupo"];
            $nomeGrupo = $registro["nomeGrupo"];
            $descricaoGrupo = $registro["descricaoGrupo"];
            // Define a instrução SQL SELECT que seleciona os dados do médico associado ao paciente
            // Executa a instrução SQL SELECT e armazena o resultado em uma variável
            // Percorre a linha do resultado da consulta
            echo "<tr>";
            echo "<td>" . $idGrupo . "</td>";
            echo "<td>" . $nomeGrupo . "</td>";
            echo "<td>" . $descricaoGrupo . "</td>";
            echo "<td>" . $nomeCategoria . "</td>";
            echo "
            <td>
                <form method='post' action='excluir.php'>
                    <input hidden type='number' value='$idGrupo' name='idGrupo'>
                    <button>Excluir</button>
                    </form>
                    <form method='post' action='alterar.php' enctype='multipart/form-data'>
                    <input hidden type='number' value='$idGrupo' name='idGrupo'>
                    <input hidden type='text' value='$nomeGrupo' name='nomeGrupo'>
                    <input hidden type='text' value='$descricaoGrupo' name='descricaoGrupo'>
                    <input hidden type='text' value='$idCateguria' name='idCategoria'>
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