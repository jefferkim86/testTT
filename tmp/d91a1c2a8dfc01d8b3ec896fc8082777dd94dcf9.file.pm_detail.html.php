<?php /* Smarty version Smarty-3.0.6, created on 2014-01-19 22:00:48
         compiled from "tplv2/pm_detail.html" */ ?>
<?php /*%%SmartyHeaderCode:15487039952dbda909d10b0-36636225%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd91a1c2a8dfc01d8b3ec896fc8082777dd94dcf9' => 
    array (
      0 => 'tplv2/pm_detail.html',
      1 => 1341232434,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15487039952dbda909d10b0-36636225',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("require_header.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('loadedit','yes'); echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<script>

$(document).ready(function(){ 
	var uid = $('#touid').val();
	pmdetail(uid);

	$('#send_submit').click(function(){
	if($('#touser').val() == ''){
		waring('请等待页面载入');
		return false;
	}
		var name = $('#touser').val();
		var txt  = $('#textarea').val();
		if(txt == ''){
			waring('发信内容不能为空');
			return false;
		}
		$('#pm_loading,#send_submit').toggle();
		$.ybAPI('pm','sendpm',{username:name,body:txt},function(data){
			$('#pm_loading,#send_submit').toggle();
			if(data.status == 0){
				waring(data.msg);
			}else{
				$('#niname,#textarea').val('');
				pmdetail(uid);
			}
		});
	})
})

</script>
<div id="index">
    <div id="article">
		
		<div id="pm_detail">
		    <div class="det_title">
			    <div class="det_return"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'pm'),$_smarty_tpl);?>
" >返回列表</a></div>
				<div class="det_info">与 <span id="tousername"></span> 的私信对话</div>
			</div>
			<div class="det_con">
			    <div class="det_post">
				    <div class="avatar"><a href="<?php echo goUserHome(array('domain'=>$_SESSION['domain'],'uid'=>$_SESSION['uid']),$_smarty_tpl);?>
" target="_blank"><img src="<?php echo avatar(array('uid'=>$_SESSION['uid'],'size'=>'middle'),$_smarty_tpl);?>
" alt="<?php echo $_SESSION['username'];?>
" class="face"/></a></div>
				    <div class="postbox"><textarea name="textarea" id="textarea"></textarea></div>
					<div class="postarea">
					    <a id="send_submit"><span>发送</span></a>
						<div class="sub_loading" id="pm_loading" style="margin:0; display:none;"></div>
						<div class="text_limit">你还可以输入500字</div>
						<input type="hidden" id="touid" title="touid" value="<?php echo $_smarty_tpl->getVariable('touid')->value;?>
" />
						<input type="hidden" id="touser" title="touser" value="<?php echo $_smarty_tpl->getVariable('tousername')->value;?>
" />
					</div>
					<div class="clear"></div>
				</div>
				<div id="feed_loading" style="margin-left:275px;"></div>
				<div class="det_list"></div>
			</div>
			<div id="paging"></div>
		</div>
		

		<div class="pm_none follow_font" id="follow_font" style="display:none;">
			 <h2>您还没有相关对话</h2>
		</div>
			
		

	</div>
	<div id="aside">
        <?php $_template = new Smarty_Internal_Template("require_sider.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
    </div>
</div>
<?php $_template = new Smarty_Internal_Template("require_footer.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>