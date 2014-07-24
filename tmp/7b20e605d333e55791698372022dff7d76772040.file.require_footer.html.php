<?php /* Smarty version Smarty-3.0.6, created on 2014-07-24 19:46:10
         compiled from "tplv2/require_footer.html" */ ?>
<?php /*%%SmartyHeaderCode:163878805553d0f2027294e7-87054983%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7b20e605d333e55791698372022dff7d76772040' => 
    array (
      0 => 'tplv2/require_footer.html',
      1 => 1406135690,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '163878805553d0f2027294e7-87054983',
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




// var container = $("#feedArea");
// function _canLoad() {

//     var h = DOM.offset(container).top + container.offsetHeight,
//         heightCondition = h - DOM.scrollTop() - host.config.distance < DOM.viewportHeight();


//     return heightCondition;
// }
// function _initCheck() {

//     // 防止ie6过早操作DOM, 去掉了以上注释的操作
//     if (_canLoad()) {
//          getFeeds();
//     }
//     else {
//         _onScroll();
//     }
// }
// function getFeeds(){
// 	feedsView.getFeeds(curPage);
// }
// var timeing;
// function _scrollFn() {

//         if (!isRun) return;

//         if (_canLoad() && STATUS == "stop") {

//             if (timeing) {
//                 clearTimeout(timeing);
//                 timeing = null;
//             }

//             timeing = setTimeout(function () {

//                 getFeeds();

//             }, 300);
//         }

//     };
// // 添加滚动条事件
// function _onScroll() {
//     //滚动事件，节流
//     $(window).bind("scroll",function() {
//     	_scrollFn();
//     }
//      $(window).bind("resize",function() {
//      	_scrollFn();
//      }
// }


// function pause() {
//     isRun = false;
// }

// function restart() {
//     isRun = true;
// }

// function destroy() {
// 	$(window).unbind("scroll",function() {
//     	_scrollFn();
//     }
//      $(window).unbind("resize",function() {
//      	_scrollFn();
//      }

//     clearTimeout(timeing);
//     timeing = null;

//     STATUS = "destroy";

// }


function getfeeds() {
    var fold = $(window).height() + $(document).scrollTop();
    var doc_height = $(document.body).height();
    var loading = $("#feed_loading");
    var curPage =  parseInt(loading.attr("currentpage"));
    var total_page =  parseInt(loading.attr("total_page")); 

    if (fold >= doc_height - 20) {
    	curPage++;
        if (total_page == 0) {
            nomore.show();
            return false
        }
        if(curPage == total_page){
        	loading.hide();
        }
        if (curPage > total_page) {
            $(window).unbind("scroll");
            
        } else {
            $(window).unbind("scroll");
            loading.show();
            G_LoadMore(curPage);
        }
    }
}
$(window).bind("scroll",function() {
	setTimeout(function () {
		getfeeds()
	},300);
})
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