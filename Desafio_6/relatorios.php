<?php 
require 'conexao.php';

$query = "SELECT cidade, COUNT(*) as total FROM tb_inscricoes_cnh_social GROUP BY cidade ORDER BY total DESC limit 20";

$resultado = mysqli_query($conexao1, $query);
?>

<table>
    <tr>
        <th>Municípios</th>
        <th>Total</th>
    </tr>
<?php while($linha = mysqli_fetch_assoc($resultado)){?>
    <tr>
        <td><?= $linha['cidade']?></td>
        <td><?= $linha['total']?></td>
    </tr>
    <?php }?> 
</table>




