<?php
/////////////////////////////////////////////////////////////////
//云边开源轻博, Copyright (C)   2010 - 2011  qing.thinksaas.cn
//EMAIL:nxfte@qq.com QQ:234027573
//$Id: index.php 43 2011-11-06 08:19:05Z anythink $

define("APP_PATH",substr(dirname(__FILE__),0,-8));
define('IN_APP',TRUE);
define("APP_NAME",'/'); //是否在二级目录，
define("SP_PATH",APP_PATH.'/init');
require(SP_PATH."/spFunctions.php");
require(SP_PATH."/thFunctions.php");



date_default_timezone_set('PRC');
if( substr(PHP_VERSION, 0, 3) == "5.3" ){
	error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING & ~E_DEPRECATED);
}else{
	error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
}


header("Content-type: text/html; charset=utf-8");





$step = $_GET['step'];

switch($step)
{
	case '2';
	chkInstall();
	include 'tpl/license.html';
	break;

	case '3';
	chkInstall();
	include 'tpl/check.html';
	break;

	case '4';
	chkInstall();
	include 'tpl/database.html';
	break;

	case '5';
	chkInstall();
	$err = testDbConnect();
	include 'tpl/database.html';
	break;

	case '6';
	chkInstall();
	writeConfig();
	break;

	case '7';
		if(isset($_POST['final'])){$err = setUserInfo();}
		include 'tpl/siteinfo.html';
	break;

	case 'final';
	session_start();
	$url = '../';
	$adminurl = $url.'index.php?c=admin';
	include 'tpl/final.html';
	break;




	default:
	include 'tpl/index.html';
}


function chkInstall()
{
	if(is_file(APP_PATH.'/config.php')){ exit( '您已经安装过了，请删除./config.php 文件后刷新本页面继续安装！');  }
}


function dir_writeable($dir) {
	if(!is_dir($dir)) {
		@mkdir($dir, 0777);
	}
	if(is_dir($dir)) {
		if($fp = @fopen("$dir/test.txt", 'w')) {
			@fclose($fp);
			@unlink("$dir/test.txt");
			$writeable = 1;
		} else {
			$writeable = 0;
		}
	}
	return $writeable;
}

function ckeckwrite($result = 0) {
	if($result) {
		$text =  '<font color="#0000EE">可写</font><br>';return $text;
	} else {
		$text = '<font color="#FF0000">不可写</font><br>';return $text;
	}
}

function getDatabase()
{
	$data = '';
	if(function_exists('mysql_connect')){$data[] = 'mysql';}
	if(function_exists('mysqli_connect')){$data[] = 'mysqli';}
	if(function_exists('pdo_drivers')){$data[] = 'pdo_mysql';}
	return $data;
}

function getUploadState()
{
	if(@ini_get(file_uploads)) {
		$max_size = @ini_get(upload_max_filesize);
		return  '允许/'.$max_size;
	} else {
		return'不允许';
	}
}


function getCurlstate()
{
	if(!function_exists("curl_init"))
	{
		return '不支持';
	}else{
		return '支持';
	}
}

function gdVersion()
{
	if(!function_exists("gd_info")){$gd = '不支持,无法处理图像';}
	if(function_exists(gd_info)) {  $gd = @gd_info();  $gd = $gd["GD Version"];  $gd ? '&nbsp; 版本：'.$gd : '';}
	return $gd;
}

