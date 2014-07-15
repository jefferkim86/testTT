<?php /* Smarty version Smarty-3.0.6, created on 2012-12-21 22:42:56
         compiled from "tplv2\require_post.html" */ ?>
<?php /*%%SmartyHeaderCode:2315650d475700ffe18-20541539%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f1c6f06e2b6ccd88dddb279ae96e0b9c611d0db3' => 
    array (
      0 => 'tplv2\\require_post.html',
      1 => 1341154844,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2315650d475700ffe18-20541539',
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
			    <?php  $_smarty_tpl->tpl_vars['model'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('mconfig')->value['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['model']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['model']->iteration=0;
if ($_smarty_tpl->tpl_vars['model']->total > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['model']->key => $_smarty_tpl->tpl_vars['model']->value){
 $_smarty_tpl->tpl_vars['model']->iteration++;
 $_smarty_tpl->tpl_vars['model']->last = $_smarty_tpl->tpl_vars['model']->iteration === $_smarty_tpl->tpl_vars['model']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['model']['last'] = $_smarty_tpl->tpl_vars['model']->last;
?>
                <?php if ($_smarty_tpl->tpl_vars['model']->value['status']==1){?>
			    <td><div class="list"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'post','a'=>'add','model'=>$_smarty_tpl->tpl_vars['model']->value['id']),$_smarty_tpl);?>
" class="<?php echo $_smarty_tpl->tpl_vars['model']->value['icon'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['model']->value['desc'];?>
"><span><?php echo $_smarty_tpl->tpl_vars['model']->value['name'];?>
</span></a><?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['model']['last']){?><div class="postline"></div><?php }?></div></td>
				<?php }?>
		        <?php }} ?>
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
