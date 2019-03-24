DROP DATABASE IF EXISTS faltasdeasistencia;
CREATE DATABASE IF NOT EXISTS faltasdeasistencia;

USE faltasdeasistencia;

/**************************
      Tabla roles
***************************/

DROP TABLE IF EXISTS roles;
CREATE TABLE IF NOT EXISTS roles(
    id        int(11) auto_increment,
    code      int(1) UNIQUE,
    nombre    varchar(150),
CONSTRAINT pk_roles PRIMARY KEY (id)
)Engine=InnoDB DEFAULT CHARSET = latin1;

/* Inserts de roles */

INSERT INTO roles VALUES (null, 0, 'admin');
INSERT INTO roles VALUES (null, 1, 'user');



/**************************
      Tabla usuarios
***************************/

DROP TABLE IF EXISTS usuarios;
CREATE TABLE IF NOT EXISTS usuarios(
    id        int(11) auto_increment,
    nickname  varchar(150) UNIQUE,
    nombre    varchar(150),
    apellidos varchar(150),
    email     varchar(200) UNIQUE,
    password  varchar(255),
    favoritos varchar(255),
    role_id   int(1) DEFAULT 1,
    img       varchar(255),
CONSTRAINT pk_usuarios PRIMARY KEY (id),
CONSTRAINT fk_usuarios_role FOREIGN KEY (role_id) REFERENCES roles (code)
)Engine=InnoDB DEFAULT CHARSET = latin1;

/* Inserts de usuarios */

INSERT INTO `usuarios` (`id`, `nickname`, `nombre`, `apellidos`, `email`, `password`, `favoritos`, `role_id`, `img`) VALUES (NULL, 'admin', 'admin', 'admin', 'admin@admin.com', 'admin', 'admin', '0', './assets/img/users/profile/general/user.png');
INSERT INTO `usuarios` (`id`, `nickname`, `nombre`, `apellidos`, `email`, `password`, `favoritos`, `role_id`, `img`) VALUES (NULL, 'qwe', 'qwe', 'qwe', 'qwe@qwe.com', 'qwe', 'qwe', '1', './assets/img/users/profile/general/user.png');
INSERT INTO `usuarios` (`id`, `nickname`, `nombre`, `apellidos`, `email`, `password`, `favoritos`, `role_id`, `img`) VALUES (NULL, 'tyu', 'tyu', 'tyu', 'tyu@tyu.com', 'qwe', 'qwe', '1', './assets/img/users/profile/general/user.png');
INSERT INTO `usuarios` (`id`, `nickname`, `nombre`, `apellidos`, `email`, `password`, `favoritos`, `role_id`, `img`) VALUES (NULL, 'uio', 'uio', 'uio', 'uio@uio.com', 'uio', 'uio', '1', './assets/img/users/profile/general/user.png');



/**************************
      Tabla alumnos
***************************/

DROP TABLE IF EXISTS alumnos;
CREATE TABLE IF NOT EXISTS alumnos(
    id        int(11) auto_increment,
    matricula int(11) UNIQUE,
    nombre    varchar(150),
    apellidos varchar(150),
    img       varchar(255),
CONSTRAINT pk_alumnos PRIMARY KEY (id)
)Engine=InnoDB DEFAULT CHARSET = latin1;

/* Inserts de alumnos */

