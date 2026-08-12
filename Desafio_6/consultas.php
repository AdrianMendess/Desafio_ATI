<?php
//Inscrições por agrupamento.

$relatorios1 = [
    ['titulo' => 'Inscrições por Município', 'query' => "SELECT cidade, COUNT(*) as total FROM tb_inscricoes_cnh_social GROUP BY cidade ORDER BY total DESC LIMIT 5", 'tipo_grafico' => "bar"],

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
        GROUP BY faixa_etaria ORDER BY faixa_etaria", 'tipo_grafico' => "bar"],

    ['titulo' => "Total por categoria", 'query' => "SELECT categoria_desejada, COUNT(*) as total_categoria FROM tb_inscricoes_cnh_social GROUP BY categoria_desejada ORDER BY total_categoria DESC", 'tipo_grafico' => "pie"],

    ['titulo' => "Ranking de municipios", 'query' => "SELECT RANK() OVER (ORDER BY COUNT(*) DESC) as posicao, cidade, COUNT(*) as total FROM tb_inscricoes_cnh_social  GROUP BY cidade ORDER BY total DESC LIMIT 5", 'tipo_grafico' => "bar"],

    ['titulo' => "Relatório diário de inscrições", 'query' => " SELECT date(created_at) as dias, COUNT(*) as total_dias from tb_inscricoes_cnh_social WHERE created_at >= '2025-10-02 00:00:00' AND created_at < '2025-11-03 00:00:00' GROUP BY dias ORDER BY dias asc", 'tipo_grafico' => "line"]
];

// percentual de inscrições por agrupamento.
$relatorios2 = [
    ['titulo' => "Percentual por faixa etária", 'query' => "SELECT 
 CASE
 WHEN TIMESTAMPDIFF(year, data_nascimento, curdate()) BETWEEN 18 and 24 then '18 a 24'
 WHEN TIMESTAMPDIFF(year, data_nascimento, curdate()) BETWEEN 25 and 34 then '25 a 34'
 WHEN TIMESTAMPDIFF(year, data_nascimento, curdate()) BETWEEN 35 and 44 then '35 a 44'
 WHEN TIMESTAMPDIFF(year, data_nascimento, curdate()) BETWEEN 45 and 59 then '45 a 59'
 WHEN TIMESTAMPDIFF(year, data_nascimento, curdate()) >= 60  then '60 ou mais'
 end as faixa,
 CONCAT(ROUND((count(*)/(SELECT COUNT(*) from tb_inscricoes_cnh_social)) * 100, 2), '\n%') as percentual
 from tb_inscricoes_cnh_social
 GROUP BY faixa ORDER BY faixa"],

    ['titulo' => "Percentual PCD", 'query' => "SELECT CASE
   WHEN eh_pcd = 1 THEN 'PCD' 
   WHEN eh_pcd = 0 THEN 'Não PCD'
   WHEN eh_pcd is null THEN 'Não informado' 
 END as PCD, 
 CONCAT(ROUND((COUNT(*)/ (SELECT COUNT(*) FROM tb_inscricoes_cnh_social)) * 100, 2), '\n%') as Percentual
 FROM tb_inscricoes_cnh_social GROUP BY eh_pcd"],

    ['titulo' => "Participação dos municípios", 'query' => "SELECT cidade, CONCAT(ROUND((COUNT(*)/(SELECT COUNT(*) FROM tb_inscricoes_cnh_social)) * 100, 2), '\n%') as percentual
 FROM tb_inscricoes_cnh_social GROUP BY cidade ORDER BY percentual DESC LIMIT 5"],

    ['titulo' => "Top 5 Municípios", 'query' => "SELECT RANK() OVER (ORDER BY COUNT(*) DESC) as posicao, cidade, COUNT(*) as totaL  FROM tb_inscricoes_cnh_social  GROUP BY cidade ORDER BY total DESC LIMIT 5"]
];

// Totais de inscrições.
$dash = [
    ['query' => "SELECT COUNT(*) as total_inscricoes FROM tb_inscricoes_cnh_social"],

    ['query' => "SELECT COUNT(DISTINCT cidade) as total FROM tb_inscricoes_cnh_social"],

    ['query' => "SELECT COUNT(*) as total FROM tb_inscricoes_cnh_social WHERE eh_pcd = 1"],

    ['query' => "SELECT COUNT(*) as total FROM tb_inscricoes_cnh_social WHERE eh_pcd = 0"],

    ['query' => "SELECT cidade, COUNT(*) as total FROM tb_inscricoes_cnh_social GROUP BY cidade ORDER BY total DESC LIMIT 1"],

    ['query' => "SELECT cidade, COUNT(*) as total FROM tb_inscricoes_cnh_social GROUP BY cidade ORDER BY total ASC LIMIT 1"]
];
