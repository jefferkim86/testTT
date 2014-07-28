<?php /* Smarty version Smarty-3.0.6, created on 2014-07-28 15:34:44
         compiled from "tplv2/msg_test.html" */ ?>
<?php /*%%SmartyHeaderCode:96450331753d5fd1424a544-32465486%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fe85f84d012f48685480ad9e28b528653b9a5aee' => 
    array (
      0 => 'tplv2/msg_test.html',
      1 => 1406532882,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '96450331753d5fd1424a544-32465486',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("require_header.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('loadedit','yes'); echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

<style type="text/css">
	#header{display: none;}
</style>


<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/css/follow.css">

<div id="index">
    <div id="article">

    	<div class="all-msg">
			<div id="msg">
				<div class="hd">
	    			<h2>系统消息 <span>(<b>11</b>)</span></h2>
	    		</div>
	    		<div class="bd" id="J-pmList">

				 <div class="list-block">
				 	<div class="tab-holder" id="J-Msgtab">
						<ul>
							<li class="cur" type="comment"><a href="javascript:void(0)">评论</a></li>
							<li type="forward"><a href="javascript:void(0)">转发</a></li>
							<li type="like"><a href="javascript:void(0)">喜欢</a></li>
							<li type="follow"><a href="javascript:void(0)">关注</a></li>
						</ul>
					</div>

					<div id="list-content">
							


					</div>
				 </div>
					
	

					   
				</div>
				
			</div>
			<div id="J-pagination">
					
			</div>
    	</div>

	</div>
	<div id="aside">
        <?php $_template = new Smarty_Internal_Template("require_sider.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
    </div>
</div>

<script type="text/template" id="J-msgAllList">

 <div class="follow_list clearfix ${last}" data-id="${id}" id="myfollow_${id}">
  <div class="follow_con clearfix">
	 <div class="avatar">	       
	  <a href="${h_url}" target="_blank" title="">
		 	<img src="${h_img}" alt="" title=""/>
	   </a>
	 </div>	
	 <div class="userinfo">
		<li class="title">
			<a href="${replyUrl}" target="_blank">${tousername}</a>
			<span>${topic}</span>
		</li>
		<li class="userdata">${info}</li>
	 </div>
	 <div class="oper">
	 	<span class="time">${time}</span>
	 	<div class="handler">
	 		<a href="#" class="reply J-msg-reply">回复</a>
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
			<input type="button" value="发布" class="submit-btn J-submit-msg"/>
		</div>
	</div>
</script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/js/view/messageView.js"></script>
<script type="text/javascript">
	var opt = {
		'type':'comment',
		'pageNo':1,
		'listEl':'#list-content',
		'pagination':'#J-pagination'
	};
	var messageView = new Tuitui.messageView();
	messageView.getMsgListByType(opt);
</script>

<?php $_template = new Smarty_Internal_Template("require_footer.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>