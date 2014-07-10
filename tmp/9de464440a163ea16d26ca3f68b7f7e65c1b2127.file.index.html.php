<?php /* Smarty version Smarty-3.0.6, created on 2012-12-22 00:00:36
         compiled from "E:\PDENV\data\yunbian.tt/tplv2/theme/default/index.html" */ ?>
<?php /*%%SmartyHeaderCode:75150d487a4b09859-25486702%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9de464440a163ea16d26ca3f68b7f7e65c1b2127' => 
    array (
      0 => 'E:\\PDENV\\data\\yunbian.tt/tplv2/theme/default/index.html',
      1 => 1341154870,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '75150d487a4b09859-25486702',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('themes_include_path')->value)."/header.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

<div id="wrap">

    <div id="main">
	   <?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('themes_include_path')->value)."/userheader.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

		<div id="mytag">
		<?php if (count($_smarty_tpl->getVariable('user')->value['blogtag'])>1){?>
			<?php  $_smarty_tpl->tpl_vars['d'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('user')->value['blogtag']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['d']->key => $_smarty_tpl->tpl_vars['d']->value){
?>
				<li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main','a'=>'recommend'),$_smarty_tpl);?>
"><span><?php echo $_smarty_tpl->tpl_vars['d']->value;?>
</span></a></li>
			<?php }} ?>
		<?php }?>
			<div class="clear"></div>
		</div>
		
		<div id="feedArea">
			<script type="text/javascript">
				$(document).ready(function(){  yb_load_feeds('blog','feeds',{ uid:<?php echo $_smarty_tpl->getVariable('touid')->value;?>
 ,pagelimit:<?php echo $_smarty_tpl->getVariable('page_init')->value;?>
 }); })
			</script>
			<div id="feed_loading"></div>
			<div id="feed_box"></div>

		</div>

		<div class="page" id="paging"></div>
	</div>
	
	<div id="aside">
    <?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('themes_include_path')->value)."/aside.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
	</div>

</div>
<?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('themes_include_path')->value)."/footer.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('top','yes'); echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>