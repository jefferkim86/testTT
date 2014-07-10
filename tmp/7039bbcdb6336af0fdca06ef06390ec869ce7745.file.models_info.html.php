<?php /* Smarty version Smarty-3.0.6, created on 2012-12-22 00:37:18
         compiled from "tplv2\admin/models_info.html" */ ?>
<?php /*%%SmartyHeaderCode:1879550d4903e5c1518-48170287%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7039bbcdb6336af0fdca06ef06390ec869ce7745' => 
    array (
      0 => 'tplv2\\admin/models_info.html',
      1 => 1341154866,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1879550d4903e5c1518-48170287',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template('admin/header.html', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
  <div id="content">
      <form action="" method="post">
      <div class="t_con">
	  
	    <h3>模型编辑 - <?php echo $_smarty_tpl->getVariable('minfo')->value['name'];?>
 <?php echo $_smarty_tpl->getVariable('minfo')->value['id'];?>
</h3>
		<div class="clear"></div>
		<div class="con_system">
		       <table width="100%" cellpadding="0" cellspacing="0" border="0" class="table_padding">
			       <tr>
				    <td class="t_title" width="120">模型开关</td>
				    <td class="c_radio">
                    <label><input type="radio" name="status"  value="1"  <?php if ($_smarty_tpl->getVariable('minfo')->value['status']==1){?> checked="checked" <?php }?> />开启</label>
					<label><input type="radio" name="status"  value="0"  <?php if ($_smarty_tpl->getVariable('minfo')->value['status']==0){?> checked="checked" <?php }?> />关闭</label>
					<font>是否启用该模型</font>
                    </td>
				 </tr>
                 
                 <tr>
				    <td class="t_title">模型名称</td>
				    <td class="c_input_small"><input name="name" type="text" value="<?php echo $_smarty_tpl->getVariable('minfo')->value['name'];?>
" /><font>模型显示的名称</font></td>                 
				 </tr>
                <tr>
                    <td class="t_title">模型描述</td>
				    <td class="c_input_small"><input name="mdesc" type="text" value="<?php echo $_smarty_tpl->getVariable('minfo')->value['mdesc'];?>
" /><font>鼠标放上去的简介</font></td>
				 </tr>
                 
                 <tr>
                    <td class="t_title">图标或样式标示符</td>
				    <td class="c_input_small"><input name="icon" type="text" value="<?php echo $_smarty_tpl->getVariable('minfo')->value['icon'];?>
" /><font>用于前端显示该模型效果</font></td>
				 </tr>
                 
                 <tr>
                    <td class="t_title">模型执行文件</td>
				    <td class="c_input_small"><input name="modelfile" type="text" value="<?php echo $_smarty_tpl->getVariable('minfo')->value['modelfile'];?>
" /><font>请勿随意修改</font></td>
				 </tr>
                 
                <tr>
                    <td class="t_title">版本</td>
				    <td class="c_font"><?php echo $_smarty_tpl->getVariable('minfo')->value['version'];?>
<font>(模型版本)</font></td>
				 </tr>
                 
                 <tr>
                    <td class="t_title">作者</td>
				    <td class="c_font"><?php echo $_smarty_tpl->getVariable('minfo')->value['author'];?>
<font>(模型作者)</font></td>
				 </tr>
                 
                 <tr>
                    <td class="t_title">模型feed template</td>
				    <td class="c_textarea"><textarea rows=10 cols=60 name="feedtpl"><?php echo $_smarty_tpl->getVariable('minfo')->value['feedtpl'];?>
</textarea><em>动态模板</em></td>
				 </tr>
                 
                 
                 <tr>
                    <td class="t_title">模型配置文件</td>
				    <td class="c_textarea"><textarea rows=10 cols=60 name="cfg"><?php echo $_smarty_tpl->getVariable('minfo')->value['cfg'];?>
</textarea><em>模型配置文件,新手勿动</em></td>
				 </tr>
			   </table>
		 </div>
		 
		 
	  
	  </div>
	  
	  <div class="btn_area">
		   <input name="submit" class="btn_save" type="submit" value="保存更改" />
		   <input name="submit" class="btn_return"  type="button" value="返回" onclick="window.history.go(-1)" />
      </div>
	  </form>
  </div>
<?php $_template = new Smarty_Internal_Template('admin/footer.html', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
