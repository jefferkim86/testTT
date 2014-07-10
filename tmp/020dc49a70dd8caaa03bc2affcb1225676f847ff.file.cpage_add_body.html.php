<?php /* Smarty version Smarty-3.0.6, created on 2012-12-22 00:02:35
         compiled from "tplv2\admin/cpage_add_body.html" */ ?>
<?php /*%%SmartyHeaderCode:3154850d4881b79b880-71221620%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '020dc49a70dd8caaa03bc2affcb1225676f847ff' => 
    array (
      0 => 'tplv2\\admin/cpage_add_body.html',
      1 => 1341154866,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3154850d4881b79b880-71221620',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template('admin/header.html', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

<div id="content">
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
    <div class="t_con">
	
	    <h3>添加/修改内容</h3>
		
		<div class="con_system">
		       <table width="100%" cellpadding="0" cellspacing="0" border="0" class="table_padding">
			      <tr>
				      <td width="80" class="t_title">标题</td>
                      <td class="c_select">
					      <select id="select_1" name="addBody">
						      <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('ass')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
?>
                               <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
</option>
                              <?php }} ?>
						  </select><font>修改及删除需谨慎</font>
					  </td>
                  </tr>
                  <tr>
				      <td class="t_title">内容</td>
                      <td class="c_textarea"><textarea name="content" id="content" cols="70" rows="25"><?php echo $_smarty_tpl->getVariable('body')->value['body'];?>
</textarea><em>注意，仅支持  p h3 img  a 标签,其中h3为2级标题p为段落</em></td>
                  </tr>
				  <input type="hidden" name="isSubmit" value="yes" />
			  </table>
		  </div>
		  
		  <div class="btn_area">
		      <input name="edit" type="submit"  value="添加/保存" class="btn_save" />
              <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'admin','a'=>'cpage'),$_smarty_tpl);?>
"><input name="add" type="button" value="返回" class="btn_return" /></a>
         </div>
	
	</div>
</form>    
</div>
<?php $_template = new Smarty_Internal_Template('admin/footer.html', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/js/editor/xheditor.js"></script>
<script type="text/javascript">
    $(function(){
        _addBody=<?php echo $_GET['addBody'];?>
;
        if(isNaN(_addBody)==false)
            {
                $("#select_1").attr('value',_addBody);
            }
            
        $("#select_1").change(function(){
            window.location.href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'admin','a'=>'cpage'),$_smarty_tpl);?>
&addBody=" + $("#select_1 option:selected").val();
        });                         
    });
</script>
