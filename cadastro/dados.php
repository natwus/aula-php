<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabela de dados</title>
    <style>
        body{
            background-image: url(download.jpg);
            background-size: cover;
            display: flex;
            justify-content: center;
            padding-top: 240px;
        }
        div{
            display: flex;
            align-items: center;
            flex-direction: column;
            gap: 15px;
            background: linear-gradient(45deg, #C7C638, #C638C7);
            padding: 70px;
            border-radius: 25px;
        }
        form{
            display: flex;
            align-content: center;
            flex-direction: column;
        }
        input{
            border-radius: 20px;
            font-size: 15px;
            padding: 20px;
            background-color: #38C7C6;
            border: 0;
            cursor: pointer;
            opacity: 0.7;
            color: white;
        }
        .apagar{
            gap: 10px;
        }
        .digitar{
            cursor: text;
        }
    </style>
</head>
<body>
    <div>
        <form action="exercicio10.php">
            <input type="submit" value="Cadastrar">
        </form>
        <form action="exercicio11.php">
            <input type="submit" value="Consultar">
        </form>
        <form class="apagar" method="POST" action="exercicio12.php">
            <input class="digitar" type="text" name="id" id="id" placeholder="Apagar Cadastro">
            <input type="submit" value="Apagar">
        </form>
    </div>
</body>
</html>