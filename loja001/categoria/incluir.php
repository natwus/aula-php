<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar</title>
</head>
<body>
    <form method="post" action="inclusao.php" enctype="multipart/form-data">
        <h1>Categoria</h1>
        <label>Nome:</label>
        <input type="text" name="nome">
        <label>Descrição:</label>
        <input type="text" name="descricao">
        <button>Cadastrar</button>
    </form>
    <form method="post" action="menu.php">
        <button>Voltar</button>
    </form>
</body>
</html>