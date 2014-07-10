<?php /* Smarty version Smarty-3.0.6, created on 2012-12-22 00:02:43
         compiled from "tplv2\admin/usertag.html" */ ?>
<?php /*%%SmartyHeaderCode:2833550d48823a55766-48539158%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0d63ed0eab463a21592ff89f2ab6ed8877d96ba9' => 
    array (
      0 => 'tplv2\\admin/usertag.html',
      1 => 1343749978,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2833550d48823a55766-48539158',
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
">系统标签<div class="point"></div></a></li>
		<li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'admin','a'=>'usertag'),$_smarty_tpl);?>
" class="current">用户标签<div class="point"></div></a></li>
		<div class="clear"></div>
	</ul>
</div>


	<div id="tabContent2" class="t_con">
	    <h3><span><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'admin','a'=>'usertag','clean'=>true),$_smarty_tpl);?>
" class="clear_btn">清除无效tag</a><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'admin','a'=>'usertag','rebuilt'=>true),$_smarty_tpl);?>
" class="clear_btn">重新更新收藏</a></span>用户标签</h3>
		
		<div class="navpage"><?php echo $_smarty_tpl->getVariable('usrtagpage')->value;?>
<div class="clear"></div></div>

		
		<form action="" method="post">
		<div class="con_system">
		       <table width="100%" cellpadding="0" cellspacing="0" border="0" class="table_model">
			       <tr class="table_title">
				    <th width="50"  class="m_title">ID</th>
				    <th>标签</th>
					<th width="150">添加人</th>
					<th width="80">关联博客</th>
					<th width="47">操作</th>
				   </tr>
				   <?php  $_smarty_tpl->tpl_vars['d'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('usrtag')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['d']->key => $_smarty_tpl->tpl_vars['d']->value){
?>
				 <tr id="usertag_<?php echo $_smarty_tpl->tpl_vars['d']->value['tid'];?>
" class="table_hover">
					<td  class="m_title"><?php echo $_smarty_tpl->tpl_vars['d']->value['tid'];?>
</td>
				    <td class="c_input"><input name="tag[<?php echo $_smarty_tpl->tpl_vars['d']->value['tid'];?>
]" type="text"  value="<?php echo $_smarty_tpl->tpl_vars['d']->value['title'];?>
" /></td>
					<td><?php echo $_smarty_tpl->tpl_vars['d']->value['user']['username'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['d']->value['bid'];?>
</td>
					<td class="c_del"><a href="javascript:void(0)" onclick="delusertag(<?php echo $_smarty_tpl->tpl_vars['d']->value['tid'];?>
)">删除</a></td>
				 </tr>
				 <?php }} ?>
			   </table>
		</div>
		
		
		<div class="navpage"><?php echo $_smarty_tpl->getVariable('usrtagpage')->value;?>
<div class="clear"></div></div>
		
		<div class="btn_area">
		<input name="usercate" class="btn_save" type="submit" value="保存修改" />
		</div>
		</form>
		
	</div>
	

    
</div>
<?php $_template = new Smarty_Internal_Template('admin/footer.html', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
