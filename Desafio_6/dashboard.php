<?php
require 'conexao.php';

$sql = "SELECT COUNT(*) as total_inscricoes FROM tb_inscricoes_cnh_social";
$sql1 = "SELECT COUNT(DISTINCT cidade) as total FROM tb_inscricoes_cnh_social";


$resultado = mysqli_query($conexao1, $sql);
$resultado2 = mysqli_query($conexao1, $sql1);

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
    <?php $linha = mysqli_fetch_assoc($resultado2) ?>
    <tr>
        <td><?= $linha['total'] ?></td>
</table>
