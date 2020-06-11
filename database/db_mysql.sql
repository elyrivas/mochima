#creamos la base de datos
CREATE DATABASE IF NOT EXISTS mochima;

#SELECCIONAMOS LA DATABASE
USE mochima;

#CREAR TABLAS
CREATE TABLE IF NOT EXISTS tusuario 
(
	id_usuario int AUTO_INCREMENT NOT NULL,
    nombre varchar(30) NOT NULL,
    apellido varchar(30) NOT NULL,
    usuario varchar(15) NOT NULL,
    password varchar(100) NOT NULL,
    telefono varchar(15) NOT NULL,
    direccion varchar(150) NOT NULL,
    correo varchar(50) NOT NULL,
    rol varchar(10) NOT NULL,
    PRIMARY KEY (id_usuario)
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS tbitacora 
(
	id_bitacora int AUTO_INCREMENT NOT NULL,
    accion varchar(30) NOT NULL,
    descripcion varchar(100) NOT NULL,
    ip varchar(50) NOT NULL,
    fecha varchar(10) NOT NULL,
    usuario_id int, #clave foranea
	index(usuario_id)
    PRIMARY KEY (id_bitacora)
)ENGINE=InnoDB;


CREATE TABLE IF NOT EXISTS tofertas(
	id_oferta int AUTO_INCREMENT NOT NULL,
	nombre_oferta varchar (60) NOT NULL,
	descripcion varchar(150) NOT NULL,
	precio date NOT NULL,
	sitio_turistico_id int, #clave foranea
	index(sitio_turistico_id),
	PRIMARY KEY (id_oferta)
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS ticonos(
	id_icono int AUTO_INCREMENT NOT NULL,
	nombre_icono varchar(80) NOT NULL,
	url_icono varchar(150) NOT NULL,
	galeria_id int, #clave foranea
	index(galeria_id),
	PRIMARY KEY (id_icono)
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS tservicios(
	id_servicio int AUTO_INCREMENT NOT NULL,
	nombre_servicio varchar (80) NOT NULL,
	descripcion varchar (200) NOT NULL,
	PRIMARY KEY (id_servicio)
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS tsitios_turisticos(
	id_sitio int AUTO_INCREMENT NOT NULL,
	rtn varchar(20) NOT NULL,
	fecha_otorgamiento_rtn date NOT NULL,
	nombre_sitio varchar(50) NOT NULL,
	rif varchar(30) NOT NULL,
	direccion_sitio varchar(150) NOT NULL,
	telefono_sitio varchar(20) NOT NULL,
	email varchar(50) NOT NULL,
	facebook varchar(150),
	instagram varchar(150),
	sitioweb varchar(150),
	num_licencia varchar(30),
	num_habitacion int,
	latitud varchar(50),
	longitud varchar(50),
	estado_id int, #clave foranea
	ciudad_id int, #clave foranea
	tipo_id int, #clave foranea
	usuario_id int, #clave foranea
	index(usuario_id),	
	index(estado_id),
	index(ciudad_id),	
	index(tipo_id),	
	descripcion varchar(150),
	estatus varchar(20),
	PRIMARY KEY (id_sitio)
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS tciudades(
	id_ciudad int AUTO_INCREMENT NOT NULL,
	nombre_ciudad varchar(150) NOT NULL,
	estado_id int NOT NULL,
	index(estado_id), #clave foranea
	PRIMARY KEY (id_ciudad)
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS testados(
	id_estado int AUTO_INCREMENT NOT NULL,
	nombre_estado varchar(150) NOT NULL,
	PRIMARY KEY (id_estado)
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS tgaleria(
	id_galeria int AUTO_INCREMENT NOT NULL,
	url varchar(150) NOT NULL,
	sitio_turistico_id int, #clave foranea
	index(sitio_turistico_id),
	PRIMARY KEY (id_galeria)
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS ttipos_sitios(
	id_tipo int AUTO_INCREMENT NOT NULL,
	nombre_tipo varchar(150) NOT NULL,
	PRIMARY KEY (id_tipo)
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS tsitios_servicios(
	id_sitios_servicios int AUTO_INCREMENT NOT NULL,
	sitio_id int NOT NULL, #clave foranea
	servicio_id int NOT NULL, #clave foranea
	index(sitio_id),
	index(servicio_id),
	PRIMARY KEY (id_sitios_servicios)
)ENGINE=InnoDB;

ALTER TABLE tciudades 
ADD FOREIGN KEY(estado_id) 
REFERENCES testados(id_estado);

alter table tsitios_turisticos 
add foreign key(estado_id) 
references testados (id_estado);

alter table tsitios_turisticos
add foreign key(ciudad_id)
references tciudades (id_ciudad);

alter table tsitios_turisticos
add foreign key(tipo_id)
references ttipos_sitios (id_tipo);

alter table tsitios_turisticos
add foreign key(usuario_id)
references tusuario (id_usuario);

alter table tofertas
add foreign key(sitio_turistico_id)
references tsitios_turisticos (id_sitio);

alter table tgaleria
add foreign key(sitio_turistico_id)
references tsitios_turisticos (id_sitio);

alter table ticonos
add foreign key(galeria_id)
references tgaleria (id_galeria);

ALTER TABLE tbitacora 
ADD FOREIGN KEY(usuario_id) 
REFERENCES tusuario(id_usuario);

alter table tsitios_servicios
add foreign key(sitio_id)
references tsitios_turisticos (id_sitio)
ON UPDATE CASCADE ON DELETE CASCADE;

alter table tsitios_servicios
add foreign key(servicio_id)
references tservicios (id_servicio)
ON UPDATE CASCADE ON DELETE CASCADE;