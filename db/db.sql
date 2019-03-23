DROP DATABASE IF EXISTS faltasdeasistencia;
CREATE DATABASE IF NOT EXISTS faltasdeasistencia;

USE faltasdeasistencia;

DROP TABLE IF EXISTS usuarios;
CREATE TABLE IF NOT EXISTS usuarios(
    id        int(11) auto_increment,
    nickname  varchar(150) UNIQUE,
    nombre    varchar(150),
    apellidos varchar(150),
    email     varchar(200) UNIQUE,
    password  varchar(255),
    favoritos  varchar(255),
    role      int(1) DEFAULT 1,
    img       varchar(255),
CONSTRAINT pk_usuarios PRIMARY KEY (id)
)Engine=InnoDB DEFAULT CHARSET = latin1;

INSERT INTO `usuarios` (`id`, `nickname`, `nombre`, `apellidos`, `email`, `password`, `favoritos`, `role`, `img`) VALUES (NULL, 'admin', 'admin', 'admin', 'admin@admin.com', 'admin', 'admin', '0', 'https://cumbrepuebloscop20.org/wp-content/uploads/2018/08/squirrel-1407699_640-1.jpg');
INSERT INTO `usuarios` (`id`, `nickname`, `nombre`, `apellidos`, `email`, `password`, `favoritos`, `role`, `img`) VALUES (NULL, 'qwe', 'qwe', 'qwe', 'qwe@qwe.com', 'qwe', 'qwe', '1', 'https://cumbrepuebloscop20.org/wp-content/uploads/2018/08/squirrel-1407699_640-1.jpg');
INSERT INTO `usuarios` (`id`, `nickname`, `nombre`, `apellidos`, `email`, `password`, `favoritos`, `role`, `img`) VALUES (NULL, 'tyu', 'tyu', 'tyu', 'tyu@tyu.com', 'qwe', 'qwe', '1', 'https://cumbrepuebloscop20.org/wp-content/uploads/2018/08/squirrel-1407699_640-1.jpg');
INSERT INTO `usuarios` (`id`, `nickname`, `nombre`, `apellidos`, `email`, `password`, `favoritos`, `role`, `img`) VALUES (NULL, 'uio', 'uio', 'uio', 'uio@uio.com', 'uio', 'uio', '1', 'https://cumbrepuebloscop20.org/wp-content/uploads/2018/08/squirrel-1407699_640-1.jpg');

DROP TABLE IF EXISTS alumnos;
CREATE TABLE IF NOT EXISTS alumnos(
    id        int(11) auto_increment,
    matricula int(11) UNIQUE,
    nombre    varchar(150),
    apellidos varchar(150),
    img       varchar(255),
CONSTRAINT pk_alumnos PRIMARY KEY (id)
)Engine=InnoDB DEFAULT CHARSET = latin1;

INSERT INTO `alumnos` (`id`, `matricula`, `nombre`, `apellidos`, `img`) VALUES (NULL, '1', 'qwer', 'qwer', 'https://coubsecure-s.akamaihd.net/get/b194/p/coub/simple/cw_timeline_pic/b8265da4e8c/2c0298fa74a8aaaada31a/big_1529232326_image.jpg');
INSERT INTO `alumnos` (`id`, `matricula`, `nombre`, `apellidos`, `img`) VALUES (NULL, '2', 'tewo', 'tewo', 'https://coubsecure-s.akamaihd.net/get/b194/p/coub/simple/cw_timeline_pic/b8265da4e8c/2c0298fa74a8aaaada31a/big_1529232326_image.jpg');
INSERT INTO `alumnos` (`id`, `matricula`, `nombre`, `apellidos`, `img`) VALUES (NULL, '3', 'yui', 'yui', 'https://coubsecure-s.akamaihd.net/get/b194/p/coub/simple/cw_timeline_pic/b8265da4e8c/2c0298fa74a8aaaada31a/big_1529232326_image.jpg');
INSERT INTO `alumnos` (`id`, `matricula`, `nombre`, `apellidos`, `img`) VALUES (NULL, '4', 'jkl', 'jkl', 'https://coubsecure-s.akamaihd.net/get/b194/p/coub/simple/cw_timeline_pic/b8265da4e8c/2c0298fa74a8aaaada31a/big_1529232326_image.jpg');
INSERT INTO `alumnos` (`id`, `matricula`, `nombre`, `apellidos`, `img`) VALUES (NULL, '5', 'rty', 'rty', 'https://coubsecure-s.akamaihd.net/get/b194/p/coub/simple/cw_timeline_pic/b8265da4e8c/2c0298fa74a8aaaada31a/big_1529232326_image.jpg');
INSERT INTO `alumnos` (`id`, `matricula`, `nombre`, `apellidos`, `img`) VALUES (NULL, '6', 'vbn', 'vbn', 'https://coubsecure-s.akamaihd.net/get/b194/p/coub/simple/cw_timeline_pic/b8265da4e8c/2c0298fa74a8aaaada31a/big_1529232326_image.jpg');

