<?php /* Smarty version Smarty-3.0.6, created on 2014-07-15 14:08:36
         compiled from "tplv2/index.html" */ ?>
<?php /*%%SmartyHeaderCode:103541941153c4c5649efaf5-32321272%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c1542c66fd69d13319a6782e135b83f629ebe08c' => 
    array (
      0 => 'tplv2/index.html',
      1 => 1405091660,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '103541941153c4c5649efaf5-32321272',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("require_header.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('gallery','yes'); echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>



<div id="index">
	
    <div id="article">
	    <?php $_template = new Smarty_Internal_Template("require_post.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
		
		
		
			<?php if (isset($_smarty_tpl->getVariable('adunit',null,true,false)->value[2])&&$_smarty_tpl->getVariable('adunit')->value[2]['is_show']==1){?>
			<div id="ad_index_up"></div>
			<script>
				$(document).ready(function(){
					ad_aside('#ad_index_up',2);
					setInterval(function(){
						ad_aside('#ad_index_up',2);
					}, 30000);
				})
			</script>
			<?php }?>
	
	
	
		
		
        <?php if (islogin()&&$_smarty_tpl->getVariable('yb')->value['wizard_switch']==1){?> <?php $_template = new Smarty_Internal_Template("require_wizard.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?> <?php }?>
		<div id="feedArea">
			<div id="feed_loading"></div>
			<div id="feed_box">
				




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


<script type="text/template" id="J-feed_template">

	
	{{#blogs}}
		<div class="box" id="blog_{{bid}}">
		    {include tpl_header_define('header') blog} 
		    {include tpl_feed_define(data.type) blog} 
		    {if data.show_reply ==1} {include tpl_header_define('infooter') data}
		    {else} {include tpl_header_define('footer') data} {/if}
		    <div class="clear">
		    </div>
		</div>
	{{/blogs}}


</script>
<script type="text/template" id="tmpl_model_1">

<div id="feedText_{bid}" class="content"> 
   <div class="text_area"> <p> {if attr.length >0} {each attr as img i} {if i <1} <a href="{b_url}" target="_blank"><img src="{img}"/></a> {/if} 
   {/each} {/if} {body}</p> 
   <div class="clear"></div> </div> 
</div>

</script>

<script type="text/template" id="tmpl_model_2">

<div id="feedText_{bid}" class="content">
    {if attr.length > 0} {each attr as m i} {if m.type == 'local'}
    <div class="album" id="swf_cover_{bid}_{i}">
        <div class="cover">
            <div class="cover_img">
            </div>
            <img src="{m.img}" />
        </div>
        <div class="cover_title">
            {m.title} - {m.author}
        </div>
        <div class="cover_fun">
            <a href="javascrpt:void(0)" onclick="window.location.href={urlpath()}/{m.url}">
                <span class="download">
                    \u4e0b\u8f7d\u97f3\u4e50
                </span>
            </a>
        </div>
        <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0"
        width="340" height="33">
            <param name="movie" value="{flashpath(m.url)}" />
            <param name="quality" value="high" />
            <param value="transparent" name="wmode" />
            <embed src="{flashpath(m.url)}" width="340" height="33" quality="high"
            pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash">
            </embed>
        </object>
    </div>
    {/if} {if m.type == 'xiamisearch' || m.type == 'xiami'}
    <div class="album">
        <div class="cover">
            <div class="cover_img">
            </div>
            <img src="{m.img}" />
        </div>
        {if m.title != 'null' && m.author != 'null'}
        <div class="cover_title">
            <a href="{h_url}">
                {m.title} {m.author}
            </a>
        </div>
        {/if}
        <div class="cover_fun">
            <a href="{m.url}" target="_blank">
                <span class="eject">
                    \u5f39\u51fa\u64ad\u653e
                </span>
            </a>
        </div>
        {if m.type == 'xiami'}
        <embed src="http://www.xiami.com/widget/0_{m.pid}/singlePlayer.swf" type="application/x-shockwave-flash"
        width="340" height="33" wmode="transparent">
        </embed>
        {else}
        <embed src="{m.pid}" type="application/x-shockwave-flash" width="340"
        height="33" wmode="transparent">
        </embed>
        {/if}
    </div>
    {/if} {if m.type == 'yinyuetai'}
    <div class="video w240" id="swf_cover_{bid}_{i}">
        <div class="video_bg">
            <div class="video_song">
                {m.title}
            </div>
            <div class="video_name">
                {m.author}
            </div>
            <a href="javascript:" onclick="load_swf('yinyuetai\',{bid},{i},'{m.title}','{m.pid}')">
                <div class="video_play">
                </div>
                <img src="index.php?c=blog&a=getyytimg&src={m.img}" />
            </a>
        </div>
    </div>
    <div style="display:none" id="swf_play_{bid}_{i}">
    </div>
    {/if} {/each} {/if} {if body}
    <div class="text_area">
        <p>
            {body}
        </p>
    </div>
    {/if}
</div>

</script>

<script type="text/template" id="tmpl_model_3">

	<div id="feedText_{bid}" class="content">
    <div class="text_area_all">
        {if attr.count ==1}
        <div id="imagelist_1_a" class="imagelist wSet">
            <div class="img_top">
                <li>
                    <a href="javascript:void(0)">
                        <img degree="0" src="{attr.img[0].url}" title="{attr.img[0].desc}" />
                    </a>
                </li>
            </div>
        </div>
        {/if} {if attr.count == 2}
        <div id="imagelist_2_a" class="imagelist wSet">
            <div class="img_two">
                {each attr.img as img i} {if i
                < 2} <li>
                    <a href="javascript:void(0)">
                        <img degree="0" src="{img.url}" title="{img.desc}" />
                    </a>
                    </li>
                    {/if} {/each}
            </div>
        </div>
        {/if} {if attr.count == 3}
        <div id="imagelist_3_a" class="imagelist wSet">
            <div class="img_top">
                <li>
                    <a href="javascript:void(0)">
                        <img degree="0" src="{attr.img[0].url}" title="{attr.img[0].desc}" />
                    </a>
                </li>
            </div>
            <div class="img_two">
                {each attr.img as img i} {if i > 0}
                <li>
                    <a href="javascript:void(0)">
                        <img degree="0" src="{img.url}" title="{img.desc}" />
                    </a>
                </li>
                {/if} {/each}
            </div>
        </div>
        {/if} {if attr.count == 4}
        <div id="imagelist_4_a" class="imagelist wSet">
            <div class="img_top">
                <li>
                    <a href="javascript:void(0)">
                        <img degree="0" src="{attr.img[0].url}" title="{attr.img[0].desc}" />
                    </a>
                </li>
            </div>
            <div class="img_three">
                {each attr.img as img i} {if i >= 1}
                <li>
                    <a href="javascript:void(0)">
                        <img degree="0" src="{img.url}" title="{img.desc}" />
                    </a>
                </li>
                {/if} {/each}
            </div>
        </div>
        {/if} {if attr.count == 5}
        <div id="imagelist_5_a" class="imagelist wSet">
            <div class="img_two">
                {each attr.img as img i} {if i >= 0 && i
                < 2} <li>
                    <a href="javascript:void(0)">
                        <img degree="0" src="{img.url}" title="{img.desc}" />
                    </a>
                    </li>
                    {/if} {/each}
            </div>
            <div class="img_three">
                {each attr.img as img i} {if i >=2 && i
                < 5} <li>
                    <a href="javascript:void(0)">
                        <img degree="0" src="{img.url}" title="{img.desc}" />
                    </a>
                    </li>
                    {/if} {/each}
            </div>
        </div>
        {/if} {if attr.count == 6}
        <div id="imagelist_6_a" class="imagelist wSet">
            <div class="img_three">
                {each attr.img as img i} {if i >= 0 && i
                < 3} <li>
                    <a href="javascript:void(0)">
                        <img degree="0" src="{img.url}" title="{img.desc}" />
                    </a>
                    </li>
                    {/if} {/each}
            </div>
            <div class="img_two">
                {each attr.img as img i} {if i >=3 && i
                <=4 } <li>
                    <a href="javascript:void(0)">
                        <img degree="0" src="{img.url}" title="{img.desc}" />
                    </a>
                    </li>
                    {/if} {/each}
            </div>
            <div class="img_top">
                <li>
                    <a href="javascript:void(0)">
                        <img degree="0" src="{attr.img[5].url}" title="{attr.img[5].desc}" />
                    </a>
                </li>
            </div>
        </div>
        {/if} {if attr.count == 7}
        <div id="imagelist_7_a" class="imagelist wSet">
            <div class="img_top">
                <li>
                    <a href="javascript:void(0)">
                        <img degree="0" src="{attr.img[0].url}" title="{attr.img[0].desc}" />
                    </a>
                </li>
            </div>
            <div class="img_three">
                {each attr.img as img i} {if i >= 1 && i
                <=3 } <li>
                    <a href="javascript:void(0)">
                        <img degree="0" src="{img.url}" title="{img.desc}" />
                    </a>
                    </li>
                    {/if} {/each}
            </div>
            <div class="img_three">
                {each attr.img as img i} {if i >=4 && i
                < 7} <li>
                    <a href="javascript:void(0)">
                        <img degree="0" src="{img.url}" title="{img.desc}" />
                    </a>
                    </li>
                    {/if} {/each}
            </div>
        </div>
        {/if} {if attr.count == 8}
        <div id="imagelist_8_a" class="imagelist wSet">
            <div class="img_two">
                {each attr.img as img i} {if i >= 0 && i
                < 2} <li>
                    <a href="javascript:void(0)">
                        <img degree="0" src="{img.url}" title="{img.desc}" />
                    </a>
                    </li>
                    {/if} {/each}
            </div>
            <div class="img_three">
                {each attr.img as img i} {if i >=2 && i
                < 8} <li>
                    <a href="javascript:void(0)">
                        <img degree="0" src="{img.url}" title="{img.desc}" />
                    </a>
                    </li>
                    {/if} {/each}
            </div>
        </div>
        {/if} {if attr.count ==9}
        <div id="imagelist_9_a" class="imagelist wSet">
            <div class="img_three">
                {each attr.img as img i} {if i >= 0 && i
                < 3} <li>
                    <a href="javascript:void(0)">
                        <img degree="0" src="{img.url}" title="{img.desc}" />
                    </a>
                    </li>
                    {/if} {/each}
            </div>
            <div class="img_two">
                {each attr.img as img i} {if i >=3 && i
                < 5} <li>
                    <a href="javascript:void(0)">
                        <img degree="0" src="{img.url}" title="{img.desc}" />
                    </a>
                    </li>
                    {/if} {/each}
            </div>
            <div class="img_three">
                {each attr.img as img i} {if i >= 5 && i
                < 8} <li>
                    <a href="javascript:void(0)">
                        <img degree="0" src="{img.url}" title="{img.desc}" />
                    </a>
                    </li>
                    {/if} {/each}
            </div>
            <div class="img_top">
                <li>
                    <a href="javascript:void(0)">
                        <img degree="0" src="{attr.img[8].url}" title="{attr.img[8].desc}" />
                    </a>
                </li>
            </div>
        </div>
        {/if} {if attr.count >=10}
        <div id="imagelist_9_a" class="imagelist wSet">
            <div class="img_two">
                {each attr.img as img i} {if i >=0 && i
                < 2} <li>
                    <a href="javascript:void(0)">
                        <img degree="0" src="{img.url}" title="{img.desc}" />
                    </a>
                    </li>
                    {/if} {/each}
            </div>
            <div class="img_three">
                {each attr.img as img i} {if i >= 2 && i
                < 5} <li>
                    <a href="javascript:void(0)">
                        <img degree="0" src="{img.url}" title="{img.desc}" />
                    </a>
                    </li>
                    {/if} {/each}
            </div>
            <div class="img_two">
                {each attr.img as img i} {if i >=5 && i
                < 7} <li>
                    <a href="javascript:void(0)">
                        <img degree="0" src="{img.url}" title="{img.desc}" />
                    </a>
                    </li>
                    {/if} {/each}
            </div>
            <div class="img_three">
                {each attr.img as img i} {if i >= 7 && i
                < 10} <li>
                    <a href="javascript:void(0)">
                        <img degree="0" src="{img.url}" title="{img.desc}" />
                    </a>
                    </li>
                    {/if} {/each}
            </div>
        </div>
        {/if} {if body}
        <div class="text_area">
            <p>
                {body}
            </p>
        </div>
        {/if}
    </div>
</div>

</script>
<script type="text/template" id="tmpl_model_4">

<div id="feedText_{bid}" class="content">
    {if attr.length>0} {each attr as v i}
    <div class="video w240" id="swf_cover_{bid}_{i}">
        <div class="video_bg">
            <div class="video_title">
                {v.title}
            </div>
            <a href="javascript:;" onclick="load_swf('yinyuetai',{bid},{i},'{v.title}','{v.pid}')">
                <div class="video_play">
                </div>
                {if v.type == 'yinyuetai'}
                <img src="index.php?c=blog&a=getyytimg&src={v.img}" />
                {else}
                <img src="{v.img}" />
                {/if}
            </a>
        </div>
    </div>
    <div style="display:none;" id="swf_play_{bid}_{i}">
    </div>
    {/each} {/if}
    <div class="text_area">
        {if body}
        <p>
            {body}
        </p>
        {/if}
    </div>
</div>

</script>
<script type="text/template" id="tmpl_model_6">

<div id="feedText_{bid}" class="content">
    {if attr.length>0} {each attr as v i}
    <div class="movie">
        <div class="mov_img">
            <div class="score">
                {v.average}
            </div>
            <div class="mov_yy">
            </div>
            <a href="{b_url}" target="_blank">
                <img src="{v.img}" />
            </a>
            {if v.movie}
            <div class="mov_play">
                <a href="{v.movie}" target="_blank">
                    \u64ad\u653e\u9884\u544a\u7247
                </a>
            </div>
            {/if}
        </div>
        <div class="mov_info">
            <li class="mov_title">
                \u7535\u5f71\u540d\u79f0:
                <font>
                    {v.title}
                </font>
            </li>
            <li>
                \u5bfc\u6f14:
                <font>
                    {v.directe}
                </font>
            </li>
            <li>
                \u4e3b\u6f14:
                <font>
                    {each v.starring as g i}
                    <b>
                        {g}
                    </b>
                    {/each}
                </font>
            </li>
            <li>
                \u7c7b\u578b:
                <font>
                    {each v.genre as g i}
                    <b>
                        {g}
                    </b>
                    {/each}
                </font>
            </li>
            <li>
                \u4e0a\u6620\u65e5\u671f:
                <font>
                    {v.initialReleaseDate}
                </font>
            </li>
            <li>
                \u65f6\u957f:
                <font>
                    {v.runtime}
                </font>
            </li>
        </div>
        <div class="clear">
        </div>
    </div>
    {/each} {/if}
    <div class="text_area">
        {if body}
        <p>
            {body}
        </p>
        {/if}
    </div>
</div>

</script>
<script type="text/javascript">
	$(document).ready(function(){ 
		yb_load_feeds('blog','feeds');
	})
</script>
<?php $_template = new Smarty_Internal_Template("require_footer.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('top','yes'); echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
