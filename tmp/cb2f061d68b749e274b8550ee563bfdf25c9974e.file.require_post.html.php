<?php /* Smarty version Smarty-3.0.6, created on 2014-01-19 22:18:11
         compiled from "tplv2/require_post.html" */ ?>
<?php /*%%SmartyHeaderCode:14102471652dbdea33de1b7-73383500%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cb2f061d68b749e274b8550ee563bfdf25c9974e' => 
    array (
      0 => 'tplv2/require_post.html',
      1 => 1390141076,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14102471652dbdea33de1b7-73383500',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div id="postblog">
    <div class="avatar"><a href="<?php echo goUserHome(array('domain'=>$_SESSION['domain'],'uid'=>$_SESSION['uid']),$_smarty_tpl);?>
" target="_blank" title="我的博客"><div class="head_bg"><img src="<?php echo avatar(array('uid'=>$_SESSION['uid'],'size'=>'middle'),$_smarty_tpl);?>
" alt="<?php echo $_SESSION['username'];?>
" class="face"/></div></a></div>
	<div class="mode">
	    <div class="corner"></div>
		<table cellpadding="0" cellspacing="0" border="0" class="cs_model">
		    <tr>
            	<?php $_smarty_tpl->tpl_vars['model'] = new Smarty_variable($_smarty_tpl->getVariable('mconfig')->value['data'][5], null, null);?>
				<?php if ($_smarty_tpl->getVariable('model')->value['status']==1){?>
			    <td><div class="list"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'post','a'=>'add','model'=>$_smarty_tpl->getVariable('model')->value['id']),$_smarty_tpl);?>
" class="<?php echo $_smarty_tpl->getVariable('model')->value['icon'];?>
" title="<?php echo $_smarty_tpl->getVariable('model')->value['desc'];?>
"><span><?php echo $_smarty_tpl->getVariable('model')->value['name'];?>
</span></a><?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['model']['last']){?><div class="postline"></div><?php }?></div></td>
				<?php }?>
                
                            	<?php $_smarty_tpl->tpl_vars['model'] = new Smarty_variable($_smarty_tpl->getVariable('mconfig')->value['data'][3], null, null);?>
				<?php if ($_smarty_tpl->getVariable('model')->value['status']==1){?>
			    <td><div class="list"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'post','a'=>'add','model'=>$_smarty_tpl->getVariable('model')->value['id']),$_smarty_tpl);?>
" class="<?php echo $_smarty_tpl->getVariable('model')->value['icon'];?>
" title="<?php echo $_smarty_tpl->getVariable('model')->value['desc'];?>
"><span><?php echo $_smarty_tpl->getVariable('model')->value['name'];?>
</span></a><?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['model']['last']){?><div class="postline"></div><?php }?></div></td>
				<?php }?>
                
                            	<?php $_smarty_tpl->tpl_vars['model'] = new Smarty_variable($_smarty_tpl->getVariable('mconfig')->value['data'][1], null, null);?>
				<?php if ($_smarty_tpl->getVariable('model')->value['status']==1){?>
			    <td><div class="list"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'post','a'=>'add','model'=>$_smarty_tpl->getVariable('model')->value['id']),$_smarty_tpl);?>
" class="<?php echo $_smarty_tpl->getVariable('model')->value['icon'];?>
" title="<?php echo $_smarty_tpl->getVariable('model')->value['desc'];?>
"><span><?php echo $_smarty_tpl->getVariable('model')->value['name'];?>
</span></a><?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['model']['last']){?><div class="postline"></div><?php }?></div></td>
				<?php }?>
                
                            	<?php $_smarty_tpl->tpl_vars['model'] = new Smarty_variable($_smarty_tpl->getVariable('mconfig')->value['data'][2], null, null);?>
				<?php if ($_smarty_tpl->getVariable('model')->value['status']==1){?>
			    <td><div class="list"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'post','a'=>'add','model'=>$_smarty_tpl->getVariable('model')->value['id']),$_smarty_tpl);?>
" class="<?php echo $_smarty_tpl->getVariable('model')->value['icon'];?>
" title="<?php echo $_smarty_tpl->getVariable('model')->value['desc'];?>
"><span><?php echo $_smarty_tpl->getVariable('model')->value['name'];?>
</span></a><?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['model']['last']){?><div class="postline"></div><?php }?></div></td>
				<?php }?>
                
                            	<?php $_smarty_tpl->tpl_vars['model'] = new Smarty_variable($_smarty_tpl->getVariable('mconfig')->value['data'][4], null, null);?>
				<?php if ($_smarty_tpl->getVariable('model')->value['status']==1){?>
			    <td><div class="list"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'post','a'=>'add','model'=>$_smarty_tpl->getVariable('model')->value['id']),$_smarty_tpl);?>
" class="<?php echo $_smarty_tpl->getVariable('model')->value['icon'];?>
" title="<?php echo $_smarty_tpl->getVariable('model')->value['desc'];?>
"><span><?php echo $_smarty_tpl->getVariable('model')->value['name'];?>
</span></a></div></td>
				<?php }?>
			    
			</tr>
		</table>
    </div>
	<?php if (islogin()){?>
	<div class="menu">
	    <li class="current"><a href="javascript:void(0)" onclick="changeFeeds('feeds',this)"><span>最新博客</span></a></li>
		<li><a href="javascript:void(0)" onclick="changeFeeds('followfeeds',this)"><span>我的关注</span></a></li>
	</div>
	<?php }?>
</div>
