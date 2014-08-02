<?php /* Smarty version Smarty-3.0.6, created on 2014-08-02 20:17:10
         compiled from "tplv2/user_myfollow.html" */ ?>
<?php /*%%SmartyHeaderCode:79642403953dcd6c6970940-96939518%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ad6e59ad78e50f6f5f0160f6fbb0dd1b2b00882e' => 
    array (
      0 => 'tplv2/user_myfollow.html',
      1 => 1406883503,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '79642403953dcd6c6970940-96939518',
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

		 getApi('user', 'myfollow', {
            'type':ty
        }, function(d) {
            addto_follow(d,ty);
        });
	
		// $.paging({ctn1:"#follow_area",ctn2:"#paging",yc:"user",ym:"myfollow",showpage:true,yprm:{type:ty},ftype:function(d){
		// 	addto_follow(d,ty);
		// }});
}


</script>



<div id="index">
    
    <div id="article">
	    <div id="userfollow">

	        <div class="post_bg">
			<a href="javascript:;" onclick="do_run()"><span id="curr_myfollow" <?php echo $_smarty_tpl->getVariable('curr_mefor')->value;?>
>我关注的</span></a>
			<a href="javascript:;" onclick="do_run('follow')"><span id="follow_my" <?php echo $_smarty_tpl->getVariable('curr_forme')->value;?>
>我的粉丝</span></a>
		    </div>
	    </div>
		
	    <div id="followfeed">



<script type="text/template" id="J-followList">

 <div class="follow_list ${last}" id="myfollow_${uid}">
	<div class="follow_con clearfix">
	 <div class="follow_btn" id="follow_unlink_${uid}">
	 	<button class="J-follow followed" data-uid="${uid}">取消关注</button>
	 </div>
	<div class="avatar">	       
	  <a href="${h_url}" target="_blank" title="${username}">
		 	<img src="${h_img}" alt="${username}" title="${username}" class="face"/>
	   </a>
	</div>
					
	<div class="userinfo">
		<li class="title"><a href="${h_url}" target="_blank">${username}</a>
			<span>(${time}关注)</span>
		</li>
		<li class="userdata">
			<span class="blogs">推推:<b>${num}</b></span>
			<span>关注:<b>${likenum}</b></span>
			<span class="fans">粉丝:<b>${flow}</b></span>
		</li>
	</div>

	</div>

</div>


</script>

			
		<div id="feed_loading">加载中 ...</div>
		<div id="follow_area"></div>
			
	
			<div class="follow_font" id="follow_font" style="display:none">
			    <div class="no-item">暂无消息</div>
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
		var tpl = juicer($("#J-followList").html());
		var lastCls = 'last-li';
		if(d.body.data.length >0){
			for(var i=0,list = d.body.data;i<list.length;i++){
				if(i == list.length-1){
	                list[i].last = lastCls;
	            }else{
	                list[i].last = '';
	            }
				list[i].h_img = urlpath+list[i].h_img;
				var html = tpl.render(list[i])
				$('#follow_area').append($(html));
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