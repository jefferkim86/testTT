
CREATE TABLE `th_recommend` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `open` tinyint(1) NULL DEFAULT '0' COMMENT '�Ƿ�����',
  `bid` int(10) NULL DEFAULT '0' COMMENT '�Ƽ�������',
  `cid` int(10) NULL DEFAULT '0',
  `tuiuid` int(10) NULL DEFAULT '0' COMMENT '�Ƽ�����',
  `uid` int(10) NOT NULL COMMENT '�Ƽ���',
  `desc` varchar(255) NULL DEFAULT NULL NULL COMMENT '�Ƽ�����',
  `num` int(10) NULL DEFAULT '0' COMMENT '���Ƽ�����',
  `time` int(10) NOT NULL,
  PRIMARY KEY (`id`)
);