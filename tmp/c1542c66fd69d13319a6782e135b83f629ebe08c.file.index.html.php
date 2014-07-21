<?php /* Smarty version Smarty-3.0.6, created on 2014-07-21 16:54:01
         compiled from "tplv2/index.html" */ ?>
<?php /*%%SmartyHeaderCode:102727085353ccd5293a7287-98230392%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c1542c66fd69d13319a6782e135b83f629ebe08c' => 
    array (
      0 => 'tplv2/index.html',
      1 => 1405932839,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '102727085353ccd5293a7287-98230392',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("require_header.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('gallery','yes'); echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

<div id="index">
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
			<div id="feed_loading"></div>
			<div id="feed_box" class="feed-list">
				




			</div>

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



<script type="text/template" id="J-cmtList">

    <div class="logo">
        <a href="{{logoUrl}}">
         <img src="{{logo}}"/>
        </a>
    </div>
    <div class="cmt-desc">
        <p>
         <span><a href="#">{{userName}}</a>:</span>
            {{msg}}
        </p>
        <div class="reply">
          <a href="#" class="J_Reply">回复</a>
        </div>
    </div>

</script>


<script type="text/template" id="J-feedLayout">

    <div class="feed feed-${feedType} clearfix">
        <div class="feed-avatar">
            <a class="blog-avatar" href="${avatarHref}" title="FashionDes">
                <img src="${avatar}" alt=""/>
            </a>
        </div>
        <div class="feed-desc">
            <span class="pop-corner">
                <s class="outter"></s><s class="inner"></s>
            </span>
            <div class="feed-link">
                <a href="${feedLink}">查看文章</a>
            </div>
            <div class="feed-hd">
                <div class="merc-name"><a href="#">${username}:</a></div>
            </div>
            <div class="feed-bd">
                {@if forwardData}
                 <div class="feed feed-{{feedType}} feed-forward-layout clearfix">
                    <div class="feed-desc">
                        <span class="pop-corner"><s class="outter"></s><s class="inner"></s></span>
                        <div class="feed-hd">
                            <div class="merc-name"><a href="${forwardData.h_url}">${forwardData.username}:</a></div>
                        </div>
                        <div class="feed-bd">
                {@/if}
                    
                    $${feedItemContent}

                {@if forwardData}
                        </div>
                    </div>
                </div>
                {@/if}
            </div>
            <div class="feed-actions clearfix">
                <span class="feed-timestamp">${time}</span>
                <div class="feed-act">
                    <a href="#" class="J_Comment">评论(<b>${feedcount}</b>)</a>
                    <a href="#" class="J_Forward">转发(<b>${replaycount}</b>)</a>
                    <a href="#" class="J_Like">喜欢(<b>${likeNum}</b>)</a>
                    <a href="#" class="J_LikeStar">like</a>
                </div>
            </div>

        </div>
    </div>
    
</script>

<script type="text/template" id="J-feedTxt">

  <div class="feed-text-cont clearfix">
    <h3 class="feed-text-title">${feedTitle}</h3>
    <div class="feed-text-p clearfix">
       ${feedContent}
      <span class="feed-more"><a href="${feedLink}">全部信息...</a></span>
    </div>
   </div>

</script>
<script type="text/template" id="J-feedPhoto">

<div class="feed-photo-cont clearfix">
    <div class="feed-photo-img">
        <div class="feed-photo-layout feed-layout${layoutType} clearfix">
           {@each pics as item,index}
           <div style="color:red">${index}</div>
            <div class="feed-photo-cell" style="${position[index].style}">
               <img class="feed-img" src="${item.url}">
            </div>
           {@/each}
        </div>
        <div class="feed-original-pic clearfix" style="display: none;">
            {@each pics as item,index}
           <div class="feed-original-cell">
             <img class="feed-img" data-original="${item.desc}" width="580" src="http://img01.taobaocdn.com/tps/i1/T1K1WSXhFbXXXXXXXX-683-1024.jpg">
              <div class="original-desc">${item.url}</div>
            </div>
            {@/each}
        </div>
    </div>

    <div class="feed-photo-desc">
        <p>${feedContent}<span class="feed-more"><a href="{{feedLink}}">全部信息...</a></span></p>
    </div>
</div>

</script>
<script type="text/template" id="J-feedGood">

    <div class="feed-good-cont clearfix">
       <div class="feed-good-info">
        <div class="feed-good-img">
            <img src="${goodPic}">
        </div>
        <div class="feed-good-property">
              <h3 class="feed-good-title">${goodTitle}</h3>
             <div class="feed-good-fee">
                <ul>
                 <li><span>价格：</span><del>${oPrice}</del>元</li>
                 <li><span>促销：</span><span class="price">${price}元</span></li>
                 <li><span>运费：</span>${fee}元</li>
                 <li><a href="${feedLink}" class="view-good" target="_blank">查看宝贝</a></li>
                </ul>
             </div>
        </div>
       </div>
        <div class="feed-good-desc-wrap">
            <div class="feed-good-desc clearfix">
                <div class="for-line">
                    <div class="pop-corner-desc"><s class="outter"></s><s class="inner"></s></div>
                    <div class="feed-good-txt">
                        <p>${feedContent}<span class="feed-more"><a href="${feedLink}">全部信息...</a></span></p>
                    </div>
                </div>
            </div>
        </div>

    </div>

</script>



<script type="text/javascript">
  //  new feedComment();

 


	$(document).ready(function(){ 
		//yb_load_feeds('blog','followfeeds');
      //yb_load_feeds('blog','feeds');
        

	})
</script>
<?php $_template = new Smarty_Internal_Template("require_footer.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('top','yes'); echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

<script type="text/javascript" src=""></script>
<script type="text/javascript">
    
    new Tuitui.feedsView();
    //评论
    new Tuitui.commentsView();
    new Tuitui.userView();

</script>