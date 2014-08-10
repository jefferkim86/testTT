<?php /* Smarty version Smarty-3.0.6, created on 2014-08-10 15:29:47
         compiled from "tplv2/models/word.html" */ ?>
<?php /*%%SmartyHeaderCode:180592256153e71f6b71bb37-51254587%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e7c6a44d39e063218c03017c0a48cc033d225377' => 
    array (
      0 => 'tplv2/models/word.html',
      1 => 1407655785,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '180592256153e71f6b71bb37-51254587',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include '/Users/jinjianfeng/Documents/work/tuitui/init/Drivers/Smarty/plugins/modifier.date_format.php';
?><?php $_template = new Smarty_Internal_Template("require_header.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('addcss','yes');$_template->assign('editor','yes');$_template->assign('titlepre',"发布文字 - ".($_SESSION['tempid'])); echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>


<div id="publishWord">
<form action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'post','a'=>'saved','model'=>$_smarty_tpl->getVariable('mid')->value),$_smarty_tpl);?>
" id="form1" method="post">
    
    
	<div id="article">
	    <div id="box">
	        <h2>发文章</h2>
			<div id="post_area">
				<h3 class="title-t">标题<span>（可不填）</span></h3>
			    <div class="p_area">
				    <input type="text" name="title" id="title" class="J-pubWordTitle pub-url" tabindex="1" value="">
				</div>
				<h3 class="title-t">正文<span></span></h3>
				<div class="p_area">
					
					<div id="textareaEditor" style="width:820px;height:200px;">
						
					</div>
					<textarea name="textarea" id="textarea" style="display:none"><?php echo $_smarty_tpl->getVariable('body')->value['body'];?>
</textarea>

					<input type="hidden" id="attach" name="attach"/>
				
				</div>
				
				<?php if (is_array($_smarty_tpl->getVariable('attach')->value)){?>
				<div class="p_area">
				    <div id="media_lib">
					    <h3 class="title">我的媒体库<span>（您可以插入上次未发布的媒体文件）</span></h3>
						<table border="0" width="100%" align="center" cellpadding="0" cellspacing="0" class="globox">
						    <tr>
							    <th width="30">ID</th>
								<th>名称</th>
								<th width="60">大小</th>
								<th width="40">类型</th>
								<th width="140">上传时间</th>
								<th width="100">操作</th>
							</tr>
							<?php  $_smarty_tpl->tpl_vars['d'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('attach')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['d']->key => $_smarty_tpl->tpl_vars['d']->value){
?>
							<tr class="trg" id="attach_<?php echo $_smarty_tpl->tpl_vars['d']->value['id'];?>
">
							    <td><?php echo $_smarty_tpl->tpl_vars['d']->value['id'];?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['d']->value['blogdesc'];?>
</td>
								<td><?php echo formatBytes(array('size'=>$_smarty_tpl->tpl_vars['d']->value['filesize']),$_smarty_tpl);?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['d']->value['mime'];?>
</td>
								<td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['d']->value['time'],"%Y/%m/%d %H:%M");?>
</td>
								<td><a href="javascript:void(0)" onclick="<?php echo attach_insert(array('file'=>$_smarty_tpl->tpl_vars['d']->value['path'],'name'=>$_smarty_tpl->tpl_vars['d']->value['blogdesc'],'id'=>$_smarty_tpl->tpl_vars['d']->value['id']),$_smarty_tpl);?>
">插入</a>/<a href="javascript:void(0)" onclick="delAttach('<?php echo $_smarty_tpl->tpl_vars['d']->value['id'];?>
')">删除</a></td>
							</tr>
							<?php }} ?>
						</table>
					</div>
				</div>
				<?php }?>
				<div class="tags clearfix" id="tags" style="display:none;">
					<label>标签（可不选）</label>
					<ul class="tag-list">
						<li tagVal="晒单">晒单</li>
						<li tagVal="二手">二手</li>
						<li tagVal="代购">代购</li>
						<li tagVal="团购">团购</li>
						<li tagVal="购物经验">购物经验</li>
					</ul>
					<input type="hidden" name="tag" value="" id="J-tagVal"/>
				</div>
				<hr/>

				<div class="p_area">
				    <div id="pb-action-holder">
					    <a href="#" id="submit" class="btn" type="word">发布</a>
						<!-- <a href="#" id="preview" class="btn">预览</a> -->
						<a href="#" id="cancel" class="btn">取消</a>
						<span style="display:none;" id="pb-submiting-tip">正在保存</span>
					</div>
				</div>
                <input type="hidden" name="id" value="<?php echo $_smarty_tpl->getVariable('blog')->value['bid'];?>
" />
				
				
			</div>
	    </div>
	
	</div>
</form>
</div>
<script type="text/javascript">

window.ueditorInstance = UE.getEditor('textareaEditor');


$("#preview").click(function() {
	window.ueditorInstance.execCommand("Preview")
});
$(window).on("beforeunload", function() {
	if($("#title").val() != '' || window.ueditorInstance.getContent() != ''){
   		return "你还有没保存的数据.要退出吗";
    }
});
</script>

<?php $_template = new Smarty_Internal_Template("require_pubfooter.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
