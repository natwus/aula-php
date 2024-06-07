<?php
    //tr:linha td:coluna
    echo "<table border='1'>";
    $n = 16;
    for ($a = 0; $a < $n; $a++) {
        echo "<tr>";
        for ($b = 0; $b < $n; $b++) {
            echo "<td>";
            $a + 1;
            echo"C:" . ($a + 1) . " x " . "L:" . ($b + 1);
            echo "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";