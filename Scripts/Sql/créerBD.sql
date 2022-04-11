--  créer base de données
CREATE database database_01;
use database_01
CREATE TABLE `utilisateur` (

 `utilisateur_id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'ID',

 `utilisateur_ip` varchar(20) NOT NULL COMMENT 'IP',

 `utilisateur_nom` varchar(20) NOT NULL COMMENT 'nom',

 `utilisateur_mot_de_passe` varchar(15) NOT NULL COMMENT 'mot_de_passe',

 `utilisateur_email` varchar(30) NOT NULL COMMENT 'E-mail',

 `utilisateur_Portrait` blob DEFAULT NULL COMMENT 'Portrait',

 `utilisateur_date_inscription` datetime DEFAULT NULL COMMENT "date d'inscription",

 `utilisateur_anniversaire` date DEFAULT NULL COMMENT 'anniversaire',

 `utilisateur_âge` tinyint(4) DEFAULT NULL COMMENT 'âge',

 `utilisateur_Numéro_téléphone` bigint(11) NOT NULL COMMENT "Numéro de téléphone ",

 `utilisateur_surnom` varchar(20) NOT NULL COMMENT 'surnom',

 PRIMARY KEY (`utilisateur_id`),

 KEY `utilisateur_nom` (`utilisateur_nom`),

 KEY `utilisateur_surnom` (`utilisateur_surnom`),

 KEY `utilisateur_email` (`utilisateur_email`),

 KEY `utilisateur_Numéro_téléphone` (`utilisateur_Numéro_téléphone`)

) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

CREATE TABLE `zj_articles` (

 `article_id` bigint(255) NOT NULL AUTO_INCREMENT COMMENT '博文ID',

 `` bigint(20) NOT NULL COMMENT '发表用户ID',

 `article_title` text NOT NULL COMMENT '博文标题',

 `article_content` longtext NOT NULL COMMENT '博文内容',

 `article_views` bigint(20) NOT NULL COMMENT '浏览量',

 `article_comment_count` bigint(20) NOT NULL COMMENT '评论总数',

 `article_date` datetime DEFAULT NULL COMMENT '发表时间',

 `article_like_count` bigint(20) NOT NULL,

 PRIMARY KEY (`article_id`),

 KEY `` (``),

 CONSTRAINT `zj_articles_ibfk_1` FOREIGN KEY (``) REFERENCES `zj_users` (``)

) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

CREATE TABLE `zj_comments` (

 `comment_id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT '评论ID',

 `` bigint(20) NOT NULL COMMENT '发表用户ID',

 `article_id` bigint(20) NOT NULL COMMENT '评论博文ID',

 `comment_like_count` bigint(20) NOT NULL COMMENT '点赞数',

 `comment_date` datetime DEFAULT NULL COMMENT '评论日期',

 `comment_content` text NOT NULL COMMENT '评论内容',

 `parent_comment_id` bigint(20) NOT NULL COMMENT '父评论ID',

 PRIMARY KEY (`comment_id`),

 KEY `article_id` (`article_id`),

 KEY `comment_date` (`comment_date`),

 KEY `parent_comment_id` (`parent_comment_id`)

) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

CREATE TABLE `zj_labels` (

 `label_id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT '标签ID',

 `label_name` varchar(20) NOT NULL COMMENT '标签名称',

 `label_alias` varchar(15) NOT NULL COMMENT '标签别名',

 `label_description` text NOT NULL COMMENT '标签描述',

 PRIMARY KEY (`label_id`),

 KEY `label_name` (`label_name`),

 KEY `label_alias` (`label_alias`)

) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

CREATE TABLE `zj_set_artitle_label` (

 `article_id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT '文章ID',

 `label_id` bigint(20) NOT NULL,

 PRIMARY KEY (`article_id`),

 KEY `label_id` (`label_id`)

) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

CREATE TABLE `zj_set_artitle_sort` (

 `article_id` bigint(20) NOT NULL COMMENT '文章ID',

 `sort_id` bigint(20) NOT NULL COMMENT '分类ID',

 PRIMARY KEY (`article_id`,`sort_id`),

 KEY `sort_id` (`sort_id`)

) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `zj_sorts` (

 `sort_id` bigint(20) NOT NULL COMMENT '分类ID',

 `sort_name` varchar(50) NOT NULL COMMENT '分类名称',

 `sort_alias` varchar(15) NOT NULL COMMENT '分类别名',

 `sort_description` text NOT NULL COMMENT '分类描述',

 `parent_sort_id` bigint(20) NOT NULL COMMENT '父分类ID',

 PRIMARY KEY (`sort_id`),

 KEY `sort_name` (`sort_name`),

 KEY `sort_alias` (`sort_alias`)

) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `zj_user_friends` (

 `id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT '标识ID',

 `` bigint(20) NOT NULL COMMENT '用户ID',

 `user_friends_id` bigint(20) NOT NULL COMMENT '好友ID',

 `user_note` varchar(20) NOT NULL COMMENT '好友备注',

 `user_status` varchar(20) NOT NULL COMMENT '好友状态',

 PRIMARY KEY (`id`),

 KEY `` (``)

) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
