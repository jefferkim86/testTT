/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50136
Source Host           : localhost:3306
Source Database       : lukou

Target Server Type    : MYSQL
Target Server Version : 50136
File Encoding         : 65001

Date: 2014-07-13 18:03:50
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `yb_ad_list`
-- ----------------------------
DROP TABLE IF EXISTS `yb_ad_list`;
CREATE TABLE `yb_ad_list` (
  `adid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL COMMENT '广告名称',
  `auid` int(11) NOT NULL COMMENT '广告位ID',
  `type` tinyint(1) NOT NULL COMMENT '1图片|2html|3右下角弹出|4全屏',
  `url` varchar(255) NOT NULL COMMENT '跳转地址',
  `body` text NOT NULL COMMENT '广告具体内容',
  `ga` text COMMENT '谷歌ga统计代码',
  `time_date_limit` char(21) DEFAULT NULL COMMENT '广告投放日期：例如2012-04-05-2012-04-20，用char存放起始和结束日期用“|”分隔',
  `time_area_limit` varchar(600) DEFAULT NULL COMMENT '广告投放时间段如，8:00-12：00用json存放多个时间段',
  `is_show` tinyint(1) NOT NULL DEFAULT '0',
  `weight` int(10) NOT NULL DEFAULT '10',
  PRIMARY KEY (`adid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yb_ad_list
-- ----------------------------

-- ----------------------------
-- Table structure for `yb_ad_unit`
-- ----------------------------
DROP TABLE IF EXISTS `yb_ad_unit`;
CREATE TABLE `yb_ad_unit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL COMMENT '广告位置',
  `adesc` varchar(255) NOT NULL COMMENT '位置描述',
  `img` varchar(255) NOT NULL COMMENT '广告位置截图',
  `orders` int(10) NOT NULL DEFAULT '0' COMMENT '排序',
  `system` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否为系统投放位',
  `is_show` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yb_ad_unit
-- ----------------------------
INSERT INTO `yb_ad_unit` VALUES ('1', '首页右侧底部广告', '首页右侧底部广告', '1.jpg', '1', '1', '1');
INSERT INTO `yb_ad_unit` VALUES ('2', '首页顶部广告位', '首页顶部广告位', '2.jpg', '2', '1', '1');
INSERT INTO `yb_ad_unit` VALUES ('3', '发现频道广告位', '发现频道广告位', '3.jpg', '4', '1', '1');
INSERT INTO `yb_ad_unit` VALUES ('4', '推荐频道顶部广告位', '推荐频道顶部广告位', '4.jpg', '3', '1', '1');
INSERT INTO `yb_ad_unit` VALUES ('5', '用户主页右侧广告位', '用户主页右侧广告位', '5.jpg', '5', '1', '1');
INSERT INTO `yb_ad_unit` VALUES ('6', '用户主页详情页广告位', '用户主页详情页广告位', '6.jpg', '6', '1', '1');

-- ----------------------------
-- Table structure for `yb_attachments`
-- ----------------------------
DROP TABLE IF EXISTS `yb_attachments`;
CREATE TABLE `yb_attachments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `bid` int(10) unsigned NOT NULL,
  `path` varchar(255) NOT NULL,
  `blogdesc` varchar(50) NOT NULL COMMENT '描述',
  `filesize` int(10) unsigned NOT NULL,
  `mime` varchar(20) NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `time` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `bid` (`bid`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COMMENT='附件表';

-- ----------------------------
-- Records of yb_attachments
-- ----------------------------
INSERT INTO `yb_attachments` VALUES ('10', '15', 'attachs/14/1/20/15/0009116672.jpeg', '', '111507', 'jpeg', '1', '1390147751');
INSERT INTO `yb_attachments` VALUES ('9', '15', 'attachs/14/1/20/15/0009119633.jpeg', '', '230237', 'jpeg', '1', '1390147751');
INSERT INTO `yb_attachments` VALUES ('8', '15', 'attachs/14/1/20/15/0009107800.jpeg', '', '83071', 'jpeg', '1', '1390147750');
INSERT INTO `yb_attachments` VALUES ('11', '16', 'attachs/14/1/20/16/0012013125.jpeg', '56A62F2D6857D1BB188ABED1CEA49645_B1280_1280_1280_8', '599626', 'jpeg', '1', '1390147921');
INSERT INTO `yb_attachments` VALUES ('12', '16', 'attachs/14/1/20/16/0012232766.jpeg', '155E959DD4FAE48D81A2FD5BFC0275E7_B1280_1280_1280_8', '425309', 'jpeg', '1', '1390147943');
INSERT INTO `yb_attachments` VALUES ('13', '16', 'attachs/14/1/20/16/0012326348.jpeg', 'C2B52FD2091217776DF74FCE35E88EE2_B1280_1280_1280_8', '544277', 'jpeg', '1', '1390147952');
INSERT INTO `yb_attachments` VALUES ('14', '19', 'attachs/14/1/20/19/0023141921.jpeg', '56A62F2D6857D1BB188ABED1CEA49645_B1280_1280_1280_8', '599626', 'jpeg', '4', '1390148594');
INSERT INTO `yb_attachments` VALUES ('15', '19', 'attachs/14/1/20/19/0023238417.jpeg', 'C2B52FD2091217776DF74FCE35E88EE2_B1280_1280_1280_8', '544277', 'jpeg', '4', '1390148603');
INSERT INTO `yb_attachments` VALUES ('19', '21', 'attachs/14/1/20/21/1151427278.jpg', '', '39142', 'jpg', '5', '1390189902');
INSERT INTO `yb_attachments` VALUES ('20', '24', 'attachs/14/2/10/24/2200263018.jpeg', '1.jpeg', '7554', 'jpeg', '1', '1392040826');
INSERT INTO `yb_attachments` VALUES ('18', '21', 'attachs/14/1/20/21/1151352032.jpg', '', '37132', 'jpg', '5', '1390189895');
INSERT INTO `yb_attachments` VALUES ('21', '26', 'attachs/14/6/14/26/1459197614.jpg', '广告图片.jpg', '130015', 'jpg', '12', '1402729159');
INSERT INTO `yb_attachments` VALUES ('22', '29', 'attachs/14/6/27/29/1101236877.jpg', '', '188705', 'jpg', '15', '1403838083');
INSERT INTO `yb_attachments` VALUES ('23', '30', 'attachs/14/6/27/30/1104454527.gif', '', '4403', 'gif', '15', '1403838285');
INSERT INTO `yb_attachments` VALUES ('24', '33', 'attachs/14/6/27/33/1116539913.gif', '', '1977', 'gif', '15', '1403839013');
INSERT INTO `yb_attachments` VALUES ('32', '46', 'attachs/14/7/06/46/1451599859.jpg', 'Boston city flow', '339773', 'jpg', '23', '1404629519');
INSERT INTO `yb_attachments` VALUES ('28', '39', 'attachs/14/7/02/39/1836042493.png', 'Snip20140702_14.png', '47753', 'png', '1', '1404297364');
INSERT INTO `yb_attachments` VALUES ('30', '0', 'attachs/tmp/2206418295.png', 'Snip20140702_14.png', '47753', 'png', '19', '1404310001');

-- ----------------------------
-- Table structure for `yb_blog`
-- ----------------------------
DROP TABLE IF EXISTS `yb_blog`;
CREATE TABLE `yb_blog` (
  `bid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned NOT NULL DEFAULT '0',
  `top` tinyint(1) NOT NULL DEFAULT '0' COMMENT '置顶',
  `type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1文字2音乐3照片4视频5链接 ',
  `source_bid` int(10) NOT NULL DEFAULT '0' COMMENT '被转载的原始blog',
  `tag` char(30) NOT NULL COMMENT '分类',
  `title` char(50) DEFAULT NULL,
  `body` text NOT NULL,
  `open` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0草稿 1通过 -1临时ID',
  `hitcount` int(10) DEFAULT '0' COMMENT '点击量',
  `feedcount` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '动作统计',
  `replaycount` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '评论回复数',
  `forwardcount` int(10) NOT NULL DEFAULT '0' COMMENT '转发数量',
  `noreply` tinyint(1) NOT NULL DEFAULT '0' COMMENT '不允许评论',
  `time` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`bid`),
  KEY `tag` (`tag`),
  KEY `uid` (`uid`),
  KEY `top` (`top`),
  KEY `open` (`open`)
) ENGINE=MyISAM AUTO_INCREMENT=58 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yb_blog
-- ----------------------------
INSERT INTO `yb_blog` VALUES ('15', '1', '0', '3', '0', '', '素一', '[attribute]a:2:{s:5:\"count\";i:3;s:3:\"img\";a:3:{i:0;a:2:{s:3:\"url\";s:29:\"attachs/14/1/20/15/t_0009107800.jpeg\";s:4:\"desc\";s:0:\"\";}i:1;a:2:{s:3:\"url\";s:29:\"attachs/14/1/20/15/t_0009119633.jpeg\";s:4:\"desc\";s:0:\"\";}i:2;a:2:{s:3:\"url\";s:29:\"attachs/14/1/20/15/t_0009116672.jpeg\";s:4:\"desc\";s:0:\"\";}}}[/attribute]素一', '1', '4', '2', '0', '0', '0', '1390147762');
INSERT INTO `yb_blog` VALUES ('21', '5', '0', '3', '0', '', null, '[attribute]a:2:{s:5:\"count\";i:2;s:3:\"img\";a:2:{i:0;a:2:{s:3:\"url\";s:28:\"attachs/14/1/20/21/t_1151352032.jpg\";s:4:\"desc\";s:0:\"\";}i:1;a:2:{s:3:\"url\";s:28:\"attachs/14/1/20/21/t_1151427278.jpg\";s:4:\"desc\";s:0:\"\";}}}[/attribute]<span style=\"color: rgb(51, 51, 51); font-family: \'Hiragino Sans GB\', u5faeu8f6fu96c5u9ed1, 微软雅黑, tahoma, arial, 宋体, sans-serif; font-size: 14px; letter-spacing: 1px; line-height: 25.200000762939453px;\">给大家推荐这个韩国抗菌菜板，</span><span style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); color: rgb(51, 51, 51); font-family: \'Hiragino Sans GB\', u5faeu8f6fu96c5u9ed1, 微软雅黑, tahoma, arial, 宋体, sans-serif; font-size: 14px; letter-spacing: 1px; line-height: 25.200000762939453px;\"><span style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0);\">采用医用级材质，不含双酚A，每块菜板用来切不同材质的食物，生熟分开，避免细菌污染，每块菜板上有不同的图标来标示不同的食材，有蔬菜，水果，鱼类以及肉类，外貌党觉得漂亮又实用，收纳架收纳起来也很方便。</span></span>', '1', '11', '1', '0', '0', '0', '1390189910');
INSERT INTO `yb_blog` VALUES ('22', '5', '0', '3', '0', '', '素一', '[repto]a:4:{s:3:\"uid\";s:1:\"1\";s:8:\"username\";s:12:\"左文右刀\";s:6:\"domain\";s:0:\"\";s:4:\"time\";i:1390189964;}[/repto][attribute]a:2:{s:5:\"count\";i:3;s:3:\"img\";a:3:{i:0;a:2:{s:3:\"url\";s:36:\"attachs/14/1/20/15/t_0009107800.jpeg\";s:4:\"desc\";s:0:\"\";}i:1;a:2:{s:3:\"url\";s:36:\"attachs/14/1/20/15/t_0009119633.jpeg\";s:4:\"desc\";s:0:\"\";}i:2;a:2:{s:3:\"url\";s:36:\"attachs/14/1/20/15/t_0009116672.jpeg\";s:4:\"desc\";s:0:\"\";}}}[/attribute]素一', '1', '4', '0', '0', '0', '0', '1390189964');
INSERT INTO `yb_blog` VALUES ('19', '4', '0', '1', '0', '', null, '[attribute]a:2:{i:0;s:29:\"attachs/14/1/20/19/t_0023141921.jpeg\";i:1;s:29:\"attachs/14/1/20/19/t_0023238417.jpeg\";}[/attribute]<p>asfadfa&nbsp;asfadfa&nbsp;asfadfa&nbsp;asfadfa&nbsp;asfadfa&nbsp;asfadfa&nbsp;asfadfa&nbsp;asfadfa&nbsp;asfadfa&nbsp;asfadfa&nbsp;asfadfa&nbsp;asfadfa&nbsp;asfadfa&nbsp;asfadfa&nbsp;asfadfa&nbsp;asfadfa&nbsp;asfadfa&nbsp;asfadfa&nbsp;<a href=\"attachs/14/1/20/19/0023141921.jpeg\"><img src=\"attachs/14/1/20/19/t_0023141921.jpeg\" class=\"feedimg\" alt=\"\" /></a></p><p><br /></p><p>asdfd afdaf a</p><p><a href=\"attachs/14/1/20/19/0023238417.jpeg\"><img src=\"attachs/14/1/20/19/t_0023238417.jpeg\" class=\"feedimg\" alt=\"\" /></a><br /></p>', '1', '15', '0', '0', '0', '0', '1390148605');
INSERT INTO `yb_blog` VALUES ('16', '1', '0', '1', '0', '', '三张单车，三个梦想', '[attribute]a:3:{i:0;s:29:\"attachs/14/1/20/16/t_0012013125.jpeg\";i:1;s:29:\"attachs/14/1/20/16/t_0012232766.jpeg\";i:2;s:29:\"attachs/14/1/20/16/t_0012326348.jpeg\";}[/attribute]<p><a href=\"attachs/14/1/20/16/0012013125.jpeg\"><img src=\"attachs/14/1/20/16/t_0012013125.jpeg\" class=\"feedimg\" alt=\"\" /></a></p><p><a href=\"attachs/14/1/20/16/0012232766.jpeg\"><img src=\"attachs/14/1/20/16/t_0012232766.jpeg\" class=\"feedimg\" alt=\"\" /></a><br /></p><p><a href=\"attachs/14/1/20/16/0012326348.jpeg\"><img src=\"attachs/14/1/20/16/t_0012326348.jpeg\" class=\"feedimg\" alt=\"\" /></a><br /></p>', '1', '15', '0', '0', '0', '0', '1390147956');
INSERT INTO `yb_blog` VALUES ('17', '1', '0', '2', '0', '蜗牛,群星', '蜗牛-群星', '[attribute]a:1:{i:0;a:7:{s:4:\"type\";s:11:\"xiamisearch\";s:3:\"img\";s:66:\"http://img.xiami.net/images/album/img60/1260/704541356500180_1.jpg\";s:3:\"pid\";s:57:\"http://www.xiami.com/widget/0_1771554247/singlePlayer.swf\";s:5:\"title\";s:6:\"蜗牛\";s:3:\"url\";s:36:\"http://www.xiami.com/song/1771554247\";s:6:\"artist\";s:6:\"蜗牛\";s:6:\"author\";s:6:\"群星\";}}[/attribute]', '1', '6', '2', '2', '0', '0', '1390147991');
INSERT INTO `yb_blog` VALUES ('18', '1', '0', '4', '0', '', '班夫电影节 2011 World Tour (Canada', '[attribute]a:1:{i:0;a:5:{s:4:\"type\";s:5:\"youku\";s:3:\"img\";s:86:\"http://g1.ykimg.com/1100641F464D9DCD383FA401759EE15C88AAED-E3E1-8B4B-E5C9-6C35B68072BE\";s:3:\"pid\";s:58:\"http://player.youku.com/player.php/sid/XMjU3MDQwMjM2/v.swf\";s:5:\"title\";s:39:\"班夫电影节 2011 World Tour (Canada\";s:3:\"url\";s:47:\"http://v.youku.com/v_show/id_XMjU3MDQwMjM2.html\";}}[/attribute]', '1', '7', '2', '1', '0', '0', '1390148076');
INSERT INTO `yb_blog` VALUES ('23', '1', '0', '3', '0', '', null, '[repto]a:4:{s:3:\"uid\";s:1:\"5\";s:8:\"username\";s:9:\"马小奇\";s:6:\"domain\";s:0:\"\";s:4:\"time\";i:1390881146;}[/repto][attribute]a:2:{s:5:\"count\";i:2;s:3:\"img\";a:2:{i:0;a:2:{s:3:\"url\";s:35:\"attachs/14/1/20/21/t_1151352032.jpg\";s:4:\"desc\";s:0:\"\";}i:1;a:2:{s:3:\"url\";s:35:\"attachs/14/1/20/21/t_1151427278.jpg\";s:4:\"desc\";s:0:\"\";}}}[/attribute]<span style=\"color: rgb(51, 51, 51); font-family: \'Hiragino Sans GB\', u5faeu8f6fu96c5u9ed1, 微软雅黑, tahoma, arial, 宋体, sans-serif; font-size: 14px; letter-spacing: 1px; line-height: 25.200000762939453px;\">给大家推荐这个韩国抗菌菜板，</span><span style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); color: rgb(51, 51, 51); font-family: \'Hiragino Sans GB\', u5faeu8f6fu96c5u9ed1, 微软雅黑, tahoma, arial, 宋体, sans-serif; font-size: 14px; letter-spacing: 1px; line-height: 25.200000762939453px;\"><span style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0);\">采用医用级材质，不含双酚A，每块菜板用来切不同材质的食物，生熟分开，避免细菌污染，每块菜板上有不同的图标来标示不同的食材，有蔬菜，水果，鱼类以及肉类，外貌党觉得漂亮又实用，收纳架收纳起来也很方便。</span></span>', '1', '4', '0', '0', '0', '0', '1390881146');
INSERT INTO `yb_blog` VALUES ('24', '1', '0', '1', '0', '', '测试', '[attribute]a:1:{i:0;s:29:\"attachs/14/2/10/24/t_2200263018.jpeg\";}[/attribute]<p></p><p style=\"line-height: 24px;\">阿迪发生地方</p><a href=\"attachs/14/2/10/24/2200263018.jpeg\"><img src=\"attachs/14/2/10/24/t_2200263018.jpeg\" class=\"feedimg\" alt=\"\" /></a><br /><p></p><p style=\"line-height: 24px;\">阿迪发生地方</p><br /><p style=\"line-height: 24px;\">阿迪发生地方</p><br /><p style=\"line-height: 24px;\">阿迪发生地方</p><p style=\"line-height: 24px;\">阿迪发生地方</p><br /><p style=\"line-height: 24px;\">阿迪发生地方</p><p style=\"line-height: 24px;\">阿迪发生地方</p><br /><br /><p><br /></p>', '1', '6', '3', '1', '0', '0', '1392040828');
INSERT INTO `yb_blog` VALUES ('25', '10', '0', '1', '0', 'qiumoji', '　兴邦选矿球磨机采用优质的高锰钢', '[attribute]a:0:{}[/attribute]<p style=\"font-family: Simsun;font-size:16px; line-height: normal;\"><br /></p><p style=\"font-family: Simsun;font-size:16px; line-height: normal;\">　　<a href=\"http://www.xkqmj.org/\">球磨机</a>工作效率的影响因素包括加水量、球石、原料配方、电流、分散剂、减速装置等，这些因素的综合作用最终决定了球磨机的工作效率。球磨机工作效率的提高也就是从这六个方面着手进行改善。球磨机的加水量。球磨机所处理的矿石含水量多少会影响到球磨机的工作效率，因此适当的对球磨机所处理的矿石添加水分，避免球磨机处理过于干燥的矿石原料，也能对球磨机效率的提高起到相当的作用。如何进行球磨机噪声控制，将是球磨机用户关心的问题。昱发在这为您讲解球磨机噪声控制的的几个基本措施：增加隔声罩。采用钢结构骨架，用薄钢板做外壳，内抹阻尼层与填超细玻璃棉或其他吸声材料，将整个球磨机封闭。球磨机伴随着我国经济发展和环保重视程度的不断提升，我国的球磨机装备制造业经历了一个设备引进、技术吸收、产品自制、技术研发和创新的过程。可以说球磨机装备制造业的发展和进步做出了较大贡献，<a href=\"http://www.cnzsjx.com/\">制砂机</a>同时也促进了我国材料革新和推广建筑节能工作。因为球磨机的大型化，轴承作为球磨机配件的主要部件，其任务的不变将直接球磨机出产可否正常运转。从传统的小型球磨机开展到日前筒体直径能到达7米以上的大型球磨机，其主轴承的运用首要有通俗滑动轴承、滚动轴承、动压轴承、静动压轴承、静压轴承。装备制造业是为其下游产业提供生产工具的行业，装备制造业的发展水平直接影响其下游产业节能环保工作的开展。</p><p style=\"font-family: Simsun;font-size:16px; line-height: normal;\"><a href=\"http://www.xkqmj.org/\">http://www.xkqmj.org</a>球磨机</p><p style=\"font-family: Simsun;font-size:16px; line-height: normal;\"><a href=\"http://www.cnzsjx.com/\">http://www.cnzsjx.com</a>制砂机</p>', '1', '3', '0', '0', '0', '0', '1398655366');
INSERT INTO `yb_blog` VALUES ('26', '12', '0', '1', '0', '智深配资 股票配', '智深配资 股票配资业务流程', '[attribute]a:1:{i:0;s:35:\"attachs/14/6/14/26/t_1459197614.jpg\";}[/attribute]<p><span style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\">智深配资 股票配资业务流程郑鹏先生您好，智深配资 股票配资业务流程感谢您在百忙之中接受七禾网期货我国的专访。您本科学的智深配资 股票配资业务流程是金融统计学，研讨生学的是软件工程，请问这些方面的专业知识对您的期货买卖有哪些方面的协助或影响？</span></p><p><span style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\"><embed type=\"application/x-shockwave-flash\" classid=\"clsid:d27cdb6e-ae6d-11cf-96b8-4445535400000\" src=\"http://player.youku.com/player.php/sid/XNzA1MzM3MzQ0/v.swf\" wmode=\"opaque\" quality=\"high\" menu=\"false\" play=\"true\" loop=\"true\" allowfullscreen=\"true\" width=\"480\" height=\"400\"><br /></embed></span></p><p><span style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\"><a href=\"attachs/14/6/14/26/1459197614.jpg\"><img src=\"attachs/14/6/14/26/t_1459197614.jpg\" class=\"feedimg\" alt=\"\" /></a><br /></span></p><p><span style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\">　　郑鹏：我在本科时刻读的是金融统计学，拿到的是经济学学士学位。专业课程有大量金融、证券方面的内容，我在2000年读书时刻就现已理论联系实习，开户实盘做股票，而且我的毕业论文也是关于统计剖析在同职业上市公司股票挑选中的运用。在研讨生时刻学习的是计算机软件工程，理工科专业特点又熏陶了我谨慎的学习、作业的情绪与办法。这些都对我当前期货买卖起到了协助。</span><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><span style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\">　　问：原本您是在大学里做教师的，后来做了两三年期货后就辞去职务专门做期货了，请问您其时为何做出辞去职务的决议？期货哪些方面的魅力招引了您？</span><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><span style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\">　　郑鹏：这儿面有多方面的缘由，讲讲其间首要的。我是酷爱教育事业的，但我不太认同其时大学的教育系统名利化、大学内部作业系统的行政化。7年多的专职教师职业生涯，较为闲适且按部就班的校园个人开展形式，对我的招引力逐步降低。有时分抛弃未必是件坏事，有过教育职业开心的阅历，我更想测验一下新的、情愿去做的工作。</span><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><span style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\">　　不能说期货的魅力招引了我，用“机缘巧合”一词来描述对比适宜。兄弟的领路、自在弹性的作业时刻与内容，简略率真地与职业内大家打交道，使得前期做期货在必定的偶然性上成了必定性，当然进入期货职业也天然顺理成章。</span><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><span style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\">　　问：不少出资者做期货三五年都无法完成盈余，而您做期货在第一年内就挣钱了。您觉得首要缘由是什么？</span><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><span style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\">　　郑鹏：我想这跟在大学和研讨生时刻的学习以及前期的股票商场出资的经验堆集是密不行分的，而且，最首要的是，我一开始就站在了“伟人”的膀子上，所谓的“伟人”即是身边做期货的兄弟们，他们都是一些对比优异、成功的人士，他们对我的影响与协助很大。在我做期货之前，曾花了一年半的时刻在电脑上调查其时若干优异操盘手每天的交割单，去思考他们做单的根据。这段阅历对我刚进入期货职业就能获利的协助是无穷的。</span><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><span style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\">　　问：2009年到2013年您完成了接连五年的盈余，请问您觉得自个能持续盈余的要害是什么？别的，您觉得自个能否持续坚持每年都盈余？为何？</span><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><span style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\">　　郑鹏：能够持续盈余最大的要害是危险意识。亏本或许回撤的时分，首要思考怎样保命，怎样保住自个的本金；盈余的时分，适度思考止赢。我信任时刻是我的兄弟，首要是对自个的买卖系统十分有决心。</span><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><span style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\">　　问：曩昔五年的盈余，您每年收益率有高有低，您怎样看待这一表象？</span><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><span style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\">　　郑鹏：这个表象十分正常，收益率的高和低都是商场给的，赢利不是我故意去寻求出来的。行情趋势性对比强，收益率会高一点，当然这个条件是自个把握住；假设震动行情对比多，收益率必定相应会降低，我也没办法。我不故意寻求收益率的高低。</span><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><span style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\">　　问：您的买卖系统以技能剖析为主，首要根据海龟的办法，请问您对海龟买卖规律的是怎样知道的？就您看来，最简略的海龟买卖信号能否持续盈余？</span><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><span style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\">　　郑鹏：海龟买卖系统是一个相当好的买卖系统，是一个十分简略而且能给你带来正报答的系统。我对这个系统的知道，最要害的是履行，最难做的也是履行。在长周期的状况下，我信任这套系统能够带来持续盈余。还有，这套系统另一个对比好的优势是能驾御较大的资金体量。我以为所有的买卖系统都是好系统，只不过我更合适这套系统。</span><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><span style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\">问：您的买卖系统和传统的海龟买卖办法有哪些方面的不一样？</span><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><span style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\">　　郑鹏：稍有不一样，我如今首要做国内的商品买卖种类，在商场对比单一的状况下，我会进行种类的挑选。假设资金量添加，商场的挑选能够更多，比方国内外股市、国外商品、乃至涉及到外汇等其它衍生品，种类的挑选疑问就变得非必须一点。还有一点不一样则是我人为地加了有些止盈的策略。</span><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><span style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\">　　问：您的技能剖析请问您首要看哪些周期的K线？不一样周期的K线怎样合作运用？K线、均线和有关目标，在您的买卖系统中起着怎样的效果？</span><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><span style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\">　　郑鹏：我首要看日K线，也用周K线作为方向过滤。均线系统对我对比重要，20日均线作为做多做空的根据。技能目标看的对比少，首要用来作为参阅效果，添加自个的决心。</span><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><span style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\">　　问：别的您看不看成交量、持仓量的改动？成交量、持仓量的改动会不会作为您进进场的根据或参阅？</span><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><span style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\">　　郑鹏：我不看这些，种类的流动性才是我重视的，成交量、持仓量的改动我简直不思考。</span><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><span style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\">　　问：您的买卖系统会有明确的进进场信号，请问您的进进场信号有哪些要素构成？</span><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><span style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\">　　郑鹏：首要是均线系统以及种类的强弱，更多的思考系统的平衡性疑问。种类的强弱，就拿化工品的塑料和pp来说，它们的有关性对比强，K线的形状也对比类似，走势进程当中有强有弱，做多就会挑选强势的种类，另一个弱的就抛弃。我是多种类买卖，在运行进程中，各种类有强有弱，有时分方向一致，有时分方向不一致。我在规划头寸的时分会思考在发作意想不到的状况发生最大的亏本我要能够接受。在相应的种类上面，开仓方面，包含头寸的方向挑选，我会进行调整，使得全体的多空相应的平衡。</span><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><span style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\">　　在种类调配上有相对应的硬性规定，比方化工类我能够挑选两三个种类，根本金属挑选一个种类，贵金属也只挑选一个种类。在买卖所还会有必定的挑选，不会把种类会集在一个买卖商场上面，比方在一个买卖所上不宜装备过多种类，每个种类的多空则是系统说了算。</span><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><span style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\">　　在信号满意的状况下，假设10个种类都契合我方才讲的买卖所的挑选、以及有关性较强种类的强弱挑选，我会把10个种类都开进去，不会故意的去寻求所谓的精选种类。当然，假设这10个种类有5－6个种类出如今郑交所，那我必定会进行挑选，里边的缘由你懂的。</span><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><span style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\">　　问：尽管根本面剖析在您的买卖系统中占对比少，但您仍是会用根本面剖析对技能上的进场信号做验证和过滤，请问您通常怎样用根本面剖析验证和过滤技能信号？</span><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><span style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\">　　郑鹏：根本面剖析在我的买卖进程中起参阅效果和过滤效果。我通常看的都是最简略的揭露信息，比方说经过微博、微信、买卖所供给的揭露信息进行判别，我当前没有花很大的力气研讨根本面。但我不否定根本面剖析的重要性。</span><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><span style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\">　　问：假设您对某个种类的根本面不太知道，或找不到途径供给详细的根本面信息，当这个种类呈现进场信号时，您会不会做？</span><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><span style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\">　　郑鹏：假设在某一个方向有多个持仓种类，在对宣布信号的一个新的种类的根本面不知道的状况下，我会思考抛弃这个种类；但假设为了思考系统的平衡性，我也会测验的少数试单。</span><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><span style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\">　　问：除了用根本面剖析来验证和过滤技能信号，您还有没有其他方式的验证或过滤？比方您自个感受格外激烈、或感受格外欠好时？比方某个兄弟做了某个种类影响了您？</span><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><span style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\">　　郑鹏：我盘感很差，没有格外激烈的感受。我会听一下他们对根本面的一些论述，一起到盘面上印证，但对我的买卖信号的影响简直没什么影响。</span><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><span style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\">　　问：您通常在收盘前的半小时下单，为何挑选在这半小时下单？</span><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><span style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\">　　郑鹏：由于在收盘前的半小时下单，日K线根本定型，我首要以日K线作为买卖准则，当K线在最后收盘价快出来的时分进行开平仓会对比适宜，格外是开仓。</span><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><span style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\">　　问：当盘中大涨或大跌时，您会不会提早进场或许提早止损？</span><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><span style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\">　　郑鹏：止损是必定的，假设价位十分适宜，我也会测验进场。比方我要做多某一种类，盘中假设大跌到我的进场报价区域之内，我会思考进场，假设穿出去，我会思考抛弃。</span><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><span style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\">　　问：比方这个商品多头信号能够今日或许明日宣布来，一不小心今日上穿了多头信号，这个时分你会什么时分做或许不做？</span><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><span style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\">　　郑鹏：通常状况我会思考做一点，上穿了阐明这个信号成立了，成立了我就进场。</span><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><span style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\">　　问：一笔单子进场后，您怎样设置初始止损和移动止损？</span><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><span style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\">　　郑鹏：假设进场根据不见了，我必定马上止损，这是初始止损。至于移动止损，我是根据均线买卖，均线会跟着K线开展而移动，同理进场根据假设不见了，我也会退出。</span><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><span style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\">　　问：一笔单子盈余了，在乖离率过高时，您有时会挑选止盈。为何？以此止盈后，也有能够会错失一些行情，您会不会感到惋惜？</span><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><span style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\">　　郑鹏：首要为了滑润资金曲线，削减回撤带给我的心理动摇。错失一些行情会惋惜，但只要是赚就能够了。乖离率过高时不会无限制疾速涨上去，这是我的一个条件，而假设行情持续开展，我会认错，等乖离率回落思考持续进场。</span><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><span style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\">智深配资 股票配资业务流程</span><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><span style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\">　　问：除了乖离率过高，还有哪些状况呈现时，您会在进场信号呈现之前就自动止盈？</span><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><span style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\">　　郑鹏：除了乖离率，我用的最多的仍是期现升贴水的联系。比方我做多，首选现货是升水的。期货进场之后，跟现货平水了，乃至疾速现货由升水变成贴水了，我会思考自动止盈。</span><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><span style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\">　　问：您怎样挑选首要操作的种类？种类之间怎样调配？通常一起持有多少个种类？</span><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><span style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\">智深配资 股票配资业务流程</span><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><span style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\">　　郑鹏：通常持有7到12个种类，接下来跟着上市种类的添加，我会思考扩展种类的覆盖面，期望添加到12个到16个种类摆布，首要是流动性要好一点，进出便利一点，而且有必定的动摇。像这两年的玉米，进出便利，流动性也罢但是没有大幅动摇，屡战屡败，所以这个种类暂时抛弃，往后契合条件会持续进场。</span><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><span style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\">　　问：每个种类的仓位怎样设置？总仓位怎样设置？</span><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><span style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\">　　郑鹏：我方才讲了我持仓操控在7到12个种类，每个种类2%到3%的保证金，总仓位在25%到35%之间。</span><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><span style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\">　　问：一个种类在进场进场时，您会一次性地开仓平仓，仍是会有加减仓的处置？为何如此设置？</span><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><span style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\">　　郑鹏：单种类上面简直都是一次性开仓平仓，没有加减仓的操作，对我来说，加减仓的技能太难了。</span><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><span style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\">　　问：通常来说，整个账户的最大回撤您操控在多大范围内？为此您规划了哪些防护办法？</span><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><span style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\">　　郑鹏：我期望操控在8%至10%的回撤，从系统性全体思考，假设呈现晦气状况，在回撤5%的时分启动系统预警计划，把回撤的幅度降下来。</span><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><span style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\">　　问：假设账户的亏本接近了您能忍受的最大回撤时，您会怎样处置？</span><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><span style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\">　　郑鹏：经过减仓，将一些片面以为横向动摇的，趋势性不明确的，或许说有关种类有区别的这类种类的持仓先退出。</span><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><span style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\">　　问：有人以为，“资金曲线是一个出资者的生命线”，对此您是不是定同？您会对自个的资金曲线做一些自动的办理吗？</span><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><span style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\">　　郑鹏：我并不认同，由于每个人的买卖个性各不相同，并不是曲线滑润就必定好。我会对于回撤做一些调整。作为海龟系统，不去进行甄别是最佳的，但假设回撤过大，我会人为自动干涉。</span><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><span style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\">　　问：平均来看，您一笔单子持仓时刻为多少天？持仓时刻最短和最长的单子分别会持有多长时刻？</span><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><span style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\">　　郑鹏：系统决议的智深配资 股票配资业务流程，正常状况一笔单子持仓10天以上，最快当天就砍掉，持仓最长的单子是上一年的白银，从2月份到5月底。</span><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><span style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\">　　问：就您看来，您智深配资 股票配资业务流程如今的买卖办法是不是现已成熟？这个买卖系统是不是还有可改善之处？</span><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><span style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\">　　郑鹏：这两年买卖系统都没有改动，暂时也不思考改善，由于当前我自个合适这套系统，假设要改动，能够会支付相应的代价。我以为下一步大概改善的不是买卖系统，而是我本身的心态，心如止水、云淡风清的看待商场，是我寻求的。怎样进步买卖涵养，我还有很长的路要走。</span><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><span style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\">　　问：有些做系统化买卖的出资者以为“商场不行猜测，但永久能够找到对策”，对这样的观念，您是不是定同？为何？智深配资 股票配资业务流程</span><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><span style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\">　　郑鹏：我认同这个商场是不行猜测的，我能做的对策即是操控危险，削减回撤。我只做跟从，尽能够不做提早判别。</span><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><span style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\">　　问：有买卖者以为跟着程序化买卖者和组织出资者越来越多，行情的动摇节奏发作了一些改动，致使如今挣钱越来越难了，您觉得他们说得是不是有道理？为何？</span><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><span style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\">　　郑鹏：有必定的道理。如今大资金做套利、对冲的越来越多，再加上国内经济上下两难，大都种类震动为主。国外上百年的行情中，这类行情大概也发作过，总体上大概是归于正常状况。我想这即是商场，是买卖的一有些。尽管对我而言，买卖压力在增大，资金办理需求在进步，但我没办法去改动行情，只能去习惯它。</span><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><span style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\">　　从我的观念来说，不能片面说智深配资 股票配资业务流程挣钱越来越难了，不少优异的买卖者仍然在赚。我想仍是大概着重剖析自个，看自个哪些方面做好了，哪些方面没做好，不断总结和纠正。</span><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><span style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\">　　问：您曾说过，您做期货是“站在伟人的膀子上”。请问，对您有协助的“伟人”是哪几个？您从他们身上学到了哪些东西？智深配资 股票配资业务流程</span><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><span style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\">　　郑鹏：详细姓名我不说了，说说网络上的昵称：“有一腿”、“帅帅”、“微斯人”、“海特”、“玉面飞龙”、“syz1236”、“stockman”、“九天”等，这些兄弟们带我进入了这个有意思的职业，并在我买卖进程中，对我的影响十分无穷。他们对期货出资的知道与情绪、各自不一样的气量魅力、以及和我亦师亦友的联系，都让我受益匪浅，他们是智深配资 股票配资业务流程我的“贵人”，是我的学习典范，我一向深深地感激他们。</span><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><span style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\">　　问：您还说过，“时刻是我的兄弟”。请问咱们应怎样知道这句话？</span><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><br style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\" /><span style=\"color: rgb(17, 17, 17); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 21px; white-space: pre-wrap;\">　　郑鹏：第一，智深配资 股票配资业务流程我信任我的买卖系统，在长周期里必定能给我带来正报答；第二，我信任趋势在时刻周期里存在的必定性与其惊人的力智深配资 股票配资业务流程气。第三，在买卖晦气的时分，靠时刻来愈合创伤，重拾决心；在买卖有利的时分，享用时刻带来的持仓报答以及心境的愉悦。</span><br /></p>', '1', '9', '0', '0', '0', '0', '1402729191');
INSERT INTO `yb_blog` VALUES ('27', '13', '0', '1', '0', '000', null, '[attribute]a:0:{}[/attribute] 000', '-1', '1', '0', '0', '0', '0', '1403776147');
INSERT INTO `yb_blog` VALUES ('28', '15', '0', '1', '0', '', 'fsdfsf', '[attribute]a:0:{}[/attribute] sffasf', '-1', '1', '0', '0', '0', '0', '1403838037');
INSERT INTO `yb_blog` VALUES ('29', '15', '0', '3', '0', '123', null, '[attribute]a:2:{s:5:\"count\";i:1;s:3:\"img\";a:1:{i:0;a:2:{s:3:\"url\";s:28:\"attachs/14/6/27/29/t_1101236877.jpg\";s:4:\"desc\";s:0:\"\";}}}[/attribute]', '-1', '2', '0', '0', '0', '1', '1403838099');
INSERT INTO `yb_blog` VALUES ('30', '15', '0', '3', '0', '123', null, '[attribute]a:2:{s:5:\"count\";i:1;s:3:\"img\";a:1:{i:0;a:2:{s:3:\"url\";s:35:\"attachs/14/6/27/30/t_1104454527.gif\";s:4:\"desc\";s:0:\"\";}}}[/attribute]', '-1', '4', '1', '1', '0', '1', '1403838368');
INSERT INTO `yb_blog` VALUES ('31', '15', '0', '1', '0', '123', 'fsfs', '[attribute]a:0:{}[/attribute] fssfsf', '1', '3', '0', '0', '0', '0', '1403838391');
INSERT INTO `yb_blog` VALUES ('32', '15', '0', '1', '0', '123', 'fsfsf', '[attribute]a:0:{}[/attribute] fsfsf', '1', '1', '1', '0', '0', '0', '1403838404');
INSERT INTO `yb_blog` VALUES ('33', '15', '0', '3', '0', '', null, '[attribute]a:2:{s:5:\"count\";i:1;s:3:\"img\";a:1:{i:0;a:2:{s:3:\"url\";s:28:\"attachs/14/6/27/33/t_1116539913.gif\";s:4:\"desc\";s:0:\"\";}}}[/attribute]4343 34', '1', '1', '0', '0', '0', '0', '1403839016');
INSERT INTO `yb_blog` VALUES ('34', '18', '0', '1', '0', '北京股票配资网', '北京股票配资网', '[attribute]a:0:{}[/attribute]北京股票配资网<embed type=\"application/x-shockwave-flash\" classid=\"clsid:d27cdb6e-ae6d-11cf-96b8-4445535400000\" src=\"http://player.youku.com/player.php/sid/XNzA1MzM3MzQ0/v.swf\" wmode=\"opaque\" quality=\"high\" menu=\"false\" play=\"true\" loop=\"true\" allowfullscreen=\"true\" width=\"480\" height=\"400\"><embed src=\"http://player.youku.com/player.php/sid/XNzA1MzM3MzQ0/v.swf\" allowfullscreen=\"true\" quality=\"high\" width=\"480\" height=\"400\" align=\"middle\" allowscriptaccess=\"always\" type=\"application/x-shockwave-flash\"><embed type=\"application/x-shockwave-flash\" classid=\"clsid:d27cdb6e-ae6d-11cf-96b8-4445535400000\" src=\"http://v.youku.com/v_show/id_XNzA1MzM3MzQ0.html\" wmode=\"opaque\" quality=\"high\" menu=\"false\" play=\"true\" loop=\"true\" allowfullscreen=\"true\" width=\"480\" height=\"400\"></embed></embed></embed>', '1', '8', '3', '1', '0', '0', '1404220776');
INSERT INTO `yb_blog` VALUES ('35', '19', '0', '1', '0', '', '测试', '[repto]a:4:{s:3:\"uid\";s:1:\"1\";s:8:\"username\";s:12:\"左文右刀\";s:6:\"domain\";s:8:\"jasonliu\";s:4:\"time\";i:1404270474;}[/repto][attribute]a:1:{i:0;s:36:\"attachs/14/2/10/24/t_2200263018.jpeg\";}[/attribute]<p></p><p style=\"line-height: 24px;\">阿迪发生地方</p><a href=\"attachs/14/2/10/24/2200263018.jpeg\"><img src=\"attachs/14/2/10/24/t_2200263018.jpeg\" class=\"feedimg\" alt=\"\" /></a><br /><p></p><p style=\"line-height: 24px;\">阿迪发生地方</p><br /><p style=\"line-height: 24px;\">阿迪发生地方</p><br /><p style=\"line-height: 24px;\">阿迪发生地方</p><p style=\"line-height: 24px;\">阿迪发生地方</p><br /><p style=\"line-height: 24px;\">阿迪发生地方</p><p style=\"line-height: 24px;\">阿迪发生地方</p><br /><br /><p><br /></p>', '1', '3', '0', '0', '0', '0', '1404270474');
INSERT INTO `yb_blog` VALUES ('36', '1', '0', '1', '0', '王菲,可爱女人', null, '[attribute]a:0:{}[/attribute]测试', '1', '1', '0', '0', '0', '0', '1404272343');
INSERT INTO `yb_blog` VALUES ('37', '1', '0', '1', '0', '', '233', '[attribute]a:1:{i:0;s:52:\"http://shougongquan.com/attachs/14/7/02/37/t_1833246689.png\";}[/attribute]<p>多少分</p><p><br /></p><p>阿斯打发</p><p><a href=\"http://shougongquan.com/attachs/14/7/02/37/1833246689.png\"><img src=\"http://shougongquan.com/attachs/14/7/02/37/t_1833246689.png\" class=\"feedimg\" alt=\"\" /></a><br /></p>', '1', '1', '0', '0', '0', '0', '1404297224');
INSERT INTO `yb_blog` VALUES ('39', '1', '0', '1', '0', '', null, '[attribute]a:1:{i:0;s:28:\"attachs/14/7/02/39/t_1836042493.png\";}[/attribute]<a href=\"attachs/14/7/02/39/1836042493.png\"><img src=\"attachs/14/7/02/39/t_1836042493.png\" class=\"feedimg\" alt=\"\" /></a>', '1', '5', '4', '3', '0', '0', '1404297366');
INSERT INTO `yb_blog` VALUES ('43', '1', '0', '3', '0', '', null, '[repto]a:4:{s:3:\"uid\";s:1:\"1\";s:8:\"username\";s:12:\"左文右刀\";s:6:\"domain\";s:8:\"jasonliu\";s:4:\"time\";i:1404552235;}[/repto][attribute]a:2:{s:5:\"count\";i:1;s:3:\"img\";a:1:{i:0;a:2:{s:3:\"url\";s:35:\"attachs/14/7/02/38/t_1835525044.png\";s:4:\"desc\";s:0:\"\";}}}[/attribute]', '1', '0', '0', '0', '0', '0', '1404553595');
INSERT INTO `yb_blog` VALUES ('40', '22', '0', '1', '0', '', '测试', '[attribute]a:0:{}[/attribute]dongliu_test', '1', '0', '0', '0', '0', '0', '1404552149');
INSERT INTO `yb_blog` VALUES ('41', '22', '0', '3', '0', '', null, '[repto]a:4:{s:3:\"uid\";s:1:\"1\";s:8:\"username\";s:12:\"左文右刀\";s:6:\"domain\";s:8:\"jasonliu\";s:4:\"time\";i:1404552235;}[/repto][attribute]a:2:{s:5:\"count\";i:1;s:3:\"img\";a:1:{i:0;a:2:{s:3:\"url\";s:35:\"attachs/14/7/02/38/t_1835525044.png\";s:4:\"desc\";s:0:\"\";}}}[/attribute]', '1', '0', '2', '0', '0', '0', '1404552235');
INSERT INTO `yb_blog` VALUES ('42', '22', '0', '4', '0', '', '[体育]郑多燕健身舞1', '[attribute]a:1:{i:0;a:5:{s:4:\"type\";s:5:\"youku\";s:3:\"img\";s:86:\"http://g3.ykimg.com/1100641F464D2661DE9D99000B3B409463BEA1-AF34-7097-2634-B4AB271C3C86\";s:3:\"pid\";s:58:\"http://player.youku.com/player.php/sid/XMjM1MTQzOTQ0/v.swf\";s:5:\"title\";s:27:\"[体育]郑多燕健身舞1\";s:3:\"url\";s:47:\"http://v.youku.com/v_show/id_XMjM1MTQzOTQ0.html\";}}[/attribute]dfdf', '1', '1', '0', '0', '0', '0', '1404552487');
INSERT INTO `yb_blog` VALUES ('44', '1', '0', '1', '0', '123', 'fsfsf', '[repto]a:4:{s:3:\"uid\";s:2:\"15\";s:8:\"username\";s:6:\"fdsafs\";s:6:\"domain\";s:0:\"\";s:4:\"time\";i:1404554435;}[/repto] fsfsf', '1', '0', '0', '0', '0', '0', '1404554435');
INSERT INTO `yb_blog` VALUES ('45', '1', '0', '1', '0', '北京股票配资网', '北京股票配资网', '[repto]a:4:{s:3:\"uid\";s:2:\"18\";s:8:\"username\";s:12:\"期货配资\";s:6:\"domain\";s:0:\"\";s:4:\"time\";i:1404557000;}[/repto]北京股票配资网<embed type=\"application/x-shockwave-flash\" classid=\"clsid:d27cdb6e-ae6d-11cf-96b8-4445535400000\" src=\"http://player.youku.com/player.php/sid/XNzA1MzM3MzQ0/v.swf\" wmode=\"opaque\" quality=\"high\" menu=\"false\" play=\"true\" loop=\"true\" allowfullscreen=\"true\" width=\"480\" height=\"400\"><embed src=\"http://player.youku.com/player.php/sid/XNzA1MzM3MzQ0/v.swf\" allowfullscreen=\"true\" quality=\"high\" width=\"480\" height=\"400\" align=\"middle\" allowscriptaccess=\"always\" type=\"application/x-shockwave-flash\"><embed type=\"application/x-shockwave-flash\" classid=\"clsid:d27cdb6e-ae6d-11cf-96b8-4445535400000\" src=\"http://v.youku.com/v_show/id_XNzA1MzM3MzQ0.html\" wmode=\"opaque\" quality=\"high\" menu=\"false\" play=\"true\" loop=\"true\" allowfullscreen=\"true\" width=\"480\" height=\"400\"></embed></embed></embed>', '1', '3', '0', '0', '0', '0', '1404557000');
INSERT INTO `yb_blog` VALUES ('46', '23', '0', '3', '0', '', 'teddkdfkfiwefij', '[attribute]a:2:{s:5:\"count\";i:1;s:3:\"img\";a:1:{i:0;a:2:{s:3:\"url\";s:28:\"attachs/14/7/06/46/t_1451599859.jpg\";s:4:\"desc\";s:16:\"Boston city flow\";}}}[/attribute]', '1', '0', '9', '0', '11', '0', '1404629548');
INSERT INTO `yb_blog` VALUES ('47', '1', '0', '3', '0', '', null, '[repto]a:4:{s:3:\"uid\";s:2:\"23\";s:8:\"username\";s:7:\"minzhan\";s:6:\"domain\";s:0:\"\";s:4:\"time\";i:1404817517;}[/repto][attribute]a:2:{s:5:\"count\";i:1;s:3:\"img\";a:1:{i:0;a:2:{s:3:\"url\";s:35:\"attachs/14/7/06/46/t_1451599859.jpg\";s:4:\"desc\";s:16:\"Boston city flow\";}}}[/attribute]', '1', '0', '2', '0', '0', '0', '1404817517');
INSERT INTO `yb_blog` VALUES ('48', '25', '0', '3', '0', '', null, '[repto]a:4:{s:3:\"uid\";s:2:\"23\";s:8:\"username\";s:7:\"minzhan\";s:6:\"domain\";s:0:\"\";s:4:\"time\";i:1404817517;}[/repto][attribute]a:2:{s:5:\"count\";i:1;s:3:\"img\";a:1:{i:0;a:2:{s:3:\"url\";s:35:\"attachs/14/7/06/46/t_1451599859.jpg\";s:4:\"desc\";s:16:\"Boston city flow\";}}}[/attribute]', '1', '0', '0', '0', '0', '0', '1405166675');
INSERT INTO `yb_blog` VALUES ('49', '25', '0', '3', '0', '', null, '[repto]a:4:{s:3:\"uid\";s:2:\"23\";s:8:\"username\";s:7:\"minzhan\";s:6:\"domain\";s:0:\"\";s:4:\"time\";i:1404817517;}[/repto][attribute]a:2:{s:5:\"count\";i:1;s:3:\"img\";a:1:{i:0;a:2:{s:3:\"url\";s:35:\"attachs/14/7/06/46/t_1451599859.jpg\";s:4:\"desc\";s:16:\"Boston city flow\";}}}[/attribute]', '1', '0', '0', '0', '0', '0', '1405168100');
INSERT INTO `yb_blog` VALUES ('50', '25', '0', '3', '0', '', null, '[repto]a:5:{s:3:\"uid\";s:2:\"23\";s:8:\"username\";s:7:\"minzhan\";s:6:\"domain\";s:0:\"\";s:3:\"bid\";s:2:\"46\";s:4:\"time\";i:1405227391;}[/repto][attribute]a:3:{s:5:\"count\";i:1;s:3:\"img\";a:1:{i:0;a:2:{s:3:\"url\";s:35:\"attachs/14/7/06/46/t_1451599859.jpg\";s:4:\"desc\";s:16:\"Boston city flow\";}}s:9:\"rep_title\";N;}[/attribute]', '1', '0', '0', '0', '0', '0', '1405227391');
INSERT INTO `yb_blog` VALUES ('51', '25', '0', '3', '46', '', null, '[repto]a:5:{s:3:\"uid\";s:2:\"23\";s:8:\"username\";s:7:\"minzhan\";s:6:\"domain\";s:0:\"\";s:3:\"bid\";s:2:\"46\";s:4:\"time\";i:1405227533;}[/repto][attribute]a:3:{s:5:\"count\";i:1;s:3:\"img\";a:1:{i:0;a:2:{s:3:\"url\";s:35:\"attachs/14/7/06/46/t_1451599859.jpg\";s:4:\"desc\";s:16:\"Boston city flow\";}}s:9:\"rep_title\";N;}[/attribute]', '1', '0', '0', '0', '1', '0', '1405227533');
INSERT INTO `yb_blog` VALUES ('52', '25', '0', '3', '46', '', 'teddkdfkfiwefij', '[repto]a:5:{s:3:\"uid\";s:2:\"23\";s:8:\"username\";s:7:\"minzhan\";s:6:\"domain\";s:0:\"\";s:3:\"bid\";s:2:\"46\";s:4:\"time\";i:1405227577;}[/repto][attribute]a:3:{s:5:\"count\";i:1;s:3:\"img\";a:1:{i:0;a:2:{s:3:\"url\";s:35:\"attachs/14/7/06/46/t_1451599859.jpg\";s:4:\"desc\";s:16:\"Boston city flow\";}}s:9:\"rep_title\";s:15:\"teddkdfkfiwefij\";}[/attribute]', '1', '0', '0', '0', '2', '0', '1405227577');
INSERT INTO `yb_blog` VALUES ('53', '25', '0', '3', '46', '', null, '[repto]a:5:{s:3:\"uid\";s:2:\"23\";s:8:\"username\";s:7:\"minzhan\";s:6:\"domain\";s:0:\"\";s:3:\"bid\";s:2:\"46\";s:4:\"time\";i:1405227647;}[/repto][attribute]a:3:{s:5:\"count\";i:1;s:3:\"img\";a:1:{i:0;a:2:{s:3:\"url\";s:35:\"attachs/14/7/06/46/t_1451599859.jpg\";s:4:\"desc\";s:16:\"Boston city flow\";}}s:9:\"rep_title\";s:15:\"teddkdfkfiwefij\";}[/attribute]', '1', '0', '0', '0', '0', '0', '1405227647');
INSERT INTO `yb_blog` VALUES ('54', '25', '0', '3', '46', '', '测试代码', '[repto]a:5:{s:3:\"uid\";s:2:\"23\";s:8:\"username\";s:7:\"minzhan\";s:6:\"domain\";s:0:\"\";s:3:\"bid\";s:2:\"46\";s:4:\"time\";i:1405240588;}[/repto][attribute]a:3:{s:5:\"count\";i:1;s:3:\"img\";a:1:{i:0;a:2:{s:3:\"url\";s:35:\"attachs/14/7/06/46/t_1451599859.jpg\";s:4:\"desc\";s:16:\"Boston city flow\";}}s:12:\"foword_title\";s:15:\"teddkdfkfiwefij\";}[/attribute]', '1', '0', '0', '0', '0', '0', '1405240588');
INSERT INTO `yb_blog` VALUES ('55', '25', '0', '3', '46', '', '先写上测试代码', '[repto]a:5:{s:3:\"uid\";s:2:\"23\";s:8:\"username\";s:7:\"minzhan\";s:6:\"domain\";s:0:\"\";s:3:\"bid\";s:2:\"46\";s:4:\"time\";i:1405241055;}[/repto][attribute]a:3:{s:5:\"count\";i:1;s:3:\"img\";a:1:{i:0;a:2:{s:3:\"url\";s:35:\"attachs/14/7/06/46/t_1451599859.jpg\";s:4:\"desc\";s:16:\"Boston city flow\";}}s:12:\"foword_title\";s:15:\"teddkdfkfiwefij\";}[/attribute]', '1', '0', '0', '0', '0', '0', '1405241055');
INSERT INTO `yb_blog` VALUES ('56', '25', '0', '3', '46', '', '先写上测试代码', '[repto]a:5:{s:3:\"uid\";s:2:\"23\";s:8:\"username\";s:7:\"minzhan\";s:6:\"domain\";s:0:\"\";s:3:\"bid\";s:2:\"46\";s:4:\"time\";i:1405241277;}[/repto][attribute]a:3:{s:5:\"count\";i:1;s:3:\"img\";a:1:{i:0;a:2:{s:3:\"url\";s:35:\"attachs/14/7/06/46/t_1451599859.jpg\";s:4:\"desc\";s:16:\"Boston city flow\";}}s:12:\"foword_title\";s:15:\"teddkdfkfiwefij\";}[/attribute]', '1', '0', '0', '0', '0', '0', '1405241277');
INSERT INTO `yb_blog` VALUES ('57', '25', '0', '3', '46', '', '先写上测试代码', '[repto]a:5:{s:3:\"uid\";s:2:\"23\";s:8:\"username\";s:7:\"minzhan\";s:6:\"domain\";s:0:\"\";s:3:\"bid\";s:2:\"46\";s:4:\"time\";i:1405245643;}[/repto][attribute]a:3:{s:5:\"count\";i:1;s:3:\"img\";a:1:{i:0;a:2:{s:3:\"url\";s:35:\"attachs/14/7/06/46/t_1451599859.jpg\";s:4:\"desc\";s:16:\"Boston city flow\";}}s:12:\"foword_title\";s:15:\"teddkdfkfiwefij\";}[/attribute]', '1', '0', '0', '0', '0', '0', '1405245643');

-- ----------------------------
-- Table structure for `yb_cache`
-- ----------------------------
DROP TABLE IF EXISTS `yb_cache`;
CREATE TABLE `yb_cache` (
  `cachename` varchar(100) NOT NULL,
  `cachevalue` text,
  PRIMARY KEY (`cachename`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yb_cache
-- ----------------------------
INSERT INTO `yb_cache` VALUES ('ybmodel', '1690147915s:1827:\"a:2:{s:5:\"model\";a:5:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";i:3;s:1:\"4\";i:4;s:1:\"5\";}s:4:\"data\";a:5:{i:1;a:10:{s:2:\"id\";s:1:\"1\";s:4:\"icon\";s:4:\"text\";s:4:\"name\";s:6:\"文字\";s:9:\"modelfile\";s:14:\"word.class.php\";s:6:\"status\";s:1:\"1\";s:5:\"mdesc\";s:12:\"发布文字\";s:7:\"version\";s:3:\"1.0\";s:6:\"author\";s:6:\"SYSTEM\";s:7:\"feedtpl\";s:0:\"\";s:3:\"cfg\";s:145:\"imguplod--1--是否开启图片上传\r\nimguploadsize--2048--图片上传尺寸不设置取全局\r\nimagetype--jpg|jpeg|png|gif--图片上传类型\";}i:2;a:10:{s:2:\"id\";s:1:\"2\";s:4:\"icon\";s:5:\"music\";s:4:\"name\";s:6:\"音乐\";s:9:\"modelfile\";s:15:\"music.class.php\";s:6:\"status\";s:1:\"1\";s:5:\"mdesc\";s:12:\"发布音乐\";s:7:\"version\";s:3:\"1.0\";s:6:\"author\";s:6:\"SYSTEM\";s:7:\"feedtpl\";s:0:\"\";s:3:\"cfg\";s:138:\"enableupload--1--是否开启上传发布\r\nuploadsize--5000--允许长传大小(KB)\r\nuploadtype--mp3|wma|mid|midi--允许上传的类型\r\n\";}i:3;a:10:{s:2:\"id\";s:1:\"3\";s:4:\"icon\";s:5:\"photo\";s:4:\"name\";s:6:\"图片\";s:9:\"modelfile\";s:15:\"photo.class.php\";s:6:\"status\";s:1:\"1\";s:5:\"mdesc\";s:12:\"发布图片\";s:7:\"version\";s:3:\"1.0\";s:6:\"author\";s:6:\"SYSTEM\";s:7:\"feedtpl\";s:0:\"\";s:3:\"cfg\";s:115:\"imagetype--jpg|jpeg|png|gif--上传类型\r\nimagesize--20480--上传大小\r\nimagecount--20--每次最大上传数量\";}i:4;a:10:{s:2:\"id\";s:1:\"4\";s:4:\"icon\";s:5:\"video\";s:4:\"name\";s:6:\"视频\";s:9:\"modelfile\";s:15:\"video.class.php\";s:6:\"status\";s:1:\"1\";s:5:\"mdesc\";s:12:\"发布视频\";s:7:\"version\";s:3:\"1.0\";s:6:\"author\";s:6:\"SYSTEM\";s:7:\"feedtpl\";s:0:\"\";s:3:\"cfg\";s:0:\"\";}i:5;a:10:{s:2:\"id\";s:1:\"5\";s:4:\"icon\";s:7:\"product\";s:4:\"name\";s:6:\"宝贝\";s:9:\"modelfile\";s:17:\"product.class.php\";s:6:\"status\";s:1:\"1\";s:5:\"mdesc\";s:12:\"发布宝贝\";s:7:\"version\";s:3:\"1.0\";s:6:\"author\";s:6:\"SYSTEM\";s:7:\"feedtpl\";s:0:\"\";s:3:\"cfg\";s:44:\"enableurl--1--是否开启引用地址发布\";}}}\";');
INSERT INTO `yb_cache` VALUES ('custompageCate', '1690147906s:888:\"a:5:{i:0;a:6:{s:2:\"id\";s:1:\"1\";s:4:\"tags\";s:5:\"about\";s:5:\"title\";s:12:\"关于我们\";s:7:\"keyword\";s:12:\"关于我们\";s:11:\"description\";s:12:\"关于我们\";s:6:\"orders\";s:1:\"1\";}i:1;a:6:{s:2:\"id\";s:1:\"2\";s:4:\"tags\";s:4:\"help\";s:5:\"title\";s:12:\"使用帮助\";s:7:\"keyword\";s:12:\"使用帮助\";s:11:\"description\";s:12:\"使用帮助\";s:6:\"orders\";s:1:\"2\";}i:2;a:6:{s:2:\"id\";s:1:\"3\";s:4:\"tags\";s:4:\"call\";s:5:\"title\";s:12:\"联系我们\";s:7:\"keyword\";s:12:\"联系我们\";s:11:\"description\";s:12:\"联系我们\";s:6:\"orders\";s:1:\"3\";}i:3;a:6:{s:2:\"id\";s:1:\"4\";s:4:\"tags\";s:7:\"service\";s:5:\"title\";s:12:\"服务条款\";s:7:\"keyword\";s:12:\"服务条款\";s:11:\"description\";s:12:\"服务条款\";s:6:\"orders\";s:1:\"4\";}i:4;a:6:{s:2:\"id\";s:1:\"5\";s:4:\"tags\";s:7:\"privacy\";s:5:\"title\";s:12:\"隐私政策\";s:7:\"keyword\";s:12:\"隐私政策\";s:11:\"description\";s:12:\"隐私政策\";s:6:\"orders\";s:1:\"5\";}}\";');
INSERT INTO `yb_cache` VALUES ('adunit', '1690147906s:1224:\"a:6:{i:1;a:7:{s:2:\"id\";s:1:\"1\";s:5:\"title\";s:24:\"首页右侧底部广告\";s:5:\"adesc\";s:24:\"首页右侧底部广告\";s:3:\"img\";s:5:\"1.jpg\";s:6:\"orders\";s:1:\"1\";s:6:\"system\";s:1:\"1\";s:7:\"is_show\";s:1:\"1\";}i:2;a:7:{s:2:\"id\";s:1:\"2\";s:5:\"title\";s:21:\"首页顶部广告位\";s:5:\"adesc\";s:21:\"首页顶部广告位\";s:3:\"img\";s:5:\"2.jpg\";s:6:\"orders\";s:1:\"2\";s:6:\"system\";s:1:\"1\";s:7:\"is_show\";s:1:\"1\";}i:3;a:7:{s:2:\"id\";s:1:\"3\";s:5:\"title\";s:21:\"发现频道广告位\";s:5:\"adesc\";s:21:\"发现频道广告位\";s:3:\"img\";s:5:\"3.jpg\";s:6:\"orders\";s:1:\"4\";s:6:\"system\";s:1:\"1\";s:7:\"is_show\";s:1:\"1\";}i:4;a:7:{s:2:\"id\";s:1:\"4\";s:5:\"title\";s:27:\"推荐频道顶部广告位\";s:5:\"adesc\";s:27:\"推荐频道顶部广告位\";s:3:\"img\";s:5:\"4.jpg\";s:6:\"orders\";s:1:\"3\";s:6:\"system\";s:1:\"1\";s:7:\"is_show\";s:1:\"1\";}i:5;a:7:{s:2:\"id\";s:1:\"5\";s:5:\"title\";s:27:\"用户主页右侧广告位\";s:5:\"adesc\";s:27:\"用户主页右侧广告位\";s:3:\"img\";s:5:\"5.jpg\";s:6:\"orders\";s:1:\"5\";s:6:\"system\";s:1:\"1\";s:7:\"is_show\";s:1:\"1\";}i:6;a:7:{s:2:\"id\";s:1:\"6\";s:5:\"title\";s:30:\"用户主页详情页广告位\";s:5:\"adesc\";s:30:\"用户主页详情页广告位\";s:3:\"img\";s:5:\"6.jpg\";s:6:\"orders\";s:1:\"6\";s:6:\"system\";s:1:\"1\";s:7:\"is_show\";s:1:\"1\";}}\";');
INSERT INTO `yb_cache` VALUES ('findeUserTag_1', '1405243404s:380:\"a:4:{i:0;a:4:{s:5:\"count\";s:1:\"1\";s:3:\"tid\";s:2:\"10\";s:3:\"uid\";s:1:\"1\";s:5:\"title\";s:6:\"群星\";}i:1;a:4:{s:5:\"count\";s:1:\"1\";s:3:\"tid\";s:1:\"9\";s:3:\"uid\";s:1:\"1\";s:5:\"title\";s:6:\"蜗牛\";}i:2;a:4:{s:5:\"count\";s:1:\"1\";s:3:\"tid\";s:2:\"20\";s:3:\"uid\";s:1:\"1\";s:5:\"title\";s:12:\"可爱女人\";}i:3;a:4:{s:5:\"count\";s:1:\"1\";s:3:\"tid\";s:2:\"19\";s:3:\"uid\";s:1:\"1\";s:5:\"title\";s:6:\"王菲\";}}\";');
INSERT INTO `yb_cache` VALUES ('Ad_2', '1705227931s:4:\"b:0;\";');
INSERT INTO `yb_cache` VALUES ('Ad_1', '1705245812s:4:\"b:0;\";');
INSERT INTO `yb_cache` VALUES ('Ad_6', '1705088632s:4:\"b:0;\";');
INSERT INTO `yb_cache` VALUES ('Ad_5', '1705245804s:4:\"b:0;\";');
INSERT INTO `yb_cache` VALUES ('systag', '1690148150s:2504:\"a:26:{i:0;a:4:{s:3:\"cid\";s:1:\"1\";s:8:\"catename\";s:6:\"艺术\";s:4:\"sort\";s:1:\"1\";s:4:\"used\";s:1:\"0\";}i:1;a:4:{s:3:\"cid\";s:1:\"2\";s:8:\"catename\";s:6:\"时尚\";s:4:\"sort\";s:1:\"2\";s:4:\"used\";s:1:\"0\";}i:2;a:4:{s:3:\"cid\";s:1:\"3\";s:8:\"catename\";s:6:\"音乐\";s:4:\"sort\";s:1:\"3\";s:4:\"used\";s:1:\"0\";}i:3;a:4:{s:3:\"cid\";s:1:\"4\";s:8:\"catename\";s:6:\"摄影\";s:4:\"sort\";s:1:\"4\";s:4:\"used\";s:1:\"0\";}i:4;a:4:{s:3:\"cid\";s:1:\"5\";s:8:\"catename\";s:6:\"阅读\";s:4:\"sort\";s:1:\"5\";s:4:\"used\";s:1:\"0\";}i:5;a:4:{s:3:\"cid\";s:1:\"6\";s:8:\"catename\";s:6:\"动漫\";s:4:\"sort\";s:1:\"6\";s:4:\"used\";s:1:\"0\";}i:6;a:4:{s:3:\"cid\";s:1:\"7\";s:8:\"catename\";s:6:\"游戏\";s:4:\"sort\";s:1:\"7\";s:4:\"used\";s:1:\"0\";}i:7;a:4:{s:3:\"cid\";s:1:\"8\";s:8:\"catename\";s:6:\"随笔\";s:4:\"sort\";s:1:\"8\";s:4:\"used\";s:1:\"0\";}i:8;a:4:{s:3:\"cid\";s:1:\"9\";s:8:\"catename\";s:6:\"插画\";s:4:\"sort\";s:1:\"9\";s:4:\"used\";s:1:\"0\";}i:9;a:4:{s:3:\"cid\";s:2:\"10\";s:8:\"catename\";s:6:\"设计\";s:4:\"sort\";s:2:\"10\";s:4:\"used\";s:1:\"0\";}i:10;a:4:{s:3:\"cid\";s:2:\"11\";s:8:\"catename\";s:6:\"建筑\";s:4:\"sort\";s:2:\"11\";s:4:\"used\";s:1:\"0\";}i:11;a:4:{s:3:\"cid\";s:2:\"12\";s:8:\"catename\";s:6:\"创意\";s:4:\"sort\";s:2:\"12\";s:4:\"used\";s:1:\"0\";}i:12;a:4:{s:3:\"cid\";s:2:\"13\";s:8:\"catename\";s:6:\"猎图\";s:4:\"sort\";s:2:\"13\";s:4:\"used\";s:1:\"0\";}i:13;a:4:{s:3:\"cid\";s:2:\"14\";s:8:\"catename\";s:6:\"宠物\";s:4:\"sort\";s:2:\"14\";s:4:\"used\";s:1:\"0\";}i:14;a:4:{s:3:\"cid\";s:2:\"15\";s:8:\"catename\";s:6:\"汽车\";s:4:\"sort\";s:2:\"15\";s:4:\"used\";s:1:\"0\";}i:15;a:4:{s:3:\"cid\";s:2:\"16\";s:8:\"catename\";s:6:\"家居\";s:4:\"sort\";s:2:\"16\";s:4:\"used\";s:1:\"0\";}i:16;a:4:{s:3:\"cid\";s:2:\"17\";s:8:\"catename\";s:9:\"互联网\";s:4:\"sort\";s:2:\"17\";s:4:\"used\";s:1:\"0\";}i:17;a:4:{s:3:\"cid\";s:2:\"18\";s:8:\"catename\";s:6:\"旅行\";s:4:\"sort\";s:2:\"18\";s:4:\"used\";s:1:\"0\";}i:18;a:4:{s:3:\"cid\";s:2:\"19\";s:8:\"catename\";s:6:\"数码\";s:4:\"sort\";s:2:\"19\";s:4:\"used\";s:1:\"0\";}i:19;a:4:{s:3:\"cid\";s:2:\"20\";s:8:\"catename\";s:6:\"影视\";s:4:\"sort\";s:2:\"20\";s:4:\"used\";s:1:\"0\";}i:20;a:4:{s:3:\"cid\";s:2:\"21\";s:8:\"catename\";s:6:\"美食\";s:4:\"sort\";s:2:\"21\";s:4:\"used\";s:1:\"0\";}i:21;a:4:{s:3:\"cid\";s:2:\"22\";s:8:\"catename\";s:6:\"恋物\";s:4:\"sort\";s:2:\"22\";s:4:\"used\";s:1:\"0\";}i:22;a:4:{s:3:\"cid\";s:2:\"23\";s:8:\"catename\";s:6:\"趣味\";s:4:\"sort\";s:2:\"23\";s:4:\"used\";s:1:\"0\";}i:23;a:4:{s:3:\"cid\";s:2:\"24\";s:8:\"catename\";s:6:\"科学\";s:4:\"sort\";s:2:\"24\";s:4:\"used\";s:1:\"0\";}i:24;a:4:{s:3:\"cid\";s:2:\"25\";s:8:\"catename\";s:6:\"军事\";s:4:\"sort\";s:2:\"25\";s:4:\"used\";s:1:\"0\";}i:25;a:4:{s:3:\"cid\";s:2:\"26\";s:8:\"catename\";s:6:\"体育\";s:4:\"sort\";s:2:\"26\";s:4:\"used\";s:1:\"0\";}}\";');
INSERT INTO `yb_cache` VALUES ('Ad_4', '1705089004s:4:\"b:0;\";');
INSERT INTO `yb_cache` VALUES ('findTagHotUser_8a7d725bbec9180f3d6141d58e9217f7', '1405174913s:159:\"a:1:{i:0;a:6:{s:3:\"hit\";s:1:\"1\";s:3:\"uid\";s:1:\"1\";s:5:\"title\";s:6:\"王菲\";s:3:\"bid\";s:2:\"36\";s:8:\"username\";s:12:\"左文右刀\";s:6:\"domain\";s:8:\"jasonliu\";}}\";');
INSERT INTO `yb_cache` VALUES ('findTagHotUser_a31455020ffc7cbb0ab5c59fb78a01c1', '1405174913s:166:\"a:1:{i:0;a:6:{s:3:\"hit\";s:1:\"1\";s:3:\"uid\";s:1:\"1\";s:5:\"title\";s:12:\"可爱女人\";s:3:\"bid\";s:2:\"36\";s:8:\"username\";s:12:\"左文右刀\";s:6:\"domain\";s:8:\"jasonliu\";}}\";');
INSERT INTO `yb_cache` VALUES ('findTagHotUser_d905ce221175bb2d2e23d97c9c26bc0c', '1405174913s:159:\"a:1:{i:0;a:6:{s:3:\"hit\";s:1:\"1\";s:3:\"uid\";s:1:\"1\";s:5:\"title\";s:6:\"蜗牛\";s:3:\"bid\";s:2:\"17\";s:8:\"username\";s:12:\"左文右刀\";s:6:\"domain\";s:8:\"jasonliu\";}}\";');
INSERT INTO `yb_cache` VALUES ('Ad_3', '1705088790s:4:\"b:0;\";');
INSERT INTO `yb_cache` VALUES ('myfollow_4', '1390193565s:8:\"s:1:\"1\";\";');
INSERT INTO `yb_cache` VALUES ('findeUserTag_4', '1390276536s:4:\"b:0;\";');
INSERT INTO `yb_cache` VALUES ('custompage_privacy', '1690171446s:4608:\"a:7:{s:2:\"id\";s:1:\"5\";s:4:\"tags\";s:7:\"privacy\";s:5:\"title\";s:12:\"隐私政策\";s:7:\"keyword\";s:12:\"隐私政策\";s:11:\"description\";s:12:\"隐私政策\";s:6:\"orders\";s:1:\"5\";s:10:\"cpage_body\";a:1:{s:4:\"body\";s:4389:\" <h3>隐私政策</h3> <p>当您在使用我们的服务时，我们将致力于为您提供最可靠的隐私保护措施。未经用户的特别授权，我们承诺不会将用户信息 公开或透露给任何第三方个人或机构，但在下列情形除外：<br> 1) 根据司法机关、政府部门的强制命令提供涉及用户信息的相关资料；<br> 2) 不可抗力与不可控因素导致的信息外泄； <br> 3) 云边网基于自身的合法维权需要而使用用户的相关信息。</p> <p>为了更好地提升云边网的服务质量和进行更精准的网络数据分析，我们将在充分保护用户个人隐私的前提下，对用户数据库进行分析和处理。所有相关的数据分析结果都将被用于有价值的新产品的研发和用户体验的进一步改进。</p> <h3>法律声明</h3> <p>云边网网络平台的所有权和运营权归云边网所有，并保留随时变更平台提供的信息和服务的权利。云边网所提供的相关信息和服务的使用者（以下简称&ldquo;用户&rdquo;）在使用之前必须同意以下的所有条款。</p> <p>用户在云边网平台上发布的信息内容由用户及云边网共同所有，任何其他组织或个人未经用户本人授权同意，不得复制、转载、 擅改其内容。用户不得在点 点网平台发布和散播任何形式的含有下列内容的信息：1）为相关法律法规所禁止；2）有悖于社会公共秩序和善良风俗；3）损害他人合法权益；4）其他云边网 认为不适当在本平台发布的内容。 云边网保留删除和变更上述相关信息的权利。</p> <p>用户应保证在云边网平台的注册信息的真实、准确和完整，并在资料变更时及时更新相关信息。对于任何信息不实所导致的用户本人或第三方损害，云边网不承担任何责任。用户应妥善保管个人注册信息及登录密码等资料，用户将对以其注册用户名进行的所有活动和事件负法律责任。</p> <p>云边网非常强调保护用户的隐私。云边网将致力于为用户提供最可靠的隐私保护措施。未经用户的特别授权，云边网不会将用户 信息公开或透露给任何第三 方个人或机构，但在下列情形除外：1) 根据司法机关、政府部门的强制命令提供涉及用户信息的相关资料； 2) 不可抗力与不可控因素导致的信息外泄； 3) 云边网基于自身的合法维权需要而使用用户的相关信息。</p> <p>用户同意使用云边网平台服务所潜在的风险及其一切可能的后果将完全由自己承担，云边网对这些可能的风险和后果不承担任何责任。</p> <p>云边网不保证云边网平台提供的服务能够满足用户的所有要求，也不保证已存在的服务不会中断，对这些服务的及时性、安全 性、准确性也不作保证。对于 因系统维护或升级的需要而需暂停网络服务的情形，云边网将视具体情形尽可能事先在重要页面发布通知。同时，云边网保留在不事先通知用户的情况下中断或终止 部分或全部服务的权利，对于因服务的中断或终止而造成的用户或第三方的任何损失，云边网不承担任何责任。</p> <p>用户同意尊重和维护云边网平台以及其他用户的合法权益。用户因违反有关法律、法规或协议规定中的任何条款而给云边网或任何第三方造成的损失，用户同意承担由此造成的一切损害赔偿责任。</p> <p>在适用法律允许的范围内，云边网保留对本协议任何条款的解释权和随时变更的权利。 云边网可能会随时根据需要修改本协议的任一条款。如发生此类变更，云边网会提供新版本的条款。用户在变更后对云边网平台服务的使用将视为已完全接受变更后的条款。</p> <p>本协议在根据下述规定终止前，将会一直适用。当下列情况出现时，云边网可以随时中止与用户的协议：1) 用户违反了本协议中的任何规定；2) 法律法规要求终止本协议;3) 云边网认为实际情形不再适宜继续执行本协议。</p> <p>本协议及因本协议产生的一切法律关系及纠纷，均适用中华人民共和国法律。用户与云边网在此同意以云边网营业所在地法院管辖。</p> \";}}\";');
INSERT INTO `yb_cache` VALUES ('custompage_help', '1690171446s:1869:\"a:7:{s:2:\"id\";s:1:\"2\";s:4:\"tags\";s:4:\"help\";s:5:\"title\";s:12:\"使用帮助\";s:7:\"keyword\";s:12:\"使用帮助\";s:11:\"description\";s:12:\"使用帮助\";s:6:\"orders\";s:1:\"2\";s:10:\"cpage_body\";a:1:{s:4:\"body\";s:1653:\" <h3>发布内容</h3> <p>登陆后点击右侧 文字链接，即可进入发布文字功能。可输入内容，并可插入单张图片</p> <h3>发布音乐</h3> <p>登陆后点击右侧 音乐，即可进入发布音乐功能。您可以选择网络音乐 和 本地上传两种方式。</p> <p>网络音乐引用地址可以输入虾米、雅燃音乐、音悦台、优酷、土豆、6间房、腾讯播客、新浪博客、56.com等诸多网站播放地址。 也可以直接粘贴网络后缀为mp3的歌曲。</p> <p>本地上传您可以上传本地的MP3文件，但请注意的是您需要拥有该媒体的著作权，也就是说您自己录或者制作的音乐皆可，但不能上传网络上不属于您的版权的音乐。如果被查出或举报或版权纠纷我们将不负任何责任，并且删除该媒体资源。</p> <h3>发布图片</h3> <p>您可以同时上传最多20张照片作为博客内容，并且也可以编写介绍。</p> <h3>发布视频</h3> <p>视频引用地址可以输入虾米、雅燃音乐、音悦台、优酷、土豆、6间房、腾讯播客、新浪博客、56.com等诸多网站播放地址。建议您可以将录制好的视频传至以上媒体然后填写引用地址。</p> <p>同时您也可以编写介绍</p> <h3>关于标签</h3> <p>不管发布任何内容您都需要填写至少一个标签，轻博内容将根据标签来进行区分。因此填写一个或多个合适的标签是非常不错的选择。</p> <h3>关注和喜欢</h3> <p>加为关注的用户将会在您的首页显示最新发布动态</p> <p>加为喜欢的博客可方便您在右侧导航中快速的查找</p> \";}}\";');
INSERT INTO `yb_cache` VALUES ('custompage_call', '1690171664s:536:\"a:7:{s:2:\"id\";s:1:\"3\";s:4:\"tags\";s:4:\"call\";s:5:\"title\";s:12:\"联系我们\";s:7:\"keyword\";s:12:\"联系我们\";s:11:\"description\";s:12:\"联系我们\";s:6:\"orders\";s:1:\"3\";s:10:\"cpage_body\";a:1:{s:4:\"body\";s:321:\"<h3>官方网站</h3> <p>http://qing.thinksaas.cn</p> <h3>邮箱</h3> <p>nxfte<span id=\"ats\"></span>qq.com</p> <h3>交流群</h3> <p>qq group 176221558</p> <h3>商业授权</h3> <p>QQ：234027573</p> <h3>付款地址</h3> <p><a href=\"https://me.alipay.com/anythink\" target=\"_blank\">https://me.alipay.com/anythink</a></p> \";}}\";');
INSERT INTO `yb_cache` VALUES ('custompage_about', '1690171664s:239:\"a:7:{s:2:\"id\";s:1:\"1\";s:4:\"tags\";s:5:\"about\";s:5:\"title\";s:12:\"关于我们\";s:7:\"keyword\";s:12:\"关于我们\";s:11:\"description\";s:12:\"关于我们\";s:6:\"orders\";s:1:\"1\";s:10:\"cpage_body\";a:1:{s:4:\"body\";s:24:\"相逢的人会再相逢\";}}\";');
INSERT INTO `yb_cache` VALUES ('custompage_service', '1690171748s:4795:\"a:7:{s:2:\"id\";s:1:\"4\";s:4:\"tags\";s:7:\"service\";s:5:\"title\";s:12:\"服务条款\";s:7:\"keyword\";s:12:\"服务条款\";s:11:\"description\";s:12:\"服务条款\";s:6:\"orders\";s:1:\"4\";s:10:\"cpage_body\";a:1:{s:4:\"body\";s:4576:\"<p>本协议适用于云边网开发的云边网平台。使用云边网平台以及与其相关联的各项技术服务和网络服务之前，您必须同意接受本协议。若不接受本协议，您将无法使用云边网平台及相关服务。</p> <p>您可以通过以下方式接受本协议：一旦您注册云边账户并且发布第一条信息起，您对云边网平台及其他相关服务的使用将被视为您自实际 使用起便接受了本协议的全部条款。如果需要注销用户请发送注销申请邮件，我们将删除与您有关的全部内容，您与云边网所有服务都将被终止。注册账户需要用户 本人电子邮件作为注册账号，如果用户使用他人邮件账号注册并被邮件归属人举证成功者将删除用户账号及所有内容，并且一切法律责任自行承担，本站不承担任何 责任。</p> <p>云边网网络平台的所有权和运营权归云边网所有，并保留随时变更平台提供的信息和服务的权利。云边网所提供的相关信息和服务的使用者（以下简称&ldquo;用户&rdquo;）在使用之前必须同意以下的所有条款。</p> <p>用户在云边网平台上发布的信息内容由用户及云边网共同所有，任何其他组织或个人未经用户本人授权同意，不得复制、转载、擅改其内容。用户不得在云边网平台发布和散播任何形式的含有下列内容的信息：<br> 1）为相关法律法规所禁止；<br> 2）有悖于社会公共秩序和善良风俗；<br> 3）损害他人合法权益；<br> 4）其他云边网 认为不适当在本平台发布的内容。 <br> 5）通过发布音乐的上传功能上传非用户本人拥有版权的音频媒体。 <br> 云边网保留删除和变更上述相关信息的权利。</p> <p>用户应保证在云边网平台的注册信息的真实、准确和完整，并在资料变更时及时更新相关信息。对于任何信息不实所导致的用户本人或第三方损害，云边网不承担任何责任。用户应妥善保管个人注册信息及登录密码等资料，用户将对以其注册用户名进行的所有活动和事件负法律责任。</p> <p>云边网非常强调保护用户的隐私。云边网将致力于为用户提供最可靠的隐私保护措施。未经用户的特别授权，云边网不会将用户信息公开或透露给任何第三 方个人或机构，但在下列情形除外：<br> 1) 根据司法机关、政府部门的强制命令提供涉及用户信息的相关资料； <br> 2) 不可抗力与不可控因素导致的信息外泄；<br> 3) 云边网基于自身的合法维权需要而使用用户的相关信息。</p> <p>用户同意使用云边网平台服务所潜在的风险及其一切可能的后果将完全由自己承担，云边网对这些可能的风险和后果不承担任何责任。</p> <p>云边网不保证云边网平台提供的服务能够满足用户的所有要求，也不保证已存在的服务不会中断，对这些服务的及时性、安全 性、准确性也不作保证。对于因系统维护或升级的需要而需暂停网络服务的情形，云边网将视具体情形尽可能事先在重要页面发布通知。同时，云边网保留在不事先 通知用户的情况下中断或终止部分或全部服务的权利，对于因服务的中断或终止而造成的用户或第三方的任何损失，云边网不承担任何责任。</p> <p>用户同意尊重和维护云边网平台以及其他用户的合法权益。用户因违反有关法律、法规或协议规定中的任何条款而给云边网或任何第三方造成的损失，用户同意承担由此造成的一切损害赔偿责任。</p> <p>在适用法律允许的范围内，云边网保留对本协议任何条款的解释权和随时变更的权利。 云边网可能会随时根据需要修改本协议的任一条款。如发生此类变更，云边网会提供新版本的条款。用户在变更后对云边网平台服务的使用将视为已完全接受变更后的条款。</p> <p>本协议在根据下述规定终止前，将会一直适用。当下列情况出现时，云边网可以随时中止与用户的协议：<br> 1) 用户违反了本协议中的任何规定；<br> 2) 法律法规要求终止本协议;<br> 3) 云边网认为实际情形不再适宜继续执行本协议。</p> <p>本协议及因本协议产生的一切法律关系及纠纷，均适用中华人民共和国法律。用户与云边网在此同意以云边网营业所在地法院管辖。</p> \";}}\";');
INSERT INTO `yb_cache` VALUES ('findeUserTag_5', '1391827993s:4:\"b:0;\";');
INSERT INTO `yb_cache` VALUES ('findTagHotUser_f0603b44ba2ed900ce9d11ba554dfbda', '1405174913s:148:\"a:1:{i:0;a:6:{s:3:\"hit\";s:1:\"1\";s:3:\"uid\";s:2:\"10\";s:5:\"title\";s:7:\"qiumoji\";s:3:\"bid\";s:2:\"25\";s:8:\"username\";s:8:\"xingbang\";s:6:\"domain\";s:0:\"\";}}\";');
INSERT INTO `yb_cache` VALUES ('findTagHotUser_1633e72547b640afcc7ae5ec089e5df1', '1405174913s:4:\"b:0;\";');
INSERT INTO `yb_cache` VALUES ('findTagHotUser_f6545372b16af618dc8d1f1ef43ddeca', '1404625304s:159:\"a:1:{i:0;a:6:{s:3:\"hit\";s:1:\"1\";s:3:\"uid\";s:1:\"1\";s:5:\"title\";s:6:\"i11evn\";s:3:\"bid\";s:2:\"12\";s:8:\"username\";s:12:\"左文右刀\";s:6:\"domain\";s:8:\"jasonliu\";}}\";');
INSERT INTO `yb_cache` VALUES ('findeUserTag_7', '1390379706s:4:\"b:0;\";');
INSERT INTO `yb_cache` VALUES ('myfollow_1', '1404822050s:34:\"s:26:\"2,4,5,7,6,3,21,19,22,18,23\";\";');
INSERT INTO `yb_cache` VALUES ('myfollow_5', '1390303797s:10:\"s:3:\"1,4\";\";');
INSERT INTO `yb_cache` VALUES ('findTagHotUser_04251f6dc9da40c4d842e381bcf4d039', '1405174913s:159:\"a:1:{i:0;a:6:{s:3:\"hit\";s:1:\"1\";s:3:\"uid\";s:1:\"1\";s:5:\"title\";s:6:\"群星\";s:3:\"bid\";s:2:\"17\";s:8:\"username\";s:12:\"左文右刀\";s:6:\"domain\";s:8:\"jasonliu\";}}\";');
INSERT INTO `yb_cache` VALUES ('findeUserTag_9', '1397113280s:4:\"b:0;\";');
INSERT INTO `yb_cache` VALUES ('myfollow_9', '1397030531s:4:\"b:0;\";');
INSERT INTO `yb_cache` VALUES ('findeUserTag_10', '1398741766s:4:\"b:0;\";');
INSERT INTO `yb_cache` VALUES ('findeUserTag_11', '1401974874s:4:\"b:0;\";');
INSERT INTO `yb_cache` VALUES ('findeUserTag_12', '1402815588s:116:\"a:1:{i:0;a:4:{s:5:\"count\";s:1:\"1\";s:3:\"tid\";s:2:\"12\";s:3:\"uid\";s:2:\"12\";s:5:\"title\";s:22:\"智深配资 股票配\";}}\";');
INSERT INTO `yb_cache` VALUES ('findeUserTag_13', '1403862547s:4:\"b:0;\";');
INSERT INTO `yb_cache` VALUES ('findTagHotUser_c6f057b86584942e415435ffb1fa93d4', '1405174913s:140:\"a:1:{i:0;a:6:{s:3:\"hit\";s:1:\"1\";s:3:\"uid\";s:2:\"13\";s:5:\"title\";s:3:\"000\";s:3:\"bid\";s:2:\"27\";s:8:\"username\";s:4:\"safs\";s:6:\"domain\";s:0:\"\";}}\";');
INSERT INTO `yb_cache` VALUES ('findTagHotUser_21367c4305df46ed0888dc309bbd6fb2', '1404625303s:159:\"a:1:{i:0;a:6:{s:3:\"hit\";s:1:\"1\";s:3:\"uid\";s:1:\"1\";s:5:\"title\";s:6:\"红豆\";s:3:\"bid\";s:2:\"10\";s:8:\"username\";s:12:\"左文右刀\";s:6:\"domain\";s:8:\"jasonliu\";}}\";');
INSERT INTO `yb_cache` VALUES ('findTagHotUser_9ce7e6c1453b194d912be747d967bc1d', '1404625303s:166:\"a:1:{i:0;a:6:{s:3:\"hit\";s:1:\"1\";s:3:\"uid\";s:1:\"1\";s:5:\"title\";s:12:\"괜찮은데\";s:3:\"bid\";s:2:\"12\";s:8:\"username\";s:12:\"左文右刀\";s:6:\"domain\";s:8:\"jasonliu\";}}\";');
INSERT INTO `yb_cache` VALUES ('findTagHotUser_257c74b745351914c293ebd1b0302348', '1404625304s:161:\"a:1:{i:0;a:6:{s:3:\"hit\";s:1:\"1\";s:3:\"uid\";s:1:\"1\";s:5:\"title\";s:9:\"致青春\";s:3:\"bid\";s:1:\"9\";s:8:\"username\";s:12:\"左文右刀\";s:6:\"domain\";s:8:\"jasonliu\";}}\";');
INSERT INTO `yb_cache` VALUES ('findTagHotUser_81fc9cd56b9f480b0a5beaa6a6e6d769', '1405174913s:168:\"a:1:{i:0;a:6:{s:3:\"hit\";s:1:\"1\";s:3:\"uid\";s:2:\"18\";s:5:\"title\";s:21:\"北京股票配资网\";s:3:\"bid\";s:2:\"34\";s:8:\"username\";s:12:\"期货配资\";s:6:\"domain\";s:0:\"\";}}\";');
INSERT INTO `yb_cache` VALUES ('discoverTag_30', '1405174913s:2209:\"a:9:{i:0;a:5:{s:3:\"hit\";s:1:\"4\";s:3:\"uid\";s:2:\"15\";s:5:\"title\";s:3:\"123\";s:3:\"bid\";s:2:\"29\";s:5:\"ulist\";a:1:{i:0;a:6:{s:3:\"hit\";s:1:\"4\";s:3:\"uid\";s:2:\"15\";s:5:\"title\";s:3:\"123\";s:3:\"bid\";s:2:\"29\";s:8:\"username\";s:6:\"fdsafs\";s:6:\"domain\";s:0:\"\";}}}i:1;a:5:{s:3:\"hit\";s:1:\"1\";s:3:\"uid\";s:1:\"1\";s:5:\"title\";s:6:\"王菲\";s:3:\"bid\";s:2:\"36\";s:5:\"ulist\";a:1:{i:0;a:6:{s:3:\"hit\";s:1:\"1\";s:3:\"uid\";s:1:\"1\";s:5:\"title\";s:6:\"王菲\";s:3:\"bid\";s:2:\"36\";s:8:\"username\";s:12:\"左文右刀\";s:6:\"domain\";s:8:\"jasonliu\";}}}i:2;a:5:{s:3:\"hit\";s:1:\"1\";s:3:\"uid\";s:2:\"13\";s:5:\"title\";s:3:\"000\";s:3:\"bid\";s:2:\"27\";s:5:\"ulist\";a:1:{i:0;a:6:{s:3:\"hit\";s:1:\"1\";s:3:\"uid\";s:2:\"13\";s:5:\"title\";s:3:\"000\";s:3:\"bid\";s:2:\"27\";s:8:\"username\";s:4:\"safs\";s:6:\"domain\";s:0:\"\";}}}i:3;a:5:{s:3:\"hit\";s:1:\"1\";s:3:\"uid\";s:1:\"1\";s:5:\"title\";s:6:\"群星\";s:3:\"bid\";s:2:\"17\";s:5:\"ulist\";a:1:{i:0;a:6:{s:3:\"hit\";s:1:\"1\";s:3:\"uid\";s:1:\"1\";s:5:\"title\";s:6:\"群星\";s:3:\"bid\";s:2:\"17\";s:8:\"username\";s:12:\"左文右刀\";s:6:\"domain\";s:8:\"jasonliu\";}}}i:4;a:5:{s:3:\"hit\";s:1:\"1\";s:3:\"uid\";s:1:\"1\";s:5:\"title\";s:12:\"可爱女人\";s:3:\"bid\";s:2:\"36\";s:5:\"ulist\";a:1:{i:0;a:6:{s:3:\"hit\";s:1:\"1\";s:3:\"uid\";s:1:\"1\";s:5:\"title\";s:12:\"可爱女人\";s:3:\"bid\";s:2:\"36\";s:8:\"username\";s:12:\"左文右刀\";s:6:\"domain\";s:8:\"jasonliu\";}}}i:5;a:5:{s:3:\"hit\";s:1:\"1\";s:3:\"uid\";s:2:\"10\";s:5:\"title\";s:7:\"qiumoji\";s:3:\"bid\";s:2:\"25\";s:5:\"ulist\";a:1:{i:0;a:6:{s:3:\"hit\";s:1:\"1\";s:3:\"uid\";s:2:\"10\";s:5:\"title\";s:7:\"qiumoji\";s:3:\"bid\";s:2:\"25\";s:8:\"username\";s:8:\"xingbang\";s:6:\"domain\";s:0:\"\";}}}i:6;a:5:{s:3:\"hit\";s:1:\"1\";s:3:\"uid\";s:2:\"18\";s:5:\"title\";s:21:\"北京股票配资网\";s:3:\"bid\";s:2:\"34\";s:5:\"ulist\";a:1:{i:0;a:6:{s:3:\"hit\";s:1:\"1\";s:3:\"uid\";s:2:\"18\";s:5:\"title\";s:21:\"北京股票配资网\";s:3:\"bid\";s:2:\"34\";s:8:\"username\";s:12:\"期货配资\";s:6:\"domain\";s:0:\"\";}}}i:7;a:5:{s:3:\"hit\";s:1:\"1\";s:3:\"uid\";s:2:\"12\";s:5:\"title\";s:22:\"智深配资 股票配\";s:3:\"bid\";s:2:\"26\";s:5:\"ulist\";b:0;}i:8;a:5:{s:3:\"hit\";s:1:\"1\";s:3:\"uid\";s:1:\"1\";s:5:\"title\";s:6:\"蜗牛\";s:3:\"bid\";s:2:\"17\";s:5:\"ulist\";a:1:{i:0;a:6:{s:3:\"hit\";s:1:\"1\";s:3:\"uid\";s:1:\"1\";s:5:\"title\";s:6:\"蜗牛\";s:3:\"bid\";s:2:\"17\";s:8:\"username\";s:12:\"左文右刀\";s:6:\"domain\";s:8:\"jasonliu\";}}}}\";');
INSERT INTO `yb_cache` VALUES ('myfollow_14', '1403835284s:4:\"b:0;\";');
INSERT INTO `yb_cache` VALUES ('findTagHotUser_d41d8cd98f00b204e9800998ecf8427e', '1404653820s:4:\"b:0;\";');
INSERT INTO `yb_cache` VALUES ('findeUserTag_15', '1403924519s:96:\"a:1:{i:0;a:4:{s:5:\"count\";s:1:\"1\";s:3:\"tid\";s:2:\"14\";s:3:\"uid\";s:2:\"15\";s:5:\"title\";s:3:\"123\";}}\";');
INSERT INTO `yb_cache` VALUES ('myfollow_15', '1403843027s:4:\"b:0;\";');
INSERT INTO `yb_cache` VALUES ('findTagHotUser_202cb962ac59075b964b07152d234b70', '1405174913s:142:\"a:1:{i:0;a:6:{s:3:\"hit\";s:1:\"4\";s:3:\"uid\";s:2:\"15\";s:5:\"title\";s:3:\"123\";s:3:\"bid\";s:2:\"29\";s:8:\"username\";s:6:\"fdsafs\";s:6:\"domain\";s:0:\"\";}}\";');
INSERT INTO `yb_cache` VALUES ('findTagHotUser_a85d63d01bd61ccd5d2798bcb6bc4c99', '1403925485s:4:\"b:0;\";');
INSERT INTO `yb_cache` VALUES ('findeUserTag_18', '1404307130s:115:\"a:1:{i:0;a:4:{s:5:\"count\";s:1:\"1\";s:3:\"tid\";s:2:\"18\";s:3:\"uid\";s:2:\"18\";s:5:\"title\";s:21:\"北京股票配资网\";}}\";');
INSERT INTO `yb_cache` VALUES ('myfollow_23', '1404648637s:11:\"s:4:\"1,22\";\";');
INSERT INTO `yb_cache` VALUES ('findTagHotUser_b7b80022c8105bd688c8e087eb0eb672', '1404359098s:4:\"b:0;\";');
INSERT INTO `yb_cache` VALUES ('findTagHotUser_8277e0910d750195b448797616e091ad', '1404359219s:4:\"b:0;\";');
INSERT INTO `yb_cache` VALUES ('findTagHotUser_db06c78d1e24cf708a14ce81c9b617ec', '1404359349s:4:\"b:0;\";');
INSERT INTO `yb_cache` VALUES ('ybconfig', '1704340872s:1963:\"a:48:{s:11:\"addimg_type\";s:16:\"jpg|png|jpge|bmp\";s:13:\"addimg_upsize\";s:7:\"2097152\";s:9:\"cookiekey\";s:0:\"\";s:9:\"cookiepre\";s:0:\"\";s:9:\"guestMode\";s:1:\"0\";s:14:\"hotuser_switch\";s:1:\"1\";s:12:\"invite_count\";s:1:\"5\";s:17:\"invite_expiration\";s:2:\"10\";s:13:\"invite_switch\";s:1:\"0\";s:11:\"keep_domain\";s:230:\"www,yunbian,bbs,music,map,index,register,login,tag,now,admin,recommend,discovery,myfollow,mypost,mylikes,myreplays,mynotices,edit,logout,home,gomember,location,showinfo,about,copyright,call,service,privacy,custom,read,pm,user,site\";s:10:\"keep_email\";s:13:\"admin,yunbian\";s:11:\"keep_niname\";s:68:\"yunbian,admin,administrator,master,webmaster,email,username,password\";s:8:\"keep_rep\";s:19:\"操你妈,艹你妈\";s:15:\"loginCodeSwitch\";s:1:\"0\";s:9:\"mail_from\";s:0:\"\";s:13:\"mail_fromname\";s:0:\"\";s:9:\"mail_host\";s:0:\"\";s:9:\"mail_open\";s:1:\"0\";s:9:\"mail_port\";s:0:\"\";s:8:\"mail_pwd\";s:10:\"1986214214\";s:9:\"mail_user\";s:18:\"liuhengmao@163.com\";s:18:\"openlogin_qq_appid\";s:9:\"101052745\";s:19:\"openlogin_qq_appkey\";s:32:\"0e9664968766eb4a9f01b9de47b3b0c8\";s:21:\"openlogin_qq_callback\";s:66:\"http://shougongquan.com/index.php?c=openconnect&a=qq&callback=true\";s:17:\"openlogin_qq_open\";s:1:\"1\";s:20:\"openlogin_weib_appid\";s:0:\"\";s:21:\"openlogin_weib_appkey\";s:0:\"\";s:23:\"openlogin_weib_callback\";s:0:\"\";s:19:\"openlogin_weib_open\";s:1:\"1\";s:16:\"post_verify_http\";s:0:\"\";s:19:\"post_verify_keyword\";s:0:\"\";s:18:\"post_verify_switch\";s:1:\"0\";s:15:\"post_verify_url\";s:0:\"\";s:13:\"recomm_switch\";s:1:\"1\";s:13:\"regCodeSwitch\";s:1:\"0\";s:12:\"show_ajax_to\";s:1:\"4\";s:14:\"show_page_mode\";s:1:\"1\";s:13:\"show_page_num\";s:2:\"10\";s:10:\"site_count\";s:0:\"\";s:9:\"site_desc\";s:6:\"推推\";s:8:\"site_icp\";s:0:\"\";s:12:\"site_keyword\";s:36:\"推推,推推网,淘宝推推,购物\";s:10:\"site_title\";s:6:\"推推\";s:13:\"site_titlepre\";s:24:\"相逢的人会再相逢\";s:12:\"theme_upload\";s:1:\"1\";s:16:\"theme_uploadsize\";s:7:\"1048576\";s:16:\"theme_uploadtype\";s:11:\"jpg,png,gif\";s:13:\"wizard_switch\";s:1:\"1\";}\";');
INSERT INTO `yb_cache` VALUES ('findeUserTag_23', '1404731665s:4:\"b:0;\";');
INSERT INTO `yb_cache` VALUES ('findeUserTag_21', '1404625325s:4:\"b:0;\";');
INSERT INTO `yb_cache` VALUES ('recommend_shuffle_all', '1405174913s:8194:\"a:28:{i:0;a:9:{s:3:\"bid\";s:2:\"47\";s:5:\"title\";N;s:4:\"body\";b:0;s:4:\"type\";s:1:\"3\";s:3:\"uid\";s:1:\"1\";s:8:\"username\";s:12:\"左文右刀\";s:5:\"b_url\";s:35:\"/index.php?c=userblog&a=show&bid=47\";s:3:\"tag\";s:0:\"\";s:3:\"img\";s:35:\"attachs/14/7/06/46/t_1451599859.jpg\";}i:1;a:9:{s:3:\"bid\";s:2:\"46\";s:5:\"title\";N;s:4:\"body\";b:0;s:4:\"type\";s:1:\"3\";s:3:\"uid\";s:2:\"23\";s:8:\"username\";s:7:\"minzhan\";s:5:\"b_url\";s:35:\"/index.php?c=userblog&a=show&bid=46\";s:3:\"tag\";s:0:\"\";s:3:\"img\";s:35:\"attachs/14/7/06/46/t_1451599859.jpg\";}i:2;a:9:{s:3:\"bid\";s:2:\"45\";s:5:\"title\";s:21:\"北京股票配资网\";s:4:\"body\";s:21:\"北京股票配资网\";s:4:\"type\";s:1:\"1\";s:3:\"uid\";s:1:\"1\";s:8:\"username\";s:12:\"左文右刀\";s:5:\"b_url\";s:35:\"/index.php?c=userblog&a=show&bid=45\";s:3:\"tag\";s:21:\"北京股票配资网\";s:3:\"img\";s:1:\" \";}i:3;a:9:{s:3:\"bid\";s:2:\"44\";s:5:\"title\";s:5:\"fsfsf\";s:4:\"body\";s:6:\" fsfsf\";s:4:\"type\";s:1:\"1\";s:3:\"uid\";s:1:\"1\";s:8:\"username\";s:12:\"左文右刀\";s:5:\"b_url\";s:35:\"/index.php?c=userblog&a=show&bid=44\";s:3:\"tag\";s:3:\"123\";s:3:\"img\";s:1:\" \";}i:4;a:9:{s:3:\"bid\";s:2:\"43\";s:5:\"title\";N;s:4:\"body\";b:0;s:4:\"type\";s:1:\"3\";s:3:\"uid\";s:1:\"1\";s:8:\"username\";s:12:\"左文右刀\";s:5:\"b_url\";s:35:\"/index.php?c=userblog&a=show&bid=43\";s:3:\"tag\";s:0:\"\";s:3:\"img\";s:35:\"attachs/14/7/02/38/t_1835525044.png\";}i:5;a:9:{s:3:\"bid\";s:2:\"41\";s:5:\"title\";N;s:4:\"body\";b:0;s:4:\"type\";s:1:\"3\";s:3:\"uid\";s:2:\"22\";s:8:\"username\";s:6:\"东流\";s:5:\"b_url\";s:35:\"/index.php?c=userblog&a=show&bid=41\";s:3:\"tag\";s:0:\"\";s:3:\"img\";s:35:\"attachs/14/7/02/38/t_1835525044.png\";}i:6;a:9:{s:3:\"bid\";s:2:\"40\";s:5:\"title\";s:6:\"测试\";s:4:\"body\";s:12:\"dongliu_test\";s:4:\"type\";s:1:\"1\";s:3:\"uid\";s:2:\"22\";s:8:\"username\";s:6:\"东流\";s:5:\"b_url\";s:35:\"/index.php?c=userblog&a=show&bid=40\";s:3:\"tag\";s:0:\"\";s:3:\"img\";s:1:\" \";}i:7;a:9:{s:3:\"bid\";s:2:\"39\";s:5:\"title\";N;s:4:\"body\";b:0;s:4:\"type\";s:1:\"1\";s:3:\"uid\";s:1:\"1\";s:8:\"username\";s:12:\"左文右刀\";s:5:\"b_url\";s:35:\"/index.php?c=userblog&a=show&bid=39\";s:3:\"tag\";s:0:\"\";s:3:\"img\";s:1:\" \";}i:8;a:9:{s:3:\"bid\";s:2:\"37\";s:5:\"title\";s:3:\"233\";s:4:\"body\";s:21:\"多少分阿斯打发\";s:4:\"type\";s:1:\"1\";s:3:\"uid\";s:1:\"1\";s:8:\"username\";s:12:\"左文右刀\";s:5:\"b_url\";s:35:\"/index.php?c=userblog&a=show&bid=37\";s:3:\"tag\";s:0:\"\";s:3:\"img\";s:1:\" \";}i:9;a:9:{s:3:\"bid\";s:2:\"36\";s:5:\"title\";N;s:4:\"body\";s:6:\"测试\";s:4:\"type\";s:1:\"1\";s:3:\"uid\";s:1:\"1\";s:8:\"username\";s:12:\"左文右刀\";s:5:\"b_url\";s:35:\"/index.php?c=userblog&a=show&bid=36\";s:3:\"tag\";s:6:\"王菲\";s:3:\"img\";s:1:\" \";}i:10;a:9:{s:3:\"bid\";s:2:\"35\";s:5:\"title\";s:6:\"测试\";s:4:\"body\";s:126:\"阿迪发生地方阿迪发生地方阿迪发生地方阿迪发生地方阿迪发生地方阿迪发生地方阿迪发生地方\";s:4:\"type\";s:1:\"1\";s:3:\"uid\";s:2:\"19\";s:8:\"username\";s:7:\" 文刀\";s:5:\"b_url\";s:35:\"/index.php?c=userblog&a=show&bid=35\";s:3:\"tag\";s:0:\"\";s:3:\"img\";s:1:\" \";}i:11;a:9:{s:3:\"bid\";s:2:\"34\";s:5:\"title\";s:21:\"北京股票配资网\";s:4:\"body\";s:21:\"北京股票配资网\";s:4:\"type\";s:1:\"1\";s:3:\"uid\";s:2:\"18\";s:8:\"username\";s:12:\"期货配资\";s:5:\"b_url\";s:35:\"/index.php?c=userblog&a=show&bid=34\";s:3:\"tag\";s:21:\"北京股票配资网\";s:3:\"img\";s:1:\" \";}i:12;a:9:{s:3:\"bid\";s:2:\"33\";s:5:\"title\";N;s:4:\"body\";s:7:\"4343 34\";s:4:\"type\";s:1:\"3\";s:3:\"uid\";s:2:\"15\";s:8:\"username\";s:6:\"fdsafs\";s:5:\"b_url\";s:35:\"/index.php?c=userblog&a=show&bid=33\";s:3:\"tag\";s:0:\"\";s:3:\"img\";s:35:\"attachs/14/6/27/33/t_1116539913.gif\";}i:13;a:9:{s:3:\"bid\";s:2:\"32\";s:5:\"title\";s:5:\"fsfsf\";s:4:\"body\";s:6:\" fsfsf\";s:4:\"type\";s:1:\"1\";s:3:\"uid\";s:2:\"15\";s:8:\"username\";s:6:\"fdsafs\";s:5:\"b_url\";s:35:\"/index.php?c=userblog&a=show&bid=32\";s:3:\"tag\";s:3:\"123\";s:3:\"img\";s:1:\" \";}i:14;a:9:{s:3:\"bid\";s:2:\"31\";s:5:\"title\";s:4:\"fsfs\";s:4:\"body\";s:7:\" fssfsf\";s:4:\"type\";s:1:\"1\";s:3:\"uid\";s:2:\"15\";s:8:\"username\";s:6:\"fdsafs\";s:5:\"b_url\";s:35:\"/index.php?c=userblog&a=show&bid=31\";s:3:\"tag\";s:3:\"123\";s:3:\"img\";s:1:\" \";}i:15;a:9:{s:3:\"bid\";s:2:\"30\";s:5:\"title\";N;s:4:\"body\";b:0;s:4:\"type\";s:1:\"3\";s:3:\"uid\";s:2:\"15\";s:8:\"username\";s:6:\"fdsafs\";s:5:\"b_url\";s:35:\"/index.php?c=userblog&a=show&bid=30\";s:3:\"tag\";s:3:\"123\";s:3:\"img\";s:35:\"attachs/14/6/27/30/t_1104454527.gif\";}i:16;a:9:{s:3:\"bid\";s:2:\"29\";s:5:\"title\";N;s:4:\"body\";b:0;s:4:\"type\";s:1:\"3\";s:3:\"uid\";s:2:\"15\";s:8:\"username\";s:6:\"fdsafs\";s:5:\"b_url\";s:35:\"/index.php?c=userblog&a=show&bid=29\";s:3:\"tag\";s:3:\"123\";s:3:\"img\";s:35:\"attachs/14/6/27/29/t_1101236877.jpg\";}i:17;a:9:{s:3:\"bid\";s:2:\"28\";s:5:\"title\";s:6:\"fsdfsf\";s:4:\"body\";s:7:\" sffasf\";s:4:\"type\";s:1:\"1\";s:3:\"uid\";s:2:\"15\";s:8:\"username\";s:6:\"fdsafs\";s:5:\"b_url\";s:35:\"/index.php?c=userblog&a=show&bid=28\";s:3:\"tag\";s:0:\"\";s:3:\"img\";s:1:\" \";}i:18;a:9:{s:3:\"bid\";s:2:\"27\";s:5:\"title\";N;s:4:\"body\";s:4:\" 000\";s:4:\"type\";s:1:\"1\";s:3:\"uid\";s:2:\"13\";s:8:\"username\";s:4:\"safs\";s:5:\"b_url\";s:35:\"/index.php?c=userblog&a=show&bid=27\";s:3:\"tag\";s:3:\"000\";s:3:\"img\";s:1:\" \";}i:19;a:9:{s:3:\"bid\";s:2:\"26\";s:5:\"title\";s:37:\"智深配资 股票配资业务流程\";s:4:\"body\";s:182:\"智深配资 股票配资业务流程郑鹏先生您好，智深配资 股票配资业务流程感谢您在百忙之中接受七禾网期货我国的专访。您本科学的智深...\";s:4:\"type\";s:1:\"1\";s:3:\"uid\";s:2:\"12\";s:8:\"username\";s:12:\"配资业务\";s:5:\"b_url\";s:35:\"/index.php?c=userblog&a=show&bid=26\";s:3:\"tag\";s:22:\"智深配资 股票配\";s:3:\"img\";s:1:\" \";}i:20;a:9:{s:3:\"bid\";s:2:\"25\";s:5:\"title\";s:48:\"　兴邦选矿球磨机采用优质的高锰钢\";s:4:\"body\";s:183:\"　　球磨机工作效率的影响因素包括加水量、球石、原料配方、电流、分散剂、减速装置等，这些因素的综合作用最终决定了球磨机的工...\";s:4:\"type\";s:1:\"1\";s:3:\"uid\";s:2:\"10\";s:8:\"username\";s:8:\"xingbang\";s:5:\"b_url\";s:35:\"/index.php?c=userblog&a=show&bid=25\";s:3:\"tag\";s:7:\"qiumoji\";s:3:\"img\";s:1:\" \";}i:21;a:9:{s:3:\"bid\";s:2:\"24\";s:5:\"title\";s:6:\"测试\";s:4:\"body\";s:126:\"阿迪发生地方阿迪发生地方阿迪发生地方阿迪发生地方阿迪发生地方阿迪发生地方阿迪发生地方\";s:4:\"type\";s:1:\"1\";s:3:\"uid\";s:1:\"1\";s:8:\"username\";s:12:\"左文右刀\";s:5:\"b_url\";s:35:\"/index.php?c=userblog&a=show&bid=24\";s:3:\"tag\";s:0:\"\";s:3:\"img\";s:1:\" \";}i:22;a:9:{s:3:\"bid\";s:2:\"23\";s:5:\"title\";N;s:4:\"body\";s:184:\"给大家推荐这个韩国抗菌菜板，采用医用级材质，不含双酚A，每块菜板用来切不同材质的食物，生熟分开，避免细菌污染，每块菜板上有...\";s:4:\"type\";s:1:\"3\";s:3:\"uid\";s:1:\"1\";s:8:\"username\";s:12:\"左文右刀\";s:5:\"b_url\";s:35:\"/index.php?c=userblog&a=show&bid=23\";s:3:\"tag\";s:0:\"\";s:3:\"img\";s:35:\"attachs/14/1/20/21/t_1151352032.jpg\";}i:23;a:9:{s:3:\"bid\";s:2:\"22\";s:5:\"title\";s:6:\"素一\";s:4:\"body\";s:6:\"素一\";s:4:\"type\";s:1:\"3\";s:3:\"uid\";s:1:\"5\";s:8:\"username\";s:9:\"马小奇\";s:5:\"b_url\";s:35:\"/index.php?c=userblog&a=show&bid=22\";s:3:\"tag\";s:0:\"\";s:3:\"img\";s:36:\"attachs/14/1/20/15/t_0009107800.jpeg\";}i:24;a:9:{s:3:\"bid\";s:2:\"21\";s:5:\"title\";N;s:4:\"body\";s:184:\"给大家推荐这个韩国抗菌菜板，采用医用级材质，不含双酚A，每块菜板用来切不同材质的食物，生熟分开，避免细菌污染，每块菜板上有...\";s:4:\"type\";s:1:\"3\";s:3:\"uid\";s:1:\"5\";s:8:\"username\";s:9:\"马小奇\";s:5:\"b_url\";s:35:\"/index.php?c=userblog&a=show&bid=21\";s:3:\"tag\";s:0:\"\";s:3:\"img\";s:35:\"attachs/14/1/20/21/t_1151352032.jpg\";}i:25;a:9:{s:3:\"bid\";s:2:\"19\";s:5:\"title\";N;s:4:\"body\";s:120:\"asfadfa&nbsp;asfadfa&nbsp;asfadfa&nbsp;asfadfa&nbsp;asfadfa&nbsp;asfadfa&nbsp;asfadfa&nbsp;asfadfa&nbsp;asfadfa&nbsp;asf\";s:4:\"type\";s:1:\"1\";s:3:\"uid\";s:1:\"4\";s:8:\"username\";s:12:\"推推观光\";s:5:\"b_url\";s:35:\"/index.php?c=userblog&a=show&bid=19\";s:3:\"tag\";s:0:\"\";s:3:\"img\";s:1:\" \";}i:26;a:9:{s:3:\"bid\";s:2:\"16\";s:5:\"title\";s:27:\"三张单车，三个梦想\";s:4:\"body\";b:0;s:4:\"type\";s:1:\"1\";s:3:\"uid\";s:1:\"1\";s:8:\"username\";s:12:\"左文右刀\";s:5:\"b_url\";s:35:\"/index.php?c=userblog&a=show&bid=16\";s:3:\"tag\";s:0:\"\";s:3:\"img\";s:1:\" \";}i:27;a:9:{s:3:\"bid\";s:2:\"15\";s:5:\"title\";s:6:\"素一\";s:4:\"body\";s:6:\"素一\";s:4:\"type\";s:1:\"3\";s:3:\"uid\";s:1:\"1\";s:8:\"username\";s:12:\"左文右刀\";s:5:\"b_url\";s:35:\"/index.php?c=userblog&a=show&bid=15\";s:3:\"tag\";s:0:\"\";s:3:\"img\";s:36:\"attachs/14/1/20/15/t_0009107800.jpeg\";}}\";');
INSERT INTO `yb_cache` VALUES ('loginUserHot', '1405170706s:5035:\"a:12:{i:0;a:12:{s:2:\"id\";s:2:\"18\";s:3:\"bid\";s:2:\"38\";s:3:\"uid\";s:2:\"22\";s:6:\"repuid\";N;s:3:\"msg\";s:6:\"sdfddd\";s:4:\"time\";s:10:\"1404552231\";s:8:\"username\";s:6:\"东流\";s:7:\"blogtag\";a:2:{i:0;s:9:\"互联网\";i:1;s:6:\"科学\";}s:5:\"u_url\";s:44:\"/index.php?c=userblog&a=index&domain=dongliu\";s:5:\"u_img\";s:30:\"/avatar.php?uid=22&size=middle\";s:5:\"b_url\";N;s:7:\"b_title\";N;}i:1;a:12:{s:2:\"id\";s:2:\"17\";s:3:\"bid\";s:2:\"39\";s:3:\"uid\";s:1:\"1\";s:6:\"repuid\";s:2:\"20\";s:3:\"msg\";s:26:\"回复@文刀文的:搜索\";s:4:\"time\";s:10:\"1404309338\";s:8:\"username\";s:12:\"左文右刀\";s:7:\"blogtag\";a:4:{i:0;s:6:\"艺术\";i:1;s:6:\"时尚\";i:2;s:6:\"音乐\";i:3;s:6:\"阅读\";}s:5:\"u_url\";s:45:\"/index.php?c=userblog&a=index&domain=jasonliu\";s:5:\"u_img\";s:29:\"/avatar.php?uid=1&size=middle\";s:5:\"b_url\";s:35:\"/index.php?c=userblog&a=show&bid=39\";s:7:\"b_title\";N;}i:2;a:12:{s:2:\"id\";s:2:\"16\";s:3:\"bid\";s:2:\"39\";s:3:\"uid\";s:1:\"1\";s:6:\"repuid\";N;s:3:\"msg\";s:1:\"s\";s:4:\"time\";s:10:\"1404298014\";s:8:\"username\";s:12:\"左文右刀\";s:7:\"blogtag\";a:4:{i:0;s:6:\"艺术\";i:1;s:6:\"时尚\";i:2;s:6:\"音乐\";i:3;s:6:\"阅读\";}s:5:\"u_url\";s:45:\"/index.php?c=userblog&a=index&domain=jasonliu\";s:5:\"u_img\";s:29:\"/avatar.php?uid=1&size=middle\";s:5:\"b_url\";s:35:\"/index.php?c=userblog&a=show&bid=39\";s:7:\"b_title\";N;}i:3;a:12:{s:2:\"id\";s:2:\"15\";s:3:\"bid\";s:2:\"39\";s:3:\"uid\";s:2:\"20\";s:6:\"repuid\";N;s:3:\"msg\";s:18:\"多少分多少分\";s:4:\"time\";s:10:\"1404297746\";s:8:\"username\";s:12:\"文刀文的\";s:7:\"blogtag\";a:1:{i:0;s:6:\"阅读\";}s:5:\"u_url\";s:41:\"/index.php?c=userblog&a=index&domain=aaaa\";s:5:\"u_img\";s:30:\"/avatar.php?uid=20&size=middle\";s:5:\"b_url\";s:35:\"/index.php?c=userblog&a=show&bid=39\";s:7:\"b_title\";N;}i:4;a:12:{s:2:\"id\";s:2:\"14\";s:3:\"bid\";s:2:\"24\";s:3:\"uid\";s:2:\"19\";s:6:\"repuid\";N;s:3:\"msg\";s:12:\"不参与哦\";s:4:\"time\";s:10:\"1404270471\";s:8:\"username\";s:7:\" 文刀\";s:7:\"blogtag\";s:0:\"\";s:5:\"u_url\";s:48:\"/index.php?c=userblog&a=index&domain=home&uid=19\";s:5:\"u_img\";s:30:\"/avatar.php?uid=19&size=middle\";s:5:\"b_url\";s:35:\"/index.php?c=userblog&a=show&bid=24\";s:7:\"b_title\";s:6:\"测试\";}i:5;a:12:{s:2:\"id\";s:2:\"13\";s:3:\"bid\";s:2:\"17\";s:3:\"uid\";s:1:\"1\";s:6:\"repuid\";s:1:\"5\";s:3:\"msg\";s:26:\"回复@马小奇:是的啊\";s:4:\"time\";s:10:\"1404269961\";s:8:\"username\";s:12:\"左文右刀\";s:7:\"blogtag\";a:4:{i:0;s:6:\"艺术\";i:1;s:6:\"时尚\";i:2;s:6:\"音乐\";i:3;s:6:\"阅读\";}s:5:\"u_url\";s:45:\"/index.php?c=userblog&a=index&domain=jasonliu\";s:5:\"u_img\";s:29:\"/avatar.php?uid=1&size=middle\";s:5:\"b_url\";s:35:\"/index.php?c=userblog&a=show&bid=17\";s:7:\"b_title\";s:13:\"蜗牛-群星\";}i:6;a:12:{s:2:\"id\";s:2:\"12\";s:3:\"bid\";s:2:\"34\";s:3:\"uid\";s:1:\"1\";s:6:\"repuid\";N;s:3:\"msg\";s:6:\"不错\";s:4:\"time\";s:10:\"1404269935\";s:8:\"username\";s:12:\"左文右刀\";s:7:\"blogtag\";a:4:{i:0;s:6:\"艺术\";i:1;s:6:\"时尚\";i:2;s:6:\"音乐\";i:3;s:6:\"阅读\";}s:5:\"u_url\";s:45:\"/index.php?c=userblog&a=index&domain=jasonliu\";s:5:\"u_img\";s:29:\"/avatar.php?uid=1&size=middle\";s:5:\"b_url\";s:35:\"/index.php?c=userblog&a=show&bid=34\";s:7:\"b_title\";s:21:\"北京股票配资网\";}i:7;a:12:{s:2:\"id\";s:2:\"11\";s:3:\"bid\";s:2:\"30\";s:3:\"uid\";s:2:\"15\";s:6:\"repuid\";N;s:3:\"msg\";s:5:\"fasfs\";s:4:\"time\";s:10:\"1403838308\";s:8:\"username\";s:6:\"fdsafs\";s:7:\"blogtag\";s:0:\"\";s:5:\"u_url\";s:48:\"/index.php?c=userblog&a=index&domain=home&uid=15\";s:5:\"u_img\";s:30:\"/avatar.php?uid=15&size=middle\";s:5:\"b_url\";s:35:\"/index.php?c=userblog&a=show&bid=30\";s:7:\"b_title\";N;}i:8;a:12:{s:2:\"id\";s:2:\"10\";s:3:\"bid\";s:2:\"18\";s:3:\"uid\";s:1:\"5\";s:6:\"repuid\";N;s:3:\"msg\";s:15:\"还能有视频\";s:4:\"time\";s:10:\"1390189955\";s:8:\"username\";s:9:\"马小奇\";s:7:\"blogtag\";s:0:\"\";s:5:\"u_url\";s:47:\"/index.php?c=userblog&a=index&domain=home&uid=5\";s:5:\"u_img\";s:29:\"/avatar.php?uid=5&size=middle\";s:5:\"b_url\";s:35:\"/index.php?c=userblog&a=show&bid=18\";s:7:\"b_title\";s:39:\"班夫电影节 2011 World Tour (Canada\";}i:9;a:12:{s:2:\"id\";s:1:\"9\";s:3:\"bid\";s:2:\"17\";s:3:\"uid\";s:1:\"5\";s:6:\"repuid\";N;s:3:\"msg\";s:15:\"还能有音乐\";s:4:\"time\";s:10:\"1390189949\";s:8:\"username\";s:9:\"马小奇\";s:7:\"blogtag\";s:0:\"\";s:5:\"u_url\";s:47:\"/index.php?c=userblog&a=index&domain=home&uid=5\";s:5:\"u_img\";s:29:\"/avatar.php?uid=5&size=middle\";s:5:\"b_url\";s:35:\"/index.php?c=userblog&a=show&bid=17\";s:7:\"b_title\";s:13:\"蜗牛-群星\";}i:10;a:12:{s:2:\"id\";s:1:\"8\";s:3:\"bid\";s:1:\"3\";s:3:\"uid\";s:1:\"1\";s:6:\"repuid\";N;s:3:\"msg\";s:12:\"怎么呀啊\";s:4:\"time\";s:10:\"1390022372\";s:8:\"username\";s:12:\"左文右刀\";s:7:\"blogtag\";a:4:{i:0;s:6:\"艺术\";i:1;s:6:\"时尚\";i:2;s:6:\"音乐\";i:3;s:6:\"阅读\";}s:5:\"u_url\";s:45:\"/index.php?c=userblog&a=index&domain=jasonliu\";s:5:\"u_img\";s:29:\"/avatar.php?uid=1&size=middle\";s:5:\"b_url\";N;s:7:\"b_title\";N;}i:11;a:12:{s:2:\"id\";s:1:\"7\";s:3:\"bid\";s:1:\"2\";s:3:\"uid\";s:1:\"1\";s:6:\"repuid\";N;s:3:\"msg\";s:15:\"怎么样啊咪\";s:4:\"time\";s:10:\"1390021980\";s:8:\"username\";s:12:\"左文右刀\";s:7:\"blogtag\";a:4:{i:0;s:6:\"艺术\";i:1;s:6:\"时尚\";i:2;s:6:\"音乐\";i:3;s:6:\"阅读\";}s:5:\"u_url\";s:45:\"/index.php?c=userblog&a=index&domain=jasonliu\";s:5:\"u_img\";s:29:\"/avatar.php?uid=1&size=middle\";s:5:\"b_url\";N;s:7:\"b_title\";N;}}\";');
INSERT INTO `yb_cache` VALUES ('findeUserTag_19', '1404396435s:4:\"b:0;\";');
INSERT INTO `yb_cache` VALUES ('myfollow_21', '1404542530s:8:\"s:1:\"7\";\";');
INSERT INTO `yb_cache` VALUES ('ybrecommenduser', '1405232981s:5706:\"a:24:{i:0;a:7:{s:3:\"uid\";s:1:\"1\";s:8:\"username\";s:12:\"左文右刀\";s:6:\"domain\";s:8:\"jasonliu\";s:7:\"blogtag\";s:6:\"艺术\";s:4:\"sign\";s:9:\"东方的\";s:5:\"h_url\";s:45:\"/index.php?c=userblog&a=index&domain=jasonliu\";s:5:\"h_img\";s:29:\"/avatar.php?uid=1&size=middle\";}i:1;a:7:{s:3:\"uid\";s:2:\"15\";s:8:\"username\";s:6:\"fdsafs\";s:6:\"domain\";s:0:\"\";s:7:\"blogtag\";s:0:\"\";s:4:\"sign\";s:0:\"\";s:5:\"h_url\";s:48:\"/index.php?c=userblog&a=index&domain=home&uid=15\";s:5:\"h_img\";s:30:\"/avatar.php?uid=15&size=middle\";}i:2;a:7:{s:3:\"uid\";s:2:\"22\";s:8:\"username\";s:6:\"东流\";s:6:\"domain\";s:7:\"dongliu\";s:7:\"blogtag\";s:9:\"互联网\";s:4:\"sign\";s:0:\"\";s:5:\"h_url\";s:44:\"/index.php?c=userblog&a=index&domain=dongliu\";s:5:\"h_img\";s:30:\"/avatar.php?uid=22&size=middle\";}i:3;a:7:{s:3:\"uid\";s:1:\"5\";s:8:\"username\";s:9:\"马小奇\";s:6:\"domain\";s:0:\"\";s:7:\"blogtag\";s:0:\"\";s:4:\"sign\";s:0:\"\";s:5:\"h_url\";s:47:\"/index.php?c=userblog&a=index&domain=home&uid=5\";s:5:\"h_img\";s:29:\"/avatar.php?uid=5&size=middle\";}i:4;a:7:{s:3:\"uid\";s:2:\"23\";s:8:\"username\";s:7:\"minzhan\";s:6:\"domain\";s:0:\"\";s:7:\"blogtag\";s:0:\"\";s:4:\"sign\";s:0:\"\";s:5:\"h_url\";s:48:\"/index.php?c=userblog&a=index&domain=home&uid=23\";s:5:\"h_img\";s:30:\"/avatar.php?uid=23&size=middle\";}i:5;a:7:{s:3:\"uid\";s:1:\"4\";s:8:\"username\";s:12:\"推推观光\";s:6:\"domain\";s:0:\"\";s:7:\"blogtag\";s:0:\"\";s:4:\"sign\";s:0:\"\";s:5:\"h_url\";s:47:\"/index.php?c=userblog&a=index&domain=home&uid=4\";s:5:\"h_img\";s:29:\"/avatar.php?uid=4&size=middle\";}i:6;a:7:{s:3:\"uid\";s:2:\"18\";s:8:\"username\";s:12:\"期货配资\";s:6:\"domain\";s:0:\"\";s:7:\"blogtag\";s:0:\"\";s:4:\"sign\";s:0:\"\";s:5:\"h_url\";s:48:\"/index.php?c=userblog&a=index&domain=home&uid=18\";s:5:\"h_img\";s:30:\"/avatar.php?uid=18&size=middle\";}i:7;a:7:{s:3:\"uid\";s:2:\"13\";s:8:\"username\";s:4:\"safs\";s:6:\"domain\";s:0:\"\";s:7:\"blogtag\";s:0:\"\";s:4:\"sign\";s:0:\"\";s:5:\"h_url\";s:48:\"/index.php?c=userblog&a=index&domain=home&uid=13\";s:5:\"h_img\";s:30:\"/avatar.php?uid=13&size=middle\";}i:8;a:7:{s:3:\"uid\";s:2:\"10\";s:8:\"username\";s:8:\"xingbang\";s:6:\"domain\";s:0:\"\";s:7:\"blogtag\";s:0:\"\";s:4:\"sign\";s:0:\"\";s:5:\"h_url\";s:48:\"/index.php?c=userblog&a=index&domain=home&uid=10\";s:5:\"h_img\";s:30:\"/avatar.php?uid=10&size=middle\";}i:9;a:7:{s:3:\"uid\";s:2:\"19\";s:8:\"username\";s:7:\" 文刀\";s:6:\"domain\";s:0:\"\";s:7:\"blogtag\";s:0:\"\";s:4:\"sign\";s:0:\"\";s:5:\"h_url\";s:48:\"/index.php?c=userblog&a=index&domain=home&uid=19\";s:5:\"h_img\";s:30:\"/avatar.php?uid=19&size=middle\";}i:10;a:7:{s:3:\"uid\";s:2:\"12\";s:8:\"username\";s:12:\"配资业务\";s:6:\"domain\";s:0:\"\";s:7:\"blogtag\";s:0:\"\";s:4:\"sign\";s:0:\"\";s:5:\"h_url\";s:48:\"/index.php?c=userblog&a=index&domain=home&uid=12\";s:5:\"h_img\";s:30:\"/avatar.php?uid=12&size=middle\";}i:11;a:7:{s:3:\"uid\";s:2:\"20\";s:8:\"username\";s:12:\"文刀文的\";s:6:\"domain\";s:4:\"aaaa\";s:7:\"blogtag\";s:6:\"阅读\";s:4:\"sign\";s:0:\"\";s:5:\"h_url\";s:41:\"/index.php?c=userblog&a=index&domain=aaaa\";s:5:\"h_img\";s:30:\"/avatar.php?uid=20&size=middle\";}i:12;a:7:{s:3:\"uid\";s:2:\"21\";s:8:\"username\";s:6:\"jeffer\";s:6:\"domain\";s:6:\"jeffer\";s:7:\"blogtag\";s:6:\"艺术\";s:4:\"sign\";s:0:\"\";s:5:\"h_url\";s:43:\"/index.php?c=userblog&a=index&domain=jeffer\";s:5:\"h_img\";s:30:\"/avatar.php?uid=21&size=middle\";}i:13;a:7:{s:3:\"uid\";s:2:\"24\";s:8:\"username\";s:6:\"111111\";s:6:\"domain\";s:0:\"\";s:7:\"blogtag\";s:0:\"\";s:4:\"sign\";s:0:\"\";s:5:\"h_url\";s:48:\"/index.php?c=userblog&a=index&domain=home&uid=24\";s:5:\"h_img\";s:30:\"/avatar.php?uid=24&size=middle\";}i:14;a:7:{s:3:\"uid\";s:2:\"17\";s:8:\"username\";s:7:\"dsflfjs\";s:6:\"domain\";s:0:\"\";s:7:\"blogtag\";s:0:\"\";s:4:\"sign\";s:0:\"\";s:5:\"h_url\";s:48:\"/index.php?c=userblog&a=index&domain=home&uid=17\";s:5:\"h_img\";s:30:\"/avatar.php?uid=17&size=middle\";}i:15;a:7:{s:3:\"uid\";s:2:\"16\";s:8:\"username\";s:5:\"fsfsf\";s:6:\"domain\";s:0:\"\";s:7:\"blogtag\";s:0:\"\";s:4:\"sign\";s:0:\"\";s:5:\"h_url\";s:48:\"/index.php?c=userblog&a=index&domain=home&uid=16\";s:5:\"h_img\";s:30:\"/avatar.php?uid=16&size=middle\";}i:16;a:7:{s:3:\"uid\";s:2:\"14\";s:8:\"username\";s:8:\"fasjfjfs\";s:6:\"domain\";s:0:\"\";s:7:\"blogtag\";s:0:\"\";s:4:\"sign\";s:0:\"\";s:5:\"h_url\";s:48:\"/index.php?c=userblog&a=index&domain=home&uid=14\";s:5:\"h_img\";s:30:\"/avatar.php?uid=14&size=middle\";}i:17;a:7:{s:3:\"uid\";s:2:\"11\";s:8:\"username\";s:5:\"Freet\";s:6:\"domain\";s:0:\"\";s:7:\"blogtag\";s:0:\"\";s:4:\"sign\";s:0:\"\";s:5:\"h_url\";s:48:\"/index.php?c=userblog&a=index&domain=home&uid=11\";s:5:\"h_img\";s:30:\"/avatar.php?uid=11&size=middle\";}i:18;a:7:{s:3:\"uid\";s:1:\"9\";s:8:\"username\";s:5:\"Mario\";s:6:\"domain\";s:0:\"\";s:7:\"blogtag\";s:0:\"\";s:4:\"sign\";s:0:\"\";s:5:\"h_url\";s:47:\"/index.php?c=userblog&a=index&domain=home&uid=9\";s:5:\"h_img\";s:29:\"/avatar.php?uid=9&size=middle\";}i:19;a:7:{s:3:\"uid\";s:1:\"8\";s:8:\"username\";s:7:\"wenwen \";s:6:\"domain\";s:0:\"\";s:7:\"blogtag\";s:0:\"\";s:4:\"sign\";s:0:\"\";s:5:\"h_url\";s:47:\"/index.php?c=userblog&a=index&domain=home&uid=8\";s:5:\"h_img\";s:29:\"/avatar.php?uid=8&size=middle\";}i:20;a:7:{s:3:\"uid\";s:1:\"7\";s:8:\"username\";s:12:\"故事姑娘\";s:6:\"domain\";s:0:\"\";s:7:\"blogtag\";s:0:\"\";s:4:\"sign\";s:0:\"\";s:5:\"h_url\";s:47:\"/index.php?c=userblog&a=index&domain=home&uid=7\";s:5:\"h_img\";s:29:\"/avatar.php?uid=7&size=middle\";}i:21;a:7:{s:3:\"uid\";s:1:\"6\";s:8:\"username\";s:4:\"hana\";s:6:\"domain\";s:0:\"\";s:7:\"blogtag\";s:0:\"\";s:4:\"sign\";s:0:\"\";s:5:\"h_url\";s:47:\"/index.php?c=userblog&a=index&domain=home&uid=6\";s:5:\"h_img\";s:29:\"/avatar.php?uid=6&size=middle\";}i:22;a:7:{s:3:\"uid\";s:1:\"3\";s:8:\"username\";s:6:\"文刀\";s:6:\"domain\";s:0:\"\";s:7:\"blogtag\";s:0:\"\";s:4:\"sign\";s:0:\"\";s:5:\"h_url\";s:47:\"/index.php?c=userblog&a=index&domain=home&uid=3\";s:5:\"h_img\";s:29:\"/avatar.php?uid=3&size=middle\";}i:23;a:7:{s:3:\"uid\";s:2:\"25\";s:8:\"username\";s:7:\"foryucy\";s:6:\"domain\";s:4:\"yucy\";s:7:\"blogtag\";s:6:\"音乐\";s:4:\"sign\";s:0:\"\";s:5:\"h_url\";s:41:\"/index.php?c=userblog&a=index&domain=yucy\";s:5:\"h_img\";s:30:\"/avatar.php?uid=25&size=middle\";}}\";');
INSERT INTO `yb_cache` VALUES ('findeUserTag_22', '1404638887s:4:\"b:0;\";');
INSERT INTO `yb_cache` VALUES ('recommend_shuffle_3', '1405306703s:5772:\"a:19:{i:0;a:7:{s:3:\"bid\";s:2:\"49\";s:3:\"uid\";s:2:\"25\";s:3:\"img\";s:35:\"attachs/14/7/06/46/t_1451599859.jpg\";s:8:\"username\";s:7:\"foryucy\";s:5:\"h_url\";s:48:\"/index.php?c=userblog&a=index&domain=home&uid=25\";s:5:\"h_img\";s:29:\"/avatar.php?uid=25&size=small\";s:5:\"b_url\";s:35:\"/index.php?c=userblog&a=show&bid=49\";}i:1;a:7:{s:3:\"bid\";s:2:\"48\";s:3:\"uid\";s:2:\"25\";s:3:\"img\";s:35:\"attachs/14/7/06/46/t_1451599859.jpg\";s:8:\"username\";s:7:\"foryucy\";s:5:\"h_url\";s:48:\"/index.php?c=userblog&a=index&domain=home&uid=25\";s:5:\"h_img\";s:29:\"/avatar.php?uid=25&size=small\";s:5:\"b_url\";s:35:\"/index.php?c=userblog&a=show&bid=48\";}i:2;a:7:{s:3:\"bid\";s:2:\"47\";s:3:\"uid\";s:1:\"1\";s:3:\"img\";s:35:\"attachs/14/7/06/46/t_1451599859.jpg\";s:8:\"username\";s:12:\"左文右刀\";s:5:\"h_url\";s:47:\"/index.php?c=userblog&a=index&domain=home&uid=1\";s:5:\"h_img\";s:28:\"/avatar.php?uid=1&size=small\";s:5:\"b_url\";s:35:\"/index.php?c=userblog&a=show&bid=47\";}i:3;a:7:{s:3:\"bid\";s:2:\"46\";s:3:\"uid\";s:2:\"23\";s:3:\"img\";s:35:\"attachs/14/7/06/46/t_1451599859.jpg\";s:8:\"username\";s:7:\"minzhan\";s:5:\"h_url\";s:48:\"/index.php?c=userblog&a=index&domain=home&uid=23\";s:5:\"h_img\";s:29:\"/avatar.php?uid=23&size=small\";s:5:\"b_url\";s:35:\"/index.php?c=userblog&a=show&bid=46\";}i:4;a:7:{s:3:\"bid\";s:2:\"43\";s:3:\"uid\";s:1:\"1\";s:3:\"img\";s:35:\"attachs/14/7/02/38/t_1835525044.png\";s:8:\"username\";s:12:\"左文右刀\";s:5:\"h_url\";s:47:\"/index.php?c=userblog&a=index&domain=home&uid=1\";s:5:\"h_img\";s:28:\"/avatar.php?uid=1&size=small\";s:5:\"b_url\";s:35:\"/index.php?c=userblog&a=show&bid=43\";}i:5;a:7:{s:3:\"bid\";s:2:\"41\";s:3:\"uid\";s:2:\"22\";s:3:\"img\";s:35:\"attachs/14/7/02/38/t_1835525044.png\";s:8:\"username\";s:6:\"东流\";s:5:\"h_url\";s:48:\"/index.php?c=userblog&a=index&domain=home&uid=22\";s:5:\"h_img\";s:29:\"/avatar.php?uid=22&size=small\";s:5:\"b_url\";s:35:\"/index.php?c=userblog&a=show&bid=41\";}i:6;a:7:{s:3:\"bid\";s:2:\"33\";s:3:\"uid\";s:2:\"15\";s:3:\"img\";s:35:\"attachs/14/6/27/33/t_1116539913.gif\";s:8:\"username\";s:6:\"fdsafs\";s:5:\"h_url\";s:48:\"/index.php?c=userblog&a=index&domain=home&uid=15\";s:5:\"h_img\";s:29:\"/avatar.php?uid=15&size=small\";s:5:\"b_url\";s:35:\"/index.php?c=userblog&a=show&bid=33\";}i:7;a:7:{s:3:\"bid\";s:2:\"30\";s:3:\"uid\";s:2:\"15\";s:3:\"img\";s:35:\"attachs/14/6/27/30/t_1104454527.gif\";s:8:\"username\";s:6:\"fdsafs\";s:5:\"h_url\";s:48:\"/index.php?c=userblog&a=index&domain=home&uid=15\";s:5:\"h_img\";s:29:\"/avatar.php?uid=15&size=small\";s:5:\"b_url\";s:35:\"/index.php?c=userblog&a=show&bid=30\";}i:8;a:7:{s:3:\"bid\";s:2:\"29\";s:3:\"uid\";s:2:\"15\";s:3:\"img\";s:35:\"attachs/14/6/27/29/t_1101236877.jpg\";s:8:\"username\";s:6:\"fdsafs\";s:5:\"h_url\";s:48:\"/index.php?c=userblog&a=index&domain=home&uid=15\";s:5:\"h_img\";s:29:\"/avatar.php?uid=15&size=small\";s:5:\"b_url\";s:35:\"/index.php?c=userblog&a=show&bid=29\";}i:9;a:7:{s:3:\"bid\";s:2:\"23\";s:3:\"uid\";s:1:\"1\";s:3:\"img\";s:35:\"attachs/14/1/20/21/t_1151352032.jpg\";s:8:\"username\";s:12:\"左文右刀\";s:5:\"h_url\";s:47:\"/index.php?c=userblog&a=index&domain=home&uid=1\";s:5:\"h_img\";s:28:\"/avatar.php?uid=1&size=small\";s:5:\"b_url\";s:35:\"/index.php?c=userblog&a=show&bid=23\";}i:10;a:7:{s:3:\"bid\";s:2:\"23\";s:3:\"uid\";s:1:\"1\";s:3:\"img\";s:35:\"attachs/14/1/20/21/t_1151427278.jpg\";s:8:\"username\";s:12:\"左文右刀\";s:5:\"h_url\";s:47:\"/index.php?c=userblog&a=index&domain=home&uid=1\";s:5:\"h_img\";s:28:\"/avatar.php?uid=1&size=small\";s:5:\"b_url\";s:35:\"/index.php?c=userblog&a=show&bid=23\";}i:11;a:7:{s:3:\"bid\";s:2:\"22\";s:3:\"uid\";s:1:\"5\";s:3:\"img\";s:36:\"attachs/14/1/20/15/t_0009107800.jpeg\";s:8:\"username\";s:9:\"马小奇\";s:5:\"h_url\";s:47:\"/index.php?c=userblog&a=index&domain=home&uid=5\";s:5:\"h_img\";s:28:\"/avatar.php?uid=5&size=small\";s:5:\"b_url\";s:35:\"/index.php?c=userblog&a=show&bid=22\";}i:12;a:7:{s:3:\"bid\";s:2:\"22\";s:3:\"uid\";s:1:\"5\";s:3:\"img\";s:36:\"attachs/14/1/20/15/t_0009119633.jpeg\";s:8:\"username\";s:9:\"马小奇\";s:5:\"h_url\";s:47:\"/index.php?c=userblog&a=index&domain=home&uid=5\";s:5:\"h_img\";s:28:\"/avatar.php?uid=5&size=small\";s:5:\"b_url\";s:35:\"/index.php?c=userblog&a=show&bid=22\";}i:13;a:7:{s:3:\"bid\";s:2:\"22\";s:3:\"uid\";s:1:\"5\";s:3:\"img\";s:36:\"attachs/14/1/20/15/t_0009116672.jpeg\";s:8:\"username\";s:9:\"马小奇\";s:5:\"h_url\";s:47:\"/index.php?c=userblog&a=index&domain=home&uid=5\";s:5:\"h_img\";s:28:\"/avatar.php?uid=5&size=small\";s:5:\"b_url\";s:35:\"/index.php?c=userblog&a=show&bid=22\";}i:14;a:7:{s:3:\"bid\";s:2:\"21\";s:3:\"uid\";s:1:\"5\";s:3:\"img\";s:35:\"attachs/14/1/20/21/t_1151352032.jpg\";s:8:\"username\";s:9:\"马小奇\";s:5:\"h_url\";s:47:\"/index.php?c=userblog&a=index&domain=home&uid=5\";s:5:\"h_img\";s:28:\"/avatar.php?uid=5&size=small\";s:5:\"b_url\";s:35:\"/index.php?c=userblog&a=show&bid=21\";}i:15;a:7:{s:3:\"bid\";s:2:\"21\";s:3:\"uid\";s:1:\"5\";s:3:\"img\";s:35:\"attachs/14/1/20/21/t_1151427278.jpg\";s:8:\"username\";s:9:\"马小奇\";s:5:\"h_url\";s:47:\"/index.php?c=userblog&a=index&domain=home&uid=5\";s:5:\"h_img\";s:28:\"/avatar.php?uid=5&size=small\";s:5:\"b_url\";s:35:\"/index.php?c=userblog&a=show&bid=21\";}i:16;a:7:{s:3:\"bid\";s:2:\"15\";s:3:\"uid\";s:1:\"1\";s:3:\"img\";s:36:\"attachs/14/1/20/15/t_0009107800.jpeg\";s:8:\"username\";s:12:\"左文右刀\";s:5:\"h_url\";s:47:\"/index.php?c=userblog&a=index&domain=home&uid=1\";s:5:\"h_img\";s:28:\"/avatar.php?uid=1&size=small\";s:5:\"b_url\";s:35:\"/index.php?c=userblog&a=show&bid=15\";}i:17;a:7:{s:3:\"bid\";s:2:\"15\";s:3:\"uid\";s:1:\"1\";s:3:\"img\";s:36:\"attachs/14/1/20/15/t_0009119633.jpeg\";s:8:\"username\";s:12:\"左文右刀\";s:5:\"h_url\";s:47:\"/index.php?c=userblog&a=index&domain=home&uid=1\";s:5:\"h_img\";s:28:\"/avatar.php?uid=1&size=small\";s:5:\"b_url\";s:35:\"/index.php?c=userblog&a=show&bid=15\";}i:18;a:7:{s:3:\"bid\";s:2:\"15\";s:3:\"uid\";s:1:\"1\";s:3:\"img\";s:36:\"attachs/14/1/20/15/t_0009116672.jpeg\";s:8:\"username\";s:12:\"左文右刀\";s:5:\"h_url\";s:47:\"/index.php?c=userblog&a=index&domain=home&uid=1\";s:5:\"h_img\";s:28:\"/avatar.php?uid=1&size=small\";s:5:\"b_url\";s:35:\"/index.php?c=userblog&a=show&bid=15\";}}\";');
INSERT INTO `yb_cache` VALUES ('findeUserTag_24', '1405175523s:4:\"b:0;\";');
INSERT INTO `yb_cache` VALUES ('findeUserTag_25', '1405233037s:4:\"b:0;\";');

-- ----------------------------
-- Table structure for `yb_catetags`
-- ----------------------------
DROP TABLE IF EXISTS `yb_catetags`;
CREATE TABLE `yb_catetags` (
  `cid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `catename` varchar(20) NOT NULL,
  `sort` tinyint(10) unsigned NOT NULL COMMENT '排序',
  `used` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '有多少人用了这个标签',
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yb_catetags
-- ----------------------------
INSERT INTO `yb_catetags` VALUES ('1', '艺术', '1', '0');
INSERT INTO `yb_catetags` VALUES ('2', '时尚', '2', '0');
INSERT INTO `yb_catetags` VALUES ('3', '音乐', '3', '0');
INSERT INTO `yb_catetags` VALUES ('4', '摄影', '4', '0');
INSERT INTO `yb_catetags` VALUES ('5', '阅读', '5', '0');
INSERT INTO `yb_catetags` VALUES ('6', '动漫', '6', '0');
INSERT INTO `yb_catetags` VALUES ('7', '游戏', '7', '0');
INSERT INTO `yb_catetags` VALUES ('8', '随笔', '8', '0');
INSERT INTO `yb_catetags` VALUES ('9', '插画', '9', '0');
INSERT INTO `yb_catetags` VALUES ('10', '设计', '10', '0');
INSERT INTO `yb_catetags` VALUES ('11', '建筑', '11', '0');
INSERT INTO `yb_catetags` VALUES ('12', '创意', '12', '0');
INSERT INTO `yb_catetags` VALUES ('13', '猎图', '13', '0');
INSERT INTO `yb_catetags` VALUES ('14', '宠物', '14', '0');
INSERT INTO `yb_catetags` VALUES ('15', '汽车', '15', '0');
INSERT INTO `yb_catetags` VALUES ('16', '家居', '16', '0');
INSERT INTO `yb_catetags` VALUES ('17', '互联网', '17', '0');
INSERT INTO `yb_catetags` VALUES ('18', '旅行', '18', '0');
INSERT INTO `yb_catetags` VALUES ('19', '数码', '19', '0');
INSERT INTO `yb_catetags` VALUES ('20', '影视', '20', '0');
INSERT INTO `yb_catetags` VALUES ('21', '美食', '21', '0');
INSERT INTO `yb_catetags` VALUES ('22', '恋物', '22', '0');
INSERT INTO `yb_catetags` VALUES ('23', '趣味', '23', '0');
INSERT INTO `yb_catetags` VALUES ('24', '科学', '24', '0');
INSERT INTO `yb_catetags` VALUES ('25', '军事', '25', '0');
INSERT INTO `yb_catetags` VALUES ('26', '体育', '26', '0');

-- ----------------------------
-- Table structure for `yb_cpage_body`
-- ----------------------------
DROP TABLE IF EXISTS `yb_cpage_body`;
CREATE TABLE `yb_cpage_body` (
  `cid` int(10) unsigned NOT NULL,
  `body` text,
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='自定义页面,内容';

-- ----------------------------
-- Records of yb_cpage_body
-- ----------------------------
INSERT INTO `yb_cpage_body` VALUES ('1', '相逢的人会再相逢');
INSERT INTO `yb_cpage_body` VALUES ('2', ' <h3>发布内容</h3> <p>登陆后点击右侧 文字链接，即可进入发布文字功能。可输入内容，并可插入单张图片</p> <h3>发布音乐</h3> <p>登陆后点击右侧 音乐，即可进入发布音乐功能。您可以选择网络音乐 和 本地上传两种方式。</p> <p>网络音乐引用地址可以输入虾米、雅燃音乐、音悦台、优酷、土豆、6间房、腾讯播客、新浪博客、56.com等诸多网站播放地址。 也可以直接粘贴网络后缀为mp3的歌曲。</p> <p>本地上传您可以上传本地的MP3文件，但请注意的是您需要拥有该媒体的著作权，也就是说您自己录或者制作的音乐皆可，但不能上传网络上不属于您的版权的音乐。如果被查出或举报或版权纠纷我们将不负任何责任，并且删除该媒体资源。</p> <h3>发布图片</h3> <p>您可以同时上传最多20张照片作为博客内容，并且也可以编写介绍。</p> <h3>发布视频</h3> <p>视频引用地址可以输入虾米、雅燃音乐、音悦台、优酷、土豆、6间房、腾讯播客、新浪博客、56.com等诸多网站播放地址。建议您可以将录制好的视频传至以上媒体然后填写引用地址。</p> <p>同时您也可以编写介绍</p> <h3>关于标签</h3> <p>不管发布任何内容您都需要填写至少一个标签，轻博内容将根据标签来进行区分。因此填写一个或多个合适的标签是非常不错的选择。</p> <h3>关注和喜欢</h3> <p>加为关注的用户将会在您的首页显示最新发布动态</p> <p>加为喜欢的博客可方便您在右侧导航中快速的查找</p> ');
INSERT INTO `yb_cpage_body` VALUES ('3', '<h3>官方网站</h3> <p>http://qing.thinksaas.cn</p> <h3>邮箱</h3> <p>nxfte<span id=\"ats\"></span>qq.com</p> <h3>交流群</h3> <p>qq group 176221558</p> <h3>商业授权</h3> <p>QQ：234027573</p> <h3>付款地址</h3> <p><a href=\"https://me.alipay.com/anythink\" target=\"_blank\">https://me.alipay.com/anythink</a></p> ');
INSERT INTO `yb_cpage_body` VALUES ('4', '<p>本协议适用于云边网开发的云边网平台。使用云边网平台以及与其相关联的各项技术服务和网络服务之前，您必须同意接受本协议。若不接受本协议，您将无法使用云边网平台及相关服务。</p> <p>您可以通过以下方式接受本协议：一旦您注册云边账户并且发布第一条信息起，您对云边网平台及其他相关服务的使用将被视为您自实际 使用起便接受了本协议的全部条款。如果需要注销用户请发送注销申请邮件，我们将删除与您有关的全部内容，您与云边网所有服务都将被终止。注册账户需要用户 本人电子邮件作为注册账号，如果用户使用他人邮件账号注册并被邮件归属人举证成功者将删除用户账号及所有内容，并且一切法律责任自行承担，本站不承担任何 责任。</p> <p>云边网网络平台的所有权和运营权归云边网所有，并保留随时变更平台提供的信息和服务的权利。云边网所提供的相关信息和服务的使用者（以下简称&ldquo;用户&rdquo;）在使用之前必须同意以下的所有条款。</p> <p>用户在云边网平台上发布的信息内容由用户及云边网共同所有，任何其他组织或个人未经用户本人授权同意，不得复制、转载、擅改其内容。用户不得在云边网平台发布和散播任何形式的含有下列内容的信息：<br> 1）为相关法律法规所禁止；<br> 2）有悖于社会公共秩序和善良风俗；<br> 3）损害他人合法权益；<br> 4）其他云边网 认为不适当在本平台发布的内容。 <br> 5）通过发布音乐的上传功能上传非用户本人拥有版权的音频媒体。 <br> 云边网保留删除和变更上述相关信息的权利。</p> <p>用户应保证在云边网平台的注册信息的真实、准确和完整，并在资料变更时及时更新相关信息。对于任何信息不实所导致的用户本人或第三方损害，云边网不承担任何责任。用户应妥善保管个人注册信息及登录密码等资料，用户将对以其注册用户名进行的所有活动和事件负法律责任。</p> <p>云边网非常强调保护用户的隐私。云边网将致力于为用户提供最可靠的隐私保护措施。未经用户的特别授权，云边网不会将用户信息公开或透露给任何第三 方个人或机构，但在下列情形除外：<br> 1) 根据司法机关、政府部门的强制命令提供涉及用户信息的相关资料； <br> 2) 不可抗力与不可控因素导致的信息外泄；<br> 3) 云边网基于自身的合法维权需要而使用用户的相关信息。</p> <p>用户同意使用云边网平台服务所潜在的风险及其一切可能的后果将完全由自己承担，云边网对这些可能的风险和后果不承担任何责任。</p> <p>云边网不保证云边网平台提供的服务能够满足用户的所有要求，也不保证已存在的服务不会中断，对这些服务的及时性、安全 性、准确性也不作保证。对于因系统维护或升级的需要而需暂停网络服务的情形，云边网将视具体情形尽可能事先在重要页面发布通知。同时，云边网保留在不事先 通知用户的情况下中断或终止部分或全部服务的权利，对于因服务的中断或终止而造成的用户或第三方的任何损失，云边网不承担任何责任。</p> <p>用户同意尊重和维护云边网平台以及其他用户的合法权益。用户因违反有关法律、法规或协议规定中的任何条款而给云边网或任何第三方造成的损失，用户同意承担由此造成的一切损害赔偿责任。</p> <p>在适用法律允许的范围内，云边网保留对本协议任何条款的解释权和随时变更的权利。 云边网可能会随时根据需要修改本协议的任一条款。如发生此类变更，云边网会提供新版本的条款。用户在变更后对云边网平台服务的使用将视为已完全接受变更后的条款。</p> <p>本协议在根据下述规定终止前，将会一直适用。当下列情况出现时，云边网可以随时中止与用户的协议：<br> 1) 用户违反了本协议中的任何规定；<br> 2) 法律法规要求终止本协议;<br> 3) 云边网认为实际情形不再适宜继续执行本协议。</p> <p>本协议及因本协议产生的一切法律关系及纠纷，均适用中华人民共和国法律。用户与云边网在此同意以云边网营业所在地法院管辖。</p> ');
INSERT INTO `yb_cpage_body` VALUES ('5', ' <h3>隐私政策</h3> <p>当您在使用我们的服务时，我们将致力于为您提供最可靠的隐私保护措施。未经用户的特别授权，我们承诺不会将用户信息 公开或透露给任何第三方个人或机构，但在下列情形除外：<br> 1) 根据司法机关、政府部门的强制命令提供涉及用户信息的相关资料；<br> 2) 不可抗力与不可控因素导致的信息外泄； <br> 3) 云边网基于自身的合法维权需要而使用用户的相关信息。</p> <p>为了更好地提升云边网的服务质量和进行更精准的网络数据分析，我们将在充分保护用户个人隐私的前提下，对用户数据库进行分析和处理。所有相关的数据分析结果都将被用于有价值的新产品的研发和用户体验的进一步改进。</p> <h3>法律声明</h3> <p>云边网网络平台的所有权和运营权归云边网所有，并保留随时变更平台提供的信息和服务的权利。云边网所提供的相关信息和服务的使用者（以下简称&ldquo;用户&rdquo;）在使用之前必须同意以下的所有条款。</p> <p>用户在云边网平台上发布的信息内容由用户及云边网共同所有，任何其他组织或个人未经用户本人授权同意，不得复制、转载、 擅改其内容。用户不得在点 点网平台发布和散播任何形式的含有下列内容的信息：1）为相关法律法规所禁止；2）有悖于社会公共秩序和善良风俗；3）损害他人合法权益；4）其他云边网 认为不适当在本平台发布的内容。 云边网保留删除和变更上述相关信息的权利。</p> <p>用户应保证在云边网平台的注册信息的真实、准确和完整，并在资料变更时及时更新相关信息。对于任何信息不实所导致的用户本人或第三方损害，云边网不承担任何责任。用户应妥善保管个人注册信息及登录密码等资料，用户将对以其注册用户名进行的所有活动和事件负法律责任。</p> <p>云边网非常强调保护用户的隐私。云边网将致力于为用户提供最可靠的隐私保护措施。未经用户的特别授权，云边网不会将用户 信息公开或透露给任何第三 方个人或机构，但在下列情形除外：1) 根据司法机关、政府部门的强制命令提供涉及用户信息的相关资料； 2) 不可抗力与不可控因素导致的信息外泄； 3) 云边网基于自身的合法维权需要而使用用户的相关信息。</p> <p>用户同意使用云边网平台服务所潜在的风险及其一切可能的后果将完全由自己承担，云边网对这些可能的风险和后果不承担任何责任。</p> <p>云边网不保证云边网平台提供的服务能够满足用户的所有要求，也不保证已存在的服务不会中断，对这些服务的及时性、安全 性、准确性也不作保证。对于 因系统维护或升级的需要而需暂停网络服务的情形，云边网将视具体情形尽可能事先在重要页面发布通知。同时，云边网保留在不事先通知用户的情况下中断或终止 部分或全部服务的权利，对于因服务的中断或终止而造成的用户或第三方的任何损失，云边网不承担任何责任。</p> <p>用户同意尊重和维护云边网平台以及其他用户的合法权益。用户因违反有关法律、法规或协议规定中的任何条款而给云边网或任何第三方造成的损失，用户同意承担由此造成的一切损害赔偿责任。</p> <p>在适用法律允许的范围内，云边网保留对本协议任何条款的解释权和随时变更的权利。 云边网可能会随时根据需要修改本协议的任一条款。如发生此类变更，云边网会提供新版本的条款。用户在变更后对云边网平台服务的使用将视为已完全接受变更后的条款。</p> <p>本协议在根据下述规定终止前，将会一直适用。当下列情况出现时，云边网可以随时中止与用户的协议：1) 用户违反了本协议中的任何规定；2) 法律法规要求终止本协议;3) 云边网认为实际情形不再适宜继续执行本协议。</p> <p>本协议及因本协议产生的一切法律关系及纠纷，均适用中华人民共和国法律。用户与云边网在此同意以云边网营业所在地法院管辖。</p> ');

-- ----------------------------
-- Table structure for `yb_cpage_cate`
-- ----------------------------
DROP TABLE IF EXISTS `yb_cpage_cate`;
CREATE TABLE `yb_cpage_cate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tags` varchar(30) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `keyword` varchar(100) DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL,
  `orders` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tags` (`tags`),
  KEY `order` (`orders`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='自定义页面,标题';

-- ----------------------------
-- Records of yb_cpage_cate
-- ----------------------------
INSERT INTO `yb_cpage_cate` VALUES ('3', 'call', '联系我们', '联系我们', '联系我们', '3');
INSERT INTO `yb_cpage_cate` VALUES ('2', 'help', '使用帮助', '使用帮助', '使用帮助', '2');
INSERT INTO `yb_cpage_cate` VALUES ('1', 'about', '关于我们', '关于我们', '关于我们', '1');
INSERT INTO `yb_cpage_cate` VALUES ('4', 'service', '服务条款', '服务条款', '服务条款', '4');
INSERT INTO `yb_cpage_cate` VALUES ('5', 'privacy', '隐私政策', '隐私政策', '隐私政策', '5');

-- ----------------------------
-- Table structure for `yb_feeds`
-- ----------------------------
DROP TABLE IF EXISTS `yb_feeds`;
CREATE TABLE `yb_feeds` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `parentkey` int(10) NOT NULL DEFAULT '0',
  `bid` int(10) unsigned NOT NULL,
  `type` varchar(20) NOT NULL,
  `uid` int(10) NOT NULL,
  `title` varchar(50) NOT NULL COMMENT '动态标题',
  `info` varchar(255) DEFAULT '' COMMENT '动态内容',
  `time` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=57 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yb_feeds
-- ----------------------------
INSERT INTO `yb_feeds` VALUES ('1', '1', '1', 'reply', '1', '回复本内容', 'zmeyang', '1389976093');
INSERT INTO `yb_feeds` VALUES ('2', '0', '1', 'likes', '2', '喜欢本内容', '', '1390019625');
INSERT INTO `yb_feeds` VALUES ('3', '2', '1', 'reply', '2', '回复本内容', '222', '1390019631');
INSERT INTO `yb_feeds` VALUES ('4', '3', '1', 'reply', '1', '回复本内容', '大丰收', '1390019677');
INSERT INTO `yb_feeds` VALUES ('12', '0', '2', 'foword', '1', '转载本内容', '', '1390022001');
INSERT INTO `yb_feeds` VALUES ('6', '4', '2', 'reply', '1', '回复本内容', '怎么样啊', '1390021788');
INSERT INTO `yb_feeds` VALUES ('7', '5', '2', 'reply', '2', '回复本内容', '回复[at=1]@[/at]:222', '1390021906');
INSERT INTO `yb_feeds` VALUES ('8', '6', '2', 'reply', '1', '回复本内容', '回复[at=2]@文刀2[/at]:？？', '1390021918');
INSERT INTO `yb_feeds` VALUES ('9', '7', '2', 'reply', '1', '回复本内容', '怎么样啊咪', '1390021980');
INSERT INTO `yb_feeds` VALUES ('13', '8', '3', 'reply', '1', '回复本内容', '怎么呀啊', '1390022372');
INSERT INTO `yb_feeds` VALUES ('14', '0', '18', 'likes', '5', '喜欢本内容', '', '1390189932');
INSERT INTO `yb_feeds` VALUES ('15', '9', '17', 'reply', '5', '回复本内容', '还能有音乐', '1390189949');
INSERT INTO `yb_feeds` VALUES ('16', '10', '18', 'reply', '5', '回复本内容', '还能有视频', '1390189955');
INSERT INTO `yb_feeds` VALUES ('17', '0', '15', 'likes', '5', '喜欢本内容', '', '1390189960');
INSERT INTO `yb_feeds` VALUES ('18', '0', '15', 'foword', '5', '转载本内容', '', '1390189964');
INSERT INTO `yb_feeds` VALUES ('19', '0', '21', 'foword', '1', '转载本内容', '', '1390881146');
INSERT INTO `yb_feeds` VALUES ('21', '11', '30', 'reply', '15', '回复本内容', 'fasfs', '1403838308');
INSERT INTO `yb_feeds` VALUES ('22', '12', '34', 'reply', '1', '回复本内容', '不错', '1404269935');
INSERT INTO `yb_feeds` VALUES ('23', '13', '17', 'reply', '1', '回复本内容', '回复[at=5]@马小奇[/at]:是的啊', '1404269961');
INSERT INTO `yb_feeds` VALUES ('24', '14', '24', 'reply', '19', '回复本内容', '不参与哦', '1404270471');
INSERT INTO `yb_feeds` VALUES ('25', '0', '24', 'likes', '19', '喜欢本内容', '', '1404270472');
INSERT INTO `yb_feeds` VALUES ('26', '0', '24', 'foword', '19', '转载本内容', '', '1404270474');
INSERT INTO `yb_feeds` VALUES ('29', '0', '39', 'likes', '20', '喜欢本内容', '', '1404297743');
INSERT INTO `yb_feeds` VALUES ('30', '15', '39', 'reply', '20', '回复本内容', '多少分多少分', '1404297746');
INSERT INTO `yb_feeds` VALUES ('31', '16', '39', 'reply', '1', '回复本内容', 's', '1404298014');
INSERT INTO `yb_feeds` VALUES ('32', '17', '39', 'reply', '1', '回复本内容', '回复[at=20]@文刀文的[/at]:搜索', '1404309338');
INSERT INTO `yb_feeds` VALUES ('38', '0', '38', 'likes', '22', '喜欢本内容', '', '1404552222');
INSERT INTO `yb_feeds` VALUES ('39', '18', '38', 'reply', '22', '回复本内容', 'sdfddd', '1404552231');
INSERT INTO `yb_feeds` VALUES ('40', '0', '38', 'foword', '22', '转载本内容', '', '1404552235');
INSERT INTO `yb_feeds` VALUES ('41', '0', '41', 'foword', '1', '转载本内容', '', '1404553595');
INSERT INTO `yb_feeds` VALUES ('42', '0', '32', 'foword', '1', '转载本内容', '', '1404554435');
INSERT INTO `yb_feeds` VALUES ('43', '0', '41', 'likes', '1', '喜欢本内容', '', '1404555109');
INSERT INTO `yb_feeds` VALUES ('44', '0', '34', 'likes', '1', '喜欢本内容', '', '1404555117');
INSERT INTO `yb_feeds` VALUES ('45', '0', '34', 'foword', '1', '转载本内容', '', '1404557000');
INSERT INTO `yb_feeds` VALUES ('46', '0', '46', 'foword', '1', '转载本内容', '', '1404817517');
INSERT INTO `yb_feeds` VALUES ('47', '0', '47', 'foword', '25', '转载本内容', '', '1405166675');
INSERT INTO `yb_feeds` VALUES ('48', '0', '47', 'foword', '25', '转载本内容', '', '1405168100');
INSERT INTO `yb_feeds` VALUES ('49', '0', '46', 'foword', '25', '转载本内容', '', '1405227391');
INSERT INTO `yb_feeds` VALUES ('50', '0', '46', 'foword', '25', '转载本内容', '', '1405227533');
INSERT INTO `yb_feeds` VALUES ('51', '0', '46', 'foword', '25', '转载本内容', '', '1405227577');
INSERT INTO `yb_feeds` VALUES ('52', '0', '46', 'foword', '25', '转载本内容', '', '1405227647');
INSERT INTO `yb_feeds` VALUES ('53', '0', '46', 'foword', '25', '转载本内容', '', '1405240588');
INSERT INTO `yb_feeds` VALUES ('54', '0', '46', 'foword', '25', '转载本内容', '先写上测试代码', '1405241055');
INSERT INTO `yb_feeds` VALUES ('55', '0', '46', 'foword', '25', '转载本内容', '先写上测试代码', '1405241278');
INSERT INTO `yb_feeds` VALUES ('56', '0', '46', 'foword', '25', '转载本内容', '先写上测试代码', '1405245643');

-- ----------------------------
-- Table structure for `yb_findpwd`
-- ----------------------------
DROP TABLE IF EXISTS `yb_findpwd`;
CREATE TABLE `yb_findpwd` (
  `uid` int(10) NOT NULL,
  `token` char(32) NOT NULL,
  `time` int(10) NOT NULL,
  `mailsend` int(10) NOT NULL COMMENT '上次发送邮件时间',
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='找回密码';

-- ----------------------------
-- Records of yb_findpwd
-- ----------------------------
INSERT INTO `yb_findpwd` VALUES ('1', 'c66912872c535f54e9aaaae3f3a1e3f3', '1405148465', '1405150265');

-- ----------------------------
-- Table structure for `yb_follow`
-- ----------------------------
DROP TABLE IF EXISTS `yb_follow`;
CREATE TABLE `yb_follow` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned NOT NULL COMMENT '谁',
  `touid` int(10) unsigned NOT NULL COMMENT '关注他',
  `linker` tinyint(1) NOT NULL COMMENT '互相关注',
  `time` int(10) NOT NULL COMMENT '关注时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uid` (`uid`,`touid`),
  KEY `touid` (`touid`)
) ENGINE=MyISAM AUTO_INCREMENT=66 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yb_follow
-- ----------------------------
INSERT INTO `yb_follow` VALUES ('1', '2', '1', '1', '1390019756');
INSERT INTO `yb_follow` VALUES ('2', '1', '2', '1', '1390021704');
INSERT INTO `yb_follow` VALUES ('3', '4', '1', '1', '1390148573');
INSERT INTO `yb_follow` VALUES ('4', '1', '4', '1', '1390189606');
INSERT INTO `yb_follow` VALUES ('5', '5', '1', '1', '1390189866');
INSERT INTO `yb_follow` VALUES ('6', '4', '5', '1', '1390190076');
INSERT INTO `yb_follow` VALUES ('7', '5', '4', '1', '1390190115');
INSERT INTO `yb_follow` VALUES ('8', '1', '5', '1', '1390190198');
INSERT INTO `yb_follow` VALUES ('9', '1', '7', '0', '1390293792');
INSERT INTO `yb_follow` VALUES ('10', '1', '6', '0', '1390293795');
INSERT INTO `yb_follow` VALUES ('11', '1', '3', '0', '1390295653');
INSERT INTO `yb_follow` VALUES ('12', '5', '7', '0', '1390300234');
INSERT INTO `yb_follow` VALUES ('13', '5', '6', '0', '1390300242');
INSERT INTO `yb_follow` VALUES ('14', '20', '5', '0', '1404275927');
INSERT INTO `yb_follow` VALUES ('15', '20', '7', '0', '1404275927');
INSERT INTO `yb_follow` VALUES ('16', '20', '17', '0', '1404275927');
INSERT INTO `yb_follow` VALUES ('17', '20', '11', '0', '1404275927');
INSERT INTO `yb_follow` VALUES ('18', '20', '14', '0', '1404275927');
INSERT INTO `yb_follow` VALUES ('19', '20', '19', '0', '1404275927');
INSERT INTO `yb_follow` VALUES ('20', '20', '9', '0', '1404275927');
INSERT INTO `yb_follow` VALUES ('21', '20', '6', '0', '1404275927');
INSERT INTO `yb_follow` VALUES ('22', '20', '13', '0', '1404275927');
INSERT INTO `yb_follow` VALUES ('23', '20', '8', '0', '1404275927');
INSERT INTO `yb_follow` VALUES ('24', '20', '16', '0', '1404275927');
INSERT INTO `yb_follow` VALUES ('35', '20', '1', '0', '1404297757');
INSERT INTO `yb_follow` VALUES ('26', '20', '10', '0', '1404275927');
INSERT INTO `yb_follow` VALUES ('27', '20', '15', '0', '1404275927');
INSERT INTO `yb_follow` VALUES ('28', '20', '18', '0', '1404275927');
INSERT INTO `yb_follow` VALUES ('29', '20', '4', '0', '1404275927');
INSERT INTO `yb_follow` VALUES ('30', '20', '12', '0', '1404275927');
INSERT INTO `yb_follow` VALUES ('36', '1', '19', '0', '1404348118');
INSERT INTO `yb_follow` VALUES ('33', '21', '7', '0', '1404289934');
INSERT INTO `yb_follow` VALUES ('34', '1', '21', '0', '1404290685');
INSERT INTO `yb_follow` VALUES ('37', '22', '4', '0', '1404548743');
INSERT INTO `yb_follow` VALUES ('38', '22', '8', '0', '1404548743');
INSERT INTO `yb_follow` VALUES ('39', '22', '17', '0', '1404548743');
INSERT INTO `yb_follow` VALUES ('40', '22', '16', '0', '1404548743');
INSERT INTO `yb_follow` VALUES ('41', '22', '11', '0', '1404548743');
INSERT INTO `yb_follow` VALUES ('42', '22', '6', '0', '1404548743');
INSERT INTO `yb_follow` VALUES ('43', '22', '15', '0', '1404548743');
INSERT INTO `yb_follow` VALUES ('44', '22', '19', '0', '1404548743');
INSERT INTO `yb_follow` VALUES ('45', '22', '18', '0', '1404548743');
INSERT INTO `yb_follow` VALUES ('46', '22', '10', '0', '1404548743');
INSERT INTO `yb_follow` VALUES ('47', '22', '14', '0', '1404548743');
INSERT INTO `yb_follow` VALUES ('48', '22', '21', '0', '1404548743');
INSERT INTO `yb_follow` VALUES ('49', '22', '5', '0', '1404548743');
INSERT INTO `yb_follow` VALUES ('50', '22', '3', '0', '1404548743');
INSERT INTO `yb_follow` VALUES ('51', '22', '9', '0', '1404548743');
INSERT INTO `yb_follow` VALUES ('52', '22', '1', '1', '1404548743');
INSERT INTO `yb_follow` VALUES ('53', '22', '13', '0', '1404548743');
INSERT INTO `yb_follow` VALUES ('54', '22', '12', '0', '1404548743');
INSERT INTO `yb_follow` VALUES ('55', '22', '7', '0', '1404548743');
INSERT INTO `yb_follow` VALUES ('56', '1', '22', '1', '1404564576');
INSERT INTO `yb_follow` VALUES ('57', '1', '18', '0', '1404565763');
INSERT INTO `yb_follow` VALUES ('58', '23', '1', '1', '1404628338');
INSERT INTO `yb_follow` VALUES ('59', '23', '22', '0', '1404628347');
INSERT INTO `yb_follow` VALUES ('60', '1', '23', '1', '1404791575');
INSERT INTO `yb_follow` VALUES ('61', '25', '20', '0', '1405146596');
INSERT INTO `yb_follow` VALUES ('62', '25', '11', '0', '1405146596');
INSERT INTO `yb_follow` VALUES ('63', '25', '7', '0', '1405146596');
INSERT INTO `yb_follow` VALUES ('65', '25', '23', '0', '1405239635');

-- ----------------------------
-- Table structure for `yb_invite`
-- ----------------------------
DROP TABLE IF EXISTS `yb_invite`;
CREATE TABLE `yb_invite` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) NOT NULL COMMENT '用户ID',
  `inviteCode` char(32) NOT NULL COMMENT '邀请码',
  `exptime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '邀请码过期时间',
  PRIMARY KEY (`id`),
  KEY `inviteCode` (`inviteCode`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='邀请表';

-- ----------------------------
-- Records of yb_invite
-- ----------------------------

-- ----------------------------
-- Table structure for `yb_invite_friend`
-- ----------------------------
DROP TABLE IF EXISTS `yb_invite_friend`;
CREATE TABLE `yb_invite_friend` (
  `uid` int(10) NOT NULL,
  `touid` int(10) NOT NULL,
  PRIMARY KEY (`touid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='邀请过的好友';

-- ----------------------------
-- Records of yb_invite_friend
-- ----------------------------

-- ----------------------------
-- Table structure for `yb_likes`
-- ----------------------------
DROP TABLE IF EXISTS `yb_likes`;
CREATE TABLE `yb_likes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned NOT NULL,
  `bid` int(10) unsigned NOT NULL,
  `time` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `bid` (`bid`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yb_likes
-- ----------------------------
INSERT INTO `yb_likes` VALUES ('1', '2', '1', '1390019625');
INSERT INTO `yb_likes` VALUES ('5', '5', '18', '1390189932');
INSERT INTO `yb_likes` VALUES ('6', '5', '15', '1390189960');
INSERT INTO `yb_likes` VALUES ('8', '19', '24', '1404270472');
INSERT INTO `yb_likes` VALUES ('11', '20', '39', '1404297743');
INSERT INTO `yb_likes` VALUES ('17', '22', '38', '1404552222');
INSERT INTO `yb_likes` VALUES ('18', '1', '41', '1404555109');
INSERT INTO `yb_likes` VALUES ('19', '1', '34', '1404555117');

-- ----------------------------
-- Table structure for `yb_member`
-- ----------------------------
DROP TABLE IF EXISTS `yb_member`;
CREATE TABLE `yb_member` (
  `uid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `open` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否开放',
  `email` varchar(50) NOT NULL,
  `password` char(32) NOT NULL,
  `salt` char(32) NOT NULL,
  `username` varchar(20) NOT NULL DEFAULT '' COMMENT '昵称',
  `domain` varchar(20) NOT NULL DEFAULT '',
  `local` varchar(20) DEFAULT NULL COMMENT '我所在',
  `blogtag` varchar(100) DEFAULT NULL,
  `sign` varchar(140) DEFAULT NULL,
  `num` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '发布数量',
  `flow` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '关注我的',
  `likenum` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '我喜欢的',
  `qq` char(12) NOT NULL DEFAULT '',
  `regtime` int(10) NOT NULL,
  `logtime` int(10) NOT NULL DEFAULT '0',
  `regip` char(16) NOT NULL DEFAULT '0',
  `logip` char(16) NOT NULL DEFAULT '0',
  `m_rep` tinyint(1) NOT NULL DEFAULT '1',
  `m_fow` tinyint(1) NOT NULL DEFAULT '1',
  `m_pm` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`uid`),
  KEY `username` (`username`),
  KEY `domain` (`domain`),
  KEY `blogtag` (`blogtag`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yb_member
-- ----------------------------
INSERT INTO `yb_member` VALUES ('1', '1', '1', 'liuhengmao@163.com', '19f43abb2522481378ae51e30ffe2c0d', 'Y51#8n', '左文右刀', 'jasonliu', '火星', '艺术,时尚,音乐,阅读', '东方的', '13', '11', '2', '', '1389966191', '1405153571', '42.120.74.207', '115.199.99.55', '1', '1', '1');
INSERT INTO `yb_member` VALUES ('4', '0', '1', 'test@test.com', 'caa7c2d84fd41ea286a2248147e81685', '@ByFVY', '推推观光', '', '火星', null, null, '1', '2', '0', '', '1390147164', '1390189657', '115.196.137.255', '42.120.74.198', '1', '1', '1');
INSERT INTO `yb_member` VALUES ('3', '0', '1', '282409166@qq.com', 'a3a6ce603b03664da9131f51e20031df', '', '文刀', '', null, null, null, '0', '0', '0', '', '0', '0', '0', '0', '1', '1', '1');
INSERT INTO `yb_member` VALUES ('5', '0', '1', 'xqhead@gmail.com', 'eb854ff4253f30fe1928ba9160fb1659', 'L7bCUP', '马小奇', '', '火星', null, null, '2', '4', '2', '', '1390189767', '1390286556', '42.120.74.205', '42.120.74.205', '1', '1', '1');
INSERT INTO `yb_member` VALUES ('6', '0', '1', 'lookhana@126.com', 'fc35d8d1edfacad5b75ca66f26ca7e15', 'e32sRs', 'hana', '', '火星', null, null, '0', '0', '0', '', '1390292591', '0', '122.200.86.132', '0', '1', '1', '1');
INSERT INTO `yb_member` VALUES ('7', '0', '1', 'Xuanzhou@live.com', 'a170af769d3faf15a858881f5e1f1d94', 'pb4RKw', '故事姑娘', '', '火星', null, null, '0', '0', '0', '', '1390293287', '0', '111.193.200.171', '0', '1', '1', '1');
INSERT INTO `yb_member` VALUES ('8', '0', '1', 'qcfree@qq.com', '80fd499bed0788e25e49eda07639c3ad', 't2L7~g', 'wenwen ', '', '火星', null, null, '0', '0', '0', '', '1393997168', '0', '221.10.104.141', '0', '1', '1', '1');
INSERT INTO `yb_member` VALUES ('9', '0', '1', '524674643@qq.com', '9d5acbc221438c9ceaa42b2a970b46e3', 'd7AC~9', 'Mario', '', '火星', null, null, '0', '0', '0', '', '1397026294', '0', '123.232.116.13', '0', '1', '1', '1');
INSERT INTO `yb_member` VALUES ('10', '0', '1', 'zzm2241395242@163.com', '865e453454815e156d4cd5af68e02fdb', 'u#HEQw', 'xingbang', '', '火星', null, null, '1', '0', '0', '', '1398655322', '1399251668', '218.28.140.186', '218.28.140.186', '1', '1', '1');
INSERT INTO `yb_member` VALUES ('11', '0', '1', 'Payee@aliyun.com', '8e143007c4482b4d4889db7b65bfa368', 'mh8fwy', 'Freet', '', '火星', null, null, '0', '0', '0', '', '1401888433', '1402217779', '182.39.156.103', '182.39.157.166', '1', '1', '1');
INSERT INTO `yb_member` VALUES ('12', '0', '1', 'sghkltryw@163.com', 'c795865c89670bda80ad697f4657d7fd', 'hvCG7m', '配资业务', '', '火星', null, null, '1', '0', '0', '', '1402728914', '0', '58.23.247.187', '0', '1', '1', '1');
INSERT INTO `yb_member` VALUES ('13', '0', '1', 'sdfohio@qq.com', 'b82f762f3849c748700ff1b296301f1a', 'Qq236t', 'safs', '', '火星', null, null, '1', '0', '0', '', '1403776065', '0', '182.39.146.166', '0', '1', '1', '1');
INSERT INTO `yb_member` VALUES ('14', '0', '1', 'fsf@qq.com', '2ef1a72d5d56e772201551390e30c235', 'eZucFa', 'fasjfjfs', '', '火星', null, null, '0', '0', '0', '', '1403830959', '0', '182.39.142.227', '0', '1', '1', '1');
INSERT INTO `yb_member` VALUES ('15', '0', '1', 'fsafsf@qq.com', 'e41aa49e22dbdc2123c0751e0cdfdaa4', 'VcArSw', 'fdsafs', '', '火星', null, null, '6', '0', '0', '', '1403837764', '0', '182.39.142.227', '0', '1', '1', '1');
INSERT INTO `yb_member` VALUES ('16', '0', '1', 'fsfsd@qq.com', '0ce7328dbed593016e422f3721abac87', 'ek~qMV', 'fsfsf', '', '火星', null, null, '0', '0', '0', '', '1403842285', '0', '182.39.142.227', '0', '1', '1', '1');
INSERT INTO `yb_member` VALUES ('17', '0', '1', 'fsdfsf@qq.com', '01bcee08790e6900f7d94da53d575337', 'yb8~Eu', 'dsflfjs', '', '火星', null, null, '0', '0', '0', '', '1403842815', '0', '182.39.142.227', '0', '1', '1', '1');
INSERT INTO `yb_member` VALUES ('18', '0', '1', 'erykgfhdfc@163.com', 'b222e95c2a74b19b116c18f4bb159f68', '~BOFbt', '期货配资', '', '火星', null, null, '1', '0', '0', '', '1404220635', '0', '119.233.152.148', '0', '1', '1', '1');
INSERT INTO `yb_member` VALUES ('19', '0', '1', 'liuhengmao@qq.com', '566208f8a59507f151db6d3626865ac9', 'vXR7rb', ' 文刀', '', '火星', null, null, '1', '0', '1', '', '1404270455', '1404348046', '42.120.74.199', '125.119.236.216', '1', '1', '1');
INSERT INTO `yb_member` VALUES ('20', '0', '1', 'liuhengmao@1633.com', 'cc971e1880f8a3ab48e46c5a85925465', 'SF2IVA', '文刀文的', 'aaaa', '火星', '阅读', null, '0', '17', '1', '', '1404275888', '0', '42.120.74.199', '0', '1', '1', '1');
INSERT INTO `yb_member` VALUES ('21', '0', '1', 'jefferkim@163.com', 'cc7ba9fbd36e2cae469d1b239d1f2174', 'em@gLS', 'jeffer', 'jeffer', '火星', '艺术,时尚,摄影,阅读,动漫,游戏,设计', null, '0', '1', '0', '', '1404289910', '1404372658', '42.120.74.193', '42.120.74.193', '1', '1', '1');
INSERT INTO `yb_member` VALUES ('22', '0', '1', 'haian2442@hotmail.com', '5f6db5dd98556cee0a5ef04942902136', 'BRZaCA', '东流', 'dongliu', '火星', '互联网,科学', null, '3', '19', '1', '', '1404548693', '1404552118', '111.196.255.248', '111.196.255.248', '1', '1', '1');
INSERT INTO `yb_member` VALUES ('23', '0', '1', 'turbopeter@163.com', '4a20021951090b2bbd4eda0f3b9c3854', 'oOCnXy', 'minzhan', '', '火星', null, null, '1', '2', '0', '', '1404628312', '1404644790', '125.34.210.197', '125.34.210.197', '1', '1', '1');
INSERT INTO `yb_member` VALUES ('24', '0', '1', '240143187@qq.com', '93e603e51265ff454350b4a4ffc63275', 'IMgfDT', '111111', '', '火星', null, null, '0', '0', '0', '', '1405088684', '0', '222.221.69.201', '0', '1', '1', '1');
INSERT INTO `yb_member` VALUES ('25', '0', '1', 'yucy1985@126.com', 'c1b8ab792582c7e2c0086aa13be87001', 'G8HR~m', 'foryucy', 'yucy', '火星', '音乐,摄影,阅读,动漫,随笔,插画,设计,创意', null, '10', '4', '0', '', '1405146524', '1405167116', '101.245.87.41', '127.0.0.1', '1', '1', '1');

-- ----------------------------
-- Table structure for `yb_memberex`
-- ----------------------------
DROP TABLE IF EXISTS `yb_memberex`;
CREATE TABLE `yb_memberex` (
  `openid` char(32) NOT NULL COMMENT '登陆唯一id',
  `token` char(32) NOT NULL COMMENT '验证凭据',
  `secret` char(32) NOT NULL,
  `types` char(4) NOT NULL COMMENT '类型 QQ SINA W163',
  `uid` int(10) NOT NULL COMMENT '是否关联账户',
  `expires` int(10) NOT NULL COMMENT '是否过期',
  PRIMARY KEY (`openid`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='开放登陆';

-- ----------------------------
-- Records of yb_memberex
-- ----------------------------

-- ----------------------------
-- Table structure for `yb_models`
-- ----------------------------
DROP TABLE IF EXISTS `yb_models`;
CREATE TABLE `yb_models` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `icon` varchar(50) NOT NULL COMMENT '图标或样式标示符',
  `name` varchar(50) NOT NULL,
  `modelfile` char(20) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `mdesc` varchar(255) NOT NULL,
  `version` varchar(10) NOT NULL,
  `author` varchar(20) DEFAULT 'SYSTEM',
  `feedtpl` text NOT NULL,
  `cfg` text NOT NULL COMMENT 'conf',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yb_models
-- ----------------------------
INSERT INTO `yb_models` VALUES ('1', 'text', '文字', 'word.class.php', '1', '发布文字', '1.0', 'SYSTEM', '', 'imguplod--1--是否开启图片上传\r\nimguploadsize--2048--图片上传尺寸不设置取全局\r\nimagetype--jpg|jpeg|png|gif--图片上传类型');
INSERT INTO `yb_models` VALUES ('5', 'product', '宝贝', 'product.class.php', '1', '发布宝贝', '1.0', 'SYSTEM', '', 'enableurl--1--是否开启引用地址发布');
INSERT INTO `yb_models` VALUES ('4', 'video', '视频', 'video.class.php', '1', '发布视频', '1.0', 'SYSTEM', '', '');
INSERT INTO `yb_models` VALUES ('3', 'photo', '图片', 'photo.class.php', '1', '发布图片', '1.0', 'SYSTEM', '', 'imagetype--jpg|jpeg|png|gif--上传类型\r\nimagesize--20480--上传大小\r\nimagecount--20--每次最大上传数量');
INSERT INTO `yb_models` VALUES ('2', 'music', '音乐', 'music.class.php', '1', '发布音乐', '1.0', 'SYSTEM', '', 'enableupload--1--是否开启上传发布\r\nuploadsize--5000--允许长传大小(KB)\r\nuploadtype--mp3|wma|mid|midi--允许上传的类型\r\n');

-- ----------------------------
-- Table structure for `yb_mytags`
-- ----------------------------
DROP TABLE IF EXISTS `yb_mytags`;
CREATE TABLE `yb_mytags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned NOT NULL,
  `tagid` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tagid` (`tagid`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='我收藏的Tag';

-- ----------------------------
-- Records of yb_mytags
-- ----------------------------

-- ----------------------------
-- Table structure for `yb_notice`
-- ----------------------------
DROP TABLE IF EXISTS `yb_notice`;
CREATE TABLE `yb_notice` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned NOT NULL COMMENT '我',
  `sys` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1为回复 0为私信 2为通知',
  `foruid` int(10) unsigned NOT NULL COMMENT '谁搞我',
  `title` varchar(50) NOT NULL,
  `info` varchar(500) DEFAULT NULL,
  `extend` text NOT NULL COMMENT '通知扩展信息',
  `isread` tinyint(1) NOT NULL DEFAULT '0',
  `location` varchar(255) NOT NULL COMMENT '跳转位置',
  `time` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `foruid` (`foruid`,`isread`)
) ENGINE=MyISAM AUTO_INCREMENT=73 DEFAULT CHARSET=utf8 COMMENT='我的通知';

-- ----------------------------
-- Records of yb_notice
-- ----------------------------
INSERT INTO `yb_notice` VALUES ('12', '1', '3', '6', '关注通知', '关注了你', '', '0', 'user|6', '1390293795');
INSERT INTO `yb_notice` VALUES ('11', '1', '3', '7', '关注通知', '关注了你', '', '0', 'user|7', '1390293792');
INSERT INTO `yb_notice` VALUES ('13', '1', '3', '3', '关注通知', '关注了你', '', '0', 'user|3', '1390295653');
INSERT INTO `yb_notice` VALUES ('14', '5', '3', '7', '关注通知', '关注了你', '', '0', 'user|7', '1390300234');
INSERT INTO `yb_notice` VALUES ('15', '5', '3', '6', '关注通知', '关注了你', '', '0', 'user|6', '1390300242');
INSERT INTO `yb_notice` VALUES ('16', '1', '1', '5', '回复了您的博客', '回复[at=5]@马小奇[/at]:是的啊', '', '0', 'blog|17', '1404269961');
INSERT INTO `yb_notice` VALUES ('17', '20', '3', '5', '关注通知', '关注了你', '', '0', 'user|5', '1404275927');
INSERT INTO `yb_notice` VALUES ('18', '20', '3', '7', '关注通知', '关注了你', '', '0', 'user|7', '1404275927');
INSERT INTO `yb_notice` VALUES ('19', '20', '3', '17', '关注通知', '关注了你', '', '0', 'user|17', '1404275927');
INSERT INTO `yb_notice` VALUES ('20', '20', '3', '11', '关注通知', '关注了你', '', '0', 'user|11', '1404275927');
INSERT INTO `yb_notice` VALUES ('21', '20', '3', '14', '关注通知', '关注了你', '', '0', 'user|14', '1404275927');
INSERT INTO `yb_notice` VALUES ('22', '20', '3', '19', '关注通知', '关注了你', '', '0', 'user|19', '1404275927');
INSERT INTO `yb_notice` VALUES ('23', '20', '3', '9', '关注通知', '关注了你', '', '0', 'user|9', '1404275927');
INSERT INTO `yb_notice` VALUES ('24', '20', '3', '6', '关注通知', '关注了你', '', '0', 'user|6', '1404275927');
INSERT INTO `yb_notice` VALUES ('25', '20', '3', '13', '关注通知', '关注了你', '', '0', 'user|13', '1404275927');
INSERT INTO `yb_notice` VALUES ('26', '20', '3', '8', '关注通知', '关注了你', '', '0', 'user|8', '1404275927');
INSERT INTO `yb_notice` VALUES ('27', '20', '3', '16', '关注通知', '关注了你', '', '0', 'user|16', '1404275927');
INSERT INTO `yb_notice` VALUES ('35', '1', '3', '20', '关注通知', '互相关注', '', '0', 'user|20', '1404276511');
INSERT INTO `yb_notice` VALUES ('29', '20', '3', '10', '关注通知', '关注了你', '', '0', 'user|10', '1404275927');
INSERT INTO `yb_notice` VALUES ('30', '20', '3', '15', '关注通知', '关注了你', '', '0', 'user|15', '1404275927');
INSERT INTO `yb_notice` VALUES ('31', '20', '3', '18', '关注通知', '关注了你', '', '0', 'user|18', '1404275927');
INSERT INTO `yb_notice` VALUES ('32', '20', '3', '4', '关注通知', '关注了你', '', '0', 'user|4', '1404275927');
INSERT INTO `yb_notice` VALUES ('33', '20', '3', '12', '关注通知', '关注了你', '', '0', 'user|12', '1404275927');
INSERT INTO `yb_notice` VALUES ('34', '1', '3', '20', '关注通知', '互相关注', '', '0', 'user|20', '1404276008');
INSERT INTO `yb_notice` VALUES ('36', '21', '3', '7', '关注通知', '关注了你', '', '0', 'user|7', '1404289934');
INSERT INTO `yb_notice` VALUES ('39', '1', '1', '20', '回复了您的博客', '回复[at=20]@文刀文的[/at]:搜索', '', '0', 'blog|39', '1404309338');
INSERT INTO `yb_notice` VALUES ('40', '1', '3', '19', '关注通知', '关注了你', '', '0', 'user|19', '1404348118');
INSERT INTO `yb_notice` VALUES ('41', '22', '3', '4', '关注通知', '关注了你', '', '0', 'user|4', '1404548743');
INSERT INTO `yb_notice` VALUES ('42', '22', '3', '8', '关注通知', '关注了你', '', '0', 'user|8', '1404548743');
INSERT INTO `yb_notice` VALUES ('43', '22', '3', '17', '关注通知', '关注了你', '', '0', 'user|17', '1404548743');
INSERT INTO `yb_notice` VALUES ('44', '22', '3', '16', '关注通知', '关注了你', '', '0', 'user|16', '1404548743');
INSERT INTO `yb_notice` VALUES ('45', '22', '3', '11', '关注通知', '关注了你', '', '0', 'user|11', '1404548743');
INSERT INTO `yb_notice` VALUES ('46', '22', '3', '6', '关注通知', '关注了你', '', '0', 'user|6', '1404548743');
INSERT INTO `yb_notice` VALUES ('47', '22', '3', '15', '关注通知', '关注了你', '', '0', 'user|15', '1404548743');
INSERT INTO `yb_notice` VALUES ('48', '22', '3', '19', '关注通知', '关注了你', '', '0', 'user|19', '1404548743');
INSERT INTO `yb_notice` VALUES ('49', '22', '3', '18', '关注通知', '关注了你', '', '0', 'user|18', '1404548743');
INSERT INTO `yb_notice` VALUES ('50', '22', '3', '10', '关注通知', '关注了你', '', '0', 'user|10', '1404548743');
INSERT INTO `yb_notice` VALUES ('51', '22', '3', '14', '关注通知', '关注了你', '', '0', 'user|14', '1404548743');
INSERT INTO `yb_notice` VALUES ('52', '22', '3', '21', '关注通知', '关注了你', '', '0', 'user|21', '1404548743');
INSERT INTO `yb_notice` VALUES ('53', '22', '3', '5', '关注通知', '关注了你', '', '0', 'user|5', '1404548743');
INSERT INTO `yb_notice` VALUES ('54', '22', '3', '3', '关注通知', '关注了你', '', '0', 'user|3', '1404548743');
INSERT INTO `yb_notice` VALUES ('55', '22', '3', '9', '关注通知', '关注了你', '', '0', 'user|9', '1404548743');
INSERT INTO `yb_notice` VALUES ('61', '1', '3', '18', '关注通知', '关注了你', '', '0', 'user|18', '1404565763');
INSERT INTO `yb_notice` VALUES ('57', '22', '3', '13', '关注通知', '关注了你', '', '0', 'user|13', '1404548743');
INSERT INTO `yb_notice` VALUES ('58', '22', '3', '12', '关注通知', '关注了你', '', '0', 'user|12', '1404548743');
INSERT INTO `yb_notice` VALUES ('59', '22', '3', '7', '关注通知', '关注了你', '', '0', 'user|7', '1404548743');
INSERT INTO `yb_notice` VALUES ('60', '1', '3', '22', '关注通知', '互相关注', '', '0', 'user|22', '1404564576');
INSERT INTO `yb_notice` VALUES ('65', '25', '3', '20', '关注通知', '关注了你', '', '0', 'user|20', '1405146596');
INSERT INTO `yb_notice` VALUES ('63', '23', '3', '22', '关注通知', '关注了你', '', '0', 'user|22', '1404628347');
INSERT INTO `yb_notice` VALUES ('64', '1', '3', '23', '关注通知', '互相关注', '', '0', 'user|23', '1404791575');
INSERT INTO `yb_notice` VALUES ('66', '25', '3', '11', '关注通知', '关注了你', '', '0', 'user|11', '1405146596');
INSERT INTO `yb_notice` VALUES ('67', '25', '3', '7', '关注通知', '关注了你', '', '0', 'user|7', '1405146596');
INSERT INTO `yb_notice` VALUES ('68', '25', '3', '23', '关注通知', '关注了你', '', '0', 'user|23', '1405238992');
INSERT INTO `yb_notice` VALUES ('69', '25', '4', '25', '转发通知', '测试代码', 'a:1:{s:3:\"bid\";s:2:\"46\";}', '0', 'user|25', '1405240588');
INSERT INTO `yb_notice` VALUES ('70', '25', '4', '25', '转发通知', '先写上测试代码', 'a:1:{s:3:\"bid\";s:2:\"46\";}', '0', 'user|25', '1405241055');
INSERT INTO `yb_notice` VALUES ('71', '25', '4', '25', '转发通知', '先写上测试代码', 'a:1:{s:3:\"bid\";s:2:\"46\";}', '0', 'user|25', '1405241277');
INSERT INTO `yb_notice` VALUES ('72', '25', '4', '25', '转发通知', '先写上测试代码', 'a:1:{s:3:\"bid\";s:2:\"46\";}', '0', 'user|25', '1405245643');

-- ----------------------------
-- Table structure for `yb_pm`
-- ----------------------------
DROP TABLE IF EXISTS `yb_pm`;
CREATE TABLE `yb_pm` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned NOT NULL DEFAULT '0',
  `touid` int(10) NOT NULL,
  `isnew` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `num` int(10) unsigned NOT NULL DEFAULT '0',
  `info` varchar(255) NOT NULL,
  `status` int(10) DEFAULT '0' COMMENT '删除标记',
  `time` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `isnew` (`isnew`,`uid`),
  KEY `pminfo` (`uid`,`touid`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yb_pm
-- ----------------------------
INSERT INTO `yb_pm` VALUES ('1', '5', '1', '0', '1', '很像推推啊', '0', '1390189875');
INSERT INTO `yb_pm` VALUES ('2', '1', '5', '0', '3', '是的', '0', '1390190194');
INSERT INTO `yb_pm` VALUES ('3', '1', '5', '1', '3', '？？', '0', '1404270079');
INSERT INTO `yb_pm` VALUES ('4', '20', '1', '0', '1', '你好', '0', '1404297695');
INSERT INTO `yb_pm` VALUES ('5', '1', '20', '1', '1', '松岛枫', '0', '1404348005');
INSERT INTO `yb_pm` VALUES ('6', '1', '3', '1', '1', '是短发短发', '0', '1404348085');
INSERT INTO `yb_pm` VALUES ('7', '1', '19', '0', '2', '文到', '0', '1404348126');
INSERT INTO `yb_pm` VALUES ('8', '19', '1', '0', '1', '东方', '0', '1404348707');
INSERT INTO `yb_pm` VALUES ('9', '1', '19', '0', '2', '打发打发', '0', '1404348718');
INSERT INTO `yb_pm` VALUES ('10', '1', '5', '1', '3', '东方', '0', '1405155062');

-- ----------------------------
-- Table structure for `yb_replay`
-- ----------------------------
DROP TABLE IF EXISTS `yb_replay`;
CREATE TABLE `yb_replay` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `bid` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `repuid` int(10) unsigned DEFAULT '0' COMMENT '回复某人',
  `msg` varchar(255) NOT NULL,
  `time` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yb_replay
-- ----------------------------
INSERT INTO `yb_replay` VALUES ('1', '1', '1', null, 'zmeyang', '1389976093');
INSERT INTO `yb_replay` VALUES ('2', '1', '2', null, '222', '1390019631');
INSERT INTO `yb_replay` VALUES ('3', '1', '1', null, '大丰收', '1390019677');
INSERT INTO `yb_replay` VALUES ('4', '2', '1', null, '怎么样啊', '1390021788');
INSERT INTO `yb_replay` VALUES ('5', '2', '2', '1', '回复[at=1]@[/at]:222', '1390021906');
INSERT INTO `yb_replay` VALUES ('6', '2', '1', '2', '回复[at=2]@文刀2[/at]:？？', '1390021918');
INSERT INTO `yb_replay` VALUES ('7', '2', '1', null, '怎么样啊咪', '1390021980');
INSERT INTO `yb_replay` VALUES ('8', '3', '1', null, '怎么呀啊', '1390022372');
INSERT INTO `yb_replay` VALUES ('9', '17', '5', null, '还能有音乐', '1390189949');
INSERT INTO `yb_replay` VALUES ('10', '18', '5', null, '还能有视频', '1390189955');
INSERT INTO `yb_replay` VALUES ('11', '30', '15', null, 'fasfs', '1403838308');
INSERT INTO `yb_replay` VALUES ('12', '34', '1', null, '不错', '1404269935');
INSERT INTO `yb_replay` VALUES ('13', '17', '1', '5', '回复[at=5]@马小奇[/at]:是的啊', '1404269961');
INSERT INTO `yb_replay` VALUES ('14', '24', '19', null, '不参与哦', '1404270471');
INSERT INTO `yb_replay` VALUES ('15', '39', '20', null, '多少分多少分', '1404297746');
INSERT INTO `yb_replay` VALUES ('16', '39', '1', null, 's', '1404298014');
INSERT INTO `yb_replay` VALUES ('17', '39', '1', '20', '回复[at=20]@文刀文的[/at]:搜索', '1404309338');
INSERT INTO `yb_replay` VALUES ('18', '38', '22', null, 'sdfddd', '1404552231');

-- ----------------------------
-- Table structure for `yb_setting`
-- ----------------------------
DROP TABLE IF EXISTS `yb_setting`;
CREATE TABLE `yb_setting` (
  `name` varchar(25) NOT NULL,
  `val` text,
  PRIMARY KEY (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='系统设置';

-- ----------------------------
-- Records of yb_setting
-- ----------------------------
INSERT INTO `yb_setting` VALUES ('site_title', '推推');
INSERT INTO `yb_setting` VALUES ('site_desc', '推推');
INSERT INTO `yb_setting` VALUES ('site_count', '');
INSERT INTO `yb_setting` VALUES ('site_titlepre', '相逢的人会再相逢');
INSERT INTO `yb_setting` VALUES ('site_keyword', '推推,推推网,淘宝推推,购物');
INSERT INTO `yb_setting` VALUES ('regCodeSwitch', '0');
INSERT INTO `yb_setting` VALUES ('loginCodeSwitch', '0');
INSERT INTO `yb_setting` VALUES ('invite_switch', '0');
INSERT INTO `yb_setting` VALUES ('recomm_switch', '1');
INSERT INTO `yb_setting` VALUES ('invite_count', '5');
INSERT INTO `yb_setting` VALUES ('invite_expiration', '10');
INSERT INTO `yb_setting` VALUES ('guestMode', '0');
INSERT INTO `yb_setting` VALUES ('theme_uploadsize', '1048576');
INSERT INTO `yb_setting` VALUES ('theme_upload', '1');
INSERT INTO `yb_setting` VALUES ('show_page_mode', '1');
INSERT INTO `yb_setting` VALUES ('show_ajax_to', '4');
INSERT INTO `yb_setting` VALUES ('show_page_num', '10');
INSERT INTO `yb_setting` VALUES ('hotuser_switch', '1');
INSERT INTO `yb_setting` VALUES ('wizard_switch', '1');
INSERT INTO `yb_setting` VALUES ('theme_uploadtype', 'jpg,png,gif');
INSERT INTO `yb_setting` VALUES ('addimg_upsize', '2097152');
INSERT INTO `yb_setting` VALUES ('addimg_type', 'jpg|png|jpge|bmp');
INSERT INTO `yb_setting` VALUES ('keep_email', 'admin,yunbian');
INSERT INTO `yb_setting` VALUES ('keep_niname', 'yunbian,admin,administrator,master,webmaster,email,username,password');
INSERT INTO `yb_setting` VALUES ('keep_domain', 'www,yunbian,bbs,music,map,index,register,login,tag,now,admin,recommend,discovery,myfollow,mypost,mylikes,myreplays,mynotices,edit,logout,home,gomember,location,showinfo,about,copyright,call,service,privacy,custom,read,pm,user,site');
INSERT INTO `yb_setting` VALUES ('keep_rep', '操你妈,艹你妈');
INSERT INTO `yb_setting` VALUES ('site_icp', '');
INSERT INTO `yb_setting` VALUES ('cookiepre', '');
INSERT INTO `yb_setting` VALUES ('cookiekey', '');
INSERT INTO `yb_setting` VALUES ('mail_open', '0');
INSERT INTO `yb_setting` VALUES ('mail_host', '');
INSERT INTO `yb_setting` VALUES ('mail_port', '');
INSERT INTO `yb_setting` VALUES ('mail_user', 'liuhengmao@163.com');
INSERT INTO `yb_setting` VALUES ('mail_pwd', '1986214214');
INSERT INTO `yb_setting` VALUES ('mail_from', '');
INSERT INTO `yb_setting` VALUES ('mail_fromname', '');
INSERT INTO `yb_setting` VALUES ('post_verify_switch', '0');
INSERT INTO `yb_setting` VALUES ('post_verify_url', '');
INSERT INTO `yb_setting` VALUES ('post_verify_http', '');
INSERT INTO `yb_setting` VALUES ('post_verify_keyword', '');
INSERT INTO `yb_setting` VALUES ('openlogin_qq_open', '1');
INSERT INTO `yb_setting` VALUES ('openlogin_qq_appid', '101052745');
INSERT INTO `yb_setting` VALUES ('openlogin_qq_appkey', '0e9664968766eb4a9f01b9de47b3b0c8');
INSERT INTO `yb_setting` VALUES ('openlogin_qq_callback', 'http://shougongquan.com/index.php?c=openconnect&a=qq&callback=true');
INSERT INTO `yb_setting` VALUES ('openlogin_weib_open', '1');
INSERT INTO `yb_setting` VALUES ('openlogin_weib_appid', '');
INSERT INTO `yb_setting` VALUES ('openlogin_weib_appkey', '');
INSERT INTO `yb_setting` VALUES ('openlogin_weib_callback', '');

-- ----------------------------
-- Table structure for `yb_skins`
-- ----------------------------
DROP TABLE IF EXISTS `yb_skins`;
CREATE TABLE `yb_skins` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `skindir` varchar(255) NOT NULL COMMENT '主题位置',
  `name` varchar(50) NOT NULL COMMENT '主题名称',
  `author` varchar(50) NOT NULL COMMENT '主题作者',
  `uri` varchar(50) NOT NULL COMMENT '主题主页',
  `version` char(10) NOT NULL COMMENT '主题版本',
  `exclusive` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否为专属主题',
  `usenumber` int(10) DEFAULT '0' COMMENT '多少人用',
  `setup` text COMMENT '主题钩子',
  `open` tinyint(1) NOT NULL DEFAULT '0' COMMENT '允许使用',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='系统主题表';

-- ----------------------------
-- Records of yb_skins
-- ----------------------------

-- ----------------------------
-- Table structure for `yb_tags`
-- ----------------------------
DROP TABLE IF EXISTS `yb_tags`;
CREATE TABLE `yb_tags` (
  `tid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned NOT NULL,
  `title` varchar(20) NOT NULL,
  `bid` int(10) unsigned NOT NULL,
  PRIMARY KEY (`tid`),
  KEY `title` (`title`),
  KEY `bid` (`bid`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yb_tags
-- ----------------------------
INSERT INTO `yb_tags` VALUES ('9', '1', '蜗牛', '17');
INSERT INTO `yb_tags` VALUES ('10', '1', '群星', '17');
INSERT INTO `yb_tags` VALUES ('11', '10', 'qiumoji', '25');
INSERT INTO `yb_tags` VALUES ('12', '12', '智深配资 股票配', '26');
INSERT INTO `yb_tags` VALUES ('13', '13', '000', '27');
INSERT INTO `yb_tags` VALUES ('14', '15', '123', '29');
INSERT INTO `yb_tags` VALUES ('15', '15', '123', '30');
INSERT INTO `yb_tags` VALUES ('16', '15', '123', '31');
INSERT INTO `yb_tags` VALUES ('17', '15', '123', '32');
INSERT INTO `yb_tags` VALUES ('18', '18', '北京股票配资网', '34');
INSERT INTO `yb_tags` VALUES ('19', '1', '王菲', '36');
INSERT INTO `yb_tags` VALUES ('20', '1', '可爱女人', '36');

-- ----------------------------
-- Table structure for `yb_tags_blog`
-- ----------------------------
DROP TABLE IF EXISTS `yb_tags_blog`;
CREATE TABLE `yb_tags_blog` (
  `tagid` int(10) NOT NULL COMMENT 'tagid',
  `uid` int(10) NOT NULL COMMENT 'uid',
  KEY `tagid` (`tagid`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='根据某人设置的blogid 获得tagid';

-- ----------------------------
-- Records of yb_tags_blog
-- ----------------------------
INSERT INTO `yb_tags_blog` VALUES ('5', '1');
INSERT INTO `yb_tags_blog` VALUES ('3', '1');
INSERT INTO `yb_tags_blog` VALUES ('2', '1');
INSERT INTO `yb_tags_blog` VALUES ('1', '1');
INSERT INTO `yb_tags_blog` VALUES ('5', '20');
INSERT INTO `yb_tags_blog` VALUES ('1', '21');
INSERT INTO `yb_tags_blog` VALUES ('2', '21');
INSERT INTO `yb_tags_blog` VALUES ('4', '21');
INSERT INTO `yb_tags_blog` VALUES ('5', '21');
INSERT INTO `yb_tags_blog` VALUES ('6', '21');
INSERT INTO `yb_tags_blog` VALUES ('7', '21');
INSERT INTO `yb_tags_blog` VALUES ('10', '21');
INSERT INTO `yb_tags_blog` VALUES ('17', '22');
INSERT INTO `yb_tags_blog` VALUES ('24', '22');
INSERT INTO `yb_tags_blog` VALUES ('3', '25');
INSERT INTO `yb_tags_blog` VALUES ('4', '25');
INSERT INTO `yb_tags_blog` VALUES ('5', '25');
INSERT INTO `yb_tags_blog` VALUES ('6', '25');
INSERT INTO `yb_tags_blog` VALUES ('8', '25');
INSERT INTO `yb_tags_blog` VALUES ('9', '25');
INSERT INTO `yb_tags_blog` VALUES ('10', '25');
INSERT INTO `yb_tags_blog` VALUES ('12', '25');

-- ----------------------------
-- Table structure for `yb_tags_system`
-- ----------------------------
DROP TABLE IF EXISTS `yb_tags_system`;
CREATE TABLE `yb_tags_system` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL COMMENT '标签',
  `num` int(10) unsigned DEFAULT '0' COMMENT '标签使用率',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='系统整理标签表';

-- ----------------------------
-- Records of yb_tags_system
-- ----------------------------

-- ----------------------------
-- Table structure for `yb_theme`
-- ----------------------------
DROP TABLE IF EXISTS `yb_theme`;
CREATE TABLE `yb_theme` (
  `uid` int(10) NOT NULL,
  `config` text,
  `setup` text,
  `css` text,
  `img1` varchar(255) DEFAULT NULL,
  `img2` varchar(255) DEFAULT NULL,
  `img3` varchar(255) DEFAULT NULL,
  `img4` varchar(255) DEFAULT NULL,
  `theme` varchar(255) DEFAULT NULL,
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='个人主题表';

-- ----------------------------
-- Records of yb_theme
-- ----------------------------
INSERT INTO `yb_theme` VALUES ('1', 'a:6:{s:4:\"user\";N;s:5:\"setup\";N;s:28:\"#header_bg|background-repeat\";s:5:\"repet\";s:30:\"#header_bg|background-position\";s:5:\"repet\";s:32:\"#header_bg|background-attachment\";s:6:\"scroll\";s:13:\"#sign|display\";s:5:\"block\";}', 'a:1:{s:10:\"page_limit\";s:2:\"10\";}', '\n#header_bg{background-repeat:repet;}\n#header_bg{background-position:repet;}\n#header_bg{background-attachment:scroll;}\n#sign{display:block;}', null, null, null, null, null);


### 新增字段
alter table th_blog add likecount int(10) default 0 COMMENT '喜欢数'