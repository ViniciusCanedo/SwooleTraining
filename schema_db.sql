CREATE TABLE programas(
	id int not null primary key auto_increment,
	nome varchar(128) not null,
	hora_inicio time not null,
	hora_fim time not null,
	dias_exibicao varchar(128)
)

CREATE TABLE programacao(
	id int not null primary key auto_increment,
	praca varchar(64) not null,
	nome varchar(128) not null,
	hora_inicio time not null,
	hora_fim time not null,
	exibido varchar(8) not null
)

CREATE TABLE historico(
	id int not null primary key auto_increment,
	data_exibicao datetime not null,
	praca varchar(64) not null,
	nome varchar(128) not null,
	hora_inicio time not null,
	hora_fim time not null
)