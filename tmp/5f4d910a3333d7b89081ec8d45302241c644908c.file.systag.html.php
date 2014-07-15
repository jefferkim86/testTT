<?php /* Smarty version Smarty-3.0.6, created on 2012-12-22 00:02:42
         compiled from "tplv2\admin/systag.html" */ ?>
<?php /*%%SmartyHeaderCode:2848550d488229d3455-67338667%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5f4d910a3333d7b89081ec8d45302241c644908c' => 
    array (
      0 => 'tplv2\\admin/systag.html',
      1 => 1341154866,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2848550d488229d3455-67338667',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template('admin/header.html', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<div id="content">

<div class="artTabs">
     <ul id="tabs">
	    <li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'admin','a'=>'systag'),$_smarty_tpl);?>
" class="current">系统标签<div class="point"></div></a></li>
		<li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'admin','a'=>'usertag'),$_smarty_tpl);?>
">用户标签<div class="point"></div></a></li>
		<div class="clear"></div>
	</ul>
</div>


    
	<div id="tabContent1" class="t_con">
	    <h3>添加系统标签</h3>
		<form action="" method="post">
		<div class="con_system">
		       <table width="100%" cellpadding="0" cellspacing="0" border="0" class="table_padding">
			       <tr>
				      <td width="50" class="t_title">排序</td>
					  <td width="180" class="c_input_small">
					     <input type="text" name="sort"/>
					  </td>
					  <td width="60" class="t_title">标签名称</td>
					  <td width="180" class="c_input_small"><input type="text" name="cname" /></td>
					  <td><input type="submit" name="sysadd" class="btn_return"  value="添加标签" /></td>
				 </tr>
			   </table>
		</div>
		</form>
		
		<div class="navpage"><?php echo $_smarty_tpl->getVariable('systagpager')->value;?>
<div class="clear"></div></div>
		
		<form action="" method="post">
		<div class="con_system">
		       <table width="100%" cellpadding="0" cellspacing="0" border="0" class="table_model">
			       <tr class="table_title">
				      <th width="50" class="m_title">排序</th>
					  <th>标签</th>
					  <th width="60">操作</th>
				   </tr>
				   <?php  $_smarty_tpl->tpl_vars['d'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('systag')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['d']->key => $_smarty_tpl->tpl_vars['d']->value){
?>
				   <tr id="systag_<?php echo $_smarty_tpl->tpl_vars['d']->value['cid'];?>
" class="table_hover" >
				       <td class="m_title c_input_little"><input name="cate[<?php echo $_smarty_tpl->tpl_vars['d']->value['cid'];?>
][sort]" type="text"  value="<?php echo $_smarty_tpl->tpl_vars['d']->value['sort'];?>
" /></td>
					   <td class="c_input"><input name="cate[<?php echo $_smarty_tpl->tpl_vars['d']->value['cid'];?>
][catename]"  type="text"  value="<?php echo $_smarty_tpl->tpl_vars['d']->value['catename'];?>
" /></td>
					   <td class="c_del"><a href="javascript:void(0)" onclick="delsystag(<?php echo $_smarty_tpl->tpl_vars['d']->value['cid'];?>
)">删除</a></td>
				   </tr>
				   <?php }} ?>
			   </table>
		</div>
		
		
		<div class="navpage"><?php echo $_smarty_tpl->getVariable('systagpager')->value;?>
<div class="clear"></div></div>
		
		<div class="btn_area">
		<input name="syscate" class="btn_save" type="submit" value="保存标签" />
		</div>
		</form>
		
	</div>

</div>
<?php $_template = new Smarty_Internal_Template('admin/footer.html', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
