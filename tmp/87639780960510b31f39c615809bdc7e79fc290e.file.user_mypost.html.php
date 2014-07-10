<?php /* Smarty version Smarty-3.0.6, created on 2014-01-17 21:47:32
         compiled from "tplv2/user_mypost.html" */ ?>
<?php /*%%SmartyHeaderCode:154451069252d934742b5715-58806170%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '87639780960510b31f39c615809bdc7e79fc290e' => 
    array (
      0 => 'tplv2/user_mypost.html',
      1 => 1341154870,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '154451069252d934742b5715-58806170',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("require_header.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('gallery','yes'); echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<script type="text/javascript">
$(document).ready(function(){ 
	do_run_post();
})
</script>
<div id="index">
    <div id="article">
	<?php $_template = new Smarty_Internal_Template("require_post.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
	<div class="clear"></div>
	<div id="userpost">
	    <div class="post_bg">
	        <a href="javascript:;" onclick="do_run_post('')"><span class="current" id="curr_post">我发布</span></a>
	        <a href="javascript:;" onclick="do_run_post('draft')"><span id="curr_draft">草稿</span></a>
		</div>
	</div>
	<div class="clear"></div>
	<div id="feedArea">
		<div id="feed_loading"></div>
		<div id="feed_box"></div>
	</div>
	<div class="feed_none" id="feed_none" style="display:none">
		<div class="follow_font">
			<h2>暂时没有内容</h2>
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