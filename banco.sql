create database projetodb; 
use projetodb;

create table usuarios(
	id int auto_increment primary key,
	nome		varchar (45) not null,
	email varchar (60),
	telefone varchar(45) not null,
	dt_nascimento varchar (12),
	senha varchar (45),
	nivel int,
	data_cadastro datetime
);


create table categorias(
	id int auto_increment primary key,
    categoria varchar (30)
);


create table servicos(
	id int auto_increment primary key,
	servico		varchar (25) not null,
	id_categoria		int,
	foreign key (id_categoria) references categorias (id)
);

create table agendamentos(
	id int auto_increment primary key, 
	nome varchar(45) ,
	telefone varchar(45) ,
	data_agenda varchar(45) ,
	horario varchar(45), 
	id_categoria int, 
	id_servico int,
    foreign key (id_categoria) references categorias (id),
    foreign key (id_servico) references servicos (id)
);


SELECT id, nome, telefone, data_agenda, horario, categorias.categoria, servicos.servico 
FROM agendamentos
INNER JOIN categorias ON agendamentos.id_categoria = categorias.id 
INNER JOIN servicos ON agendamentos.id_servico = servicos.id
WHERE agendamentos.id = 2;

insert into categorias (categoria)
values ('Manicure'),('Cabelereiro'),('Estetica'),('Maquiagem');

Insert into servicos (servico, id_categoria) 
values ('Pe',1),('Mao',1),('Unha Porcelana',1),
('Corte',2),('Secagem',2),('Escova',2);

select * from usuarios;
select * from agendamentos;
