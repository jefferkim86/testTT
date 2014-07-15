<?php /* Smarty version Smarty-3.0.6, created on 2014-07-15 19:40:47
         compiled from "tplv2/user_myreply.html" */ ?>
<?php /*%%SmartyHeaderCode:48053316253c5133f689455-76999748%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'aac2074969bfef3c415fafb67956d2c2a327b80e' => 
    array (
      0 => 'tplv2/user_myreply.html',
      1 => 1341154842,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '48053316253c5133f689455-76999748',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("require_header.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

<script type="text/javascript">
$(document).ready(function(){ 
	do_run_rp();
})
</script>

<div id="index">
    <div id="article">
	    <?php $_template = new Smarty_Internal_Template("require_post.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
	    <div class="clear"></div>
		<div id="userpost">
	        <div class="post_bg">
	            <a href="javascript:;" onclick="do_run_rp()"><span id="reply_me">我的回复</span></a>
	            <a href="javascript:;" onclick="do_run_rp(1)"><span id="reply_to">回复我的</span></a>
		    </div>
	    </div>
	    <div class="clear"></div>
		<div id="feed_loading"></div>
		<div id="feedArea"></div>
		
		<div class="feed_none" id="feed_none" style="display:none">
			<div class="follow_font">
				<h2>暂时没有回复</h2>
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
<?php $_template = new Smarty_Internal_Template("require_footer.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>