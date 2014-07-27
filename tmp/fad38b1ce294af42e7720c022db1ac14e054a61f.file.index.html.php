<?php /* Smarty version Smarty-3.0.6, created on 2014-07-28 00:27:15
         compiled from "/Users/jinjianfeng/Documents/work/tuitui/tplv2/theme/default/index.html" */ ?>
<?php /*%%SmartyHeaderCode:112878085853d52863251293-79266603%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fad38b1ce294af42e7720c022db1ac14e054a61f' => 
    array (
      0 => '/Users/jinjianfeng/Documents/work/tuitui/tplv2/theme/default/index.html',
      1 => 1406478384,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '112878085853d52863251293-79266603',
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
			// $.feedToolBar.parm.morepage=true;
			// $.feedToolBar.morepage('feedAjaxTool');
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
	var userid = <?php echo $_smarty_tpl->getVariable('user')->value['uid'];?>
;
    var commentsView = new Tuitui.commentsView();
    var userView = new Tuitui.userView();
    var feedsView = new Tuitui.feedsView();
    feedsView.getMyFeeds(userid);
    function G_LoadMore(userid,curPage){
        feedsView.getMyFeeds(curPage);
    }
</script>