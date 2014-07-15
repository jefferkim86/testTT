<?php /* Smarty version Smarty-3.0.6, created on 2012-12-22 00:00:51
         compiled from "tplv2\customize.html" */ ?>
<?php /*%%SmartyHeaderCode:519650d487b3019fa6-19048904%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '761175820c74c5d454fddaf50dc983894975b376' => 
    array (
      0 => 'tplv2\\customize.html',
      1 => 1341154842,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '519650d487b3019fa6-19048904',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>个性设置</title>
<?php $_template = new Smarty_Internal_Template("require_js.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('custom','yes');$_template->assign('editor','yes'); echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<link rel="shortcut icon" href="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/image/favicon.ico" type="image/x-icon">
<link href="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/css/reset.css" rel="stylesheet" type="text/css">
<link href="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/css/frame.css" rel="stylesheet" type="text/css">

<script>
$(document).ready(function(){
 var jUpload=$('#upload_photo input');
		jUpload.mousedown().change(function(){
			var $this=$(this),sExt=$this.attr('ext'),$prev=$this.prev();
			if($this.val().match(new RegExp('\.('+sExt.replace(/,/g,'|')+')$','i'))){
				$('#uploading').toggle();
				var upload=new textbody.html4Upload(this,urlpath+'/index.php?c=user&a=upavatar',function(sText){
					$('#uploading').toggle();
					var data=Object,bOK=false;
				
					try{data=eval('('+sText+')');}catch(ex){alert(sText)};
					if(!data.err){
						tips('头像更新成功,刷新后即可查看最新头像');
						
					}else{
						tips(data.err);
					}
				});
				
				upload.start();
			}
			else alert('请上传'+sExt+'格式文件');
		});
	 })
</script>

</head>

<body>
<form id="form1" name="form1" method="post" action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'customize','a'=>'previewcss'),$_smarty_tpl);?>
" enctype="multipart/form-data">
<div class="customizeTool">
	<div class="menu">
        <a href="javascript:void(0)" onclick="slideToggle('b_info_con',this)" class="current">博客信息</a>
		<a href="javascript:void(0)" onclick="slideToggle('b_theme_con',this)">模板选择</a>
        <a href="javascript:void(0)" onclick="slideToggle('b_themes_con',this)">专属模板</a>
        <a href="javascript:void(0)" onclick="slideToggle('b_custom_con',this)">自定义主题设置</a>
	</div>
	<div class="savebutton">
		<a href="javascript:void(0)" onclick="CannlConfig('<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'customize','a'=>'cal'),$_smarty_tpl);?>
')" class="btn_close">取消</a>
		<a href="javascript:void(0)" onclick="saveConfig('<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'customize','a'=>'savetheme'),$_smarty_tpl);?>
')" class="btn_save">保存</a>
	</div>
	
	<!--博客信息-->
	<div class="blog_info" id="b_info_con">
	    <div class="corner"></div>
		<div class="title">博客头像</div>
		<div class="set_avatar">
		    <div class="set_upload">
		        <div class="uploadBtn" id="upload_photo"><span></span>
			        <input type="file" size="1" name="filedata" ext="jpg|jpeg|png" />
				</div>
				
				<div id="uploading" style="display:none">正在上传...</div>
		    </div>
		    <div class="head_img">
			    <img name="" src="<?php echo avatar(array('uid'=>$_SESSION['uid'],'size'=>'middle','time'=>1),$_smarty_tpl);?>
" alt="当前头像"  />
			</div>
		    <div class="clear"></div>
		</div>
		<div class="title_d">博客昵称</div>
		<div class="set_name">
		     <input type="text" name="user[niname]" id="niname" class="iptni"  value="<?php echo $_smarty_tpl->getVariable('user')->value['user']['username'];?>
">
		</div>
		<div class="title_d">个性签名</div>
		<div class="set_info">
		    <textarea name="user[textarea]" id="textarea" style="width:100%;height:123px" ><?php echo $_smarty_tpl->getVariable('user')->value['user']['sign'];?>
</textarea>
		</div>
		<?php if ($_smarty_tpl->getVariable('skin_config')->value['page_limit']){?>
		<div class="set_info">
		    <span>每页文章数量:</span>
			<select name="setup[page_limit]">
				<?php echo theme_page_limit(array('num'=>30,'default'=>$_SESSION['customize']['setup']['page_limit']),$_smarty_tpl);?>

			</select>
		</div>
	    <?php }?>
	</div>
	
	<!--博客主题-->
	<div class="blog_theme b_common" id="b_theme_con" style="display:none">
	    <div class="corner"></div>
		<div class="theme_box">
			<?php if ($_SESSION['customize']['theme']!=''){?>
			<li><a href="javascript:void(0)" onclick="setThemeId('<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'customize','a'=>'preview','skinid'=>'default'),$_smarty_tpl);?>
',this)">
			<div class="t_bg"><img src="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/theme/default/cover.jpg"  width="200" height="120" /></div></a>
			<h2>云边默认</h2>
			</li> 
			<?php }?>
		
			<?php  $_smarty_tpl->tpl_vars['d'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('skins')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['d']->key => $_smarty_tpl->tpl_vars['d']->value){
?>
				
				<li><a href="javascript:void(0)" onclick="setThemeId('<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'customize','a'=>'preview','skinid'=>$_smarty_tpl->tpl_vars['d']->value['id']),$_smarty_tpl);?>
',this)" <?php if ($_SESSION['customize']['theme']==$_smarty_tpl->tpl_vars['d']->value['skindir']){?>class="current"<?php }?>>
			 <div class="t_bg"><img src="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/theme/<?php echo $_smarty_tpl->tpl_vars['d']->value['skindir'];?>
/cover.jpg"  width="200" height="120" /></div></a>
			 <h2><?php echo $_smarty_tpl->tpl_vars['d']->value['name'];?>
<?php if ($_smarty_tpl->tpl_vars['d']->value['usernumber']>10){?>(<?php echo $_smarty_tpl->tpl_vars['d']->value['usenumber'];?>
)<?php }?></h2>
			 </li> 

			<?php }} else { ?>
			 <li><a href="javascript:void(0)"><div class="t_bg"><img src="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/theme/default/nocover.jpg"  width="200" height="120" /></div></a>
			 <h2>没有更多主题</h2>
			 </li> 
			<?php } ?>
		</div>
	
	</div>
	
	<!--博客专属主题-->
	<div class="blog_theme b_special" id="b_themes_con" style="display:none">
	    <div class="corner"></div>
		<div class="theme_box">
			<?php  $_smarty_tpl->tpl_vars['d'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('exclu_skins')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['d']->key => $_smarty_tpl->tpl_vars['d']->value){
?>
			 <li><a href="javascript:void(0)" onclick="setThemeId('<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'customize','a'=>'preview','skinid'=>$_smarty_tpl->tpl_vars['d']->value['id']),$_smarty_tpl);?>
')" class="current">
			 <div class="t_bg"><img src="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/theme/<?php echo $_smarty_tpl->tpl_vars['d']->value['skindir'];?>
/cover.jpg"  width="200" height="120" /></div></a>
			 <h2><?php echo $_smarty_tpl->tpl_vars['d']->value['name'];?>
<?php if ($_smarty_tpl->tpl_vars['d']->value['usernumber']>10){?>(<?php echo $_smarty_tpl->tpl_vars['d']->value['usenumber'];?>
)<?php }?></h2>
			 </li> 

			<?php }} else { ?>
			 <li><a href="javascript:void(0)"><div class="t_bg"><img src="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/theme/default/nocover.jpg"  width="200" height="120" /></div></a>
			 <h2>没有专属主题</h2>
			 </li> 
			<?php } ?>

		</div>
	
	</div>
	
	<!--博客自定义设置-->

	<div class="blog_custom"  id="b_custom_con" style="display:none">
	    <div class="corner"></div>

		<?php  $_smarty_tpl->tpl_vars['d'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('setting')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['d']->key => $_smarty_tpl->tpl_vars['d']->value){
?>
		<div class="set_custom">
		    <div class="custom_title" title="<?php echo $_smarty_tpl->tpl_vars['d']->value['description'];?>
"><?php echo $_smarty_tpl->tpl_vars['d']->value['title'];?>
</div>
			<?php echo themecustom(array('type'=>$_smarty_tpl->tpl_vars['d']->value['type'],'data'=>$_smarty_tpl->tpl_vars['d']->value['options'],'id'=>$_smarty_tpl->tpl_vars['d']->value['id'],'lable'=>$_smarty_tpl->tpl_vars['d']->value['findid'],'default'=>$_smarty_tpl->tpl_vars['d']->value['default'],'formvalue'=>$_SESSION['customize']['config']),$_smarty_tpl);?>

			<div class="clear"></div>
		</div>
		<?php }} ?>
			
		<div class="set_button">
			<input type="submit" name="submit" id="submit" value="预览" class="preview"/>
			<input type="button" value="默认设置" class="default" onclick="customDefault('<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'customize','a'=>'customdefault'),$_smarty_tpl);?>
')"/>
		</div>
	</div>

</div>
</form>

<iframe width="100%" frameborder="0" name="previewIframe" id="previewIframe" src="<?php echo goUserHome(array('uid'=>$_SESSION['uid']),$_smarty_tpl);?>
"></iframe>
<script type="text/javascript">
window.setInterval("reinitIframe()", 100);
</script>
</body>
</html>
