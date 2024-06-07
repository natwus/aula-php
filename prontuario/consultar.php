<body>
    <center>
        <table border="1">
            <th>ID</th>
            <th>Nome</th>
            <th>Médico</th>
            <th>CRM</th>
            <th>Número do cartão SUS</th>
            <th>Horário do atendimento</th>
            <th>Ação</th>
            <form method="post" action="incluir.php">
                <button>Voltar</button>
            </form>
            <?php
            // Inclui o arquivo "conexao.php" que contém as informações de conexão ao banco de dados MySQL
            include ("conexao.php");
            // Define a instrução SQL SELECT que seleciona todos os campos da tabela "paciente"
            $sql = "SELECT * FROM paciente";
            // Executa a instrução SQL SELECT e armazena o resultado em uma variável
            $resultado = mysqli_query($conn, $sql) or die("erro");
            // Percorre cada linha do resultado da consulta
            while ($row = mysqli_fetch_array($resultado)) {
                // Extrai os valores das colunas da linha atual
                $paciente_id = $row["paciente_id"];
                $paciente_nome = $row["paciente_nome"];
                $paciente_medico = $row["paciente_medico"];
                $paciente_numeroSUS = $row["paciente_numeroSUS"];
                $paciente_horarioAtendimento = $row["paciente_horarioAtendimento"];
                // Define a instrução SQL SELECT que seleciona os dados do médico associado ao paciente
                $sql1 = "SELECT * FROM medicos where medico_id = '$paciente_medico'";
                // Executa a instrução SQL SELECT e armazena o resultado em uma variável
                $resultado1 = mysqli_query($conn, $sql1) or die("erro");
                // Percorre a linha do resultado da consulta
                while ($row1 = mysqli_fetch_array($resultado1)) {
                    // Extrai os valores das colunas da linha atual
                    $medico_id = $row1["medico_id"];
                    $medico_nome = $row1["medico_nome"];
                    $medico_CRM = $row1["medico_CRM"];
                }
                echo "<tr>";
                echo "<td>" . $paciente_id . "</td>";
                echo "<td>" . $paciente_nome . "</td>";
                echo "<td>" . $medico_nome . "</td>";
                echo "<td>" . $medico_CRM . "</td>";
                echo "<td>" . $paciente_numeroSUS . "</td>";
                echo "<td>" . $paciente_horarioAtendimento . "</td>";
                echo "<td>
                    <form method='post' action='excluir.php'>
                    <input hidden type='number' value='$paciente_id' name='paciente_id'>
                    <button>Excluir</button>
                    </form>
                    <form method='post' action='alterar.php'>
                    <input hidden type='number' value='$paciente_id' name='paciente_id'>
                    <input hidden type='text' value='$paciente_nome' name='paciente_nome'>
                    <input hidden type='text' value='$paciente_medico' name='paciente_medico'>
                    <input hidden type='number' value='$paciente_numeroSUS' name='paciente_numeroSUS'>
                    <input hidden type='time' value='$paciente_horarioAtendimento' name='paciente_horarioAtendimento'>
                    <button>Alterar</button>
                    </form>
                    </td>";
                echo "</tr>";

            }
            // Fecha a conexão com o banco de dados MySQL
            mysqli_close($conn);
            ?>
        </table>
    </center>
</body>