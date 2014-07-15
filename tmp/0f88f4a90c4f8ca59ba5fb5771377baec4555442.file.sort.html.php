<?php /* Smarty version Smarty-3.0.6, created on 2012-12-22 03:07:36
         compiled from "tplv2\admin/sort.html" */ ?>
<?php /*%%SmartyHeaderCode:814750d4b3782de627-58597766%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0f88f4a90c4f8ca59ba5fb5771377baec4555442' => 
    array (
      0 => 'tplv2\\admin/sort.html',
      1 => 1356115442,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '814750d4b3782de627-58597766',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template('admin/header.html', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
  <div id="content">

    
 <h2>主题分类管理</h2>
    <div id="setup">
    </div>
    
	  <div class="nav"><?php echo $_smarty_tpl->getVariable('pager')->value;?>
</div>
  
	   <table width="90%" border="1" align="center" class="table2">
    <tr>

        <th width="130" height="30" align="center" valign="middle">显示顺序</th>
         <th width="220" align="center" valign="middle">分类名称</th>
        <th width="" align="center" valign="middle">操作</th>
      </tr>
    <?php  $_smarty_tpl->tpl_vars['list'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('sort')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['list']->key => $_smarty_tpl->tpl_vars['list']->value){
?>
    <tr>
      <td ><input type="text" name="order<?php echo $_smarty_tpl->tpl_vars['list']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['list']->value['order'];?>
" class="order" /></td>
      <td valign="middle"><a href="javascript:void(0)" fid="<?php echo $_smarty_tpl->tpl_vars['list']->value['id'];?>
" class="ud" title="点击修改"><?php echo $_smarty_tpl->tpl_vars['list']->value['typename'];?>
</a></td>
      <td align="center">
		
		<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'admin','a'=>'sort','mod'=>'del','id'=>$_smarty_tpl->tpl_vars['list']->value['id']),$_smarty_tpl);?>
" class="del" onclick="return confirm('您确定要删除这个栏目么？');">删除</a>
	</td>
    </tr>
    <?php echo $_smarty_tpl->getVariable('son')->value->get_son_channel($_smarty_tpl->tpl_vars['list']->value['id']);?>

    <tr>
    	<td></td>
    	<td style="padding-left:30px;"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'admin','a'=>'sort','mod'=>'add','fid'=>$_smarty_tpl->tpl_vars['list']->value['id']),$_smarty_tpl);?>
" onclick="return false" style="color:#CC6600;" class="son" fid="<?php echo $_smarty_tpl->tpl_vars['list']->value['id'];?>
">┕&nbsp;&nbsp;添加二级子分类</a></td>
    	<td></td>
    </tr>
    <?php }} ?>
    <tr>
    	<td></td>
    	<td style="padding-left:0px;"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'admin','a'=>'sort','mod'=>'add','fid'=>0),$_smarty_tpl);?>
" class="father" fid="0" onclick="return false" style="color:#CC6600;">┕&nbsp;&nbsp;添加主分类</a></td>
    	<td></td>
    </tr>
    </table>
    

    
    <div class="nav"><?php echo $_smarty_tpl->getVariable('pager')->value;?>
</div>
    
    
    
   
  </div>
<?php $_template = new Smarty_Internal_Template('admin/footer.html', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<script>
$('.son').click(function(){
	var fid = $(this).attr('fid');
	$(this).parent().parent().before('<tr id="t'+fid+'"><td  style="padding-left:20px;" valign="middle"><input type="text" name="order'+fid+'" value="" class="order" id="order'+fid+'" /></td><td style="padding-left:30px;">┕&nbsp;&nbsp;<input type="text" name="typename'+fid+'" id="typename'+fid+'" /></td><td valign="middle"><input type="submit" value="添加" onclick="add('+fid+')" style="width:60px;" /></td></tr>');
})
$('.father').click(function(){
	var fid = $(this).attr('fid');
	$(this).parent().parent().before('<tr id="t'+fid+'"><td valign="middle"><input type="text" name="order'+fid+'" value="" class="order" id="order'+fid+'" /></td><td><input type="text" name="typename'+fid+'" id="typename'+fid+'" /></td><td valign="middle"><input type="submit" value="添加" onclick="add('+fid+')" style="width:60px;" /></td></tr>');
})

function add(fid)
{
	var order = $('#order'+fid).val();
	var typename = $('#typename'+fid).val();
	$.post('index.php?c=admin&a=sort&do=add',{order:order,typename:typename,fid:fid,k:Math.random()},function(data){
			if(data !== 0)
			{
				if(fid!=0)$('#t'+fid).html(' <td style="padding-left:20px;"><input type="text" name="order'+data+'" value="'+order+'" class="order" /></td><td valign="middle" style="padding-left:30px;"><a href="javascript:void(0)" title="点击修改" class="ud" fid='+data+'>┕&nbsp;&nbsp;'+typename+'</a></td><td align="center"><a href="index.php?c=admin&a=sort&mod=show&id='+data+'" class="show" target="_blank">预览</a><a href="index.php?c=admin&a=sort&mod=edit&id='+data+'" class="edit">编辑</a><a href="index.php?c=admin&a=sort&mod=del&id='+data+'" class="del" onclick="return confirm(\'您确定要删除这个栏目么？\');">删除</a></td>')
				else $('#t'+fid).html(' <td><input type="text" name="order'+data+'" value="'+order+'" class="order" /></td><td valign="middle"><a href="javascript:void(0)" title="点击修改" class="ud" fid='+data+'>'+typename+'</a></td><td align="center"><a href="index.php?c=admin&a=sort&mod=show&id='+data+'" class="show" target="_blank">预览</a><a href="index.php?c=admin&a=sort&mod=edit&id='+data+'" class="edit">编辑</a><a href="index.php?c=admin&a=sort&mod=del&id='+data+'" class="del" onclick="return confirm(\'您确定要删除这个栏目么？\');">删除</a></td>')
				location.reload();
			}
		})
}

$(function(){
	$('.tableven').css('background-color','#FFFFFF');
	$('.table2 tr td input[type=text]').css('border','1px solid #7F9DB9');
	$('.table2 tr td input[type=text]').css('text-align','center');
})
function update(value,id,obj){
	if(value.match(/^\s*$/))
	{
		alert('栏目名称不能为空');
		return false;
	}	
	$.post('index.php?c=admin&a=sort&mod=edit',{typename:value,id:id},function(r){
		if(r==1)
		{
			v = '<a href="javascript:void(0)" fid="'+id+'" class="ud" title="点击修改">'+value+'</a>';
			$('input[class=upd]').parent().html(v);
		}
	})
}
$('.ud').click(function(){
	var id = $(this).attr('fid');
	var con = $(this).text();
	$(this).parent().html('<input type="text" name="typename" value="'+con+'" class="upd" onblur=update(this.value,'+id+',this) />');
	$('.upd').focus();
})


</script>