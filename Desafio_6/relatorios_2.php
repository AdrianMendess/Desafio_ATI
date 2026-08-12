<?php
// MODULO 4

/** @var mysqli $conexao1
 *  @var array $relatorios2
 */ //usado para indicar o tipo de dado e remover o erro que se repetia nas variaveis.
require_once 'conexao.php';
include 'consultas.php';
?>

    <?php foreach ($relatorios2 as $relatorio) { ?>

        <?php $resultado = mysqli_query($conexao1, $relatorio['query']); ?>

        <table>
            <tr>
                <th colspan="3"><?= $relatorio['titulo'] ?></th> <!--colspan="3" para deixar o titulo centralizado sobre três colunas-->
            </tr>
            <?php while ($linha = mysqli_fetch_assoc($resultado)) { ?>
                <tr>
                    <?php foreach ($linha as $chave => $valor) { ?>
                    
                        <td><?= $valor ?></td>
                    <?php } ?>
                </tr>
            <?php } ?>
        </table>
        <br>

    <?php } ?>
