<!DOCTYPE html>
<html lang="pt-br">
<head>

                <!-- <th>Modelo</th>
                <th>Quilometragem</th>
                <th>Cor</th>
                <th>Chassi</th>
                <th>Propulsão</th> -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar</title>
</head>
<body>
    <?php
    function print_row($row_data) {
        echo "<tr>";
        foreach ($row_data as $cell) {
            echo "<td>$cell</td>";
        }
        echo "</tr>";
    }

    function organize_data($filename) {
        echo "
        <div>
            <table border='2'>
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
        
        echo "
            </table>
            <form action='dados.php'>
                <input type='submit' value='Voltar'>
            </form>
        </div>";
    }

    organize_data("dados.dat");

    echo"<style>
            body{
                background-image: url(download.jpg);
                background-size: cover;
                display: flex;
                justify-content: center;
                padding-top: 70px;
            }
            div{
                background: linear-gradient(45deg, #C7C638, #C638C7);
                padding: 25px;
                border-radius: 20px;
                display: flex;
                flex-direction: column;
                gap: 40px;
                align-items: center;
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
            }
            table{
                background-color: #38C7C6;
                border-radius: 20px;
                color: white;
                opacity: 0.7;
            }
        </style>";
        ?>
</body>
</html>