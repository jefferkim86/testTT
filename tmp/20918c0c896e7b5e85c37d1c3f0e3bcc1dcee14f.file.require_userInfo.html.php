<?php /* Smarty version Smarty-3.0.6, created on 2014-08-23 22:55:26
         compiled from "tplv2/require_userInfo.html" */ ?>
<?php /*%%SmartyHeaderCode:183434125953f8ab5e9656e2-57695108%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '20918c0c896e7b5e85c37d1c3f0e3bcc1dcee14f' => 
    array (
      0 => 'tplv2/require_userInfo.html',
      1 => 1408805702,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '183434125953f8ab5e9656e2-57695108',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_smarty_tpl->getVariable('user')->value['domain']){?>
<?php $_smarty_tpl->tpl_vars["UserDomain"] = new Smarty_variable(($_smarty_tpl->getVariable('site_uri')->value)."/".($_smarty_tpl->getVariable('user')->value['domain']), null, null);?>
<?php }else{ ?>
<?php ob_start();?><?php echo goUserHome(array('domain'=>$_smarty_tpl->getVariable('user')->value['domain'],'uid'=>$_smarty_tpl->getVariable('user')->value['uid']),$_smarty_tpl);?>
<?php $_tmp1=ob_get_clean();?><?php $_smarty_tpl->tpl_vars["UserDomain"] = new Smarty_variable($_tmp1, null, null);?>
<?php }?>
<div class="user page-userInfo">
	<div class="logo">
		<a href="<?php echo $_smarty_tpl->getVariable('UserDomain')->value;?>
"><img src="<?php echo $_smarty_tpl->getVariable('site_uri')->value;?>
<?php echo avatar(array('uid'=>$_smarty_tpl->getVariable('user')->value['uid'],'size'=>'big'),$_smarty_tpl);?>
" alt=""/></a>
	</div>
	<div class="info">
		<h3><a href="<?php echo $_smarty_tpl->getVariable('UserDomain')->value;?>
"><?php echo $_smarty_tpl->getVariable('user')->value['username'];?>
</a></h3>
		<div class="url"><?php echo $_smarty_tpl->getVariable('UserDomain')->value;?>
</div>
		<?php if ($_smarty_tpl->getVariable('usersign')->value){?><div class="desc"><?php echo $_smarty_tpl->getVariable('usersign')->value;?>
</div><?php }?>
		<div class="handle">
			<?php if ($_smarty_tpl->getVariable('isfollow')->value==1){?>
			<button class="J-attention J-follow followed" data-uid="<?php echo $_smarty_tpl->getVariable('user')->value['uid'];?>
">取消关注</button>
			<?php }elseif($_smarty_tpl->getVariable('isfollow')->value==0){?>
			<button class="J-attention J-follow" data-uid="<?php echo $_smarty_tpl->getVariable('user')->value['uid'];?>
">加关注</button>
			<?php }?>
			<?php if ($_SESSION['uid']!=$_smarty_tpl->getVariable('user')->value['uid']){?>
			<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'pm','a'=>'detail','uid'=>$_smarty_tpl->getVariable('user')->value['uid']),$_smarty_tpl);?>
" class="J-msg" target="_blank">发私信</a>
			<?php }?>
		</div>
	</div>
	<div class="user-data">
		<ul>
			<li><b><?php echo $_smarty_tpl->getVariable('user')->value['num'];?>
</b><span>动态</span></li>
			<li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'user','a'=>'myfollow','uid'=>$_smarty_tpl->getVariable('user')->value['uid']),$_smarty_tpl);?>
"><b><?php echo $_smarty_tpl->getVariable('user')->value['flow'];?>
</b><span>关注</span></a></li>
			<li class="nr"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'user','a'=>'myfollow','uid'=>$_smarty_tpl->getVariable('user')->value['uid'],'tab'=>'follow'),$_smarty_tpl);?>
"><b><?php echo $_smarty_tpl->getVariable('user')->value['flowme'];?>
</b><span>粉丝</span></a></li>
		</ul>

	</div>
</div>