SET FOREIGN_KEY_CHECKS=0;

CREATE TABLE `th_ad_list` (
`adid`  int(11) UNSIGNED NOT NULL AUTO_INCREMENT ,
`title`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '�������' ,
`auid`  int(11) NOT NULL COMMENT '���λID' ,
`type`  tinyint(1) NOT NULL COMMENT '1ͼƬ|2html|3���½ǵ���|4ȫ��' ,
`body`  text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '����������' ,
`ga`  text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '�ȸ�gaͳ�ƴ���' ,
`time_date_limit`  char(21) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '���Ͷ�����ڣ�����2012-04-05-2012-04-20����char�����ʼ�ͽ��������á�|���ָ�' ,
`time_area_limit`  varchar(600) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '���Ͷ��ʱ����磬8:00-12��00��json��Ŷ��ʱ���' ,
`is_show`  tinyint(1) NOT NULL DEFAULT 0 ,
`weight`  int(10) NOT NULL DEFAULT 10 ,
PRIMARY KEY (`adid`)
)
ENGINE=MyISAM
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
ROW_FORMAT=Compact
;

CREATE TABLE `th_ad_unit` (
`id`  int(11) NOT NULL AUTO_INCREMENT ,
`title`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '���λ��' ,
`adesc`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'λ������' ,
`img`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '���λ�ý�ͼ' ,
`orders`  int(10) NOT NULL DEFAULT 0 COMMENT '����' ,
`system`  tinyint(1) NOT NULL DEFAULT 0 COMMENT '�Ƿ�ΪϵͳͶ��λ' ,
`is_show`  tinyint(1) NOT NULL DEFAULT 0 ,
PRIMARY KEY (`id`)
)
ENGINE=MyISAM
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
ROW_FORMAT=Compact
;

CREATE INDEX `top` ON `th_blog`(`top`) USING BTREE ;



CREATE TABLE `th_cache` (
`cachename`  varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`cachevalue`  text CHARACTER SET utf8 COLLATE utf8_general_ci NULL ,
PRIMARY KEY (`cachename`)
)
ENGINE=MyISAM
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
CHECKSUM=0
ROW_FORMAT=Dynamic
DELAY_KEY_WRITE=0
;

ALTER TABLE `th_catetags` MODIFY COLUMN `sort`  tinyint(10) UNSIGNED NOT NULL COMMENT '����' AFTER `catename`;

ALTER TABLE `th_catetags` MODIFY COLUMN `used`  int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '�ж��������������ǩ' AFTER `sort`;

CREATE TABLE `th_cpage_body` (
`cid`  int(10) UNSIGNED NOT NULL ,
`body`  text CHARACTER SET utf8 COLLATE utf8_general_ci NULL ,
PRIMARY KEY (`cid`)
)
ENGINE=MyISAM
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
CHECKSUM=0
ROW_FORMAT=Dynamic
DELAY_KEY_WRITE=0
;

CREATE TABLE `th_cpage_cate` (
`id`  int(11) NOT NULL AUTO_INCREMENT ,
`tags`  varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`title`  varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`keyword`  varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`description`  varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`orders`  int(10) UNSIGNED NOT NULL ,
PRIMARY KEY (`id`),
UNIQUE INDEX `tags` (`tags`) USING BTREE ,
INDEX `order` (`orders`) USING BTREE 
)
ENGINE=MyISAM
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
CHECKSUM=0
ROW_FORMAT=Dynamic
DELAY_KEY_WRITE=0
;

ALTER TABLE `th_feeds` ADD COLUMN `parentkey`  int(10) NOT NULL DEFAULT 0 AFTER `id`;

