-- Active: 1662247960966@@127.0.0.1@3306@citdjulioflorez

/* ========================= Base de datos =========================*/
CREATE DATABASE CITDJulioFlorez;

USE CITDJulioFlorez;

DROP DATABASE CITDJulioFlorez;

/* ========================= Tablas =========================*/
/* ------------------------ Usuarios ------------------------*/
CREATE TABLE Usuarios (
    PK_Id_User INT AUTO_INCREMENT NOT NULL,
    Nombre_User VARCHAR(100) NOT NULL,
    Apellido_User VARCHAR(100) NOT NULL,
    Password_User VARCHAR(50) NOT NULL,
    Edad_User VARCHAR(100) NOT NULL,
    CorreoPer_User VARCHAR(100) NOT NULL,
    CorreoInst_User VARCHAR(100),
    Cel_User INT(20) NOT NULL,
    Ident_User INT(20) NOT NULL,
    IdImg_User VARCHAR(250) NOT NULL,

    FK_Rol_User INT NOT NULL,

    PRIMARY KEY(PK_Id_User)
);

/* ------------------------ Roles ------------------------*/
CREATE TABLE Roles (
    PK_Id_Rol INT AUTO_INCREMENT NOT NULL,
    Name_Rol VARCHAR(60) NOT NULL,

    PRIMARY KEY(PK_Id_Rol)
);

/* ------------------------ Notificaciones ------------------------*/
CREATE TABLE Notificaciones (
    PK_Id_Notf INT AUTO_INCREMENT NOT NULL,
    Asunto_Notf VARCHAR(100) NOT NULL,
    Texto_Notf TEXT NOT NULL,
    Fecha_Notf DATETIME NOT NULL,
    Likes_Notf INT(100) NOT NULL,
    Import_Notf BOOLEAN NOT NULL,

    PRIMARY KEY(PK_Id_Notf)
);

/* ------------------------ Usuarios - Notificaciones ------------------------*/
CREATE TABLE UserNotf (
    PK_Id_UN INT AUTO_INCREMENT NOT NULL,
    Origen_UN INT NOT NULL,
    Para_UN TEXT NOT NULL,

    FK_User_UN INT NOT NULL,
    FK_Notf_UN INT NOT NULL,

    PRIMARY KEY(PK_Id_UN)
);

/* ------------------------ LikeNotf ------------------------*/
CREATE TABLE LikeNotf (
    PK_Id_LN INT AUTO_INCREMENT NOT NULL,
    Like_LN BOOLEAN NOT NULL,

    FK_User_LN INT NOT NULL,
    FK_Notf_LN INT NOT NULL,

    PRIMARY KEY(PK_Id_LN)
);

/* ------------------------ Estudiantes ------------------------*/
CREATE TABLE Estudiantes (
    PK_Id_Est INT AUTO_INCREMENT NOT NULL,
    Nom_Ser VARCHAR(100),
    Sup_Ser VARCHAR(100),
    Lugar_Ser TEXT,
    ValSer_Est INT(2) NOT NULL,
    FecInSer_Est DATE,
    FecFinSer_Est DATE,
    IdEst_Est INT,
    CantHours_Est VARCHAR(20),
    Verificado_Est BOOLEAN,

    FK_Cur_Est INT NOT NULL,
    FK_User_Est INT NOT NULL,

    PRIMARY KEY(PK_Id_Est)
);

/* ------------------------ Cursos ------------------------*/
CREATE TABLE Cursos (
    PK_Id_Cur INT AUTO_INCREMENT NOT NULL,
    Nom_Cur INT(5) NOT NULL,
    Frase_Cur TEXT,
    IdImg_Cur VARCHAR(250) NOT NULL,

    PRIMARY KEY(PK_Id_Cur)
);

