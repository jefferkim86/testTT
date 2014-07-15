<?php /* Smarty version Smarty-3.0.6, created on 2012-12-22 00:06:03
         compiled from "tplv2\custompage.html" */ ?>
<?php /*%%SmartyHeaderCode:259650d488eb6bd8c7-45711540%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5e19125af24f4da667b0277444ea0c55f51d6d40' => 
    array (
      0 => 'tplv2\\custompage.html',
      1 => 1343138488,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '259650d488eb6bd8c7-45711540',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
﻿<?php $_template = new Smarty_Internal_Template("require_header.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

<div id="index">
<form action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'post','a'=>'saved','model'=>$_smarty_tpl->getVariable('mid')->value),$_smarty_tpl);?>
" id="form1" method="post">
    <div id="aside">
	    <div id="aside_box">
		    <div class="aside_right">
				 <?php  $_smarty_tpl->tpl_vars['cate'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('custompage_cate')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['cate']->key => $_smarty_tpl->tpl_vars['cate']->value){
?>
					<?php if ($_smarty_tpl->getVariable('tags')->value==$_smarty_tpl->tpl_vars['cate']->value['tags']){?>
						<li class="current"><div class="corner"></div><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'site','page'=>$_smarty_tpl->tpl_vars['cate']->value['tags']),$_smarty_tpl);?>
" title="<?php echo $_smarty_tpl->tpl_vars['cate']->value['title'];?>
"><?php echo $_smarty_tpl->tpl_vars['cate']->value['title'];?>
</a></li>
					<?php }else{ ?>
						<li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'site','page'=>$_smarty_tpl->tpl_vars['cate']->value['tags']),$_smarty_tpl);?>
" title="<?php echo $_smarty_tpl->tpl_vars['cate']->value['title'];?>
"><?php echo $_smarty_tpl->tpl_vars['cate']->value['title'];?>
</a></li>
					<?php }?>
				<?php }} ?>
				
			</div>
		</div>
	</div>
    
	<div id="article">
	    <div id="box">
	        <div class="box_title"><?php echo $_smarty_tpl->getVariable('title')->value;?>
</div>
			<div class="box_con">
			    
				<?php echo $_smarty_tpl->getVariable('body')->value;?>

				
			</div>


	    </div>
	    </div>
	
	</div>
</form>
</div>

<?php $_template = new Smarty_Internal_Template("require_footer.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
