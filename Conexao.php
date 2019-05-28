<?php
/* --*--*--*--Criar Base de Dados--*--*--*-
Abrir o phpmyadmin e executar a query
Create database smfitness DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
Create table academia(
        Nome_acad varchar(100) not null,
        ende varchar(100) not null,
        primary key(Nome_acad,ende)
); 
create table cliente(
	Nome_cli varchar(100) not null,
        CPF int(11) not null,
	Email varchar(100) not null UNIQUE,
        Data date not null,
	Tel1 varchar(16) not null UNIQUE,
	Tel2 varchar (16),
        Nome_acad varchar(100) references academia(Nome_acad),
        foreign key(Nome_acad) references academia(Nome_acad),
	primary key(CPF)
);
 Create table cargo(
        Cd_cargo int auto_increment,
        Nome_carg varchar(100) not null,
        Salario int not null,
        primary key(Cd_cargo) 
);
 Create table funcionario(
        NrMatric int not null,
        NmFunc varchar(100) not null,
        Sexo varchar(1) not null,
        Cd_cargo int REFERENCES cargo(Cd_cargo),
        foreign key (Cd_cargo) references cargo(Cd_cargo),
        primary key(NrMatric)
);
        
 insert into cargo values('','Cozinheiro',350);
 insert into cargo values('','Gerente',3200); 
 insert into cargo values('','Vendedor',500);
 
 insert into funcionario values(101,'João Pedro Francisco','M',1);
 insert into funcionario values(102,'Maria Clara Da Silva','F',1);
 insert into funcionario values(103,'José Maria Gomes','M',1);
 insert into funcionario values(104,'Lorran Master Chief','M',1);
 insert into funcionario values(201,'Gabriel Antunes Machado','M',2);
 insert into funcionario values(301,'Erick Tomás Cauã Vieira','M',3);
 insert into funcionario values(302,'Israel Stark Gomes','M',3);
 insert into funcionario values(303,'Thais Targaryen','F',3);
 insert into funcionario values(304,'Jean Lannister','M',3);
 insert into funcionario values(305,'Sônia Daiane Vieira','F',3);

 insert into academia values('Academia1','Av. Rio BRanco 156');
 insert into academia values('Academia2','R. Presidente Backer 234');
 insert into academia values('Academia3','R. Gaviao Peixoto 233');
 insert into academia values('Academia4','R. Gaviao Peixoto 284');
 insert into academia values('Academia5','R. 12 casa 14');
*/
$host="localhost";
$user="root";
$pass="";
$banco="smfitness";
$conexao=mysqli_connect($host,$user,$pass) or die (mysqli_error());
mysqli_select_db($conexao,$banco) or die (mysqli_error());

$nome=$_POST['nome'];
$email=$_POST['email'];
$cpf=$_POST['cpf'];
$data=$_POST['data'];
$tel1=$_POST['tel1'];
$tel2=$_POST['tel2'];
$academia=$_POST['academia'];

$sql=mysqli_query($conexao,"insert into cliente(Nome_cli,CPF,Email,Data,Tel1,Tel2,Nome_acad) values ('$nome','$cpf','$email','$data','$tel1','$tel2','$academia')");
  echo "<center><h1>O cliente $nome foi cadastrado com sucesso!</center></h1>";
  mysqli_close($conexao);

