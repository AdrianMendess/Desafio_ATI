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
        echo "o número $procurado não está no array!";
    }
}

BuscarNumero(8);

/* 
- Função criada com parametro $procurado, para ser encontrado na definicção de função.
- Defini uma variavel para receber o array.
- for para a criação do array contendo os numeros de 1 a 31. definindo 1 como valor inicial e adicionar sempre mais 1 caso seja menor ou igual a 31.

- Armazenei o resultado do for na variavel $num para a criação do array.
- após fechar o for, shuffle embaralhou os valores do array.
- print_r para exibir o array de forma organizada na página.
- echo '<br'; para quebra de linha.
- variavel $econtrado que será usada para testar se a expressão foi atendida.
- No foreach foi definido variaveis pra representar o indice e valor de cada numero do array.
- No if fiz a comparação para retornar se o valor é identico ao parametro.
- echo para mostrar o resultado caso seja true.
-  $econtrado para indicar que foi atendida com true.
- break interrompe o loop caso seja atendido.
- if negando a variavel $encontrado para tornar false
- echo para exibir a mensagem embaixo, afirmando que o argumento não está no array.
- 
- Chamando a função seguida do argumento a ser localizada no array.
*/
