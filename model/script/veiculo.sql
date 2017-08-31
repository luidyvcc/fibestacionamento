create table veiculos
(
id				int				auto_increment,
placa			varchar(25)		not null,
descricao		varchar(100)	not null,
tipo			varchar(1)		not null,
entrada			datetime		not null,
saida			datetime		null,
valor			decimal(10,2)	null,
primary key(id)
);