<?php /* Smarty version Smarty-3.0.6, created on 2012-12-22 00:03:21
         compiled from "tplv2\models/video.html" */ ?>
<?php /*%%SmartyHeaderCode:2877850d48849438290-06821014%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '849a9faa3b9b45a7d83e6286783e2db95670f94c' => 
    array (
      0 => 'tplv2\\models/video.html',
      1 => 1341154844,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2877850d48849438290-06821014',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'E:\PDENV\data\yunbian.tt\init\Drivers\Smarty\plugins\modifier.date_format.php';
?><?php $_template = new Smarty_Internal_Template("require_header.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('addcss','yes');$_template->assign('editor','yes');$_template->assign('titlepre',"分享视频"); echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>


<script type="text/javascript">
$(document).ready(function(){
	$.isChange.Set("#title,#textarea",function(){
		if($("#musicurl").val()!="http://"){return true;}
	});
	$.isChange.unSet("#form1");
	
	 /*发布music*/
	$('#submit').click(function(){
		  var umus = '';//获取发布音乐字符串
		  $('#musicList .list').each(function(){ umus  += $(this).attr('data')+'[YB]';  }) //获取音乐字串
		  		if(umus ==''){
					waring('发布列表为空');return false; 
				}
				$('#urlmusic').val(umus); //写入数据
				$('#submit,#draft,#preview,#cancel,#pb-submiting-tip').toggle();
				$('#form1').submit();
	});
	  
	if($('#attr').val() != ''){
		var edit = eval( $('#attr').val() );
		if(edit.length > 0){
			for(var i=0;i<edit.length;i++){
				setHTML(edit[i]);
			}
		}
	}
});

/*判断添加网络音乐的mouseover事件*/
function musicMouse(thisa){ if($(thisa).val() == 'http://'){$(thisa).val('');}	}
/*判断添加网络音乐的mouseout的事件*/
function musicMosout(thisa,t)
{
	if($(thisa).val() == '' && t=='u'){$(thisa).val('http://');}
}

/*保存一个条目*/
function saveMusicList()
{
	var url = $('#musicurl').val();
	if(url == 'http://'){ tips('请填写一个引用地址');	return false;}
	
	$('#musicFrom').disable();$('#urlParseLoading').val('正在解析...');
	$.post(urlpath+'/index.php?c=post&a=links&type=video&model=3',{'url':url},function(result){ 
																	 // alert(result);
		$('#musicFrom').enable();$('#urlParseLoading').val('添加地址');
		var data = eval("(" + result + ")");
		if(data.error != undefined){ tips(data.error);return false;}
		data.url = url;
		temp=data.title.split("-");
		if(temp[0] != undefined){
			data.title = temp[0];
		}

		setHTML(data);
		$('#title').val(data.title);
		$('#musicurl').val('http://');
	})
}

function setHTML(r){
	console.log(r);
	if(r.id == undefined) r.id = r.pid; //兼容
	html = '<div class="list" data="'+r.type+'|'+r.img+'|'+r.id+'|'+r.title+'|'+r.url+'">'+
				'<li><img src="'+r.img+'" /></li>';
	html +=	 '<li><input type="text" class="m_title" name="item[]" value="'+r.title+'" size="60"></li>';
	html += '<div class="delete"><a href="javascript:void(0)" onclick="musicDItem(this)">x</a></div>'+
			'<div class="clear"></div></div>';
	$('#musicList').append(html);
}

/*删除音乐发布的一个条目 DOM*/
function musicDItem(that){$(that).parent().parent().remove();}

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
	        <h2>分享视频</h2>
			<div id="post_area">
			    <div id="musicFrom" class="p_video">
				    <div id="musicNotice">请输入来自优酷/土豆/酷六/56/搜狐/新浪视频网站的播放页面地址,注意不是FLASH地址</div>
					<input type="text"  id="musicurl" class="musicurl"   value="http://" onfocus="musicMouse(this)" onblur="musicMosout(this,'u')" >
					<input type="button" id="urlParseLoading" value="保存" onclick="saveMusicList($('#musicurl').val())" class="mu_btn">
				</div>
				<div id="localMusic"></div>
				
                <div id="musicList"></div>

			
			    <div class="p_area">
			        <h3>标题<span>（可不填）</span></h3>
				    <input type="text" name="title" id="title" class="input" tabindex="1" value="<?php echo $_smarty_tpl->getVariable('blog')->value['title'];?>
">
				</div>
				
				<div class="p_area">
				    <h3 class="title">内容<span>（可不填）</span></h3>
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
					<textarea name="textarea" id="textarea" style="width:600px"><?php echo $_smarty_tpl->getVariable('body')->value['content'];?>
</textarea>
                    <input type="hidden" name="tag" id="tag" value="" />
                    <input type="hidden" name="id" value="<?php echo $_smarty_tpl->getVariable('blog')->value['bid'];?>
" />
					<input type="hidden" name="attr" id="attr" value='<?php echo $_smarty_tpl->getVariable('attr')->value;?>
' /> 
					<input type="hidden" name="urlmusic" id="urlmusic" />
				
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
					<span style="display:none;" id="pb-submiting-tip">正在保存</span>
					</div>
				</div>
                
				
				
			</div>
	    </div>
	
	</div>
</form>
</div>

<?php $_template = new Smarty_Internal_Template("require_footer.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
