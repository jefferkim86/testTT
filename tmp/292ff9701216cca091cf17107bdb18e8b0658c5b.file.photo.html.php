<?php /* Smarty version Smarty-3.0.6, created on 2014-07-30 00:31:32
         compiled from "tplv2/models/photo.html" */ ?>
<?php /*%%SmartyHeaderCode:16231387853d7cc64457913-82410945%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '292ff9701216cca091cf17107bdb18e8b0658c5b' => 
    array (
      0 => 'tplv2/models/photo.html',
      1 => 1406651481,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16231387853d7cc64457913-82410945',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("require_header.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('addcss','yes');$_template->assign('editor','yes'); echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<script> 
var swfpath = '<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
'; 
var bid     = '<?php echo $_smarty_tpl->getVariable('blog')->value['bid'];?>
';
var ssid    = '<?php echo session_id();?>
';
var num     = '<?php echo $_smarty_tpl->getVariable('tpl_config')->value['imagecount'];?>
';
var filext  = '<?php echo $_smarty_tpl->getVariable('imagetype')->value;?>
';
var size    = '<?php echo $_smarty_tpl->getVariable('tpl_config')->value['imagesize'];?>
';
</script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/models/js/swfupload.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/models/js/multiupload.js"></script>

<script type="text/javascript">
$(document).ready(function(){

		$.isChange.Set("#title,#textarea",function(){
			return $("#uploadArea .attach_img").size()>0;
		});
		$.isChange.unSet("#form1");
})
</script>

<div id="index">
<form action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'post','a'=>'saved','model'=>$_smarty_tpl->getVariable('mid')->value),$_smarty_tpl);?>
" id="form1" method="post">
    
	
	<div id="article" class="photo">
	    <div id="box">
			<div id="post_area">
			
			    <div id="uploadArea">
				<?php if (is_array($_smarty_tpl->getVariable('attach')->value)){?>
				    <?php  $_smarty_tpl->tpl_vars['d'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('attach')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['d']->key => $_smarty_tpl->tpl_vars['d']->value){
?>
				    <?php if ($_smarty_tpl->tpl_vars['d']->value['mime']=='jpg'||$_smarty_tpl->tpl_vars['d']->value['mime']=='png'||$_smarty_tpl->tpl_vars['d']->value['mime']=='gif'||$_smarty_tpl->tpl_vars['d']->value['mime']=='bmp'){?>
				    <div id="attach_<?php echo $_smarty_tpl->tpl_vars['d']->value['id'];?>
" class="attach_img">
					    <img src="<?php echo $_smarty_tpl->getVariable('url')->value;?>
/<?php echo thubimg(array('path'=>$_smarty_tpl->tpl_vars['d']->value['path']),$_smarty_tpl);?>
"/>
					    <textarea name="localimg[<?php echo $_smarty_tpl->tpl_vars['d']->value['id'];?>
][<?php echo thubimg(array('path'=>$_smarty_tpl->tpl_vars['d']->value['path']),$_smarty_tpl);?>
]" onblur=""><?php echo $_smarty_tpl->tpl_vars['d']->value['blogdesc'];?>
</textarea>
					    <a href="javascript:void(0)" onclick="delAttachIMAGE('<?php echo $_smarty_tpl->tpl_vars['d']->value['id'];?>
')" class="delete">remove</a>
						<div class="clear"></div>
					</div>
					<?php }?>
					<?php }} ?>
				<?php }?>
				</div>
				
				<div id="listArea" bid="<?php echo $_smarty_tpl->getVariable('tempid')->value;?>
"  ssid="<?php echo session_id();?>
">
				    <div id="controlBtns" style="display:none;">
					    <a href="javascript:void(0);" id="btnClear" onclick="removeFile();" class="btn" style="display:none;">
						    <span><img src="<?php echo $_smarty_tpl->getVariable('url')->value;?>
/tpl/image/add/clear.gif" />删除文件</span>
						</a>
						<a href="javascript:void(0);" id="btnStart" onclick="startUploadFiles();" class="btn"><span>开始上传</span></a>
					</div>
					<table width="100%" border="0" cellpadding="0" cellspacing="0">
					    <tbody id="listBody"></tbody>
					</table>
				</div>
				
				<div id="progressArea">
				    <div id="progressBar"><div id="progress" style="width:1px;"></div></div>
				</div>
				
				<div class="upimgBar">
				    <div id="divAddFiles"><div id="fileButton"></div></div>
					<div id="upimgText">
					    <div class="upimg_corner"></div>
					    按住Shift多选, 您可以上传 <font><?php echo $_smarty_tpl->getVariable('tpl_config')->value['imagetype'];?>
</font> , 每张不超过 <font><?php echo formatBytes(array('size'=>$_smarty_tpl->getVariable('tpl_config')->value['imagesize']*1024),$_smarty_tpl);?>
</font> , 最多发布 <font><?php echo $_smarty_tpl->getVariable('tpl_config')->value['imagecount'];?>
张</font> 
					</div>
					<div class="clear"></div>
				</div>
			
			    <div class="p_area">
				    <input type="text" name="title" id="title" class="pub-url input" tabindex="1" value="<?php echo $_smarty_tpl->getVariable('blog')->value['title'];?>
">
				</div>
				
				<div class="p_area">
					<textarea name="textarea" id="textarea" style="width:820px"><?php echo $_smarty_tpl->getVariable('body')->value['body'];?>
</textarea>
                    <input type="hidden" name="tag" id="tag" value="" />
                    <input type="hidden" name="id" value="<?php echo $_smarty_tpl->getVariable('blog')->value['bid'];?>
" />
				
				</div>

				

				<div class="tags clearfix" id="tags">
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
					    <a href="#" id="submit" class="btn" type="photo">发布</a>
						<a href="#" id="preview" class="btn">预览</a>
						<a href="#" id="cancel" class="btn">取消</a>
						<span style="display:none;" id="pb-submiting-tip">正在保存</span>
					</div>
                    
				</div>



				
				
			</div>
	    </div>
	</div>
</form>
</div>

<?php $_template = new Smarty_Internal_Template("require_pubfooter.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
