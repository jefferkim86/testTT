<?php /* Smarty version Smarty-3.0.6, created on 2014-07-24 19:59:53
         compiled from "tplv2/require_userInfo.html" */ ?>
<?php /*%%SmartyHeaderCode:129223781053d0f539f34d97-29957533%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '20918c0c896e7b5e85c37d1c3f0e3bcc1dcee14f' => 
    array (
      0 => 'tplv2/require_userInfo.html',
      1 => 1406127703,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '129223781053d0f539f34d97-29957533',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="user page-userInfo">
	<div class="logo">
		<img src="<?php echo avatar(array('uid'=>$_smarty_tpl->getVariable('user')->value['uid'],'size'=>'middle'),$_smarty_tpl);?>
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
		<div class="desc">个性签名：<?php echo $_smarty_tpl->getVariable('usersign')->value;?>
</div>
		<div class="handle">
			<?php if ($_smarty_tpl->getVariable('isfollow')->value==1){?>
			<button class="J-attention J-follow followed" data-uid="<?php echo $_smarty_tpl->getVariable('user')->value['uid'];?>
">已关注</button>
			<?php }elseif($_smarty_tpl->getVariable('isfollow')->value==0){?>
			<button class="J-attention J-follow" data-uid="<?php echo $_smarty_tpl->getVariable('user')->value['uid'];?>
">加关注</button>
			<?php }?>
			<button class="J-msg" data-uid="<?php echo $_smarty_tpl->getVariable('user')->value['uid'];?>
">发私信</button>
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