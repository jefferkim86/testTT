<?php /* Smarty version Smarty-3.0.6, created on 2014-08-12 11:47:00
         compiled from "tplv2/user_searchUser.html" */ ?>
<?php /*%%SmartyHeaderCode:194492137853e98e346fe9e2-58100031%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ec1ed0c1f770e33372a2c1c48b545ea582a54f90' => 
    array (
      0 => 'tplv2/user_searchUser.html',
      1 => 1407814915,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '194492137853e98e346fe9e2-58100031',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("require_header.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/css/follow.css">

<div id="index">
    
    <div class="search-user-page clearfix">
			

			<div class="search-user-block">
				<div class="hd">
					<label>搜索用户</label>
					<input type="text" class="search-input"/>
					<a href="#" id="search-btn">搜索</a>
					<div class="searchCount">
						共找到：<span id="count">0</span> 个相关用户
					</div>
				</div>
				<div class="bd">
					<div class="searchResult">
						

					</div>
				</div>
			</div>
	
			<div class="follow_font" id="follow_font" style="display:none">
			    <div class="no-item">没有相关的用户</div>
			</div>
		
			
		</div>
		 
		
		<div id="paging" style="margin-top:20px;"></div>
	</div>

<script type="text/template" id="J-followList">

 <div class="follow_list ${cls}" id="myfollow_${uid}">
	<div class="follow_con clearfix">
	 <div class="follow_btn" id="follow_unlink_${uid}">
	 	{@if followed}
	 	<button class="J-follow followed" data-uid="${uid}">取消关注</button>
	 	{@else}
	 		<button class="J-follow" data-uid="${uid}">加关注</button>
	 	{@/if}
	 </div>
	<div class="avatar">	       
	  <a href="${h_url}" target="_blank" title="${username}">
		 	<img src="${h_img}" alt="${username}" title="${username}" class="face"/>
	   </a>
	</div>
					
	<div class="userinfo">
		<li class="title"><a href="${h_url}" target="_blank">${username}</a></li>
		<li class="userdata">
			<span class="blogs">动态:<b>${num}</b></span>
			<span>关注:<b>${flow}</b></span>
			<span class="fans">粉丝:<b>${flowme}</b></span>
		</li>
		{@if desc}<li class="desc">简介:${desc}</li>{@/if}
	</div>

	</div>

</div>


</script>	
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/js/view/userView.js"></script>

<script type="text/javascript">
function getQueryString(name){
    if(location.href.indexOf("?")==-1 || location.href.indexOf(name+'=')==-1) {
        return '';
    }
     var queryString = location.href.substring(location.href.indexOf("?")+1);
     var parameters = queryString.split("&");
    var pos, paraName, paraValue;
    for(var i=0; i<parameters.length; i++){
        pos = parameters[i].indexOf('=');
        if(pos == -1) { continue; }
         paraName = parameters[i].substring(0, pos);
        paraValue = parameters[i].substring(pos + 1);
         if(paraName == name){
            return unescape(decodeURIComponent(paraValue).replace(/\+/g, " "));
        }
    }
    return '';
};
var tpl = juicer($("#J-followList").html());
$("#search-btn").on("click",function(e){
	e.preventDefault();
	var searchVal = $(".search-input").val();
	if(searchVal){
		searchUser(searchVal);
	}
});
var queryUser = getQueryString('name');
if(queryUser){
	$(".search-input").val(queryUser);
	searchUser(queryUser);
}
$(".search-input").keypress(function(event) {
    var keycode = event.which;
    if (keycode == 13) {
    	var username = $(".search-input").val();
        searchUser(username);
    }
})

function searchUser(username,pageNo){
	getApi('user', 'searchbyusername', {
        'username': username,
        'page_no': pageNo || 1
    }, function(resp) {
        
        if(resp.status== '1'){
        	var html = '';
        	if(resp.body.data){
	        	for(var i = 0,list = resp.body.data; i<list.length; i++){
	        		list[i].cls = i%2 == 0 ? 'even' : '';
	        		list[i].followed = list[i].id != null;
	        		html += tpl.render(list[i]);
	        	}
        		$(".searchResult").html(html);
        	}else{
        		$(".searchResult").html('<div class="no-item">没有相关的用户</div>');
        	}

    		var page = resp.body.page;
    		if(page){
    			$("#count").text(page.total_count);
    		}else{
    			$("#count").text(0);
    		}
        	
        	//resp.body.page.total_page = 100;
        	if(resp.body.page && resp.body.page.total_page >1 && !$(".pagination").length ){
        		$("#paging").twbsPagination({
		            totalPages: resp.body.page.total_page,
		            visiblePages: 7,
		            onPageClick: function(event, pageNo) {
		                searchUser(username,pageNo);
		            }
		        });
        	}


        }else{
        	tips(resp.msg);
        }

    });
}


	new Tuitui.userView();
</script>
<?php $_template = new Smarty_Internal_Template("require_footer.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
</body>
</html>