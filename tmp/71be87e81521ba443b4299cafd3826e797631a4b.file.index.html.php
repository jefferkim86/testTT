<?php /* Smarty version Smarty-3.0.6, created on 2012-12-21 22:51:00
         compiled from "tplv2\admin/index.html" */ ?>
<?php /*%%SmartyHeaderCode:901850d4775413ce77-11844426%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '71be87e81521ba443b4299cafd3826e797631a4b' => 
    array (
      0 => 'tplv2\\admin/index.html',
      1 => 1341154866,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '901850d4775413ce77-11844426',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template('admin/header.html', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
  <div id="content">
      <div class="con_index">
		      <h2>软件信息</h2>
			  <table width="100%" cellpadding="0" cellspacing="0" border="0" class="in_font table_padding">
			     <tr>
				     <td width="110">系统信息：</td>
				     <td><?php echo $_smarty_tpl->getVariable('yb')->value['soft'];?>
</td>
				 </tr>
				 <tr>
				     <td>程序版本：</td>
					 <td><?php echo $_smarty_tpl->getVariable('yb')->value['version'];?>
 <span id="encodeversion"><?php echo $_smarty_tpl->getVariable('ybsoftencode')->value;?>
</span> | <span id="checkVersion"><a href="javascript:queryVersion()">[检查更新]</a></span></td>
				</tr>
				<tr>
				    <td>联系方式：</td>
					<td><?php echo $_smarty_tpl->getVariable('yb')->value['email'];?>
</td>
				</tr>
				<tr>
				    <td>项目总策划：</td>
					<td><?php echo $_smarty_tpl->getVariable('yb')->value['author'];?>
</td>
				</tr>
				<tr>
				    <td>产品设计与研发：</td>
					<td><?php echo $_smarty_tpl->getVariable('yb')->value['code'];?>
</td>
				</tr>
				<tr>
				    <td>界面与用户体验：</td>
					<td><?php echo $_smarty_tpl->getVariable('yb')->value['design'];?>
</td>
				</tr>
				<tr>
				    <td>官方演示：</td>
					<td><a href="<?php echo $_smarty_tpl->getVariable('yb')->value['url'];?>
" target="_blank"><?php echo $_smarty_tpl->getVariable('yb')->value['url'];?>
</a></td>
				</tr>
			</table>
			<div class="sec"><h2>服务器信息</h2></div>
			
    <table width="100%" class="table_padding">
     <tr>
        <td  width="100">PHP版本：</td>
        <td><?php echo $_smarty_tpl->getVariable('version')->value;?>
</td>
      </tr>
       <tr>
        <td>MySQL版本：</td>
        <td><?php echo $_smarty_tpl->getVariable('mysql')->value;?>
</td>
      </tr>
      <tr>
        <td>图像处理：</td>
        <td><?php echo $_smarty_tpl->getVariable('gd')->value;?>
</td>
      </tr>
       <tr>
        <td>附件上传限制：</td>
        <td>表单<?php echo $_smarty_tpl->getVariable('postupload')->value;?>
，最大支持<?php echo $_smarty_tpl->getVariable('maxupload')->value;?>
</td>
      </tr>
      <tr>
        <td>服务器IP地址</td>
        <td><?php echo $_smarty_tpl->getVariable('server')->value['HTTP_HOST'];?>
</td>
      </tr>
      
      <tr>
        <td>操作系统</td>
        <td><?php echo $_smarty_tpl->getVariable('os')->value;?>
</td>
      </tr>
      <tr>
        <td>物理路径：</td>
        <td><?php echo $_smarty_tpl->getVariable('server')->value['DOCUMENT_ROOT'];?>
</td>
      </tr>
      <tr>
        <td>gzip压缩：</td>
        <td><?php echo $_smarty_tpl->getVariable('server')->value['HTTP_ACCEPT_ENCODING'];?>
</td>
      </tr>
      <tr>
        <td>系统管理员：</td>
        <td><?php echo $_smarty_tpl->getVariable('server')->value['SERVER_ADMIN'];?>
</td>
      </tr>
    </table>
		   
		   </div>
		

	 
    
  </div>
<?php $_template = new Smarty_Internal_Template('admin/footer.html', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
