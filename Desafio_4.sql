-- Active: 1782932427960@@127.0.0.1@3306@db_cnh_social
CREATE DATABASE IF NOT EXISTS db_cnh_social;
use db_cnh_social;

CREATE TABLE tb_inscricoes_cnh_social (
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

drop table tb_inscricoes_cnh_social;


desc tb_inscricoes_cnh_social;

select * from tb_inscricoes_cnh_social;