<?php 
                     // MODULO 4
                     
require 'conexao.php';


$relatorios = [
    ['titulo' => "Percentual por faixa etária", 'query' => "SELECT 
CASE
 WHEN TIMESTAMPDIFF(year, data_nascimento, curdate()) BETWEEN 18 and 24 then '18 a 24'
 WHEN TIMESTAMPDIFF(year, data_nascimento, curdate()) BETWEEN 25 and 34 then '25 a 34'
 WHEN TIMESTAMPDIFF(year, data_nascimento, curdate()) BETWEEN 35 and 44 then '35 a 44'
 WHEN TIMESTAMPDIFF(year, data_nascimento, curdate()) BETWEEN 45 and 59 then '45 a 59'
 WHEN TIMESTAMPDIFF(year, data_nascimento, curdate()) >= 60  then '60 ou mais'
end as faixa,
(count(*)/(SELECT COUNT(*) from tb_inscricoes_cnh_social)) * 100 as percentual
from tb_inscricoes_cnh_social
GROUP BY faixa ORDER BY faixa"],

['titulo' => "Percentual PCD", 'query' => "SELECT CASE
   WHEN eh_pcd = 1 THEN 'PCD' 
   WHEN eh_pcd = 0 THEN 'Não PCD'
   WHEN eh_pcd is null THEN 'Não informado' 
 END as PCD, 
 (COUNT(*)/ (SELECT COUNT(*) FROM tb_inscricoes_cnh_social)) * 100  as Percentual
 FROM tb_inscricoes_cnh_social GROUP BY eh_pcd"],

['titulo' => "Particupação dos municípios", 'query' => "SELECT cidade, (COUNT(*)/(SELECT COUNT(*) FROM tb_inscricoes_cnh_social)) * 100 as percentual
FROM tb_inscricoes_cnh_social GROUP BY cidade ORDER BY percentual DESC LIMIT 5"],

['titulo' => "Top 5 Municípios", 'query' => "SELECT RANK() OVER (ORDER BY COUNT(*) DESC) as posicao, cidade, COUNT(*) as totaL  FROM tb_inscricoes_cnh_social  GROUP BY cidade ORDER BY total DESC LIMIT 5"]
];

foreach ($relatorios as $relatorio) {

    $resultado = mysqli_query($conexao1, $relatorio['query']);
    ?>

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
