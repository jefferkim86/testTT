<?php /* Smarty version Smarty-3.0.6, created on 2014-07-10 21:31:07
         compiled from "tplv2/require_footer.html" */ ?>
<?php /*%%SmartyHeaderCode:92199292253be959b0e59e5-42824931%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7b20e605d333e55791698372022dff7d76772040' => 
    array (
      0 => 'tplv2/require_footer.html',
      1 => 1363077468,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '92199292253be959b0e59e5-42824931',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div id="footer">
   <div id="copy">
    <?php  $_smarty_tpl->tpl_vars['cate'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('custompage_cate')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['cate']->key => $_smarty_tpl->tpl_vars['cate']->value){
?>
      <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'site','page'=>$_smarty_tpl->tpl_vars['cate']->value['tags']),$_smarty_tpl);?>
" title="<?php echo $_smarty_tpl->tpl_vars['cate']->value['title'];?>
"><?php echo $_smarty_tpl->tpl_vars['cate']->value['title'];?>
</a>
	<?php }} ?>
      <a href="http://www.thinksaas.cn/index.php/group/group/groupid-129" target="_blank" class="powered">Powered by Dudu <b><?php echo $_smarty_tpl->getVariable('yb')->value['version'];?>
</b></a> ©2011-2013 <?php echo $_smarty_tpl->getVariable('yb')->value['site_icp'];?>
 <?php echo $_smarty_tpl->getVariable('yb')->value['site_count'];?>

   </div>
   <div class="clear"></div>
</div>

<?php if ($_smarty_tpl->getVariable('top')->value=='yes'){?>
<script>
$(document).ready(function(){
	(function() {
		var $backToTopTxt = "返回顶部", $backToTopEle = $('<div class="backToTop"></div>').appendTo($("body"))
			.text($backToTopTxt).attr("title", $backToTopTxt).click(function() {
				$("html, body").animate({ scrollTop: 0 }, 120);
		}), $backToTopFun = function() {
			var st = $(document).scrollTop(), winh = $(window).height();
			(st > 0)? $backToTopEle.show(): $backToTopEle.hide();    
			//IE6下的定位
			if (!window.XMLHttpRequest) {
				$backToTopEle.css("top", st + winh - 166);    
			}
		};
		$(window).bind("scroll", $backToTopFun);
		$(function() { $backToTopFun(); });
	})();
});
</script>
<?php }?>
