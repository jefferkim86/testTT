<?php /* Smarty version Smarty-3.0.6, created on 2014-07-29 23:21:55
         compiled from "tplv2/pm_index.html" */ ?>
<?php /*%%SmartyHeaderCode:76053436853d7bc1376f668-12865134%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7b6281a4323345e0e3bc52d5e1537bedcf2d5a8a' => 
    array (
      0 => 'tplv2/pm_index.html',
      1 => 1406647306,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '76053436853d7bc1376f668-12865134',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("require_header.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('loadedit','yes'); echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/css/follow.css">
<script>

$(document).ready(function(){ 
	$('#send_submit').click(function(){
		var name = $('#niname').val();
		var txt  = $('#textarea').val();
		if(name == '' || txt == ''){
			waring('发信人或内容不能为空');
			return false;
		}
		$('#pm_loading,#send_submit').toggle();
		$.ybAPI('pm','sendpm',{username:name,body:txt},function(data){
			$('#pm_loading,#send_submit').toggle();
			if(data.status == 0){
				waring(data.msg);
			}else{
				tips('您的信件已经成功发送');
				$('#niname,#textarea').val('');
			}
		});
	})
})

</script>
<div id="index" class="clearfix">
    <div id="article">


    	<div class="pm">
			<div id="msg">
				<div class="hd">
	    			<h2>我的私信 <span id="J-pmcount"></span></h2>
	    			<button class="msg-hd-link" id="J-pmOverlay">发私信</button>
	    		</div>
	    		<div class="bd" id="J-pmList">

					   
				</div>
				
			</div>
			<div id="J-pagination"></div>
    	</div>

	</div>
	<div id="aside">
        <?php $_template = new Smarty_Internal_Template("require_sider.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
    </div>
</div>

<script type="text/template" id="J-popPmTpl">
<div class="pm-pop">
	<div class="hd">
		<h3>发私信</h3>
		<a href="#" class="close-pop">关闭</a>
	</div>
	<div class="bd">
		<div class="title">
			<label for="J-popPmTitle">对方昵称</label>
			<input type="text" id="J-popPmTitle" value="输入发送的昵称"/>
		</div>
		<div class="content">
			<label for="J-popPmContent">私信内容</label>
			<textarea  cols="30" rows="10" id="J-popPmContent"></textarea>
		</div>
		<input type="button" id="J-popPmSend" class="pop-submit" value="发送"/>
	</div>
</div>
</script>


<script type="text/template" id="J-followList">

 <div class="follow_list ${last}" id="myfollow_${id}">
  <div class="follow_con clearfix">
	 <div class="avatar">	       
	  <a href="${h_url}" target="_blank" title="">
		 	<img src="${h_img}" alt="" title=""/>
	   </a>
	 </div>	
	 <div class="userinfo">
		<li class="title">
			<a href="${replyUrl}" target="_blank">${tousername}</a> 
			{@if isNew}<span class="not-read"></span>{@/if}
		</li>
		<li class="userdata">${info}</li>
	 </div>
	 <div class="oper">
	 	<span class="time">${time}</span>
	 	<div class="handler">
	 		<a href="${replyUrl}" class="reply">回复</a>
	 	</div>
	 </div>
  </div>
</div>


</script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/js/view/messageView.js"></script>
<script type="text/javascript">
	var opt = {
		'listEl':'#J-pmList',
		'pagination':'#J-pagination'
	};
	var messageView = new Tuitui.messageView();
	messageView.getPmList(opt);
</script>

<?php $_template = new Smarty_Internal_Template("require_footer.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>