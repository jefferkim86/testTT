<?php /* Smarty version Smarty-3.0.6, created on 2014-07-24 19:59:53
         compiled from "/Users/jinjianfeng/Documents/work/tuitui2/tplv2/theme/default/index.html" */ ?>
<?php /*%%SmartyHeaderCode:186738539353d0f539e4f535-31197330%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9ee6e9f966e83e03c6c5abc0e52b6007790cb944' => 
    array (
      0 => '/Users/jinjianfeng/Documents/work/tuitui2/tplv2/theme/default/index.html',
      1 => 1406194436,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '186738539353d0f539e4f535-31197330',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("require_header.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('gallery','yes'); echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

<div id="index" class="mypage">
    <?php $_template = new Smarty_Internal_Template("require_userInfo.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

    <div id="article">

		
		
        <?php if (islogin()&&$_smarty_tpl->getVariable('yb')->value['wizard_switch']==1){?> <?php $_template = new Smarty_Internal_Template("require_wizard.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?> <?php }?>
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
        <?php $_template = new Smarty_Internal_Template("require_siderUser.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
    </div>
</div>


<?php $_template = new Smarty_Internal_Template("require_feedTemplate.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>


<?php $_template = new Smarty_Internal_Template("require_footer.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('top','yes'); echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

<script type="text/javascript" src=""></script>
<script type="text/javascript">
	//TODO:获取页面
    var commentsView = new Tuitui.commentsView();
    var userView = new Tuitui.userView();
    var feedsView = new Tuitui.feedsView();
    feedsView.getMyFeeds();
    function G_LoadMore(curPage){
        feedsView.getMyFeeds(curPage);
    }
</script>