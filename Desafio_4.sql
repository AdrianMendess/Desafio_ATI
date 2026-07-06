-- Active: 1782932427960@@127.0.0.1@3306@db_cnh_social
CREATE DATABASE IF NOT EXISTS db_cnh_social; -- 1: criei banco de dados chamado db_cnh_social,
use db_cnh_social; -- avisa ao sistema qual banco de dados vai ser usado nesta sessão

CREATE TABLE tb_inscricoes_cnh_social (  -- 3: tabela utilizando os tipos de dado para cada coluna.
    cpf varchar (11)primary key,
    nis varchar(11),
    data_nascimento varchar(11),
    nome_completo varchar (255),
    endereco varchar(255),
    numero varchar(11),
    complemento varchar(255),
    bairro varchar(255),
    cep varchar (11),
    cidade varchar(255),
    estado varchar (255),
    telefone varchar (30),
    email varchar (255),
    categoria_desejada varchar(11),
    eh_pcd boolean,
    numero_protocolo varchar(25),
    created_at varchar(25),
    updated_at varchar(25),
    status_email boolean,
    data_email varchar(25)
);
-- 4: Importei os dados do csv no heidiSQL e inseri nas tabelas.

select * 
 from tb_inscricoes_cnh_social;
-- 5: listar todos os registros  cadastrados.

SELECT nome_completo, cpf, cidade, categoria_desejada -- 6: Consultando apenas colunas requisitadas no desafio.
FROM tb_inscricoes_cnh_social
WHERE cidade = 'São Luís'; -- 7: Listar todos os candidatos da cidade de São Luís.

-- 8: Listar candidados que desenham categoria B
SELECT nome_completo, cpf, cidade, categoria_desejada 
FROM tb_inscricoes_cnh_social
WHERE  categoria_desejada = 'B';

-- 9: Listar candidatos que são PCD.
SELECT nome_completo, cpf, cidade, categoria_desejada, eh_pcd
FROM tb_inscricoes_cnh_social
WHERE eh_pcd = '1';

-- 10: Listar candidados cujo e-mail ja foi enviado
SELECT nome_completo, cpf, cidade, categoria_desejada, status_email
FROM tb_inscricoes_cnh_social
WHERE status_email = '1';

--11: ordernar candidatos por nome completo em ordem alfabetica.
SELECT nome_completo, cpf, cidade, categoria_desejada
FROM tb_inscricoes_cnh_social
ORDER BY nome_completo ASC;

-- 12: Consultar candidatos cadastrados após 01/01/2000
-- Alterei tipo de dado exibido na coluna data_nascimento, para a consulta retornar corretamente.
UPDATE tb_inscricoes_cnh_social
SET data_nascimento = STR_TO_DATE(data_nascimento, '%d/%m/%Y');

SELECT nome_completo, cpf, cidade, categoria_desejada, data_nascimento
FROM tb_inscricoes_cnh_social
WHERE data_nascimento > '2000/01/01'
ORDER BY data_nascimento ASC;

--13: Consultar candidatos maiores de idade.



