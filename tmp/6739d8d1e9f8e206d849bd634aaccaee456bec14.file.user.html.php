<?php /* Smarty version Smarty-3.0.6, created on 2014-01-17 21:46:22
         compiled from "tplv2/admin/user.html" */ ?>
<?php /*%%SmartyHeaderCode:7499939152d9342e1ed634-37183893%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6739d8d1e9f8e206d849bd634aaccaee456bec14' => 
    array (
      0 => 'tplv2/admin/user.html',
      1 => 1341154848,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7499939152d9342e1ed634-37183893',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template('admin/header.html', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<div id="content">

    <div class="t_con">
	    <h3>用户搜索</h3>
		<div class="con_system">
		<form id="form1" name="form1" method="post" action="">
		       <table width="100%" cellpadding="0" cellspacing="0" border="0" class="table_padding">
			       <tr>
				      <td width="110" class="t_title">邮箱、昵称、域名</td>
					  <td width="315" class="c_input"><input name="where" type="text" value="<?php echo $_smarty_tpl->getVariable('get')->value['niname'];?>
"/></td>
					  
					  <td><input name="submit" class="btn_return"  type="submit" value="搜索" />
					  </td>
				   </tr>
			   </table>
		 </form>
		 </div>
		
	</div>
	
	
	<div class="con_index">
		<h2>用户列表，共 <?php echo $_smarty_tpl->getVariable('countuser')->value;?>
 名会员</h2>
		<div class="navpage"><?php echo $_smarty_tpl->getVariable('pager')->value;?>
<div class="clear"></div></div>
		      <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_model">
			     <tr class="table_title">
				    <th width="30" class="m_title">UID</th>
					<th>账号</th>
					<th width="100"></th>
					<th width="40">访问</th>
					<th width="110">昵称</th>
					<th width="100">注册</th>
					<th width="100">登陆</th>
					<th width="40">发布</th>
					<th width="40">跟随</th>
					<th width="40">喜欢</th>
				   </tr>
				   <?php  $_smarty_tpl->tpl_vars['d'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('user')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['d']->key => $_smarty_tpl->tpl_vars['d']->value){
?>
				   <tr class="table_hover" id="blog_<?php echo $_smarty_tpl->tpl_vars['d']->value['bid'];?>
">
					<td class="m_title"><?php echo $_smarty_tpl->tpl_vars['d']->value['uid'];?>
</td>
					<td class="tt_title">
					      <a href="<?php echo goUserHome(array('domain'=>$_smarty_tpl->tpl_vars['d']->value['domain'],'uid'=>$_smarty_tpl->tpl_vars['d']->value['uid']),$_smarty_tpl);?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['d']->value['email'];?>
</a> <?php if ($_smarty_tpl->tpl_vars['d']->value['admin']==1){?>管理员<?php }?>
					</td>
					<td class="fun_con">
					    <a class="f_look mtop" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'admin','a'=>'user','mod'=>'info','uid'=>$_smarty_tpl->tpl_vars['d']->value['uid']),$_smarty_tpl);?>
" title="详情">详情</a>
						<?php if ($_smarty_tpl->tpl_vars['d']->value['open']==1){?>
						<a class="f_novisit mtop" href="javascript:;" onclick="nologin(<?php echo $_smarty_tpl->tpl_vars['d']->value['uid'];?>
)" title="禁止访问">禁访</a>
						<?php }else{ ?>
						<a class="f_visit mtop" href="javascript:;" onclick="nologin(<?php echo $_smarty_tpl->tpl_vars['d']->value['uid'];?>
)" title="解除禁止">解禁</a>
						<?php }?>
						<a class="f_password mtop" href="javascript:resetpwd(<?php echo $_smarty_tpl->tpl_vars['d']->value['uid'];?>
,'<?php echo $_smarty_tpl->tpl_vars['d']->value['username'];?>
')" title="修改密码">重设密码</a>
					</td>
					<td><?php if ($_smarty_tpl->tpl_vars['d']->value['open']==1){?>允许<?php }else{ ?>禁止<?php }?></td>
					<td><?php echo $_smarty_tpl->tpl_vars['d']->value['username'];?>
</td>
					<td><?php echo ybtime(array('time'=>$_smarty_tpl->tpl_vars['d']->value['regtime']),$_smarty_tpl);?>
</td>
					<td><?php echo ybtime(array('time'=>$_smarty_tpl->tpl_vars['d']->value['logtime']),$_smarty_tpl);?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['d']->value['num'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['d']->value['flow'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['d']->value['likenum'];?>
</td>
				   </tr>
				   <?php }} ?>
			  </table>

	 </div>
	 
	 <div class="navpage"><?php echo $_smarty_tpl->getVariable('pager')->value;?>
<div class="clear"></div></div>

   
</div>
<?php $_template = new Smarty_Internal_Template('admin/footer.html', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
