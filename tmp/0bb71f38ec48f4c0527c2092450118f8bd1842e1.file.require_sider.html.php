<?php /* Smarty version Smarty-3.0.6, created on 2014-08-10 11:45:42
         compiled from "tplv2/require_sider.html" */ ?>
<?php /*%%SmartyHeaderCode:169493076653e6eae6617968-38547691%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0bb71f38ec48f4c0527c2092450118f8bd1842e1' => 
    array (
      0 => 'tplv2/require_sider.html',
      1 => 1407642176,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '169493076653e6eae6617968-38547691',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="user clearfix">
		<div class="user-info">
			<div class="logo">
				<a href="<?php echo goUserHome(array('uid'=>$_smarty_tpl->getVariable('user')->value['uid'],'domain'=>$_smarty_tpl->getVariable('user')->value['domain']),$_smarty_tpl);?>
"><img src="<?php echo $_smarty_tpl->getVariable('url')->value;?>
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
				<li><a href="<?php echo goUserHome(array('uid'=>$_smarty_tpl->getVariable('user')->value['uid'],'domain'=>$_smarty_tpl->getVariable('user')->value['domain']),$_smarty_tpl);?>
"><b><?php echo $_smarty_tpl->getVariable('user')->value['num'];?>
</b><span>动态</span></a></li>
				<li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'user','a'=>'myfollow'),$_smarty_tpl);?>
"><b><?php echo $_smarty_tpl->getVariable('user')->value['flow'];?>
</b><span>关注</span></a></li>
				<li class="nr"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'user','a'=>'myfollow','tab'=>'follow'),$_smarty_tpl);?>
"><b><?php echo $_smarty_tpl->getVariable('user')->value['flowme'];?>
</b><span>粉丝</span></a></li>
			</ul>
		</div>
	</div>
	

	
	





	<div class="sider-mod sider-menu mt20">
		<ul class="menu-list">
			<li <?php echo $_smarty_tpl->getVariable('myfollow_current')->value;?>
><a class="my-follow" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'user','a'=>'myfollow'),$_smarty_tpl);?>
"><span>关注的人</span></a></li>
			<li  <?php echo $_smarty_tpl->getVariable('mylike_current')->value;?>
><a class="my-like" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'user','a'=>'mylikes'),$_smarty_tpl);?>
"><span>我喜欢的</span></a></li>
			<li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'user','a'=>'mymessage'),$_smarty_tpl);?>
" class="my-msg"><span>我的消息</span></a></li>
			<li class="nb"><a class="my-letter" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'pm','a'=>'index'),$_smarty_tpl);?>
"><span>我的私信</span></a></li>
		</ul>
	</div>





	<div class="sider-mod recommend mt20 clearfix" id="J-siderRecommendWrap">
       <div class="hd"><h3>推荐给您的用户</h3></div>
       <div class="bd">
           <ul class="recommend-list clearfix" id="J-siderRecommend">
           		
           		

           </ul>
           <div class="ft">
           	 <a href="#" class="change J-recommedChange">换一换</a>
           </div>
           
       </div>
    </div>
	

<script type="text/template" id="J-recommendItem">
<li>
	<div class="logo">
		<a href="${h_url}" target="_blank"><img src="${avatar}" title="${username}"/></a>
	</div>
	<div class="info">
		<h4><a href="${h_url}" target="_blank">${username}</a></h4>
		<button class="J-follow" data-uid="${uid}">加关注</button>
	</div>
</li>
</script>

           		







	<!-- <div class="sider-mod TA-attention mt20 clearfix">
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
			</ul>
		</div>
	</div> -->