function testDbConnect()
{
	$msg='';
	if(!$db = @mysql_connect($_POST['host'], $_POST['user'], $_POST['pwd']))
	{
		$errormsg = 'database_errno_'.mysql_error();
		$msg .= '数据库主机或者用户名或者密码填写错误：'.$errormsg;
	}else{
		if( mysql_get_server_info() < 5){$msg = 'Mysql版本过低：'.mysql_get_server_info().',请安装mysql5以上';}

		if(!mysql_select_db($_POST['name']))
		{
			$msg = '数据库选择错误'.mysql_error().'';
			if($_POST['creatdb'] == 1)
			{
				mysql_query("set names utf8");
				$sql = "CREATE DATABASE `{$_POST['name']}`";
				if(!mysql_query($sql,$db))
				{
					$msg = '您没有权限创建数据库'.$_POST['name'].','.mysql_error();
				}else{
					$msg = '';
				}
			}

		}

		if(!preg_match("/^[\w_]+_$/",$_POST['pre'])) $msg("数据表前缀不符合(例如：th_)");
		//检测是否有基本的权限
		if($msg =='')
		{
				$sqlarray = array(
					'createtable' => 'CREATE TABLE th_test (test TINYINT (3) UNSIGNED)',
					'insert' => 'INSERT INTO th_test (test) VALUES (1)',
					'select' => 'SELECT * FROM th_test',
					'update' => 'UPDATE th_test SET test=\'2\' WHERE test=\'1\'',
					'delete' => 'DELETE FROM th_test WHERE test=\'2\'',
					'droptable' => 'DROP TABLE th_test'
				);

				foreach($sqlarray as $key => $sql) {
					mysql_select_db($_POST['name'],$db);
					mysql_query($sql,$db);
					if(mysql_errno()) {
						$msg .= '<li>'.mysql_error().'</li>';
					}
				}
		}
	}

	if($_POST['driver'] == 'noselect'){ $msg = '请选择数据驱动类型';}
	if($msg == ''){return 'ok';}
	return $msg;
}


function writeConfig()
{
	$err = '';
	if(!$configstring = file_get_contents('tpl/config.simple.php')){exit('无法读取配置文件模板tpl/config.simple.php');}
	$time = date('Y年 m月 d日 H:i',time());
	$find = array('{SETUPTIME}','{HOST}','{USER}','{PWD}','{DBNAME}','{DBPRE}','{DRIVERS}');
	$replace = array($time,$_POST['host'],$_POST['user'],$_POST['pwd'],$_POST['name'],$_POST['pre'],_findDriver($_POST['driver']));


	$conf = str_replace($find,$replace,$configstring);
	if(!file_put_contents(APP_PATH.'/config.php',$conf)){exit('写入配置文件失败!config.php 无法写入');}

	if(!$sql = file_get_contents('tpl/qing.sql')) {exit('无法读取数据库模板文件tpl/qing.sql');}
	 $sql = str_replace('th_',$_POST['pre'],$sql);




	$sqlArr = preg_split("/;[\r\n]/", $sql);
	$del = count($sqlArr)-1;
	unset($sqlArr[$del]);

	$db = mysql_connect($_POST['host'], $_POST['user'], $_POST['pwd']);
	 mysql_select_db($_POST['name'],$db);
	foreach($sqlArr as $q)
	{
		$sql = trim($q);
		mysql_select_db($_POST['name'],$db);
		mysql_query("set names utf8");
		if(!mysql_query($sql,$db)){
			$err  .= mysql_error() .'<br>'.$q;
		}
	}
	$trigger1 = "DROP TRIGGER IF EXISTS `deltags`;
			DELIMITER //
			CREATE TRIGGER `deltags` AFTER DELETE ON `th_blog`
			 FOR EACH ROW BEGIN
			delete from th_tags   where bid =old.bid;
			delete from th_replay where bid =old.bid;
			delete from th_likes  where bid =old.bid;
			delete from th_feeds  where bid =old.bid;
			END
			//
			DELIMITER ;";
	$trigger2 = "
		DROP TRIGGER IF EXISTS `deluser`;
			DELIMITER //
			CREATE TRIGGER `deluser` AFTER DELETE ON `th_member`
			 FOR EACH ROW BEGIN
				delete from th_theme  where uid = old.uid;
				delete from th_tags_blog  where uid = old.uid;
				delete from th_pm  where uid = old.uid;
				delete from th_notice  where foruid = old.uid;
				delete from th_mytags  where uid = old.uid;
				delete from th_memberex  where uid = old.uid;
				delete from th_likes  where uid = old.uid;
				delete from th_invite_friend  where uid = old.uid;
				delete from th_invite  where uid = old.uid;
				delete from th_follow  where uid = old.uid;
				delete from th_findpwd  where uid = old.uid;
				delete from th_feeds  where uid = old.uid;
				delete from th_tags   where uid =old.uid;
				delete from th_replay where uid =old.uid;
			END
			//
			DELIMITER ;
	";
	
	$trigger3 = "
		DROP TRIGGER IF EXISTS `del_mytags`;
			DELIMITER //
			CREATE TRIGGER `del_mytags` AFTER DELETE ON `th_tags`
			 FOR EACH ROW delete from th_mytags where tagid =old.tid
			//
			DELIMITER ;
	";
	
	$trigger4 = "CREATE TRIGGER `delmytag` AFTER DELETE ON `th_tags_system` FOR EACH ROW DELETE FROM th_mytags WHERE tagid = old.id";
	
	mysql_query($trigger1);
	mysql_query($trigger2);
	mysql_query($trigger3);
	mysql_query($trigger4);
	if(!mysql_query($sql,$db)){
			$err  .= mysql_error();
	}
	
	if($err != '')
	{
		@unlink(APP_PATH.'/config.php');
		exit('安装数据库出现问题,安装程序被迫中断,重复安装请先清空数据库<br/> 下面是错误信息：<br><br>'.$err);
	}

	header("Location:index.php?step=7");
}


