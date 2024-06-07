<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Veículo</title>
    <style>
        form{
            display: flex;
            flex-direction: column;
            width: 190px;
        }
    </style>
</head>
<body>
    <form method="post" action="cadastrarVeiculo.php" enctype="multipart/form-data">
        <h1>Registro de Veículo</h1>
        <label>Nome:</label>
            <input type="text" name="nome">
        <label>Marca:</label>
            <input type="text" name="marca">
        <label>Ano do modelo:</label>
            <input type="date" name="anoModelo">
        <label>Ano de fabricação:</label>
            <input type="date" name="anoFabricacao">
        <label>Foto 1:</label>
            <input type="file" name="veiculo_foto1" style="cursor: pointer;">
        <label>Foto 2:</label>
            <input type="file" name="veiculo_foto2" style="cursor: pointer;">
        <label>Foto 3:</label>
            <input type="file" name="veiculo_foto3" style="cursor: pointer;">
        <label>Cor:</label>
            <select name="cor_id">
                <?php
                    $servername = "localhost";
                    $database = "veiculos";
                    $username = "root";
                    $password = "";

                    $conn = mysqli_connect($servername, $username, $password, $database);

                    $sql = "SELECT * FROM cor order by cor_descricao asc";

                    $resultado = mysqli_query($conn, $sql) or die ("erro");

                    while ($row = mysqli_fetch_array($resultado)) {
                    $cor_id = $row["cor_id"];
                    $cor_descricao = $row["cor_descricao"];
    
                    echo "<option value='$cor_id'>".$cor_descricao."</option>";
                    }
                ?>
            </select>
        <button>Registrar</button>
    </form>
    <form action="menu.php" method="post">
        <button>voltar</button>
    </form>
</body>
</html>