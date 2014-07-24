<?php /* Smarty version Smarty-3.0.6, created on 2014-01-19 20:39:55
         compiled from "tplv2/admin/user_info.html" */ ?>
<?php /*%%SmartyHeaderCode:75334643452dbc79b2e2230-44337817%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '76b97660e821737d2da8b4174111520b0576f9c0' => 
    array (
      0 => 'tplv2/admin/user_info.html',
      1 => 1341243314,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '75334643452dbc79b2e2230-44337817',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include '/alidata/www/tuitui2/init/Drivers/Smarty/plugins/modifier.date_format.php';
?><?php $_template = new Smarty_Internal_Template('admin/header.html', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<div id="content">

    <div class="t_con">
	    <h3>用户搜索</h3>
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
		
		<div class="navpage"><?php echo $_smarty_tpl->getVariable('systagpager')->value;?>
<div class="clear"></div></div>
		
		
		    <h3>用户信息</h3>
		    
			<table width="100%" cellpadding="0" cellspacing="0" border="0" class="table_padding">
			       <tr>
				       <td width="90" class="t_title"><?php if ($_smarty_tpl->getVariable('info')->value['admin']==1){?>管理员<?php }?>账号</td>
					   <td class="co_link"><font><a href="<?php echo goUserHome(array('domain'=>$_smarty_tpl->getVariable('info')->value['domain'],'uid'=>$_smarty_tpl->getVariable('info')->value['uid']),$_smarty_tpl);?>
" target="_blank"><?php echo $_smarty_tpl->getVariable('info')->value['email'];?>
</a>&nbsp;<?php if ($_smarty_tpl->getVariable('info')->value['open']==1){?>允许<?php }else{ ?>禁止<?php }?></font></td>
				   </tr>
				   <tr>
				       <td class="t_title">头像</td>
					   <td class="m_avata"><img src="<?php echo avatar(array('uid'=>$_smarty_tpl->getVariable('info')->value['uid'],'size'=>'middle'),$_smarty_tpl);?>
" alt="<?php echo $_smarty_tpl->getVariable('info')->value['username'];?>
"/></td>
				   </tr>
				   <tr>
				       <td class="t_title">注册时间</td>
					   <td class="c_font"><?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('info')->value['regtime'],'%Y-%m-%d %H:%M:%S');?>
</td>
				   </tr>
				   <tr>
				       <td class="t_title">最近登陆</td>
					   <td class="c_font"><?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('info')->value['logtime'],'%Y-%m-%d %H:%M:%S');?>
</td>
				   </tr>
                   <tr>
				       <td class="t_title">博客统计</td>
					   <td class="c_font m_num">
					       发布(<font><?php echo $_smarty_tpl->getVariable('info')->value['num'];?>
</font>) | 跟随(<font><?php echo $_smarty_tpl->getVariable('info')->value['flow'];?>
</font>) | 喜欢(<font><?php echo $_smarty_tpl->getVariable('info')->value['likenum'];?>
</font>)
                       </td>
				   </tr>
                   <tr>
				       <td class="t_title">用户操作</td>
					   <td class="fun_con c_font">
						<?php if ($_smarty_tpl->getVariable('info')->value['admin']!=1){?>
						<?php if ($_smarty_tpl->getVariable('info')->value['open']==1){?>
						<a class="f_novisit" href="javascript:;" onclick="nologin(<?php echo $_smarty_tpl->getVariable('info')->value['uid'];?>
)" title="禁止访问">禁访</a>
						<?php }else{ ?>
						<a class="f_visit" href="javascript:"  onclick="nologin(<?php echo $_smarty_tpl->getVariable('info')->value['uid'];?>
)" title="解除禁止">解禁</a>
						<?php }?>
						<?php }?>
						<a class="f_password" href="javascript:resetpwd(<?php echo $_smarty_tpl->getVariable('info')->value['uid'];?>
,'<?php echo $_smarty_tpl->getVariable('info')->value['username'];?>
')" title="修改密码">重设密码</a>
						<a class="f_delhead" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'admin','a'=>'user','mod'=>'info','uid'=>$_smarty_tpl->getVariable('info')->value['uid'],'delface'=>$_smarty_tpl->getVariable('info')->value['uid']),$_smarty_tpl);?>
" title="删除头像">删除头像</a>
					   </td>
				   </tr>
                   
			   </table>
		 
		 
		 <div class="btn_area">
		<input name="button" class="btn_return" type="button" value="返回上一页" onclick="window.history.go(-1)" />
		</div>
			
		</div>

</div>
<?php $_template = new Smarty_Internal_Template('admin/footer.html', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
