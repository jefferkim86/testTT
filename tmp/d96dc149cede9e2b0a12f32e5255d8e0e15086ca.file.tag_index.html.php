<?php /* Smarty version Smarty-3.0.6, created on 2014-01-17 21:47:59
         compiled from "tplv2/tag_index.html" */ ?>
<?php /*%%SmartyHeaderCode:132884360852d9348f4e2c91-13992208%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd96dc149cede9e2b0a12f32e5255d8e0e15086ca' => 
    array (
      0 => 'tplv2/tag_index.html',
      1 => 1344263710,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '132884360852d9348f4e2c91-13992208',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("require_header.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('titlepre',$_smarty_tpl->getVariable('tagname')->value);$_template->assign('gallery','yes'); echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

<script type="text/javascript">
var g = {
	tagname:'<?php echo $_smarty_tpl->getVariable('tag')->value;?>
',
	tagid :'<?php echo $_smarty_tpl->getVariable('tid')->value;?>
'
}
if(g.tagname != ''){
	var args = { tag:g.tagname };
}else{
	var args = { tid:g.tagid };
}

$(document).ready(function(){ 
	show_tags_view(args);
	
})
</script>

<script type="text/javascript">

function show_tags_view(args){
	getHotUser(args.tag);
	$('#userpost').hide();
	$('#rem_tag,#add_tag').hide();
	$('.menu_tag_index ul li').removeClass('current');
	yb_load_feeds('blog','tag',args,function(data){
		if(data.status == 1){
			(data.body.blog == false) ? $('#userpost').hide() : $('#userpost').show();
			$('#con_tag').html(data.body.currtag);
			$('#topic_count').html(data.body.topic_count);
			$('#tag_'+data.body.currtid).addClass('current');
			if(data.body.isadd == 1){
				$('#add_del_status').html('<a href="javascript:;" onclick="delMytag('+data.body.currtid+')"><span class="subs_0">取消订阅</span></a>');
			}else{
				$('#add_del_status').html('<a href="javascript:;" onclick="addMytag('+data.body.currtid+')"><span class="subs_1">订阅</span></a>');
			}
		}else{
			$('#feed_box').hide();
			$('#feed_none').show();
		}
	});
}

function getHotUser(tagname){
$('.menu_tag_user ul').html('');
$('.menu_tag_user').hide();
	$.ybAPI('blog','tagHotuser',{tag:tagname},function(data){
		if(data.status == 1){
			if(data.body.length >0){
				for(var i=0;i<data.body.length;i++){
					$('.menu_tag_user ul').append(tmpl_tagHotUser(data.body[i])+'<div class="clear"></div>');
				}
			$('.menu_tag_user').show();
			}
		}
	});

}
//添加tag必须接受id
function addMytag(tagid){
	$.ybAPI('user','addMytag',{tid:tagid},function(data){
		if(data.status == 1){
			$('#add_del_status').html('<a href="javascript:;" onclick="delMytag('+tagid+')"><span class="subs_0">取消订阅</span></a>');
		}else{
			alert(data.msg);
		}
	});
}

function delMytag(tagid){
	artDialog({
		id: 'Confirm',
		fixed: true,
		lock: true,
		width:'200px',
		content: '确定取消订阅?',
		ok: function () {
				$.ybAPI('user','delTag',{tid:tagid},function(data){
					if(data.status == 1){
						$('#add_del_status').html('<a href="javascript:;" onclick="addMytag('+tagid+')"><span class="subs_1">订阅</span></a>');
						$('#tag_'+tagid).hide();
					}else{
						alert(data.msg);
					}
				});
			},
		cancel: function(){}
		});
}
function tmpl_tagHotUser(d){

	var a = '<li><div class="tag_content">';
    a += '<div class="tag_postion">';
	a += '<a href="#" title="访问'+d.username+'的博客">'+d.username+'</a>';
	a += '<div class="tag_subs_0" id="follow_unlink_'+d.uid+'"  style="display:none"><a href="javascript:;" onclick="fllow(\'unlink\','+d.uid+')" title="取消关注"></a></div>';
	a += '<div class="tag_subs_1" id="follow_link_'+d.uid+'"><a href="javascript:;"  onclick="fllow(\'link\','+d.uid+')" title="关注" ></a></div>';
	a += '</div>';
	a += '</div>';
	a += '<div class="tag_avatar">';
	a += '<a href="'+d.h_url+'" title="访问'+d.username+'的博客"><img src="'+d.h_img+'" alt="'+d.username+'" class="face" /></a>';
	a += '</div></li>';
	return a;
}
</script>




<div id="index">
    <div id="article">
	<?php $_template = new Smarty_Internal_Template("require_post.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
	    <div class="clear"></div>
		
		
		<div id="userpost" style="display:none">
	        <div class="post_tag">
	            <a href="javascript:;"><span class="con_tag" id="con_tag"></span></a>
				<div class="desc">该标签被使用<span id="topic_count">0</span>次</div>
				<div id="add_del_status"></div>
				
		    </div>
	    </div>
		
		
	    <div class="clear"></div>
		<div id="feedArea">
			<div id="feed_loading"></div>
			<div id="feed_box"></div>
			
			<!-- 内容为空  -->
			<div class="feed_none" id="feed_none" style="display:none">
			    <div class="follow_font">
			        <h2>暂无标签内容，可能正在收集中</h2>
			    </div>
			</div>
			<!-- over -->

		</div>
		
		<div id="paging"><div class="pag_info"><?php echo $_smarty_tpl->getVariable('pager')->value;?>
</div></div>
		<div class="clear"></div>
		
		

	</div>
	<div id="aside">
        <?php $_template = new Smarty_Internal_Template("require_sider_tag.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
    </div>
</div>

<?php $_template = new Smarty_Internal_Template("require_footer.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>