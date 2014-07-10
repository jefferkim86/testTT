<?php /* Smarty version Smarty-3.0.6, created on 2012-12-22 00:00:36
         compiled from "tplv2\theme/default/footer.html" */ ?>
<?php /*%%SmartyHeaderCode:693750d487a4e99ab4-37307940%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '513780f178fe93de8c73a3e9036f7ad2020acaa0' => 
    array (
      0 => 'tplv2\\theme/default/footer.html',
      1 => 1341154870,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '693750d487a4e99ab4-37307940',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>


<div id="foorer">
©<a href="<?php echo $_smarty_tpl->getVariable('url')->value;?>
/<?php echo $_smarty_tpl->getVariable('domain')->value;?>
"><?php echo $_smarty_tpl->getVariable('username')->value;?>
</a>| Powered by<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main','a'=>'index'),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->getVariable('yb')->value['soft'];?>
 <b><?php echo $_smarty_tpl->getVariable('yb')->value['version'];?>
</b></a>
</div>
</div>
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
</body>
</html>
