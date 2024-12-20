CREATE DATABASE CEPET;

USE CEPET;


CREATE TABLE USUARIOS(

ID_USUARIO int not null PRIMARY KEY AUTO_INCREMENT,
NOME_DE_USUARIO VARCHAR (20) not null,
SENHA VARCHAR (255) not null,
CPF varchar(14) not null, 
NOME_COMPLETO VARCHAR (50) not null, 
DATA_DE_NASCIMENTO DATE not null,
GENÊRO VARCHAR(15) null,
EMAIL VARCHAR(60) not null,
TELEFONE VARCHAR(14) not null,
UF VARCHAR (2) not null,
CIDADE VARCHAR (20) not null,
BAIRRO VARCHAR (20) not null,
CEP VARCHAR (9) not null,
RUA VARCHAR (50) not null, 
NUM_CASA VARCHAR(8) not null,
Termos_Condições BIT not null,
IMG_PERFIL VARCHAR(50) not null,
AUTENTICACAO BIT null);



 CREATE TABLE ONGS(

CNPJ VARCHAR (18) not null PRIMARY KEY,
NOME VARCHAR (40) not null,
SENHA VARCHAR(255) not null,
EMAIL VARCHAR (60) not null,
TELEFONE VARCHAR (15) not null,
CEP VARCHAR (9) not null,
ESTADO VARCHAR (2) not null,
ENDERECO VARCHAR (100) not null,
REDES_SOCIAIS TEXT null,
SITE VARCHAR (20) null,
DOCUMENTOS_ONGS VARCHAR (100) not null,
IMG_PERFIL_ONG VARCHAR(50) not null,
BIOGRAFIA TEXT null,
PIX VARCHAR(50) not null
);



CREATE TABLE PETS(

ID_PET INT not null PRIMARY KEY AUTO_INCREMENT,
NOME VARCHAR (20) not null,
TIPO VARCHAR (20) not null,
COR VARCHAR(30) not null, 
GENERO VARCHAR (6) not null, 
PORTE VARCHAR (8) not null, 
RAÇA VARCHAR (20) null,
IDADE VARCHAR (30) not null, 
HISTÓRICO TEXT null,
LINK_FOTO VARCHAR(60) not null,
FK_ONG_CNPJ VARCHAR(18) not null,

FOREIGN KEY (FK_ONG_CNPJ) REFERENCES ongs(CNPJ));

    


CREATE TABLE DOACAO(
    
ID_DOAÇÃO int not null PRIMARY KEY AUTO_INCREMENT,
FORM_PAG varchar (30) not null,
VALOR_PAG DECIMAL(7, 2) not null,
DATA_PAG DATE not null,
HORA_PAG TIME (0) not null,
FK_USUARIO_ID int not null,
FK_ONG_CNPJ VARCHAR (18) not null,

FOREIGN KEY (FK_USUARIO_ID) REFERENCES usuarios(ID_USUARIO),
FOREIGN KEY (FK_ONG_CNPJ) REFERENCES ongs(CNPJ));





CREATE TABLE ADOCAO(

ID_ADOCAO INT not null PRIMARY KEY AUTO_INCREMENT,
DATA_ADO DATE not null,
HORA_ADO TIME (0) not null,
FK_PET_ID INT not null,
FK_USUARIO_ID INT not null,
FK_ONG_CNPJ VARCHAR(18) not null,

FOREIGN KEY (FK_PET_ID) REFERENCES pets(ID_PET),
FOREIGN KEY (FK_USUARIO_ID) REFERENCES usuarios(ID_USUARIO),
FOREIGN KEY (FK_ONG_CNPJ) REFERENCES ongs(CNPJ));

CREATE TABLE VETERINARIOS(

ID_VETERINARIO int not null PRIMARY KEY AUTO_INCREMENT,
NOME_COMPLETO VARCHAR (50) not null,
SENHA VARCHAR (255) not null,
CPF varchar(14) not null,  
DATA_DE_NASCIMENTO DATE not null,
EMAIL VARCHAR(60) not null,
TELEFONE VARCHAR(14) not null,
UF VARCHAR (2) not null,
CEP VARCHAR (9) not null,
RUA VARCHAR (50) not null, 
NUM_CASA VARCHAR(8) not null,
CRMV VARCHAR(16) not null,
UNIVERSIDADE VARCHAR(100) not null,
IMG_PERFIL VARCHAR(50) not null,
AUTENTICACAO BIT null);
    
