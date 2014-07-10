<?php /* Smarty version Smarty-3.0.6, created on 2012-12-22 00:02:44
         compiled from "tplv2\admin/ad_unit.html" */ ?>
<?php /*%%SmartyHeaderCode:1745450d488246ed992-38699221%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f0434caca44e14b51c91c5a57a83c8e38a563052' => 
    array (
      0 => 'tplv2\\admin/ad_unit.html',
      1 => 1341154848,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1745450d488246ed992-38699221',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template('admin/header.html', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

<div id="content">

    <div class="main">
	    <input class="btn_common"   type="button" value="创建广告位" id="ad_add_show" />
	    <input class="btn_common"  type="button" value="刷新" id="ad_refresh" />
		<div class="clear"></div>
	</div>
	
	<!--begin-->
	<div  id="ad_add" class="t_con" style="display:none">
	<form id="form2" name="form3" method="post" action="" enctype="multipart/form-data">
	    <div class="con_system">
		       <table width="100%" cellpadding="0" cellspacing="0" border="0" class="table_padding">
			      <tr>
				      <td width="80" class="t_title">广告位标题</td>
                      <td class="c_input"><input class="textipt" type="text"  name="title" /></td>
                  </tr>
				  <tr>
                        <td class="t_title">广告描述</td>
                        <td class="c_input"><input type="text" name="adesc" /></td>
                    </tr>
                    <tr>
                        <td class="t_title">广告位截图</td>
                        <td class="c_input">
                            tpl/admin/style/ad_unit/<input type="text"  name="img" />请上传至目录并只输入文件名称
                        </td>
                    </tr>
                    <tr>
                        <td class="t_title">排序</td>
                        <td class="c_input"><input type="text"  name="orders" value="<?php echo $_smarty_tpl->getVariable('dis')->value['id']+1;?>
" /></td>
                    </tr>
                    <tr>
                        <td class="t_title">是否启用</td>
                        <td class="c_radio">
						<label><input type="radio" name="is_show" id="is_show" value="1" checked="checked" />启用</label>
                        <label><input type="radio" name="is_show" id="is_show" value="0" />停用</label>
                      </td>
                    </tr>
			  </table>
			  
			  <div class="btn_area">
                    <input  type="submit" class="btn_save" value="添加" name="add"/>
                    <input id="ad_add_hidden" class="btn_return"  type="button" value="取消" />
			  </div>
              
		 </div>
	</form>
	</div>
	<!--end-->
	
	<div class="con_cpage">
	<form id="form1" name="form1" method="post" action="">   
		<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_model">
                        <tr class="table_title">
						    <th width="60" class="m_title">广告位ID</th>
                            <th>广告位名称</th>
							<th>描述</th>
                            <th>排序</th>
                            <th>系统</th>
                            <th>广告位状态</th>
							<th>操作</th>
                        </tr>
                        <?php  $_smarty_tpl->tpl_vars['d'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('adUnit_list')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['d']->key => $_smarty_tpl->tpl_vars['d']->value){
?>
                        <tr class="table_hover">
							<td class="m_title"><?php echo $_smarty_tpl->tpl_vars['d']->value['id'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['d']->value['title'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['d']->value['adesc'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['d']->value['orders'];?>
</td>
                            <td><?php if ($_smarty_tpl->tpl_vars['d']->value['system']==1){?>是<?php }else{ ?>否<?php }?></td>
                            <td class="fun_con">

							    <?php if ($_smarty_tpl->tpl_vars['d']->value['is_show']==1){?><a class="f_open" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'admin','a'=>'adUnit','flag'=>'close','en_show'=>0,'id'=>$_smarty_tpl->tpl_vars['d']->value['id']),$_smarty_tpl);?>
" title="开启中,点击关闭">开启中,点击关闭</a><?php }else{ ?><a class="f_close" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'admin','a'=>'adUnit','flag'=>'close','en_show'=>1,'id'=>$_smarty_tpl->tpl_vars['d']->value['id']),$_smarty_tpl);?>
" title="关闭中,点击开启">关闭中,点击开启</a><?php }?>
							</td>
							<td class="fun_con">
								<a class="f_look" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'admin','a'=>'adUnit','show'=>$_smarty_tpl->tpl_vars['d']->value['id']),$_smarty_tpl);?>
" title="查看广告位">查看广告位</a>
							    <?php if ($_smarty_tpl->tpl_vars['d']->value['system']!=1){?><a class="f_edit" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'admin','a'=>'adUnit','edit'=>$_smarty_tpl->tpl_vars['d']->value['id']),$_smarty_tpl);?>
" title="编辑">编辑</a><a class="f_delete" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'admin','a'=>'adUnit','del'=>$_smarty_tpl->tpl_vars['d']->value['id']),$_smarty_tpl);?>
" onclick="return(confirm('确定删除?'))" title="删除">删除</a><?php }else{ ?><?php }?>
							</td>
                        </tr>
                        <?php }} ?>
                    </table>
                    <?php echo $_smarty_tpl->getVariable('adUnit_pager')->value;?>

	</form>
	</div>
    
</div>

<?php $_template = new Smarty_Internal_Template('admin/footer.html', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<script type="text/javascript">
    $(function(){
        //打开添加
        $("#ad_add_show").click(function(){
            $("#title").val("");
            $("#keyword").val("");
            $("#desc").val("");
            $("#ad_add").slideToggle();
        });
       
        //关闭添加
        $("#ad_add_hidden").click(function(){
            $("#ad_add").slideUp();
        });
       
        //刷新本页
        $("#ad_refresh").click(function(){
            window.location.reload()
        });
       
    });
</script>