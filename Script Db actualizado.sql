-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema DB_Activos
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema DB_Activos
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `DB_Activos` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `DB_Activos` ;

-- -----------------------------------------------------
-- Table `DB_Activos`.`Tipo_Activo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `DB_Activos`.`Tipo_Activo` (
  `Id_Tipo_Activo` INT NOT NULL COMMENT '',
  `Nom_Tipo_Activo` VARCHAR(45) NOT NULL COMMENT '',
  `Desc_Tipo_Activo` VARCHAR(255) NOT NULL COMMENT '',
  PRIMARY KEY (`Id_Tipo_Activo`)  COMMENT '',
  UNIQUE INDEX `Id_Tipo_Activo_UNIQUE` (`Id_Tipo_Activo` ASC)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `DB_Activos`.`Clasificacion_Activo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `DB_Activos`.`Clasificacion_Activo` (
  `Id_Clasificacion_Activo` INT NOT NULL COMMENT '',
  `Nom_Clasificacion_Activo` VARCHAR(45) NOT NULL COMMENT '',
  `Desc_Clasificacion_Activo` VARCHAR(255) NOT NULL COMMENT '',
  PRIMARY KEY (`Id_Clasificacion_Activo`)  COMMENT '',
  UNIQUE INDEX `Id_Clasificacion_Activo_UNIQUE` (`Id_Clasificacion_Activo` ASC)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `DB_Activos`.`Med_Almacenamiento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `DB_Activos`.`Med_Almacenamiento` (
  `Id_Med_Almacenamiento` INT NOT NULL COMMENT '',
  `Nom_Med_Almacenamiento` VARCHAR(45) NOT NULL COMMENT '',
  `Desc_Med_Almacenamiento` VARCHAR(255) NOT NULL COMMENT '',
  PRIMARY KEY (`Id_Med_Almacenamiento`)  COMMENT '',
  UNIQUE INDEX `Id_Med_Almacenamiento_UNIQUE` (`Id_Med_Almacenamiento` ASC)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `DB_Activos`.`Confidencialidad`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `DB_Activos`.`Confidencialidad` (
  `idConfidencialidad` INT NOT NULL COMMENT '',
  `val_Confidencialidad` VARCHAR(45) NOT NULL COMMENT '',
  PRIMARY KEY (`idConfidencialidad`)  COMMENT '',
  UNIQUE INDEX `idConfidencialidad_UNIQUE` (`idConfidencialidad` ASC)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `DB_Activos`.`Integridad`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `DB_Activos`.`Integridad` (
  `idIntegridad` INT NOT NULL COMMENT '',
  `val_Integridad` VARCHAR(45) NOT NULL COMMENT '',
  PRIMARY KEY (`idIntegridad`)  COMMENT '',
  UNIQUE INDEX `idIntegridad_UNIQUE` (`idIntegridad` ASC)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `DB_Activos`.`Disponibilidad`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `DB_Activos`.`Disponibilidad` (
  `Id_Disponibilidad` INT NOT NULL COMMENT '',
  `val_Disponibilidad` VARCHAR(45) NOT NULL COMMENT '',
  PRIMARY KEY (`Id_Disponibilidad`)  COMMENT '',
  UNIQUE INDEX `Id_Disponibilidad_UNIQUE` (`Id_Disponibilidad` ASC)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `DB_Activos`.`Tipo_Amenazas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `DB_Activos`.`Tipo_Amenazas` (
  `Id_Tipo_Amenazas` INT NOT NULL COMMENT '',
  `Nom_Tipo_Amenaza` VARCHAR(45) NOT NULL COMMENT '',
  `Desc_Tipo_Amenaza` VARCHAR(45) NOT NULL COMMENT '',
  PRIMARY KEY (`Id_Tipo_Amenazas`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `DB_Activos`.`Impacto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `DB_Activos`.`Impacto` (
  `Id_Impacto` INT NOT NULL COMMENT '',
  `Val_Impacto` VARCHAR(45) NOT NULL COMMENT '',
  PRIMARY KEY (`Id_Impacto`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `DB_Activos`.`Amenazas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `DB_Activos`.`Amenazas` (
  `Id_Amenazas` INT NOT NULL COMMENT '',
  `Nom_Amenazas` VARCHAR(45) NOT NULL COMMENT '',
  `Desc_Amenazas` VARCHAR(100) NULL COMMENT '',
  `Tipo_Amenazas_Id_Tipo_Amenazas` INT NOT NULL COMMENT '',
  `Impacto_Id_Impacto` INT NOT NULL COMMENT '',
  `Impacto_Confidencialidad_idConfidencialidad` INT NOT NULL COMMENT '',
  `Impacto_Integridad_idIntegridad` INT NOT NULL COMMENT '',
  `Impacto_Disponibilidad_Id_Disponibilidad` INT NOT NULL COMMENT '',
  PRIMARY KEY (`Id_Amenazas`, `Tipo_Amenazas_Id_Tipo_Amenazas`, `Impacto_Id_Impacto`, `Impacto_Confidencialidad_idConfidencialidad`, `Impacto_Integridad_idIntegridad`, `Impacto_Disponibilidad_Id_Disponibilidad`)  COMMENT '',
  INDEX `fk_Amenazas_Tipo_Amenazas1_idx` (`Tipo_Amenazas_Id_Tipo_Amenazas` ASC)  COMMENT '',
  INDEX `fk_Amenazas_Impacto1_idx` (`Impacto_Id_Impacto` ASC, `Impacto_Confidencialidad_idConfidencialidad` ASC, `Impacto_Integridad_idIntegridad` ASC, `Impacto_Disponibilidad_Id_Disponibilidad` ASC)  COMMENT '',
  CONSTRAINT `fk_Amenazas_Tipo_Amenazas1`
    FOREIGN KEY (`Tipo_Amenazas_Id_Tipo_Amenazas`)
    REFERENCES `DB_Activos`.`Tipo_Amenazas` (`Id_Tipo_Amenazas`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Amenazas_Impacto1`
    FOREIGN KEY (`Impacto_Id_Impacto`)
    REFERENCES `DB_Activos`.`Impacto` (`Id_Impacto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `DB_Activos`.`Tipo_Control`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `DB_Activos`.`Tipo_Control` (
  `Id_Tipo_Control` INT NOT NULL COMMENT '',
  `Nom_Tipo_Control` VARCHAR(45) NOT NULL COMMENT '',
  `Desc_Tipo_Control` VARCHAR(45) NOT NULL COMMENT '',
  PRIMARY KEY (`Id_Tipo_Control`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `DB_Activos`.`Control`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `DB_Activos`.`Control` (
  `Id_Control` INT NOT NULL COMMENT '',
  `Nom_Control` VARCHAR(45) NOT NULL COMMENT '',
  `Desc_Control` VARCHAR(45) NOT NULL COMMENT '',
  `Tipo_Control_Id_Tipo_Control` INT NOT NULL COMMENT '',
  `Efectividad_Control` INT NULL COMMENT '',
  PRIMARY KEY (`Id_Control`, `Tipo_Control_Id_Tipo_Control`)  COMMENT '',
  INDEX `fk_Control_Tipo_Control1_idx` (`Tipo_Control_Id_Tipo_Control` ASC)  COMMENT '',
  CONSTRAINT `fk_Control_Tipo_Control1`
    FOREIGN KEY (`Tipo_Control_Id_Tipo_Control`)
    REFERENCES `DB_Activos`.`Tipo_Control` (`Id_Tipo_Control`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `DB_Activos`.`Amenazas_has_Control`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `DB_Activos`.`Amenazas_has_Control` (
  `Amenazas_Id_Amenazas` INT NOT NULL COMMENT '',
  `Amenazas_Tipo_Amenazas_Id_Tipo_Amenazas` INT NOT NULL COMMENT '',
  `Control_Id_Control` INT NOT NULL COMMENT '',
  `Control_Tipo_Control_Id_Tipo_Control` INT NOT NULL COMMENT '',
  PRIMARY KEY (`Amenazas_Id_Amenazas`, `Amenazas_Tipo_Amenazas_Id_Tipo_Amenazas`, `Control_Id_Control`, `Control_Tipo_Control_Id_Tipo_Control`)  COMMENT '',
  INDEX `fk_Amenazas_has_Control_Control1_idx` (`Control_Id_Control` ASC, `Control_Tipo_Control_Id_Tipo_Control` ASC)  COMMENT '',
  INDEX `fk_Amenazas_has_Control_Amenazas1_idx` (`Amenazas_Id_Amenazas` ASC, `Amenazas_Tipo_Amenazas_Id_Tipo_Amenazas` ASC)  COMMENT '',
  CONSTRAINT `fk_Amenazas_has_Control_Amenazas1`
    FOREIGN KEY (`Amenazas_Id_Amenazas` , `Amenazas_Tipo_Amenazas_Id_Tipo_Amenazas`)
    REFERENCES `DB_Activos`.`Amenazas` (`Id_Amenazas` , `Tipo_Amenazas_Id_Tipo_Amenazas`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Amenazas_has_Control_Control1`
    FOREIGN KEY (`Control_Id_Control` , `Control_Tipo_Control_Id_Tipo_Control`)
    REFERENCES `DB_Activos`.`Control` (`Id_Control` , `Tipo_Control_Id_Tipo_Control`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `DB_Activos`.`Proceso`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `DB_Activos`.`Proceso` (
  `Id_Proceso` INT NOT NULL COMMENT '',
  `Nom_Proceso` VARCHAR(45) NOT NULL COMMENT '',
  PRIMARY KEY (`Id_Proceso`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `DB_Activos`.`Subproceso`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `DB_Activos`.`Subproceso` (
  `Id_Subproceso` INT NOT NULL COMMENT '',
  `Nom_Subproceso` VARCHAR(45) NOT NULL COMMENT '',
  `Desc_Subproceso` VARCHAR(45) NULL COMMENT '',
  `Proceso_Id_Proceso` INT NOT NULL COMMENT '',
  PRIMARY KEY (`Id_Subproceso`, `Proceso_Id_Proceso`)  COMMENT '',
  INDEX `fk_Subproceso_Proceso1_idx` (`Proceso_Id_Proceso` ASC)  COMMENT '',
  CONSTRAINT `fk_Subproceso_Proceso1`
    FOREIGN KEY (`Proceso_Id_Proceso`)
    REFERENCES `DB_Activos`.`Proceso` (`Id_Proceso`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `DB_Activos`.`Area`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `DB_Activos`.`Area` (
  `idArea` INT NOT NULL COMMENT '',
  `nom_Area` VARCHAR(45) NOT NULL COMMENT '',
  PRIMARY KEY (`idArea`)  COMMENT '',
  UNIQUE INDEX `idArea_UNIQUE` (`idArea` ASC)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `DB_Activos`.`Activo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `DB_Activos`.`Activo` (
  `Id_Activo` INT NOT NULL COMMENT '',
  `Nom_Activo` VARCHAR(45) NOT NULL COMMENT '',
  `Desc_Activo` VARCHAR(45) NOT NULL COMMENT '',
  `Propietario_Activo` VARCHAR(45) NOT NULL COMMENT '',
  `Entrada_Salida` VARCHAR(45) NOT NULL COMMENT '',
  `Remitente` VARCHAR(45) NOT NULL COMMENT '',
  `Ubicacion_Activo` VARCHAR(45) NOT NULL COMMENT '',
  `Custodio_Activo` VARCHAR(45) NOT NULL COMMENT '',
  `Soporte_Tec_Activo` VARCHAR(45) NOT NULL COMMENT '',
  `Soporte_Func_Activo` VARCHAR(45) NOT NULL COMMENT '',
  `Med_Almacenamiento_Id_Med_Almacenamiento` INT NOT NULL COMMENT '',
  `Tipo_Activo_Id_Tipo_Activo` INT NOT NULL COMMENT '',
  `Clasificacion_Activo_Id_Clasificacion_Activo` INT NOT NULL COMMENT '',
  `Disponibilidad_Id_Disponibilidad` INT NOT NULL COMMENT '',
  `Integridad_idIntegridad` INT NOT NULL COMMENT '',
  `Confidencialidad_idConfidencialidad` INT NOT NULL COMMENT '',
  `Degradacion` VARCHAR(45) NULL COMMENT '',
  `Riesgo_inherente` VARCHAR(45) NULL COMMENT '',
  `Riesgo_residual` VARCHAR(45) NULL COMMENT '',
  `Area_idArea` INT NOT NULL COMMENT '',
  PRIMARY KEY (`Id_Activo`, `Med_Almacenamiento_Id_Med_Almacenamiento`, `Tipo_Activo_Id_Tipo_Activo`, `Clasificacion_Activo_Id_Clasificacion_Activo`, `Disponibilidad_Id_Disponibilidad`, `Integridad_idIntegridad`, `Confidencialidad_idConfidencialidad`)  COMMENT '',
  UNIQUE INDEX `idActivo_UNIQUE` (`Id_Activo` ASC)  COMMENT '',
  INDEX `fk_Activo_Med_Almacenamiento1_idx` (`Med_Almacenamiento_Id_Med_Almacenamiento` ASC)  COMMENT '',
  INDEX `fk_Activo_Tipo_Activo1_idx` (`Tipo_Activo_Id_Tipo_Activo` ASC)  COMMENT '',
  INDEX `fk_Activo_Clasificacion_Activo1_idx` (`Clasificacion_Activo_Id_Clasificacion_Activo` ASC)  COMMENT '',
  INDEX `fk_Activo_Disponibilidad1_idx` (`Disponibilidad_Id_Disponibilidad` ASC)  COMMENT '',
  INDEX `fk_Activo_Integridad1_idx` (`Integridad_idIntegridad` ASC)  COMMENT '',
  INDEX `fk_Activo_Confidencialidad1_idx` (`Confidencialidad_idConfidencialidad` ASC)  COMMENT '',
  INDEX `fk_Activo_Area1_idx` (`Area_idArea` ASC)  COMMENT '',
  CONSTRAINT `fk_Activo_Med_Almacenamiento1`
    FOREIGN KEY (`Med_Almacenamiento_Id_Med_Almacenamiento`)
    REFERENCES `DB_Activos`.`Med_Almacenamiento` (`Id_Med_Almacenamiento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Activo_Tipo_Activo1`
    FOREIGN KEY (`Tipo_Activo_Id_Tipo_Activo`)
    REFERENCES `DB_Activos`.`Tipo_Activo` (`Id_Tipo_Activo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Activo_Clasificacion_Activo1`
    FOREIGN KEY (`Clasificacion_Activo_Id_Clasificacion_Activo`)
    REFERENCES `DB_Activos`.`Clasificacion_Activo` (`Id_Clasificacion_Activo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Activo_Disponibilidad1`
    FOREIGN KEY (`Disponibilidad_Id_Disponibilidad`)
    REFERENCES `DB_Activos`.`Disponibilidad` (`Id_Disponibilidad`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Activo_Integridad1`
    FOREIGN KEY (`Integridad_idIntegridad`)
    REFERENCES `DB_Activos`.`Integridad` (`idIntegridad`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Activo_Confidencialidad1`
    FOREIGN KEY (`Confidencialidad_idConfidencialidad`)
    REFERENCES `DB_Activos`.`Confidencialidad` (`idConfidencialidad`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Activo_Area1`
    FOREIGN KEY (`Area_idArea`)
    REFERENCES `DB_Activos`.`Area` (`idArea`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `DB_Activos`.`Activo_has_Amenazas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `DB_Activos`.`Activo_has_Amenazas` (
  `Activo_Id_Activo` INT NOT NULL COMMENT '',
  `Amenazas_Id_Amenazas` INT NOT NULL COMMENT '',
  `Probabilidad_Ocurrencia` VARCHAR(45) NULL COMMENT '',
  PRIMARY KEY (`Activo_Id_Activo`, `Amenazas_Id_Amenazas`)  COMMENT '',
  INDEX `fk_Activo_has_Amenazas_Amenazas1_idx` (`Amenazas_Id_Amenazas` ASC)  COMMENT '',
  INDEX `fk_Activo_has_Amenazas_Activo1_idx` (`Activo_Id_Activo` ASC)  COMMENT '',
  CONSTRAINT `fk_Activo_has_Amenazas_Activo1`
    FOREIGN KEY (`Activo_Id_Activo`)
    REFERENCES `DB_Activos`.`Activo` (`Id_Activo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Activo_has_Amenazas_Amenazas1`
    FOREIGN KEY (`Amenazas_Id_Amenazas`)
    REFERENCES `DB_Activos`.`Amenazas` (`Id_Amenazas`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `DB_Activos`.`Subproceso_has_Area`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `DB_Activos`.`Subproceso_has_Area` (
  `Subproceso_Id_Subproceso` INT NOT NULL COMMENT '',
  `Subproceso_Proceso_Id_Proceso` INT NOT NULL COMMENT '',
  `Area_idArea` INT NOT NULL COMMENT '',
  PRIMARY KEY (`Subproceso_Id_Subproceso`, `Subproceso_Proceso_Id_Proceso`, `Area_idArea`)  COMMENT '',
  INDEX `fk_Subproceso_has_Area_Area1_idx` (`Area_idArea` ASC)  COMMENT '',
  INDEX `fk_Subproceso_has_Area_Subproceso1_idx` (`Subproceso_Id_Subproceso` ASC, `Subproceso_Proceso_Id_Proceso` ASC)  COMMENT '',
  CONSTRAINT `fk_Subproceso_has_Area_Subproceso1`
    FOREIGN KEY (`Subproceso_Id_Subproceso` , `Subproceso_Proceso_Id_Proceso`)
    REFERENCES `DB_Activos`.`Subproceso` (`Id_Subproceso` , `Proceso_Id_Proceso`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Subproceso_has_Area_Area1`
    FOREIGN KEY (`Area_idArea`)
    REFERENCES `DB_Activos`.`Area` (`idArea`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `DB_Activos`.`Perf_Usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `DB_Activos`.`Perf_Usuario` (
  `idPerf_Usuario` INT NOT NULL COMMENT '',
  `Nom_Perfil` VARCHAR(45) NOT NULL COMMENT '',
  `Desc_Perfil` VARCHAR(100) NOT NULL COMMENT '',
  PRIMARY KEY (`idPerf_Usuario`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `DB_Activos`.`Usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `DB_Activos`.`Usuario` (
  `idUsuario` INT NOT NULL COMMENT '',
  `nick_Usuario` VARCHAR(16) NOT NULL COMMENT '',
  `pass_Usuario` VARCHAR(45) NOT NULL COMMENT '',
  `Perf_Usuario_idPerf_Usuario` INT NOT NULL COMMENT '',
  `correo_Usuario` VARCHAR(255) NOT NULL COMMENT '',
  `nombreUsuario` VARCHAR(255) NOT NULL COMMENT '',
  `estado` VARCHAR(45) NOT NULL COMMENT '',
  PRIMARY KEY (`idUsuario`, `Perf_Usuario_idPerf_Usuario`)  COMMENT '',
  UNIQUE INDEX `nick_Usuario_UNIQUE` (`nick_Usuario` ASC)  COMMENT '',
  INDEX `fk_Usuario_Perf_Usuario1_idx` (`Perf_Usuario_idPerf_Usuario` ASC)  COMMENT '',
  CONSTRAINT `fk_Usuario_Perf_Usuario1`
    FOREIGN KEY (`Perf_Usuario_idPerf_Usuario`)
    REFERENCES `DB_Activos`.`Perf_Usuario` (`idPerf_Usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `DB_Activos`.`Dependencias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `DB_Activos`.`Dependencias` (
  `idDependencias` INT NOT NULL COMMENT '',
  `Activo_Id_Activo` INT NOT NULL COMMENT '',
  `Activo_Med_Almacenamiento_Id_Med_Almacenamiento` INT NOT NULL COMMENT '',
  `Activo_Tipo_Activo_Id_Tipo_Activo` INT NOT NULL COMMENT '',
  `Activo_Clasificacion_Activo_Id_Clasificacion_Activo` INT NOT NULL COMMENT '',
  `Activo_Disponibilidad_Id_Disponibilidad` INT NOT NULL COMMENT '',
  `Activo_Integridad_idIntegridad` INT NOT NULL COMMENT '',
  `Activo_Confidencialidad_idConfidencialidad` INT NOT NULL COMMENT '',
  `Activo_Subproceso_Id_Subproceso` INT NOT NULL COMMENT '',
  `Activo_Subproceso_Proceso_Id_Proceso` INT NOT NULL COMMENT '',
  `Activo_Usuario_idUsuario` INT NOT NULL COMMENT '',
  `Activo_Usuario_Perf_Usuario_idPerf_Usuario` INT NOT NULL COMMENT '',
  PRIMARY KEY (`idDependencias`)  COMMENT '',
  INDEX `fk_Dependencias_Activo1_idx` (`Activo_Id_Activo` ASC, `Activo_Med_Almacenamiento_Id_Med_Almacenamiento` ASC, `Activo_Tipo_Activo_Id_Tipo_Activo` ASC, `Activo_Clasificacion_Activo_Id_Clasificacion_Activo` ASC, `Activo_Disponibilidad_Id_Disponibilidad` ASC, `Activo_Integridad_idIntegridad` ASC, `Activo_Confidencialidad_idConfidencialidad` ASC, `Activo_Subproceso_Id_Subproceso` ASC, `Activo_Subproceso_Proceso_Id_Proceso` ASC, `Activo_Usuario_idUsuario` ASC, `Activo_Usuario_Perf_Usuario_idPerf_Usuario` ASC)  COMMENT '',
  CONSTRAINT `fk_Dependencias_Activo1`
    FOREIGN KEY (`Activo_Id_Activo` , `Activo_Med_Almacenamiento_Id_Med_Almacenamiento` , `Activo_Tipo_Activo_Id_Tipo_Activo` , `Activo_Clasificacion_Activo_Id_Clasificacion_Activo` , `Activo_Disponibilidad_Id_Disponibilidad` , `Activo_Integridad_idIntegridad` , `Activo_Confidencialidad_idConfidencialidad`)
    REFERENCES `DB_Activos`.`Activo` (`Id_Activo` , `Med_Almacenamiento_Id_Med_Almacenamiento` , `Tipo_Activo_Id_Tipo_Activo` , `Clasificacion_Activo_Id_Clasificacion_Activo` , `Disponibilidad_Id_Disponibilidad` , `Integridad_idIntegridad` , `Confidencialidad_idConfidencialidad`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `DB_Activos`.`Impacto_por_Dimension`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `DB_Activos`.`Impacto_por_Dimension` (
  `Impacto_Id_Impacto` INT NOT NULL COMMENT '',
  `Impacto_Total` VARCHAR(45) NOT NULL COMMENT '',
  `Activo_Id_Activo` INT NOT NULL COMMENT '',
  `ImpactoConf` VARCHAR(45) NULL COMMENT '',
  `ImpactoDis` VARCHAR(45) NULL COMMENT '',
  `ImpactoInte` VARCHAR(45) NULL COMMENT '',
  PRIMARY KEY (`Impacto_Id_Impacto`)  COMMENT '',
  INDEX `fk_Impacto_por_Dimension_Activo1_idx` (`Activo_Id_Activo` ASC)  COMMENT '',
  CONSTRAINT `fk_Impacto_por_Dimension_Impacto1`
    FOREIGN KEY (`Impacto_Id_Impacto`)
    REFERENCES `DB_Activos`.`Impacto` (`Id_Impacto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Impacto_por_Dimension_Activo1`
    FOREIGN KEY (`Activo_Id_Activo`)
    REFERENCES `DB_Activos`.`Activo` (`Id_Activo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `DB_Activos`.`Tipo_Activo`
-- -----------------------------------------------------
START TRANSACTION;
USE `DB_Activos`;
INSERT INTO `DB_Activos`.`Tipo_Activo` (`Id_Tipo_Activo`, `Nom_Tipo_Activo`, `Desc_Tipo_Activo`) VALUES (1, 'FISICO', 'app');
INSERT INTO `DB_Activos`.`Tipo_Activo` (`Id_Tipo_Activo`, `Nom_Tipo_Activo`, `Desc_Tipo_Activo`) VALUES (2, 'ELECTRONICO', 'sft');

COMMIT;


-- -----------------------------------------------------
-- Data for table `DB_Activos`.`Clasificacion_Activo`
-- -----------------------------------------------------
START TRANSACTION;
USE `DB_Activos`;
INSERT INTO `DB_Activos`.`Clasificacion_Activo` (`Id_Clasificacion_Activo`, `Nom_Clasificacion_Activo`, `Desc_Clasificacion_Activo`) VALUES (1, 'APLICACION', 'Aplicaciones o Sofware de proposito especifico y personalizado');
INSERT INTO `DB_Activos`.`Clasificacion_Activo` (`Id_Clasificacion_Activo`, `Nom_Clasificacion_Activo`, `Desc_Clasificacion_Activo`) VALUES (2, 'SOFTWARE UTILITARIO', 'Software provisto por terceros');
INSERT INTO `DB_Activos`.`Clasificacion_Activo` (`Id_Clasificacion_Activo`, `Nom_Clasificacion_Activo`, `Desc_Clasificacion_Activo`) VALUES (3, 'MODULO SISTEMA CORE', 'Modulo del sistema Core del negocio');
INSERT INTO `DB_Activos`.`Clasificacion_Activo` (`Id_Clasificacion_Activo`, `Nom_Clasificacion_Activo`, `Desc_Clasificacion_Activo`) VALUES (4, 'MANUALES Y DOCUMENTACION DE PROCESOS', 'Documentos generales de procesos');
INSERT INTO `DB_Activos`.`Clasificacion_Activo` (`Id_Clasificacion_Activo`, `Nom_Clasificacion_Activo`, `Desc_Clasificacion_Activo`) VALUES (5, 'HERRAMIENTAS DE SOFTWARE DE USUARIO FINAL (HSUF)', 'Archivos de excel o similares');
INSERT INTO `DB_Activos`.`Clasificacion_Activo` (`Id_Clasificacion_Activo`, `Nom_Clasificacion_Activo`, `Desc_Clasificacion_Activo`) VALUES (6, 'EQUIPOS DE COMPUTO', 'Equipos de computo criticos');
INSERT INTO `DB_Activos`.`Clasificacion_Activo` (`Id_Clasificacion_Activo`, `Nom_Clasificacion_Activo`, `Desc_Clasificacion_Activo`) VALUES (7, 'EQUIPOS DE COMPUTO DE USUARIO FINAL (ECUF)', 'Equipos de computo especializados');
INSERT INTO `DB_Activos`.`Clasificacion_Activo` (`Id_Clasificacion_Activo`, `Nom_Clasificacion_Activo`, `Desc_Clasificacion_Activo`) VALUES (8, 'INFORMACION ELECTRONICA', 'Informacion importante digital');
INSERT INTO `DB_Activos`.`Clasificacion_Activo` (`Id_Clasificacion_Activo`, `Nom_Clasificacion_Activo`, `Desc_Clasificacion_Activo`) VALUES (9, 'INFORMACION FISICA', 'Informacion importante almacenada fisica');
INSERT INTO `DB_Activos`.`Clasificacion_Activo` (`Id_Clasificacion_Activo`, `Nom_Clasificacion_Activo`, `Desc_Clasificacion_Activo`) VALUES (10, 'EQUIPOS DE OFICINA', 'Equipos electronicos o mecanicos especializados');
INSERT INTO `DB_Activos`.`Clasificacion_Activo` (`Id_Clasificacion_Activo`, `Nom_Clasificacion_Activo`, `Desc_Clasificacion_Activo`) VALUES (11, 'SERVICIOS (INCLUYE SERV. PUBLICOS Y SERV. CONTRATADOS)', 'Servicios publicos');
INSERT INTO `DB_Activos`.`Clasificacion_Activo` (`Id_Clasificacion_Activo`, `Nom_Clasificacion_Activo`, `Desc_Clasificacion_Activo`) VALUES (12, 'OTROS ACTIVOS DE INFORMACION', 'Otros fuera de esta explicacion');

COMMIT;


-- -----------------------------------------------------
-- Data for table `DB_Activos`.`Med_Almacenamiento`
-- -----------------------------------------------------
START TRANSACTION;
USE `DB_Activos`;
INSERT INTO `DB_Activos`.`Med_Almacenamiento` (`Id_Med_Almacenamiento`, `Nom_Med_Almacenamiento`, `Desc_Med_Almacenamiento`) VALUES (1, 'ELECTRONICO', ' ');
INSERT INTO `DB_Activos`.`Med_Almacenamiento` (`Id_Med_Almacenamiento`, `Nom_Med_Almacenamiento`, `Desc_Med_Almacenamiento`) VALUES (2, 'FISICO', ' ');
INSERT INTO `DB_Activos`.`Med_Almacenamiento` (`Id_Med_Almacenamiento`, `Nom_Med_Almacenamiento`, `Desc_Med_Almacenamiento`) VALUES (3, 'FISICO Y ELECTRONICO', ' ');

COMMIT;


-- -----------------------------------------------------
-- Data for table `DB_Activos`.`Confidencialidad`
-- -----------------------------------------------------
START TRANSACTION;
USE `DB_Activos`;
INSERT INTO `DB_Activos`.`Confidencialidad` (`idConfidencialidad`, `val_Confidencialidad`) VALUES (1, 'MUY ALTO');
INSERT INTO `DB_Activos`.`Confidencialidad` (`idConfidencialidad`, `val_Confidencialidad`) VALUES (2, 'ALTO');
INSERT INTO `DB_Activos`.`Confidencialidad` (`idConfidencialidad`, `val_Confidencialidad`) VALUES (3, 'MEDIO');
INSERT INTO `DB_Activos`.`Confidencialidad` (`idConfidencialidad`, `val_Confidencialidad`) VALUES (4, 'BAJO');
INSERT INTO `DB_Activos`.`Confidencialidad` (`idConfidencialidad`, `val_Confidencialidad`) VALUES (5, 'MUY BAJO');

COMMIT;


-- -----------------------------------------------------
-- Data for table `DB_Activos`.`Integridad`
-- -----------------------------------------------------
START TRANSACTION;
USE `DB_Activos`;
INSERT INTO `DB_Activos`.`Integridad` (`idIntegridad`, `val_Integridad`) VALUES (1, 'MUY ALTO');
INSERT INTO `DB_Activos`.`Integridad` (`idIntegridad`, `val_Integridad`) VALUES (2, 'ALTO');
INSERT INTO `DB_Activos`.`Integridad` (`idIntegridad`, `val_Integridad`) VALUES (3, 'MEDIO');
INSERT INTO `DB_Activos`.`Integridad` (`idIntegridad`, `val_Integridad`) VALUES (4, 'BAJO');
INSERT INTO `DB_Activos`.`Integridad` (`idIntegridad`, `val_Integridad`) VALUES (5, 'MUY BAJO');

COMMIT;


-- -----------------------------------------------------
-- Data for table `DB_Activos`.`Disponibilidad`
-- -----------------------------------------------------
START TRANSACTION;
USE `DB_Activos`;
INSERT INTO `DB_Activos`.`Disponibilidad` (`Id_Disponibilidad`, `val_Disponibilidad`) VALUES (1, 'MUY ALTO');
INSERT INTO `DB_Activos`.`Disponibilidad` (`Id_Disponibilidad`, `val_Disponibilidad`) VALUES (2, 'ALTO');
INSERT INTO `DB_Activos`.`Disponibilidad` (`Id_Disponibilidad`, `val_Disponibilidad`) VALUES (3, 'MEDIO');
INSERT INTO `DB_Activos`.`Disponibilidad` (`Id_Disponibilidad`, `val_Disponibilidad`) VALUES (4, 'BAJO');
INSERT INTO `DB_Activos`.`Disponibilidad` (`Id_Disponibilidad`, `val_Disponibilidad`) VALUES (5, 'MUY BAJO');

COMMIT;


-- -----------------------------------------------------
-- Data for table `DB_Activos`.`Impacto`
-- -----------------------------------------------------
START TRANSACTION;
USE `DB_Activos`;
INSERT INTO `DB_Activos`.`Impacto` (`Id_Impacto`, `Val_Impacto`) VALUES (1, 'CATASTROFICO');
INSERT INTO `DB_Activos`.`Impacto` (`Id_Impacto`, `Val_Impacto`) VALUES (2, 'MAYOR');
INSERT INTO `DB_Activos`.`Impacto` (`Id_Impacto`, `Val_Impacto`) VALUES (3, 'MEDIO');
INSERT INTO `DB_Activos`.`Impacto` (`Id_Impacto`, `Val_Impacto`) VALUES (4, 'BAJO');
INSERT INTO `DB_Activos`.`Impacto` (`Id_Impacto`, `Val_Impacto`) VALUES (5, 'INSIGNIFICANTE');

COMMIT;


-- -----------------------------------------------------
-- Data for table `DB_Activos`.`Proceso`
-- -----------------------------------------------------
START TRANSACTION;
USE `DB_Activos`;
INSERT INTO `DB_Activos`.`Proceso` (`Id_Proceso`, `Nom_Proceso`) VALUES (1, 'Expedir');
INSERT INTO `DB_Activos`.`Proceso` (`Id_Proceso`, `Nom_Proceso`) VALUES (2, 'Anular');
INSERT INTO `DB_Activos`.`Proceso` (`Id_Proceso`, `Nom_Proceso`) VALUES (3, 'Recaudar');
INSERT INTO `DB_Activos`.`Proceso` (`Id_Proceso`, `Nom_Proceso`) VALUES (4, 'Reasegurar');

COMMIT;


-- -----------------------------------------------------
-- Data for table `DB_Activos`.`Subproceso`
-- -----------------------------------------------------
START TRANSACTION;
USE `DB_Activos`;
INSERT INTO `DB_Activos`.`Subproceso` (`Id_Subproceso`, `Nom_Subproceso`, `Desc_Subproceso`, `Proceso_Id_Proceso`) VALUES (1, 'Expedir polizas SOAT', 'Subproceso que define la expedicion de polizas', 1);
INSERT INTO `DB_Activos`.`Subproceso` (`Id_Subproceso`, `Nom_Subproceso`, `Desc_Subproceso`, `Proceso_Id_Proceso`) VALUES (2, 'Reasegurar polizas Soat', 'Subprocesod e reaseguro ', 4);

COMMIT;


-- -----------------------------------------------------
-- Data for table `DB_Activos`.`Area`
-- -----------------------------------------------------
START TRANSACTION;
USE `DB_Activos`;
INSERT INTO `DB_Activos`.`Area` (`idArea`, `nom_Area`) VALUES (1, 'PRESIDENCIA');
INSERT INTO `DB_Activos`.`Area` (`idArea`, `nom_Area`) VALUES (2, 'AUDITORIA');
INSERT INTO `DB_Activos`.`Area` (`idArea`, `nom_Area`) VALUES (3, 'DIRECCION DE INVERSIONES');
INSERT INTO `DB_Activos`.`Area` (`idArea`, `nom_Area`) VALUES (4, 'VICEPRESIDENCIA DE CONTROL FINANCIERO');

COMMIT;


-- -----------------------------------------------------
-- Data for table `DB_Activos`.`Activo`
-- -----------------------------------------------------
START TRANSACTION;
USE `DB_Activos`;
INSERT INTO `DB_Activos`.`Activo` (`Id_Activo`, `Nom_Activo`, `Desc_Activo`, `Propietario_Activo`, `Entrada_Salida`, `Remitente`, `Ubicacion_Activo`, `Custodio_Activo`, `Soporte_Tec_Activo`, `Soporte_Func_Activo`, `Med_Almacenamiento_Id_Med_Almacenamiento`, `Tipo_Activo_Id_Tipo_Activo`, `Clasificacion_Activo_Id_Clasificacion_Activo`, `Disponibilidad_Id_Disponibilidad`, `Integridad_idIntegridad`, `Confidencialidad_idConfidencialidad`, `Degradacion`, `Riesgo_inherente`, `Riesgo_residual`, `Area_idArea`) VALUES (1, 'Equipo Presidencia', 'Equipo de computo asignado al presidente', 'Juan Bustamante', 'No aplica', 'No aplica', 'Presidencia', 'Juan Bustamante', 'Gerencia de TI', 'No aplica', 1, 1, 1, 1, 1, 1, '20 - 30%', NULL, NULL, 1);
INSERT INTO `DB_Activos`.`Activo` (`Id_Activo`, `Nom_Activo`, `Desc_Activo`, `Propietario_Activo`, `Entrada_Salida`, `Remitente`, `Ubicacion_Activo`, `Custodio_Activo`, `Soporte_Tec_Activo`, `Soporte_Func_Activo`, `Med_Almacenamiento_Id_Med_Almacenamiento`, `Tipo_Activo_Id_Tipo_Activo`, `Clasificacion_Activo_Id_Clasificacion_Activo`, `Disponibilidad_Id_Disponibilidad`, `Integridad_idIntegridad`, `Confidencialidad_idConfidencialidad`, `Degradacion`, `Riesgo_inherente`, `Riesgo_residual`, `Area_idArea`) VALUES (2, 'Corvus', 'Software contable de normas NIF', 'Juan Bustamante', 'No aplica', 'No aplica', 'Contabilidad', 'Francisco Silva', 'Corvus SAS', 'Corvus SAS', 1, 2, 3, 1, 1, 1, '30-50%', NULL, NULL, 3);

COMMIT;


-- -----------------------------------------------------
-- Data for table `DB_Activos`.`Perf_Usuario`
-- -----------------------------------------------------
START TRANSACTION;
USE `DB_Activos`;
INSERT INTO `DB_Activos`.`Perf_Usuario` (`idPerf_Usuario`, `Nom_Perfil`, `Desc_Perfil`) VALUES (1, 'Administrador', 'Encargado de la administracion general de la aplicacion');
INSERT INTO `DB_Activos`.`Perf_Usuario` (`idPerf_Usuario`, `Nom_Perfil`, `Desc_Perfil`) VALUES (2, 'Gestor', 'Encargado de la manipulacion de activos de informacion');
INSERT INTO `DB_Activos`.`Perf_Usuario` (`idPerf_Usuario`, `Nom_Perfil`, `Desc_Perfil`) VALUES (3, 'Gerente', 'Encargado del ingreso de los activos de informacion');
INSERT INTO `DB_Activos`.`Perf_Usuario` (`idPerf_Usuario`, `Nom_Perfil`, `Desc_Perfil`) VALUES (4, 'Auditor', 'Usuario modo solo consulta');

COMMIT;


-- -----------------------------------------------------
-- Data for table `DB_Activos`.`Usuario`
-- -----------------------------------------------------
START TRANSACTION;
USE `DB_Activos`;
INSERT INTO `DB_Activos`.`Usuario` (`idUsuario`, `nick_Usuario`, `pass_Usuario`, `Perf_Usuario_idPerf_Usuario`, `correo_Usuario`, `nombreUsuario`, `estado`) VALUES (1032365390, 'wcristiano', 'prueba1', 1, 'wcristiano@segurosmundial.com.co', 'wilder Cristiano', DEFAULT);
INSERT INTO `DB_Activos`.`Usuario` (`idUsuario`, `nick_Usuario`, `pass_Usuario`, `Perf_Usuario_idPerf_Usuario`, `correo_Usuario`, `nombreUsuario`, `estado`) VALUES (4856978, 'gsalcedo', 'prueba2', 2, 'wcristiano@segurosmundial.com.co', 'gabriel salcedo', DEFAULT);
INSERT INTO `DB_Activos`.`Usuario` (`idUsuario`, `nick_Usuario`, `pass_Usuario`, `Perf_Usuario_idPerf_Usuario`, `correo_Usuario`, `nombreUsuario`, `estado`) VALUES (1032653434, 'jotalvaro', 'prueba3', 3, 'wcristiano@segurosmundial.com.co', 'jose otalvaro', DEFAULT);
INSERT INTO `DB_Activos`.`Usuario` (`idUsuario`, `nick_Usuario`, `pass_Usuario`, `Perf_Usuario_idPerf_Usuario`, `correo_Usuario`, `nombreUsuario`, `estado`) VALUES (51213211, 'nvelasquez', 'prueba4', 4, 'wcristiano@segurosmundial.com.co', 'nancy velasquez', DEFAULT);
INSERT INTO `DB_Activos`.`Usuario` (`idUsuario`, `nick_Usuario`, `pass_Usuario`, `Perf_Usuario_idPerf_Usuario`, `correo_Usuario`, `nombreUsuario`, `estado`) VALUES (10, 'NICK', 'PASS', 1, 'CORREO@CORREO.COM', 'NOMBRE', 'ESTADO');

COMMIT;

