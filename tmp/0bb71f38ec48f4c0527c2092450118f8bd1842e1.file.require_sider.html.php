<?php /* Smarty version Smarty-3.0.6, created on 2014-07-30 13:18:41
         compiled from "tplv2/require_sider.html" */ ?>
<?php /*%%SmartyHeaderCode:75509943753d880313d8370-64780932%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0bb71f38ec48f4c0527c2092450118f8bd1842e1' => 
    array (
      0 => 'tplv2/require_sider.html',
      1 => 1406655160,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '75509943753d880313d8370-64780932',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!--
<?php if (!islogin()){?>
	<script src="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/js/login.js"></script>
	<script src="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/js/jquery.dpwd.js"></script>
	
	<script>
	$(document).ready(function(){
		$('#mini_login input').focus(function(){
			$(this).addClass('curr');
		}).blur(function(){
			$(this).removeClass('curr');
		})
	});
	</script>
	

        <div class="menu_login">
		    <form action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main','a'=>'login'),$_smarty_tpl);?>
" method="post" id="loginForm"  callback="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main'),$_smarty_tpl);?>
">
			<input type="hidden" value="<?php echo $_smarty_tpl->getVariable('callback')->value;?>
" name="callback">
            <input type="hidden" value="" name="formKey">
		    <div id="mini_login" class="login_area">
		        <div class="login_email in_put">
				    <input type="text" id="email" name="email" autocomplete="off" class="input tip" title="请输入邮箱地址"  tabindex="1" value="<?php if ($_POST['email']){?><?php echo $_POST['email'];?>
<?php }else{ ?><?php echo $_smarty_tpl->getVariable('email')->value;?>
<?php }?>">
			    </div>
			    <div class="login_pw in_put">
				    <input type="password" id="password" class="input tip" title="请输入密码" value="<?php echo $_POST['password'];?>
" name="password" tabindex="2">
			    </div>
				 <input name="savename" type="hidden" id="savename" value="1" checked="checked" />
			    <?php if ($_smarty_tpl->getVariable('yb')->value['loginCodeSwitch']!=0){?>
			    <div class="login_code in_put">
				    <img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main','a'=>'vcode','t'=>$_smarty_tpl->getVariable('time')->value),$_smarty_tpl);?>
" class="vericode" onClick="reloadcode('vericode')" title="看不清楚，换一张" id="vericode" />
				    <input type="text" id="verifycode" class="input_code tip" title="请输入验证码"  name="verifycode" tabindex="3">
			    </div>
			    <?php }?>
			</div>
			
			<div class="login_btn">
			    <input type="button" name="loginSubmit" id="loginSubmit"  value="登录" />
				<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main','a'=>'reg'),$_smarty_tpl);?>
">注册</a>
				<div class="clear"></div>
			</div>			
			</form>
		</div>
<?php }?>


<?php if (islogin()){?>
    <?php if (!$_smarty_tpl->getVariable('in_tagindex')->value){?>
	    <div class="menu_fl">
		    <div class="show_fl"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'user','a'=>'myfollow'),$_smarty_tpl);?>
" <?php echo $_smarty_tpl->getVariable('myfollow_current')->value;?>
>管理</a></div>
		    <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main'),$_smarty_tpl);?>
"><span>关注 <?php echo $_smarty_tpl->getVariable('user')->value['flow'];?>
 个博客</span></a>
		</div>
		<div class="menu_fc">
		    <li><?php if ($_smarty_tpl->getVariable('user')->value['likenum']>0){?><div class="pop"><?php echo $_smarty_tpl->getVariable('user')->value['likenum'];?>
</div><?php }?><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'user','a'=>'mylikes'),$_smarty_tpl);?>
" <?php echo $_smarty_tpl->getVariable('mylike_current')->value;?>
><span class="mylike"></span><div class="infoname">我喜欢</div></a></li>
			<li class="mid"><?php if ($_smarty_tpl->getVariable('user')->value['num']>0){?><div class="pop"><?php echo $_smarty_tpl->getVariable('user')->value['num'];?>
</div><?php }?><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'user','a'=>'mypost'),$_smarty_tpl);?>
" <?php echo $_smarty_tpl->getVariable('mypost_current')->value;?>
><span class="mypost"></span><div class="infoname">我发布</div></a></li>
			<li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'user','a'=>'myreplay'),$_smarty_tpl);?>
" <?php echo $_smarty_tpl->getVariable('myreply_current')->value;?>
><span class="myreplay"></span><div class="infoname">我回复</div></a></li>
		</div>
		<div class="menu_sc" id="search">
		    <input type="button" class="btn" value="搜索" onClick="tag_search()">
		    <input type="text" id="searchtag" value="搜索标签,发现兴趣" class="ipt">
		</div>
		<div class="menu_tag">
        <?php  $_smarty_tpl->tpl_vars['d'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('favatag')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['d']->key => $_smarty_tpl->tpl_vars['d']->value){
?>
		    <li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'blog','a'=>'tag','tid'=>$_smarty_tpl->tpl_vars['d']->value['tid']),$_smarty_tpl);?>
"><span><?php echo $_smarty_tpl->tpl_vars['d']->value['title'];?>
</span></a></li>
         <?php }} ?>
			<li class="more"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'blog','a'=>'tag'),$_smarty_tpl);?>
">更多热门标签</a></li>
		</div>
	<?php }?>
<?php }?>

	<div class="menu_fr" id="recommendImg"></div>
	<script> $(document).ready(function(){ recommendImg(); }); </script>


	<?php if (isset($_smarty_tpl->getVariable('adunit',null,true,false)->value[1])&&$_smarty_tpl->getVariable('adunit')->value[1]['is_show']==1){?>
		<div class="ad" id="ad_index_aside"></div>
		<script>
			$(document).ready(function(){
				$(document).ready(function(){
					ad_aside('#ad_index_aside',1);
					setInterval(function(){
						ad_aside('#ad_index_aside',1);
					}, 30000);
				})
			})
		</script>
	<?php }?>
-->


	<div class="user clearfix">
		<div class="user-info">
			<div class="logo">
				<a href=""><img src="<?php echo $_smarty_tpl->getVariable('url')->value;?>
/<?php echo avatar(array('uid'=>$_smarty_tpl->getVariable('user')->value['uid'],'size'=>'big'),$_smarty_tpl);?>
" alt=""/></a>
			</div>
			<h3 class="user-name"><?php echo $_smarty_tpl->getVariable('user')->value['username'];?>
</h3>
			<div class="url">
				<?php echo $_smarty_tpl->getVariable('url')->value;?>
/<?php echo $_smarty_tpl->getVariable('user')->value['domain'];?>

			</div>
		</div>
		<div class="user-data">
			<ul>
				<li><a href=""><b><?php echo $_smarty_tpl->getVariable('user')->value['num'];?>
</b><span>推推</span></a></li>
				<li><a href=""><b><?php echo $_smarty_tpl->getVariable('user')->value['flow'];?>
</b><span>关注</span></a></li>
				<li class="nr"><a href=""><b><?php echo $_smarty_tpl->getVariable('myLook')->value;?>
</b><span>粉丝</span></a></li>
			</ul>
		</div>
	</div>
	

	<div class="sider-mod sider-menu mt20">
		<ul class="menu-list">
			<li <?php echo $_smarty_tpl->getVariable('myfollow_current')->value;?>
><a class="my-follow" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'user','a'=>'myfollow'),$_smarty_tpl);?>
"><span>我关注的</span></a></li>
			<li  <?php echo $_smarty_tpl->getVariable('mylike_current')->value;?>
><a class="my-like" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'user','a'=>'mylikes'),$_smarty_tpl);?>
"><span>我喜欢的</span></a></li>
			<li><a href="#" class="my-msg"><span>我的消息</span></a></li>
			<li class="nb"><a class="my-letter" href="#"><span>我的私信</span></a></li>
		</ul>
	</div>
	<div class="sider-mod recommend mt20 clearfix">
       <div class="hd"><h3>推荐给您的用户</h3></div>
       <div class="bd">
           <ul class="recommend-list clearfix">
           		<li>
           			<div class="logo">
           				<img src="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/image/side-logo.png" alt=""/>
           			</div>
           			<div class="info">
           				<h4>戴眼镜的男人</h4>
						<button class="J-follow followed" data-uid="1">取消关注</button>
           			</div>
           		</li>
           		<li>
           			<div class="logo">
           				<img src="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/image/side-logo.png" alt=""/>
           			</div>
           			<div class="info">
           				<h4>戴眼镜的男人</h4>
						<button class="J-follow" data-uid="2">加关注</button>
           			</div>
           		</li>
           		<li>
           			<div class="logo">
           				<img src="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/image/side-logo.png" alt=""/>
           			</div>
           			<div class="info">
           				<h4>戴眼镜的男人</h4>
						<button class="J-follow" data-uid="3">加关注</button>
           			</div>
           		</li>

           </ul>
           <div class="ft">
           	 <a href="#" class="change">换一换</a>
           </div>
           
       </div>
    </div>
	

	<div class="sider-mod TA-attention mt20 clearfix">
		<div class="hd">
			<h3>他关注的</h3>
			<a href="#" class="more">全部</a>
		</div>
		<div class="bd clearfix">
			<ul>
			<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('myfollow')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
?>
				<li><a href="<?php echo $_smarty_tpl->tpl_vars['val']->value['h_url'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['val']->value['h_img'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['val']->value['username'];?>
"/></a></li>
			<?php }} ?>
				<!--<li><a href="#"><img src="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/image/side-logo.png" alt=""/></a></li>-->
			</ul>
		</div>
	</div>