/* ------------------------ Servicio Social ------------------------*/
CREATE TABLE Servicio_Social (
    PK_Id_Ser INT AUTO_INCREMENT NOT NULL,
    Firm_Ser VARCHAR(250) NOT NULL,
    HrEn_Ser TIME,
    HrSa_Ser TIME,
    Job_Ser TEXT,
    Day_Ser DATE NOT NULL,
    Hours_Ser INT NOT NULL,
    Minutes_Ser INT NOT NULL,

    FK_Est_Ser INT NOT NULL,

    PRIMARY KEY(PK_Id_Ser)
);

/* ------------------------ Comedor ------------------------*/
CREATE TABLE Comedor (
    PK_Id_Com INT AUTO_INCREMENT NOT NULL,
    NomPDF_Com VARCHAR(250),
    Fech_Com DATETIME,

    FK_User_Com INT,
    PRIMARY KEY(PK_Id_Com)
);

/* ------------------------ Libros ------------------------*/
CREATE TABLE Libros (
    PK_Id_Lib INT AUTO_INCREMENT NOT NULL,
    Nom_Lib VARCHAR(100) NOT NULL,
    Aut_Lib VARCHAR(100),
    IdImg_Lib VARCHAR(250) NOT NULL,
    ValPDF_Lib VARCHAR(250),
    CantLik_Lib INT NOT NULL,
    Pag_Lib INT(4) NOT NULL,
    Epi_Lib TEXT,

    PRIMARY KEY(PK_Id_Lib)
);

/* ------------------------ LikesLib ------------------------*/
CREATE TABLE LikesLib (
    PK_Id_Lik INT AUTO_INCREMENT NOT NULL,
    LikeLib_Lik BOOLEAN NOT NULL,
    
    FK_Lib_Lik INT NOT NULL,
    FK_User_Lik INT NOT NULL,

    PRIMARY KEY(PK_Id_Lik)
);

/* ------------------------ Coments ------------------------*/
CREATE TABLE Coments (
    PK_Id_Cms INT AUTO_INCREMENT NOT NULL,
    Text_Cms TEXT NOT NULL,
    Fech_Cms DATETIME NOT NULL,

    FK_Lib_Cms INT NOT NULL,
    FK_User_Cms INT NOT NULL,

    PRIMARY KEY(PK_Id_Cms)
);

/* ========================= Foreign keys =========================*/
/* ------------------------ Roles ------------------------*/
ALTER TABLE Usuarios ADD CONSTRAINT Contiene
FOREIGN KEY(FK_Rol_User) REFERENCES Roles(PK_Id_Rol);

/* ------------------------ Usuarios - Notificaciones ------------------------*/
ALTER TABLE UserNotf ADD CONSTRAINT Notf1
FOREIGN KEY(FK_Notf_UN) REFERENCES Notificaciones(PK_Id_Notf);

ALTER TABLE UserNotf ADD CONSTRAINT Notf2
FOREIGN KEY(FK_User_UN) REFERENCES Usuarios(PK_Id_User);

/* ------------------------ Estudiantes ------------------------*/
ALTER TABLE Estudiantes ADD CONSTRAINT Incluyente
FOREIGN KEY(FK_User_Est) REFERENCES Usuarios(PK_Id_User);

/* ------------------------ Cursos ------------------------*/
ALTER TABLE Estudiantes ADD CONSTRAINT Pertenece
FOREIGN KEY(FK_Cur_Est) REFERENCES Cursos(PK_Id_Cur);

/* ------------------------ Servicio Social ------------------------*/
ALTER TABLE servicio_social ADD CONSTRAINT Realiza
FOREIGN KEY(FK_Est_Ser) REFERENCES estudiantes(PK_Id_Est);

/* ------------------------ Comedor ------------------------*/
ALTER TABLE Comedor ADD CONSTRAINT Cambio
FOREIGN KEY(FK_User_Com) REFERENCES Usuarios(PK_Id_User);

/* ------------------------ LikesLib ------------------------*/
ALTER TABLE LikesLib ADD CONSTRAINT Likes1
FOREIGN KEY(FK_Lib_Lik) REFERENCES libros(PK_Id_Lib);

ALTER TABLE LikesLib ADD CONSTRAINT Likes2
FOREIGN KEY(FK_User_Lik) REFERENCES Usuarios(PK_Id_User);