function setUserInfo()
{
	$err = '';
	$po = $_POST;
	if($po['site_title'] == '' || $po['site_titlepre'] == '') $err = '请填写您的网站标题和副标题<br>';

	if($po['email'] == '') $err .= '请填写您的Emali<br>';
	if(strlen($po['password']) < 6) $err .= '密码必须大于6位<br>';
	if($po['password'] != $po['password2']) $err .= '两次密码不一致<br>';
	if($po['salt'] == '') $err .= '系统salt不能为空';



	$file = file_get_contents(APP_PATH.'/config.php'); //读取系统配置
	$find = array('{ENCODESTRING}','//{URLREWRITE}','//{APP_NAME}');
	$appdir = substr($_SERVER['SCRIPT_NAME'],0,-17);
	$app_name ="define('APP_NAME','".$appdir."');";
	$replace = array($po['salt'],_findUrlRewrite($po['rewrite']),$app_name);


	$file = str_replace($find,$replace,$file);

	file_put_contents(APP_PATH.'/config.php',$file); //读取系统配置
	require APP_PATH.'/config.php';


	$db = $spConfig['db'];
	$GLOBALS['G_SP'] = $spConfig;

	$dbhand = mysql_connect($db['host'], $db['login'], $db['password']);
	mysql_select_db($db['database']);
	mysql_query("set names utf8");
	$pre = $db['prefix'];

	$salt = randstr();


	$password = password_encode($po['password'],$salt);
	$time = time();
	$ip = $_SERVER['REMOTE_ADDR'];

	$sql = "INSERT INTO `".$pre."member` (`uid`, `admin`, `email`, `password`, `salt`, `regtime`,  `regip`)
										 VALUES(1, 1,'{$po['email']}', '$password', '$salt',  $time, '$ip')";

	mysql_query($sql);


	$sql = "INSERT INTO `".$pre."setting` (`name`, `val`) VALUES
										('site_title', '{$po['site_title']}'),
										('site_desc', '又一个云边轻博客系统诞生'),
										('site_count', ''),
										('site_titlepre', '{$po['site_titlepre']}'),
										('site_keyword', '云边,yunbian,PHP,MYSQL,轻博客,开源,轻博,qing,开源轻博,开源轻博客'),
										('regCodeSwitch','1'),
										('loginCodeSwitch','1'),
										('invite_switch','0'),
										('recomm_switch','0'),
										('invite_count','5'),
										('invite_expiration','10'),
										('guestMode', '0'),
										('theme_uploadsize', '1048576'),
										('theme_upload', '1'),
										('show_page_mode', '0'),
										('show_ajax_to', '4'),
										('show_page_num', '10'),
										('hotuser_switch','1'),
										('wizard_switch','0'),
										('theme_uploadtype', 'jpg,png,gif'),
										('addimg_upsize', '2097152'),
										('addimg_type','jpg|png|jpge|bmp'),

								
										('keep_email', 'admin,yunbian'),
										('keep_niname', 'yunbian,admin,administrator,master,webmaster,email,username,password'),
										('keep_domain', 'www,yunbian,bbs,music,map,index,register,login,tag,now,admin,recommend,discovery,myfollow,mypost,mylikes,myreplays,mynotices,edit,logout,home,gomember,location,showinfo,about,copyright,call,service,privacy,custom,read,pm,user,site'),
										('keep_rep', '操你妈,艹你妈');
										";
	mysql_query($sql);
	
	$tab1 = "
	INSERT INTO `".$pre."models` (`id`, `icon`, `name`, `modelfile`, `status`, `mdesc`, `version`, `author`, `feedtpl`, `cfg`) VALUES
	(1, 'text', '文字', 'word.class.php', 1, '发布文字', '1.0', 'SYSTEM', '', 'imguplod--1--是否开启图片上传\nimguploadsize--2048--图片上传尺寸不设置取全局\nimagetype--jpg|jpge|png|gif--图片上传类型'),
	(2, 'music', '音乐', 'music.class.php', 1, '发布音乐', '1.0', 'SYSTEM', '', 'enableurl--1--是否开启引用地址发布\r\nenableupload--1--是否开启上传发布\r\nuploadsize--5000--允许长传大小(KB)\r\nuploadtype--mp3|wma|mid|midi--允许上传的类型'),
	(4, 'video', '视频', 'video.class.php', 1, '发布视频', '1.0', 'SYSTEM', '', ''),
	(3, 'photo', '图片', 'photo.class.php', 1, '发布图片', '1.0', 'SYSTEM', '', 'imagetype--jpg|jpge|png|gif--上传类型\nimagesize--20480--上传大小\nimagecount--20--每次最大上传数量'),
	(6, 'movie', '电影', 'movie.class.php', 1, '发布电影', '1.0', 'SYSTEM', '', 'enableurl--1--是否开启解析功能');
	";
	
	$tab2 = "
	INSERT INTO `".$pre."catetags` (`cid`, `catename`, `sort`, `used`) VALUES
	(1, '艺术', 1, 0),(2, '时尚', 2, 0),(3, '音乐', 3, 0),(4, '摄影', 4, 0),
	(5, '阅读', 5, 0),(6, '动漫', 6, 0),(7, '游戏', 7, 0),(8, '随笔', 8, 0),
	(9, '插画', 9, 0),(10, '设计', 10, 0),(11, '建筑', 11, 0),(12, '创意', 12, 0),
	(13, '猎图', 13, 0),(14, '宠物', 14, 0),(15, '汽车', 15, 0),(16, '家居', 16, 0),
	(17, '互联网', 17, 0),(18, '旅行', 18, 0),(19, '数码', 19, 0),(20, '影视', 20, 0),
	(21, '美食', 21, 0),(22, '恋物', 22, 0),(23, '趣味', 23, 0),(24, '科学', 24, 0),
	(25, '军事', 25, 0),(26, '体育', 26, 0);";
	
	
	$tab3 = "INSERT INTO `".$pre."cpage_cate` (`id`, `tags`, `title`, `keyword`, `description`, `orders`) VALUES
	(3, 'call', '联系我们', '联系我们', '联系我们', 3),(2, 'help', '使用帮助', '使用帮助', '使用帮助', 2),
	(1, 'about', '关于我们', '关于我们', '关于我们', 1),(4, 'service', '服务条款', '服务条款', '服务条款', 4),
	(5, 'privacy', '隐私政策', '隐私政策', '隐私政策', 5);";
	
	$tab4 = "
		INSERT INTO `".$pre."cpage_body` (`cid`, `body`) VALUES
	(1, ' <h3>我们是——云边网</h3> <p>云边网是国内首个率先开源的轻博客系统，从六月开发，八月测试，九月上线以来。将为用户提供最好用的轻博客平台。</p> <p>云边网是一个全新的、倾向于音乐话题的&ldquo;高质量内容发布和传播&rdquo;的轻博客社区。</p> <p>轻博客是介于博客与微博之间的一种网络服务，博客是倾向于表达的，微博则更倾向于社交和传播，轻博客吸收双方的优势。</p> <p>如果说微博是一份报纸，博客是一本书，那么轻博客则更像一本杂志，当然这只是从内容层面的一种形象比喻。</p> <p>既不同于微博也不同于博客，我们是一种全新的网络媒体。</p> <h3>云边网面向所有喜欢音乐的朋友，无论您</h3> <p>喜欢听，或是喜欢聊，或是喜欢唱，或是喜欢写，或是喜欢创作，或是乐手，或是后期 等等... 云边网正是您最佳的传播和交流平台。因为，我们只关注音乐。</p> <p>欢迎各位志同道合的朋友，到云边网来发布自己的作品，也欢迎各位专业朋友的点评与指导，让我们以音乐为目标，向着让更多喜欢音乐的人，获取更多精彩的内容为目标而共同努力。</p> <p>音乐是一种伟大的艺术，云边网的初衷正是希望将这种艺术升华，为您展示。</p> <h3>玩转云边</h3> <p>简洁的操作，让用户简单快速地发布文字、图片、音乐、视频，采用完全的内容和兴趣导航模式，让云边网成为一个全新的、真正致力于&ldquo;高质量内容发布和传播&rdquo;的轻博客社区。</p> <p>更多独有的多元化元素,可以直接上上传音乐至轻博，可直接插入虾米、雅燃等音乐，与大家分享你的音乐或你的感悟。</p> <p>以音乐为主线,以兴趣为话题，轻松快乐的参与和沟通，帮你找到你最想看到的内容、最想结识的朋友。一切都基于你的爱好，让每天都在发现兴趣的乐趣中度过。</p> <h3>立即使用</h3> <p>虽然目前是测试版本,但是您可以立即使用。无需邀请，秒速注册。迅速加入音乐大家庭中。</p> <p>云边网使用了html5和css3的一些新特性,如果您使用非IE浏览器将会获得更加友好的效果。</p> '),
	(2, ' <h3>发布内容</h3> <p>登陆后点击右侧 文字链接，即可进入发布文字功能。可输入内容，并可插入单张图片</p> <h3>发布音乐</h3> <p>登陆后点击右侧 音乐，即可进入发布音乐功能。您可以选择网络音乐 和 本地上传两种方式。</p> <p>网络音乐引用地址可以输入虾米、雅燃音乐、音悦台、优酷、土豆、6间房、腾讯播客、新浪博客、56.com等诸多网站播放地址。 也可以直接粘贴网络后缀为mp3的歌曲。</p> <p>本地上传您可以上传本地的MP3文件，但请注意的是您需要拥有该媒体的著作权，也就是说您自己录或者制作的音乐皆可，但不能上传网络上不属于您的版权的音乐。如果被查出或举报或版权纠纷我们将不负任何责任，并且删除该媒体资源。</p> <h3>发布图片</h3> <p>您可以同时上传最多20张照片作为博客内容，并且也可以编写介绍。</p> <h3>发布视频</h3> <p>视频引用地址可以输入虾米、雅燃音乐、音悦台、优酷、土豆、6间房、腾讯播客、新浪博客、56.com等诸多网站播放地址。建议您可以将录制好的视频传至以上媒体然后填写引用地址。</p> <p>同时您也可以编写介绍</p> <h3>关于标签</h3> <p>不管发布任何内容您都需要填写至少一个标签，轻博内容将根据标签来进行区分。因此填写一个或多个合适的标签是非常不错的选择。</p> <h3>关注和喜欢</h3> <p>加为关注的用户将会在您的首页显示最新发布动态</p> <p>加为喜欢的博客可方便您在右侧导航中快速的查找</p> '),
	(3, '<h3>官方网站</h3> <p>http://qing.thinksaas.cn</p> <h3>邮箱</h3> <p>nxfte<span id=\"ats\"></span>qq.com</p> <h3>交流群</h3> <p>qq group 176221558</p> <h3>商业授权</h3> <p>QQ：234027573</p> <h3>付款地址</h3> <p><a href=\"https://me.alipay.com/anythink\" target=\"_blank\">https://me.alipay.com/anythink</a></p> '),
	(4, '<p>本协议适用于云边网开发的云边网平台。使用云边网平台以及与其相关联的各项技术服务和网络服务之前，您必须同意接受本协议。若不接受本协议，您将无法使用云边网平台及相关服务。</p> <p>您可以通过以下方式接受本协议：一旦您注册云边账户并且发布第一条信息起，您对云边网平台及其他相关服务的使用将被视为您自实际 使用起便接受了本协议的全部条款。如果需要注销用户请发送注销申请邮件，我们将删除与您有关的全部内容，您与云边网所有服务都将被终止。注册账户需要用户 本人电子邮件作为注册账号，如果用户使用他人邮件账号注册并被邮件归属人举证成功者将删除用户账号及所有内容，并且一切法律责任自行承担，本站不承担任何 责任。</p> <p>云边网网络平台的所有权和运营权归云边网所有，并保留随时变更平台提供的信息和服务的权利。云边网所提供的相关信息和服务的使用者（以下简称&ldquo;用户&rdquo;）在使用之前必须同意以下的所有条款。</p> <p>用户在云边网平台上发布的信息内容由用户及云边网共同所有，任何其他组织或个人未经用户本人授权同意，不得复制、转载、擅改其内容。用户不得在云边网平台发布和散播任何形式的含有下列内容的信息：<br> 1）为相关法律法规所禁止；<br> 2）有悖于社会公共秩序和善良风俗；<br> 3）损害他人合法权益；<br> 4）其他云边网 认为不适当在本平台发布的内容。 <br> 5）通过发布音乐的上传功能上传非用户本人拥有版权的音频媒体。 <br> 云边网保留删除和变更上述相关信息的权利。</p> <p>用户应保证在云边网平台的注册信息的真实、准确和完整，并在资料变更时及时更新相关信息。对于任何信息不实所导致的用户本人或第三方损害，云边网不承担任何责任。用户应妥善保管个人注册信息及登录密码等资料，用户将对以其注册用户名进行的所有活动和事件负法律责任。</p> <p>云边网非常强调保护用户的隐私。云边网将致力于为用户提供最可靠的隐私保护措施。未经用户的特别授权，云边网不会将用户信息公开或透露给任何第三 方个人或机构，但在下列情形除外：<br> 1) 根据司法机关、政府部门的强制命令提供涉及用户信息的相关资料； <br> 2) 不可抗力与不可控因素导致的信息外泄；<br> 3) 云边网基于自身的合法维权需要而使用用户的相关信息。</p> <p>用户同意使用云边网平台服务所潜在的风险及其一切可能的后果将完全由自己承担，云边网对这些可能的风险和后果不承担任何责任。</p> <p>云边网不保证云边网平台提供的服务能够满足用户的所有要求，也不保证已存在的服务不会中断，对这些服务的及时性、安全 性、准确性也不作保证。对于因系统维护或升级的需要而需暂停网络服务的情形，云边网将视具体情形尽可能事先在重要页面发布通知。同时，云边网保留在不事先 通知用户的情况下中断或终止部分或全部服务的权利，对于因服务的中断或终止而造成的用户或第三方的任何损失，云边网不承担任何责任。</p> <p>用户同意尊重和维护云边网平台以及其他用户的合法权益。用户因违反有关法律、法规或协议规定中的任何条款而给云边网或任何第三方造成的损失，用户同意承担由此造成的一切损害赔偿责任。</p> <p>在适用法律允许的范围内，云边网保留对本协议任何条款的解释权和随时变更的权利。 云边网可能会随时根据需要修改本协议的任一条款。如发生此类变更，云边网会提供新版本的条款。用户在变更后对云边网平台服务的使用将视为已完全接受变更后的条款。</p> <p>本协议在根据下述规定终止前，将会一直适用。当下列情况出现时，云边网可以随时中止与用户的协议：<br> 1) 用户违反了本协议中的任何规定；<br> 2) 法律法规要求终止本协议;<br> 3) 云边网认为实际情形不再适宜继续执行本协议。</p> <p>本协议及因本协议产生的一切法律关系及纠纷，均适用中华人民共和国法律。用户与云边网在此同意以云边网营业所在地法院管辖。</p> '),
	(5, ' <h3>隐私政策</h3> <p>当您在使用我们的服务时，我们将致力于为您提供最可靠的隐私保护措施。未经用户的特别授权，我们承诺不会将用户信息 公开或透露给任何第三方个人或机构，但在下列情形除外：<br> 1) 根据司法机关、政府部门的强制命令提供涉及用户信息的相关资料；<br> 2) 不可抗力与不可控因素导致的信息外泄； <br> 3) 云边网基于自身的合法维权需要而使用用户的相关信息。</p> <p>为了更好地提升云边网的服务质量和进行更精准的网络数据分析，我们将在充分保护用户个人隐私的前提下，对用户数据库进行分析和处理。所有相关的数据分析结果都将被用于有价值的新产品的研发和用户体验的进一步改进。</p> <h3>法律声明</h3> <p>云边网网络平台的所有权和运营权归云边网所有，并保留随时变更平台提供的信息和服务的权利。云边网所提供的相关信息和服务的使用者（以下简称&ldquo;用户&rdquo;）在使用之前必须同意以下的所有条款。</p> <p>用户在云边网平台上发布的信息内容由用户及云边网共同所有，任何其他组织或个人未经用户本人授权同意，不得复制、转载、 擅改其内容。用户不得在点 点网平台发布和散播任何形式的含有下列内容的信息：1）为相关法律法规所禁止；2）有悖于社会公共秩序和善良风俗；3）损害他人合法权益；4）其他云边网 认为不适当在本平台发布的内容。 云边网保留删除和变更上述相关信息的权利。</p> <p>用户应保证在云边网平台的注册信息的真实、准确和完整，并在资料变更时及时更新相关信息。对于任何信息不实所导致的用户本人或第三方损害，云边网不承担任何责任。用户应妥善保管个人注册信息及登录密码等资料，用户将对以其注册用户名进行的所有活动和事件负法律责任。</p> <p>云边网非常强调保护用户的隐私。云边网将致力于为用户提供最可靠的隐私保护措施。未经用户的特别授权，云边网不会将用户 信息公开或透露给任何第三 方个人或机构，但在下列情形除外：1) 根据司法机关、政府部门的强制命令提供涉及用户信息的相关资料； 2) 不可抗力与不可控因素导致的信息外泄； 3) 云边网基于自身的合法维权需要而使用用户的相关信息。</p> <p>用户同意使用云边网平台服务所潜在的风险及其一切可能的后果将完全由自己承担，云边网对这些可能的风险和后果不承担任何责任。</p> <p>云边网不保证云边网平台提供的服务能够满足用户的所有要求，也不保证已存在的服务不会中断，对这些服务的及时性、安全 性、准确性也不作保证。对于 因系统维护或升级的需要而需暂停网络服务的情形，云边网将视具体情形尽可能事先在重要页面发布通知。同时，云边网保留在不事先通知用户的情况下中断或终止 部分或全部服务的权利，对于因服务的中断或终止而造成的用户或第三方的任何损失，云边网不承担任何责任。</p> <p>用户同意尊重和维护云边网平台以及其他用户的合法权益。用户因违反有关法律、法规或协议规定中的任何条款而给云边网或任何第三方造成的损失，用户同意承担由此造成的一切损害赔偿责任。</p> <p>在适用法律允许的范围内，云边网保留对本协议任何条款的解释权和随时变更的权利。 云边网可能会随时根据需要修改本协议的任一条款。如发生此类变更，云边网会提供新版本的条款。用户在变更后对云边网平台服务的使用将视为已完全接受变更后的条款。</p> <p>本协议在根据下述规定终止前，将会一直适用。当下列情况出现时，云边网可以随时中止与用户的协议：1) 用户违反了本协议中的任何规定；2) 法律法规要求终止本协议;3) 云边网认为实际情形不再适宜继续执行本协议。</p> <p>本协议及因本协议产生的一切法律关系及纠纷，均适用中华人民共和国法律。用户与云边网在此同意以云边网营业所在地法院管辖。</p> ');
	";
	
	$tab5 = "INSERT INTO `".$pre."ad_unit` (`id`, `title`, `adesc`, `img`, `orders`, `system`, `is_show`) VALUES
		(1, '首页右侧底部广告', '首页右侧底部广告', '1.jpg', 1, 1, 1),
		(2, '首页顶部广告位', '首页顶部广告位', '2.jpg', 2, 1, 1),
		(3, '发现频道广告位', '发现频道广告位', '3.jpg', 4, 1, 1),
		(4, '推荐频道顶部广告位', '推荐频道顶部广告位', '4.jpg', 3, 1, 1),
		(5, '用户主页右侧广告位', '用户主页右侧广告位', '5.jpg', 5, 1, 1),
		(6, '用户主页详情页广告位', '用户主页详情页广告位', '6.jpg', 6, 1, 1);";
		
	mysql_query($tab1);
	mysql_query($tab2);
	mysql_query($tab3);
	mysql_query($tab4);
	mysql_query($tab5);

	
	
	session_start();
	$_SESSION['uid'] = 1;
	$_SESSION['email'] = $po['email'];
	$_SESSION['admin'] = 1;
	$_SESSION['username'] = '';
	if($err == ''){
	header("Location:index.php?step=final");
	}
	return $err;

}


function postDefault($postkey,$default)
{
	if($_POST[$postkey]){ echo $_POST[$postkey]; }else{ echo $default; }
}

/*获取驱动实名*/
function _findDriver($driver)
{
	switch(driver)
	{
		case 'mysql':return 'mysql';
		break;
		case 'mysqli':return 'mysqli';
		break;
		case 'pdo_mysql':return 'pdo';
		break;
		case 'sqlite':return 'sqlite';
		break;
		case 'oracle':return 'oracle';
		break;
		case 'mssql':return 'mssql';
		break;
		default: return 'mysql';
	}
}

function _findUrlRewrite($val)
{
	if($val)
	{
		$url_write = "
				  'router_prefilter' => array( array('spUrlRewrite', 'setReWrite') ),
				  'function_url' => array( array(\"spUrlRewrite\", \"getReWrite\"), ),";
			  return $url_write;
	}
}


function getSalt()
{
	$salt = time();
	$salt = md5( $salt.$_SERVER['HTTP_USER_AGENT'].$_SERVER['REQUEST_TIME'].$_SERVER['HTTP_ACCEPT_ENCODING'].$_SERVER['HTTP_COOKIE'].$salt );
	return $salt;
}














?>