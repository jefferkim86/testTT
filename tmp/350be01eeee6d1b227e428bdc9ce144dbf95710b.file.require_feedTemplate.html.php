<?php /* Smarty version Smarty-3.0.6, created on 2014-07-26 00:24:33
         compiled from "tplv2/require_feedTemplate.html" */ ?>
<?php /*%%SmartyHeaderCode:143428077153d284c14f7715-05350913%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '350be01eeee6d1b227e428bdc9ce144dbf95710b' => 
    array (
      0 => 'tplv2/require_feedTemplate.html',
      1 => 1406305470,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '143428077153d284c14f7715-05350913',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<script type="text/template" id="J-cmtList">

    <div class="logo">
        <a href="${logoUrl}">
         <img src="${logo}"/>
        </a>
    </div>
    <div class="cmt-desc">
        <p>
         <span><a href="#">${userName}</a>:</span>
            ${msg}
        </p>
        <div class="reply">
          <a href="#" class="J_Reply">回复</a>
        </div>
    </div>

</script>

<script type="text/template" id="J-feedLayout">

    <div class="feed feed-${feedType} clearfix" id="J-blog-${bid}">
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
                <a href="${feedLink}">${time}</a>
            </div>
            <div class="feed-hd">
                <div class="merc-name"><a href="${avatarHref}">${username}</a></div>
            </div>
            <div class="feed-bd">
            {@if forwardData}
                <div class="feed-title clearfix">
                    ${feedForwardContent}
                </div>
                
                 <div  id="J-forwardBlog-${forwardData.bid}" class="feed feed-${feedType} feed-forward-layout clearfix">
                    <div class="feed-desc">
                        <div class="feed-hd">
                            <div class="merc-name">转自: <a href="${forwardData.h_url}">${forwardData.username}</a></div>
                        </div>
                        <div class="feed-link">
                            <a href="${forwardData.b_url}">${forwardData.time}</a>
                        </div>
                        <div class="feed-bd">
                {@/if}
                    
                    $${feedItemContent}

                {@if forwardData}
                            <div class="feed-actions J-forward-actions clearfix">
                                <div class="feed-act">
                                    <a href="" class="J_Comment">评论(<span class="J_CmtNum">${forwardData.replaycount}</span>)</a>
                                    <a href="" class="J_Forward">转发(<span class="J_FwdNum">${forwardData.forwardcount}</span>)</a>
                                    <a href="" class="J_Like">喜欢(<span class="J_LikeNum">${forwardData.likecount}</span>)</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="J_forwardFeedfoot feed-ft feed-cmt" data-bid="${forwardData.bid}">
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
                           <ul class="J_forwardList clearfix">
                                <li class="loading-list">正在加载列表</li>
                           </ul>
                        </div>
                        <div class="page-func">
                            <div class="pagination">
                                <a href="#" class="fold">收起</a>
                                <a href="#" class="comment-more">查看更多</a>
                            </div>
                        </div>
                      </div>
                    </div>
                </div>
                {@/if}
            </div>
            <div class="feed-actions J-actions clearfix">
                <span class="feed-timestamp"></span>
                <div class="feed-act">
                    <a href="#" class="J_Comment">评论(<b>${replaycount}</b>)</a>
                    <a href="#" class="J_Forward">转发(<b>${forwardcount}</b>)</a>
                    <a href="#" class="J_Like">喜欢(<b>${likecount}</b>)</a>
                </div>
            </div>
        </div>
        <div class="J_Feedfoot feed-ft feed-cmt" data-bid="${bid}">
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
               <ul class="J_forwardList clearfix">
                    <li class="loading-list">正在加载列表</li>
               </ul>
            </div>
            <div class="page-func">
                <div class="pagination">
                    <a href="#" class="fold">收起</a>
                    <a href="#" class="comment-more">查看更多</a>
                </div>
            </div>
          </div>
        </div>
    </div>
    
</script>

<script type="text/template" id="J-feedFt">

    <div class="J_Feedfoot feed-ft feed-cmt">
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
        <p>${feedContent}<span class="feed-more"><a href="${feedLink}">全部信息...</a></span></p>
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