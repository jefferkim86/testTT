<?php /* Smarty version Smarty-3.0.6, created on 2012-12-22 00:02:32
         compiled from "tplv2\admin/cpage.html" */ ?>
<?php /*%%SmartyHeaderCode:3150250d488187effe5-41686778%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '09a5e69ec8d06298e3354a1e20fd60b9839ec334' => 
    array (
      0 => 'tplv2\\admin/cpage.html',
      1 => 1341154848,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3150250d488187effe5-41686778',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template('admin/header.html', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

<div id="content">

    <div class="main">
	    <input class="btn_common" type="button" value="添加分类" id="cp_add_show" />
	    <input class="btn_common" type="button" value="添加/修改文章" id="cp_add_article" />
		<input class="btn_common" type="button" value="刷新" id="cp_refresh" />
		<div class="clear"></div>
	</div>
	
	<!--begin-->
	<div id="cp_add" class="t_con" style="display:none">
	<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
	    <div class="con_system">
		       <table width="100%" cellpadding="0" cellspacing="0" border="0" class="table_padding">
			      <tr>
				      <td width="80" class="t_title">分类*</td>
					  <td class="c_input_small"><input type="text" name="title" id="title" /><font>修改及删除需谨慎</font></td>
                  </tr>
				  <tr>
				      <td class="t_title">唯一地址*</td>
                      <td class="c_input_small"><input type="text" name="tags" id="tags" /><font>一个英文的唯一地址用于显示页面比如 about</font></td>
                  </tr>
				  <tr>
				      <td class="t_title">关键字</td>
                      <td class="c_input_small"><input type="text" name="keyword" id="keyword" /><font>修改及删除需谨慎</font></td>
                  </tr>
                  <tr>
				      <td class="t_title">描述</td>
                      <td class="c_input_small"><input type="text" name="description" id="desc" /><font>修改及删除需谨慎</font></td>
                  </tr>
				  <tr>
				      <td class="t_title">排序</td>
                      <td class="c_input_small"><input type="text" name="orders" id="orders" /><font>修改及删除需谨慎</font></td>
                  </tr>
			  </table>
			  
			  <input type="hidden" name="addCategory" value="true"/>
              <div class="btn_area">
			      <input name="add" class="btn_save" type="submit" value="添加" />
                  <input id="cp_add_hidden" name="cancel" class="btn_return" type="button" value="取消" />
              </div>
			  
		 </div>
	</form>
	</div>
	<!--end-->
	<div class="con_cpage">
	    
		<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_model">
                        <tr class="table_title">
						    <th width="30" class="m_title">排序</th>
                            <th width="100">标题</th>
							<th>唯一地址</th>
                            <th>关键字</th>
                            <th>描述</th>
                            <th width="120">操作</th>
                        </tr>
                        <?php  $_smarty_tpl->tpl_vars['vo'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('cpage_cate')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['vo']->key => $_smarty_tpl->tpl_vars['vo']->value){
?>
                        <tr class="table_hover">
							<td class="m_title"><?php echo $_smarty_tpl->tpl_vars['vo']->value['orders'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['vo']->value['title'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['vo']->value['tags'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['vo']->value['keyword'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['vo']->value['description'];?>
</td>
                            <td class="fun_con">
							    <a class="f_category" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'admin','a'=>'cpage','editCategory'=>$_smarty_tpl->tpl_vars['vo']->value['id']),$_smarty_tpl);?>
" title="修改分类">分类</a>
								<a class="f_edit" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'admin','a'=>'cpage','addBody'=>$_smarty_tpl->tpl_vars['vo']->value['id']),$_smarty_tpl);?>
" title="编辑">编辑</a>
								<a class="f_delete" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'admin','a'=>'cpage','del'=>$_smarty_tpl->tpl_vars['vo']->value['id']),$_smarty_tpl);?>
" onclick="return confirm('删除分类会将分类下的内容一块删除,确认删除?')" title="删除">删除</a>
							</td>
                        </tr>
                        <?php }} ?>
                    </table>
                    <?php echo $_smarty_tpl->getVariable('cpage_pager')->value;?>

		
	</div>

</div>
<?php $_template = new Smarty_Internal_Template('admin/footer.html', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<script type="text/javascript">
    $(function(){
        //打开添加
       $("#cp_add_show").click(function(){
           $("#title").val("");
           $("#keyword").val("");
           $("#desc").val("");
           $("#cp_add").slideToggle();
       });
       
       //关闭添加
       $("#cp_add_hidden").click(function(){
           $("#cp_add").slideUp();
       });
       
       //刷新本页
       $("#cp_refresh").click(function(){
           window.location.reload()
       });
       
       //
       $("#cp_add_article").click(function(){
        window.location='<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'admin','a'=>'cpage','addBody'=>"true"),$_smarty_tpl);?>
';   
       });
    });
 </script>