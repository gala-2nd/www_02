-- set names utf8;
CREATE TABLE `t_test_m` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(20) DEFAULT NULL COMMENT '问卷编码',
  `title` varchar(50) DEFAULT NULL COMMENT '问卷标题',
  `sub_title` varchar(50) DEFAULT NULL COMMENT '副标题',
  `sub_cn` varchar(30) DEFAULT NULL COMMENT '简称中文',
  `sub_en` varchar(30) DEFAULT NULL COMMENT '简称英文',
  `direction` longtext COMMENT '问卷说明',
  `thkMsg` text DEFAULT NULL COMMENT '结束感谢语言',
  `testminute` int(11) DEFAULT NULL COMMENT '测试总时长' ,
  `ctime` datetime DEFAULT NULL COMMENT '添加时间',
  `startTime` datetime DEFAULT NULL COMMENT '开始时间',
  `endTime` datetime DEFAULT NULL,
  `editor` varchar(30) DEFAULT NULL COMMENT '添加人',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=gb2312;

CREATE TABLE `t_test_q` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(50) DEFAULT NULL COMMENT '问题编号',
  `qnum` varchar(100) NOT NULL COMMENT '题号',
  `title` varchar(100) NOT NULL COMMENT '测试标题',
  `direction` varchar(200) DEFAULT NULL COMMENT '描述',
  `m_code` varchar(50) DEFAULT NULL COMMENT '评测主表ID',
  `qtype` int(11) DEFAULT '1' COMMENT '该问题题型，1表示单选，9表示多选，0表示填空',
  `ctime` datetime DEFAULT NULL COMMENT '创建时间',
  `order` int(11) DEFAULT NULL COMMENT '排序号',
  `isdel` int(11) DEFAULT '0' COMMENT '是否删除 0否，1删除',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=gb2312;

CREATE TABLE `t_test_a` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '选项ID',
  `q_code` varchar(50) NOT NULL COMMENT '问题Code',
  `direction` varchar(200) DEFAULT NULL COMMENT '选项描述',
  `score` int(11) DEFAULT NULL COMMENT '得分，用于计算',
  `iscorrect` int(11) DEFAULT '0' COMMENT '是否为正确的选项，0表示该回答无准答案，-1表示错误，1表示正确',
  `order` int(11) DEFAULT NULL COMMENT '排序',
  `isdel` int(11) DEFAULT NULL COMMENT '是否删除，0否，1是',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=gb2312;
CREATE TABLE `t_test_r` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(50) DEFAULT NULL COMMENT '评测用户ID',
  `username` varchar(50) DEFAULT NULL COMMENT '用户名',
  `orgname` varchar(100) DEFAULT NULL COMMENT '所属组织',
  `mcode` varchar(50) DEFAULT NULL COMMENT '测试主表Code',
  `source` varchar(30) DEFAULT NULL COMMENT '评测来源：如小程序、官网、线下二维码',
  `result` text COMMENT '评测结果',
  `startTime` datetime DEFAULT NULL COMMENT '测试开始时间',
  `endTime` datetime DEFAULT NULL COMMENT '测试结束时间',
  `costTime` int(11) DEFAULT NULL COMMENT '耗时，单位秒。（注意耗时≠结束时间-开始时间）',
  `reportUrl` varchar(300) DEFAULT NULL COMMENT '评测报告地址：报告生成的地址， 或则预留好的文件地址',
  `reportText` text COMMENT '报告内容',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=gb2312;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,

 `user_id` bigint(20) NOT NULL  COMMENT '用户ID',

 `user_ip` varchar(20) DEFAULT NULL COMMENT '用户IP',

 `user_name` varchar(20) NOT NULL COMMENT '用户名',

 `user_password` varchar(15) NOT NULL COMMENT '用户密码',

 `user_email` varchar(30) NOT NULL COMMENT '用户邮箱',

 `user_profile_photo` varchar(255) DEFAULT NULL COMMENT '用户头像',

 `user_registration_time` datetime DEFAULT NULL COMMENT '注册时间',

 `user_birthday` date DEFAULT NULL COMMENT '用户生日',

 `user_age` tinyint(4) DEFAULT NULL COMMENT '用户年龄',

 `user_telephone_number` int(11) DEFAULT NULL COMMENT '用户手机号',

 `user_nickname` varchar(20) NOT NULL COMMENT '用户昵称',

 PRIMARY KEY (`id`),
 KEY `user_id` (`user_id`),

 KEY `user_name` (`user_name`),

 KEY `user_nickname` (`user_nickname`),

 KEY `user_email` (`user_email`),

 KEY `user_telephone_number` (`user_telephone_number`)

) ENGINE=InnoDB DEFAULT CHARSET=gb2312;



