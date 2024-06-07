<?php
$nome = $_POST["nome"];
$data = $_POST["data"];
$pessoa_estado = $_POST["pessoa_estado"];
$pessoa_cidade = $_POST["pessoa_cidade"];

$servername = "localhost";
$database = "pessoas";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password, $database);

$sql = "INSERT INTO dados_pessoais (pessoa_nome, pessoa_cidade, pessoa_estado, pessoa_nascimento) VALUES ('$nome', '$pessoa_cidade', '$pessoa_estado', '$data')";
if (mysqli_query($conn, $sql)) {
    echo "
        <!DOCTYPE html>
        <html lang='pt-br'>
        <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Cadastrado!</title>
        <style>
        body {
            display: flex;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            background: #0e2430;
            background: linear-gradient(135deg, #121212 25%, #1a1a1a 25%, #1a1a1a 50%, #121212 50%, #121212 75%, #1a1a1a 75%, #1a1a1a);
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
            height: 250px;
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
        .bg {
            position: absolute;
            top: 5px;
            left: 5px;
            width: 290px;
            height: 240px;
            z-index: 2;
            background: #fc3a51;
            border-radius: 10px;
            overflow: hidden;
            outline: 2px solid white;
            padding: 20px;
        }
        div{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-content: center;
            align-items: center;
            gap: 13px;
        }
        button{
            padding: 8px;
            border-radius: 8px;
            border: none;
            background-color: #e8d5b7;
            cursor: pointer;
            transition: 0.3s ease;
            margin-top: 15px;
            width: 120px;
        }
        button:hover{
            transform: scale(120%);
            transition: 0.3s ease;
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
        <div class='card'>
            <div class='bg'>
                <div>
                    <br>Registro Gravado Com Sucesso!
                    <form action='tabelaCadastro.php' method='post'>
                        <button>Consultar</button>
                    </form>
                    <form action='cadastrar.php' method='post'>
                        <button>Voltar</button>
                    </form>
                </div>
            </div>
            <div class='blob'></div>
        </div>
        </body>
        </html>
        ";
} else {
    echo "<br>Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);