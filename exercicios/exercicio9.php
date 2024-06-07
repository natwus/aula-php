<?php

$nomearquivo = 'dados.dat';

$file = fopen($nomearquivo, 'r');

$buffer = fread($file,filesize($nomearquivo));

fclose ($file);

echo ($buffer.'<br>');

