-- -- Active: 1782932427960@@127.0.0.1@3306@db_cnh_social

-- 1. Listar todos os registros ordenados pela data de inscrição mais recente.
SELECT * FROM tb_inscricoes_cnh_social ORDER BY created_at desc;

-- 2. Contar o total de inscrições.
SELECT count(*) as total_de_inscrições FROM tb_inscricoes_cnh_social;

-- 3. Exibir quantos municípios distintos existem na base.
SELECT count(distinct cidade) FROM tb_inscricoes_cnh_social;

-- 4. Listar apenas candidatos PCD.
SELECT nome_completo FROM tb_inscricoes_cnh_social WHERE eh_pcd = 1;

-- 5. Listar apenas candidatos não PCD.
SELECT nome_completo FROM tb_inscricoes_cnh_social WHERE eh_pcd = 0;

-- 6. Exibir os candidatos com idade entre 18 e 24 anos.
SELECT nome_completo, data_nascimento FROM tb_inscricoes_cnh_social WHERE TIMESTAMPDIFF(YEAR, data_nascimento, CURDATE()) BETWEEN 18 and 24 ORDER BY data_nascimento DESC;
-- 7. Exibir os candidatos com idade acima de 60 anos.
SELECT nome_completo,data_nascimento FROM tb_inscricoes_cnh_social WHERE data_nascimento <=  DATE_SUB(CURDATE(), INTERVAL 60 YEAR) ORDER BY data_nascimento DESC;

-- 8. Listar os 100 primeiros registros cadastrados.
SELECT * FROM tb_inscricoes_cnh_social ORDER BY created_at ASC LIMIT 100 ;

-- 9. Exibir todas as inscrições realizadas em uma data específica.
SELECT *  FROM tb_inscricoes_cnh_social WHERE date(created_at) = '2025-11-02';

-- 10. Contar quantas inscrições ocorreram em cada dia.
SELECT date(created_at) as dias, COUNT(*) as total_dias from tb_inscricoes_cnh_social WHERE created_at >= '2025-10-02 00:00:00' AND created_at < '2025-11-03 00:00:00' GROUP BY dias ORDER BY dias asc;

-- 11. Quantidade de inscrições por município.
SELECT cidade, COUNT(*) as inscricoes FROM tb_inscricoes_cnh_social GROUP BY cidade ORDER BY cidade ASC;

-- 12. Quantidade de inscrições por faixa etária.
--Primeira tentativa
/* SELECT
CASE 
    WHEN data_nascimento <= DATE_SUB(CURDATE(), INTERVAL 18 YEAR) AND data_nascimento >= DATE_SUB(CURDATE(), INTERVAL 24 YEAR) THEN '18 a 24'
    WHEN data_nascimento <= DATE_SUB(CURDATE(), INTERVAL 25 YEAR) AND data_nascimento >= DATE_SUB(CURDATE(), INTERVAL 34 YEAR) THEN '25 a 34'
    WHEN data_nascimento <= DATE_SUB(CURDATE(), INTERVAL 35 YEAR) AND data_nascimento >= DATE_SUB(CURDATE(), INTERVAL 44 YEAR) THEN '35 a 44'
    WHEN data_nascimento <= DATE_SUB(CURDATE(), INTERVAL 45 YEAR) AND data_nascimento >= DATE_SUB(CURDATE(), INTERVAL 59 YEAR) THEN '45 a 59'
    WHEN data_nascimento <= DATE_SUB(CURDATE(), INTERVAL 60 YEAR) THEN '60 ou mais'
    WHEN data_nascimento is null  or data_nascimento = '' then 'who is this?'
END as faixa_etaria,
COUNT(*) as total_inscricoes
FROM tb_inscricoes_cnh_social
GROUP BY faixa_etaria ORDER BY faixa_etaria; */

-- Correrção
SELECT 
CASE
 WHEN TIMESTAMPDIFF(year, data_nascimento, curdate()) BETWEEN 18 and 24 then '18 a 24'
 WHEN TIMESTAMPDIFF(year, data_nascimento, curdate()) BETWEEN 25 and 34 then '25 a 34'
 WHEN TIMESTAMPDIFF(year, data_nascimento, curdate()) BETWEEN 35 and 44 then '35 a 44'
 WHEN TIMESTAMPDIFF(year, data_nascimento, curdate()) BETWEEN 45 and 59 then '45 a 59'
 WHEN TIMESTAMPDIFF(year, data_nascimento, curdate()) >= 60  then '60 ou mais'
