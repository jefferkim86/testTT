<?php /* Smarty version Smarty-3.0.6, created on 2012-12-22 00:01:53
         compiled from "tplv2\models/music.html" */ ?>
<?php /*%%SmartyHeaderCode:2172350d487f13b18f8-91337535%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fa61fe34f505a224fd41fc771217b4a4ee43fdbe' => 
    array (
      0 => 'tplv2\\models/music.html',
      1 => 1342096674,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2172350d487f13b18f8-91337535',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("require_header.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('addcss','yes');$_template->assign('editor','yes');$_template->assign('titlepre',"发布音乐"); echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

<script>


$(document).ready(function(){

	var lastkey,_timer,_focus,msl_timer,cpage,pcount,skey,newsearch;
	var msk=$("#music_search_key");
	var msl=$("#music_search_list");
	var mslu=$("#music_search_list ul");
	var ms=$("#musicSearch");
	var mlp=$("#music_list_pager");
	var psize=8;

	ms.hover(function(){
		!msl_timer||clearTimeout(msl_timer);
	},function(){
		msl_timer=setTimeout(function(){
			msl.hide();
		},500)
	})

	msk.keyup(function(e){
		skey=$(this).val();
		if(e.keyCode=="27"||$(this).val()==''){msl.hide();clearTimeout(_timer);return false};
			!_timer||clearTimeout(_timer)
			_timer=setTimeout(function(){
			if(skey==lastkey){
				if(!msl.is(":visible")){
					msl.show()
				}
				return false;
			}
			if(skey==''){
				newsearch=false;
				return false;
			}
			newsearch=true;
			lastkey=skey;
			cpage=1;
			search_music();
		},500)
	}).keydown(function(e){
		skey=$(this).val();
		if(skey==''&&skey==lastkey||e.keyCode=="13"){
			cpage=1;
			newsearch=true;
			search_music();
		}else{
			newsearch=false;
		}
	}).live("click focus",function(){
		if(!msl.is(":visible") && msk.val()!=''){
			msl.show();
		}
	});
	
	function search_music(){
	  if(!cpage)cpage=1;
	  key = encodeURIComponent(skey);
	  var api = 'http://kuang.xiami.com/app/nineteen/search/key/'+ key +'/diandian/1/page/'+cpage;
	  $('#loadProcess').show();
	  $.ajax({
		  url:api,
		  dataType:"jsonp",
		  jsonp:"callback",
		  cache:false,
		  success:function(data){
			if(newsearch){
				pcount=parseInt(data["total"]);
				show_pager();
			}
			console.log(data);
			mslu.html(template("tmpl_music_lists",data));
			msl.show();
			$('#loadProcess').hide();
			$(".music_list_li").each(function(){
				$(this).click(function(){
					temp=$(this).attr("data").split("|");
					sid=temp[0];
					aid=temp[1];
					swfhtml = 'http://www.xiami.com/widget/0_' + temp[5] + '/singlePlayer.swf';
					urlhtml = 'http://www.xiami.com/song/'+temp[5];
					data = {type:"xiamisearch",title:temp[6],author:temp[4],artist:temp[2],id:swfhtml,url:urlhtml,img:temp[1]};
					setHTML(data);
					addtag(temp[6]);
					addtag(temp[4]);
					$('#title').val(temp[6]+'-'+temp[4]);
					msl.hide();
				})
			})
		  }
	  });
	}
	
	function show_pager(){
			if(pcount<1){
				return false;
			}
			mlp.myPagination({
			currPage:cpage,
			pageCount:pcount,
			pageSize:psize,
			cssStyle: 'flickr',
			info:{
				msg_on:false,
				pages:false,
				first_on:false,
				last_on:false
			},
			fun:function(currp){
				cpage=currp;
				search_music();
			}
		});
	}



  /*发布music*/
	 $('#submit').click(function(){
		  var umus = '';//获取发布音乐字符串
		  $('#musicList .list').each(function(){ umus  += $(this).attr('data')+'[YB]';  }) //获取音乐字串
		  setTags();
		  
		  
		  if($('#useedit').val() == 1)
		  {
			  
			  $.dialog({content:'您确认使用编辑器中的媒体作为最终发布的内容吗？',lock:true,yesFn:function(){ 
				  
					  $('#urlmusic').val(umus); //写入数据
					  $('#submit,#draft,#preview,#cancel,#pb-submiting-tip').toggle();
					  $('#form1').submit();
	  
								 
			  },noFn:true});
			  
		  }else{
		  		if(umus ==''){
						waring('发布列表为空');return false; 
				}
			  
				$('#urlmusic').val(umus); //写入数据
				$('#submit,#draft,#preview,#cancel,#pb-submiting-tip').toggle();
				$('#form1').submit();
		  }
	  });	

    var jUpload=$('#upload_mp3 input');
        jUpload.mousedown(function(){textbody.saveBookmark();}).change(function(){
            var $this=$(this),sExt=$this.attr('ext'),$prev=$this.prev();
            if($this.val().match(new RegExp('\.('+sExt.replace(/,/g,'|')+')$','i'))){
                var upload=new textbody.html4Upload(this,urlpath+'/index.php?c=post&a=uploadmedia&model=2',function(sText){
                $('#uploading').hide();
                var data=Object,bOK=false;
                try{data=eval('('+sText+')');}catch(ex){};
				//console.log(sText);
                if(!data.err){
					
					data.msg.type = 'local';
					data.msg.img = skinpath + '/image/comm/mp3_cover.jpg';
					data.msg.id  =data.msg.fid;
					if(data.msg.title != undefined){
						$('#title').val(data.msg.title);	
						addtag(data.msg.title);
					}
					if(data.msg.author != undefined){	
						addtag(data.msg.author);
					}
					setHTML(data.msg);
                }else{
                    alert(data.err);	
                }
            });
                    upload.start();
                    $('#uploading').show();
        }
			else alert('请上传'+sExt+'文件');
    });


	$.isChange.Set("#music_search_key,#title,#textarea,#upload_mp3 file",function(){
		return $("#musicList .list").size()>0;
	});
	$.isChange.unSet("#form1");
	if($('#attr').val() != ''){
		var edit = eval( $('#attr').val() );
		if(edit.length > 0){
			for(var i=0;i<edit.length;i++){
				setHTML(edit[i]);
			}
		}
	}
	
});


