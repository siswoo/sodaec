DROP DATABASE IF EXISTS sodaec;
CREATE DATABASE sodaec;
USE sodaec;

DROP TABLE IF EXISTS usuarios;
CREATE TABLE usuarios (
	id INT AUTO_INCREMENT,
	nombre VARCHAR(250) NOT NULL,
	apellido VARCHAR(250) NOT NULL,
	documento_tipo INT NOT NULL,
	documento_numero VARCHAR(250) NOT NULL,
	correo VARCHAR(250) NOT NULL,
	clave VARCHAR(250) NOT NULL,
	telefono VARCHAR(250) NOT NULL,
	pais INT NOT NULL,
	ciudad INT NOT NULL,
	estatus INT NOT NULL,
	fecha_modificacion date NOT NULL,
	fecha_creacion date NOT NULL,
	PRIMARY KEY (id)
); ALTER TABLE usuarios CONVERT TO CHARACTER SET utf8 COLLATE utf8_unicode_ci;

INSERT INTO usuarios (nombre,apellido,documento_tipo,documento_numero,correo,clave,telefono,pais,ciudad,estatus,fecha_creacion) VALUES 
('Juan Jose','Maldonado la Cruz',2,'106318128','juanmaldonado.co@gmail.com','e1f2e2d4f6598c43c2a45d2bd3acb7be','3016984868',1,1,2,'2021-10-27');

DROP TABLE IF EXISTS documento_tipo;
CREATE TABLE documento_tipo (
	id INT AUTO_INCREMENT,
	nombre VARCHAR(250) NOT NULL,
	PRIMARY KEY (id)
); ALTER TABLE documento_tipo CONVERT TO CHARACTER SET utf8 COLLATE utf8_unicode_ci;

INSERT INTO documento_tipo (id,nombre) VALUES
(1, 'Documento de Identidad'),
(2, 'Pasaporte');

DROP TABLE IF EXISTS pais;
CREATE TABLE pais (
	id INT AUTO_INCREMENT,
	nombre VARCHAR(250) NOT NULL,
	codigo VARCHAR(250) NOT NULL,
	PRIMARY KEY (id)
); ALTER TABLE pais CONVERT TO CHARACTER SET utf8 COLLATE utf8_unicode_ci;

INSERT INTO pais (id,nombre,codigo) VALUES
(1, 'Colombia', '57');