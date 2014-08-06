<?php /* Smarty version Smarty-3.0.6, created on 2014-08-06 20:58:22
         compiled from "tplv2/require_footer.html" */ ?>
<?php /*%%SmartyHeaderCode:115636659653e2266e74ffc8-11809886%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7b20e605d333e55791698372022dff7d76772040' => 
    array (
      0 => 'tplv2/require_footer.html',
      1 => 1407326338,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '115636659653e2266e74ffc8-11809886',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div id="footer">
   
   
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
			(st > 2*winh)? $backToTopEle.show(): $backToTopEle.hide();    
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
if(Tuitui.globalData.pageNeedLoading){
    scrollLoad.init();
    $(window).bind("scroll",function() {
        scrollLoad.loadMore();
    })
    $(window).bind("resize",function() {
        scrollLoad.loadMore();
    });
}


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
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/js/router.js"></script>
<script type="text/javascript">
	new Tuitui.headerView();

    new Tuitui.Router();
    Backbone.history.start();
</script>
<script type="text/javascript" src="http://tajs.qq.com/stats?sId=35585152" charset="UTF-8"></script>
