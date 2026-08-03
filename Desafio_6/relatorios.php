<?php
                                            // MODULO 3
require 'conexao.php';


$relatorios = [
    ['titulo' => 'Inscrições por Município', 'query' => "SELECT cidade, COUNT(*) as total FROM tb_inscricoes_cnh_social GROUP BY cidade ORDER BY total DESC LIMIT 5"],

    ['titulo' => 'Inscrições por Faixa Etária', 'query' => "SELECT
        CASE
            WHEN TIMESTAMPDIFF(YEAR, data_nascimento, CURDATE()) BETWEEN 18 AND 24 THEN '18 a 24 anos'
            WHEN TIMESTAMPDIFF(YEAR, data_nascimento, CURDATE()) BETWEEN 25 AND 34 THEN '25 a 34 anos'
            WHEN TIMESTAMPDIFF(YEAR, data_nascimento, CURDATE()) BETWEEN 35 AND 44 THEN '35 a 44 anos'
            WHEN TIMESTAMPDIFF(YEAR, data_nascimento, CURDATE()) BETWEEN 45 AND 59 THEN '45 a 59 anos'
            WHEN TIMESTAMPDIFF(YEAR, data_nascimento, CURDATE()) >= 60 THEN '60 anos ou mais'
        END as faixa_etaria,
        COUNT(*) as total
        FROM tb_inscricoes_cnh_social
        GROUP BY faixa_etaria ORDER BY faixa_etaria"],

        ['titulo'=> "Total por categoria", 'query' => "SELECT categoria_desejada, COUNT(*) as total_categoria FROM tb_inscricoes_cnh_social GROUP BY categoria_desejada ORDER BY total_categoria DESC"],

        ['titulo' => "Ranking de municipios", 'query' => "SELECT RANK() OVER (ORDER BY COUNT(*) DESC) as posicao, cidade, COUNT(*) as total FROM tb_inscricoes_cnh_social  GROUP BY cidade ORDER BY total DESC LIMIT 5" ],

        ['titulo' => "Relatório diário de inscrições", 'query' => " SELECT date(created_at) as dias, COUNT(*) as total_dias from tb_inscricoes_cnh_social WHERE created_at >= '2025-10-02 00:00:00' AND created_at < '2025-11-03 00:00:00' GROUP BY dias ORDER BY dias asc"]
];

foreach ($relatorios as $relatorio) {

    $resultado = mysqli_query($conexao1, $relatorio['query']);
    ?>

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
