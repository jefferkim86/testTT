<?php /* Smarty version Smarty-3.0.6, created on 2012-12-22 00:03:17
         compiled from "tplv2\models/movie.html" */ ?>
<?php /*%%SmartyHeaderCode:1233250d48845af9d98-38260260%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '82199bf26366e69aeff0b230768e575717809060' => 
    array (
      0 => 'tplv2\\models/movie.html',
      1 => 1341500664,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1233250d48845af9d98-38260260',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("require_header.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('addcss','yes');$_template->assign('editor','yes');$_template->assign('titlepre',"分享电影"); echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>


<script type="text/javascript">
$(document).ready(function(){
	$.isChange.Set("#title,#textarea",function(){
		if($("#musicurl").val()!="http://"){return true;}
	});
	$.isChange.unSet("#form1");
	
	 /*发布movie*/
	$('#submit').click(function(){
		  var umus = '';//获取发布音乐字符串
		  $('#movieList .list').each(function(){ umus  += '1';  }) //获取音乐字串
		  		if(umus ==''){
					waring('发布列表为空');return false; 
				}
				setTags();
				$('#urlattach').val(umus); //写入数据
				$('#submit,#draft,#preview,#cancel,#pb-submiting-tip').toggle();
				$('#form1').submit();
	});
	  
	if($('#attr').val() != ''){
		var edit = eval( $('#attr').val() );
		if(edit.length > 0){
			for(var i=0;i<edit.length;i++){
			edit[i]['string'] = JSON.stringify(edit[i]);
				$('#movieList').append(template('tmpl_movie',edit[i]));
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
	$.post(urlpath+'/index.php?c=post&a=links&type=movie&model=6',{'url':url},function(result){ 
																	 // alert(result);
		$('#musicFrom').enable();$('#urlParseLoading').val('添加地址');
		var data = eval("(" + result + ")");
		if(data.error != undefined){ tips(data.error);return false;}
		data['string'] = result;

		for(var i=0; i<=data.genre.length;i++){
			if(i <4){
				addtag(data.genre[i]);
			}
		}
		$('#title').val(data.title);
		$('#textarea').val(data.summary);
		$('#musicurl').val('http://');
		
		$('#movieList').append(template('tmpl_movie',data))
	})
}

/*删除音乐发布的一个条目 DOM*/
function musicDItem(that){$(that).parent().parent().remove();}

</script>
<script type="text/html" id="tmpl_movie">
<div class="list">
		<div class="m_img"><img src="{img}"/></div>
		<div class="m_list">
		    <li class="m_title">电影名称:<font>{title}</font><span>{average}</span></li>
		    <li>导演:<font>{directe}</font></li>
		    <li>主演:<font>{each starring as g i}<b>{g}</b>{/each}</font></li>
		    <li>类型:<font>{each genre as g i}<b>{g}</b>{/each}</font></li>
		    <li>上映日期:<font>{initialReleaseDate}</font></li>
		    <li>时长:<font>{runtime}</font></li>
		</div>
		
	<input type="hidden" name="item[]" value="{string}" size="60">
	<div class="delete"><a href="javascript:void(0)" onclick="musicDItem(this)">x</a></div>
	<div class="clear"></div>
</div>

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
	        <h2>分享电影</h2>
			<div id="post_area">
			    <div id="musicFrom" class="p_video">
				    <div id="musicNotice">请输入来自豆瓣电影网站的访问地址,注意不是FLASH地址</div>
					<input type="text"  id="musicurl" class="musicurl"   value="http://" onfocus="musicMouse(this)" onblur="musicMosout(this,'u')" >
					<input type="button" id="urlParseLoading" value="保存" onclick="saveMusicList($('#musicurl').val())" class="mu_btn">
				</div>
				<div id="localMusic"></div>
				
                <div id="movieList"></div>

			
			    <div class="p_area">
			        <h3>标题<span>（可不填）</span></h3>
				    <input type="text" name="title" id="title" class="input" tabindex="1" value="<?php echo $_smarty_tpl->getVariable('blog')->value['title'];?>
">
				</div>
				
				<div class="p_area">
				    <h3 class="title">内容<span>（可不填）</span></h3>
					<textarea name="textarea" id="textarea" style="width:600px"><?php echo $_smarty_tpl->getVariable('body')->value['body'];?>
</textarea>
                    <input type="hidden" name="tag" id="tag" value="" />
                    <input type="hidden" name="id" value="<?php echo $_smarty_tpl->getVariable('blog')->value['bid'];?>
" />
					<input type="hidden" name="attr" id="attr" value='<?php echo $_smarty_tpl->getVariable('attr')->value;?>
' /> 
					<input type="hidden" name="urlattach" id="urlattach" />
				
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