INSERT INTO `alumnos` (`id`, `matricula`, `nombre`, `apellidos`, `img`) VALUES (NULL, '1', 'Sofía', 'Alarcón', 'https://images.pexels.com/photos/733872/pexels-photo-733872.jpeg?cs=srgb&dl=beautiful-blur-blurred-background-733872.jpg&fm=jpg');
INSERT INTO `alumnos` (`id`, `matricula`, `nombre`, `apellidos`, `img`) VALUES (NULL, '2', 'David', 'Segundo', 'https://e00-elmundo.uecdn.es/assets/multimedia/imagenes/2018/06/01/15278540247774.jpg');
INSERT INTO `alumnos` (`id`, `matricula`, `nombre`, `apellidos`, `img`) VALUES (NULL, '3', 'Leo', 'Messi', 'https://www.mundodeportivo.com/r/GODO/MD/p5/MasQueDeporte/Imagenes/2018/10/24/Recortada/img_femartinez_20181010-125104_imagenes_md_otras_fuentes_captura-kcOG-U452531892714hYG-980x554@MundoDeportivo-Web.JPG');
INSERT INTO `alumnos` (`id`, `matricula`, `nombre`, `apellidos`, `img`) VALUES (NULL, '4', 'Jose', 'Rodriguez', './assets/img/alumnos/profile/alumno1.jpg');
INSERT INTO `alumnos` (`id`, `matricula`, `nombre`, `apellidos`, `img`) VALUES (NULL, '5', 'Maria', 'Antón', 'http://blogspay.com/wp-content/uploads/2018/07/istock-526142422.jpg');
INSERT INTO `alumnos` (`id`, `matricula`, `nombre`, `apellidos`, `img`) VALUES (NULL, '6', 'Juan', 'Jose', './assets/img/alumnos/profile/alumno3.jpg');



/**************************
      Tabla asignaturas
***************************/

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

/* Inserts de asignaturas */

INSERT INTO `asignaturas` (`id`, `codigo`, `nombre`, `horas`, `curso`, `img`) VALUES (NULL, '1', 'Programacion', '300', '1', 'http://static.t13.cl/images/sizes/1200x675/1493938270-programacion-istock.jpg'), (NULL, '4', 'Ingles', '200', '1', './assets/img/asignaturas/profile/ingles.jpg');
INSERT INTO `asignaturas` (`id`, `codigo`, `nombre`, `horas`, `curso`, `img`) VALUES (NULL, '2', 'Lenguaje de marcas', '200', '1', './assets/img/asignaturas/profile/html.jpg'), (NULL, '5', 'Entornos de desarrollo', '200', '1', './assets/img/asignaturas/profile/entornos.png');
INSERT INTO `asignaturas` (`id`, `codigo`, `nombre`, `horas`, `curso`, `img`) VALUES (NULL, '3', 'Sistemas informáticos', '200', '1', './assets/img/asignaturas/profile/si.jpg'), (NULL, '6', 'Bases de datos', '400', '1', './assets/img/asignaturas/profile/db.jpg');



/**************************
      Tabla faltas
***************************/

DROP TABLE IF EXISTS faltas;
CREATE TABLE IF NOT EXISTS faltas(
    alumno_id       int(11),
    asignatura_id   int(11),
    dia             DATE,
    horas           int(4),
CONSTRAINT pk_alumnos PRIMARY KEY (alumno_id,asignatura_id, dia),
CONSTRAINT fk_faltas_alumnos FOREIGN KEY (alumno_id) REFERENCES alumnos(id) ON DELETE CASCADE ON UPDATE CASCADE,
CONSTRAINT fk_faltas_asignaturas FOREIGN KEY (asignatura_id) REFERENCES asignaturas(id)  ON DELETE CASCADE ON UPDATE CASCADE
)Engine=InnoDB DEFAULT CHARSET = latin1;

/* Inserts de faltas */

INSERT INTO `faltas` (`alumno_id`, `asignatura_id`, `dia`, `horas`) VALUES ('1', '1', '2019-08-26', '2'), ('1', '3', '2019-03-12', '3');
INSERT INTO `faltas` (`alumno_id`, `asignatura_id`, `dia`, `horas`) VALUES ('3', '1', '2019-07-01', '12'), ('2', '2', '2019-05-22', '8');
INSERT INTO `faltas` (`alumno_id`, `asignatura_id`, `dia`, `horas`) VALUES ('4', '4', '2019-03-11', '9'), ('3', '3', '2019-03-12', '3');
INSERT INTO `faltas` (`alumno_id`, `asignatura_id`, `dia`, `horas`) VALUES ('5', '2', '2019-03-20', '16');
INSERT INTO `faltas` (`alumno_id`, `asignatura_id`, `dia`, `horas`) VALUES ('2', '6', '2019-03-27', '15');
INSERT INTO `faltas` (`alumno_id`, `asignatura_id`, `dia`, `horas`) VALUES ('6', '5', '2019-02-14', '29');