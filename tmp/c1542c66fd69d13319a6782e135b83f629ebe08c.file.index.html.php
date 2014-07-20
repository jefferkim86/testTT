<?php /* Smarty version Smarty-3.0.6, created on 2014-07-20 17:26:08
         compiled from "tplv2/index.html" */ ?>
<?php /*%%SmartyHeaderCode:28969094553cb8b30cb16a9-73961523%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c1542c66fd69d13319a6782e135b83f629ebe08c' => 
    array (
      0 => 'tplv2/index.html',
      1 => 1405848249,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '28969094553cb8b30cb16a9-73961523',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("require_header.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('gallery','yes'); echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>


<div id="index">
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


<!-- 
 @desc isNeedUser:如果紧接着两条feed都是同一个人则显示不一样
 -->

<script type="template" id="J_FeedTemp">


{{#list}}
    <div class="feed feed-{{clsType}} clearfix" id="blog_{{bid}}">
        {{#h_img}}
        <div class="feed-avatar">
            <a class="blog-avatar" href="{{h_url}}" title="FashionDes">
                <img src="{{h_img}}" alt=""/></a>
        </div>
        {{/h_img}}
        <!--<div class="feed-desc {{^isNeedUser}}feed-sibling{{/isNeedUser}}">-->
        <div class="feed-desc">
            <span class="pop-corner"><s class="outter"></s><s class="inner"></s></span>
            <div class="feed-link">
                <a href="">查看文章</a>
            </div>
            <div class="feed-hd">
                <div class="merc-name"><a href="#">{{username}}:</a></div>
            </div>
            <div class="feed-bd">
                <div class="feed-{{clsType}}-cont clearfix">
                   {{#isPicFeed}}
                    <div class="feed-photo-img">
                      <div class="feed-photo-layout feed-layout5 clearfix">
                       {{#attr.img}}
                         <div class="feed-photo-cell" style="{{picItem.css}}">
                            <img src="{{url}}" class="feed-img"/>
                         </div>
                       {{/attr.img}}
                      </div>
                    </div>
                    <div class="feed-photo-desc">
                        <p>{{item.content}} {{#hasMore}}<span class="feed-more"><a href="{{moreLike}}">全部信息...</a></span>{{/hasMore}}</p>
                    </div>
                    {{/isPicFeed}}
                    {{#isTxtFeed}}
                       <h3 class="feed-text-title">【{{title}}】</h3>
                       <div class="feed-text-p clearfix">
                        {{body}}
                        <span class="feed-more"><a href="{{b_url}}">全部信息...</a></span>
                       </div>
                    {{/isTxtFeed}}

                    <div class="feed-actions clearfix">
                           <span class="feed-timestamp">
                               5分钟前
                           </span>
                        <div class="feed-act">
                            <a href="#" class="J_Comment" data-id="{{bid}}">评论(<span class="J_CmtNum">9</span>)
                             <span class="pop-foot-corner"><s class="outter"></s><s class="inner"></s></span>
                            </a>
                            <a href="" class="J_Forward">转发(<span class="J_FwdNum">43</span>)
                            <span class="pop-foot-corner"><s class="outter"></s><s class="inner"></s></span>
                            </a>
                            <a href="" class="J_Like">喜欢(<span class="J_LikeNum">99</span>)
                            <span class="pop-foot-corner"><s class="outter"></s><s class="inner"></s></span>
                            </a>
                            <a href="" class="J_LikeStar">like</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="J_Feedfoot feed-ft feed-cmt" data-reply="" data-bid="{{bid}}" id="comment_{{bid}}">
            <span class="pop-foot-corner"><s class="outter"></s><s class="inner"></s></span>
            <div class="cmtbox">
                <div class="J_CommentWrap">
                    <div class="cmt-box">
                        <input class="J_CmtCnt" type="text"/>
                        <input type="button" class="cmt-btn J-sendReply" value="评论"/>
                    </div>
                    <ul class="J_CmtList cmt-list clearfix">
                        <li class="loading-list">正在加载列表</li>
                    </ul>
                </div>
            </div>
            <div id="Pagination_{{bid}}" class="pagination"></div>
        </div>
    </div>
    {{/list}}

</script>

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




<script type="text/javascript">
  //  new feedComment();

 


	$(document).ready(function(){ 
		yb_load_feeds('blog','feeds');

	})
</script>
<?php $_template = new Smarty_Internal_Template("require_footer.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('top','yes'); echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>


<script type="text/javascript">
    
    //评论
    new Tuitui.commentsView();
    new Tuitui.userView();

</script>