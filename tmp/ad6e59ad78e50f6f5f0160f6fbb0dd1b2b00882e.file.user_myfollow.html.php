<?php /* Smarty version Smarty-3.0.6, created on 2014-08-27 22:32:28
         compiled from "tplv2/user_myfollow.html" */ ?>
<?php /*%%SmartyHeaderCode:51031599353fdebfc2b0d46-94340560%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ad6e59ad78e50f6f5f0160f6fbb0dd1b2b00882e' => 
    array (
      0 => 'tplv2/user_myfollow.html',
      1 => 1409149947,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '51031599353fdebfc2b0d46-94340560',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("require_header.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>


<script type="text/javascript">
function getQueryString(name){
    if(location.href.indexOf("?")==-1 || location.href.indexOf(name+'=')==-1) {
        return '';
    }
     var queryString = location.search.substring(location.search.indexOf("?")+1);
     var parameters = queryString.split("&");
    var pos, paraName, paraValue;
    for(var i=0; i<parameters.length; i++){
        pos = parameters[i].indexOf('=');
        if(pos == -1) { continue; }
         paraName = parameters[i].substring(0, pos);
        paraValue = parameters[i].substring(pos + 1);
         if(paraName == name){
            return unescape(paraValue.replace(/\+/g, " "));
        }
    }
    return '';
};
$(document).ready(function(){ 
	
	var tabval = getQueryString('tab');
	var curTab = tabval == '' ? '' : tabval;
    if(G_isSelf){
    	$("#curr_myfollow").text('我关注的');
    	$("#follow_my").text('我的粉丝');
    }else{
    	$("#curr_myfollow").text('TA关注的');
    	$("#follow_my").text('TA的粉丝');
    }
	do_run(curTab);
})

function do_run(ty,page){
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
	var uid = getQueryString('uid');

	getApi('user', 'myfollow', {
		'uid': uid || undefined,
        'type':ty,
        'page':page || 1
    }, function(d) {
        addto_follow(d,ty);
    });
	
}


</script>
<style type="text/css">
	.follow_list{width: 1100px;}
</style>



<div id="index">
    <?php $_template = new Smarty_Internal_Template("require_userInfo.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
    <div id="article">
	    <div id="userfollow">

	        <div class="post_bg">
			<a href="javascript:;" onclick="do_run()"><span id="curr_myfollow" <?php echo $_smarty_tpl->getVariable('curr_mefor')->value;?>
>我关注的</span></a>
			<a href="javascript:;" onclick="do_run('follow')"><span id="follow_my" <?php echo $_smarty_tpl->getVariable('curr_forme')->value;?>
>我的粉丝</span></a>
		    </div>
	    </div>
		
	    <div id="followfeed" style="width:1138px;">



<script type="text/template" id="J-followList">

 <div class="follow_list ${last}" id="myfollow_${uid}">
	<div class="follow_con clearfix">
	 <div class="follow_btn" id="follow_unlink_${uid}">
	 	{@if linker}
	 	<button class="J-follow followed" data-uid="${uid}">取消关注</button>
	 	{@else}
	 		<button class="J-follow" data-uid="${uid}">加关注</button>
	 	{@/if}
	 </div>
	<div class="avatar">	       
	  <a href="${h_url}" title="${username}">
		 	<img src="${h_img}" alt="${username}" title="${username}" class="face"/>
	   </a>
	</div>
					
	<div class="userinfo">
		<li class="title"><a href="${h_url}">${username}</a>
			<span>(${time}关注)</span>
		</li>
		<li class="userdata">
			<span class="blogs">动态:<b>${num}</b></span>
			<span>关注:<b>${flow}</b></span>
			<span class="fans">粉丝:<b>${flowme}</b></span>
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
		 
		
		<div id="paging" style="margin-top:20px;width:450px;"></div>
		<div class="clear"></div>
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
            //我的关注页面都是关注了的
            if(type != 'follow'){
            	list[i].linker = true;
            }
			list[i].h_img = urlpath+list[i].h_img;
			var html = tpl.render(list[i])
			$('#follow_area').append($(html));
		}
		
		var paginType = type == 'follow' ? 'tab2Page':'tab1Page';

		if(d.body.page && d.body.page.total_page > 1 && $("#paging").attr('pageType') != paginType){
			$("#paging").html('');
			$("#paging").attr('pageType',paginType);
	        $("#paging").pagination({
                items: d.body.page.total_page * 10,
                itemsOnPage: 10,
                cssStyle: 'light-theme',
                onPageClick: function(page, ev) {
                    do_run(type,page);
                }
            });
            
		}
		
	}else{
		var noItemTxt = '还没有关注任何用户';
		if(type){
			noItemTxt = '还没有任何粉丝';
		}
		$("#follow_font .no-item").css({'width':200}).text(noItemTxt);
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
</body>
</html>