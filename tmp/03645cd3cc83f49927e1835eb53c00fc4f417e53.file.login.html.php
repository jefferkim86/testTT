<?php /* Smarty version Smarty-3.0.6, created on 2014-08-03 13:59:55
         compiled from "tplv2/login.html" */ ?>
<?php /*%%SmartyHeaderCode:176980529853ddcfdb9beb28-44294022%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '03645cd3cc83f49927e1835eb53c00fc4f417e53' => 
    array (
      0 => 'tplv2/login.html',
      1 => 1407045585,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '176980529853ddcfdb9beb28-44294022',
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
</title>
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
<body class="login-page clearfix">
 <div class="forbg clearfix">
 	

  <div id="wrap">

	<div class="logo">
		<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main'),$_smarty_tpl);?>
"><img src="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/image/big-logo.png" alt="<?php echo $_smarty_tpl->getVariable('yb')->value['site_title'];?>
" title="<?php echo $_smarty_tpl->getVariable('yb')->value['site_title'];?>
" /><span class="beta"></span></a>
	</div>

	<div class="tab-login-reg">
		<div class="tab" id="login-reg-tab">
			<ul>
				<li>注册</li>
				<li class="cur">登录</li>
			</ul>
		</div>
		<div class="content clearfix" id="tabContent">
			<div id="reg" style="display:none;">
				<div class="content-c">
				   <form action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main','a'=>'reg'),$_smarty_tpl);?>
" method="post" id="regForm" callback="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main'),$_smarty_tpl);?>
">
				   		<?php if ($_smarty_tpl->getVariable('yb')->value['invite_switch']==1||$_smarty_tpl->getVariable('invitemode')->value){?>
						<div class="item invite">
							<label for="invitecode">邀请码</label>
							<input type="text" id="invitecode" name="invitecode" class="input tip" tabindex="5" title="输入邀请码才能继续注册" value="<?php echo $_smarty_tpl->getVariable('invitecode')->value;?>
" />
                        	<input name="invitemode" id="invitemode" type="hidden" value="<?php echo $_smarty_tpl->getVariable('invitemode')->value;?>
"/>
						</div>
						<?php }?>
						<div class="item email">
							<label for="email2">邮箱</label>
							<input type="text" id="email2" name="email" tabindex="1" autocomplete="off" value="<?php echo $_POST['email'];?>
" title="请填写常用邮箱帐号" />
						</div>
						<div class="item password">
							<label for="password2">密码</label>
							<input type="password" id="password2" name="password" tabindex="2" value="<?php echo $_POST['password'];?>
" title="请输入密码" />
						</div>
						<div class="item nick">
							<label for="nick">昵称</label>
							<input type="text" id="nick" name="username" class="input tip" tabindex="3" value="<?php echo $_POST['username'];?>
" title="请输入昵称" />
						</div>
						<div class="item login-btn">
							<label></label>
							<input type="button" class="submit-btn" name="do"  value="注册" tabindex="5" id="regSumbit"/>
						</div>
				  </form>
			    </div>
			</div>
			<div id="login">
				<div class="content-c">
					<form action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main','a'=>'login'),$_smarty_tpl);?>
" method="post" id="loginForm"  callback="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main'),$_smarty_tpl);?>
">
						<input type="hidden" value="<?php echo $_smarty_tpl->getVariable('callback')->value;?>
" name="callback">
                		<input type="hidden" value="" name="formKey">
						<div class="item email">
							<label for="email">邮箱</label>
							<input type="text" id="email" name="email"  class="input tip" title="请输入邮箱地址" tabindex="1" value="<?php if ($_POST['email']){?><?php echo $_POST['email'];?>
<?php }else{ ?><?php echo $_smarty_tpl->getVariable('email')->value;?>
<?php }?>"/>
						</div>
						<div class="item password">
							<label for="password">密码</label>
							<input id="password" type="password" class="input tip" title="请输入密码" value="<?php echo $_POST['password'];?>
" name="password" tabindex="2"/>
						</div>
						<?php if ($_smarty_tpl->getVariable('yb')->value['loginCodeSwitch']!=0){?>
						<div class="item login_code">
						    <img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main','a'=>'vcode','t'=>$_smarty_tpl->getVariable('time')->value),$_smarty_tpl);?>
" class="vericode" onClick="reloadcode('vericode')" title="看不清楚，换一张" id="vericode" />
							<input type="text" id="verifycode" class="input_code tip" title="请输入验证码"  name="verifycode" tabindex="3">
						</div>
						<?php }?>
						<div class="item login-btn">
							<label></label>
							<input class="submit-btn" type="button" name="loginSubmit" id="loginSubmit"  value="登录"/>
						</div>
						<div class="func">
							<div class="remeber">
								<input type="checkbox" class="check-remeber" name="autologin" value="1" checked="checked" title="自动登录"/>
								<span>记住密码</span>
								<input name="savename" type="hidden" id="savename" value="1" checked="checked" />
							</div>
							<div class="forget">
								<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main','a'=>'resetpwd'),$_smarty_tpl);?>
">忘记密码</a>
							</div>
						</div>
					</form>
				</div>
			</div>
			
			

		</div>
	</div>

	




    
		
		    
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
	
	
	<script>
	$(document).ready(function(){
		// var w = $(window).width();
		// var wh = $(window).height();
		// $(".login-page").css({'height':wh});
		var tabs = $("#login-reg-tab li");
		var tabContents = $("#tabContent>div");
		tabs.on("click",function(){
			var index = tabs.index($(this));
			tabs.removeClass('cur');
			$(this).addClass('cur');
			tabContents.hide();
			tabContents.eq(index).show();
		})
	});
	</script>
	
	<?php $_template = new Smarty_Internal_Template("require_footer.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
  </div>
</div>
</body>
</html>
