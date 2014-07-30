<?php /* Smarty version Smarty-3.0.6, created on 2014-07-30 13:31:40
         compiled from "tplv2/models/product.html" */ ?>
<?php /*%%SmartyHeaderCode:55143407953d8833ca7e273-55450309%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '72975a5995ca04dfccd936e58f59031fcf816404' => 
    array (
      0 => 'tplv2/models/product.html',
      1 => 1406698016,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '55143407953d8833ca7e273-55450309',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include '/Users/jinjianfeng/Documents/work/tuitui/init/Drivers/Smarty/plugins/modifier.date_format.php';
?><?php $_template = new Smarty_Internal_Template("require_header.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('addcss','yes');$_template->assign('editor','yes');$_template->assign('titlepre',"分享宝贝"); echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<script> 
var swfpath = '<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
'; 
var ssid    = '<?php echo session_id();?>
';
var bid     = '';
var num     = '20';
var filext  = '*.jpg;*.jpge;*.png;*.gif';
var size    = '20480';

</script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/models/js/swfupload.js"></script>
<script type="text/javascript">
	
$(document).ready(function(){
		$.isChange.Set("#producturl,#textarea");
		$.isChange.unSet("#form1");
})
</script>
<div id="publishGood">
<form action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'post','a'=>'saved','model'=>$_smarty_tpl->getVariable('mid')->value),$_smarty_tpl);?>
" id="form1" method="post">
	<div id="article">
	    <div id="box" class="pub-good">
	        <h2>发布宝贝</h2>
			<div id="post_area">
				<div class="p_product">
					<input type="text" name="producturl" id="producturl" class="pub-url producturl"   value="请输入宝贝链接（目前支持淘宝、天猫的宝贝链接）" />
				</div>
				<div id="goodInfoBlock"></div>
				
				<div style="display:none">
					<input type="hidden" value="" name="title" id="J_title"/>
					<input type="hidden" value="" name="price" id="J_price"/>
					<input type="hidden" value="" name="oprice" id="J_oprice"/>
					<input type="hidden" value="" name="deliveryFees" id="J_deliveryFees"/>
					<input type="hidden" vlaue="" name="image" id="J_image"/>
				</div>
				
				<div class="p_area">
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
					<textarea name="textarea" id="textarea" style="width:820px"><?php echo $_smarty_tpl->getVariable('body')->value['content'];?>
</textarea>
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
					    <a href="#" id="submit" class="btn" type="product">发布</a>
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

<script type="template" id="J_GoodInfoTmp">
    <div class="feed-good feed-good-pub">
        <div class="pop-corner-desc"><s class="outter"></s><s class="inner"></s></div>
        <div class="feed-good-cont clearfix">
            <div class="feed-good-info">
                <div class="feed-good-img">
                    <img src="${image}" id="J_PicBox"/>
                 </span>
                </div>
                <div class="feed-good-property">
                    <h3 class="feed-good-title">${title}</h3>
                    <div class="feed-good-fee">
                        <ul>
                            {@if oprice}
                            <li class="oprice"><span>价格：</span>
                                <del>${oprice}</del>元
                            </li>{@/if}
                            {@if price}
                            <li class="price"><span>促销：</span>
                            <b>${price}元</b></li>{@/if}
                            {@if deliveryFees}
                            <li class="deliveryFees"><span>运费：${deliveryFees}</span>包邮</li>{@/if}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</script>

<script type="text/javascript">

// 	var ext='图像文件 (*.*)',useget=0;ext=getQuery('ext')||ext;
// 	size=getQuery('size')||size;
// 	useget=getQuery('useget')||useget;
// 	var tmpParams=getQuery('params');
// 	if(tmpParams)
// 	{
// 		try{eval("tmpParams=" + tmpParams);}catch(ex){};
// 		params=$.extend({},params,tmpParams);
// 	}
// 	ext=ext.match(/([^\(]+?)\s*\(\s*([^\)]+?)\s*\)/i);
    
// 	swfu = new SWFUpload({
// 		// Flash组件
// 		flash_url : swfpath+"/models/js/swfupload.swf",
// 		prevent_swf_caching : false,//是否缓存SWF文件
// 		// 服务器端
// 		upload_url: urlpath+'/index.php?c=post&a=uploadimg&model=3',
// 		file_post_name : "filedata",
// 		post_params: {'ssid':ssid,'bid':bid},//随文件上传一同向上传接收程序提交的Post数据
// 		use_query_string : useget=='1'?true:false,//是否用GET方式发送参数
// 		// 文件设置
// 		file_types:filext,
// 		file_types_description : ext[1],//文件格式描述
// 		file_size_limit : size,	// 文件大小限制
// 		file_upload_limit : num,//上传文件总数
// 		file_queue_limit:num,//上传队列总数
// 		custom_settings : {
// 			bid : bid,
// 			progressTarget : "fsUploadProgress",
// 			cancelButtonId : "btnCancel"
// 		},
			
// 		// 事件处理
// 		file_queued_handler : fileQueued,//添加成功
// 		file_queue_error_handler : fileQueueError,//添加失败
// 		upload_start_handler : uploadStart,//上传开始
// 		upload_progress_handler : uploadProgress,//上传进度
// 		upload_error_handler : uploadError,//上传失败
// 		upload_success_handler : uploadSuccess,//上传成功
// 		upload_complete_handler : uploadComplete,//上传结束

// 		// 按钮设置
// 		button_placeholder_id : "J_ChangPicBtn",
// 		button_width: 100,
// 		button_height:40,
// 		button_window_mode: SWFUpload.WINDOW_MODE.TRANSPARENT,
// 		button_cursor: SWFUpload.CURSOR.HAND,
// 		button_image_url : skinpath+"/image/comm/upload.png",
// 		// 调试设置
// 		debug: false
// 	});


// })
 
// function getQuery(item){var svalue = location.search.match(new RegExp('[\?\&]' + item + '=([^\&]*)(\&?)','i'));return svalue?decodeURIComponent(svalue[1]):'';}  
 
// var swfu,selQueue=[],selectID,arrMsg=[],allSize=0,uploadSize=0;
// function removeFile()
// {
// 	var file;
// 	if(!selectID)return;
// 	for(var i in selQueue)
// 	{
// 		file=selQueue[i];
// 		if(file.id==selectID)
// 		{
// 			selQueue.splice(i,1);
// 			allSize-=file.size;
// 			swfu.cancelUpload(file.id);
// 			$('#'+file.id).remove();
// 			selectID=null;
// 			break;
// 		}
// 	}
// 	$('#btnClear').hide();
// 	//if(selQueue.length==0)$('#controlBtns').hide();
// }
// function startUploadFiles()
// {
// 	if(swfu.getStats().files_queued>0)
// 	{
// 		//$('#controlBtns').hide();
// 		swfu.startUpload();
// 	}
// 	else alert('上传前请先添加文件');
// }
// function setFileState(fileid,txt)
// {
// 	$('#'+fileid+'_state').text(txt);
// }
// function fileQueued(file)//队列添加成功
// {
// 	$('#submit,#draft,#preview,#cancel').hide();
// 	$('#pb-submiting-tip').show();
// 	// for(var i in selQueue)if(selQueue[i].name==file.name){swfu.cancelUpload(file.id);return false;}//防止同名文件重复添加
// 	$('#listBody').append('<tr id="'+file.id+'"><td>'+file.name+'</td><td>'+formatBytes(file.size)+'</td><td id="'+file.id+'_state">就绪</td></tr>');
// 	//if(selQueue.length==0)$('#controlBtns').show();
// 	selQueue.push(file);
// 	allSize+=file.size;
// 	swfu.startUpload();
	
	
// }
// function fileQueueError(file, errorCode, message)//队列添加失败
// {
// 	var errorName='';
// 	switch (errorCode)
// 	{
// 		case SWFUpload.QUEUE_ERROR.QUEUE_LIMIT_EXCEEDED:
// 			errorName = "只能同时上传 "+this.settings.file_upload_limit+" 个文件";
// 			break;
// 		case SWFUpload.QUEUE_ERROR.FILE_EXCEEDS_SIZE_LIMIT:
// 			errorName = "选择的文件超过了当前大小限制："+this.settings.file_size_limit;
// 			break;
// 		case SWFUpload.QUEUE_ERROR.ZERO_BYTE_FILE:
// 			errorName = "零大小文件";
// 			break;
// 		case SWFUpload.QUEUE_ERROR.INVALID_FILETYPE:
// 			errorName = "文件扩展名必需为："+this.settings.file_types_description+" ("+this.settings.file_types+")";
// 			break;
// 		default:
// 			errorName = "未知错误";
// 			break;
// 	}
// 	alert(errorName);
// }
// function uploadStart(file)//单文件上传开始
// {
// 	setFileState(file.id,'上传中…');
// }
// function uploadProgress(file, bytesLoaded, bytesTotal)//单文件上传进度
// {
// 	$('#progressArea').show();
// 	var percent=Math.ceil((uploadSize+bytesLoaded)/allSize*100);
// 	$('#progressBar span').text(percent+'% ('+formatBytes(uploadSize+bytesLoaded)+' / '+formatBytes(allSize)+')');
// 	$('#progressBar div').css('width',percent+'%');
// }
// function upimgclk(that)
// {
// 	if(that.value == '图片说明可选') {that.value=''}
// }

// function uploadSuccess(file, serverData)//单文件上传成功
// {
// 	var data=Object;
// 	try{eval("data=" + serverData);}catch(ex){};
// 	if(data.err!=undefined&&data.msg!=undefined)
// 	{
// 		//alert(data.msg.url);
// 		if(!data.err)
// 		{
// 			console.log(data);
// 			var urls = data.msg.url.split('||');
//     	console.log(urls);
//     	console.log("=====");
// 			if(urls.length ==2){ var url = 	urls[0]; }else{ var url = urls;	} //如果返回的是带缩略图的就让0进去，否则直接进去

// 			$("#J_PicBox").attr({'src':url});
// 			// $('#uploadArea').append(' <div id="attach_'+data.msg.fid+'" class="attach_img"><img src="'+urlpath+'/'+url+'" /><textarea name="localimg['+data.msg.fid+']['+url+']" onclick="upimgclk(this)">图片说明（选填）</textarea>'+
// 			// 						'<a href="javascript:void(0)" onclick="delAttachIMAGE('+data.msg.fid+')" class="delete">remove</a>'+
// 			// 						'<div class="clear"></div></div>');
// 			// uploadSize+=file.size;
// 			// arrMsg.push(data.msg);
// 			// setFileState(file.id,'上传成功');
// 			setTimeout(function(){$('#'+file.id).fadeOut('slow')},1000)
// 		}
// 		else
// 		{
// 			setFileState(file.id,'上传失败');
// 		}
// 	}
// 	else setFileState(file.id,'上传失败！');
// }
// function uploadError(file, errorCode, message)//单文件上传错误
// {
// 	setFileState(file.id,'上传失败！'+message);
// }
// function uploadComplete(file)//文件上传周期结束
// {
// 	if(swfu.getStats().files_queued>0)swfu.startUpload();
// 	else uploadAllComplete();
// }
// function uploadAllComplete()//全部文件上传成功
// {
// 	$('#progressArea').hide(); //全部完毕关闭进度条
// 	$('#submit,#draft,#preview,#cancel,#pb-submiting-tip').toggle();
// 	//alert(arrMsg);
// }
// function formatBytes(bytes) {
// 	var s = ['Byte', 'KB', 'MB', 'GB', 'TB', 'PB'];
// 	var e = Math.floor(Math.log(bytes)/Math.log(1024));
// 	return (bytes/Math.pow(1024, Math.floor(e))).toFixed(2)+" "+s[e];
// }


</script>








<?php $_template = new Smarty_Internal_Template("require_pubfooter.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
