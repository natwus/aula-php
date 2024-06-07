<?php

function apagarRegistro($id) {
    $linhas = file("dados.dat");
    $file = fopen("dados.dat", "w");

    foreach ($linhas as $linha) {
        $dados = explode(";", $linha);

        if ($dados[0] != $id) {
            fwrite($file, $linha);
        }
    }
    fclose($file);
    header("Location: dados.php");
    exit(); 
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
    $id = $_POST["id"];
    
    apagarRegistro($id);
}