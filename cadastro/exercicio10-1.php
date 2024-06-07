<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sucesso!</title>
</head>

<body>
    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // $id = $_POST["id"];
        // $nome = $_POST["nome"];
        // $rua = $_POST["rua"];
        // $numero = $_POST["numero"];
        // $cidade = $_POST["cidade"];
        $estado = $_POST["estado"];
        $cep = $_POST["cep"];
        $rg = $_POST["rg"];
        $cpf = $_POST["cpf"];
        $fone = $_POST["fone"];
    }

    $file = fopen("dados.dat", "a+");

    // fwrite($file, $id . ";");
    // fwrite($file, $nome . ";");
    // fwrite($file, $rua . ";");
    // fwrite($file, $numero . ";");
    // fwrite($file, $cidade . ";");
    fwrite($file, $estado . ";");
    fwrite($file, $cep . ";");
    fwrite($file, $rg . ";");
    fwrite($file, $cpf . ";");
    fwrite($file, $fone . "\r\n");

    fclose($file);

    function print_row($row_data)
    {
        echo "<tr>";
        foreach ($row_data as $cell) {
            echo "<td>$cell</td>";
        }
        echo "</tr>";
    }

    function organize_data($filename)
    {
        echo "
        <div>
            <h3>Cadastro efetuado com sucesso!</h3>
            <table border='1'>
            <tr>
                <th>ID</th>
                <th>Matéria</th>
                <th>Escola</th>
                <th>Professor</th>
                <th>Data</th>
            </tr>";

        $lines = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {
            $data = explode(";", $line);
            print_row($data);
        }
    }

    organize_data("dados.dat");

    echo "
        <style>
            body{
                background-image: url(download.jpg);
                background-size: cover;
                display: flex;
                justify-content: center;
                padding-top: 210px;
            }
            div{
                background: linear-gradient(45deg, #C7C638, #C638C7);
                padding: 25px;
                border-radius: 20px;
                display: flex;
                flex-direction: column;
                gap: 15px;
                align-items: center;
            }
            h3{
                color: white;
                opacity: 0.7;
            }
            input{
                padding: 15px;
                border-radius: 20px;
                font-size:13px;
                background-color: #38C7C6;
                color: white;
                cursor: pointer;
                border: 0;
                opacity: 0.7;
                transition: ease 0.3s;
            }
            input:hover{
                transform: scale(160%);
                transition: ease 0.3s;
            }
        </style>";

    $servername = "localhost";
    $database = "aula08";
    $username = "root";
    $password = "";

    // echo $estado;
    // echo $cep;
    // echo $rg;
    // echo $cpf;
    // echo $fone;
    
    $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn) {
        die ("falha na conexão" . mysqli_connect_error());
    }

    echo "conectado com sucesso";

    $sql = "INSERT INTO aula(aula_id, aula_materia, aula_escola, aula_professor, aula_data)VALUES('$estado','$cep','$rg','$cpf','$fone')";

    if (mysqli_query($conn, $sql)) {
        echo "<br>Registro gravado com sucesso!";
    }else{
        echo "Error: " . $sql. "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);

    ?>
    <form action='exercicio10.php'>
        <input type='submit' value='Novo formulário'>
    </form>
    <form action='exercicio11.php'>
        <input type='submit' value='Consultar'>
    </form>
</body>
</html>