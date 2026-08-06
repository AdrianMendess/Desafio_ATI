<?php
// MODULO 3

/** @var mysqli $conexao1
 *  @var array $relatorios1
 */ //usado para indicar o tipo de dado e remover o erro que se repetia nas variaveis.
require 'conexao.php';
include 'consultas.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Relatorios</title>
</head>

<body>
    <header>
        <h1>Inscrições</h1>
    </header>
    
    <?php foreach ($relatorios1 as $relatorio) { ?>

        <?php $resultado = mysqli_query($conexao1, $relatorio['query']); ?> 

        <table>
            <tr>
                <th colspan="2"><?= $relatorio['titulo'] ?></th> <!--colspan="2" para deixar o titulo centralizado sobre duas colunas-->
            </tr>
            <?php while ($linha = mysqli_fetch_assoc($resultado)) { ?>
                <tr>
                </tr>
                <tr>
                    <?php foreach ($linha as $chave => $valor) { ?>
                        <td><?= $valor ?></td>
                    <?php } ?>
                </tr>
            <?php } ?>
        </table>
        <br>

    <?php } ?>
</body>

</html>