/* ------------------------ Coments ------------------------*/
ALTER TABLE Coments ADD CONSTRAINT Coment1
FOREIGN KEY(FK_User_Cms) REFERENCES Usuarios(PK_Id_User);

ALTER TABLE Coments ADD CONSTRAINT Coment2
FOREIGN KEY(FK_Lib_Cms) REFERENCES libros(PK_Id_Lib);

/* ------------------------ LikeNotf ------------------------*/
ALTER TABLE LikeNotf ADD CONSTRAINT LikesNotf1
FOREIGN KEY(FK_User_LN) REFERENCES Usuarios(PK_Id_User);

ALTER TABLE LikeNotf ADD CONSTRAINT LikesNotf2
FOREIGN KEY(FK_Notf_LN) REFERENCES Notificaciones(PK_Id_Notf);

/* ========================= Datos Iniciales =========================*/
/* ------------------------ Roles (x6) ------------------------*/
INSERT INTO Roles(Name_Rol)
VALUES
('Administrador'),
('Estudiante'),
('Bibliotecario'),
('Cocinero'),
('Orientador'),
('Profesor');

/* ------------------------ Cursos (x21) ------------------------*/
INSERT INTO Cursos(
    Nom_Cur, IdImg_Cur
)
VALUES
(1104, 'SinImagen.png'),
(1103, 'SinImagen.png'),
(1102, 'SinImagen.png'),
(1101, 'SinImagen.png'),
(1004, 'SinImagen.png'),
(1003, 'SinImagen.png'),
(1002, 'SinImagen.png'),
(1001, 'SinImagen.png'),
(904, 'SinImagen.png'),
(903, 'SinImagen.png'),
(902, 'SinImagen.png'),
(901, 'SinImagen.png'),
(803, 'SinImagen.png'),
(802, 'SinImagen.png'),
(801, 'SinImagen.png'),
(703, 'SinImagen.png'),
(702, 'SinImagen.png'),
(701, 'SinImagen.png'),
(603, 'SinImagen.png'),
(602, 'SinImagen.png'),
(601, 'SinImagen.png');

/* ------------------------ Administradores (x3) ------------------------*/
INSERT INTO Usuarios(
    Nombre_User, Apellido_User, Password_User, Edad_User,
    CorreoPer_User, CorreoInst_User, Cel_User, Ident_User,
    IdImg_User, FK_Rol_User
)VALUES(
    'Carlos Eduardo', 'Orozco Alba', 'Carlos123', 17,
    'carlosorzcoalba@gmail.com', 'carlos.orozco884@educacionbogota.edu.co',
    3229229875, 1028660884, 'SinFoto.png', 2
),(
    'Fabian Aruri', 'Chala Mendoza', 'Chala123', 16,
    'fabianarurichala@gmail.com', 'fabian.chala947@educacionbogota.edu.co',
    3166344329, 1071163947, 'SinFoto.png', 2
);

/* ------------------------ Usuarios - Estudiantes (x3) ------------------------*/
INSERT INTO Usuarios(
    Nombre_User, Apellido_User, Password_User, Edad_User,
    CorreoPer_User, CorreoInst_User, Cel_User, Ident_User,
    IdImg_User, FK_Rol_User
)VALUES(
    'Nombre Per 1', 'Apellido Per 1', '1Persona123', 15,
    'Persona1@gmail.com', '',
    3859385302, 1093485382, 'SinFoto.png', 2
),(
    'Nombre Per 2', 'Apellido Per 2', '2Persona123', 16,
    'Persona2@gmail.com', '',
    3853068376, 1074839263, 'SinFoto.png', 2
),(
    'Nombre Per 3', 'Apellido Per 3', '3Persona123', 16,
    'Persona3@gmail.com', '',
    3058438532, 1025873632, 'SinFoto.png', 2
);