CREATE TABLE `th_findpwd` (
`uid`  int(10) NOT NULL ,
`token`  char(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`time`  int(10) NOT NULL ,
`mailsend`  int(10) NOT NULL COMMENT '�ϴη����ʼ�ʱ��' ,
PRIMARY KEY (`uid`)
)
ENGINE=MyISAM
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
CHECKSUM=0
ROW_FORMAT=Fixed
DELAY_KEY_WRITE=0
;

DROP INDEX `uid` ON `th_follow`;

CREATE UNIQUE INDEX `uid` ON `th_follow`(`uid`, `touid`) USING BTREE ;

CREATE TABLE `th_invite` (
`id`  int(10) UNSIGNED NOT NULL AUTO_INCREMENT ,
`uid`  int(10) NOT NULL COMMENT '�û�ID' ,
`inviteCode`  char(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '������' ,
`exptime`  int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '���������ʱ��' ,
PRIMARY KEY (`id`),
INDEX `inviteCode` (`inviteCode`) USING BTREE 
)
ENGINE=MyISAM
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
CHECKSUM=0
ROW_FORMAT=Fixed
DELAY_KEY_WRITE=0
;

CREATE TABLE `th_invite_friend` (
`uid`  int(10) NOT NULL ,
`touid`  int(10) NOT NULL ,
PRIMARY KEY (`touid`)
)
ENGINE=MyISAM
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
CHECKSUM=0
ROW_FORMAT=Fixed
DELAY_KEY_WRITE=0
;



ALTER TABLE `th_member` MODIFY COLUMN `blogtag`  varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL AFTER `local`;

ALTER TABLE `th_member` MODIFY COLUMN `sign`  varchar(140) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL AFTER `blogtag`;

CREATE TABLE `th_models` (
`id`  int(10) NOT NULL AUTO_INCREMENT ,
`icon`  varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'ͼ�����ʽ��ʾ��' ,
`name`  varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`modelfile`  char(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`status`  tinyint(1) NOT NULL ,
`mdesc`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`version`  varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`author`  varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT 'SYSTEM' ,
`feedtpl`  text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`cfg`  text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'conf' ,
PRIMARY KEY (`id`)
)
ENGINE=MyISAM
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
CHECKSUM=0
ROW_FORMAT=Dynamic
DELAY_KEY_WRITE=0
;

CREATE UNIQUE INDEX `tagid` ON `th_mytags`(`tagid`) USING BTREE ;

CREATE INDEX `uid` ON `th_mytags`(`uid`) USING BTREE ;

ALTER TABLE `th_mytags` ENGINE=MyISAM,
ROW_FORMAT=Compact;

CREATE INDEX `foruid` ON `th_notice`(`foruid`, `isread`) USING BTREE ;

CREATE TABLE `th_pm` (
`id`  mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT ,
`uid`  int(10) UNSIGNED NOT NULL DEFAULT 0 ,
`touid`  int(10) NOT NULL ,
`isnew`  tinyint(1) UNSIGNED NOT NULL DEFAULT 0 ,
`num`  int(10) UNSIGNED NOT NULL DEFAULT 0 ,
`info`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`status`  int(10) NULL DEFAULT 0 COMMENT 'ɾ�����' ,
`time`  int(10) UNSIGNED NOT NULL DEFAULT 0 ,
PRIMARY KEY (`id`),
INDEX `isnew` (`isnew`, `uid`) USING BTREE ,
INDEX `pminfo` (`uid`, `touid`) USING BTREE 
)
ENGINE=MyISAM
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
CHECKSUM=0
ROW_FORMAT=Dynamic
DELAY_KEY_WRITE=0
;

ALTER TABLE `th_recommend` MODIFY COLUMN `open`  tinyint(1) NOT NULL DEFAULT 0 COMMENT '�Ƿ�����' AFTER `id`;

ALTER TABLE `th_recommend` MODIFY COLUMN `bid`  int(10) NOT NULL COMMENT '�Ƽ�������' AFTER `open`;

ALTER TABLE `th_recommend` MODIFY COLUMN `tuiuid`  int(10) NOT NULL DEFAULT 0 COMMENT '�Ƽ�����' AFTER `cid`;

ALTER TABLE `th_recommend` MODIFY COLUMN `uid`  int(10) NOT NULL COMMENT '�Ƽ���' AFTER `tuiuid`;

ALTER TABLE `th_recommend` MODIFY COLUMN `desc`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '�Ƽ�����' AFTER `uid`;

ALTER TABLE `th_recommend` MODIFY COLUMN `num`  int(10) NOT NULL COMMENT '���Ƽ�����' AFTER `desc`;

ALTER TABLE `th_setting` MODIFY COLUMN `val`  text CHARACTER SET utf8 COLLATE utf8_general_ci NULL AFTER `name`;

ALTER TABLE `th_skins` ADD COLUMN `uri`  varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '������ҳ' AFTER `author`;

ALTER TABLE `th_skins` MODIFY COLUMN `usenumber`  int(10) NULL DEFAULT 0 COMMENT '��������' AFTER `exclusive`;

ALTER TABLE `th_skins` ADD COLUMN `setup`  text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '���⹳��' AFTER `usenumber`;

ALTER TABLE `th_tags` ADD COLUMN `bid`  int(10) UNSIGNED NOT NULL AFTER `title`;

ALTER TABLE `th_tags` DROP COLUMN `num`;

ALTER TABLE `th_tags` DROP COLUMN `time`;

ALTER TABLE `th_tags` DROP COLUMN `updates`;

CREATE INDEX `bid` ON `th_tags`(`bid`) USING BTREE ;



CREATE TABLE `th_tags_blog` (
`tagid`  int(10) NOT NULL ,
`uid`  int(10) NOT NULL ,
INDEX `tagid` (`tagid`) USING BTREE ,
INDEX `uid` (`uid`) USING BTREE 
)
ENGINE=MyISAM
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
CHECKSUM=0
ROW_FORMAT=Fixed
DELAY_KEY_WRITE=0
;

ALTER TABLE `th_theme` ADD COLUMN `config`  text CHARACTER SET utf8 COLLATE utf8_general_ci NULL AFTER `uid`;

ALTER TABLE `th_theme` MODIFY COLUMN `setup`  text CHARACTER SET utf8 COLLATE utf8_general_ci NULL AFTER `config`;

DROP TRIGGER `delblog`;

CREATE DEFINER=`root`@`localhost` TRIGGER `del_mytags` AFTER DELETE ON `th_tags`
FOR EACH ROW delete from th_mytags where tagid =old.tid;


CREATE DEFINER=`root`@`localhost` TRIGGER `deltags` AFTER DELETE ON `th_blog`
FOR EACH ROW BEGIN
delete from th_tags where bid =old.bid;
delete from th_replay where bid =old.bid;
delete from th_likes where bid =old.bid;
END;


CREATE TABLE IF NOT EXISTS `th_tags_blog` (
  `tagid` int(10) NOT NULL ,
  `uid` int(10) NOT NULL ,
  KEY `tagid` (`tagid`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='����ĳ�����õ�blogid ���tagid';


INSERT INTO `th_models` (`id`, `icon`, `name`, `modelfile`, `status`, `mdesc`, `version`, `author`, `feedtpl`, `cfg`) VALUES
(1, 'text', '����', 'word.class.php', 1, '��������', '1.0', 'SYSTEM', '', 'imguplod--1--�Ƿ���ͼƬ�ϴ�\nimguploadsize--2048--ͼƬ�ϴ��ߴ粻����ȡȫ��\nimagetype--jpg|jpge|png|gif--ͼƬ�ϴ�����'),
(2, 'music', '����', 'music.class.php', 1, '��������', '1.0', 'SYSTEM', '', 'enableurl--1--�Ƿ������õ�ַ����\r\nenableupload--1--�Ƿ����ϴ�����\r\nuploadsize--3000--��������С(KB)\r\nuploadtype--mp3|wma|mid|midi--�����ϴ�������'),
(4, 'video', '��Ƶ', 'video.class.php', 1, '������Ƶ', '1.0', 'SYSTEM', '', ''),
(3, 'photo', 'ͼƬ', 'photo.class.php', 1, '����ͼƬ', '1.0', 'SYSTEM', '', 'imagetype--jpg|jpge|png|gif--�ϴ�����\nimagesize--20480--�ϴ���С\nimagecount--20--ÿ������ϴ�����'),
;

ALTER TABLE `th_tags` ADD `bid` INT( 10 ) NOT NULL AFTER `tid` ;



INSERT INTO `th_cpage_cate` (`id`, `tags`, `title`, `keyword`, `description`, `orders`) VALUES
(3, 'call', '��ϵ����', '', '', 3),
(2, 'help', 'ʹ�ð���', '', '', 2),
(1, 'about', '��������', '��������', '��������', 1),
(4, 'service', '��������', '', '', 4),
(5, 'privacy', '��˽����', '', '', 5);


INSERT INTO `th_cpage_body` (`cid`, `body`) VALUES
(1, ' <h3>�����ǡ����Ʊ���</h3> <p>�Ʊ����ǹ����׸����ȿ�Դ���Ჩ��ϵͳ�������¿��������²��ԣ�����������������Ϊ�û��ṩ����õ��Ჩ��ƽ̨��</p> <p>�Ʊ�����һ��ȫ�µġ����������ֻ����&ldquo;���������ݷ����ʹ���&rdquo;���Ჩ��������</p> <p>�Ჩ���ǽ��ڲ�����΢��֮���һ��������񣬲����������ڱ��ģ�΢������������罻�ʹ������Ჩ������˫�������ơ�</p> <p>���˵΢����һ�ݱ�ֽ��������һ���飬��ô�Ჩ�������һ����־����Ȼ��ֻ�Ǵ����ݲ����һ�����������</p> <p>�Ȳ�ͬ��΢��Ҳ��ͬ�ڲ��ͣ�������һ��ȫ�µ�����ý�塣</p> <h3>�Ʊ�����������ϲ�����ֵ����ѣ�������</h3> <p>ϲ����������ϲ���ģ�����ϲ����������ϲ��д������ϲ���������������֣����Ǻ��� �ȵ�... �Ʊ�����������ѵĴ����ͽ���ƽ̨����Ϊ������ֻ��ע���֡�</p> <p>��ӭ��λ־ͬ���ϵ����ѣ����Ʊ����������Լ�����Ʒ��Ҳ��ӭ��λרҵ���ѵĵ�����ָ����������������ΪĿ�꣬�����ø���ϲ�����ֵ��ˣ���ȡ���ྫ�ʵ�����ΪĿ�����ͬŬ����</p> <p>������һ��ΰ����������Ʊ����ĳ�������ϣ������������������Ϊ��չʾ��</p> <h3>��ת�Ʊ�</h3> <p>���Ĳ��������û��򵥿��ٵط������֡�ͼƬ�����֡���Ƶ��������ȫ�����ݺ���Ȥ����ģʽ�����Ʊ�����Ϊһ��ȫ�µġ�����������&ldquo;���������ݷ����ʹ���&rdquo;���Ჩ��������</p> <p>������еĶ�Ԫ��Ԫ��,����ֱ�����ϴ��������Ჩ����ֱ�Ӳ���Ϻ�ס���ȼ�����֣����ҷ���������ֻ���ĸ���</p> <p>������Ϊ����,����ȤΪ���⣬���ɿ��ֵĲ���͹�ͨ�������ҵ������뿴�������ݡ������ʶ�����ѡ�һ�ж�������İ��ã���ÿ�춼�ڷ�����Ȥ����Ȥ�жȹ���</p> <h3>����ʹ��</h3> <p>��ȻĿǰ�ǲ��԰汾,��������������ʹ�á��������룬����ע�ᡣѸ�ټ������ִ��ͥ�С�</p> <p>�Ʊ���ʹ����html5��css3��һЩ������,�����ʹ�÷�IE����������ø����Ѻõ�Ч����</p> '),
(2, ' <h3>��������</h3> <p>��½�����Ҳ� �������ӣ����ɽ��뷢�����ֹ��ܡ����������ݣ����ɲ��뵥��ͼƬ</p> <h3>��������</h3> <p>��½�����Ҳ� ���֣����ɽ��뷢�����ֹ��ܡ�������ѡ���������� �� �����ϴ����ַ�ʽ��</p> <p>�����������õ�ַ��������Ϻ�ס���ȼ���֡�����̨���ſᡢ������6�䷿����Ѷ���͡����˲��͡�56.com�������վ���ŵ�ַ�� Ҳ����ֱ��ճ�������׺Ϊmp3�ĸ�����</p> <p>�����ϴ��������ϴ����ص�MP3�ļ�������ע���������Ҫӵ�и�ý�������Ȩ��Ҳ����˵���Լ�¼�������������ֽԿɣ��������ϴ������ϲ��������İ�Ȩ�����֡�����������ٱ����Ȩ�������ǽ������κ����Σ�����ɾ����ý����Դ��</p> <h3>����ͼƬ</h3> <p>������ͬʱ�ϴ����20����Ƭ��Ϊ�������ݣ�����Ҳ���Ա�д���ܡ�</p> <h3>������Ƶ</h3> <p>��Ƶ���õ�ַ��������Ϻ�ס���ȼ���֡�����̨���ſᡢ������6�䷿����Ѷ���͡����˲��͡�56.com�������վ���ŵ�ַ�����������Խ�¼�ƺõ���Ƶ��������ý��Ȼ����д���õ�ַ��</p> <p>ͬʱ��Ҳ���Ա�д����</p> <h3>���ڱ�ǩ</h3> <p>���ܷ����κ�����������Ҫ��д����һ����ǩ���Ჩ���ݽ����ݱ�ǩ���������֡������дһ���������ʵı�ǩ�Ƿǳ������ѡ��</p> <h3>��ע��ϲ��</h3> <p>��Ϊ��ע���û�������������ҳ��ʾ���·�����̬</p> <p>��Ϊϲ���Ĳ��Ϳɷ��������Ҳർ���п��ٵĲ���</p> '),
(3, '<h3>�ٷ���վ</h3> <p>http://qing.thinksaas.cn</p> <h3>����</h3> <p>nxfte<span id="ats"></span>qq.com</p> <h3>����Ⱥ</h3> <p>qq group 176221558</p> <h3>��ҵ��Ȩ</h3> <p>QQ��234027573</p> <h3>�����ַ</h3> <p><a href="https://me.alipay.com/anythink" target="_blank">https://me.alipay.com/anythink</a></p> '),
(4, '<p>��Э���������Ʊ����������Ʊ���ƽ̨��ʹ���Ʊ���ƽ̨�Լ�����������ĸ����������������֮ǰ��������ͬ����ܱ�Э�顣�������ܱ�Э�飬�����޷�ʹ���Ʊ���ƽ̨����ط���</p> <p>������ͨ�����·�ʽ���ܱ�Э�飺һ����ע���Ʊ��˻����ҷ�����һ����Ϣ�������Ʊ���ƽ̨��������ط����ʹ�ý�����Ϊ����ʵ�� ʹ���������˱�Э���ȫ����������Ҫע���û��뷢��ע�������ʼ������ǽ�ɾ�������йص�ȫ�����ݣ������Ʊ������з��񶼽�����ֹ��ע���˻���Ҫ�û� ���˵����ʼ���Ϊע���˺ţ�����û�ʹ�������ʼ��˺�ע�Ტ���ʼ������˾�֤�ɹ��߽�ɾ���û��˺ż��������ݣ�����һ�з����������ге�����վ���е��κ� ���Ρ�</p> <p>�Ʊ�������ƽ̨������Ȩ����ӪȨ���Ʊ������У���������ʱ���ƽ̨�ṩ����Ϣ�ͷ����Ȩ�����Ʊ������ṩ�������Ϣ�ͷ����ʹ���ߣ����¼��&ldquo;�û�&rdquo;����ʹ��֮ǰ����ͬ�����µ��������</p> <p>�û����Ʊ���ƽ̨�Ϸ�������Ϣ�������û����Ʊ�����ͬ���У��κ�������֯�����δ���û�������Ȩͬ�⣬���ø��ơ�ת�ء��ø������ݡ��û��������Ʊ���ƽ̨������ɢ���κ���ʽ�ĺ����������ݵ���Ϣ��<br> 1��Ϊ��ط��ɷ�������ֹ��<br> 2���������ṫ��������������ף�<br> 3�������˺Ϸ�Ȩ�棻<br> 4�������Ʊ��� ��Ϊ���ʵ��ڱ�ƽ̨���������ݡ� <br> 5��ͨ���������ֵ��ϴ������ϴ����û�����ӵ�а�Ȩ����Ƶý�塣 <br> �Ʊ�������ɾ���ͱ�����������Ϣ��Ȩ����</p> <p>�û�Ӧ��֤���Ʊ���ƽ̨��ע����Ϣ����ʵ��׼ȷ���������������ϱ��ʱ��ʱ���������Ϣ�������κ���Ϣ��ʵ�����µ��û����˻�������𺦣��Ʊ������е��κ����Ρ��û�Ӧ���Ʊ��ܸ���ע����Ϣ����¼��������ϣ��û���������ע���û������е����л���¼����������Ρ�</p> <p>�Ʊ����ǳ�ǿ�������û�����˽���Ʊ�����������Ϊ�û��ṩ��ɿ�����˽������ʩ��δ���û����ر���Ȩ���Ʊ������Ὣ�û���Ϣ������͸¶���κε��� �����˻�����������������γ��⣺<br> 1) ����˾�����ء��������ŵ�ǿ�������ṩ�漰�û���Ϣ��������ϣ� <br> 2) ���ɿ����벻�ɿ����ص��µ���Ϣ��й��<br> 3) �Ʊ�����������ĺϷ�άȨ��Ҫ��ʹ���û��������Ϣ��</p> <p>�û�ͬ��ʹ���Ʊ���ƽ̨������Ǳ�ڵķ��ռ���һ�п��ܵĺ������ȫ���Լ��е����Ʊ�������Щ���ܵķ��պͺ�����е��κ����Ρ�</p> <p>�Ʊ�������֤�Ʊ���ƽ̨�ṩ�ķ����ܹ������û�������Ҫ��Ҳ����֤�Ѵ��ڵķ��񲻻��жϣ�����Щ����ļ�ʱ�ԡ���ȫ �ԡ�׼ȷ��Ҳ������֤��������ϵͳά������������Ҫ������ͣ�����������Σ��Ʊ������Ӿ������ξ�������������Ҫҳ�淢��֪ͨ��ͬʱ���Ʊ��������ڲ����� ֪ͨ�û���������жϻ���ֹ���ֻ�ȫ�������Ȩ���������������жϻ���ֹ����ɵ��û�����������κ���ʧ���Ʊ������е��κ����Ρ�</p> <p>�û�ͬ�����غ�ά���Ʊ���ƽ̨�Լ������û��ĺϷ�Ȩ�档�û���Υ���йط��ɡ������Э��涨�е��κ���������Ʊ������κε�������ɵ���ʧ���û�ͬ��е��ɴ���ɵ�һ�����⳥���Ρ�</p> <p>�����÷�������ķ�Χ�ڣ��Ʊ��������Ա�Э���κ�����Ľ���Ȩ����ʱ�����Ȩ���� �Ʊ������ܻ���ʱ������Ҫ�޸ı�Э�����һ����緢�����������Ʊ������ṩ�°汾������û��ڱ������Ʊ���ƽ̨�����ʹ�ý���Ϊ����ȫ���ܱ��������</p> <p>��Э���ڸ��������涨��ֹǰ������һֱ���á��������������ʱ���Ʊ���������ʱ��ֹ���û���Э�飺<br> 1) �û�Υ���˱�Э���е��κι涨��<br> 2) ���ɷ���Ҫ����ֹ��Э��;<br> 3) �Ʊ�����Ϊʵ�����β������˼���ִ�б�Э�顣</p> <p>��Э�鼰��Э�������һ�з��ɹ�ϵ�����ף��������л����񹲺͹����ɡ��û����Ʊ����ڴ�ͬ�����Ʊ���Ӫҵ���ڵط�Ժ��Ͻ��</p> '),
(5, ' <h3>��˽����</h3> <p>������ʹ�����ǵķ���ʱ�����ǽ�������Ϊ���ṩ��ɿ�����˽������ʩ��δ���û����ر���Ȩ�����ǳ�ŵ���Ὣ�û���Ϣ ������͸¶���κε��������˻�����������������γ��⣺<br> 1) ����˾�����ء��������ŵ�ǿ�������ṩ�漰�û���Ϣ��������ϣ�<br> 2) ���ɿ����벻�ɿ����ص��µ���Ϣ��й�� <br> 3) �Ʊ�����������ĺϷ�άȨ��Ҫ��ʹ���û��������Ϣ��</p> <p>Ϊ�˸��õ������Ʊ����ķ��������ͽ��и���׼���������ݷ��������ǽ��ڳ�ֱ����û�������˽��ǰ���£����û����ݿ���з����ʹ���������ص����ݷ�����������������м�ֵ���²�Ʒ���з����û�����Ľ�һ���Ľ���</p> <h3>��������</h3> <p>�Ʊ�������ƽ̨������Ȩ����ӪȨ���Ʊ������У���������ʱ���ƽ̨�ṩ����Ϣ�ͷ����Ȩ�����Ʊ������ṩ�������Ϣ�ͷ����ʹ���ߣ����¼��&ldquo;�û�&rdquo;����ʹ��֮ǰ����ͬ�����µ��������</p> <p>�û����Ʊ���ƽ̨�Ϸ�������Ϣ�������û����Ʊ�����ͬ���У��κ�������֯�����δ���û�������Ȩͬ�⣬���ø��ơ�ת�ء� �ø������ݡ��û������ڵ� ����ƽ̨������ɢ���κ���ʽ�ĺ����������ݵ���Ϣ��1��Ϊ��ط��ɷ�������ֹ��2���������ṫ��������������ף�3�������˺Ϸ�Ȩ�棻4�������Ʊ��� ��Ϊ���ʵ��ڱ�ƽ̨���������ݡ� �Ʊ�������ɾ���ͱ�����������Ϣ��Ȩ����</p> <p>�û�Ӧ��֤���Ʊ���ƽ̨��ע����Ϣ����ʵ��׼ȷ���������������ϱ��ʱ��ʱ���������Ϣ�������κ���Ϣ��ʵ�����µ��û����˻�������𺦣��Ʊ������е��κ����Ρ��û�Ӧ���Ʊ��ܸ���ע����Ϣ����¼��������ϣ��û���������ע���û������е����л���¼����������Ρ�</p> <p>�Ʊ����ǳ�ǿ�������û�����˽���Ʊ�����������Ϊ�û��ṩ��ɿ�����˽������ʩ��δ���û����ر���Ȩ���Ʊ������Ὣ�û� ��Ϣ������͸¶���κε��� �����˻�����������������γ��⣺1) ����˾�����ء��������ŵ�ǿ�������ṩ�漰�û���Ϣ��������ϣ� 2) ���ɿ����벻�ɿ����ص��µ���Ϣ��й�� 3) �Ʊ�����������ĺϷ�άȨ��Ҫ��ʹ���û��������Ϣ��</p> <p>�û�ͬ��ʹ���Ʊ���ƽ̨������Ǳ�ڵķ��ռ���һ�п��ܵĺ������ȫ���Լ��е����Ʊ�������Щ���ܵķ��պͺ�����е��κ����Ρ�</p> <p>�Ʊ�������֤�Ʊ���ƽ̨�ṩ�ķ����ܹ������û�������Ҫ��Ҳ����֤�Ѵ��ڵķ��񲻻��жϣ�����Щ����ļ�ʱ�ԡ���ȫ �ԡ�׼ȷ��Ҳ������֤������ ��ϵͳά������������Ҫ������ͣ�����������Σ��Ʊ������Ӿ������ξ�������������Ҫҳ�淢��֪ͨ��ͬʱ���Ʊ��������ڲ�����֪ͨ�û���������жϻ���ֹ ���ֻ�ȫ�������Ȩ���������������жϻ���ֹ����ɵ��û�����������κ���ʧ���Ʊ������е��κ����Ρ�</p> <p>�û�ͬ�����غ�ά���Ʊ���ƽ̨�Լ������û��ĺϷ�Ȩ�档�û���Υ���йط��ɡ������Э��涨�е��κ���������Ʊ������κε�������ɵ���ʧ���û�ͬ��е��ɴ���ɵ�һ�����⳥���Ρ�</p> <p>�����÷�������ķ�Χ�ڣ��Ʊ��������Ա�Э���κ�����Ľ���Ȩ����ʱ�����Ȩ���� �Ʊ������ܻ���ʱ������Ҫ�޸ı�Э�����һ����緢�����������Ʊ������ṩ�°汾������û��ڱ������Ʊ���ƽ̨�����ʹ�ý���Ϊ����ȫ���ܱ��������</p> <p>��Э���ڸ��������涨��ֹǰ������һֱ���á��������������ʱ���Ʊ���������ʱ��ֹ���û���Э�飺1) �û�Υ���˱�Э���е��κι涨��2) ���ɷ���Ҫ����ֹ��Э��;3) �Ʊ�����Ϊʵ�����β������˼���ִ�б�Э�顣</p> <p>��Э�鼰��Э�������һ�з��ɹ�ϵ�����ף��������л����񹲺͹����ɡ��û����Ʊ����ڴ�ͬ�����Ʊ���Ӫҵ���ڵط�Ժ��Ͻ��</p> ');

ALTER TABLE `th_blog` CHANGE `title` `title` CHAR( 50 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL 

SET FOREIGN_KEY_CHECKS=1;
