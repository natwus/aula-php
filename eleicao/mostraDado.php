<body>
    <table border="1">
        <?php
        $servername = "localhost";
        $database = "eleicoes";
        $username = "root";
        $password = "";

        $conn = mysqli_connect($servername, $username, $password, $database);

        if (!$conn){
            die("falha na conexão". mysqli_connect_error());
        }

        $sql = "SELECT * FROM candidato";

        $resultado = mysqli_query($conn, $sql) or die ("erro");

        while ($row = mysqli_fetch_array($resultado)) {
            $id_cad = $row["candidato_ID"];
            $nome_cad = $row["nome_candidato"];
            $cidade_cad = $row["cidade_candidato"];
            $foto_cad = $row["foto_candidato"];
            $votos_cad = $row["votos_candidato"];
 
            echo "<tr>";
            echo "<td>".$id_cad."</td>";
            echo "<td>".$nome_cad."</td>";
            echo "<td>".$cidade_cad."</td>";
            echo "<td>".$votos_cad."</td>";
            echo "<td>".$foto_cad."</td>";
            echo "<td>
                    <form method='post' action='mostraId.php'>
                        <input hidden type='number' value='$id_cad' name='id'>
                        <button>excluir</button>
                    </form>
                </td>";
            echo "</tr>";
        }

        mysqli_close( $conn );

        ?>
    </table>
</body>