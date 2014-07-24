<?php /* Smarty version Smarty-3.0.6, created on 2012-12-22 00:02:41
         compiled from "tplv2\admin/blog_verify.html" */ ?>
<?php /*%%SmartyHeaderCode:2671650d488214a2863-97134340%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '458a078763ce5e00f409bf9010e2d5ddf74c9d88' => 
    array (
      0 => 'tplv2\\admin/blog_verify.html',
      1 => 1342849012,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2671650d488214a2863-97134340',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template('admin/header.html', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<div id="content">

   
	
	<div class="con_index" style="margin-bottom:10px;">
		<div class="sec"><h2>审核列表</h2></div>
		<div class="navpage"><?php echo $_smarty_tpl->getVariable('pager')->value;?>
<div class="clear"></div></div>
		
		<input class="btn_return" type="button" onclick="checkAll('ckeckbox')" value="全选" name="button">
		<input class="btn_del submit" type="button" value="删除" onclick="delblog_all()">
		
		      <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_model">
			     <tr class="table_title">
					  <th width="30" class="m_title">操作</th>
				      <th width="30">ID</th>
					  <th>标题</th>
					  <th width="80">作者</th>
					  <th width="120">标签</th>
					  <th width="40">类型</th>
					  <th width="40">草稿</th>
					  <th width="40">点击</th>
					  <th width="40">动态</th>
					  <th width="40">评论</th>
					  <th width="40">评论</th>
					  <th width="60">时间</th>
					   <th width="60">操作</th>
				   </tr>
				   <?php  $_smarty_tpl->tpl_vars['d'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('blog')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['d']->key => $_smarty_tpl->tpl_vars['d']->value){
?>
				   <tr class="table_hover" id="blog_<?php echo $_smarty_tpl->tpl_vars['d']->value['bid'];?>
">
				     <td class="m_title" style="padding-top:13px"><input id="checkbox" class="ckeckbox" type="checkbox" name="delid" delid="<?php echo $_smarty_tpl->tpl_vars['d']->value['bid'];?>
"></td>
				      <td><?php echo $_smarty_tpl->tpl_vars['d']->value['bid'];?>
</td>
					  <td class="tt_title"><a href="<?php echo goUserBlog(array('bid'=>$_smarty_tpl->tpl_vars['d']->value['bid']),$_smarty_tpl);?>
" target="_blank"><?php if ($_smarty_tpl->tpl_vars['d']->value['title']==''){?>没有标题<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['d']->value['title'];?>
<?php }?></a></td>
					  <td class="to_title"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'blog','a'=>'gouser','uid'=>$_smarty_tpl->tpl_vars['d']->value['user']['uid']),$_smarty_tpl);?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['d']->value['user']['username'];?>
(<?php echo $_smarty_tpl->tpl_vars['d']->value['user']['uid'];?>
)</a></td>
					  <td class="to_title"><?php echo tag(array('tag'=>$_smarty_tpl->tpl_vars['d']->value['tag'],'c'=>'tag'),$_smarty_tpl);?>
</td>
					  <td><?php if ($_smarty_tpl->tpl_vars['d']->value['type']==1){?>文字
					  <?php }elseif($_smarty_tpl->tpl_vars['d']->value['type']==2){?>音乐
					  <?php }elseif($_smarty_tpl->tpl_vars['d']->value['type']==3){?>图片
					  <?php }elseif($_smarty_tpl->tpl_vars['d']->value['type']==4){?>视频
					  <?php }elseif($_smarty_tpl->tpl_vars['d']->value['type']==5){?>宝贝
					  <?php }elseif($_smarty_tpl->tpl_vars['d']->value['type']==6){?>电影
					  <?php }?></td>
					  <td><?php if ($_smarty_tpl->tpl_vars['d']->value['open']==1){?><div class="fun_no"></div><?php }else{ ?><div class="fun_yes"></div><?php }?></td>
					  <td><?php echo $_smarty_tpl->tpl_vars['d']->value['hitcount'];?>
</td>
					  <td><?php echo $_smarty_tpl->tpl_vars['d']->value['feedcount'];?>
</td>
					  <td><?php echo $_smarty_tpl->tpl_vars['d']->value['replaycount'];?>
</td>
					  <td><?php if ($_smarty_tpl->tpl_vars['d']->value['noreply']==1){?><div class="fun_no"></div><?php }else{ ?><div class="fun_yes"></div><?php }?></td>
					  <td><?php echo ybtime(array('time'=>$_smarty_tpl->tpl_vars['d']->value['time']),$_smarty_tpl);?>
</td>
					  <td class="fun_con mfun">
					      <a class="f_verify mtop" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'admin','a'=>'blogverify','verify'=>$_smarty_tpl->tpl_vars['d']->value['bid']),$_smarty_tpl);?>
">审核</a> 
						  <a class="f_delete mtop" href="javascript:;" onclick="delblogs(<?php echo $_smarty_tpl->tpl_vars['d']->value['bid'];?>
)">删除</a></td>
				   </tr>
				   <?php }} ?>
			  </table>

	 </div>
	 <input class="btn_return" type="button" onclick="checkAll('ckeckbox')" value="全选" name="button">
	 <input class="btn_del submit" type="button" value="删除" onclick="delblog_all()">
	 
	  <div class="navpage"><?php echo $_smarty_tpl->getVariable('pager')->value;?>
<div class="clear"></div></div>
	
</div>
<?php $_template = new Smarty_Internal_Template('admin/footer.html', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
