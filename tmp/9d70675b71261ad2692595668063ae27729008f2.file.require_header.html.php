<?php /* Smarty version Smarty-3.0.6, created on 2014-08-04 02:24:58
         compiled from "tplv2/require_header.html" */ ?>
<?php /*%%SmartyHeaderCode:82387978653de7e7a473793-15865452%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9d70675b71261ad2692595668063ae27729008f2' => 
    array (
      0 => 'tplv2/require_header.html',
      1 => 1407088209,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '82387978653de7e7a473793-15865452',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!doctype html>
<html lang="zh-cn">
<head>
    <title><?php if ($_smarty_tpl->getVariable('titlepre')->value){?><?php echo $_smarty_tpl->getVariable('titlepre')->value;?>
 -<?php }?> <?php echo $_smarty_tpl->getVariable('title')->value;?>
 <?php echo $_smarty_tpl->getVariable('yb')->value['site_title'];?>
  <?php echo $_smarty_tpl->getVariable('yb')->value['site_titlepre'];?>
</title>
    <meta charset="utf-8" />
    <meta name="author" content="<?php echo $_smarty_tpl->getVariable('yb')->value['author'];?>
" />
    <meta name="description" content="<?php if ($_smarty_tpl->getVariable('description')->value){?><?php echo $_smarty_tpl->getVariable('description')->value;?>
<?php }?><?php echo $_smarty_tpl->getVariable('yb')->value['site_desc'];?>
 " />
    <meta name="keywords" content="<?php if ($_smarty_tpl->getVariable('titlepre')->value){?><?php echo $_smarty_tpl->getVariable('titlepre')->value;?>
,<?php }?><?php if ($_smarty_tpl->getVariable('keyword')->value){?><?php echo $_smarty_tpl->getVariable('keyword')->value;?>
<?php }?><?php echo $_smarty_tpl->getVariable('yb')->value['site_keyword'];?>
" />
    <link rel="shortcut icon" href="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/image/favicon.ico" type="image/x-icon">
	<link rel="Bookmark" href="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/image/favicon.ico" type="image/x-icon">
	<link rel="icon" href="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/image/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/css/common.css" class="cssfx"/>
	<?php $_template = new Smarty_Internal_Template("require_js.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
</head>
<body>

<div id="wrap">
    <div id="header" class="clearfix">
	    <div class="header_con">
		    <div id="logo"><a title="<?php echo $_smarty_tpl->getVariable('title')->value;?>
" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main','a'=>'index'),$_smarty_tpl);?>
"><img src="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/image/logo.png" alt="<?php echo $_smarty_tpl->getVariable('title')->value;?>
"/></a></div>
		    <div class="my-attention">
		    	<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main','a'=>'index'),$_smarty_tpl);?>
">我关注的</a>
		    </div>
		
			<div id="nav">
				<!-- <div class="nav-search menu_sc" id="search">
					<input type="button" class="btn" value="搜索" onclick="user_search()"/>
					<input type="text" id="searchtag" value="请输入用户昵称" class="ipt">
				</div> -->

			</div>

			<?php if (islogin()){?>
			<div id="tool">			
			    <div class="function">

					<div class="publish-menu">
						<a href="javascript:void(0);">发布</a>
						<div class="menu publish" style="display:none;">
							<ul>
								<?php  $_smarty_tpl->tpl_vars['model'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('mconfig')->value['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['model']->key => $_smarty_tpl->tpl_vars['model']->value){
?>
					               <?php if ($_smarty_tpl->tpl_vars['model']->value['status']==1){?>
								   <li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'post','a'=>'add','model'=>$_smarty_tpl->tpl_vars['model']->value['id']),$_smarty_tpl);?>
"><span>发<?php echo $_smarty_tpl->tpl_vars['model']->value['name'];?>
</span></a></li>
								   <?php }?>
							    <?php }} ?>
							</ul>
						</div>
					</div>
					
					<!--消息中心-->
					<div class="notice">
						<a href="javascript:void(0);" title="通知">
				    		<div class="notice-block">
				    			<span id="notice">消息<span id="now_notice" class="msg_all_count" style="display:none;"></span></span>
				    			
				    		</div>
				    	</a>
				    	<div class="menu notice_menu" style="display:none;">
						    <ul>
						    	<li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'user','a'=>'mymessage','tab'=>'comment'),$_smarty_tpl);?>
"><span>评论我的<b class="msg_reply_count"></b></span></a></li>
						    	<li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'user','a'=>'mymessage','tab'=>'forward'),$_smarty_tpl);?>
"><span>转发我的<b class="msg_forward_count"></b></span></a></li>
						    	<li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'user','a'=>'mymessage','tab'=>'like'),$_smarty_tpl);?>
"><span>喜欢我的<b class="msg_like_count"></b></span></a></li>
						    	<li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'user','a'=>'mymessage','tab'=>'follow'),$_smarty_tpl);?>
"><span>关注我的<b class="msg_follow_count"></b></span></a></li>
						    	<li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'pm'),$_smarty_tpl);?>
"><span>我的私信<b class="msg_pm_count"></b></span></a></li>
						    </ul>
						</div>
					</div>
					
					<!-- 个人中心 -->
					<div class="userName">
						<a href="javascript:void(0);" target="_blank" title="我的博客"><span class="login-name"><?php echo $_SESSION['username'];?>
 <s class="arrow"></s></span></a>
						<div class="menu userNameMenu" style="display:none;">
							<ul>
								<li><a href="<?php echo goUserHome(array('domain'=>$_SESSION['domain'],'uid'=>$_SESSION['uid']),$_smarty_tpl);?>
"><span>个人主页</span></a></li>
								<li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'user','a'=>'setting'),$_smarty_tpl);?>
" title="设置"><span>账号设置</span></a></li>
								<li><a href="#nogo" id="logOut" title="退出"><span>退出</span></a></li>
							</ul>
						</div>
					</div>
					
					

				</div>

				
			</div>
			<?php }?>
		</div>
	</div>
