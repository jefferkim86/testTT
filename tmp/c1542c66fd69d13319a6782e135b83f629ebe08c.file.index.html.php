<?php /* Smarty version Smarty-3.0.6, created on 2014-07-10 21:11:44
         compiled from "tplv2/index.html" */ ?>
<?php /*%%SmartyHeaderCode:160321572853be9110a1c479-43148309%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c1542c66fd69d13319a6782e135b83f629ebe08c' => 
    array (
      0 => 'tplv2/index.html',
      1 => 1404997903,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '160321572853be9110a1c479-43148309',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("require_header.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('gallery','yes'); echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>



<div id="index">
	fdsafdsajl
    <div id="article">
	    <?php $_template = new Smarty_Internal_Template("require_post.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
		
		
		
			<?php if (isset($_smarty_tpl->getVariable('adunit',null,true,false)->value[2])&&$_smarty_tpl->getVariable('adunit')->value[2]['is_show']==1){?>
			<div id="ad_index_up"></div>
			<script>
				$(document).ready(function(){
					ad_aside('#ad_index_up',2);
					setInterval(function(){
						ad_aside('#ad_index_up',2);
					}, 30000);
				})
			</script>
			<?php }?>
	
	
	
		
		
        <?php if (islogin()&&$_smarty_tpl->getVariable('yb')->value['wizard_switch']==1){?> <?php $_template = new Smarty_Internal_Template("require_wizard.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?> <?php }?>
		<div id="feedArea">
			<div id="feed_loading"></div>
			<div id="feed_box"></div>
			<script type="text/javascript">
				$(document).ready(function(){ 
					yb_load_feeds('blog','feeds');
				})
			</script>
		</div>
		
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
        <?php $_template = new Smarty_Internal_Template("require_sider.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
    </div>
</div>

<?php $_template = new Smarty_Internal_Template("require_footer.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('top','yes'); echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
