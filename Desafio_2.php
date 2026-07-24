<?php

function consultarAssento($linha, $coluna)
{
    $assento = [        //Array com a matriz de 5 linhas e colunas.
        [0, 1, 0, 0, 1],
        [1, 0, 0, 1, 0],
        [0, 1, 1, 0, 0],
        [1, 0, 1, 1, 0],
        [0, 1, 0, 1, 0],
    ];
    if (($linha < 0 || $linha > 4) || ($coluna < 0 || $coluna > 4)) {
        return 'POSIÇÃO INVÁLIDA!';
        //condição para apresentar mensagem caso a linha ou coluna ultrapasse o valor do indice.
    }
    if ($assento[$linha][$coluna] === 0) {
        return "O assento [$linha][$coluna] está: LIVRE";
        //entre chaves adicionei os parametros, para buscarem os valores do array, e exibir uma mesagem caso retorne o que a condição pede.
    } else {
        return "O assento [$linha][$coluna] está: OCUPADO";
    }
}

function exibirSituacao($linha, $coluna)
{
    echo consultarAssento($linha, $coluna); // Exibe a função criada para exibir as mensagens de retorno. 
}
exibirSituacao(1, 0);
// chama a função que pede para verificar os argumentos que serão procurados e exibir a situação do valor buscado.

// ------------------------------------------------

//Primeira alternativa que tentei
  
/*function consultarAssento($linha, $coluna)
{
    $assento = [
        [0, 1, 0, 0, 1],
        [1, 0, 0, 1, 0],
        [0, 1, 0, 0, 0],
        [1, 0, 1, 1, 0],
        [0, 1, 0, 1, 0],
    ];
    if (($linha < 0 || $linha >= 4) || ($coluna < 0 || $coluna >= 4)) {
        return 'POSIÇÃO INVÁLIDA!';
    }
    if ($assento[$linha][$coluna] === 0) {
        return 'LIVRE';
    } else {
        return 'OCUPADO';
    }
}

function exibirSituacao($linha, $coluna)
{
     if (($linha > 4 ) || ($coluna > 4)) {
         echo consultarAssento($linha, $coluna);
         }
         else{
             echo "O assento [$linha][$coluna] está: ";
     echo consultarAssento($linha, $coluna);
        }
}
exibirSituacao(1, -1);
*/

