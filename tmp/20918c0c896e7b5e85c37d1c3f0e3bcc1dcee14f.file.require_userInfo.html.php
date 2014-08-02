<?php /* Smarty version Smarty-3.0.6, created on 2014-08-02 22:44:29
         compiled from "tplv2/require_userInfo.html" */ ?>
<?php /*%%SmartyHeaderCode:87959634153dcf94da900b2-33550669%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '20918c0c896e7b5e85c37d1c3f0e3bcc1dcee14f' => 
    array (
      0 => 'tplv2/require_userInfo.html',
      1 => 1406990668,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '87959634153dcf94da900b2-33550669',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="user page-userInfo">
	<div class="logo">
		<img src="<?php echo $_smarty_tpl->getVariable('site_uri')->value;?>
<?php echo avatar(array('uid'=>$_smarty_tpl->getVariable('user')->value['uid'],'size'=>'big'),$_smarty_tpl);?>
" alt=""/>
	</div>
	<div class="info">
		<h3><?php echo $_smarty_tpl->getVariable('user')->value['username'];?>
</h3>
		<?php if ($_smarty_tpl->getVariable('user')->value['domain']){?>
		<div class="url"><?php echo $_smarty_tpl->getVariable('site_uri')->value;?>
/<?php echo $_smarty_tpl->getVariable('user')->value['domain'];?>
</div>
		<?php }else{ ?>
		<div class="url"><?php echo goUserHome(array('domain'=>$_smarty_tpl->getVariable('user')->value['domain'],'uid'=>$_smarty_tpl->getVariable('user')->value['uid']),$_smarty_tpl);?>
</div>
		<?php }?>
		<?php if ($_smarty_tpl->getVariable('usersign')->value){?><div class="desc"><?php echo $_smarty_tpl->getVariable('usersign')->value;?>
</div><?php }?>
		<div class="handle">
			<?php if ($_smarty_tpl->getVariable('isfollow')->value==1){?>
			<button class="J-attention J-follow followed" data-uid="<?php echo $_smarty_tpl->getVariable('user')->value['uid'];?>
">已关注</button>
			<?php }elseif($_smarty_tpl->getVariable('isfollow')->value==0){?>
			<button class="J-attention J-follow" data-uid="<?php echo $_smarty_tpl->getVariable('user')->value['uid'];?>
">加关注</button>
			<?php }?>
			fdsfdsaf <?php echo $_smarty_tpl->getVariable('session')->value['uid'];?>

			<?php if ($_smarty_tpl->getVariable('session')->value['uid']!=$_smarty_tpl->getVariable('user')->value['uid']){?>
			<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'pm','a'=>'detail','uid'=>$_smarty_tpl->getVariable('user')->value['uid']),$_smarty_tpl);?>
" class="J-msg" target="_blank">发私信</a>
			<?php }?>
		</div>
	</div>
	<div class="user-data">
		<ul>
			<li><b><?php echo $_smarty_tpl->getVariable('user')->value['num'];?>
</b><span>动态</span></li>
			<li><b><?php echo $_smarty_tpl->getVariable('user')->value['flow'];?>
</b><span>关注</span></li>
			<li class="nr"><b><?php echo $_smarty_tpl->getVariable('myLook')->value;?>
</b><span>粉丝</span></li>
		</ul>

	</div>
</div>