<?php
function BuscarNumero($procurado)
{
    $num = [];

    for ($i = 1; $i <= 31; $i++) {
        $num[] = $i;
    }
    shuffle($num);
    print_r($num);
    echo '<br>';
    $encontrado = false;
    foreach ($num as $index => $valor) {
        if ($valor === $procurado) {
            echo "O número $valor está no índice: $index";
            $encontrado = true;
            break;
        }
    }
    if (!$encontrado) {
        echo "o numero $procurado não está no array!";
    }
}

BuscarNumero(8);


