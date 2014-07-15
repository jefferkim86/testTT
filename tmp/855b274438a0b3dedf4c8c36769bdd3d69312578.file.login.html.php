<?php /* Smarty version Smarty-3.0.6, created on 2012-12-22 02:49:14
         compiled from "tplv2\login.html" */ ?>
<?php /*%%SmartyHeaderCode:890150d4af2a6e0089-65914900%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '855b274438a0b3dedf4c8c36769bdd3d69312578' => 
    array (
      0 => 'tplv2\\login.html',
      1 => 1356115752,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '890150d4af2a6e0089-65914900',
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
<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/css/login_style.css" />


</head>
<body>
<div id="wrap">
    <div id="rbtn"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main','a'=>'reg'),$_smarty_tpl);?>
"><span>注册</span></a></div>
    <div id="main">
	    <div class="logo"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main'),$_smarty_tpl);?>
"><img src="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/image/logo_big.png" width="420" height="103" alt="<?php echo $_smarty_tpl->getVariable('yb')->value['site_title'];?>
" title="<?php echo $_smarty_tpl->getVariable('yb')->value['site_title'];?>
" /></a></div>
		<div class="login">
		    <form action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main','a'=>'login'),$_smarty_tpl);?>
" method="post" id="loginForm"  callback="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main'),$_smarty_tpl);?>
">
			    <input type="hidden" value="<?php echo $_smarty_tpl->getVariable('callback')->value;?>
" name="callback">
                <input type="hidden" value="" name="formKey">

				<table cellpadding="0" cellspacing="0" border="0" class="loginarea">				
                    <tr><td>
					    <div class="login_email in_put">
				        <input type="text" id="email" name="email"  class="input tip" title="请输入邮箱地址" tabindex="1" value="<?php if ($_POST['email']){?><?php echo $_POST['email'];?>
<?php }else{ ?><?php echo $_smarty_tpl->getVariable('email')->value;?>
<?php }?>">
					</div>
					<div class="login_pw in_put">
					    <input type="password" id="password" class="input tip" title="请输入密码" value="<?php echo $_POST['password'];?>
" name="password" tabindex="2">
					</div>
					<?php if ($_smarty_tpl->getVariable('yb')->value['loginCodeSwitch']!=0){?>
					<div class="login_code in_put">
					    <img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main','a'=>'vcode','t'=>$_smarty_tpl->getVariable('time')->value),$_smarty_tpl);?>
" class="vericode" onClick="reloadcode('vericode')" title="看不清楚，换一张" id="vericode" />
						<input type="text" id="verifycode" class="input_code tip" title="请输入验证码"  name="verifycode" tabindex="3">
					</div>
					<?php }?>
					<div class="login_btn in_put">
					    <input class="subBtn" type="button" name="loginSubmit" id="loginSubmit"  value="登录" />
					</div>
					<div class="clear"></div>
					
					<div class="save_name in_put">
					    <label for="autologin" >
						<a href="#nosave" id="save" onClick="autologin.checked=true">自动登录</a>
						<a href="#save" id="nosave" onClick="autologin.checked=false">自动登录</a>
						<input name="autologin" type="checkbox" id="autologin" value="1" checked="checked" title="自动登录"/>
                        <input name="savename" type="hidden" id="savename" value="1" checked="checked" />
						</label>
					</div>
				    
					<div class="forget_pw in_put">
					    <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main','a'=>'resetpwd'),$_smarty_tpl);?>
">忘记密码?</a>
					</div>
					<div class="invite_code in_put">
					    <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main','a'=>'reg','invitemode'=>1),$_smarty_tpl);?>
">使用邀请码注册</a>
					</div>
					
					<div class="clear"></div>

					</td></tr>
                </table>

			</form>
		</div>

		<div class="user">

		    <?php if ($_smarty_tpl->getVariable('yb')->value['hotuser_switch']==1){?>
			<div class="container">
			    <div id="ca-container" class="ca-container">
				    <div class="ca-wrapper">
						
					</div>
				</div>
			</div>
		<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/js/jquery.easing.1.3.js"></script>
		<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/js/jquery.mousewheel.js"></script>
		<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/js/jquery.contentcarousel.js"></script>
		
		<script>
		$(document).ready(function(){
			$.ybAPI('blog','loginUserHot','',function(data){
				$('#ca-container .ca-wrapper').html('');
				for(var i=0;i<data.body.length;i++){
					$('#ca-container .ca-wrapper').append(tmpl_login_user_hot(data.body[i]));
				}
				$('#ca-container').contentcarousel();
			});
		});
		</script>
		
		<?php }?>
		    
		<?php if ($_smarty_tpl->getVariable('yb')->value['openlogin_qq_open']==1||$_smarty_tpl->getVariable('yb')->value['openlogin_weib_open']==1){?>
			<div id="openconnent">
				<h3>使用已有账号</h3>
				<div id="area">
				<?php if ($_smarty_tpl->getVariable('yb')->value['openlogin_qq_open']==1){?>
					<li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'openconnect','a'=>'qq'),$_smarty_tpl);?>
"><span class="qq_login"></span></a></li>
				<?php }?>
				<?php if ($_smarty_tpl->getVariable('yb')->value['openlogin_weib_open']==1){?>
					<li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'openconnect','a'=>'weibo'),$_smarty_tpl);?>
"><span class="sina_login"></span></a></li>
				<?php }?>
				</div>
			</div>
		<?php }?>
		</div>
		
	</div>
	
	<div id="footer_line"></div>
	<?php $_template = new Smarty_Internal_Template("require_footer.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
</div>
</body>
</html>
