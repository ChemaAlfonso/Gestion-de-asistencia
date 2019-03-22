DROP DATABASE IF EXISTS faltasdeasistencia;
CREATE DATABASE IF NOT EXISTS faltasdeasistencia;

USE faltasdeasistencia;

DROP TABLE IF EXISTS usuarios;
CREATE TABLE IF NOT EXISTS usuarios(
    id        int(11) auto_increment,
    nickname  varchar(150),
    nombre    varchar(150),
    apellidos varchar(150),
    email     varchar(200),
    password  varchar(255),
    favoritos  varchar(255),
    role      int(1) DEFAULT 1,
    img       varchar(255),
CONSTRAINT pk_usuarios PRIMARY KEY (id)
)Engine=InnoDB DEFAULT CHARSET = latin1;

DROP TABLE IF EXISTS alumnos;
CREATE TABLE IF NOT EXISTS alumnos(
    id        int(11) auto_increment,
    matricula int(11),
    nombre    varchar(150),
    apellidos varchar(150),
    img       varchar(255),
CONSTRAINT pk_alumnos PRIMARY KEY (id)
)Engine=InnoDB DEFAULT CHARSET = latin1;

DROP TABLE IF EXISTS asignaturas;
CREATE TABLE IF NOT EXISTS asignaturas(
    id        int(11) auto_increment,
    codigo    int(11),
    nombre    varchar(150),
    horas     int(4),
    curso     varchar(10),
    img       varchar(255),
CONSTRAINT pk_asignaturas PRIMARY KEY (id)
)Engine=InnoDB DEFAULT CHARSET = latin1;

DROP TABLE IF EXISTS faltas;
CREATE TABLE IF NOT EXISTS faltas(
    alumno_id       int(11),
    asignatura_id   int(11),
    dia             DATE,
    horas           int(4),
CONSTRAINT pk_alumnos PRIMARY KEY (alumno_id,asignatura_id, dia),
CONSTRAINT fk_faltas_alumnos FOREIGN KEY (alumno_id) REFERENCES alumnos(id),
CONSTRAINT fk_faltas_asignaturas FOREIGN KEY (asignatura_id) REFERENCES asignaturas(id)
)Engine=InnoDB DEFAULT CHARSET = latin1;