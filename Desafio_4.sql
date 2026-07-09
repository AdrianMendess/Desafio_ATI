-- Active: 1782932427960@@127.0.0.1@3306@db_cnh_social
-- 1: criei banco de dados chamado db_cnh_social
CREATE DATABASE IF NOT EXISTS db_cnh_social;

use db_cnh_social;
-- avisa ao sistema qual banco de dados vai ser usado nesta sessão

-- 2 e 3: tabela utilizando os tipos de dado para cada coluna.
CREATE TABLE tb_inscricoes_cnh_social (
    cpf varchar(11) primary key,
    nis varchar(11),
    data_nascimento varchar(11),
    nome_completo varchar(255),
    endereco varchar(255),
    numero varchar(11),
    complemento varchar(255),
    bairro varchar(255),
    cep varchar(11),
    cidade varchar(255),
    estado varchar(255),
    telefone varchar(30),
    email varchar(255),
    categoria_desejada varchar(11),
    eh_pcd boolean,
    numero_protocolo varchar(25),
    created_at varchar(25),
    updated_at varchar(25),
    status_email boolean,
    data_email varchar(25)
);

-- 4: Importei os dados do csv no heidiSQL e inseri nas tabelas.
-- 5: listar todos os registros  cadastrados.
select * from tb_inscricoes_cnh_social;

SELECT
    nome_completo,
    cpf,
    cidade,
    categoria_desejada -- 6: Consultando apenas colunas requisitadas no desafio.
FROM tb_inscricoes_cnh_social
WHERE
    cidade = 'São Luís';
-- 7: Listar todos os candidatos da cidade de São Luís.

-- 8: Listar candidados que desenham categoria B
SELECT
    nome_completo,
    cpf,
    cidade,
    categoria_desejada
FROM tb_inscricoes_cnh_social
WHERE
    categoria_desejada = 'B';

-- 9: Listar candidatos que são PCD.
SELECT
    nome_completo,
    cpf,
    cidade,
    categoria_desejada,
    eh_pcd
FROM tb_inscricoes_cnh_social
WHERE
    eh_pcd = '1';

-- 10: Listar candidados cujo e-mail ja foi enviado
SELECT
    nome_completo,
    cpf,
    cidade,
    categoria_desejada,
    status_email
FROM tb_inscricoes_cnh_social
WHERE
    status_email = '1';

--11: ordernar candidatos por nome completo em ordem alfabetica.
SELECT
    nome_completo,
    cpf,
    cidade,
    categoria_desejada
FROM tb_inscricoes_cnh_social
ORDER BY nome_completo ASC;

-- 12: Consultar candidatos cadastrados após 01/01/2000

-- Alterei tipo de dado exibido na coluna data_nascimento, para a consulta retornar corretamente.
UPDATE tb_inscricoes_cnh_social
SET
    data_nascimento = STR_TO_DATE(data_nascimento, '%d/%m/%Y');

UPDATE tb_inscricoes_cnh_social
SET
    created_at = STR_TO_DATE(created_at, '%d/%m/%Y %H:%i'),
    updated_at = STR_TO_DATE(updated_at, '%d/%m/%Y %H:%i');
UPDATE tb_inscricoes_cnh_social
SET
    data_email = STR_TO_DATE(data_email, '%d/%m/%Y %H:%i')
    where data_email is not null and data_email <>'\\N';

SELECT
    nome_completo,
    cpf,
    cidade,
    categoria_desejada,
    data_nascimento
FROM tb_inscricoes_cnh_social
WHERE
    data_nascimento > '2000/01/01'
ORDER BY data_nascimento ASC;

--13: Consultar candidatos maiores de idade.

SELECT
    nome_completo,
    cpf,
    cidade,
    categoria_desejada,
    data_nascimento
FROM tb_inscricoes_cnh_social
WHERE
    data_nascimento <= DATE_SUB(CURDATE(), INTERVAL 18 YEAR)
ORDER BY data_nascimento DESC;
-- data de nascimento menor ou igual a Date sub retirando um intervalo de 18 anos da data atual.

-- 14: Consultar cadastrados no dia 03/10/2025.
SELECT
    nome_completo,
    cpf,
    cidade,
    categoria_desejada,
    created_at
FROM tb_inscricoes_cnh_social
WHERE
   created_at like '2025-10-03%';
-- ou 
SELECT
    nome_completo,
    cpf,
    cidade,
    categoria_desejada,
    created_at
FROM tb_inscricoes_cnh_social
WHERE
   DATE (created_at) = '2025-10-03';
   --DATE () filtra minha pesquisa para encontrar somente a data, e não a hora.

