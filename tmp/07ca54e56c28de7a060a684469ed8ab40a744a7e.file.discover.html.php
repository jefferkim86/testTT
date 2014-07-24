<?php /* Smarty version Smarty-3.0.6, created on 2012-12-22 00:01:59
         compiled from "tplv2\discover.html" */ ?>
<?php /*%%SmartyHeaderCode:190050d487f7a27e56-66478203%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '07ca54e56c28de7a060a684469ed8ab40a744a7e' => 
    array (
      0 => 'tplv2\\discover.html',
      1 => 1341154844,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '190050d487f7a27e56-66478203',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("require_header.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

<script type="text/javascript">
$('.m_loading').show();
$(document).ready(function(){
	discover();
	htags();

	
	setInterval("discover()", 15000); //设置15秒自刷
	$('.default').click(function(){
		$(this).toggleClass('hover');
		if($(this).hasClass('hover')){
			$('#tab_2').show();
			$('#tab_1').hide();
			waterfall_flow();
		}else{
			$('#tab_1,#tab_2').toggle();
			discover();
		}
	})	   
});

//普通模式
function discover(){
	$('#tab_1 .typecon').html('');
	$('.m_loading').show();
	$.ybAPI('blog','discoverBlog',{'num':18,isshuffle:true},function(data){
		if(data.status == 1){
			$('.m_loading').hide();

			if(data.body.length > 1){
				$('#tab_1 .typecon').html(template('tmpl_recommend_box',data));
				$('#waterfall_flow').html(template('tmpl_recommend_box',data));
			}
			$('#tab_1 .typecon').append('<div class="clear"></div>');
		}else{
			waring(data.msg);
		}
	});	
}

//加载普通模式的tag
function htags(){
$('.m_loading').show();
	$.ybAPI('blog','discovertag','',function(data){
		if(data.status == 1){
		$('.m_loading').hide();
		$('#htagarea').html('');
			var maxhit = data.body.maxhit;
			if(data.body.data.length > 1){
				$('#htagarea').html(template('tmpl_recommend_htags',data));
			}
			$('.m_loading').hide();
		}else{
			waring(data.msg);
		}
	});	
}

//加载瀑布流模式的tag
function waterfall_flow_htags(){
$('.m_loading').show();
	$.ybAPI('blog','discovertag','',function(data){
		$('.m_loading').hide();
		if(data.status == 1){
		$('#Waterfall_flow_tag').html('');
			var maxhit = data.body.maxhit;
			if(data.body.data.length > 1){
				$('#Waterfall_flow_tag').html(template('tmpl_recommend_waterfall_htags',data));
			}
			load_status.hidden();
		}else{
			waring(data.msg);
		}
	});	
}

function tmpl_waterfall_flow(d){
	var a = tag = img ='';
	if(d.tag != '' || d.tag != 0){tag = '<div class="tag"><a href="index.php?c=blog&a=tag&tag='+d.tag+'" target="_blank">'+d.tag+'</a></div>';}
	if(d.img != ''){img = '<img src="'+d.img+'"/>';}
	if(d.type == 1){ a += '	<li class="popup_in">'+tag+'<div class="text_area"><div class="type_text">文字</div><div class="title"><a href="'+d.b_url+'" target="_blank">'+d.title+'</a></div><div class="content"><a href="'+d.b_url+'" target="_blank">'+d.body+'</a></div></div></li>';}
	if(d.type == 2){ a += ' <li class="popup_in">'+tag+'<a href="'+d.b_url+'" target="blank"><div class="type_music">音乐</div>'+img+'</a></li>';}
	if(d.type == 3){ a += ' <li class="popup_in">'+tag+'<a href="'+d.b_url+'" target="blank"><div class="type_image">图片</div>'+img+'</a></li>';}
	if(d.type == 4){ a += '<li class="popup_in">'+tag+'<a href="'+d.b_url+'" target="blank"><div class="type_video">视频</div>'+img+'</a></li>';}
	if(d.type == 5){ a += '<li class="popup_in">'+tag+'<a href="'+d.b_url+'" target="blank"><div class="type_shop">宝贝</div>'+img+'</a></li>';}
	if(d.type == 6){ a += '<li class="popup_in">'+tag+'<a href="'+d.b_url+'" target="blank"><div class="type_movie">电影</div>'+img+'</a></li>';}
	return a;
}
</script>



<div id="index">
    <div class="discover_menu">
	    <div class="search" id="search">
		    <input type="button" class="btn" value="搜索" onClick="tag_search()">
		    <input type="text" id="searchtag" value="搜索标签,发现兴趣" class="ipt">
		</div>
		<div class="menu_type">
		    <!--<div class="default"></div>-->
			<div class="m_loading"></div>
		</div>
	</div>
	
	<div class="discover_con">
	
	    
		
		<!--type1 方块-->
		<div id="tab_1">
		    <div class="typecon clear"></div>
			
			<?php if (isset($_smarty_tpl->getVariable('adunit',null,true,false)->value[3])&&$_smarty_tpl->getVariable('adunit')->value[3]['is_show']==1){?>
			<div id="ad_discover"></div>
			<script>
				$(document).ready(function(){
					ad_aside('#ad_discover',3);
					setInterval(function(){
						ad_aside('#ad_discover',3);
					}, 30000);
				})
			</script>
		<?php }?>
		
			
			<div class="htag">
			    <table width="900" cellpadding="0" class="hottable" cellspace="0">
				    <thead>
					  <tr>
					    <th width="290">热门标签</th>
						<th width="280">热度</th>
						<th width="330">最近更新</th>
					  </tr>
					</thead>
					<tbody id="htagarea"></tbody>
				</table>
			</div>
		</div>
		
		<!--type2 瀑布-->
		<div id="tab_2" style="display:none">
		    <div class="htag">
			    <h2>热门标签</h2>
			    <div class="hottable" id="Waterfall_flow_tag"></div>
			</div>
		    <div class="typecon" id="waterfall_flow"></div>
		</div>
	</div>
	
	
	
    
	
	
	
</div>

<?php $_template = new Smarty_Internal_Template("require_footer.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>