<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fornecedor</title>
</head>
<body>
  <h1>Cadastrar</h1>
  <form action="inclusao.php" method="post">
    <input type="text" name="nomeFornecedor" placeholder="Nome Fornecedor" />
    <input type="text" name="estadoFornecedor" placeholder="Estado Fornecedor" />
    <input type="text" name="cidadeFornecedor" placeholder="Cidade Fornecedor" />
    <input type="text" name="enderecoFornecedor" placeholder="Endereço Fornecedor"></input>
    <input type="number" name="cnpjFornecedor" placeholder="CNPJ Fornecedor" />
    <select name="statusFornecedor">
      <option value="" disabled selected>Status Fornecedor</option>
      <option value="1">Disponível</option>
      <option value="0">Indisponível</option>
    </select>
    <input type="text" name="emailFornecedor" placeholder="Email Fornecedor" />
    <input type="number" name="telFornecedor" placeholder="Telefone Fornecedor" />
    <input type="number" name="cepFornecedor" placeholder="CEP Fornecedor" />
    <button type="submit">
      Enviar</i>
    </button>
  </form>
  <form method="post" action="menu.php">
    <button>Voltar</button>
  </form>
</body>
</html>