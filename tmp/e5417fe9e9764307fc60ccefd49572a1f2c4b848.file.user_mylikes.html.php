<?php /* Smarty version Smarty-3.0.6, created on 2014-07-05 13:28:11
         compiled from "tplv2/user_mylikes.html" */ ?>
<?php /*%%SmartyHeaderCode:188976787352d934711a4db9-94686786%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e5417fe9e9764307fc60ccefd49572a1f2c4b848' => 
    array (
      0 => 'tplv2/user_mylikes.html',
      1 => 1404372062,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '188976787352d934711a4db9-94686786',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("require_header.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('gallery','yes'); echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<script type="text/javascript">
$(document).ready(function(){ 
	do_run_like();
})
</script>
<div id="index">
    <div id="article">
	<?php $_template = new Smarty_Internal_Template("require_post.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
	    <div class="clear"></div>
		<div id="userpost">
	        <div class="post_bg">
	            <a href="javascript:void(0)" onclick="do_run_like()"><span class="current">我喜欢的</span></a>
		    </div>
	    </div>
	    <div class="clear"></div>
		<div id="feedArea">
			<div id="feed_loading"></div>
			<div id="feed_box"></div>
			<!-- 内容为空  -->
			<div class="feed_none" id="feed_none" style="display:none">
			    <div class="follow_font">
			        <h2>暂时没有喜欢的内容</h2>
			    </div>
			</div>
			<!-- over -->
			
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