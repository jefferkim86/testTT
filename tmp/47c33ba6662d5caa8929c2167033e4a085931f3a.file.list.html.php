<?php /* Smarty version Smarty-3.0.6, created on 2012-12-22 03:13:16
         compiled from "E:\PDENV\data\yunbian.tt/tplv2/theme/default/list.html" */ ?>
<?php /*%%SmartyHeaderCode:498250d4b4ccd29076-58696139%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '47c33ba6662d5caa8929c2167033e4a085931f3a' => 
    array (
      0 => 'E:\\PDENV\\data\\yunbian.tt/tplv2/theme/default/list.html',
      1 => 1341232386,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '498250d4b4ccd29076-58696139',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("theme/default/header.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('titles',$_smarty_tpl->getVariable('data')->value['title']); echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<?php $_template = new Smarty_Internal_Template("require_models_js.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

<div id="wrap">

    <div id="main">
	<?php $_template = new Smarty_Internal_Template("theme/default/userheader.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
	
		<div id="mytag">
		<?php if (!empty($_smarty_tpl->getVariable('data',null,true,false)->value[0]['tag'])){?>
			<?php  $_smarty_tpl->tpl_vars['d'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value[0]['tag']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['d']->key => $_smarty_tpl->tpl_vars['d']->value){
?>
		    <li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'blog','a'=>'tag','tag'=>$_smarty_tpl->tpl_vars['d']->value),$_smarty_tpl);?>
"><span><?php echo $_smarty_tpl->tpl_vars['d']->value;?>
</span></a></li>
			<?php }} ?>
		<?php }?>
		
			<div class="clear"></div>
		</div>
		
		<div id="feedArea">
			<script type="text/javascript">
				$(document).ready(function(){  
					yb_load_feeds('blog','getOneBlog',{
					bid:<?php echo $_smarty_tpl->getVariable('bid')->value;?>

					}
				);	
				})
			</script>
			<div id="feed_loading"></div>
			<div id="feed_box"></div>
			<div class="clear"></div>
			

			<?php if (isset($_smarty_tpl->getVariable('adunit',null,true,false)->value[6])&&$_smarty_tpl->getVariable('adunit')->value[6]['is_show']==1){?>
				<div id="ad_theme_list"></div>
				<script>
					$(document).ready(function(){
						ad_aside('#ad_theme_list',6);
							setInterval(function(){
								ad_aside('#ad_theme_list',6);
							}, 30000);
					})
				</script>
			<?php }?>
			
			<div class="favatitle">谁喜欢<span><?php echo $_smarty_tpl->getVariable('fava')->value['count'];?>
</span></div>
			<?php if ($_smarty_tpl->getVariable('fava')->value['count']!=0){?>
			<div class="fava">
			
				<?php  $_smarty_tpl->tpl_vars['d'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('fava')->value['rs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['d']->key => $_smarty_tpl->tpl_vars['d']->value){
?>
				<a href="<?php echo goUserHome(array('domain'=>$_smarty_tpl->tpl_vars['d']->value['domain'],'uid'=>$_smarty_tpl->tpl_vars['d']->value['uid']),$_smarty_tpl);?>
" title="<?php echo $_smarty_tpl->tpl_vars['d']->value['username'];?>
 - <?php echo ybtime(array('time'=>$_smarty_tpl->tpl_vars['d']->value['time']),$_smarty_tpl);?>
"><img src="<?php echo avatar(array('uid'=>$_smarty_tpl->tpl_vars['d']->value['uid'],'size'=>'small'),$_smarty_tpl);?>
" alt="<?php echo $_smarty_tpl->tpl_vars['d']->value['username'];?>
"/></a>
				<?php }} ?>  
			    <div class="clear"></div>
			</div>
			<?php }?>
			
			<div id="comment"></div>
			<script>
				$(document).ready(function(){  
					loadCommend('comment',<?php echo $_smarty_tpl->getVariable('bid')->value;?>
);
				});
			</script>

		</div>
	
	</div>
	
	<div id="aside">
    <?php $_template = new Smarty_Internal_Template("theme/default/aside.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
	</div>

</div>

<?php $_template = new Smarty_Internal_Template("theme/default/footer.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>