<?php /* Smarty version Smarty-3.0.6, created on 2014-08-10 10:41:52
         compiled from "tplv2/user_mymessage.html" */ ?>
<?php /*%%SmartyHeaderCode:94424019753e6dbf062ffc7-41288575%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8422175a9f72652db45489a042cb4889d853c445' => 
    array (
      0 => 'tplv2/user_mymessage.html',
      1 => 1407638511,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '94424019753e6dbf062ffc7-41288575',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("require_header.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('loadedit','yes'); echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/css/follow.css">

<div id="index">
    <div id="article">

    	<div class="all-msg">
			<div id="msg">
				<div class="hd">
	    			<h2>系统消息 <span><b class="J-tab-all_count"></b></span></h2>
	    		</div>
	    		<div class="bd" id="J-pmList">

				 <div class="list-block">
				 	<div class="tab-holder" id="J-Msgtab">
						<ul>
							<li class="cur" type="comment"><a href="javascript:void(0)">评论<span class="J-tab-reply_count"></span></a></li>
							<li type="forward"><a href="javascript:void(0)">转发<span class="J-tab-forward_count"></span></a></li>
							<li type="like"><a href="javascript:void(0)">喜欢<span class="J-tab-like_count"></span></a></li>
							<li type="follow"><a href="javascript:void(0)">关注<span class="J-tab-follow_count"></span></a></li>
						</ul>
					</div>

					<div id="list-content">
							


					</div>
				 </div>
					
	

					   
				</div>
				
			</div>
			<div id="J-pagination" class="page-pagination">
					
			</div>
    	</div>

	</div>
	<div id="aside">
        <?php $_template = new Smarty_Internal_Template("require_sider.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
    </div>
</div>

<script type="text/template" id="J-msgAllList">
 <div class="follow_list clearfix ${last}" data-muid="${muid}" data-bid="${bid}"id="myfollow_${id}">
  <div class="follow_con clearfix">
	 <div class="avatar">	       
	  <a href="${h_url}" title="">
		 	<img src="${h_img}" alt="" title=""/>
	   </a>
	 </div>	
	 <div class="userinfo">
		<li class="title">
			<a href="${h_url}" class="username">${username}</a><span class="action">$${action}</span>
			<a href="${location}" class="topic">${topic}</a>
			{@if notread}<span class="not-read"></span>{@/if}
		</li>
		<li class="userdata">${info}</li>
	 </div>
	 <div class="oper">
	 	<span class="time">${time}</span>
	 	<div class="handler">
	 		{@if actionCls}<a href="#" class="msg-reply ${actionCls}" data-reply-to="${username}" data-type="${actionCls}">${actionName}</a>{@/if}
	 	</div>
	 </div>
  </div>
</div>
</script>
<script type="text/template" id="J-ft">
	<div class="msg-ft" style="display:none;">
		<span class="pop-foot-corner"><s class="outter"></s><s class="inner"></s></span>
		<div class="textarea">
			<textarea cols="30" rows="10"></textarea>
			<input type="button" value="${actionBtnTxt}" data-type="${actionType}" data-reply-to="${replyTo}" class="submit-btn J-submit-msg"/>
		</div>
	</div>
</script>


<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/js/view/messageView.js"></script>
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
	            return unescape(paraValue.replace(/\+/g, " "));
	        }
	    }
	    return '';
	};
	var tabParam = getQueryString('tab');
	var curTab = tabParam || 'comment';
	var tabs = $("#J-Msgtab li");
	tabs.each(function(node){
		if($(this).attr('type') == curTab){
			$(this).addClass('cur');
		}else{	
			$(this).removeClass('cur');
		}
	})


	var opt = {
		'type':curTab,
		'pageNo':1,
		'listEl':'#list-content',
		'pagination':'#J-pagination'
	};
	var messageView = new Tuitui.messageView();
	messageView.getMsgListByType(opt);
</script>

<?php $_template = new Smarty_Internal_Template("require_footer.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
</body>
</html>