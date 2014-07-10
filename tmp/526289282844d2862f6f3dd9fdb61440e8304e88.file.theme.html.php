<?php /* Smarty version Smarty-3.0.6, created on 2012-12-22 00:02:45
         compiled from "tplv2\admin/theme.html" */ ?>
<?php /*%%SmartyHeaderCode:2250750d488256f3aa6-07816445%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '526289282844d2862f6f3dd9fdb61440e8304e88' => 
    array (
      0 => 'tplv2\\admin/theme.html',
      1 => 1341154866,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2250750d488256f3aa6-07816445',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template('admin/header.html', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<div id="content">

    <div class="con_index">
	    <h2>用户主题管理</h2>
		
		<div class="tip1 tip_red"><b>警告</b>：建议只使用官方提供的主题包,任何第三方主题包的使用可能会给您的系统造成风险,请谨慎。</div>
		<div class="clear"></div>
		<div class="tip">主题文件夹位于<font><?php echo $_smarty_tpl->getVariable('themedir')->value;?>
/theme/</font>目录下，如果卸载后您不需要可从该目录下找到对应目录删除即可。</div>
		<div class="clear"></div>
	</div>
	
	<div id="setup" class="con_upload">
		<form action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'admin','a'=>'theme','m'=>'install'),$_smarty_tpl);?>
" method="post" enctype="multipart/form-data" name="form1" id="form1">
		    <h3>上传主题
			
			<input type="file" class="ul_file" name="themefile" id="themefile" />
			<input type="submit" name="button" id="button" class="ul_btn" value="添加" />
			
			</h3>
		   
		</form>
		<div class="clear"></div>
	</div>
	
		
<div class="artTabs">
    <ul id="tabs">
	    <li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'admin','a'=>'theme'),$_smarty_tpl);?>
" <?php echo $_smarty_tpl->getVariable('curr_all')->value;?>
>全部主题<div class="point"></div></a></li>
		<li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'admin','a'=>'theme','filter'=>'close'),$_smarty_tpl);?>
" <?php echo $_smarty_tpl->getVariable('curr_no')->value;?>
>已禁用<div class="point"></div></a></li>
		<li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'admin','a'=>'theme','filter'=>'open'),$_smarty_tpl);?>
" <?php echo $_smarty_tpl->getVariable('curr_open')->value;?>
>已启用<div class="point"></div></a></li>
		<li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'admin','a'=>'theme','filter'=>'exclusive'),$_smarty_tpl);?>
" <?php echo $_smarty_tpl->getVariable('curr_exclu')->value;?>
>专属主题<div class="point"></div></a></li>
		<div class="clear"></div>
	</ul>
</div>


 <div class="con_index">
<div class="navpage"><?php echo $_smarty_tpl->getVariable('pager')->value;?>
<div class="clear"></div></div>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_model">
			     <tr class="table_title">
				     <th width="150" class="m_title">主题截图</th>
					<th width="100">名称</th>
					<th width="100">目录</th>
					<th width="100">作者</th>
					<th width="80">版本</th>
					<th width="80">启用</th>
					<th width="60">专属主题</th>
					<th width="50">操作</th>
				   </tr>
				   <?php  $_smarty_tpl->tpl_vars['d'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('skins')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['d']->key => $_smarty_tpl->tpl_vars['d']->value){
?>
				   <tr class="table_hover" id="blog_<?php echo $_smarty_tpl->tpl_vars['d']->value['bid'];?>
">
					  <td class="m_title m_theme"><img src="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/theme/<?php echo $_smarty_tpl->tpl_vars['d']->value['skindir'];?>
/cover.jpg" /></td>
				   <td><?php echo $_smarty_tpl->tpl_vars['d']->value['name'];?>
(<?php echo $_smarty_tpl->tpl_vars['d']->value['usenumber'];?>
)</td>
				   <td><?php echo $_smarty_tpl->tpl_vars['d']->value['skindir'];?>
</td>
				   <td class="co_link"><a href="<?php echo $_smarty_tpl->tpl_vars['d']->value['uri'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['d']->value['author'];?>
</a></td>
				   <td><?php echo $_smarty_tpl->tpl_vars['d']->value['version'];?>
</td>
				   <td><?php if ($_smarty_tpl->tpl_vars['d']->value['open']==1){?><div class="fun_yes"></div><?php }else{ ?><div class="fun_no"></div><?php }?></td>
				   <td><?php if ($_smarty_tpl->tpl_vars['d']->value['exclusive']==0){?><div class="fun_no"></div><?php }else{ ?> 指派：<?php echo $_smarty_tpl->tpl_vars['d']->value['exclusive'];?>
 <?php }?></td>
				   <td class="fun_con">
				      <a class="f_look mtop" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'admin','a'=>'theme','m'=>'info','id'=>$_smarty_tpl->tpl_vars['d']->value['id']),$_smarty_tpl);?>
" title="详情">详情</a>
				      <a class="f_delete mtop" href="javascript:void(0)" onclick="unInstallTheme(<?php echo $_smarty_tpl->tpl_vars['d']->value['id'];?>
)" title="卸载">卸载</a>
				   </td>
				   </tr>
				   <?php }} ?>
			  </table>

	 </div>
		
		
	</div>
   
</div>
<?php $_template = new Smarty_Internal_Template('admin/footer.html', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