/* ------------------------ Estudiantes - Admin (x2) ------------------------ */
INSERT INTO Estudiantes(
    Nom_Ser, Sup_Ser, ValSer_Est, FecInSer_Est,
    FK_Cur_Est, FK_User_Est, Verificado_Est, CantHours_Est
) VALUES (
    'Modificación y creación de la página del colegio, biblioteca, 
    comedor y orientación',
    'Orientador - Juan Carlos, Profesor - José Santana',
    2, '2022-02-16', 3, 1, 0, 40
),(
    'Modificación y creación de la página del colegio, biblioteca, 
    comedor y orientación',
    'Orientador - Juan Carlos, Profesor - José Santana',
    2, '2022-02-16', 3, 2, 0, 40
);

/* ------------------------ Estudiantes (x3) ------------------------ */
INSERT INTO Estudiantes(
    Nom_Ser, Sup_Ser, Lugar_Ser, ValSer_Est,
    FecInSer_Est, FecFinSer_Est, FK_Cur_Est,
    FK_User_Est, Verificado_Est, CantHours_Est
) VALUES (
    'Nombre de servicio social',
    'Supervisor del servicio social del estudiante',
    'Lugar del servicio social solo si es requerido',
    2, '2022-04-12', '0000-00-00', 2, 3, 0, 0
),(
    'Nombre de servicio social',
    'Supervisor del servicio social del estudiante',
    'Lugar del servicio social solo si es requerido',
    1, '2022-02-16', '2022-08-04', 2, 4, 1, 0
), (
    '', '', '', 3, '0000-00-00', '0000-00-00', 2, 5, 0, 0
);

/* ------------------------ Servicio Social (x10) ------------------------ */
INSERT INTO servicio_social(
    Firm_Ser, Job_Ser, Day_Ser, Hours_Ser, Minutes_Ser, FK_Est_Ser
) VALUES (
    'Profesor - José Santana', 'Revisión de trabajo', '2023-01-24', 40, 0, 1
),(
    'Profesor - José Santana', 'Revisión de trabajo', '2023-01-24', 40, 0, 2
),(
    'Firma del supervisor', 'Trabajo del día', '2022-04-16', 20, 12, 3
),(
    'Firma del supervisor', 'Trabajo del día', '2022-04-24', 18, 58, 3
),(
    'Firma del supervisor', 'Trabajo del día', '2022-05-12', 24, 22, 3
),(
    'Firma del supervisor', 'Trabajo del día', '2022-06-05', 16, 46, 3
),(
    'Firma del supervisor', 'Trabajo del día', '2022-03-12', 20, 12, 4
),(
    'Firma del supervisor', 'Trabajo del día', '2022-04-16', 18, 58, 4
),(
    'Firma del supervisor', 'Trabajo del día', '2022-05-05', 24, 22, 4
),(
    'Firma del supervisor', 'Trabajo del día', '2022-07-22', 16, 46, 4
);

/* ------------------------ Notificaciones (x4) ------------------------*/
/* ------------ Notificaciones Personales ------------*/
INSERT INTO Notificaciones(
    Asunto_Notf, Texto_Notf, Fecha_Notf,
    Likes_Notf, Import_Notf
) VALUES (
    'Notificaciones personales',
    'Se pueden enviar notificaciones a
    cualquier usuario con el correo personal
    y/o institucional, en todo caso que lo tenga
    registrado',
    '2023-01-01 13:00:00', 0, 0
);

INSERT INTO UserNotf(
    Origen_UN, Para_UN, FK_User_UN,
    FK_Notf_UN
)VALUES(
    1, 'NULL', 2, 1
);

/* ------------ Notificaciones De Importancia ------------*/
INSERT INTO Notificaciones(
    Asunto_Notf, Texto_Notf, Fecha_Notf,
    Likes_Notf, Import_Notf
) VALUES (
    'Notificaciones de importancia',
    'Las notificaciones de importacancia
    tendrán el asunto de color rojo, acompañandos
    con un icono de aviso de importancia',
    '2023-01-01 13:00:00', 0, 1
);

INSERT INTO UserNotf(
    Origen_UN, Para_UN, FK_User_UN,
    FK_Notf_UN
)VALUES(
    1, 'NULL', 2, 2
);

