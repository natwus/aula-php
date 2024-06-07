<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            padding-top: 110px;
            background: #0e2430;
            background: linear-gradient(135deg,
                    #121212 25%,
                    #1a1a1a 25%,
                    #1a1a1a 50%,
                    #121212 50%,
                    #121212 75%,
                    #1a1a1a 75%,
                    #1a1a1a);
            background-size: 40px 40px;
            animation: move 4s linear infinite;
        }

        @keyframes move {
            0% {
                background-position: 0 0;
            }

            100% {
                background-position: 40px 40px;
            }
        }

        .card {
            position: relative;
            width: 300px;
            height: 500px;
            border-radius: 14px;
            z-index: 1111;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            box-shadow: 5px 5px 15px #fc3a51, -5px -5px 15px #fc3a51;
            padding: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 8px;
        }

        input,
        select,
        button {
            padding: 8px;
            border-radius: 8px;
            border: none;
            background-color: #e8d5b7;
            cursor: pointer;
            transition: 0.3s ease;
        }

        input:focus,
        select:focus {
            transform: scale(120%);
        }

        input:hover,
        select:hover,
        button:hover {
            transform: scale(120%);
            transition: 0.3s ease;
        }

        button {
            margin-top: 25px;
            width: 120px;
        }

        .bg {
            position: absolute;
            top: 5px;
            left: 5px;
            width: 290px;
            height: 490px;
            z-index: 2;
            background: #fc3a51;
            border-radius: 10px;
            overflow: hidden;
            outline: 2px solid white;
            padding: 20px;
        }

        .blob {
            position: absolute;
            z-index: 1;
            top: 50%;
            left: 50%;
            width: 150px;
            height: 150px;
            border-radius: 50%;
            background-color: #e8d5b7;
            opacity: 1;
            filter: blur(12px);
            animation: blob-bounce 5s infinite ease-in-out;
            padding: 90px;
        }

        @keyframes blob-bounce {
            0% {
                transform: translate(-100%, -100%) translate3d(0, 0, 0);
            }

            25% {
                transform: translate(-100%, -100%) translate3d(100%, 0, 0);
            }

            50% {
                transform: translate(-100%, -100%) translate3d(100%, 100%, 0);
            }

            75% {
                transform: translate(-100%, -100%) translate3d(0, 100%, 0);
            }

            100% {
                transform: translate(-100%, -100%) translate3d(0, 0, 0);
            }
        }
    </style>
</head>

<body>
    <div class="card">
        <div class="bg">
                    <?php
                    $servername = "localhost";
                    $database = "pessoas";
                    $username = "root";
                    $password = "";
                    $id = $_POST["pessoa_id"];
                    $nome = $_POST["pessoa_nome"];
                    $data = $_POST["pessoa_nascimento"];
                    $pessoa_estado = $_POST["pessoa_estado"];
                    $pessoa_cidade = $_POST["pessoa_cidade"];

                    echo "<form method='post' action='alterar.php' enctype='multipart/form-data'>
                    <h1>Alterar cadastro</h1>
                    <input hidden type='number' name='pessoa_id' value='$id'>
                    <label>Nome:</label>
                    <input type='text' name='nome' style='cursor: text;' value='$nome'>
                    <label>Data de nascimento:</label>
                    <input type='date' name='data' value='$data'>
                    <label>Estado:</label> 
                    <select name='pessoa_estado' value='$pessoa_estado'>";

                    $conn = mysqli_connect($servername, $username, $password, $database);

                    $sql = "SELECT * FROM estado order by estado_nome asc";

                    $resultado = mysqli_query($conn, $sql) or die ("erro");

                    while ($row = mysqli_fetch_array($resultado)) {
                        $estado_id = $row["estado_id"];
                        $estado_nome = $row["estado_nome"];

                        echo "<option value='$estado_nome'>" . $estado_nome . "</option>";
                    }
                    echo "</select>";

                    echo "<label>Cidade:</label>
                    <select name='pessoa_cidade' value='$pessoa_cidade'>";

                    $conn = mysqli_connect($servername, $username, $password, $database);

                    $sql = "SELECT * FROM cidade order by cidade_nome asc";

                    $resultado = mysqli_query($conn, $sql) or die ("erro");

                    while ($row = mysqli_fetch_array($resultado)) {
                        $cidade_id = $row["cidade_id"];
                        $cidade_nome = $row["cidade_nome"];

                        echo "<option value='$cidade_nome'>" . $cidade_nome . "</option>";
                    }
                    echo "</select>
                    <button>Alterar</button>
                    </form>"
                    ?>
        </div>
        <div class="blob"></div>
    </div>
</body>
</html>