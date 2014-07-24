<?php /* Smarty version Smarty-3.0.6, created on 2012-12-22 03:23:57
         compiled from "tplv2\admin/header.html" */ ?>
<?php /*%%SmartyHeaderCode:536250d4b74da315e3-75633257%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3ad4bc950b99b28cde14b2efced44fc1943363df' => 
    array (
      0 => 'tplv2\\admin/header.html',
      1 => 1356117793,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '536250d4b74da315e3-75633257',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>yunbian - Administrator Control panel</title>
<script>var urlpath = '<?php echo $_smarty_tpl->getVariable('url')->value;?>
'</script> 
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/js/dialog.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/admin/style/global.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/js/global.js"></script>
<link rel="shortcut icon" href="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/image/favicon.ico" type="image/x-icon">
<link href="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/js/dialog/default.css" rel="stylesheet" />
<link href="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/admin/style/reset.css" rel="stylesheet" type="text/css">
<link href="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/admin/style/style.css" rel="stylesheet" type="text/css">
</head>
<body>

<div id="wrap_admin">
<table cellpadding="0" cellspacing="0" border="0" width="100%">
<tr><td width="160" valign="top">
    <div id="admin_area">
	    <div id="admin_shadow"></div> 
	    <div class="logo"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'admin','a'=>'index'),$_smarty_tpl);?>
">logo</a></div>
		<div class="logo_line"></div>
		<div class="admin_menu">

		    <ul id="nav">
			    <li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'admin','a'=>'index'),$_smarty_tpl);?>
" <?php echo $_smarty_tpl->getVariable('curr_index')->value;?>
><span class="f_index">管理平台</span></a></li>
				
				<li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'admin','a'=>'system'),$_smarty_tpl);?>
" <?php echo $_smarty_tpl->getVariable('curr_system')->value;?>
><span class="f_system">系统管理</span></a></li>
                <div <?php echo $_smarty_tpl->getVariable('curr_systemdisplay')->value;?>
>
				    <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'admin','a'=>'models'),$_smarty_tpl);?>
" <?php echo $_smarty_tpl->getVariable('curr_models')->value;?>
>模型管理</a>
                    <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'admin','a'=>'cpage'),$_smarty_tpl);?>
" <?php echo $_smarty_tpl->getVariable('curr_cpage')->value;?>
>自定义页面管理</a>
				</div>

				<li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'admin','a'=>'blog'),$_smarty_tpl);?>
" <?php echo $_smarty_tpl->getVariable('curr_blog')->value;?>
><span class="f_blog">内容管理</span></a></li>
				<div <?php echo $_smarty_tpl->getVariable('curr_blogdisplay')->value;?>
>
				    <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'admin','a'=>'blog'),$_smarty_tpl);?>
" <?php echo $_smarty_tpl->getVariable('curr_ablog')->value;?>
>博客内容</a>
					 <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'admin','a'=>'blogverify'),$_smarty_tpl);?>
" <?php echo $_smarty_tpl->getVariable('curr_ablogverify')->value;?>
>内容审核</a>
				    <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'admin','a'=>'systag'),$_smarty_tpl);?>
" <?php echo $_smarty_tpl->getVariable('curr_systag')->value;?>
>系统标签</a>
					 <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'admin','a'=>'usertag'),$_smarty_tpl);?>
" <?php echo $_smarty_tpl->getVariable('curr_usertag')->value;?>
>用户标签</a>
					 <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'admin','a'=>'sort'),$_smarty_tpl);?>
" <?php echo $_smarty_tpl->getVariable('curr_sort')->value;?>
>分类管理</a>
					<!--
					<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'admin','a'=>'recommend'),$_smarty_tpl);?>
" <?php echo $_smarty_tpl->getVariable('curr_recommend')->value;?>
>推荐</a>
					-->
				</div>
				
                <li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'admin','a'=>'adUnit'),$_smarty_tpl);?>
" <?php echo $_smarty_tpl->getVariable('curr_adUnit')->value;?>
><span class="f_ad">广告管理</span></a></li>
                 <div <?php echo $_smarty_tpl->getVariable('curr_addisplay')->value;?>
>
				    <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'admin','a'=>'adUnit'),$_smarty_tpl);?>
" <?php echo $_smarty_tpl->getVariable('curr_aadUnit')->value;?>
>广告位管理</a>
				    <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'admin','a'=>'adContent'),$_smarty_tpl);?>
" <?php echo $_smarty_tpl->getVariable('curr_aadlist')->value;?>
>广告管理</a>
				</div>
				
				<li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'admin','a'=>'user'),$_smarty_tpl);?>
" <?php echo $_smarty_tpl->getVariable('curr_user')->value;?>
><span class="f_user">用户管理</span></a></li>
				<div <?php echo $_smarty_tpl->getVariable('curr_noticedisplay')->value;?>
>
				    <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'admin','a'=>'notice'),$_smarty_tpl);?>
" <?php echo $_smarty_tpl->getVariable('curr_anotice')->value;?>
>系统通知</a>
				  
				</div>
				<li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'admin','a'=>'theme'),$_smarty_tpl);?>
" <?php echo $_smarty_tpl->getVariable('curr_theme')->value;?>
><span class="f_theme">主题管理</span></a></li>
				<li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'admin','a'=>'database'),$_smarty_tpl);?>
" <?php echo $_smarty_tpl->getVariable('curr_database')->value;?>
><span class="f_database">数据管理</span></a></li>
				
			</ul>
		</div>
		
	</div>
	
	</td>
	<td valign="top">
    <div id="admin_header">
	    <div class="administrator">
		    <li class="headinfo"><a href="<?php echo goUserHome(array('uid'=>$_SESSION['uid']),$_smarty_tpl);?>
" target="_blank">
            <img src="<?php echo avatar(array('uid'=>$_SESSION['uid'],'size'=>'middle'),$_smarty_tpl);?>
" alt="<?php echo $_smarty_tpl->getVariable('info')->value['username'];?>
"/></a></li>
			<li><a href="<?php echo goUserHome(array('uid'=>$_SESSION['uid']),$_smarty_tpl);?>
" target="_blank">欢迎 <?php echo $_SESSION['username'];?>
</a></li>
			<li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main'),$_smarty_tpl);?>
" target="_blank">返回网站</a></li>
		</div>
	    <div class="ws_title"><?php echo $_smarty_tpl->getVariable('yb')->value['site_title'];?>
</div>
	</div>
   <?php if (isset($_smarty_tpl->getVariable('get',null,true,false)->value['ac'])){?> <script>showprccmsg('<?php echo $_smarty_tpl->getVariable('get')->value['ac'];?>
')</script> <?php }?>
