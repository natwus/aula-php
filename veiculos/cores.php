<body>
    <table border="1">

        <thead>
            <th>ID</th>
            <th>Descrição</th>
            <th>Gradiente</th>
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

        $sql = "SELECT * FROM cor";

        $resultado = mysqli_query($conn, $sql) or die ("erro");

        while ($row = mysqli_fetch_array($resultado)) {
            $cor_id = $row["cor_id"];
            $cor_descricao = $row["cor_descricao"];
            $cor_gradiente = $row["cor_gradiente"];
 
            echo "<tr>";
            echo "<td>".$cor_id."</td>";
            echo "<td>".$cor_descricao."</td>";
            echo "<td>".$cor_gradiente."</td>";
            echo "<td>
                    <form method='post' action='deletaCadastro.php'>
                        <input hidden type='number' value='$cor_id' name='id-cor'>
                        <input hidden type='number' value='0' name='id-veiculo'>
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