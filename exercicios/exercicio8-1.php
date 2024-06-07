<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $frase1 = $_POST["frase1"];
    $frase2 = $_POST["frase2"];
}

echo"<form action='exercicio9.php'>
<input type='submit' value='Ler'>
</form>";

$file = fopen ('exec.txt', 'w'); // escrevendo em um arquivo

fwrite ($file, $frase1 . ' ');

fclose ($file);

$file = fopen ('exec.txt','a+'); // a+ coloca o ponteiro no final do arquivo

fwrite ($file, $frase2); 

fclose ($file);