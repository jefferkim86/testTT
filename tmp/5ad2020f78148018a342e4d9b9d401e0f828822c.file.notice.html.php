<?php /* Smarty version Smarty-3.0.6, created on 2014-01-17 21:54:38
         compiled from "tplv2/admin/notice.html" */ ?>
<?php /*%%SmartyHeaderCode:17697274452d9361e781c25-93320968%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5ad2020f78148018a342e4d9b9d401e0f828822c' => 
    array (
      0 => 'tplv2/admin/notice.html',
      1 => 1341154848,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17697274452d9361e781c25-93320968',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template('admin/header.html', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<div id="content">
     
	 <div class="t_con">
	     <h3>发布系统通知</h3>
		 <form id="form1" name="form1" method="post" action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'admin','a'=>'notice','addnotice'=>'yes'),$_smarty_tpl);?>
">
		 <table width="100%" cellpadding="0" cellspacing="0" border="0" class="table_padding">
			       <tr>
				       <td width="60" class="t_title">通知标题</td>
					   <td class="c_input"><input name="title" type="text" value=""/></td>
				   </tr>
				   <tr>
				       <td class="t_title">通知内容</td>
					   <td class="c_textarea"><textarea name="info" id="info" cols="55" rows="5"></textarea></td>
				   </tr>
				   <tr>
				       <td class="t_title"></td>
					   <td class="c_font"><input type="submit" class="btn_return" name="button" id="button" value="发布全站通知" /></td>
				   </tr>                 
		 </table>
		 
		 </form>
		 
	 </div>
	  <form id="form2" name="form2" method="post" action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'admin','a'=>'notice','del'=>'yes'),$_smarty_tpl);?>
">
	 <div class="t_con">
	     <h3>通知列表</h3>
	     <table width="100%" cellpadding="0" cellspacing="0" border="0" class="table_model">
			       <tr class="table_title">
				    <th width="50" class="m_title">ID</th>
					<th width="160">类型</th>
					<th width="160">标题</th>
					<th>内容</th>
					<th width="100">用户</th>
					<th width="100">时间</th>
				   </tr>
				   <?php  $_smarty_tpl->tpl_vars['d'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('notice')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['d']->key => $_smarty_tpl->tpl_vars['d']->value){
?>
				   <tr id="systag_<?php echo $_smarty_tpl->tpl_vars['d']->value['cid'];?>
" class="table_hover" >
				       <td class="m_title c_radio">
				      <label><input type="checkbox" name="delid[<?php echo $_smarty_tpl->tpl_vars['d']->value['id'];?>
]" id="checkbox" class="ckeckbox"/><font style="margin-left:5px; color:#333;"><?php echo $_smarty_tpl->tpl_vars['d']->value['id'];?>
</font></label></td>
					<td class="c_font">
                 	    <?php if ($_smarty_tpl->tpl_vars['d']->value['sys']==3){?><font style="color:#009933">关注消息</font><?php }?>
						<?php if ($_smarty_tpl->tpl_vars['d']->value['sys']==2){?><font style="color:#227CAC">系统消息</font><?php }?> 
                        <?php if ($_smarty_tpl->tpl_vars['d']->value['sys']==1){?><font style="color:#FF9900">回复通知</font><?php }?> 
					</td>
					<td><?php echo $_smarty_tpl->tpl_vars['d']->value['title'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['d']->value['info'];?>
</td>
					<td><?php if ($_smarty_tpl->tpl_vars['d']->value['user']['username']){?><?php echo $_smarty_tpl->tpl_vars['d']->value['user']['username'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['d']->value['foruid'];?>
<?php }?></td>
					<td><?php echo ybtime(array('time'=>$_smarty_tpl->tpl_vars['d']->value['time']),$_smarty_tpl);?>
</td>
				   </tr>
				   <?php }} ?>
			   </table>
	 </div>
	 <div class="btn_area">
	     <input type="button" class="btn_return" name="button" value="全选" onclick="checkAll('ckeckbox')" />
         <input type="submit" class="btn_del" name="submit" value="删除"  />
         <input type="button" class="btn_save margin_l10" name="button" value="清除所有系统通知" onclick="window.location.href='<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'admin','a'=>'notice','clear'=>2),$_smarty_tpl);?>
'" />
         <input type="button" class="btn_save margin_l10" name="button" value="清除所有关注通知" onclick="window.location.href='<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'admin','a'=>'notice','clear'=>3),$_smarty_tpl);?>
'"/>
			
		
     </div>
	 </form>

</div>
<?php $_template = new Smarty_Internal_Template('admin/footer.html', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
