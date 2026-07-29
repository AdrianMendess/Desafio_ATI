<?php
require 'conexao.php';

$query = "SELECT COUNT(*) as total_inscricoes FROM tb_inscricoes_cnh_social";
$query1 = "SELECT COUNT(DISTINCT cidade) as total FROM tb_inscricoes_cnh_social";
$query2 = "SELECT COUNT(*) as total FROM tb_inscricoes_cnh_social WHERE eh_pcd = 1";
$query3 = "SELECT COUNT(*) as total FROM tb_inscricoes_cnh_social WHERE eh_pcd = 0";
$query4 = "SELECT cidade, COUNT(*) as total FROM tb_inscricoes_cnh_social GROUP BY cidade ORDER BY total DESC LIMIT 1";
$query5 = "SELECT cidade, COUNT(*) as total FROM tb_inscricoes_cnh_social GROUP BY cidade ORDER BY total ASC LIMIT 1";


$resultado = mysqli_query($conexao1, $query);
$resultado1 = mysqli_query($conexao1, $query1);
$resultado2 = mysqli_query($conexao1, $query2);
$resultado3 = mysqli_query($conexao1, $query3);
$resultado4 = mysqli_query($conexao1, $query4);
$resultado5 = mysqli_query($conexao1, $query5);

?>
<table>
    <tr>
        <th> Total de Inscrições</th>
    </tr>
    <?php $linha = mysqli_fetch_assoc($resultado) ?>
    <tr>
        <td><?= $linha['total_inscricoes'] ?></td>

    </tr>
</table>

<table>
    <tr>
        <th> Total de Municípios</th>
    </tr>
    <?php $linha = mysqli_fetch_assoc($resultado1) ?>
    <tr>
        <td><?= $linha['total'] ?></td>
    </tr>
</table>

<table>
    <tr>
        <th> Total de PCD</th>
    </tr>
    <?php $linha = mysqli_fetch_assoc($resultado2) ?>
    <tr>
        <td><?= $linha['total'] ?></td>
    </tr>
</table>

<table>
    <tr>
        <th> Total de Não PCD</th>
    </tr>
    <?php $linha = mysqli_fetch_assoc($resultado3) ?>
    <tr>
        <td><?= $linha['total'] ?></td>
    </tr>
</table>

<table>
    <tr>
        <th> Município com maior número de inscrições</th>
        <th> Total </th>
        </tr>
    <?php $linha = mysqli_fetch_assoc($resultado4) ?>
    <tr>
        <td><?= $linha['cidade']?></td>
        <td><?= $linha['total']?></td>
    </tr>
</table>

<table>
    <tr>
        <th> Município com menor número de inscrições</th>
        <th> Total </th>
    </tr>
    <?php $linha = mysqli_fetch_assoc($resultado5) ?>
    <tr>
        <td><?= $linha['cidade'] ?></td>
        <td><?= $linha['total'] ?></td>
    </tr>
</table>
