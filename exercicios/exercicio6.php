<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f0f0;
            flex-direction: column;
        }

        form {
            background-color: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            width: 400px;
        }

        label {
            font-weight: bold;
            color: #555;
            margin-bottom: 10px;
            display: block;
        }

        input[type="text"], input[type="submit"] {
            margin-bottom: 20px;
            padding: 15px 20px;
            width: calc(50% - 10px);
            box-sizing: border-box;
            border: 2px solid #ccc;
            border-radius: 8px;
            font-size: 16px;
            transition: border-color 0.3s ease;
        }

        input[type="text"]:focus, input[type="submit"]:hover {
            border-color: #4CAF50;
            outline: none;
        }

        input[type="submit"] {
            cursor: pointer;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 18px;
            transition: background-color 0.3s ease;
            width: auto;
            padding: 15px 30px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .result {
            margin-top: 20px;
            font-weight: bold;
            font-size: 20px;
            color: #333;
            text-align: center;
        }
    </style>
</head>
<body>
    <center>
        <form action="" method="post">
            <label for="num1">Primeiro Número:</label>
            <input id="num1" name="num1" type="text">
            <label for="num2">Segundo Número:</label>
            <input id="num2" name="num2" type="text">
            <div style="display: flex; justify-content: space-between;">
                <input type="submit" name="operacao" value="+">     
                <input type="submit" name="operacao" value="-">     
                <input type="submit" name="operacao" value="*">     
                <input type="submit" name="operacao" value="/">  
                <input type="submit" name="operacao" value="^">  
            </div>
        </form>
    </center>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $a = $_POST['num1'];
        $b = $_POST['num2'];
        $op = $_POST['operacao'];

        if (!empty($a) && !empty($b) && isset($op)) {
            if ($op == '+')
                $c = $a + $b;
            else if ($op == '-')
                $c = $a - $b;
            else if ($op == '*')
                $c = $a * $b;
            else if ($op == '/')
                $c = $a / $b;
            else if ($op == '^')
                $c = pow($a, $b);
            else
                $c = "Operação inválida";

            echo "<div class='result'>O resultado da operação: $c</div>";
        } else {
            echo "<div class='result'>Por favor, preencha todos os campos e selecione uma operação.</div>";
        }
    }
    ?>   
</body>
</html>
