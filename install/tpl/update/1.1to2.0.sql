SET FOREIGN_KEY_CHECKS=0;

CREATE TABLE `th_ad_list` (
`adid`  int(11) UNSIGNED NOT NULL AUTO_INCREMENT ,
`title`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '广告名称' ,
`auid`  int(11) NOT NULL COMMENT '广告位ID' ,
`type`  tinyint(1) NOT NULL COMMENT '1图片|2html|3右下角弹出|4全屏' ,
`body`  text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '广告具体内容' ,
`ga`  text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '谷歌ga统计代码' ,
`time_date_limit`  char(21) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '广告投放日期：例如2012-04-05-2012-04-20，用char存放起始和结束日期用“|”分隔' ,
`time_area_limit`  varchar(600) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '广告投放时间段如，8:00-12：00用json存放多个时间段' ,
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
`title`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '广告位置' ,
`adesc`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '位置描述' ,
`img`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '广告位置截图' ,
`orders`  int(10) NOT NULL DEFAULT 0 COMMENT '排序' ,
`system`  tinyint(1) NOT NULL DEFAULT 0 COMMENT '是否为系统投放位' ,
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

ALTER TABLE `th_catetags` MODIFY COLUMN `sort`  tinyint(10) UNSIGNED NOT NULL COMMENT '排序' AFTER `catename`;

ALTER TABLE `th_catetags` MODIFY COLUMN `used`  int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '有多少人用了这个标签' AFTER `sort`;

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
`mailsend`  int(10) NOT NULL COMMENT '上次发送邮件时间' ,
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
`uid`  int(10) NOT NULL COMMENT '用户ID' ,
`inviteCode`  char(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '邀请码' ,
`exptime`  int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '邀请码过期时间' ,
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
`icon`  varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '图标或样式标示符' ,
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
`status`  int(10) NULL DEFAULT 0 COMMENT '删除标记' ,
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

ALTER TABLE `th_recommend` MODIFY COLUMN `open`  tinyint(1) NOT NULL DEFAULT 0 COMMENT '是否启用' AFTER `id`;

ALTER TABLE `th_recommend` MODIFY COLUMN `bid`  int(10) NOT NULL COMMENT '推荐的内容' AFTER `open`;

ALTER TABLE `th_recommend` MODIFY COLUMN `tuiuid`  int(10) NOT NULL DEFAULT 0 COMMENT '推荐的人' AFTER `cid`;

ALTER TABLE `th_recommend` MODIFY COLUMN `uid`  int(10) NOT NULL COMMENT '推荐人' AFTER `tuiuid`;

ALTER TABLE `th_recommend` MODIFY COLUMN `desc`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '推荐描述' AFTER `uid`;

ALTER TABLE `th_recommend` MODIFY COLUMN `num`  int(10) NOT NULL COMMENT '被推荐次数' AFTER `desc`;

ALTER TABLE `th_setting` MODIFY COLUMN `val`  text CHARACTER SET utf8 COLLATE utf8_general_ci NULL AFTER `name`;

ALTER TABLE `th_skins` ADD COLUMN `uri`  varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '主题主页' AFTER `author`;

ALTER TABLE `th_skins` MODIFY COLUMN `usenumber`  int(10) NULL DEFAULT 0 COMMENT '多少人用' AFTER `exclusive`;

ALTER TABLE `th_skins` ADD COLUMN `setup`  text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '主题钩子' AFTER `usenumber`;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='根据某人设置的blogid 获得tagid';


INSERT INTO `th_models` (`id`, `icon`, `name`, `modelfile`, `status`, `mdesc`, `version`, `author`, `feedtpl`, `cfg`) VALUES
(1, 'text', '文字', 'word.class.php', 1, '发布文字', '1.0', 'SYSTEM', '', 'imguplod--1--是否开启图片上传\nimguploadsize--2048--图片上传尺寸不设置取全局\nimagetype--jpg|jpge|png|gif--图片上传类型'),
(2, 'music', '音乐', 'music.class.php', 1, '发布音乐', '1.0', 'SYSTEM', '', 'enableurl--1--是否开启引用地址发布\r\nenableupload--1--是否开启上传发布\r\nuploadsize--3000--允许长传大小(KB)\r\nuploadtype--mp3|wma|mid|midi--允许上传的类型'),
(4, 'video', '视频', 'video.class.php', 1, '发布视频', '1.0', 'SYSTEM', '', ''),
(3, 'photo', '图片', 'photo.class.php', 1, '发布图片', '1.0', 'SYSTEM', '', 'imagetype--jpg|jpge|png|gif--上传类型\nimagesize--20480--上传大小\nimagecount--20--每次最大上传数量'),
;

ALTER TABLE `th_tags` ADD `bid` INT( 10 ) NOT NULL AFTER `tid` ;



INSERT INTO `th_cpage_cate` (`id`, `tags`, `title`, `keyword`, `description`, `orders`) VALUES
(3, 'call', '联系我们', '', '', 3),
(2, 'help', '使用帮助', '', '', 2),
(1, 'about', '关于我们', '关于我们', '关于我们', 1),
(4, 'service', '服务条款', '', '', 4),
(5, 'privacy', '隐私政策', '', '', 5);


INSERT INTO `th_cpage_body` (`cid`, `body`) VALUES
(1, ' <h3>我们是——云边网</h3> <p>云边网是国内首个率先开源的轻博客系统，从六月开发，八月测试，九月上线以来。将为用户提供最好用的轻博客平台。</p> <p>云边网是一个全新的、倾向于音乐话题的&ldquo;高质量内容发布和传播&rdquo;的轻博客社区。</p> <p>轻博客是介于博客与微博之间的一种网络服务，博客是倾向于表达的，微博则更倾向于社交和传播，轻博客吸收双方的优势。</p> <p>如果说微博是一份报纸，博客是一本书，那么轻博客则更像一本杂志，当然这只是从内容层面的一种形象比喻。</p> <p>既不同于微博也不同于博客，我们是一种全新的网络媒体。</p> <h3>云边网面向所有喜欢音乐的朋友，无论您</h3> <p>喜欢听，或是喜欢聊，或是喜欢唱，或是喜欢写，或是喜欢创作，或是乐手，或是后期 等等... 云边网正是您最佳的传播和交流平台。因为，我们只关注音乐。</p> <p>欢迎各位志同道合的朋友，到云边网来发布自己的作品，也欢迎各位专业朋友的点评与指导，让我们以音乐为目标，向着让更多喜欢音乐的人，获取更多精彩的内容为目标而共同努力。</p> <p>音乐是一种伟大的艺术，云边网的初衷正是希望将这种艺术升华，为您展示。</p> <h3>玩转云边</h3> <p>简洁的操作，让用户简单快速地发布文字、图片、音乐、视频，采用完全的内容和兴趣导航模式，让云边网成为一个全新的、真正致力于&ldquo;高质量内容发布和传播&rdquo;的轻博客社区。</p> <p>更多独有的多元化元素,可以直接上上传音乐至轻博，可直接插入虾米、雅燃等音乐，与大家分享你的音乐或你的感悟。</p> <p>以音乐为主线,以兴趣为话题，轻松快乐的参与和沟通，帮你找到你最想看到的内容、最想结识的朋友。一切都基于你的爱好，让每天都在发现兴趣的乐趣中度过。</p> <h3>立即使用</h3> <p>虽然目前是测试版本,但是您可以立即使用。无需邀请，秒速注册。迅速加入音乐大家庭中。</p> <p>云边网使用了html5和css3的一些新特性,如果您使用非IE浏览器将会获得更加友好的效果。</p> '),
(2, ' <h3>发布内容</h3> <p>登陆后点击右侧 文字链接，即可进入发布文字功能。可输入内容，并可插入单张图片</p> <h3>发布音乐</h3> <p>登陆后点击右侧 音乐，即可进入发布音乐功能。您可以选择网络音乐 和 本地上传两种方式。</p> <p>网络音乐引用地址可以输入虾米、雅燃音乐、音悦台、优酷、土豆、6间房、腾讯播客、新浪博客、56.com等诸多网站播放地址。 也可以直接粘贴网络后缀为mp3的歌曲。</p> <p>本地上传您可以上传本地的MP3文件，但请注意的是您需要拥有该媒体的著作权，也就是说您自己录或者制作的音乐皆可，但不能上传网络上不属于您的版权的音乐。如果被查出或举报或版权纠纷我们将不负任何责任，并且删除该媒体资源。</p> <h3>发布图片</h3> <p>您可以同时上传最多20张照片作为博客内容，并且也可以编写介绍。</p> <h3>发布视频</h3> <p>视频引用地址可以输入虾米、雅燃音乐、音悦台、优酷、土豆、6间房、腾讯播客、新浪博客、56.com等诸多网站播放地址。建议您可以将录制好的视频传至以上媒体然后填写引用地址。</p> <p>同时您也可以编写介绍</p> <h3>关于标签</h3> <p>不管发布任何内容您都需要填写至少一个标签，轻博内容将根据标签来进行区分。因此填写一个或多个合适的标签是非常不错的选择。</p> <h3>关注和喜欢</h3> <p>加为关注的用户将会在您的首页显示最新发布动态</p> <p>加为喜欢的博客可方便您在右侧导航中快速的查找</p> '),
(3, '<h3>官方网站</h3> <p>http://qing.thinksaas.cn</p> <h3>邮箱</h3> <p>nxfte<span id="ats"></span>qq.com</p> <h3>交流群</h3> <p>qq group 176221558</p> <h3>商业授权</h3> <p>QQ：234027573</p> <h3>付款地址</h3> <p><a href="https://me.alipay.com/anythink" target="_blank">https://me.alipay.com/anythink</a></p> '),
(4, '<p>本协议适用于云边网开发的云边网平台。使用云边网平台以及与其相关联的各项技术服务和网络服务之前，您必须同意接受本协议。若不接受本协议，您将无法使用云边网平台及相关服务。</p> <p>您可以通过以下方式接受本协议：一旦您注册云边账户并且发布第一条信息起，您对云边网平台及其他相关服务的使用将被视为您自实际 使用起便接受了本协议的全部条款。如果需要注销用户请发送注销申请邮件，我们将删除与您有关的全部内容，您与云边网所有服务都将被终止。注册账户需要用户 本人电子邮件作为注册账号，如果用户使用他人邮件账号注册并被邮件归属人举证成功者将删除用户账号及所有内容，并且一切法律责任自行承担，本站不承担任何 责任。</p> <p>云边网网络平台的所有权和运营权归云边网所有，并保留随时变更平台提供的信息和服务的权利。云边网所提供的相关信息和服务的使用者（以下简称&ldquo;用户&rdquo;）在使用之前必须同意以下的所有条款。</p> <p>用户在云边网平台上发布的信息内容由用户及云边网共同所有，任何其他组织或个人未经用户本人授权同意，不得复制、转载、擅改其内容。用户不得在云边网平台发布和散播任何形式的含有下列内容的信息：<br> 1）为相关法律法规所禁止；<br> 2）有悖于社会公共秩序和善良风俗；<br> 3）损害他人合法权益；<br> 4）其他云边网 认为不适当在本平台发布的内容。 <br> 5）通过发布音乐的上传功能上传非用户本人拥有版权的音频媒体。 <br> 云边网保留删除和变更上述相关信息的权利。</p> <p>用户应保证在云边网平台的注册信息的真实、准确和完整，并在资料变更时及时更新相关信息。对于任何信息不实所导致的用户本人或第三方损害，云边网不承担任何责任。用户应妥善保管个人注册信息及登录密码等资料，用户将对以其注册用户名进行的所有活动和事件负法律责任。</p> <p>云边网非常强调保护用户的隐私。云边网将致力于为用户提供最可靠的隐私保护措施。未经用户的特别授权，云边网不会将用户信息公开或透露给任何第三 方个人或机构，但在下列情形除外：<br> 1) 根据司法机关、政府部门的强制命令提供涉及用户信息的相关资料； <br> 2) 不可抗力与不可控因素导致的信息外泄；<br> 3) 云边网基于自身的合法维权需要而使用用户的相关信息。</p> <p>用户同意使用云边网平台服务所潜在的风险及其一切可能的后果将完全由自己承担，云边网对这些可能的风险和后果不承担任何责任。</p> <p>云边网不保证云边网平台提供的服务能够满足用户的所有要求，也不保证已存在的服务不会中断，对这些服务的及时性、安全 性、准确性也不作保证。对于因系统维护或升级的需要而需暂停网络服务的情形，云边网将视具体情形尽可能事先在重要页面发布通知。同时，云边网保留在不事先 通知用户的情况下中断或终止部分或全部服务的权利，对于因服务的中断或终止而造成的用户或第三方的任何损失，云边网不承担任何责任。</p> <p>用户同意尊重和维护云边网平台以及其他用户的合法权益。用户因违反有关法律、法规或协议规定中的任何条款而给云边网或任何第三方造成的损失，用户同意承担由此造成的一切损害赔偿责任。</p> <p>在适用法律允许的范围内，云边网保留对本协议任何条款的解释权和随时变更的权利。 云边网可能会随时根据需要修改本协议的任一条款。如发生此类变更，云边网会提供新版本的条款。用户在变更后对云边网平台服务的使用将视为已完全接受变更后的条款。</p> <p>本协议在根据下述规定终止前，将会一直适用。当下列情况出现时，云边网可以随时中止与用户的协议：<br> 1) 用户违反了本协议中的任何规定；<br> 2) 法律法规要求终止本协议;<br> 3) 云边网认为实际情形不再适宜继续执行本协议。</p> <p>本协议及因本协议产生的一切法律关系及纠纷，均适用中华人民共和国法律。用户与云边网在此同意以云边网营业所在地法院管辖。</p> '),
(5, ' <h3>隐私政策</h3> <p>当您在使用我们的服务时，我们将致力于为您提供最可靠的隐私保护措施。未经用户的特别授权，我们承诺不会将用户信息 公开或透露给任何第三方个人或机构，但在下列情形除外：<br> 1) 根据司法机关、政府部门的强制命令提供涉及用户信息的相关资料；<br> 2) 不可抗力与不可控因素导致的信息外泄； <br> 3) 云边网基于自身的合法维权需要而使用用户的相关信息。</p> <p>为了更好地提升云边网的服务质量和进行更精准的网络数据分析，我们将在充分保护用户个人隐私的前提下，对用户数据库进行分析和处理。所有相关的数据分析结果都将被用于有价值的新产品的研发和用户体验的进一步改进。</p> <h3>法律声明</h3> <p>云边网网络平台的所有权和运营权归云边网所有，并保留随时变更平台提供的信息和服务的权利。云边网所提供的相关信息和服务的使用者（以下简称&ldquo;用户&rdquo;）在使用之前必须同意以下的所有条款。</p> <p>用户在云边网平台上发布的信息内容由用户及云边网共同所有，任何其他组织或个人未经用户本人授权同意，不得复制、转载、 擅改其内容。用户不得在点 点网平台发布和散播任何形式的含有下列内容的信息：1）为相关法律法规所禁止；2）有悖于社会公共秩序和善良风俗；3）损害他人合法权益；4）其他云边网 认为不适当在本平台发布的内容。 云边网保留删除和变更上述相关信息的权利。</p> <p>用户应保证在云边网平台的注册信息的真实、准确和完整，并在资料变更时及时更新相关信息。对于任何信息不实所导致的用户本人或第三方损害，云边网不承担任何责任。用户应妥善保管个人注册信息及登录密码等资料，用户将对以其注册用户名进行的所有活动和事件负法律责任。</p> <p>云边网非常强调保护用户的隐私。云边网将致力于为用户提供最可靠的隐私保护措施。未经用户的特别授权，云边网不会将用户 信息公开或透露给任何第三 方个人或机构，但在下列情形除外：1) 根据司法机关、政府部门的强制命令提供涉及用户信息的相关资料； 2) 不可抗力与不可控因素导致的信息外泄； 3) 云边网基于自身的合法维权需要而使用用户的相关信息。</p> <p>用户同意使用云边网平台服务所潜在的风险及其一切可能的后果将完全由自己承担，云边网对这些可能的风险和后果不承担任何责任。</p> <p>云边网不保证云边网平台提供的服务能够满足用户的所有要求，也不保证已存在的服务不会中断，对这些服务的及时性、安全 性、准确性也不作保证。对于 因系统维护或升级的需要而需暂停网络服务的情形，云边网将视具体情形尽可能事先在重要页面发布通知。同时，云边网保留在不事先通知用户的情况下中断或终止 部分或全部服务的权利，对于因服务的中断或终止而造成的用户或第三方的任何损失，云边网不承担任何责任。</p> <p>用户同意尊重和维护云边网平台以及其他用户的合法权益。用户因违反有关法律、法规或协议规定中的任何条款而给云边网或任何第三方造成的损失，用户同意承担由此造成的一切损害赔偿责任。</p> <p>在适用法律允许的范围内，云边网保留对本协议任何条款的解释权和随时变更的权利。 云边网可能会随时根据需要修改本协议的任一条款。如发生此类变更，云边网会提供新版本的条款。用户在变更后对云边网平台服务的使用将视为已完全接受变更后的条款。</p> <p>本协议在根据下述规定终止前，将会一直适用。当下列情况出现时，云边网可以随时中止与用户的协议：1) 用户违反了本协议中的任何规定；2) 法律法规要求终止本协议;3) 云边网认为实际情形不再适宜继续执行本协议。</p> <p>本协议及因本协议产生的一切法律关系及纠纷，均适用中华人民共和国法律。用户与云边网在此同意以云边网营业所在地法院管辖。</p> ');

ALTER TABLE `th_blog` CHANGE `title` `title` CHAR( 50 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL 

SET FOREIGN_KEY_CHECKS=1;
