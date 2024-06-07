<?php
$id_veiculo = $_POST["id-veiculo"];
$id_cor = $_POST["id-cor"];

$servername = "localhost";
$database = "veiculos";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn){
    die("falha na conexão". mysqli_connect_error());
}

if($id_veiculo > 0){
    if(isset($_POST["id-veiculo"])){
        $sql = "DELETE from veiculo WHERE veiculo_id = $id_veiculo";
        $resultado = mysqli_query($conn,$sql) or die ("erro");
    }
} elseif($id_cor > 0){
    if(isset($_POST["id-cor"])){
        $sql = "DELETE from cor WHERE cor_id = $id_cor";
        $resultado = mysqli_query($conn,$sql) or die ("erro");
    }
}

mysqli_close($conn);
?>

<p>deletado com sucesso!</p>
<form action="menu.php" method="post">
    <button>menu</button>
</form>