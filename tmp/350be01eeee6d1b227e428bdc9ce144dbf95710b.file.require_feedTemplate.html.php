<?php /* Smarty version Smarty-3.0.6, created on 2014-07-27 12:34:36
         compiled from "tplv2/require_feedTemplate.html" */ ?>
<?php /*%%SmartyHeaderCode:64663864153d4815cb96f87-79404226%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '350be01eeee6d1b227e428bdc9ce144dbf95710b' => 
    array (
      0 => 'tplv2/require_feedTemplate.html',
      1 => 1406435671,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '64663864153d4815cb96f87-79404226',
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

    <div class="feed feed-${feedType} clearfix {@if forwardData}is-forward{@/if}" id="J-blog-${bid}">
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
                <a href="${feedLink}" target="_blank">${time}</a>
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
                                    <a href="${forwardData.b_url}#reply" class="ft-comment">评论(<span class="J_CmtNum">${forwardData.replaycount}</span>)</a>
                                    <a href="${forwardData.b_url}#forward" class="ft-forward">转发(<span class="J_FwdNum">${forwardData.forwardcount}</span>)</a>
                                    <a href="${forwardData.b_url}#like" class="ft-like ${forwardData.isLiked}">喜欢(<span class="J_LikeNum">${forwardData.likecount}</span>)</a>
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
                    {@if isSelf}<a href="#" class="J_Del">删除</a>{@/if}
                    <a href="#" class="ft-comment J_Comment" type="comment">评论(<b>${replaycount}</b>)</a>
                    <a href="#" class="ft-forward J_Forward" type="forward">转发(<b>${forwardcount}</b>)</a>
                    <a href="#" class="ft-like J_Like ${isLiked}">喜欢(<b>${likecount}</b>)</a>
                </div>
            </div>
        </div>
        <div class="feed-ft feed-cmt" data-bid="${bid}">
          <div class="cmtbox">
            <div class="J_CommentWrap">
               <div class="cmt-box">
                   <input class="J_CmtCnt" type="text"/>
                    <input type="button" class="cmt-btn J-sendReply" value="评论"/>
                    <input type="button" class="cmt-btn J-sendForward" value="转发"/>
              </div>
              <ul class="J_commentList cmt-list clearfix">
                    <li class="loading-list">正在加载列表</li>
               </ul>
               <ul class="J_forwardList clearfix">
                    <li class="loading-list">正在加载列表</li>
               </ul>
            </div>
            <div class="page-func">
                <div class="pagination">
                    <a href="#" class="fold">收起</a>
                    <a href="${feedLink}#comment" target="_blank" class="comment-more">查看更多</a>
                </div>
            </div>
          </div>
        </div>
    </div>
    
</script>

<script type="text/template" id="J-feedTxt">

  <div class="feed-text-cont clearfix">
    <h3 class="feed-text-title"><a href="${feedLink}"  target="_blank">${feedTitle}</a></h3>
    <div class="feed-text-p clearfix">
       ${feedContent}
      <span class="feed-more"><a href="${feedLink}" target="_blank">全部信息...</a></span>
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
       <div class="feed-good-desc clearfix">
              <p>${feedContent}<span class="feed-more"><a href="${feedLink}" target="_blank">全部信息...</a></span></p>
       </div>
       <div class="feed-good-info">
          <div class="feed-good-img">
              <img src="${goodPic}">
          </div>
          <div class="feed-good-property">
                <h3 class="feed-good-title">${goodTitle}</h3>
               <div class="feed-good-fee">
                  <ul>
                   {@if oprice}
                    <li class="oprice"><span>价格：</span>
                        <del>${oprice}</del>元
                    </li>{@/if}
                    {@if price}
                    <li class="price"><span>${priceTxt}：</span>
                    <b>${price}元</b></li>{@/if}
                    {@if deliveryFees}
                    <li class="deliveryFees"><span>运费：${deliveryFees}</span>包邮</li>{@/if}
                  </ul>
               </div>
               <a href="${feedLink}" target="_blank" class="view-good">查看宝贝</a>
          </div>
       </div>
    </div>

</script>