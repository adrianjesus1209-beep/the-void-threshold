
CREATE DATABASE IF NOT EXISTS `base_datos_threshold`
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_general_ci;

USE `base_datos_threshold`;

CREATE TABLE IF NOT EXISTS `registros_metricas` (
  `id`             INT          NOT NULL AUTO_INCREMENT,
  `tipo`           VARCHAR(20)  NOT NULL,
  `direccion_ip`   VARCHAR(45)  NOT NULL,
  `fecha_registro` DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_tipo`   (`tipo`),
  KEY `idx_fecha`  (`fecha_registro`),
  KEY `idx_ip`     (`direccion_ip`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS `admin_config` (
  `id`    INT          NOT NULL AUTO_INCREMENT,
  `clave` VARCHAR(50)  NOT NULL,
  `valor` TEXT         NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_clave` (`clave`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS `admin_login_attempts` (
  `id`            INT          NOT NULL AUTO_INCREMENT,
  `direccion_ip`  VARCHAR(45)  NOT NULL,
  `fecha_intento` DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `exitoso`       TINYINT(1)   NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `idx_ip_fecha` (`direccion_ip`, `fecha_intento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
