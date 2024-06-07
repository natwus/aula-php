<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar</title>
    <style>
        body{
            background-image: url(download.jpg);
            background-size: cover;
            display: flex;
            justify-content: center;
            padding-top: 50px;
        }
        div{
            display: flex;
            align-items: center;
            flex-direction: column;
            background: linear-gradient(45deg, #C7C638, #C638C7);
            padding: 55px;
            border-radius: 25px;
            gap: 15px;
        }
        form{
            display: flex;
            align-content: center;
            flex-direction: column;
            gap: 15px;
        }
        input{
            border-radius: 20px;
            font-size: 13px;
            padding: 15px;
            background-color: #38C7C6;
            border: 0;
            cursor: text;
            opacity: 0.7;
            color: white;
        }
        .acao{
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div>
        <form method="post" action="exercicio10-1.php" style="display: flex; flex-direction: column; align-items: center;">
            <!-- <input type="id" name="id" placeholder="ID">
            <input type="text" name="nome" placeholder="Placa">
            <input type="text" name="rua" placeholder="Renavam">
            <input type="text" name="numero" placeholder="Ano">
            <input type="text" name="cidade" placeholder="Fabricante"> -->
            <input type="text" name="estado" placeholder="ID">
            <input type="text" name="cep" placeholder="Matéria">
            <input type="text" name="rg" placeholder="Escola">
            <input type="text" name="cpf" placeholder="Professor">
            <input type="text" name="fone" placeholder="Data">
            <input class="acao" type="submit" value="Cadastrar">
        </form>
        <form action="dados.php"><input class="acao" type="submit" value="Voltar"></form>
    </div>
</body>
</html>