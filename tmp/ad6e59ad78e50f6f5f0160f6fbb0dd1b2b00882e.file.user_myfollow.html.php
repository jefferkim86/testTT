<?php /* Smarty version Smarty-3.0.6, created on 2014-07-20 19:38:15
         compiled from "tplv2/user_myfollow.html" */ ?>
<?php /*%%SmartyHeaderCode:128516670653cbaa27e0e449-89734877%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ad6e59ad78e50f6f5f0160f6fbb0dd1b2b00882e' => 
    array (
      0 => 'tplv2/user_myfollow.html',
      1 => 1405856052,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '128516670653cbaa27e0e449-89734877',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("require_header.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>


<script type="text/javascript">
$(document).ready(function(){ 
	do_run();
})

function do_run(ty){
	$('#feed_loading').show();
	$('#follow_font').hide();
	$('.post_bg').find('span').removeClass('current');
	if(ty == 'follow'){
		$('#curr_myfollow').removeClass('current');
		$('#follow_my').addClass('current');

		}else{
			$('#curr_myfollow').addClass('current');
			$('#follow_my').removeClass('current');
		}
	
		$.paging({ctn1:"#follow_area",ctn2:"#paging",yc:"user",ym:"myfollow",showpage:true,yprm:{type:ty},ftype:function(d){
			addto_follow(d,ty);
		}});


}


// follow的模板
function tmpl_follow(d,type){

	var a  = '<div class="follow_list" id="myfollow_'+d.touid.uid+'">';
		a += '<div class="follow_con">';
		if(type == 'follow'){
			if( d.linker == 1){
				a += '<div class="follow_btn" id="follow_unlink_'+d.touid.uid+'"><a href="javascript:;" onclick="fllow(\'unlink\','+d.touid.uid+')">取消关注</a></div>';
				a += '<div class="follow_abtn" id="follow_link_'+d.touid.uid+'" style="display:none"><a href="javascript:;" onclick="fllow(\'link\','+d.touid.uid+')">加为关注</a></div>';
			}else{
				a += '<div class="follow_btn" id="follow_unlink_'+d.touid.uid+'" style="display:none"><a href="javascript:;" onclick="fllow(\'unlink\','+d.touid.uid+')">取消关注</a></div>';
				a += '<div class="follow_abtn" id="follow_link_'+d.touid.uid+'"><a href="javascript:;" onclick="fllow(\'link\','+d.touid.uid+')">加为关注</a></div>';
			}
		}else{
			a += '<div class="follow_btn" id="follow_unlink_'+d.touid.uid+'"><a href="javascript:;" onclick="fllow(\'unlink\','+d.touid.uid+')">取消关注</a></div>';
			a += '<div class="follow_abtn" id="follow_link_'+d.touid.uid+'" style="display:none"><a href="javascript:;" onclick="fllow(\'link\','+d.touid.uid+')">加为关注</a></div>';
		}
		
		a += ' <div class="avatar">'	       
		a += '  <a href="'+d.touid.h_url+'" target="_blank" title="'+d.touid.username+'">';		       
		a += '    <div class="head_bg"><img src="'+d.touid.h_img+'" alt="'+d.touid.username+'" title="'+d.touid.username+'" class="face"/></div>';
		a += '  </a></div>';
					
		a += '<div class="userinfo">';
		a += '<li><a href="'+d.touid.h_url+'" target="_blank">'+d.touid.username+'</a>';
		if(d.linker == 1)
			a += '<span>相互关注</span>';
		a +='</li>';
		a += '<li class="userdata"><font>'+d.touid.num+'</font>个博客内容,<font>'+d.touid.flow+'</font>个粉丝,<font>'+d.time+'加关注</font></li>';
		a += '<li>'+d.touid.sign+'</li>';
		a += '</div><div class="clear"></div>';
		if(d.touid.blogtag.length > 0){
			a += '<div class="user_tag">';
			for(var i=0;i<d.touid.blogtag.length;i++){
				a += '<li><a href="#" target="_blank"><span>'+d.touid.blogtag[i]+'</span></a></li>';
			}
		}
		a += '</div><div class="clear"></div></div></div>';
	return a;
}
</script>



<div id="index">
    
    <div id="article">
	    <div id="userfollow">
		  <?php if ($_smarty_tpl->getVariable('yb')->value['invite_switch']!=0){?>  <div class="btn_invite"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'invite','a'=>'myintval'),$_smarty_tpl);?>
">邀请好友</a></div><?php }?>
	        <div class="post_bg">
			<a href="javascript:;" onclick="do_run()"><span id="curr_myfollow" <?php echo $_smarty_tpl->getVariable('curr_mefor')->value;?>
>我关注的</span></a>
			<a href="javascript:;" onclick="do_run('follow')"><span id="follow_my" <?php echo $_smarty_tpl->getVariable('curr_forme')->value;?>
>我的粉丝</span></a>
		    </div>
	    </div>
		
	    <div id="followfeed">
	





<script type="text/template" id="J-followList">

 <div class="follow_list" id="myfollow_{{touid.uid}}">
	<div class="follow_con clearfix">
	 <div class="follow_btn" id="follow_unlink_{{touid.uid}}">
	 	<button class="J-follow followed" data-uid="{{touid.uid}}">取消关注</button>
	 </div>
	<div class="avatar">	       
	  <a href="{{touid.h_url}}" target="_blank" title="{{touid.username}}">
		 	<img src="{{touid.h_img}}" alt="{{touid.username}}" title="{{touid.username}}" class="face"/>
	   </a>
	</div>
					
	<div class="userinfo">
		<li class="title"><a href="{{touid.h_url}}" target="_blank">{{touid.username}}</a>
			<span>({{time}}关注)</span>
		</li>
		<li class="userdata">
			<span class="blogs">推推:<b>{{touid.num}}</b></span>
			<span>关注:<b>{{touid.flow}}</b></span>
			<span class="fans">粉丝:<b>{{touid.flow}}</b></span>
		</li>
	</div>

	</div>

</div>


</script>

		    <!--<div class="follow_search">
			    <input type="button" id="search_btn" value="搜索" onclick="saveMusicList($('#musicurl').val())" class="search_btn">
				<select name="search_category" id="search_category" class="search_category" >
				    <option value="name">通过博客名称搜索</option>
					<option value="tags">通过博客标签搜索</option>
				</select>
				<input type="text" name="search_user" id="search_user" tabindex="1" value="" class="search_user">
			</div>-->
			
		<div id="feed_loading"></div>
		<div id="follow_area"></div>
			
	
			<div class="follow_font" id="follow_font" style="display:none">
			    <h2>您没有关注或者被关注</h2>
			</div>
		
			
		</div>
		 
		
		<div id="paging"></div>
		<div class="clear"></div>
	</div>
	
	
	<div id="aside">
        <?php $_template = new Smarty_Internal_Template("require_sider.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
    </div>
</div>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/js/view/userView.js"></script>

<script type="text/javascript">
//添加到 follow
function addto_follow(d,type){
		$('#follow_area').html('');
		$('#feed_loading').hide();
		var tpl = $("#J-followList").html();
		if(d.body.data.length >0){
			for(var i=0;i<d.body.data.length;i++){
				console.log(d.body.data[i],type);
				var html = Mustache.render(tpl,d.body.data[i],type)
				$('#follow_area').append($(html));
				//$('#follow_area').append(tmpl_follow(d.body.data[i],type));
			}
		}else{
			$('#follow_font').show();
		}
}
	$(document).on("mouseover",".follow_list",function(e){
		$(this).addClass('followListCur');
		$(this).find(".follow_btn").show();
	});
	$(document).on("mouseout",".follow_list",function(e){
		$(this).removeClass('followListCur');
		$(this).find(".follow_btn").hide();
	});

	new Tuitui.userView();
</script>
<?php $_template = new Smarty_Internal_Template("require_footer.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>