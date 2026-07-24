<?php
require 'conexao.php';

$sql = "SELECT pessoas.id, nome, id_pessoa, cpf, documentos_pessoa.comprovante_residencia
FROM pessoas
JOIN documentos_pessoa on documentos_pessoa.id_pessoa = pessoas.id";

$resultado = mysqli_query($conexao, $sql);
?>

<table>
<tr>
<th>Nome</th> 
<th>CPF</th>
<th>Comprovante</th>
</tr>
<?php while ($linha = mysqli_fetch_assoc($resultado)) { ?>
    <tr>
        <td><?=$linha ['nome'] ?></td>
        <td><?= $linha['cpf'] ?></td>
        <td><?= $linha['comprovante_residencia']?></td>
    </tr>
    <?php } ?>
</table>

