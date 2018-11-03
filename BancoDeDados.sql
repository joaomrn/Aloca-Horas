create database alocacao_hora;

use alocacao_hora;

/*cOMANDO PARA CRIAÇÃO DE TABELAS*/

create table usuarios(
	ID_usuario int PRIMARY KEY AUTO_INCREMENT, 
    nome varchar(30) NOT NULL,
	email varchar(50) NOT NULL, 
    senha varchar(8) NOT NULL,
    ID_cargo int
);

create table cargos(
	ID_cargo int PRIMARY KEY AUTO_INCREMENT, 
    descricao varchar(20) NOT NULL,
    ID_usuario int
);

create table projetos(
	ID_projeto int PRIMARY KEY AUTO_INCREMENT, 
    nome varchar(30) NOT NULL,
	descricao varchar(255) NOT NULL,
    ID_tarefa int
);
 
 create table tarefas(
	ID_tarefa int PRIMARY KEY AUTO_INCREMENT,
    nome varchar(30) NOT NULL,
    descricao varchar(255) NOT NULL,
	horas_atribuidas time NOT NULL, 
    horas_gastas time, 
    hora_inicial time, 
    hora_final time,
    ID_projeto int,
    ID_condicao int
);

create table condicao(
	ID_condicao int PRIMARY KEY AUTO_INCREMENT,
    pendente bool,
    iniciada bool,
    em_andamento bool,
    finalizada bool,
    reprovada bool,
    aprovada bool
);    
    
/*INSERT PARA CRIAR CHAVES ESTRANJEIRAS*/

ALTER TABLE usuarios ADD
CONSTRAINT fk_Cargo_Usuario FOREIGN KEY (ID_cargo) REFERENCES cargos (ID_cargo);

ALTER TABLE cargos ADD
CONSTRAINT fk_Usuario_Cargo FOREIGN KEY (ID_usuario) REFERENCES usuarios (ID_usuario);

ALTER TABLE projetos ADD
CONSTRAINT fk_Tarefa_Projeto FOREIGN KEY (ID_tarefa) REFERENCES tarefas (ID_tarefa);

ALTER TABLE tarefas ADD
CONSTRAINT fk_Projeto_Tarefa FOREIGN KEY (ID_projeto) REFERENCES projetos (ID_projeto);

ALTER TABLE tarefas ADD
CONSTRAINT fk_Condicao_Tarefa FOREIGN KEY (ID_condicao) REFERENCES condicao (ID_condicao);


/*comando para deletar banco de dados*/

DROP DATABASE 
 