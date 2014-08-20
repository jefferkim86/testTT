<?php /* Smarty version Smarty-3.0.6, created on 2014-08-20 22:04:01
         compiled from "/Users/jinjianfeng/Documents/work/tuitui/tplv2/theme/default/list.html" */ ?>
<?php /*%%SmartyHeaderCode:59373985253f4aad1ed0209-04229731%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a73a814515bff07fa19d9f2dcddc54cbeb4e3b95' => 
    array (
      0 => '/Users/jinjianfeng/Documents/work/tuitui/tplv2/theme/default/list.html',
      1 => 1408542864,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '59373985253f4aad1ed0209-04229731',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("require_header.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('gallery','yes'); echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

<div id="index" class="page-detail clearfix">
    <?php $_template = new Smarty_Internal_Template("require_userInfo.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

    <div id="article">
        
	    <!-- <?php $_template = new Smarty_Internal_Template("require_post.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?> -->
		
		
		
			<?php if (isset($_smarty_tpl->getVariable('adunit',null,true,false)->value[2])&&$_smarty_tpl->getVariable('adunit')->value[2]['is_show']==1){?>
    			<!--<div id="ad_index_up"></div>
    			<script>
    				$(document).ready(function(){
    					ad_aside('#ad_index_up',2);
    					setInterval(function(){
    						ad_aside('#ad_index_up',2);
    					}, 30000);
    				})
    			</script>-->
			<?php }?>
	
	
	
		
		
        <?php if (islogin()&&$_smarty_tpl->getVariable('yb')->value['wizard_switch']==1){?> <?php $_template = new Smarty_Internal_Template("require_wizard.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?> <?php }?>
		<div id="feedArea">

		</div>
<!-- 		<div id="feed_loading" style="display:none">加载中 ...</div>
 -->
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

<!--
	<div id="feedAjaxTool" page="2" max="<?php echo $_smarty_tpl->getVariable('yb')->value['show_ajax_to'];?>
" area="feedArea" query="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main','a'=>'index','ajaxload'=>true,'type'=>$_smarty_tpl->getVariable('type')->value),$_smarty_tpl);?>
" class="feedajax">
    <a href="javascript:void(0)" onclick="continueShow('feedAjaxTool')" class="more">查看更多</a>
    <a href="javascript:void(0)" class="loading">loading...</a>
    <a href="javascript:void(0)" class="nomore">暂时没有更多内容</a>
    </div>
	-->
		<script>//$.feedToolBar('feedAjaxTool');</script>
        
        
        
	</div>
	<div id="aside">
        <?php $_template = new Smarty_Internal_Template("require_siderUser.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
    </div>
</div>


<?php $_template = new Smarty_Internal_Template("require_feedTemplate.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<script type="text/javascript">
	Tuitui.globalData.pageNeedLoading = false;
</script>

<?php $_template = new Smarty_Internal_Template("require_footer.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('top','yes'); echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

<script type="text/javascript">
function getQueryString(name){
	    if(location.href.indexOf("?")==-1 || location.href.indexOf(name+'=')==-1) {
	        return '';
	    }
	     var queryString = location.search.substring(location.search.indexOf("?")+1);
	     var parameters = queryString.split("&");
	    var pos, paraName, paraValue;
	    for(var i=0; i<parameters.length; i++){
	        pos = parameters[i].indexOf('=');
	        if(pos == -1) { continue; }
	         paraName = parameters[i].substring(0, pos);
	        paraValue = parameters[i].substring(pos + 1);
	         if(paraName == name){
	            return unescape(paraValue.replace(/\+/g, " "));
	        }
	    }
	    return '';
	};

	var bid = <?php echo $_smarty_tpl->getVariable('bid')->value;?>
;
    var G_PAGE = 'detail';
    var commentsView = new Tuitui.commentsView();
    var userView = new Tuitui.userView();
    var feedsView = new Tuitui.feedsView();
    feedsView.getFeedDetail(bid);

</script>
</body>
</html>