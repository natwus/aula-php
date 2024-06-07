<body>
    <table border="1">

        <thead>
            <th>ID</th>
            <th>Nome</th>
            <th>Marca</th>
            <th>Ano do modelo</th>
            <th>Ano de fabricação</th>
            <th>Foto</th>
            <th>Foto</th>
            <th>Foto</th>
            <th>Cor</th>
        </thead>

        <?php
        $servername = "localhost";
        $database = "veiculos";
        $username = "root";
        $password = "";

        $conn = mysqli_connect($servername, $username, $password, $database);

        if (!$conn){
            die("falha na conexão". mysqli_connect_error());
        }

        $sql = "SELECT * FROM veiculo";

        $resultado = mysqli_query($conn, $sql) or die ("erro");

        while ($row = mysqli_fetch_array($resultado)) {
            $veiculo_id = $row["veiculo_id"];
            $veiculo_nome = $row["veiculo_nome"];
            $veiculo_marca = $row["veiculo_marca"];
            $veiculo_ano = $row["veiculo_ano"];
            $veiculo_anoFabricacao = $row["veiculo_anoFabricacao"];
            $veiculo_foto1 = $row["veiculo_foto1"];
            $veiculo_foto2 = $row["veiculo_foto2"];
            $veiculo_foto3 = $row["veiculo_foto3"];
            $veiculo_corId = $row["veiculo_corId"];
 
            echo "<tr>";
            echo "<td>".$veiculo_id."</td>";
            echo "<td>".$veiculo_nome."</td>";
            echo "<td>".$veiculo_marca."</td>";
            echo "<td>".$veiculo_ano."</td>";
            echo "<td>".$veiculo_anoFabricacao."</td>";
            echo "<td>".$veiculo_foto1."</td>";
            echo "<td>".$veiculo_foto2."</td>";
            echo "<td>".$veiculo_foto3."</td>";
            echo "<td>".$veiculo_corId."</td>";
            echo "<td>
                    <form method='post' action='deletaCadastro.php'>
                        <input hidden type='number' value='$veiculo_id' name='id-veiculo'>
                        <input hidden type='number' value='0' name='id-cor'>
                        <button>excluir</button>
                    </form>
                </td>";
            echo "</tr>";
        }

        mysqli_close( $conn );

        ?>
    </table>
    <form action="menu.php" method="post">
        <button>voltar</button>
    </form>
</body>