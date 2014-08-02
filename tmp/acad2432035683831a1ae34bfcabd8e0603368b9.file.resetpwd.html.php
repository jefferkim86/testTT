<?php /* Smarty version Smarty-3.0.6, created on 2014-08-02 17:14:01
         compiled from "tplv2/resetpwd.html" */ ?>
<?php /*%%SmartyHeaderCode:146692427053dcabd9719a14-09697606%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'acad2432035683831a1ae34bfcabd8e0603368b9' => 
    array (
      0 => 'tplv2/resetpwd.html',
      1 => 1406970838,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '146692427053dcabd9719a14-09697606',
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
<body class="login-page" id="resetpwd-page">

    <div id="wrap">
	    

        <div class="logo">
            <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main'),$_smarty_tpl);?>
"><img src="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/image/big-logo.png" alt="<?php echo $_smarty_tpl->getVariable('yb')->value['site_title'];?>
" title="<?php echo $_smarty_tpl->getVariable('yb')->value['site_title'];?>
" /></a>
        </div>

      
	
<!--新-->
        <div class="tab-login-reg" id="resetPwd">
            <div class="tab" id="login-reg-tab">
                <h2>找回密码</h2>
            </div>
            <div class="content clearfix" id="tabContent">
            <?php if ($_smarty_tpl->getVariable('err')->value!=''){?>
             <div class="login_err in_put">
                    <?php echo $_smarty_tpl->getVariable('err')->value;?>

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
                
                <div class="forget_pw in_put r_margin">
                    您的请求与<?php echo $_smarty_tpl->getVariable('passtime')->value;?>
过期,请抓紧修改您的密码
                </div>


            <?php }else{ ?> 
               <div id="login">
                   <div class="content-c">
                    <form action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main','a'=>'login'),$_smarty_tpl);?>
" method="post" id="findpwdForm">
                        <input type="hidden" value="<?php echo $_smarty_tpl->getVariable('callback')->value;?>
" name="callback">
                        <input type="hidden" value="" name="formKey">
                        <div class="item email">
                            <label for="email">注册邮箱</label>
                            <input type="text" id="email" name="email" class="input tip" autocomplete="off" tabindex="1" title="请输入邮箱" value="请输入您的email地址,系统将发送密码找回邮件"/>
                        </div>
                        <div class="item login_code">
                            <label for="vericode">验证码</label>
                            <img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main','a'=>'vcode','t'=>$_smarty_tpl->getVariable('time')->value),$_smarty_tpl);?>
" class="vericode" onClick="reloadcode('vericode')" title="看不清楚，换一张" id="vericode" style="margin:5px 0 0 15px"/>
                            <input type="text" id="verifycode" class="input_code tip" title="请输入验证码"  name="verifycode" tabindex="3" style="width:200px;"/>
                        </div>
                        <div class="item login-btn">
                            <label></label>
                            <input class="submit-btn" type="button" name="findpwdSubmit" id="findpwdSubmit"  value="发送" />
                        </div>
                        
                     </form>
                    </div>
                </div>
                <div class="go-logiin">
                    <div class="line"><span>或</span><hr/></div>
                    <div class="go-login-btn-wrap">
                        <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main','a'=>'login'),$_smarty_tpl);?>
" class="go-login-btn">立刻登录</a>
                    </div>
                </div>
            <?php }?>

        <?php }?>
    </div>
  </div>
	<?php $_template = new Smarty_Internal_Template("require_footer.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
    

</div>

<script type="text/javascript">
    $("#email").on("click",function (e) {
        if($(this).val()== '请输入您的email地址,系统将发送密码找回邮件'){
            $(this).val('');
        }
    });
     $("#email").on("blur",function(){
        if($(this).val()== ''){
            $(this).val('请输入您的email地址,系统将发送密码找回邮件');
        }
     })
</script>


</body>
</html>





