<?php /* Smarty version Smarty-3.0.6, created on 2014-07-27 01:54:06
         compiled from "tplv2/require_footer.html" */ ?>
<?php /*%%SmartyHeaderCode:44185485453d3dec70a38f9-87217070%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7b20e605d333e55791698372022dff7d76772040' => 
    array (
      0 => 'tplv2/require_footer.html',
      1 => 1406397232,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '44185485453d3dec70a38f9-87217070',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div id="footer">
   <!-- <div id="copy">
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

   </div> -->
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

var scrollLoad = {
    init:function(){
        this.timeing = null;
        this.page = 1;
        Tuitui.globalData.canLoadFeed = false;
    },
    needLoad: function() {
        var container = $("#feedArea");
        var needLoad = $(document).scrollTop() + $(window).height() > $(document).height() - 200;
        return needLoad;
    },
    loadMore : function(){
        //canLoad 上一页返回了数据并且已经渲染
        var self = this;
        if(this.needLoad() && Tuitui.globalData.canLoadFeed){
            self.page++;
            Tuitui.globalData.canLoadFeed = false;
            if (this.timeing) {
                clearTimeout(this.timeing);
                this.timeing = null;
            }
            this.timeing = setTimeout(function () {
                G_LoadMore(self.page);
            }, 300);
        }
        if(Tuitui.globalData.end){
            $("#feed_loading").hide();
            Tuitui.globalData.canLoadFeed = false;
        }else{
            $("#feed_loading").show();
        }
    },
    destroy: function(){
        $(window).unbind("scroll");
        $(window).unbind("resize");
        clearTimeout(this.timeing);
        this.timeing = null;
        Tuitui.globalData.canLoadFeed = false;
    }
    
}

scrollLoad.init();
$(window).bind("scroll",function() {
    scrollLoad.loadMore();
})
$(window).bind("resize",function() {
    scrollLoad.loadMore();
});

</script>
<?php }?>




<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/js/model/commentModel.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/js/collection/commentCollection.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/js/view/commentItemView.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/js/view/commentsView.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/js/model/feedModel.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/js/collection/feedCollection.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/js/view/feedItemView.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/js/view/feedsView.js"></script>


<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/js/view/userView.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/js/view/headerView.js"></script>
<script type="text/javascript">
	new Tuitui.headerView();
</script>