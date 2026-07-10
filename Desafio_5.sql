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
SELECT nome_completo, data_nascimento FROM tb_inscricoes_cnh_social WHERE data_nascimento <= DATE_SUB(CURDATE(), INTERVAL 18 YEAR) AND data_nascimento >= DATE_SUB(CURDATE(), INTERVAL 24 YEAR) ORDER BY data_nascimento DESC;

-- 7. Exibir os candidatos com idade acima de 60 anos.
SELECT nome_completo,data_nascimento FROM tb_inscricoes_cnh_social WHERE data_nascimento < DATE_SUB(CURDATE(), INTERVAL 60 YEAR) ORDER BY data_nascimento DESC;

-- 8. Listar os 100 primeiros registros cadastrados.
SELECT * FROM tb_inscricoes_cnh_social ORDER BY created_at ASC LIMIT 100 ;

-- 9. Exibir todas as inscrições realizadas em uma data específica.
SELECT *  FROM tb_inscricoes_cnh_social WHERE date(created_at) = '2025-11-02';

-- 10. Contar quantas inscrições ocorreram em cada dia.
SELECT date(created_at)as total, COUNT(*) as total_dias from tb_inscricoes_cnh_social GROUP BY total ORDER BY total_dias DESC;

-- 11. Quantidade de inscrições por município.
-- 12. Quantidade de inscrições por faixa etária.
-- 13. Quantidade de inscrições por categoria desejada (A ou B).
-- 14. Quantidade de inscrições por sexo.
-- 15. Quantidade de inscrições por condição PCD.
-- 16. Exibir os 10 municípios com mais inscrições.
-- 17. Exibir os 10 municípios com menos inscrições.
-- 18. Calcular a média de inscrições por município.