-- 15: Consultar candidatos que receberam e-mail no dia 06/10/2025.
SELECT
    nome_completo,
    cpf,
    cidade,
    categoria_desejada,
    date(data_email) as data
FROM tb_inscricoes_cnh_social
WHERE
   data_email like '2025-10-06%';
--ou
SELECT
    nome_completo,
    cpf,
    cidade,
    categoria_desejada,
    date(data_email) as data
FROM tb_inscricoes_cnh_social
WHERE
   date(data_email) = '2025-10-06';

-- 16: Exibir nome, data de nascimento e idade aproximada de cada candidato.
SELECT 
nome_completo,
data_nascimento,
TIMESTAMPDIFF(year, data_nascimento, curdate()) as idade_aproximada
from tb_inscricoes_cnh_social
ORDER BY data_nascimento DESC;
-- substitui o datediff, que funciona de maneira diferente no mysql, aceitando somente dias como argumento.

-- 17. Contar quantos candidatos existem por cidade.
SELECT cidade , COUNT(*) as candidatos
FROM tb_inscricoes_cnh_social
GROUP BY cidade order by candidatos desc;

-- 18. Contar quantos candidatos existem por bairro.
SELECT bairro , COUNT(*) as candidatos
FROM tb_inscricoes_cnh_social
GROUP BY bairro order by candidatos desc;

-- 19. Contar quantos candidatos existem por categoria desejada.
SELECT categoria_desejada , COUNT(*) as candidatos
FROM tb_inscricoes_cnh_social
GROUP BY categoria_desejada order by candidatos desc;

-- 20. Contar quantos candidatos tiveram e-mail enviado e quantos não tiveram.
SELECT status_email , COUNT(*) as candidatos
FROM tb_inscricoes_cnh_social
GROUP BY status_email order by candidatos desc;

--21. Contar quantos candidatos são PCD e quantos não são.
SELECT eh_pcd , COUNT(*) as candidatos
FROM tb_inscricoes_cnh_social
GROUP BY eh_pcd order by candidatos desc;

--22. Verificar se existe CPF duplicado.
SELECT cpf, COUNT(*) as quantidade
FROM tb_inscricoes_cnh_social
group by cpf 
having quantidade > 1;
-- O having funciona com o group by e verifica se a quantidade será mais de um cpf, que mostraria os duplicados.

-- 23. Verificar se existe NIS duplicado.
SELECT nis, count(*) as quantidade
FROM tb_inscricoes_cnh_social
group by nis 
having quantidade > 1;

-- 24. Verificar se existe número de protocolo duplicado.
SELECT numero_protocolo, count(*) as quantidade
FROM tb_inscricoes_cnh_social
group by numero_protocolo
having quantidade > 1;

-- 25. Listar registros com telefone vazio ou inválido.
 SELECT 
 nome_completo,
 telefone
 from tb_inscricoes_cnh_social
 where telefone like '' or telefone is null;

-- 26. Listar registros com e-mail vazio ou sem @.
SELECT
nome_completo,
email
from tb_inscricoes_cnh_social
where email like '' or email  not like '%@%';

-- 27. Listar registros com CEP fora do padrão esperado.
SELECT 
nome_completo,
cep 
from tb_inscricoes_cnh_social
where cep not like '_____-___';
-- 28. Criar consulta exibindo Nome, CPF, Cidade, Bairro, Categoria e Situação do E-mail utilizando o CASE.
SELECT
nome_completo, cpf, cidade, bairro, categoria_desejada, status_email,
case 
when status_email = 1 then 'enviado'
else 'não enviado'
end as Situação_do_email
from tb_inscricoes_cnh_social;

-- 29. Criar relatório por cidade contendo Total de Inscritos, Total PCD e Total de E-mails enviados.
SELECT
cidade, count(*) as total_inscritos,
count(case when eh_pcd = 1 then 1 end) as total_pcd,
count(case when status_email = 1 then 1 end) as total_emails_enviados
from tb_inscricoes_cnh_social
GROUP BY cidade;
-- Count com o case para filtrar somente o que é 1 e contar, retornando cada total agrupado de de cada cidade.

-- 30. Criar consulta para identificar candidatos prioritários (PCD, maiores de idade, com email enviado e categoria preenchida).

Select  nome_completo, eh_pcd, status_email, categoria_desejada, data_nascimento
from tb_inscricoes_cnh_social
where eh_pcd = 1 and status_email = 1 and categoria_desejada is not null and data_nascimento <= DATE_SUB(CURDATE(), INTERVAL 18 YEAR)
order by data_nascimento desc;

-- Utilizei a mesma operação do exercicio 13 para exibir os maiores de idade. 