<?php /* Smarty version Smarty-3.0.6, created on 2014-07-24 21:41:40
         compiled from "tplv2/index.html" */ ?>
<?php /*%%SmartyHeaderCode:111856471053d10d14d81e35-42558160%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c1542c66fd69d13319a6782e135b83f629ebe08c' => 
    array (
      0 => 'tplv2/index.html',
      1 => 1406205246,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '111856471053d10d14d81e35-42558160',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("require_header.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('gallery','yes'); echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

<div id="index">
    <div id="article">

    <?php if (islogin()&&$_smarty_tpl->getVariable('yb')->value['wizard_switch']==1){?> 
       <?php $_template = new Smarty_Internal_Template("require_wizard.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?> 
    <?php }?>
fffff
<?php echo $_smarty_tpl->getVariable('memberinfo')->value;?>

    <!-- feed区域 -->
		<div id="feedArea">
			

		</div>
    <div id="feed_loading">加载中 ...</div>
		

		<?php if ($_smarty_tpl->getVariable('yb')->value['show_page_mode']==1){?>
			<div id="feedAjaxTool" page="2" max="<?php echo $_smarty_tpl->getVariable('yb')->value['show_ajax_to'];?>
" area="feedArea"  class="feedajax">
			</div>
			<script>
			$.feedToolBar.parm.morepage=true;
			$.feedToolBar.morepage('feedAjaxTool');
			</script>
		<?php }else{ ?>
			
		<div id="paging"></div>
		<div class="clear"></div>
		<?php }?>

        
        
	</div>
	<div id="aside">
        <?php $_template = new Smarty_Internal_Template("require_sider.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
    </div>
</div>
<!-- feed模板 -->
<?php $_template = new Smarty_Internal_Template("require_feedTemplate.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>


<?php $_template = new Smarty_Internal_Template("require_footer.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('top','yes'); echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

<script type="text/javascript">
    var commentsView = new Tuitui.commentsView();
    var userView = new Tuitui.userView();
    var feedsView = new Tuitui.feedsView();
    feedsView.getFeeds();
    function G_LoadMore(curPage){
        feedsView.getFeeds(curPage);
    }
</script>