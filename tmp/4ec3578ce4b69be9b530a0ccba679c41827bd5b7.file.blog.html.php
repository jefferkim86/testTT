<?php /* Smarty version Smarty-3.0.6, created on 2012-12-22 00:02:39
         compiled from "tplv2\admin/blog.html" */ ?>
<?php /*%%SmartyHeaderCode:193950d4881f0c0ad7-48268964%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4ec3578ce4b69be9b530a0ccba679c41827bd5b7' => 
    array (
      0 => 'tplv2\\admin/blog.html',
      1 => 1341241750,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '193950d4881f0c0ad7-48268964',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template('admin/header.html', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<div id="content">
<form id="form1" name="form1" method="post" action="">
    <div class="t_con">
	    <h3>搜索</h3>
		<div class="con_system">
		       <table width="100%" cellpadding="0" cellspacing="0" border="0" class="table_padding">
			       <tr>
				      <td width="50" class="t_title">按标题</td>
					  <td width="180" class="c_input_small"><input type="text" name="title" value="<?php echo $_smarty_tpl->getVariable('get')->value['title'];?>
"  /></td>
					  <td width="60" class="t_title">按用户ID</td>
					  <td width="180" class="c_input_small"><input name="niname" type="text" value="<?php echo $_smarty_tpl->getVariable('get')->value['niname'];?>
"/></td>
					  <td><input name="submit" class="btn_return"  type="submit" value="搜索" />
					  </td>
				   </tr>
			   </table>
		 </div>
		
	</div>
</form>
   
	
	<div class="con_index" style="margin-bottom:10px;">
		<div class="sec"><h2>列表</h2></div>
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
					      <a class="f_edit mtop" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'post','a'=>'edit','id'=>$_smarty_tpl->tpl_vars['d']->value['bid'],'model'=>$_smarty_tpl->tpl_vars['d']->value['type']),$_smarty_tpl);?>
" target="_blank">编辑</a> 
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
