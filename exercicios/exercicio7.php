<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Combinações de Números</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-top: 20px;
        }

        form {
            text-align: center;
        }

        input[type="number"], input[type="submit"] {
            padding: 10px;
            margin: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: center;
            padding: 15px;
            transition: background-color 0.3s;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover td {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>

<h2>Combinações de Números</h2>

<form method="post">
    <label for="num1">Número 1:</label>
    <input type="number" name="num1" id="num1" required><br><br>

    <label for="num2">Número 2:</label>
    <input type="number" name="num2" id="num2" required><br><br>

    <input type="submit" value="Mostrar Combinações">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num1 = $_POST["num1"];
    $num2 = $_POST["num2"];

    echo "<h2>Combinações:</h2>";
    echo "<table>";
    $count = 0;
    $used_combinations = array();
    echo "<tr>";
    generateCombinations($num1, $num2, $count, $used_combinations);
    echo "</tr>";
    echo "</table>";
}

function generateCombinations($num1, $num2, &$count, &$used_combinations) {
    $max_iterations = 1000; // Limitando o número de iterações
    for ($i = min($num1, $num2); $i <= max($num1, $num2) && $count < $max_iterations; $i++) {
        for ($j = min($num1, $num2); $j <= max($num1, $num2) && $count < $max_iterations; $j++) {
            for ($k = min($num1, $num2); $k <= max($num1, $num2) && $count < $max_iterations; $k++) {
                $combination = array($i, $j, $k);
                sort($combination);
                if (!in_array($combination, $used_combinations) && $i != $j && $i != $k && $j != $k) {
                    echo "<td>$i, $j, $k</td>";
                    $count++;
                    if ($count % 50 == 0) {
                        echo "</tr><tr>";
                    }
                    $used_combinations[] = $combination;
                }
            }
        }
    }
}
?>


</body>
</html>
