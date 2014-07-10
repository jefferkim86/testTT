<?php /* Smarty version Smarty-3.0.6, created on 2012-12-22 00:00:31
         compiled from "tplv2\models/word.html" */ ?>
<?php /*%%SmartyHeaderCode:1221050d4879f1f7f90-73076737%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9b8c2833368fc98a0e0730cba3a37d36b7f36f99' => 
    array (
      0 => 'tplv2\\models/word.html',
      1 => 1341154844,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1221050d4879f1f7f90-73076737',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'E:\PDENV\data\yunbian.tt\init\Drivers\Smarty\plugins\modifier.date_format.php';
?><?php $_template = new Smarty_Internal_Template("require_header.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('addcss','yes');$_template->assign('editor','yes');$_template->assign('titlepre',"发布文字 - ".($_SESSION['tempid'])); echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

<script>
$(document).ready(function(){
	   	var jUpload=$('#upload_img input');
		jUpload.mousedown(function(){textbody.saveBookmark();}).change(function(){
			var $this=$(this),sExt=$this.attr('ext'),$prev=$this.prev();
			if($this.val().match(new RegExp('\.('+sExt.replace(/,/g,'|')+')$','i'))){
				$('#submit,#preview,#cancel,#pb-submiting-tip,#uploading,#upload_img').toggle();
				var upload=new textbody.html4Upload(this,urlpath+'/index.php?c=post&a=uploadimg&model=1',function(sText){
					$('#submit,#preview,#cancel,#pb-submiting-tip,#uploading,#upload_img').toggle();
					var data=Object,bOK=false;
				
					try{data=eval('('+sText+')');}catch(ex){alert(sText)};
					if(!data.err){
						textbody.loadBookmark();
						var urls = data.msg.url.split('||');
						if(urls.length ==2)
						{
							if($('#blog-types').val() == 1){$('#attach').val(urls[0]);}
							textbody.pasteHTML('<a href="'+urls[1]+'"><img src="'+urls[0]+'" class="feedimg" /></a>');
						}else{
							if($('#blog-types').val() == 1){$('#attach').val(data.msg.url);}
							textbody.pasteHTML('<img src="'+data.msg.url+'" class="feedimg" />');
						}
						
					}else{
						alert(data.err);	
					}
				});
				upload.start();
			}
			else alert('请上传'+sExt+'格式文件');
		});
		
	   
	   /*发布text*/
	   $('#submit').click(function(){
			
			var title = $('#title').val(); 
			var text = $('#textarea').val();
			if(text == ''){tips('内容不能为空喔'); $('#textarea').focus();return false}
			setTags();
			$('#submit,#preview,#cancel,#pb-submiting-tip').toggle();
			$('#form1').submit();
		});	
		// 离开页面前提示
		$.isChange.Set("#title,#textarea");
		$.isChange.unSet("#form1");

});
</script>


<div id="index">
<form action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'post','a'=>'saved','model'=>$_smarty_tpl->getVariable('mid')->value),$_smarty_tpl);?>
" id="form1" method="post">
    <div id="aside">
	    <div id="aside_box">
		    <div class="aside_area">
				<?php $_template = new Smarty_Internal_Template("models/aside.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?> 
			</div>
		</div>
	</div>
    
	<div id="article">
	    <div id="box">
	        <h2>分享文字</h2>
			<div id="post_area">
			
			    <div class="p_area">
			        <h3>标题<span>（可不填）</span></h3>
				    <input type="text" name="title" id="title" class="input" tabindex="1" value="<?php echo $_smarty_tpl->getVariable('blog')->value['title'];?>
">
				</div>
				
				<div class="p_area">
				    <h3 class="title">内容</h3>
					<?php if ($_smarty_tpl->getVariable('tpl_config')->value['imguplod']!=0){?>
					<div id="uploadpic">
					    <span id="upload_bar">
						    <div class="uploadBtn" id="upload_img"><span>上传图片</span>
							<input type="file" size="1" name="filedata" ext="<?php if ($_smarty_tpl->getVariable('tpl_config')->value['imagetype']){?><?php echo $_smarty_tpl->getVariable('tpl_config')->value['imagetype'];?>
<?php }else{ ?><?php echo $_smarty_tpl->getVariable('yb')->value['addimg_type'];?>
<?php }?>" />
							</div>
						</span>
						<span id="uploading" style="display:none">正在上传...</span>
					</div>
					<?php }?>
					<textarea name="textarea" id="textarea" style="width:600px"><?php echo $_smarty_tpl->getVariable('body')->value['body'];?>
</textarea>
				
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
				
				<div class="p_area">
				    <div id="pb-action-holder">
				    <a id="submit"><span>发布</span></a>
					<a id="preview">预览</a>
					<a id="cancel">取消</a>
					<span style="display:none;" id="pb-submiting-tip">正在处理...</span>
					</div>
				</div>
                <input type="hidden" name="id" value="<?php echo $_smarty_tpl->getVariable('blog')->value['bid'];?>
" />
                <input type="hidden" name="tag" id="tag" value="" />
				
				
			</div>
	    </div>
	
	</div>
</form>
</div>

<?php $_template = new Smarty_Internal_Template("require_footer.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