DROP TABLE IF EXISTS asignaturas;
CREATE TABLE IF NOT EXISTS asignaturas(
    id        int(11) auto_increment,
    codigo    int(11) UNIQUE,
    nombre    varchar(150),
    horas     int(4),
    curso     varchar(10),
    img       varchar(255),
CONSTRAINT pk_asignaturas PRIMARY KEY (id)
)Engine=InnoDB DEFAULT CHARSET = latin1;

INSERT INTO `asignaturas` (`id`, `codigo`, `nombre`, `horas`, `curso`, `img`) VALUES (NULL, '1', 'Programacion', '300', '1', 'http://static.t13.cl/images/sizes/1200x675/1493938270-programacion-istock.jpg'), (NULL, '4', 'Ingles', '200', '1', 'http://static.t13.cl/images/sizes/1200x675/1493938270-programacion-istock.jpg');
INSERT INTO `asignaturas` (`id`, `codigo`, `nombre`, `horas`, `curso`, `img`) VALUES (NULL, '2', 'Lenguaje de marcas', '200', '1', 'http://static.t13.cl/images/sizes/1200x675/1493938270-programacion-istock.jpg'), (NULL, '5', 'Entornos de desarrollo', '200', '1', 'http://static.t13.cl/images/sizes/1200x675/1493938270-programacion-istock.jpg');
INSERT INTO `asignaturas` (`id`, `codigo`, `nombre`, `horas`, `curso`, `img`) VALUES (NULL, '3', 'Sistemas informáticos', '200', '1', 'http://static.t13.cl/images/sizes/1200x675/1493938270-programacion-istock.jpg'), (NULL, '6', 'Bases de datos', '400', '1', 'http://static.t13.cl/images/sizes/1200x675/1493938270-programacion-istock.jpg');

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

INSERT INTO `faltas` (`alumno_id`, `asignatura_id`, `dia`, `horas`) VALUES ('1', '1', '2019-08-26', '2'), ('1', '3', '2019-03-12', '3');
INSERT INTO `faltas` (`alumno_id`, `asignatura_id`, `dia`, `horas`) VALUES ('3', '1', '2019-07-21', '2'), ('2', '2', '2019-05-22', '3');
INSERT INTO `faltas` (`alumno_id`, `asignatura_id`, `dia`, `horas`) VALUES ('4', '4', '2019-03-21', '2'), ('3', '3', '2019-03-12', '3');
INSERT INTO `faltas` (`alumno_id`, `asignatura_id`, `dia`, `horas`) VALUES ('2', '3', '2019-01-21', '2'), ('2', '4', '2019-04-21', '3');
INSERT INTO `faltas` (`alumno_id`, `asignatura_id`, `dia`, `horas`) VALUES ('1', '2', '2019-04-21', '2'), ('2', '1', '2019-03-15', '3');