CREATE DATABASE parcial;

use parcial;

CREATE TABLE parcial.pacientes ( 
paciente_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, paciente_nome VARCHAR(200) NOT NULL, sexo VARCHAR(15) NOT NULL, endereco VARCHAR(200) NOT NULL, numero VARCHAR(15) NOT NULL, complemento VARCHAR(15) NOT NULL, 
bairro VARCHAR(40) NOT NULL, cidade VARCHAR(40) NOT NULL, cep VARCHAR(10) NOT NULL, email VARCHAR(50) NOT NULL, celular VARCHAR(20) NOT NULL, telefone VARCHAR(20) NOT NULL, peso FLOAT NOT NULL, altura FLOAT NOT NULL, 
hipertensao BOOLEAN, diabetes BOOLEAN, fumante BOOLEAN, cardiaco BOOLEAN, observacoes VARCHAR(100) NOT NULL, medicacao VARCHAR(100), dt_nasc DATE NOT NULL);

CREATE TABLE parcial.exames (exame_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, paciente_nome VARCHAR(200) NOT NULL, examinador VARCHAR(200) NOT NULL, dt_exame DATE NOT NULL, glicemia VARCHAR(15), colesterol VARCHAR(15), pressao VARCHAR(15));

CREATE TABLE parcial.usuarios (user_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, usuario VARCHAR(200) NOT NULL, user_email VARCHAR(50) NOT NULL, dt_nascimento DATE NOT NULL, curso VARCHAR(45) NOT NULL, status_user bool NOT NULL, senha VARCHAR(32) NOT NULL);

insert into usuarios (user_id, usuario, user_email, dt_nascimento, curso, status_user, senha) values ('1', 'admin', 'admin@gmail.com', '2000-01-01', 'eng soft', '1', md5('123456'));