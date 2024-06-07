<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cliente</title>
</head>
<body>
    <form method="post" action="inclusao.php" enctype="multipart/form-data">
        <h1>Cliente</h1>
        <label>Nome:</label>
        <input type="text" name="nome">
        <label>CPF:</label>
        <input type="number" name="cpf">
        <label>Data de nascimento:</label>
        <input type="date" name="data">
        <label>CEP:</label>
        <input type="number" name="cep">
        <label>Estado:</label>
        <input type="text" name="estado">
        <label>Cidade:</label>
        <input type="text" name="cidade">
        <label>Rua:</label>
        <input type="text" name="rua">
        <label>Numero:</label>
        <input type="number" name="numero">
        <label>Sexo:</label>
        <input type="text" name="sexo">
        <label>Telefone:</label>
        <input type="number" name="tel">
        <label>E-mail:</label>
        <input type="email" name="email">
        <button>Cadastrar</button>
    </form>
    <form method="post" action="menu.php">
        <button>Voltar</button>
    </form>
</body>
</html>