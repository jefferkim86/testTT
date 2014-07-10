<?php /* Smarty version Smarty-3.0.6, created on 2012-12-22 00:00:36
         compiled from "tplv2\theme/default/header.html" */ ?>
<?php /*%%SmartyHeaderCode:3116850d487a4be46c1-14792082%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6aa8eb01fc3b7945c598da841e4a42e3464cb290' => 
    array (
      0 => 'tplv2\\theme/default/header.html',
      1 => 1341236348,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3116850d487a4be46c1-14792082',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!doctype html>
<html lang="zh-cn">
<head>
<title> <?php if ($_smarty_tpl->getVariable('titles')->value!=''){?> <?php echo $_smarty_tpl->getVariable('titles')->value;?>
 - <?php }?><?php echo $_smarty_tpl->getVariable('username')->value;?>
 - <?php echo $_smarty_tpl->getVariable('yb')->value['site_title'];?>
 - Powered by 云边轻博</title>
<meta charset="utf-8" />
<base href="<?php echo $_smarty_tpl->getVariable('url')->value;?>
/" />
<meta name="author" content="<?php echo $_smarty_tpl->getVariable('username')->value;?>
,<?php echo $_smarty_tpl->getVariable('domain')->value;?>
,yunbian.org" />
<meta name="description" content="<?php if ($_smarty_tpl->getVariable('usersign')->value==''){?><?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->getVariable('description')->value);?>
<?php }else{ ?><?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->getVariable('usersign')->value);?>
<?php }?>" />
<meta name="keywords" content="<?php if ($_smarty_tpl->getVariable('usertag')->value==''){?><?php echo $_smarty_tpl->getVariable('keywords')->value;?>
<?php }else{ ?><?php  $_smarty_tpl->tpl_vars['t'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('usertag')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['t']->key => $_smarty_tpl->tpl_vars['t']->value){
?><?php echo $_smarty_tpl->tpl_vars['t']->value;?>
,<?php }} ?><?php }?><?php if ($_smarty_tpl->getVariable('title')->value!=''){?>,<?php echo $_smarty_tpl->getVariable('title')->value;?>
<?php }?> " />

<script type="text/javascript"> 
var urlpath = '<?php echo $_smarty_tpl->getVariable('url')->value;?>
';
var skinpath = '<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
';
var uid = '<?php echo $_SESSION['uid'];?>
';
var cus_tplhdefine = {}
</script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/js/jquery.js"></script>
<link href="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/css/reset.css" rel="stylesheet" type="text/css">
<link href="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/css/frame.css" rel="stylesheet" type="text/css">
<link href="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/js/dialog/default.css" rel="stylesheet" />

<link rel="shortcut icon" href="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/image/favicon.ico" type="image/x-icon">
<link href="<?php echo $_smarty_tpl->getVariable('themes_path')->value;?>
css/style.css" rel="stylesheet" type="text/css">
<style><?php echo $_smarty_tpl->getVariable('custom_css')->value;?>
</style>
</head>

<body id="body">
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/js/dialog.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/js/template.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/js/global.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/js/theme_template.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/js/jquery.rotate.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/js/model.js"></script>



<div id="header_bg">
<div id="footer_bg">

<div id="header">
 
<?php if (islogin()){?>
    <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main','a'=>'index'),$_smarty_tpl);?>
" target="_top" class="return"><span>返回首页</span></a>
    <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'customize'),$_smarty_tpl);?>
" target="_top" class="custom"><span>个性设置</span></a>
<?php }else{ ?>
    <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main','a'=>'index'),$_smarty_tpl);?>
" class="return"><span>返回首页</span></a>
    <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main','a'=>'login'),$_smarty_tpl);?>
" class="login"><span>登陆</span></a>
    <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main','a'=>'reg'),$_smarty_tpl);?>
" class="register"><span>注册</span></a>
<?php }?>

</div>
<div class="clear"></div>