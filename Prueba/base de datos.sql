
DROP DATABASE IF EXISTS dondeestas;
CREATE database dondeestas;
use dondeestas;



CREATE TABLE localizacion
  (
    id_localizacion INT NOT NULL AUTO_INCREMENT ,
    id_paciente     INT NOT NULL ,
    fecha_localizacion DATETIME,
    codigo    varchar (40),
    longitud varchar(10),
    latitud varchar(10),
    activo          INTEGER NOT NULL,
    PRIMARY Key (id_localizacion)
  ) ;


-- CREATE TABLE cuidador
--   (
--     id_cuidador INT NOT NULL ,
--     id_persona  INT NOT NULL
--   ) ;
-- ALTER TABLE cuidador ADD CONSTRAINT cuidador_PK PRIMARY KEY ( id_cuidador ) ;
-- ALTER TABLE cuidador CHANGE COLUMN `id_cuidador` `id_cuidador` INT(11) NOT NULL AUTO_INCREMENT ;

-- CREATE TABLE detalle_paciente_cuidador
--   (
--     id_detalle_pa_cu INT NOT NULL ,
--     id_cuidador      INT NOT NULL ,
--     id_paciente      INT NOT NULL ,
--     id_parentezco    INT NOT NULL ,
--     fecha            DATETIME NOT NULL ,
--     activo           INT NOT NULL
--   ) ;
-- ALTER TABLE detalle_paciente_cuidador ADD CONSTRAINT detalle_paciente_cuidador_PK PRIMARY KEY ( id_detalle_pa_cu ) ;
-- ALTER TABLE detalle_paciente_cuidador CHANGE COLUMN `id_detalle_pa_cu` `id_detalle_pa_cu` INT(11) NOT NULL AUTO_INCREMENT ;




-- CREATE TABLE paciente
--   (
--     id_paciente      INT NOT NULL ,
--     id_persona       INT NOT NULL ,
--     condicion_medica VARCHAR (100) NOT NULL
--   ) ;
-- ALTER TABLE paciente ADD CONSTRAINT paciente_PK PRIMARY KEY ( id_paciente ) ;
-- ALTER TABLE Paciente CHANGE COLUMN `id_paciente` `id_paciente` INT(11) NOT NULL AUTO_INCREMENT ;


-- CREATE TABLE foto_paciente
--   (
--     id_foto_paciente      INT NOT NULL ,
--     id_paciente        INT NOT NULL ,
--     nombre_foto VARCHAR (300) NOT NULL
--   ) ;

-- ALTER TABLE foto_paciente ADD CONSTRAINT foto_paciente_PK PRIMARY KEY ( id_foto_paciente ) ;
-- ALTER TABLE foto_paciente CHANGE COLUMN `id_foto_paciente` `id_foto_paciente` INT(11) NOT NULL AUTO_INCREMENT ;

-- CREATE TABLE parentezco
--   (
--     id_parentezco     INT NOT NULL ,
--     nombre_parentezco VARCHAR (50) NOT NULL
--   ) ;
-- ALTER TABLE parentezco ADD CONSTRAINT parentezco_PK PRIMARY KEY (id_parentezco) ;
-- ALTER TABLE parentezco CHANGE COLUMN `id_parentezco` `id_parentezco` INT(11) NOT NULL AUTO_INCREMENT ;



-- CREATE TABLE persona
--   (
--     id_persona      INT NOT NULL ,
--     rut             VARCHAR (14) NOT NULL UNIQUE,
--     nombres         VARCHAR (50) NOT NULL ,
--     apellidos       VARCHAR (50) NOT NULL ,
--     username        VARCHAR (50) NOT NULL UNIQUE,
--     password        VARCHAR (64) NOT NULL ,
--     telefono        VARCHAR (15) ,
--     correo          VARCHAR (60) ,
--     id_tipo_usuario INT NOT NULL ,
--     activo          INT NOT NULL
--   ) ;
-- ALTER TABLE persona ADD CONSTRAINT persona_PK PRIMARY KEY ( id_persona ) ;
-- ALTER TABLE persona CHANGE COLUMN `id_persona` `id_persona` INT(11) NOT NULL AUTO_INCREMENT ;



-- CREATE TABLE tipo_usuario
--   (
--     id_tipo_usuario INT NOT NULL ,
--     nombre_tipo     VARCHAR (50) NOT NULL
--   ) ;
-- ALTER TABLE tipo_usuario ADD CONSTRAINT tipo_usuario_PK PRIMARY KEY (id_tipo_usuario ) ;
-- ALTER TABLE tipo_usuario CHANGE COLUMN `id_tipo_usuario` `id_tipo_usuario` INT(11) NOT NULL AUTO_INCREMENT ;



-- ALTER TABLE cuidador ADD CONSTRAINT cuidador_persona_FK FOREIGN KEY (
-- id_persona ) REFERENCES persona ( id_persona ) ;

-- ALTER TABLE detalle_paciente_cuidador ADD CONSTRAINT deta_paci_cuid_cuid_FK
-- FOREIGN KEY ( id_cuidador ) REFERENCES cuidador ( id_cuidador ) ;

-- ALTER TABLE detalle_paciente_cuidador ADD CONSTRAINT deta_paci_cuid_paci_FK
-- FOREIGN KEY ( id_paciente ) REFERENCES paciente ( id_paciente ) ;

-- ALTER TABLE detalle_paciente_cuidador ADD CONSTRAINT deta_paci_cuid_pare_FK
-- FOREIGN KEY ( id_parentezco ) REFERENCES parentezco ( id_parentezco ) ;

-- ALTER TABLE localizacion ADD CONSTRAINT localizacion_paciente_FK FOREIGN KEY (
-- id_paciente ) REFERENCES paciente ( id_paciente ) ;

-- ALTER TABLE paciente ADD CONSTRAINT paciente_persona_FK FOREIGN KEY (
-- id_persona ) REFERENCES persona ( id_persona ) ;

-- ALTER TABLE persona ADD CONSTRAINT persona_tipo_usuario_FK FOREIGN KEY (
-- id_tipo_usuario ) REFERENCES tipo_usuario ( id_tipo_usuario ) ;
