<?php /* Smarty version Smarty-3.0.6, created on 2014-01-18 06:17:11
         compiled from "tplv2/resetpwd.html" */ ?>
<?php /*%%SmartyHeaderCode:165232989252d9abe77a9b71-58646880%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'acad2432035683831a1ae34bfcabd8e0603368b9' => 
    array (
      0 => 'tplv2/resetpwd.html',
      1 => 1341154870,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '165232989252d9abe77a9b71-58646880',
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
    <div id="rbtn"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main','a'=>'login'),$_smarty_tpl);?>
"><span>登录</span></a></div>
    <div id="main">
	    <div class="logo"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main'),$_smarty_tpl);?>
"><img src="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/image/logo_big.png" width="420" height="101" alt="logo" /></a></div>
		<div class="login">
		    <form action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main','a'=>'login'),$_smarty_tpl);?>
" method="post" id="findpwdForm">
			    <input type="hidden" value="<?php echo $_smarty_tpl->getVariable('callback')->value;?>
" name="callback">
                <input type="hidden" value="" name="formKey">

				<table cellpadding="0" cellspacing="0" border="0" class="loginarea">				
                    <tr><td>
                   <?php if ($_smarty_tpl->getVariable('err')->value!=''){?>
                   
                     <div class="login_err in_put">
                            <?php echo $_smarty_tpl->getVariable('err')->value;?>

                     </div>
                    <div class="login_btn in_put">
                    	<input class="subBtn" type="button" name="findpwdSubmit" id="findpwdSubmit"  value="好的" 
                        	   onClick="window.location.href='<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main','a'=>'resetpwd'),$_smarty_tpl);?>
'" />
                    </div>
                   
                   <?php }else{ ?>
                        <?php if ($_smarty_tpl->getVariable('do')->value=='submit'){?>

                            <div class="login_pw in_put">
                            	<input type="password" id="password" class="input tip" value="<?php echo $_POST['password'];?>
" name="password" tabindex="1" title="请输入你的新密码">
                            </div>
                            
                            <div class="login_pw in_put">
                            	<input type="password" id="password2" class="input tip" value="<?php echo $_POST['password'];?>
" name="password2" tabindex="2" title="请再输入一次你的新密码">
                            </div>
                            
                            <div class="login_btn in_put">
                            	<input type="hidden"  name="token" value="<?php echo $_smarty_tpl->getVariable('token')->value;?>
" />
                            	<input class="subBtn" type="button" name="findpwdSubmit" id="findpwdSubmit"  value="修改密码" tabindex="3" />
                            </div>
                            <div class="clear"></div>
                            
                            <div class="forget_pw in_put r_margin">
                            	您的请求与<?php echo $_smarty_tpl->getVariable('passtime')->value;?>
过期,请抓紧修改您的密码
                            </div>
                            <?php }else{ ?>
                            <div class="login_email in_put">
                            	<input type="text" id="email" name="email" class="input tip" autocomplete="off" tabindex="1" title="请输入邮箱">
                            </div>
                            
                            <div class="login_code in_put">
                           <img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main','a'=>'vcode','t'=>$_smarty_tpl->getVariable('time')->value),$_smarty_tpl);?>
" class="vericode tip" onClick="reloadcode('vericode')" title="看不清楚，换一张" id="vericode" />
                           		<input type="text" id="verifycode" class="input_code tip" title="请输入验证码"  name="verifycode" tabindex="3">
                            </div>
                            
                            <div class="login_btn in_put">
                            	<input class="subBtn" type="button" name="findpwdSubmit" id="findpwdSubmit"  value="发送" />
                            </div>
                            
                            <div class="clear"></div>
                            
                            <div class="forget_pw in_put r_margin">
                            	请输入您的email地址,系统将发送密码找回邮件
                            </div>
                        <?php }?>
                   
                   <?php }?>
                  
					
					<div class="clear"></div>

					</td></tr>
                </table>

			</form>
		</div>
	</div>
	
	<div id="footer_line"></div>
	
	<?php $_template = new Smarty_Internal_Template("require_footer.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
    

</div>
</body>
</html>





