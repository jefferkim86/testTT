<?php /* Smarty version Smarty-3.0.6, created on 2012-12-22 00:02:52
         compiled from "tplv2\admin/database.html" */ ?>
<?php /*%%SmartyHeaderCode:2911350d4882c2504f5-62789070%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '024291e2b82945b8c8fcaeb0244b8af9d4ebda1f' => 
    array (
      0 => 'tplv2\\admin/database.html',
      1 => 1341154866,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2911350d4882c2504f5-62789070',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template('admin/header.html', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<div id="content">

    <div class="con_index">
	    
	     <h2>数据库管理</h2>
		 
		 <div class="datamain">
		 
		 <form id="form1" name="form1" method="post" action="">
		 <?php if ($_smarty_tpl->getVariable('get')->value['chk']){?>
		 <div class="tip">已检查所有表，请对有问题的表点击修复操作进行修复</div><div class="clear"></div>
		 <a class="btn_return_a" href="javascript:void(0)" id="download" onclick="databseOut('<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'admin','a'=>'database','ouall'=>'yes'),$_smarty_tpl);?>
')">备份全部数据</a>
		 <input type="button" class="btn_return" value="返回" onclick="window.location.href='<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'admin','a'=>'database'),$_smarty_tpl);?>
'"/></div>
		 <?php }else{ ?>
		 <div class="tip">当有新设置可供更新时，请先点一次保存，再设置新的设置并点击保存，就会生效</div><div class="clear"></div>
		 <input name="chk" class="btn_return" type="submit" value="检查所有表" />         </div>
		 
		 <?php }?>
		 </form>

		</div>
		<form id="form1" name="form1" method="post" action="">
		      <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_model">
			     <tr class="table_title">
				      <th class="m_title">数据表</th>
					  <th width="80">引擎</th>
					  <th width="110">字符集</th>
					  <th width="70">占用空间</th>
					  <th width="50">记录数</th>
					  <th width="40">表状态</th>
					  <th width="70">创建时间</th>
					  <th width="70">更新时间</th>
					  <th width="70">检查时间</th>
					  <th width="100">多余</th>
					  <th width="180">操作</th>
				 </tr>
				 <?php  $_smarty_tpl->tpl_vars['d'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('table')->value['rs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['d']->key => $_smarty_tpl->tpl_vars['d']->value){
?>
				 <tr class="table_hover">
				    <td class="m_title"><?php echo $_smarty_tpl->tpl_vars['d']->value['TABLE_NAME'];?>
<?php if ($_smarty_tpl->tpl_vars['d']->value['TABLE_COMMENT']!=''){?>(<?php echo $_smarty_tpl->tpl_vars['d']->value['TABLE_COMMENT'];?>
)<?php }?></td>
					  <td><?php echo $_smarty_tpl->tpl_vars['d']->value['ENGINE'];?>
</td>
					  <td><?php echo $_smarty_tpl->tpl_vars['d']->value['TABLE_COLLATION'];?>
</td>
					  <td><?php echo formatBytes(array('size'=>$_smarty_tpl->tpl_vars['d']->value['DATA_LENGTH']),$_smarty_tpl);?>
</td>
					  <td><?php echo $_smarty_tpl->tpl_vars['d']->value['TABLE_ROWS'];?>
</td>
					  <td><?php if ($_smarty_tpl->tpl_vars['d']->value['ROW_FORMAT']=='Dynamic'){?>动态<?php }else{ ?>静态<?php }?></td>
					  <td><?php echo ybtime(array('time'=>strtotime($_smarty_tpl->tpl_vars['d']->value['CREATE_TIME'])),$_smarty_tpl);?>
</td>
					  <td><?php echo ybtime(array('time'=>strtotime($_smarty_tpl->tpl_vars['d']->value['UPDATE_TIME'])),$_smarty_tpl);?>
</td>
					  <td><?php echo ybtime(array('time'=>strtotime($_smarty_tpl->tpl_vars['d']->value['CHECK_TIME'])),$_smarty_tpl);?>
</td>
					  <td><?php if ($_smarty_tpl->tpl_vars['d']->value['DATA_FREE']!=0){?><font style="color:#FF0000"><?php echo formatBytes(array('size'=>$_smarty_tpl->tpl_vars['d']->value['DATA_FREE']),$_smarty_tpl);?>
</font><?php }else{ ?>正常<?php }?></td>
					  <td>
					  <?php if ($_smarty_tpl->tpl_vars['d']->value['DATA_FREE']!=0){?><input class="data_superb" type="button" name="button" id="button" value="优化表" onclick="tableOp('<?php echo $_smarty_tpl->tpl_vars['d']->value['TABLE_NAME'];?>
')" /><?php }?>
					  <?php if ($_smarty_tpl->tpl_vars['d']->value['CHECK_TABLE']!='OK'&&$_smarty_tpl->tpl_vars['d']->value['CHECK_TABLE']!='NCHECK'){?>
					  <input class="data_repair" type="button" name="button" id="button" value="修复表" onclick="tableRep('<?php echo $_smarty_tpl->tpl_vars['d']->value['TABLE_NAME'];?>
','<?php echo $_smarty_tpl->tpl_vars['d']->value['CHECK_TABLE'];?>
')"  />
					  <?php }?>
					  <?php if (!isset($_smarty_tpl->tpl_vars['d']) || !is_array($_smarty_tpl->tpl_vars['d']->value)) $_smarty_tpl->createLocalArrayVariable('d');
if ($_smarty_tpl->tpl_vars['d']->value['DATA_FREE'] = 0||$_smarty_tpl->tpl_vars['d']->value['CHECK_TABLE']!='NCHECK'||$_smarty_tpl->tpl_vars['d']->value['CHECK_TABLE']!='OK'){?>
					  <input class="data_export" type="button" name="button" id="tab_o_<?php echo $_smarty_tpl->tpl_vars['d']->value['TABLE_NAME'];?>
" value="导出" onclick="outputTab('<?php echo $_smarty_tpl->tpl_vars['d']->value['TABLE_NAME'];?>
')"  />
					  <?php }?>
					  </td>
				 </tr>
				 <?php }} ?>
				 <tr class="data_info">
				      <td colspan="11">
					  <span>表总数 : <font><?php echo $_smarty_tpl->getVariable('table')->value['all_table'];?>
</font></span>
					  <span>占用空间 : <font><?php echo formatBytes(array('size'=>$_smarty_tpl->getVariable('table')->value['all_byte']),$_smarty_tpl);?>
</font></span>
					  <span>多余 : <font><?php echo formatBytes(array('size'=>$_smarty_tpl->getVariable('table')->value['all_free']),$_smarty_tpl);?>
</font></span>
					  </td>
				 </tr>
			  </table>
			  
	 </form>
	 </div>

</div>
<?php $_template = new Smarty_Internal_Template('admin/footer.html', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
