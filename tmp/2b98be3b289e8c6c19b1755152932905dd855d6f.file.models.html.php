<?php /* Smarty version Smarty-3.0.6, created on 2012-12-22 00:37:10
         compiled from "tplv2\admin/models.html" */ ?>
<?php /*%%SmartyHeaderCode:3224950d49036e385a0-21356948%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2b98be3b289e8c6c19b1755152932905dd855d6f' => 
    array (
      0 => 'tplv2\\admin/models.html',
      1 => 1341154848,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3224950d49036e385a0-21356948',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template('admin/header.html', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
  <div id="content">

     <div class="con_index">
	     <h2>模型列表</h2>
		      <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_model">
			     <tr class="table_title">
				    <th width="30" class="m_title">MID</th>
                    <th width="80">样式标示符</th>
					<th width="100">模型名称</th>
					<th width="40">开关</th>
					<th width="110">模型文件</th>
					<th valign="middle">描述</th>
					<th width="40">版本</th>
					<th width="40">作者</th>
					<th width="100" class="m_link">操作</th>
					
				 </tr>
				 <?php  $_smarty_tpl->tpl_vars['d'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('models')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['d']->key => $_smarty_tpl->tpl_vars['d']->value){
?>
				 <tr class="table_hover">
				    <td class="m_title"><?php echo $_smarty_tpl->tpl_vars['d']->value['id'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['d']->value['icon'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['d']->value['name'];?>
</td>
					<td><?php if ($_smarty_tpl->tpl_vars['d']->value['status']==1){?><div class="fun_yes">开</div><?php }else{ ?><div class="fun_no">关</div><?php }?></td>
					<td><?php echo $_smarty_tpl->tpl_vars['d']->value['modelfile'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['d']->value['mdesc'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['d']->value['version'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['d']->value['author'];?>
</td>
					<td class="m_link"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'admin','a'=>'models','setup'=>$_smarty_tpl->tpl_vars['d']->value['id']),$_smarty_tpl);?>
">设置模型</a></td>
					
				 </tr>
				
				 <?php }} ?>
			  </table>
			  

    
			  

	 </div>

    
    
    
   
  </div>
<?php $_template = new Smarty_Internal_Template('admin/footer.html', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