end as faixa,
count(*) as total 
from tb_inscricoes_cnh_social
GROUP BY faixa ORDER BY faixa;


-- 13. Quantidade de inscrições por categoria desejada (A ou B).
SELECT categoria_desejada, COUNT(*) as total_categoria FROM tb_inscricoes_cnh_social GROUP BY categoria_desejada ORDER BY total_categoria DESC;

-- 14. Quantidade de inscrições por sexo. -- COLUNA NÃO EXISTE

-- 15. Quantidade de inscrições por condição PCD.
SELECT CASE
   WHEN eh_pcd = 1 THEN 'Pessoa com Deficiência' 
   WHEN eh_pcd = 0 THEN 'Sem Deficiência'
   WHEN eh_pcd is null THEN 'Não informado' 
 END as PCD, COUNT(*) as total  
 FROM tb_inscricoes_cnh_social GROUP BY eh_pcd ORDER BY total ASC;
-- Decidi aplicar o case para praticar.

-- 16. Exibir os 10 municípios com mais inscrições.
SELECT cidade, COUNT(*) as total FROM tb_inscricoes_cnh_social GROUP BY cidade ORDER BY total DESC LIMIT 10;

-- 17. Exibir os 10 municípios com menos inscrições.
SELECT cidade, COUNT(*) as total FROM tb_inscricoes_cnh_social GROUP BY cidade ORDER BY total ASC LIMIT 10;

-- 18. Calcular a média de inscrições por município.
/*SELECT cidade, AVG(total) as media_inscritos
FROM ( 
    SELECT cidade, COUNT(*) as total
    FROM tb_inscricoes_cnh_social
    GROUP BY cidade
) as sub
GROUP BY cidade;*/
-- 19. Identificar o município com maior número de inscrições.
SELECT cidade, COUNT(*) as total FROM tb_inscricoes_cnh_social GROUP BY cidade ORDER BY total DESC LIMIT 1;

-- 20. Identificar o município com menor número de inscrições
SELECT cidade, COUNT(*) as total FROM tb_inscricoes_cnh_social GROUP BY cidade ORDER BY total ASC LIMIT 1;

-- 21. Calcular o percentual de inscrições por faixa etária.

-- 22. Calcular o percentual de inscritos PCD e Não PCD.

-- 23. Calcular o percentual de inscrições por município.

-- 24. Identificar qual faixa etária representa a maior parcela dos inscritos.

-- 25. Calcular a participação percentual dos 5 municípios mais inscritos.

-- 26. Gerar relatório contendo Município, Total de inscritos e Percentual em relação ao total geral.

-- 27. Gerar relatório contendo Faixa etária, Quantidade e Percentual.

-- 28. Gerar relatório diário de inscrições contendo Data, Quantidade e Percentual sobre o total.

-- 29. Exibir os municípios que possuem mais de 5.000 inscrições.

-- 30. Exibir os municípios que possuem menos de 1.000 inscrições.

-- 31. Criar uma coluna calculada chamada faixa_etaria utilizando CASE.

-- 32. Criar uma coluna calculada chamada situacao_pcd.

-- 33. Classificar municípios utilizando CASE (Grande, Médio e Pequeno Porte).

-- 34. Exibir apenas municípios classificados como Grande Porte.

-- 35. Contar quantos municípios existem em cada classificação.

-- 36. Criar uma consulta que exiba o ranking dos municípios por quantidade de inscrições.

-- 37. Exibir os 5 municípios que representam a maior concentração de inscritos.

-- 38. Calcular a média diária de inscrições.

-- 39. Identificar o dia com maior número de inscrições.

-- 40. Identificar o dia com menor número de inscrições.

-- 41. Calcular o acumulado de inscrições por dia.

-- 42. Comparar cada município com a média estadual de inscrições.

-- 43. Exibir municípios acima da média estadual.

-- 44. Exibir municípios abaixo da média estadual.

-- 45. Produzir um relatório final semelhante aos gráficos apresentados no estudo da CNH Social.
