<?php /* Smarty version Smarty-3.0.6, created on 2012-12-22 00:06:00
         compiled from "tplv2\reg.html" */ ?>
<?php /*%%SmartyHeaderCode:661750d488e8664114-35808954%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a87eb9a234d5c6b89a664c935890c871aaedf979' => 
    array (
      0 => 'tplv2\\reg.html',
      1 => 1341154844,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '661750d488e8664114-35808954',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!doctype html>
<html lang="zh-cn">
<head>
<meta charset="utf-8" />
<title><?php echo $_smarty_tpl->getVariable('yb')->value['site_title'];?>
 - <?php echo $_smarty_tpl->getVariable('yb')->value['site_titlepre'];?>
 - Powered by 云边轻博客</title>
<meta name="author" content="<?php echo $_smarty_tpl->getVariable('yb')->value['author'];?>
" />
<meta name="description" content="<?php echo $_smarty_tpl->getVariable('yb')->value['site_desc'];?>
" />
<meta name="keywords" content="<?php echo $_smarty_tpl->getVariable('yb')->value['site_keyword'];?>
" />
<?php $_template = new Smarty_Internal_Template("require_js.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('login','yes'); echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<link href="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/css/login.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/image/favicon.ico" type="image/x-icon">
</head>
<body>
<div id="wrap">
    <div id="lbtn"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main','a'=>'login'),$_smarty_tpl);?>
"><span>登录</span></a></div>
    <div id="main">
	    <div class="logo"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main'),$_smarty_tpl);?>
"><img src="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/image/logo_big.png" width="420" height="103" alt="logo" /></a></div>
		<div class="login" id="regarea">
		    <form action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main','a'=>'reg'),$_smarty_tpl);?>
" method="post" id="regForm" callback="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main'),$_smarty_tpl);?>
">
				<table cellpadding="0" cellspacing="0" border="0" class="loginarea">				
                    <tr><td>
			        <div class="login_email in_put">
				        <input type="text" id="email" name="email" class="input tip"  tabindex="1" autocomplete="off" value="<?php echo $_POST['email'];?>
" title="请填写常用邮箱帐号" />
					</div>
					<div class="login_pw in_put">
					    <input type="password" id="password" name="password" class="input tip" tabindex="2" value="<?php echo $_POST['password'];?>
" title="请输入密码" />
					</div>
					<div class="login_name in_put">
					    <input type="text" id="username" name="username" class="input tip" tabindex="3" value="<?php echo $_POST['username'];?>
" title="请输入昵称" />
					</div>
									
					<?php if ($_smarty_tpl->getVariable('yb')->value['invite_switch']==1||$_smarty_tpl->getVariable('invitemode')->value){?>
					
					</td></tr>
					<tr><td class="top_h">
					
					<div class="login_invite in_put">
					    <input type="text" id="invitecode" name="invitecode" class="input tip" tabindex="5" title="输入邀请码才能继续注册"
                        value="<?php echo $_smarty_tpl->getVariable('invitecode')->value;?>
" />
                        <input name="invitemode" id="invitemode" type="hidden" value="<?php echo $_smarty_tpl->getVariable('invitemode')->value;?>
"/>
					</div>
					<?php }?>
					
					<?php if ($_smarty_tpl->getVariable('yb')->value['regCodeSwitch']==1){?>
					<div class="login_code in_put">
					    <img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main','a'=>'vcode','t'=>$_smarty_tpl->getVariable('time')->value),$_smarty_tpl);?>
" class="vericode tip" onClick="reloadcode('vericode')" title="看不清楚，换一张" id="vericode" />
						<input type="text" id="verifycode" class="input_code tip" title="请输入验证码"  name="verifycode" tabindex="4" />
					</div>
					<?php }?>
                    
					<div class="reg_btn in_put">
					    <input class="regBtn" type="button" name="do"  value="注册" tabindex="5" id="regSumbit" />
					</div>
					<div class="clear"></div>
					
					<div class="reg_service in_put">
					    <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'site','a'=>'index','page'=>'service'),$_smarty_tpl);?>
" target="_blank">注册将视为您同意服务条款</a>
					</div>
					<div class="clear"></div>
					
					<?php if ($_smarty_tpl->getVariable('yb')->value['openlogin_qq_open']==1||$_smarty_tpl->getVariable('yb')->value['openlogin_weib_open']==1){?>
					<div id="openconnent">
					    <h3>使用已有账号</h3>
					    <div id="area">
					    <?php if ($_smarty_tpl->getVariable('yb')->value['openlogin_qq_open']==1){?>
					        <li><a href="javascript:void(0)" onClick="openconnect('<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'openconnect','a'=>'qq'),$_smarty_tpl);?>
')"><span class="qq_login"></span></a></li>
						<?php }?>
						<?php if ($_smarty_tpl->getVariable('yb')->value['openlogin_weib_open']==1){?>
						    <li><a href="javascript:void(0)" onClick="openconnect('<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'openconnect','a'=>'weibo'),$_smarty_tpl);?>
')"><span class="sina_login"></span></a></li>
						<?php }?>
						</div>
					</div>
					<?php }?>

					
				</td></tr>
                </table>
				<input type="hidden" name="doing" value="true" />
				<input type="hidden" value="<?php echo $_smarty_tpl->getVariable('callback')->value;?>
" name="callback">
			</form>
		</div>
	</div>
	
	<div id="footer_line"></div>
	
	<?php $_template = new Smarty_Internal_Template("require_footer.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
    

</div>
</body>
</html>





