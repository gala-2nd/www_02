CREATE database Db_01;

USE Db_01;

CREATE TABLE articles (
  id int(11) NOT NULL AUTO_INCREMENT,

  title_cn varchar(255) DEFAULT NULL COMMENT '中文标题',

  title_en varchar(255) DEFAULT NULL COMMENT '英文标题',

  description_cn text COMMENT '中文说明',

  description_en text COMMENT '英文说明',

  PRIMARY KEY (id)
)DEFAULT CHARSET=utf8;

CREATE TABLE articles_02 (
  id int(11) NOT NULL AUTO_INCREMENT,

  `title_cn` varchar(1000) DEFAULT NULL COMMENT '中文标题',

  `title_en` varchar(30) DEFAULT NULL COMMENT '英文标题',

  `description_cn` text COMMENT '中文说明',

  `description_en` text COMMENT '英文说明',

  PRIMARY KEY (id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;
desc articles;