/* ------------ Notificaciones @ ------------*/
INSERT INTO Notificaciones(
    Asunto_Notf, Texto_Notf, Fecha_Notf,
    Likes_Notf, Import_Notf
) VALUES (
    'Notificaciones @',
    'Las notificaciones que contengan el @example,
    se les enviará la notificación a todos los usuarios
    con dicho @',
    '2023-01-01 13:00:00', 0, 0
);

INSERT INTO UserNotf(
    Origen_UN, Para_UN, FK_User_UN,
    FK_Notf_UN
)VALUES(
    1, '@Todos', 1, 3
);

/* ------------ Notificaciones Para Todos ------------*/
INSERT INTO Notificaciones(
    Asunto_Notf, Texto_Notf, Fecha_Notf,
    Likes_Notf, Import_Notf
) VALUES (
    'Notificaciones para todos',
    'Las notificaciones que tengan @Todos serán
    enviadas a cualquier usuario',
    '2023-01-01 13:00:00', 0, 0
);

INSERT INTO UserNotf(
    Origen_UN, Para_UN, FK_User_UN,
    FK_Notf_UN
)VALUES(
    1, 'NULL', 2, 4
);

/* ------------ Notificaciones de usuario (x2) ------------*/
INSERT INTO Notificaciones(
    Asunto_Notf, Texto_Notf, Fecha_Notf,
    Likes_Notf, Import_Notf
) VALUES (
    'Notificacione de parte de un usuario',
    'Las notificaciones enviadas por usuarios a ecepción de
    los administradores, tendrán un botón de reportar, el cual
    los administradores solo necesitarán hacer un reporte y la
    notificación quedará eliminada, de lo contrario a los 30
    reportes será eliminada la notificación y se enviará una
    sanción al usuario',
    '2023-01-01 13:00:00', 0, 0
);

INSERT INTO UserNotf(
    Origen_UN, Para_UN, FK_User_UN,
    FK_Notf_UN
)VALUES(
    3, 'NULL', 1, 5
);

INSERT INTO Notificaciones(
    Asunto_Notf, Texto_Notf, Fecha_Notf,
    Likes_Notf, Import_Notf
) VALUES (
    'Notificacione de parte de un usuario',
    'Las notificaciones enviadas por usuarios a ecepción de
    los administradores, tendrán un botón de reportar, el cual
    los administradores solo necesitarán hacer un reporte y la
    notificación quedará eliminada, de lo contrario a los 30
    reportes será eliminada la notificación y se enviará una
    sanción al usuario',
    '2023-01-01 13:00:00', 0, 0
);

INSERT INTO UserNotf(
    Origen_UN, Para_UN, FK_User_UN,
    FK_Notf_UN
)VALUES(
    3, 'NULL', 4, 6
);

/* ------------------------ Libros (x2) ------------------------*/
INSERT INTO Libros(
    Nom_Lib, Aut_Lib, IdImg_Lib, ValPDF_Lib, CantLik_Lib,
    Pag_Lib, Epi_Lib
) VALUES (
    'A dos metros de ti', 'Autor del libro', 'Lib1.png', '', 0, 150,
    'Epílogo -> Epílogo es una sección al final de una obra literaria, un discurso
    o una presentación en la que se hace un resumen de los temas principales
    discutidos y se ofrece una conclusión. Por lo general, los epílogos también
    contienen una llamada a la acción, una reflexión o una predicción sobre el
    tema.'
), (
    'Wishes', 'Autor del libro', 'Lib4.png', 'Disenio.pdf', 0, 120,
    'Epílogo -> Epílogo es una sección al final de una obra literaria, un discurso
    o una presentación en la que se hace un resumen de los temas principales
    discutidos y se ofrece una conclusión. Por lo general, los epílogos también
    contienen una llamada a la acción, una reflexión o una predicción sobre el
    tema.'
);






/*
SET FOREIGN_KEY_CHECKS = 0; 
TRUNCATE TABLE PerfilImg; 
SET FOREIGN_KEY_CHECKS = 1;
*/