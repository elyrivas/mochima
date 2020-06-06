--BORRADOR
DROP TABLE IF EXISTS tofertas;
DROP TABLE IF EXISTS ticonos;
DROP TABLE IF EXISTS tservicios;
DROP TABLE IF EXISTS tgaleria;
DROP TABLE IF EXISTS tsitios_turisticos;
DROP TABLE IF EXISTS tciudades;
DROP TABLE IF EXISTS testados;
DROP TABLE IF EXISTS ttipos_sitios;
DROP TABLE IF EXISTS tusuario;


-- CREACION DE TABLAS

CREATE TABLE tusuario
(
    id_usuario serial NOT NULL,
    nombre varchar(30) NOT NULL,
    apellido varchar(30) NOT NULL,
    usuario varchar(15) NOT NULL,
    password varchar(15) NOT NULL,
    telefono varchar(15) NOT NULL,
    direccion varchar(150) NOT NULL,
    correo varchar(50) NOT NULL,
    rol varchar(10) NOT NULL,
    PRIMARY KEY (id_usuario) 
);

CREATE TABLE tofertas(
	id_oferta serial NOT NULL,
	nombre_oferta varchar (60) NOT NULL,
	descripcion varchar(150) NOT NULL,
	precio int NOT NULL,
	sitio_turistico_id int,
	PRIMARY KEY (id_oferta)
);

CREATE TABLE ticonos(
	id_icono serial NOT NULL,
	nombre_icono varchar(80) NOT NULL,
	url_icono varchar(150) NOT NULL,
	galeria_id int,
	PRIMARY KEY (id_icono)
	);



CREATE TABLE tservicios(
	id_servicio serial NOT NULL,
	nombre_servicio varchar (80) NOT NULL,
	descripcion varchar (200) NOT NULL,
	PRIMARY KEY (id_servicio)
);


CREATE TABLE tsitios_turisticos(
	id_sitio serial NOT NULL,
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
	estado_id int,
	ciudad_id int,
	tipo_id int,
	usuario_id int,
	descripcion varchar(150),
	estatus varchar(20),
	PRIMARY KEY (id_sitio)
);


CREATE TABLE tciudades(
	id_ciudad serial NOT NULL,
	nombre_ciudad varchar(150) NOT NULL,
	estado_id int,
	PRIMARY KEY (id_ciudad)
);

CREATE TABLE testados(
	id_estado serial NOT NULL,
	nombre_estado varchar(150) NOT NULL,
	PRIMARY KEY (id_estado)
);
			  

CREATE TABLE tgaleria(
	id_galeria serial NOT NULL,
	url varchar(150) NOT NULL,
	sitio_turistico_id int,
	PRIMARY KEY (id_galeria)
);


CREATE TABLE ttipos_sitios(
	id_tipo serial NOT NULL,
	nombre_tipo varchar(150) NOT NULL,
	PRIMARY KEY (id_tipo)
);

CREATE TABLE tsitios_servicios(
	id_sitios_servicios serial NOT NULL,
	sitio_id int NOT NULL,
	servicio_id int NOT NULL,
	PRIMARY KEY (id_sitios_servicios)
);

--RELACION DE CIUDADES A ESTADOS
alter table tciudades
add constraint fk_estado_id
foreign key(estado_id)
references testados (id_estado);

--RELACION DE SITIOS A ESTADOS
alter table tsitios_turisticos
add constraint fk_estado_id
foreign key(estado_id)
references testados (id_estado);

--RELACION DE SITIOS A CIUDAD
alter table tsitios_turisticos
add constraint fk_ciudad_id
foreign key(ciudad_id)
references tciudades (id_ciudad);

--RELACION DE SITIOS A TIPOS DE SITIOS
alter table tsitios_turisticos
add constraint fk_tipo_id
foreign key(tipo_id)
references ttipos_sitios (id_tipo);

--RELACION DE SITIOS A USUARIOS
alter table tsitios_turisticos
add constraint fk_usuario_id
foreign key(usuario_id)
references tusuario (id_usuario);

--RELACION DE OFERTAS A SITIOS TURISTICOS
alter table tofertas
add constraint fk_sitio_turistico_id
foreign key(sitio_turistico_id)
references tsitios_turisticos (id_sitio);

--RELACION DE GALERIA ASITIOS TURISTICOS
alter table tgaleria
add constraint fk_sitio_turistico_id
foreign key(sitio_turistico_id)
references tsitios_turisticos (id_sitio);

--RELACION DE ICONOS A GALERIA
alter table ticonos
add constraint fk_galeria_id
foreign key(galeria_id)
references tgaleria (id_galeria);

--RELACION DE SITIOS Y SERVICIOS
alter table tsitios_servicios
add constraint fk_sitio_id
foreign key(sitio_id)
references tsitios_turisticos (id_sitio)
ON UPDATE CASCADE ON DELETE CASCADE;


--RELACION DE SITIOS Y SERVICIOS
alter table tsitios_servicios
add constraint fk_servicio_id
foreign key(servicio_id)
references tservicios (id_servicio)
ON UPDATE CASCADE ON DELETE CASCADE;
