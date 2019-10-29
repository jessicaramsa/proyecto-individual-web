create database clinica;
use clinica;

create table historia(
    id int not null auto_increment primary key,
    fecha_elaboracion date,
    nombre varchar(100),
    genero char(1),
    edad int,
    fecha_nacimiento date,
    ocupacion varchar(100),
    lateralidad varchar(50),
    nacionalidad varchar(50),
    religion varchar(50),
    telefono varchar(10),
    email varchar(50),
    domicilio varchar(150),
    telefono_emergencia varchar(10),
    persona_emergencia varchar(100)
);

create table usuarios(
    id int not null auto_increment primary key,
    nombre varchar(30),
    primer_apellido varchar(30),
    segundo_apellido varchar(30),
    username varchar(20),
    email varchar(50),
    password varchar(20),
    rol varchar(20)
);

insert into usuarios(nombre, primer_apellido, segundo_apellido, username, email, password, rol) 
    values('Jéssica', 'Ramírez', 'Sánchez', 'jessicaramsa', 'jessicaramsa@gmail.com', '123', 'Administrador');
insert into usuarios(nombre, primer_apellido, segundo_apellido, username, email, password, rol) 
    values('Jéssica', 'Ramírez', 'Sánchez', 'pruebas', 'pruebas@gmail.com', 'una_facil', 'Consultas');