function SelectLink()
{
	 $('#musicFrom').show();
	 $('#musicUpload,#musicSearch').hide();
	 $('#useedit').val(0);
	 $('#mountchange ul li').removeClass('curr');
	 $('#url_link').addClass('curr');
}

function SelectSearch()
{
	 $('#musicSearch').show();
	 $('#musicUpload,#musicFrom').hide();
	 $('#useedit').val(0);
	 $('#mountchange ul li').removeClass('curr');
	 $('#search_link').addClass('curr');
}
function SelectUpload(that){
	 $('#musicFrom,#musicSearch').hide();
	 $('#musicUpload').show();
	 $('#useedit').val(0)
	 $('#mountchange ul li').removeClass('curr');
	 $('#url_upload').addClass('curr');
}


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
	$.post(urlpath+'/index.php?c=post&a=links&type=music&model=2',{'url':url},function(result){ 
																	 // alert(result);
		$('#musicFrom').enable();$('#urlParseLoading').val('添加地址');
		var data = eval("(" + result + ")");
		if(data.error != undefined){ tips(data.error);return false;}
		data.url = url;
		temp=data.title.split("-");
		if(temp[0] != undefined){
			data.title = temp[0];
			addtag(temp[0]);
		}
		if(temp[1] != undefined){
			if(!data.author) data.author = temp[1];
			addtag(temp[1]);
		}else{
			if(!data.author) data.author = '歌手';
		}

		setHTML(data);
		$('#title').val(data.title);
		$('#musicurl').val('http://');
	})
}


function setHTML(r){
	console.log(r);
	if(!r.artist) r.artist = '艺术家';
	if(r.id == undefined) r.id = r.pid; //兼容
	html = '<div class="list" data="'+r.type+'|'+r.img+'|'+r.id+'|'+r.title+'|'+r.url+'|'+r.artist+'|'+r.author+'|'+r.flv+'">'+
				'<li><img src="'+r.img+'" /></li>';
	if(r.type =='xiamisearch'){
	  html += '<embed src="'+r.id+'" type="application/x-shockwave-flash" width="257" height="33" wmode="transparent"></embed>';	
	}else{
		html +=	 '<li><input type="text" class="m_title" name="title_list[]" value="'+r.title+'"><br>'+
			     '<input type="text" class="m_author" name="author_list[]" value="'+r.author+'"><br>'+
				 '<input type="text" class="m_artist" name="artist_list[]" value="'+r.artist+'" /></li>';
	}
	html += '<div class="delete"><a href="javascript:void(0)" onclick="musicDItem(this)">x</a></div>'+
			'<div class="clear"></div></div>';
	$('#musicList').append(html);
}

/*删除音乐发布的一个条目 DOM*/
function musicDItem(that){$(that).parent().parent().remove();}

/*添加MP3类型媒体 如果localmusic 存在 则说明是在音乐模型*/
function iattachMMouse(that,id)
{
	if(id == 0){if($(that).val() == '描述'){$(that).val('');}}
	if(id == 1){if($(that).val() == ''){$(that).val('描述');}}
}


