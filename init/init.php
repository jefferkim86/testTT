<?php
/////////////////////////////////////////////////////////////////
// SpeedPHP中文PHP框架, Copyright (C) 2008 - 2010 SpeedPHP.com //
/////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////////
//云边开源轻博, Copyright (C)   2010 - 2011  qing.thinksaas.cn
//EMAIL:nxfte@qq.com QQ:234027573
//$Id: init.php 1248 2012-07-09 12:01:58Z anythink $

define('SP_VERSION', '3.1.66'); // 当前框架版本
/**
 * spCore
 *
 * SpeedPHP应用框架的系统执行程序
 */

// 定义系统路径
if(!defined('SP_PATH')) define('SP_PATH', dirname(__FILE__).'/SpeedPHP');
if(!defined('APP_PATH')) define('APP_PATH', dirname(__FILE__).'/app');


// 载入核心函数库
require(SP_PATH.'/spFunctions.php');


// 载入配置文件
$GLOBALS['G_SP'] = spConfigReady(require(SP_PATH.'/spConfig.php'),$spConfig);

define('DBPRE',$GLOBALS['G_SP']['db']['prefix']); //定义表前缀

// 根据配置文件进行一些全局变量的定义
if('debug' == $GLOBALS['G_SP']['mode']){
	define('SP_DEBUG',TRUE); // 当前正在调试模式下
}else{
	define('SP_DEBUG',FALSE); // 当前正在部署模式下
}
// 如果是调试模式，打开警告输出
if (SP_DEBUG) {
	if( substr(PHP_VERSION, 0, 3) == '5.3' ){
		error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING & ~E_DEPRECATED);
	}else if ( substr(PHP_VERSION, 0, 3) == '5.4'){
		error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_WARNING & ~E_DEPRECATED); 
	}else{
		error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
	}
} else {
	error_reporting(0);
}
if(substr(PHP_VERSION, 0, 3) < '5.3'){
	//exit('system must be install php 5.3+');
}
@set_magic_quotes_runtime(0);
//禁止代理访问
if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])) exit('Sorry,This site doesn\'t allowed proxy access');
// 自动开启SESSION
if($GLOBALS['G_SP']['auto_session'])@session_start();
// 载入核心MVC架构文件
import($GLOBALS['G_SP']['sp_core_path'].'/spController.php', FALSE, TRUE);
import($GLOBALS['G_SP']['sp_core_path'].'/spModel.php', FALSE, TRUE);
import($GLOBALS['G_SP']['sp_core_path'].'/spView.php', FALSE, TRUE);
import($GLOBALS['G_SP']['sp_core_path'].'/ybModel.php', FALSE, TRUE);
import($GLOBALS['G_SP']['sp_core_path'].'/top.php', FALSE, TRUE);
// 当在二级目录中使用SpeedPHP框架时，自动获取当前访问的文件名
if('' == $GLOBALS['G_SP']['url']['url_path_base']){
	if(basename($_SERVER['SCRIPT_NAME']) === basename($_SERVER['SCRIPT_FILENAME']))
		$GLOBALS['G_SP']['url']['url_path_base'] = $_SERVER['SCRIPT_NAME'];
	elseif (basename($_SERVER['PHP_SELF']) === basename($_SERVER['SCRIPT_FILENAME']))
		$GLOBALS['G_SP']['url']['url_path_base'] = $_SERVER['PHP_SELF'];
	elseif (isset($_SERVER['ORIG_SCRIPT_NAME']) && basename($_SERVER['ORIG_SCRIPT_NAME']) === basename($_SERVER['SCRIPT_FILENAME']))
		$GLOBALS['G_SP']['url']['url_path_base'] = $_SERVER['ORIG_SCRIPT_NAME'];
}
// 在使用PATH_INFO的情况下，对路由进行预处理
if(TRUE == $GLOBALS['G_SP']['url']['url_path_info'] && !empty($_SERVER['PATH_INFO'])){
	$url_args = explode('/', $_SERVER['PATH_INFO']);$url_sort = array();
	for($u = 1; $u < count($url_args); $u++){
		if($u == 1)$url_sort[$GLOBALS['G_SP']['url_controller']] = $url_args[$u];
		elseif($u == 2)$url_sort[$GLOBALS['G_SP']['url_action']] = $url_args[$u];
		else {$url_sort[$url_args[$u]] = isset($url_args[$u+1]) ? $url_args[$u+1] : '';$u+=1;}}
	if('POST' == strtoupper($_SERVER['REQUEST_METHOD'])){$_REQUEST = $_POST =  $_POST + $url_sort;
	}else{$_REQUEST = $_GET = $_GET + $url_sort;}
}

// 构造执行路由
$__controller = isset($_REQUEST[$GLOBALS['G_SP']['url_controller']]) ?
	$_REQUEST[$GLOBALS['G_SP']['url_controller']] :
	$GLOBALS['G_SP']['default_controller'];
$__action = isset($_REQUEST[$GLOBALS['G_SP']['url_action']]) ?
	$_REQUEST[$GLOBALS['G_SP']['url_action']] :
	$GLOBALS['G_SP']['default_action'];


//加载用户级设置变量
if(!spAccess('r','ybconfig')){  //读取设置
	$GLOBALS['YB'] = spClass('db_setting')->getConfig();
	spAccess('w','ybconfig',$GLOBALS['YB'],-1);
}else{
	$GLOBALS['YB'] =  spAccess('r','ybconfig');
}
	


$GLOBALS['YB']['version'] = '2.0 RC';
$GLOBALS['YB']['soft'] = '云边轻博';
$GLOBALS['YB']['url'] = 'http://qing.thinksaas.cn';
$GLOBALS['YB']['email'] = 'nxfte@qq.com';
$GLOBALS['YB']['copyright'] = 'GNU GPL';
$GLOBALS['YB']['year'] = '2011 - '.date('Y',time());
$GLOBALS['YB']['author'] = 'anythink';
$GLOBALS['YB']['code'] = 'anythink &lt;anythink.wx@gmail.com&gt; ';
$GLOBALS['YB']['design'] = 'LDuo &lt;liuduo-i3@163.com&gt;';
require(SP_PATH.'/thFunctions.php');
if(TRUE == $GLOBALS['G_SP']['auto_sp_run'])spRun();
