
create database if not exists sgv;
use sgv;

create or replace table chocolate(
    id int primary key auto_increment,
    nome varchar(250) not null,
    description varchar(250) not null ,
    price double(9,2) not null ,
    created_at TIMESTAMP not null default CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

alter table chocolate add column foto text not null default "imagens\\avatar.png" after nome;
alter table chocolate change column foto foto longtext not null default "imagens\\avatar.png";

create or replace table login(
    id int primary key auto_increment,
    email varchar(250) not null unique,
    senha varchar(255) not null,
    created_at TIMESTAMP not null default CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

insert into login(email, senha) values ('admin@delicinhas.com.br', md5('admin@123'));