<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Cor</title>
    <style>
        form{
            display: flex;
            flex-direction: column;
            width: 190px;
        }
    </style>
</head>
<body>
    <form method="post" action="cadastrarCor.php">
        <h1>Registro de Cor</h1>
        <label for="">Descrição:</label>
        <input type="text" name="descricao">
        <label for="">Gradiente:</label>
        <input type="color" name="gradiente">
        <button>Registrar</button>
    </form>
</body>
<form action="menu.php" method="post">
    <button>voltar</button>
</form>
</html>