/*remove附件*/
function removeIattachMp3(that,id)
{
	$(that).parent().parent().remove();
	$('#attach_'+id).show();
}

</script>


<script type="text/html" id="tmpl_music_lists">
{each results as d i}
<li class="music_list_li" data="{d.album_id}|{d.album_logo}|{decodeURI(d.album_name)}|{d.artist_id}|{decodeURI(d.artist_name)}|{d.song_id}|{decodeURI(d.song_name)}">
	<span class="music_music_song">{decodeURI(d.song_name)}</span>
	<span>-</span>
	<span class="music_artist_name">{decodeURI(d.artist_name)}</span>
	</li>
{/each}
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
	        <h2>分享音乐</h2>
			<div id="post_area">
			    
				<div id="mountchange">
				    <ul class="tabs">
					    <li id="search_link" class="curr"><a href="javascript:void(0)" onclick="SelectSearch(this)">搜索音乐</a><div class="point"></div></li>
                        <?php if ($_smarty_tpl->getVariable('tpl_config')->value['enableurl']==1){?>
						<li id="url_link"><a href="javascript:void(0)" onclick="SelectLink(this)">引用地址</a><div class="point"></div></li>
                        <?php }?>
                        <?php if ($_smarty_tpl->getVariable('tpl_config')->value['enableupload']==1){?>
						<li id="url_upload"><a href="javascript:void(0)" onclick="SelectUpload(this)">本地上传</a><div class="point"></div></li>
                        <?php }?>
					</ul>
				</div>
				
				<div id="musicSearch">
				    <div style="display:none" id="loadProcess">正在搜索音乐</div>
				    <input name="music_search_key" id="music_search_key" autocomplete="off" type="text" class="musicurl"/>
					<div id="music_search_list">
					    <ul class="music_list">
						</ul>
						<div id="music_list_pager"></div>
					</div>
					
					<div class="notice">
					    <li>输入歌曲名、专辑或演唱者</li>
					</div>
					
				</div>
				
				<div id="musicFrom" style="display:none">
				    
				    <input type="text"  id="musicurl" class="musicurl"  value="http://"  onfocus="musicMouse(this)" onblur="musicMosout(this,'u')" >
				    <input type="button" id="urlParseLoading" value="添加地址" onclick="saveMusicList($('#musicurl').val())" class="mu_btn">
					<div class="notice">
					    <li>请输入音乐台网站的播放页面地址,注意不是FLASH地址</li>
						<li>您也可以直接输入后缀为MP3的网络音频链接地址</li>
						<li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'site','a'=>'help'),$_smarty_tpl);?>
" target="_blank">需要获取帮助?</a></li>
					</div>
				</div> 
				
				<div id="musicUpload" style="display:none">
				    
				    <div class="mu_load" id="upload_mp3">
					    <input type="file" name="filedata" ext="mp3|wma|mid" />
					</div>
					<span id="uploading"style="display:none">正在上传...</span>
					<div class="clear"></div>
					<div class="notice">
					    <li>您可以上传小于 <strong><?php echo formatBytes(array('size'=>$_smarty_tpl->getVariable('yb')->value['addmusic_upsize']),$_smarty_tpl);?>
</strong> 的 mp3 / wma / mid文件</li>
						<li>如果您上传上传,则默认表明已经阅读 <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'site','a'=>'help'),$_smarty_tpl);?>
" target="_blank">使用帮助</a> 和 <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'site','a'=>'service'),$_smarty_tpl);?>
" target="_blank">服务条款</a> 并遵守</li>
					</div>
				</div>
                
                <div id="musicList"></div>
			
			    <div class="p_area">
			        <h3>标题<span>（可不填）</span></h3>
				    <input type="text" name="title" id="title" class="input" tabindex="1" value="<?php echo $_smarty_tpl->getVariable('blog')->value['title'];?>
">
				</div>
				
				<div class="p_area">
				    <h3 class="title">内容<span>（可不填）</span></h3>
					<textarea name="textarea" id="textarea" style="width:600px"><?php echo $_smarty_tpl->getVariable('body')->value['body'];?>
</textarea>
                    <input type="hidden" id="urlmusic" name="urlmusic" value="" />
                    <input type="hidden" name="tag" id="tag" value="" />
                    <input type="hidden" name="attr" id="attr" value='<?php echo $_smarty_tpl->getVariable('attr')->value;?>
' /> 
					<input type="hidden" name="id" value="<?php echo $_smarty_tpl->getVariable('blog')->value['bid'];?>
" />
				
                
				</div>

				
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
