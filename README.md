# Lista_Tarefas
Projeto de lista de tarefas feito em PHP utilizando o padrão de projeto MVC.

#Como testar
Para testar a aplicação basta subir o servidor na pasta public da aplicação. 
E fazer as alterações necessárias no arquivo "Connection.php" para o seu banco de dados. 
E criar as tabelas a seguir:

create table tb_status(
	id int not null primary key auto_increment,
    status varchar(25) not null
);

insert into tb_status(status)values('pendente');
insert into tb_status(status)values('realizado');

create table tb_tarefas(
	id int not null primary key auto_increment,
    id_status int not null default 1,
    foreign key(id_status) references tb_status(id),
	tarefa text not null,
    data_cadastrado datetime not null default current_timestamp
)
