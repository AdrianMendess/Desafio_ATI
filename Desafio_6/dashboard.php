<?php
                            //MODULO 2

/** @var mysqli $conexao1  //usado para indicar o tipo de dado e remover o erro que se repetia nas variaveis.
 *  @var array $dash */ 

require_once 'conexao.php';
require 'consultas.php';

?>

<div class="cx">
    <div class="divisao">

    <div class="card">
        <h3>Total de inscrições</h3>
        <?php
        $res = mysqli_query($conexao1, $dash[0]['query']);
        $linha = mysqli_fetch_assoc($res);
        ?>
        <p><?= $linha['total_inscricoes']; ?></p>
    </div>


    <div class="card">
        <h3> Total de Municipios </h3>
        <?php
        $res = mysqli_query($conexao1, $dash[1]['query']);
        $linha = mysqli_fetch_assoc($res);
        ?>
        <p><?= $linha['total']; ?></p>
    </div>


    <div class="card">
        <h3> Total de PCD </h3>
        <?php
        $res = mysqli_query($conexao1, $dash[2]['query']);
        $linha = mysqli_fetch_assoc($res);
        ?>
        <p><?= $linha['total']; ?></p>
    </div>
    </div>

    <div class="divisao">


    <div class="card">
        <h3>Total de não PCD</h3>
        <?php
        $res = mysqli_query($conexao1, $dash[3]['query']);
        $linha = mysqli_fetch_assoc($res);
        ?>
        <p><?= $linha['total']; ?></p>
    </div>


    <div class="card">
        <h3>Municipio com mais inscrições</h3>
        <?php
        $res = mysqli_query($conexao1, $dash[4]['query']);
        $linha = mysqli_fetch_assoc($res);
        ?>
        <p><?= $linha['cidade']. ': '. $linha['total']; ?></p>
    </div>


    <div class="card">
        <h3>Municipio com menos inscrições</h3>
        <?php
        $res = mysqli_query($conexao1, $dash[5]['query']);
        $linha = mysqli_fetch_assoc($res);
        ?>
        <p><?= $linha['cidade']. ': '. $linha['total']; ?></p>
    </div>

    </div>

</div>