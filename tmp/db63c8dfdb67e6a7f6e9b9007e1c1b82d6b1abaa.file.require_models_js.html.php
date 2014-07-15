<?php /* Smarty version Smarty-3.0.6, created on 2012-12-22 03:13:16
         compiled from "tplv2\require_models_js.html" */ ?>
<?php /*%%SmartyHeaderCode:1567950d4b4ccebe751-72837977%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'db63c8dfdb67e6a7f6e9b9007e1c1b82d6b1abaa' => 
    array (
      0 => 'tplv2\\require_models_js.html',
      1 => 1342614856,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1567950d4b4ccebe751-72837977',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>

<script type="text/html" id="tmpl_model_header">
	<div class="avatar">
		<a href="{h_url}" target="_blank">
			<div class="head_bg">
				<img src="{h_img}" alt="" class="face" title="访问{username}的博客" />
			</div>
			{if repto != null}
				<div class="avatarblog"><img src="{repto.h_img}" alt="{repto.username}"  title="转载自{repto.username}的博客"/></div>
			{/if}
		</a>
		{if uid != myuid()}
			<div id="divObj" class="fun_list"><div class="corner"></div>
				<div class="fun_menu">
					<li><a href="index.php?c=pm&a=detail&uid={uid}" target="_blank">发送私信</a></li>
					<li><a href="javascript:;" onclick="fllow('link',{uid},1)">加关注</a></li>
				</div>
			</div>
		{/if}
	</div>
	
	<div class="blogname">
		<a href="{b_url}" target="_blank">{username}</a>
		{if repto != null}{
			<span>转载自<font><a href="{repto.h_url}" target="_blank">{repto.username}</a></font></span>
		{/if}
    </div>
	
	
	<div class="blogdate">{time}</div>
	{if title != null}{
		<div class="title">
			<h1><a href="{b_url}" target="_blank">{title}</a></h1>
		</div>
	{/if}

</script>


<script type="text/html" id="tmpl_model_3">

<div id="feedText_{bid}" class="content">
	<div class="text_area_all">
		{if attr.count ==1}
			<div id="imagelist_1_a" class="imagelist wSet">
				<div class="img_top">
					<li>
						<a href="javascript:void(0)"><img degree="0" src="{attr.img[0].url}" title="{attr.img[0].desc}" /></a>
					</li>
				</div>
			</div>
		{/if}
		
		{if attr.count == 2}
			<div id="imagelist_2_a" class="imagelist wSet">
				<div class="img_two">
				{each attr.img as img i}
					{if i < 2}
					<li><a href="javascript:void(0)"><img degree="0" src="{img.url}" title="{img.desc}" /></a></li>
					{/if}
				{/each}
				</div>
			</div>
		{/if}
		
		{if attr.count == 3}
			<div id="imagelist_3_a" class="imagelist wSet">
				<div class="img_top"><li><a href="javascript:void(0)"><img degree="0" src="{attr.img[0].url}" title="{attr.img[0].desc}" /></a></li></div>
				<div class="img_two">
				{each attr.img as img i}
					{if i > 0}
					<li><a href="javascript:void(0)"><img degree="0" src="{img.url}" title="{img.desc}" /></a></li>
					{/if}
				{/each}
				</div>
			</div>
		{/if}
		
		{if attr.count == 4}
			<div id="imagelist_4_a" class="imagelist wSet">
				<div class="img_top"><li><a href="javascript:void(0)"><img degree="0" src="{attr.img[0].url}" title="{attr.img[0].desc}" /></a></li></div>
				<div class="img_three">
				{each attr.img as img i}
					{if i >= 1}
					<li><a href="javascript:void(0)"><img degree="0" src="{img.url}" title="{img.desc}" /></a></li>
					{/if}
				{/each}
				</div>
			</div>
		{/if}
		
		{if attr.count == 5}
			<div id="imagelist_5_a" class="imagelist wSet">
				<div class="img_two">
				{each attr.img as img i}
					{if i >= 0 && i < 2}
					<li><a href="javascript:void(0)"><img degree="0" src="{img.url}" title="{img.desc}" /></a></li>
					{/if}
				{/each}
				</div>
				
				<div class="img_three">
				{each attr.img as img i}
					{if i >=2 && i < 5}
					<li><a href="javascript:void(0)"><img degree="0" src="{img.url}" title="{img.desc}" /></a></li>
					{/if}
				{/each}
				</div>
			</div>
		{/if}
		
		{if attr.count == 6}
			<div id="imagelist_6_a" class="imagelist wSet">
				
				<div class="img_three">
				{each attr.img as img i}
					{if i >= 0 && i < 3}
					<li><a href="javascript:void(0)"><img degree="0" src="{img.url}" title="{img.desc}" /></a></li>
					{/if}
				{/each}
				</div>
				
				<div class="img_two">
				{each attr.img as img i}
					{if i >=3 && i <= 4}
					<li><a href="javascript:void(0)"><img degree="0" src="{img.url}" title="{img.desc}" /></a></li>
					{/if}
				{/each}
				</div>
				<div class="img_top"><li><a href="javascript:void(0)"><img degree="0" src="{attr.img[5].url}" title="{attr.img[5].desc}" /></a></li></div>
				
			</div>
		{/if}
		
		{if attr.count == 7}
			<div id="imagelist_7_a" class="imagelist wSet">
				<div class="img_top"><li><a href="javascript:void(0)"><img degree="0" src="{attr.img[0].url}" title="{attr.img[0].desc}" /></a></li></div>
				<div class="img_three">
				{each attr.img as img i}
					{if i >= 1 && i <= 3}
					<li><a href="javascript:void(0)"><img degree="0" src="{img.url}" title="{img.desc}" /></a></li>
					{/if}
				{/each}
				</div>
				
				<div class="img_three">
				{each attr.img as img i}
					{if i >=4 && i < 7}
					<li><a href="javascript:void(0)"><img degree="0" src="{img.url}" title="{img.desc}" /></a></li>
					{/if}
				{/each}
				</div>
			</div>
		{/if}
		
		{if attr.count == 8}
			<div id="imagelist_8_a" class="imagelist wSet">
				<div class="img_two">
				{each attr.img as img i}
					{if i >= 0 && i < 2}
					<li><a href="javascript:void(0)"><img degree="0" src="{img.url}" title="{img.desc}" /></a></li>
					{/if}
				{/each}
				</div>
				
				<div class="img_three">
				{each attr.img as img i}
					{if i >=2 && i < 8}
					<li><a href="javascript:void(0)"><img degree="0" src="{img.url}" title="{img.desc}" /></a></li>
					{/if}
				{/each}
				</div>
			</div>
		{/if}
		
		{if attr.count ==9}
			<div id="imagelist_9_a" class="imagelist wSet">
				<div class="img_three">
				{each attr.img as img i}
					{if i >= 0 && i < 3}
					<li><a href="javascript:void(0)"><img degree="0" src="{img.url}" title="{img.desc}" /></a></li>
					{/if}
				{/each}
				</div>
				
				<div class="img_two">
				{each attr.img as img i}
					{if i >=3 && i < 5}
					<li><a href="javascript:void(0)"><img degree="0" src="{img.url}" title="{img.desc}" /></a></li>
					{/if}
				{/each}
				</div>
				
				<div class="img_three">
				{each attr.img as img i}
					{if i >= 5 && i < 8}
					<li><a href="javascript:void(0)"><img degree="0" src="{img.url}" title="{img.desc}" /></a></li>
					{/if}
				{/each}
				</div>
				
				<div class="img_top"><li><a href="javascript:void(0)"><img degree="0" src="{attr.img[8].url}" title="{attr.img[8].desc}" /></a></li></div>
			</div>
		{/if}
		
		{if attr.count >=10}
			<div id="imagelist_9_a" class="imagelist wSet">
				
				
				<div class="img_two">
				{each attr.img as img i}
					{if i >=0 && i < 2}
					<li><a href="javascript:void(0)"><img degree="0" src="{img.url}" title="{img.desc}" /></a></li>
					{/if}
				{/each}
				</div>
				
				<div class="img_three">
				{each attr.img as img i}
					{if i >= 2 && i < 5}
					<li><a href="javascript:void(0)"><img degree="0" src="{img.url}" title="{img.desc}" /></a></li>
					{/if}
				{/each}
				</div>
				
				<div class="img_two">
				{each attr.img as img i}
					{if i >=5 && i < 7}
					<li><a href="javascript:void(0)"><img degree="0" src="{img.url}" title="{img.desc}" /></a></li>
					{/if}
				{/each}
				</div>
				
				<div class="img_three">
				{each attr.img as img i}
					{if i >= 7 && i < 10}
					<li><a href="javascript:void(0)"><img degree="0" src="{img.url}" title="{img.desc}" /></a></li>
					{/if}
				{/each}
				</div>
			</div>
		{/if}
		
	{if body}
	<div class="text_area">
		<p>{body}</p>
	</div>	
	{/if}
	</div>
</div>
</script>





<script type="text/html" id="tmpl_model_2">
<div id="feedText_{bid}" class="content">

	{if attr.length > 0}
		{each attr as m i}
			{if m.type == 'local'}
				<div class="album" id="swf_cover_{bid}_{i}">
					<div class="cover">
						<div class="cover_img"></div>
						<img src="{m.img}"/>
					</div>
					<div class="cover_title">{m.title} - {m.author}</div>
					<div class="cover_fun"><a href="javascrpt:void(0)" onclick="window.location.href={urlpath()}/{m.url}"><span class="download">下载音乐</span></a></div>
					
					<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="340" height="33">
						<param name="movie" value="{flashpath(m.url)}" />
						<param name="quality" value="high" />
						<param value="transparent" name="wmode" />
						<embed src="{flashpath(m.url)}" width="340" height="33" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash"></embed>
					</object>
				</div>
			{/if}
			
			{if m.type == 'xiamisearch' || m.type == 'xiami'}
			<div class="album">
				<div class="cover">
					<div class="cover_img"></div>
					<img src="{m.img}" />
				</div>
				{if m.title != 'null' && m.author != 'null'}
				<div class="cover_title">
					<a href="{h_url}">{m.title} {m.author}</a>
				</div>
				{/if}
				<div class="cover_fun">
					<a href="{m.url}" target="_blank"><span class="eject">弹出播放</span></a>
				</div>
				{if m.type == 'xiami'}
					<embed src="http://www.xiami.com/widget/0_{m.pid}/singlePlayer.swf" type="application/x-shockwave-flash" width="340" height="33" wmode="transparent"></embed>
				{else}
					<embed src="{m.pid}" type="application/x-shockwave-flash" width="340" height="33" wmode="transparent"></embed>
				{/if}
			</div>
			{/if}
			
			
			{if m.type == 'yinyuetai'}
			<div class="video w240" id="swf_cover_{bid}_{i}">
				<div class="video_bg">
					<div class="video_song">{m.title}</div>
					<div class="video_name">{m.author}</div>
					<a href="javascript:" onclick="load_swf('yinyuetai',{bid},{i},'{m.title}','{m.pid}')">
						<div class="video_play"></div><img src="index.php?c=blog&a=getyytimg&src={m.img}" />
					</a>
				</div>
			</div>
			<div style="display:none" id="swf_play_{bid}_{i}"></div>
			{/if}
	
		{/each}
	{/if}
	{if body}
	<div class="text_area">
		<p>{body}</p>
	</div>	
	{/if}
</div>			
	
</script>

<script type="text/html" id="tmpl_model_1">
<div id="feedText_{bid}" class="content">
		<div class="text_area">
			<p>
			{if attr.length >0}
			{each attr as img i}
				{if i <1} <a href="{b_url}" target="_blank"><img src="{img}"/></a> {/if}
			{/each}
			{/if}
			
			{body}</p>
			<div class="clear"></div>
		</div>
</div>
</script>


<script type="text/html" id="tmpl_model_4">
<div id="feedText_{bid}" class="content">

	{if attr.length>0}
		{each attr as v i}
			<div class="video w240" id="swf_cover_{bid}_{i}">
				<div class="video_bg">
					<div class="video_title">{v.title}</div>
						<a href="javascript:;" onclick="load_swf('yinyuetai',{bid},{i},'{v.title}','{v.pid}')">
								<div class="video_play"></div>
								{if v.type == 'yinyuetai'}
									<img src="index.php?c=blog&a=getyytimg&src={v.img}" />
								{else}
									<img src="{v.img}" />
								{/if}
						</a>
					</div>
				</div>
				<div style="display:none;" id="swf_play_{bid}_{i}"></div>	
		{/each}
	
	{/if}

	<div class="text_area">
		{if body}<p>{body}</p>{/if}
	</div>
</div>
</script>


<script type="text/html" id="tmpl_model_6">
<div id="feedText_{bid}" class="content">
	{if attr.length>0}
		{each attr as v i}
			<div class="movie">
			    <div class="mov_img">
				    <div class="score">{v.average}</div>
				    <div class="mov_yy"></div>
				    <a href="{b_url}" target="_blank"><img src="{v.img}" /></a>
					{if v.movie}
					<div class="mov_play"><a href="{v.movie}" target="_blank">播放预告片</a></div>
					{/if}
				</div>
				<div class="mov_info">
				    <li class="mov_title">电影名称:<font>{v.title}</font></li>
					<li>导演:<font>{v.directe}</font></li>
					<li>主演:<font>{each v.starring as g i}<b>{g}</b>{/each}</font></li>
					<li>类型:<font>{each v.genre as g i}<b>{g}</b>{/each}</font></li>
					<li>上映日期:<font>{v.initialReleaseDate}</font></li>
					<li>时长:<font>{v.runtime}</font></li>
				</div>
				<div class="clear"></div>
			</div>
		{/each}
	{/if}

	<div class="text_area">
		{if body}<p>{body}</p>{/if}
	</div>
</div>
</script>


<script type="text/html" id="tmpl_model_footer">
<div class="footer">

	{if more == 1}
		<div class="more"><a href="{b_url}">未完,继续阅读→</a></div>
	{/if}

	{if tag.length >0}
	<div class="tag">
		{each tag as t i}
			<a href="index.php?c=blog&a=tag&tag={t}">#{t}</a>
		{/each}
	</div>
	{/if}
	
	<div class="fun">
	{if uid == myuid()}
		<span class="delete"><a href="javascript:void(0)" onclick="delblogs({bid})" title="删除"></a></span>
	{/if}
	
	{if uid == myuid() && repto == null}
		<span class="edit"><a href="index.php?c=post&a=edit&id={bid}&model={type}" title="编辑"></a></span>
	{/if}
	
	{if uid != myuid()}
		<span class="reblog"><a href="javascript:void(0)" onclick="repblog({bid})" title="转载"></a></span>
	{/if}


	<span class="reply">
		<a href="javascript:void(0)" onclick="indexPostTab('comment',{bid})" id="comment_btn_{bid}" title="回复">
			{if replaycount > 0} <em>{replaycount}</em>{/if}
		</a>
	</span>
	
	{if feedcount > 0}
	<span class="hotnum">
		<a href="javascript:void(0)" onclick="indexPostTab('feeds',{bid})" title="热度" id="hid_btn_{bid}">
			{if feedcount > 0} <em>{feedcount}</em>{/if}
		</a>
	</span>
	{/if}
	

	{if uid != myuid()}
		{if likeid == null}
		<span class="nolike" id=like_{bid}">
		{else}
		<span class="like" id=like_{bid}">
		{/if}
			<a href="javascript:void(0)" likeid="{bid}" class="dolike" title="喜欢"></a>
		</span>
	{/if}

	</div><!--FUNEND-->
	

</div><!--FOOTEREND-->
<div class="clear"></div>

<form class="autoTxtCount" action="" method="get" onsubmit="return false;">
<div id="comment_{bid}" style="display:none">
	<div class="reply_list">
		<div class="reply_btn">
			<button type="submit" class="btn"  onclick="sendReplay({bid});">发布</button>
		</div>
		
		<div class="reply_input">
			<div class="limit_text" ><span class="tips">140</span></div>
			<textarea id="replyInput_{bid}"></textarea>
			<input type="hidden" id="replyTo_{bid}" />
		</div>
		<div class="clear"></div>
		
		<div id="commentLoading_{bid}" class="s_loading"></div>
		<div class="reply_comment">
			<div class="clear"></div>
		</div>
	</div>
	
	<div id="comment_paging_{bid}" class="paging"></div>
</div>
</form>


<div id="feeds_{bid}" class="none">
	<div class="reply_list">
		<div id="hit_loading_{bid}" class="sf_loading"></div>
	</div>
	<div id="feeds_paging_{bid}" class="paging"></div>
</div>
</script>



<script type="text/html" id="feed_template">
{each blog as data i}
<div class="box" id="blog_{data.bid}">
	{include tpl_header_define('header') data}
		{include tpl_feed_define(data.type) data}
	{include tpl_header_define('footer') data}
<div class="clear"></div>
</div>

{/each}
</script>



<script type="text/html" id="tmpl_recommendImg">
<div class="pic">
	<div class="fr_tleft"></div>
	<div class="fr_tright"></div>
	<div class="fr_bright"></div>
	<div class="fr_bottom"></div>
	{if uid != myuid()}
		<div class="fr_menu">
			<li><a title="转载" onclick="repblog({bid})"><span class="reblog"></span></a></li>
			<li><a title="喜欢"><span class="like" onclick="likes({bid})" id="like_{bid}"></span></a></li>
		</div>
	{/if}
		
	<a href="{b_url}" target="_blank"><img src="{img}"/></a>
</div>


	<div class="avatar">
		<a href="{h_url}" target="_blank">
			<div class="head_bg"><img src="{h_img}" alt="{username}" class="face"/></div>
		</a>
	</div>
		
	<div class="info">
		<li><a href="{h_url}" target="_blank"><b>{username}</b></a></li>
		{if uid != myuid()}
			<li><a href="javascript:;" onclick="fllow('link','{uid}');;recommendImg();">+关注</a></li>
		{/if}

	</div>
	<div class="clear"></div>
	<div class="newt_btn">
		<a href="javascript:;" onclick="recommendImg()" title="摇一摇发现精彩好图"><span>摇一摇</span></a>
	</div>
</script>
    

<script type="text/html" id="tmpl_reply">
{each body as d i}
<div id="commentList_{d.id}" class="commentList">
	<div class="reply_fun">
		<li class="fun_del_{d.del_flag}"><a href="javascript:;" onclick="delrep({d.id})"><span></span></a></li>
		<li class="fun_rpy_{d.rep_flag}"><a href="javascript:;" onclick="replyto({d.bid},'{d.user.username}',{d.uid})"><span></span></a></li>
	</div>
			
	<div class="reply_avatar">
		<a target="_blank" href="{d.h_url}"><img title="{d.user.username}" alt="{d.user.username}" src="{d.h_img}"></a>
	</div>
	<div class="reply_content">
		<a target="_blank" href="{d.h_url}">{d.user.username}</a>{d.msg}<span>({d.time})</span>
	</div>
	<div class="clear"></div>
</div>
{/each}
</script>




<script type="text/html" id="tmpl_recommend">
	{each data as d i}
	<div class="blogitem">
		<div class="blogitem_con">
		   <div class="blogitem_info">
			     <div class="blogitem_user"><a href="{d.h_url}">{d.username}</a></div>
				 <div class="blogitem_data"><font class="fans">{d.flow}</font>个粉丝, <font class="blogs">{d.num}</font>篇博客</div>
				 <div class="blogitem_intro">{d.sign}</div>
				 </div>
			<div class="blogitem_avatar"><a href="{d.h_url}" target="_blank"><div class="head_bg"><img src="{d.h_img}" alt="{d.username}" class="face"/></div></a>
	{if d.uid != myuid()}
		{if d.isfollow}{
			<div class="blogitem_follow_0" id="follow_unlink_{d.uid}"><a href="javascript:;" onclick="fllow('unlink',{d.uid})">取消关注</a></div>
			<div class="blogitem_follow_1" id="follow_link_{d.uid}" style="display:none"><a href="javascript:;" onclick="fllow('follow',{d.uid})">添加关注</a></div>
		{else}
			<div class="blogitem_follow_0" id="follow_unlink_{d.uid}" style="display:none"><a href="javascript:;" onclick="fllow('unlink',{d.uid})">取消关注</a></div>
			<div class="blogitem_follow_1" id="follow_link_{d.uid}"><a href="javascript:;" onclick="fllow('follow',{d.uid})">添加关注</a></div>
		{/if}
	{/if}
			</div>
	    </div>
		 <div class="blogitem_other">
		    <div class="info_a">
			    <div class="info_url"><a href="{d.h_url}"><font>{urlpath()}/{d.domain}</font></a></div>
			    <div class="info_tag">
					{if d.blogtag.length>0}
						{each d.blogtag as tag}
							<a href="index.php?c=blog&a=tag&tag={tag}">#{tag}</a>
						{/each}
					{/if}

				</div>
			</div>
		
			<div class="info_b">
				{if d.local}<div class="info_url">来自：{d.local}</div>{/if}
				{if d.logtime}<div class="info_tag">最近登录: {d.logtime}</div>{/if}
			</div>
		</div>
	</div>

	{/each}
</script>



<script type="text/html" id="tmpl_recommend_box">

{each body as d i}
	{if d.type == 1}
	<li class="cell">
		<div class="text_area">
			<div class="type_text">文字</div>
			{if d.tag}<div class="tag"><a href="index.php?c=blog&a=tag&tag={d.tag}" target="_blank">{d.tag}</a></div>{/if}
			
			<div class="title">
				<a href="{d.b_url}" target="_blank">{d.title}</a>
			</div>
			<a href="{d.b_url}" target="_blank">
			<div class="content">
				{d.body}
			</div>
			</a>
		</div>
	</li>
	{/if}
	
	{if d.type == 2 || d.type == 3 || d.type == 4 || d.type == 5 || d.type == 6}
		<li class="cell">
			{if d.tag}<div class="tag"><a href="index.php?c=blog&a=tag&tag={d.tag}" target="_blank">{d.tag}</a></div>{/if}
			<a href="{d.b_url}" target="blank">
				{if d.type == 2}
					<div class="type_music">音乐</div>
				{else if d.type == 3}
					<div class="type_image">图片</div>
				{else if d.type == 4}
					<div class="type_video">视频</div>
				{else if d.type == 5}
					<div class="type_shop">宝贝</div>
				{else d.type == 6}
					<div class="type_movie">电影</div>
				{/if}
				{if d.img != ''}<img src="{d.img}" style="min-width:141px; min-height:141px"/>{/if}
			</a>
		</li>
	{/if}
{/each}
</script>





<script type="text/html" id="tmpl_recommend_htags">
{each body.data as d i}
<tr class="tag_row_{chgcss(i)}"> 
	<td class="tag"><a href="index.php?c=blog&a=tag&tag={d.title}" target="_blank">{d.title}</a></td>
	<td class="hot">
		<div class="percent_num">
			<div class="corner"></div>
			<div class="count">{d.hit}</div>
		</div>
		<div class="percent_area">
			<div class="state" style="width:{getweight(d.hit,body.maxhit)}%;"></div>
			<div class="percent"></div>
		<div>
	</td>
	<td class="blogger">
		<div class="avatar_list">
		{if d.ulist.length >= 1}
			{each d.ulist as u i}
				<li>
					<div class="avatar">
						<a href="{u.h_url}" title="{u.username}" target="_blank"><img src="{u.h_img}" alt="{u.username}"/></a>
					</div>
				</li>
			{/each}
		{/if}
		</div>
	</td>
</tr>
{/each}
</script>





<script type="text/html" id="tmpl_recommend_waterfall_htags">
{each body.data as d i}
	<div class="tagcon">
		<div class="tag_name"><a href="index.php?c=blog&a=tag&tag={d.title}" target="_blank">{d.title}</a></div>
	
		<div class="percent_area">
			<div class="state" style="width:{getweight(d.hit,body.maxhit)}%;"><div class="count">{d.hit}</div></div>
			<div class="percent"></div>
		</div>
		
		<div class="blogger">
			{if d.ulist.length >= 1}
			{each d.ulist as u i}
				<li>
					<div class="avatar">
						<a href="{u.h_url}" title="{u.username}" target="_blank"><img src="{u.h_img}" alt="{u.username}"/></a>
					</div>
				</li>
			{/each}
			{/if}
		</div>
		<div class="clear"></div>
	</div>
{/each}
</script>



<script type="text/html" id="tmpl_intval_code">
	{each invite_code as c i}
	<li>
		<input type="button" value="复制" class="invite_btn fl" onclick="copy2Clipboard('{regurl(c.inviteCode)}')"/><font>过期时间：{c.exptime}</font>
		<input type="text" value="{c.inviteCode}" class="invite_url fr" />
	</li>
	<div class="clear"></div>
	{/each}
</script>


<script type="text/html" id="tmpl_invite_follow_list">
{each body as d i}
<div class="avatar">
	<a href="{d.h_url}" target="_blank" title="Ta关注：{d.blogtag}">
		<div class="head_bg"><img src="{d.h_img}" alt="{d.username}" class="face"/></div>
		<span>{d.username}</span>
	</a>
</div>
{/each}
</script>
