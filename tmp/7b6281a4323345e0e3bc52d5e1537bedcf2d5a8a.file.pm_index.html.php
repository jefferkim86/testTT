<?php /* Smarty version Smarty-3.0.6, created on 2014-07-16 20:58:55
         compiled from "tplv2/pm_index.html" */ ?>
<?php /*%%SmartyHeaderCode:189376489453c6770f4bb167-63903252%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7b6281a4323345e0e3bc52d5e1537bedcf2d5a8a' => 
    array (
      0 => 'tplv2/pm_index.html',
      1 => 1341154842,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '189376489453c6770f4bb167-63903252',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("require_header.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('loadedit','yes'); echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<script>

$(document).ready(function(){ 
	pmlist();
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
<div id="index">
    <div id="article">
	    
		<div id="pm_title">
	        <div class="post_bg">
	            <a href="javascript:;" onclick="pmlist()"><span class="current" id="pm_list">我的私信</span></a>
				<a href="javascript:;" onclick="openPmpost()"><span id="pm_post">发送私信</span></a>
		    </div>
			<div class="clear"></div>
	    </div>
		
	    <div id="pm_index">
		    <div id="feed_loading" style="margin-left:275px;"></div>
			<div class="pm_list"></div>
			
			<div class="pm_post" id="pm_send" style="display:none">
			    <div class="pp_con">
				    <div class="pp_title"><input type="text" id="niname" class="iptname"><span>收信人昵称</span></div>
					<div class="pp_content">
					    <textarea name="textarea" id="textarea"></textarea>
					</div>
					<div class="pp_btn">
					    <a href="javascript:;" id="send_submit"><span>发送</span></a>
						<div class="sub_loading" id="pm_loading" style="display:none;padding-left:20px"></div>
					</div>
				</div>
			</div>
			
		</div>
		
		<div class="pm_none follow_font" id="follow_font" style="display:none;">
			 <h2>您还没有私信</h2>
		</div>
			
		<div id="paging"></div>

	</div>
	<div id="aside">
        <?php $_template = new Smarty_Internal_Template("require_sider.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
    </div>
</div>
<?php $_template = new Smarty_Internal_Template("require_footer.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>