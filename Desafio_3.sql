-- Active: 1782932427960@@127.0.0.1@3306@desafio_3

CREATE TABLE  Pessoas (
  id int PRIMARY KEY,
  nome varchar(254),
  CPF int(11),
  Nascimento date,
  endereco VARCHAR(255)
);  -- Criei a primeira tabela pessoas e adicionei colunas com tipos de dados para numeros inteiros e dados alfanumericos com limites de digitos. Defini id como chave primaria para o ID,

INSERT INTO Pessoas (id, nome, CPF, Nascimento, endereco) 
VALUES 
(1, 'Adrian', '789321654', '2001-05-03', 'cohatrac'),
(2, 'John', '888888888', '2001-04-04', 'Anjo da guarda'),
(3, 'Kaua', '777777777', '2001-03-05', 'Cohab'); -- inseri os dados em suas colunas correspondentes com os parametros.

CREATE TABLE Documentos_pessoa (
  id int primary key,
  id_pessoa int,
  comprovante_residencia varchar(255),
  curriculo varchar(255),
  cert_nascimento varchar(255),
FOREIGN KEY (id_pessoa)
REFERENCES pessoas (id)
); -- Segunda tabela contendo os documentos e criando uma chave estrangeira com o id_pessoa, usando o id da tabela a esquerda como referencia.

INSERT INTO documentos_pessoa (id, id_pessoa, comprovante_residencia, curriculo, cert_nascimento)
VALUES
(1, 1, 'C:\\Users\\documents\\comprovante.pdf', 'C:\\Users\\documents\\curriculo.pdf','C:\\Users\\documents\\certidao.pdf'),
(2, 2, 'C:\\Users\\documents\\comprovante2.pdf', 'C:\\Users\\documents\\curriculo2.pdf', 'C:\\Users\\documents\\certidao2.pdf'),
(3, 3, 'C:\\Users\\documents\\comprovante3.pdf', 'C:\\Users\\documents\\curriculo3.pdf', 'C:\\Users\\documents\\certidao3.pdf');
-- Documentos da pessoa em seus caminhos onde estão armazenados.

SELECT pessoas.id, nome, cpf, nascimento, endereco, id_pessoa, comprovante_residencia, curriculo, cert_nascimento
FROM pessoas
JOIN documentos_pessoa on pessoas.id = documentos_pessoa.id_pessoa;
-- Join utilizado para correlacionar o id da tabela pessoas com o id_pessoa.

SELECT pessoas.id, nome, id_pessoa, cpf, documentos_pessoa.comprovante_residencia
FROM pessoas
JOIN documentos_pessoa on documentos_pessoa.id_pessoa = pessoas.id;

DESCRIBE documentos_pessoa